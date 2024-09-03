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

namespace com\bydan\contabilidad\general\tipo_persona\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\general\tipo_persona\util\tipo_persona_carga;
use com\bydan\contabilidad\general\tipo_persona\util\tipo_persona_param_return;


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

use com\bydan\contabilidad\general\tipo_persona\util\tipo_persona_util;
use com\bydan\contabilidad\general\tipo_persona\business\entity\tipo_persona;
use com\bydan\contabilidad\general\tipo_persona\business\data\tipo_persona_data;

//FK


//REL


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

//REL DETALLES




class tipo_persona_logic  extends GeneralEntityLogic implements tipo_persona_logicI {	
	/*GENERAL*/
	public tipo_persona_data $tipo_personaDataAccess;
	//public ?tipo_persona_logic_add $tipo_personaLogicAdditional=null;
	public ?tipo_persona $tipo_persona;
	public array $tipo_personas;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->tipo_personaDataAccess = new tipo_persona_data();			
			$this->tipo_personas = array();
			$this->tipo_persona = new tipo_persona();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->tipo_personaLogicAdditional = new tipo_persona_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->tipo_personaLogicAdditional==null) {
		//	$this->tipo_personaLogicAdditional=new tipo_persona_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->tipo_personaDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->tipo_personaDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->tipo_personaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->tipo_personaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->tipo_personas = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_personas=$this->tipo_personaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_persona_util::refrescarFKDescripciones($this->tipo_personas);
			}
			
			//tipo_persona_logic_add::checktipo_personaToGets($this->tipo_personas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_personas);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->tipo_personas = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_personas=$this->tipo_personaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_persona_util::refrescarFKDescripciones($this->tipo_personas);
			}
			
			//tipo_persona_logic_add::checktipo_personaToGets($this->tipo_personas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_personas);
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
		$this->tipo_persona = new tipo_persona();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->tipo_persona=$this->tipo_personaDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_persona,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_persona_util::refrescarFKDescripcion($this->tipo_persona);
			}
						
			//tipo_persona_logic_add::checktipo_personaToGet($this->tipo_persona,$this->datosCliente);
			//tipo_persona_logic_add::updatetipo_personaToGet($this->tipo_persona);
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
		$this->tipo_persona = new  tipo_persona();
		  		  
        try {		
			$this->tipo_persona=$this->tipo_personaDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_persona,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_persona_util::refrescarFKDescripcion($this->tipo_persona);
			}
			
			//tipo_persona_logic_add::checktipo_personaToGet($this->tipo_persona,$this->datosCliente);
			//tipo_persona_logic_add::updatetipo_personaToGet($this->tipo_persona);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?tipo_persona {
		$tipo_personaLogic = new  tipo_persona_logic();
		  		  
        try {		
			$tipo_personaLogic->setConnexion($connexion);			
			$tipo_personaLogic->getEntity($id);			
			return $tipo_personaLogic->gettipo_persona();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->tipo_persona = new  tipo_persona();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->tipo_persona=$this->tipo_personaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_persona,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_persona_util::refrescarFKDescripcion($this->tipo_persona);
			}
			
			//tipo_persona_logic_add::checktipo_personaToGet($this->tipo_persona,$this->datosCliente);
			//tipo_persona_logic_add::updatetipo_personaToGet($this->tipo_persona);
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
		$this->tipo_persona = new  tipo_persona();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_persona=$this->tipo_personaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_persona,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_persona_util::refrescarFKDescripcion($this->tipo_persona);
			}
			
			//tipo_persona_logic_add::checktipo_personaToGet($this->tipo_persona,$this->datosCliente);
			//tipo_persona_logic_add::updatetipo_personaToGet($this->tipo_persona);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?tipo_persona {
		$tipo_personaLogic = new  tipo_persona_logic();
		  		  
        try {		
			$tipo_personaLogic->setConnexion($connexion);			
			$tipo_personaLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $tipo_personaLogic->gettipo_persona();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tipo_personas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_personas=$this->tipo_personaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_persona_util::refrescarFKDescripciones($this->tipo_personas);
			}
			
			//tipo_persona_logic_add::checktipo_personaToGets($this->tipo_personas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_personas);			
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
		$this->tipo_personas = array();
		  		  
        try {			
			$this->tipo_personas=$this->tipo_personaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_persona_util::refrescarFKDescripciones($this->tipo_personas);
			}
			
			//tipo_persona_logic_add::checktipo_personaToGets($this->tipo_personas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_personas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->tipo_personas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_personas=$this->tipo_personaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_persona_util::refrescarFKDescripciones($this->tipo_personas);
			}
			
			//tipo_persona_logic_add::checktipo_personaToGets($this->tipo_personas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_personas);
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
		$this->tipo_personas = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_personas=$this->tipo_personaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_persona_util::refrescarFKDescripciones($this->tipo_personas);
			}
			
			//tipo_persona_logic_add::checktipo_personaToGets($this->tipo_personas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_personas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$tipo_personaLogic = new  tipo_persona_logic();
		  		  
        try {		
			$tipo_personaLogic->setConnexion($connexion);			
			$tipo_personaLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $tipo_personaLogic->gettipo_personas();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->tipo_personas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_personas=$this->tipo_personaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_persona_util::refrescarFKDescripciones($this->tipo_personas);
			}
			
			//tipo_persona_logic_add::checktipo_personaToGets($this->tipo_personas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_personas);
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
		$this->tipo_personas = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_personas=$this->tipo_personaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_persona_util::refrescarFKDescripciones($this->tipo_personas);
			}
			
			//tipo_persona_logic_add::checktipo_personaToGets($this->tipo_personas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_personas);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->tipo_personas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_personas=$this->tipo_personaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_persona_util::refrescarFKDescripciones($this->tipo_personas);
			}
			
			//tipo_persona_logic_add::checktipo_personaToGets($this->tipo_personas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_personas);
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
		$this->tipo_personas = array();
		  		  
        try {			
			$this->tipo_personas=$this->tipo_personaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_persona_util::refrescarFKDescripciones($this->tipo_personas);
			}	
			
			//tipo_persona_logic_add::checktipo_personaToGets($this->tipo_personas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_personas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tipo_personas = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_personas=$this->tipo_personaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_persona_util::refrescarFKDescripciones($this->tipo_personas);
			}
			
			//tipo_persona_logic_add::checktipo_personaToGets($this->tipo_personas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_personas);
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
		$this->tipo_personas = array();
		  		  
        try {		
			$this->tipo_personas=$this->tipo_personaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_persona_util::refrescarFKDescripciones($this->tipo_personas);
			}
			
			//tipo_persona_logic_add::checktipo_personaToGets($this->tipo_personas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_personas);

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
						
			//tipo_persona_logic_add::checktipo_personaToSave($this->tipo_persona,$this->datosCliente,$this->connexion);	       
			//tipo_persona_logic_add::updatetipo_personaToSave($this->tipo_persona);			
			tipo_persona_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tipo_persona,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->tipo_personaLogicAdditional->checkGeneralEntityToSave($this,$this->tipo_persona,$this->datosCliente,$this->connexion);
			
			
			tipo_persona_data::save($this->tipo_persona, $this->connexion);	    	       	 				
			//tipo_persona_logic_add::checktipo_personaToSaveAfter($this->tipo_persona,$this->datosCliente,$this->connexion);			
			//$this->tipo_personaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tipo_persona,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tipo_persona,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tipo_persona,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tipo_persona_util::refrescarFKDescripcion($this->tipo_persona);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->tipo_persona->getIsDeleted()) {
				$this->tipo_persona=null;
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
						
			/*tipo_persona_logic_add::checktipo_personaToSave($this->tipo_persona,$this->datosCliente,$this->connexion);*/	        
			//tipo_persona_logic_add::updatetipo_personaToSave($this->tipo_persona);			
			//$this->tipo_personaLogicAdditional->checkGeneralEntityToSave($this,$this->tipo_persona,$this->datosCliente,$this->connexion);			
			tipo_persona_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tipo_persona,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			tipo_persona_data::save($this->tipo_persona, $this->connexion);	    	       	 						
			/*tipo_persona_logic_add::checktipo_personaToSaveAfter($this->tipo_persona,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_personaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tipo_persona,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tipo_persona,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tipo_persona,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tipo_persona_util::refrescarFKDescripcion($this->tipo_persona);				
			}
			
			if($this->tipo_persona->getIsDeleted()) {
				$this->tipo_persona=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(tipo_persona $tipo_persona,Connexion $connexion)  {
		$tipo_personaLogic = new  tipo_persona_logic();		  		  
        try {		
			$tipo_personaLogic->setConnexion($connexion);			
			$tipo_personaLogic->settipo_persona($tipo_persona);			
			$tipo_personaLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*tipo_persona_logic_add::checktipo_personaToSaves($this->tipo_personas,$this->datosCliente,$this->connexion);*/	        	
			//$this->tipo_personaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tipo_personas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tipo_personas as $tipo_personaLocal) {				
								
				//tipo_persona_logic_add::updatetipo_personaToSave($tipo_personaLocal);	        	
				tipo_persona_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tipo_personaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				tipo_persona_data::save($tipo_personaLocal, $this->connexion);				
			}
			
			/*tipo_persona_logic_add::checktipo_personaToSavesAfter($this->tipo_personas,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_personaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tipo_personas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_persona_util::refrescarFKDescripciones($this->tipo_personas);
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
			/*tipo_persona_logic_add::checktipo_personaToSaves($this->tipo_personas,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_personaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tipo_personas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tipo_personas as $tipo_personaLocal) {				
								
				//tipo_persona_logic_add::updatetipo_personaToSave($tipo_personaLocal);	        	
				tipo_persona_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tipo_personaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				tipo_persona_data::save($tipo_personaLocal, $this->connexion);				
			}			
			
			/*tipo_persona_logic_add::checktipo_personaToSavesAfter($this->tipo_personas,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_personaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tipo_personas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_persona_util::refrescarFKDescripciones($this->tipo_personas);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $tipo_personas,Connexion $connexion)  {
		$tipo_personaLogic = new  tipo_persona_logic();
		  		  
        try {		
			$tipo_personaLogic->setConnexion($connexion);			
			$tipo_personaLogic->settipo_personas($tipo_personas);			
			$tipo_personaLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$tipo_personasAux=array();
		
		foreach($this->tipo_personas as $tipo_persona) {
			if($tipo_persona->getIsDeleted()==false) {
				$tipo_personasAux[]=$tipo_persona;
			}
		}
		
		$this->tipo_personas=$tipo_personasAux;
	}
	
	public function updateToGetsAuxiliar(array &$tipo_personas) {
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
	
	
	
	public function saveRelacionesWithConnection($tipo_persona,$proveedors,$clientes) {
		$this->saveRelacionesBase($tipo_persona,$proveedors,$clientes,true);
	}

	public function saveRelaciones($tipo_persona,$proveedors,$clientes) {
		$this->saveRelacionesBase($tipo_persona,$proveedors,$clientes,false);
	}

	public function saveRelacionesBase($tipo_persona,$proveedors=array(),$clientes=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$tipo_persona->setproveedors($proveedors);
			$tipo_persona->setclientes($clientes);
			$this->settipo_persona($tipo_persona);

				if(($this->tipo_persona->getIsNew() || $this->tipo_persona->getIsChanged()) && !$this->tipo_persona->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($proveedors,$clientes);

				} else if($this->tipo_persona->getIsDeleted()) {
					$this->saveRelacionesDetalles($proveedors,$clientes);
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
	
	
	public function saveRelacionesDetalles($proveedors=array(),$clientes=array()) {
		try {
	

			$idtipo_personaActual=$this->gettipo_persona()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/proveedor_carga.php');
			proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$proveedorLogic_Desde_tipo_persona=new proveedor_logic();
			$proveedorLogic_Desde_tipo_persona->setproveedors($proveedors);

			$proveedorLogic_Desde_tipo_persona->setConnexion($this->getConnexion());
			$proveedorLogic_Desde_tipo_persona->setDatosCliente($this->datosCliente);

			foreach($proveedorLogic_Desde_tipo_persona->getproveedors() as $proveedor_Desde_tipo_persona) {
				$proveedor_Desde_tipo_persona->setid_tipo_persona($idtipo_personaActual);

				$proveedorLogic_Desde_tipo_persona->setproveedor($proveedor_Desde_tipo_persona);
				$proveedorLogic_Desde_tipo_persona->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/cliente_carga.php');
			cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$clienteLogic_Desde_tipo_persona=new cliente_logic();
			$clienteLogic_Desde_tipo_persona->setclientes($clientes);

			$clienteLogic_Desde_tipo_persona->setConnexion($this->getConnexion());
			$clienteLogic_Desde_tipo_persona->setDatosCliente($this->datosCliente);

			foreach($clienteLogic_Desde_tipo_persona->getclientes() as $cliente_Desde_tipo_persona) {
				$cliente_Desde_tipo_persona->setid_tipo_persona($idtipo_personaActual);

				$clienteLogic_Desde_tipo_persona->setcliente($cliente_Desde_tipo_persona);
				$clienteLogic_Desde_tipo_persona->save();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $tipo_personas,tipo_persona_param_return $tipo_personaParameterGeneral) : tipo_persona_param_return {
		$tipo_personaReturnGeneral=new tipo_persona_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $tipo_personaReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $tipo_personas,tipo_persona_param_return $tipo_personaParameterGeneral) : tipo_persona_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_personaReturnGeneral=new tipo_persona_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_personaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_personas,tipo_persona $tipo_persona,tipo_persona_param_return $tipo_personaParameterGeneral,bool $isEsNuevotipo_persona,array $clases) : tipo_persona_param_return {
		 try {	
			$tipo_personaReturnGeneral=new tipo_persona_param_return();
	
			$tipo_personaReturnGeneral->settipo_persona($tipo_persona);
			$tipo_personaReturnGeneral->settipo_personas($tipo_personas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tipo_personaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $tipo_personaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_personas,tipo_persona $tipo_persona,tipo_persona_param_return $tipo_personaParameterGeneral,bool $isEsNuevotipo_persona,array $clases) : tipo_persona_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_personaReturnGeneral=new tipo_persona_param_return();
	
			$tipo_personaReturnGeneral->settipo_persona($tipo_persona);
			$tipo_personaReturnGeneral->settipo_personas($tipo_personas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tipo_personaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_personaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_personas,tipo_persona $tipo_persona,tipo_persona_param_return $tipo_personaParameterGeneral,bool $isEsNuevotipo_persona,array $clases) : tipo_persona_param_return {
		 try {	
			$tipo_personaReturnGeneral=new tipo_persona_param_return();
	
			$tipo_personaReturnGeneral->settipo_persona($tipo_persona);
			$tipo_personaReturnGeneral->settipo_personas($tipo_personas);
			
			
			
			return $tipo_personaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_personas,tipo_persona $tipo_persona,tipo_persona_param_return $tipo_personaParameterGeneral,bool $isEsNuevotipo_persona,array $clases) : tipo_persona_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_personaReturnGeneral=new tipo_persona_param_return();
	
			$tipo_personaReturnGeneral->settipo_persona($tipo_persona);
			$tipo_personaReturnGeneral->settipo_personas($tipo_personas);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_personaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,tipo_persona $tipo_persona,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,tipo_persona $tipo_persona,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		tipo_persona_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(tipo_persona $tipo_persona,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//tipo_persona_logic_add::updatetipo_personaToGet($this->tipo_persona);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$tipo_persona->setproveedors($this->tipo_personaDataAccess->getproveedors($this->connexion,$tipo_persona));
		$tipo_persona->setclientes($this->tipo_personaDataAccess->getclientes($this->connexion,$tipo_persona));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_persona->setproveedors($this->tipo_personaDataAccess->getproveedors($this->connexion,$tipo_persona));

				if($this->isConDeep) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedorLogic->setproveedors($tipo_persona->getproveedors());
					$classesLocal=proveedor_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					proveedor_util::refrescarFKDescripciones($proveedorLogic->getproveedors());
					$tipo_persona->setproveedors($proveedorLogic->getproveedors());
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_persona->setclientes($this->tipo_personaDataAccess->getclientes($this->connexion,$tipo_persona));

				if($this->isConDeep) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->setclientes($tipo_persona->getclientes());
					$classesLocal=cliente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$clienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cliente_util::refrescarFKDescripciones($clienteLogic->getclientes());
					$tipo_persona->setclientes($clienteLogic->getclientes());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


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
			$tipo_persona->setproveedors($this->tipo_personaDataAccess->getproveedors($this->connexion,$tipo_persona));
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
			$tipo_persona->setclientes($this->tipo_personaDataAccess->getclientes($this->connexion,$tipo_persona));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {


		$tipo_persona->setproveedors($this->tipo_personaDataAccess->getproveedors($this->connexion,$tipo_persona));

		foreach($tipo_persona->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
		}

		$tipo_persona->setclientes($this->tipo_personaDataAccess->getclientes($this->connexion,$tipo_persona));

		foreach($tipo_persona->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_persona->setproveedors($this->tipo_personaDataAccess->getproveedors($this->connexion,$tipo_persona));

				foreach($tipo_persona->getproveedors() as $proveedor) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_persona->setclientes($this->tipo_personaDataAccess->getclientes($this->connexion,$tipo_persona));

				foreach($tipo_persona->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


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
			$tipo_persona->setproveedors($this->tipo_personaDataAccess->getproveedors($this->connexion,$tipo_persona));

			foreach($tipo_persona->getproveedors() as $proveedor) {
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
			$tipo_persona->setclientes($this->tipo_personaDataAccess->getclientes($this->connexion,$tipo_persona));

			foreach($tipo_persona->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(tipo_persona $tipo_persona,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//tipo_persona_logic_add::updatetipo_personaToSave($this->tipo_persona);			
			
			if(!$paraDeleteCascade) {				
				tipo_persona_data::save($tipo_persona, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($tipo_persona->getproveedors() as $proveedor) {
			$proveedor->setid_tipo_persona($tipo_persona->getId());
			proveedor_data::save($proveedor,$this->connexion);
		}


		foreach($tipo_persona->getclientes() as $cliente) {
			$cliente->setid_tipo_persona($tipo_persona->getId());
			cliente_data::save($cliente,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_persona->getproveedors() as $proveedor) {
					$proveedor->setid_tipo_persona($tipo_persona->getId());
					proveedor_data::save($proveedor,$this->connexion);
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_persona->getclientes() as $cliente) {
					$cliente->setid_tipo_persona($tipo_persona->getId());
					cliente_data::save($cliente,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


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

			foreach($tipo_persona->getproveedors() as $proveedor) {
				$proveedor->setid_tipo_persona($tipo_persona->getId());
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

			foreach($tipo_persona->getclientes() as $cliente) {
				$cliente->setid_tipo_persona($tipo_persona->getId());
				cliente_data::save($cliente,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($tipo_persona->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedor->setid_tipo_persona($tipo_persona->getId());
			proveedor_data::save($proveedor,$this->connexion);
			$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($tipo_persona->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$cliente->setid_tipo_persona($tipo_persona->getId());
			cliente_data::save($cliente,$this->connexion);
			$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_persona->getproveedors() as $proveedor) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedor->setid_tipo_persona($tipo_persona->getId());
					proveedor_data::save($proveedor,$this->connexion);
					$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_persona->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$cliente->setid_tipo_persona($tipo_persona->getId());
					cliente_data::save($cliente,$this->connexion);
					$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {



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

			foreach($tipo_persona->getproveedors() as $proveedor) {
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedor->setid_tipo_persona($tipo_persona->getId());
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

			foreach($tipo_persona->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$cliente->setid_tipo_persona($tipo_persona->getId());
				cliente_data::save($cliente,$this->connexion);
				$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				tipo_persona_data::save($tipo_persona, $this->connexion);
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
			
			$this->deepLoad($this->tipo_persona,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->tipo_personas as $tipo_persona) {
				$this->deepLoad($tipo_persona,$isDeep,$deepLoadType,$clases);
								
				tipo_persona_util::refrescarFKDescripciones($this->tipo_personas);
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
			
			foreach($this->tipo_personas as $tipo_persona) {
				$this->deepLoad($tipo_persona,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->tipo_persona,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->tipo_personas as $tipo_persona) {
				$this->deepSave($tipo_persona,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->tipo_personas as $tipo_persona) {
				$this->deepSave($tipo_persona,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(proveedor::$class);
				$classes[]=new Classe(cliente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
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

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

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

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function gettipo_persona() : ?tipo_persona {	
		/*
		tipo_persona_logic_add::checktipo_personaToGet($this->tipo_persona,$this->datosCliente);
		tipo_persona_logic_add::updatetipo_personaToGet($this->tipo_persona);
		*/
			
		return $this->tipo_persona;
	}
		
	public function settipo_persona(tipo_persona $newtipo_persona) {
		$this->tipo_persona = $newtipo_persona;
	}
	
	public function gettipo_personas() : array {		
		/*
		tipo_persona_logic_add::checktipo_personaToGets($this->tipo_personas,$this->datosCliente);
		
		foreach ($this->tipo_personas as $tipo_personaLocal ) {
			tipo_persona_logic_add::updatetipo_personaToGet($tipo_personaLocal);
		}
		*/
		
		return $this->tipo_personas;
	}
	
	public function settipo_personas(array $newtipo_personas) {
		$this->tipo_personas = $newtipo_personas;
	}
	
	public function gettipo_personaDataAccess() : tipo_persona_data {
		return $this->tipo_personaDataAccess;
	}
	
	public function settipo_personaDataAccess(tipo_persona_data $newtipo_personaDataAccess) {
		$this->tipo_personaDataAccess = $newtipo_personaDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        tipo_persona_carga::$CONTROLLER;;        
		
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
