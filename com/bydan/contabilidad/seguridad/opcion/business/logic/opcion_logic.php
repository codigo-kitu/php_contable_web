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

namespace com\bydan\contabilidad\seguridad\opcion\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\opcion\util\opcion_carga;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_param_return;

use com\bydan\contabilidad\seguridad\opcion\presentation\session\opcion_session;

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

use com\bydan\contabilidad\seguridad\auditoria\business\entity\auditoria;

use com\bydan\contabilidad\seguridad\opcion\util\opcion_util;
use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;
use com\bydan\contabilidad\seguridad\opcion\business\data\opcion_data;

//FK


use com\bydan\contabilidad\seguridad\sistema\business\entity\sistema;
use com\bydan\contabilidad\seguridad\sistema\business\data\sistema_data;
use com\bydan\contabilidad\seguridad\sistema\business\logic\sistema_logic;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_util;

use com\bydan\contabilidad\seguridad\grupo_opcion\business\entity\grupo_opcion;
use com\bydan\contabilidad\seguridad\grupo_opcion\business\data\grupo_opcion_data;
use com\bydan\contabilidad\seguridad\grupo_opcion\business\logic\grupo_opcion_logic;
use com\bydan\contabilidad\seguridad\grupo_opcion\util\grupo_opcion_util;

use com\bydan\contabilidad\seguridad\modulo\business\data\modulo_data;
use com\bydan\contabilidad\seguridad\modulo\business\logic\modulo_logic;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;

//REL


use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;
use com\bydan\contabilidad\seguridad\perfil\business\data\perfil_data;
use com\bydan\contabilidad\seguridad\perfil\business\logic\perfil_logic;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;

use com\bydan\contabilidad\seguridad\accion\business\entity\accion;
use com\bydan\contabilidad\seguridad\accion\business\data\accion_data;
use com\bydan\contabilidad\seguridad\accion\business\logic\accion_logic;
use com\bydan\contabilidad\seguridad\accion\util\accion_carga;
use com\bydan\contabilidad\seguridad\accion\util\accion_util;

use com\bydan\contabilidad\seguridad\perfil_opcion\business\entity\perfil_opcion;
use com\bydan\contabilidad\seguridad\perfil_opcion\business\data\perfil_opcion_data;
use com\bydan\contabilidad\seguridad\perfil_opcion\business\logic\perfil_opcion_logic;
use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_carga;
use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_util;

use com\bydan\contabilidad\seguridad\campo\business\entity\campo;
use com\bydan\contabilidad\seguridad\campo\business\data\campo_data;
use com\bydan\contabilidad\seguridad\campo\business\logic\campo_logic;
use com\bydan\contabilidad\seguridad\campo\util\campo_carga;
use com\bydan\contabilidad\seguridad\campo\util\campo_util;

//REL DETALLES

use com\bydan\contabilidad\seguridad\perfil_accion\util\perfil_accion_carga;
use com\bydan\contabilidad\seguridad\perfil_campo\util\perfil_campo_carga;



class opcion_logic  extends GeneralEntityLogic implements opcion_logicI {	
	/*GENERAL*/
	public opcion_data $opcionDataAccess;
	//public ?opcion_logic_add $opcionLogicAdditional=null;
	public ?opcion $opcion;
	public array $opcions;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->opcionDataAccess = new opcion_data();			
			$this->opcions = array();
			$this->opcion = new opcion();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->opcionLogicAdditional = new opcion_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->opcionLogicAdditional==null) {
		//	$this->opcionLogicAdditional=new opcion_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->opcionDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->opcionDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->opcionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->opcionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->opcions = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->opcions=$this->opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				opcion_util::refrescarFKDescripciones($this->opcions);
			}
			
			//opcion_logic_add::checkopcionToGets($this->opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->opcions);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->opcions = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->opcions=$this->opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				opcion_util::refrescarFKDescripciones($this->opcions);
			}
			
			//opcion_logic_add::checkopcionToGets($this->opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->opcions);
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
		$this->opcion = new opcion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->opcion=$this->opcionDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				opcion_util::refrescarFKDescripcion($this->opcion);
			}
						
			//opcion_logic_add::checkopcionToGet($this->opcion,$this->datosCliente);
			//opcion_logic_add::updateopcionToGet($this->opcion);
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
		$this->opcion = new  opcion();
		  		  
        try {		
			$this->opcion=$this->opcionDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				opcion_util::refrescarFKDescripcion($this->opcion);
			}
			
			//opcion_logic_add::checkopcionToGet($this->opcion,$this->datosCliente);
			//opcion_logic_add::updateopcionToGet($this->opcion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?opcion {
		$opcionLogic = new  opcion_logic();
		  		  
        try {		
			$opcionLogic->setConnexion($connexion);			
			$opcionLogic->getEntity($id);			
			return $opcionLogic->getopcion();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->opcion = new  opcion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->opcion=$this->opcionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				opcion_util::refrescarFKDescripcion($this->opcion);
			}
			
			//opcion_logic_add::checkopcionToGet($this->opcion,$this->datosCliente);
			//opcion_logic_add::updateopcionToGet($this->opcion);
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
		$this->opcion = new  opcion();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->opcion=$this->opcionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				opcion_util::refrescarFKDescripcion($this->opcion);
			}
			
			//opcion_logic_add::checkopcionToGet($this->opcion,$this->datosCliente);
			//opcion_logic_add::updateopcionToGet($this->opcion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?opcion {
		$opcionLogic = new  opcion_logic();
		  		  
        try {		
			$opcionLogic->setConnexion($connexion);			
			$opcionLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $opcionLogic->getopcion();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->opcions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->opcions=$this->opcionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				opcion_util::refrescarFKDescripciones($this->opcions);
			}
			
			//opcion_logic_add::checkopcionToGets($this->opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->opcions);			
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
		$this->opcions = array();
		  		  
        try {			
			$this->opcions=$this->opcionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				opcion_util::refrescarFKDescripciones($this->opcions);
			}
			
			//opcion_logic_add::checkopcionToGets($this->opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->opcions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->opcions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->opcions=$this->opcionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				opcion_util::refrescarFKDescripciones($this->opcions);
			}
			
			//opcion_logic_add::checkopcionToGets($this->opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->opcions);
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
		$this->opcions = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->opcions=$this->opcionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				opcion_util::refrescarFKDescripciones($this->opcions);
			}
			
			//opcion_logic_add::checkopcionToGets($this->opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->opcions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$opcionLogic = new  opcion_logic();
		  		  
        try {		
			$opcionLogic->setConnexion($connexion);			
			$opcionLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $opcionLogic->getopcions();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->opcions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->opcions=$this->opcionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				opcion_util::refrescarFKDescripciones($this->opcions);
			}
			
			//opcion_logic_add::checkopcionToGets($this->opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->opcions);
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
		$this->opcions = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->opcions=$this->opcionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				opcion_util::refrescarFKDescripciones($this->opcions);
			}
			
			//opcion_logic_add::checkopcionToGets($this->opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->opcions);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->opcions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->opcions=$this->opcionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				opcion_util::refrescarFKDescripciones($this->opcions);
			}
			
			//opcion_logic_add::checkopcionToGets($this->opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->opcions);
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
		$this->opcions = array();
		  		  
        try {			
			$this->opcions=$this->opcionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				opcion_util::refrescarFKDescripciones($this->opcions);
			}	
			
			//opcion_logic_add::checkopcionToGets($this->opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->opcions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->opcions = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->opcions=$this->opcionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				opcion_util::refrescarFKDescripciones($this->opcions);
			}
			
			//opcion_logic_add::checkopcionToGets($this->opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->opcions);
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
		$this->opcions = array();
		  		  
        try {		
			$this->opcions=$this->opcionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				opcion_util::refrescarFKDescripciones($this->opcions);
			}
			
			//opcion_logic_add::checkopcionToGets($this->opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->opcions);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsBusquedaPorIdSistemaPorIdOpcionWithConnection(string $strFinalQuery,Pagination $pagination,int $id_sistema,?int $id_opcion) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sistema= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sistema->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sistema,opcion_util::$ID_SISTEMA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sistema);

			$parameterSelectionGeneralid_opcion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_opcion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_opcion,opcion_util::$ID_OPCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_opcion);

			$this->opcions=$this->opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				opcion_util::refrescarFKDescripciones($this->opcions);
			}
			//opcion_logic_add::checkopcionToGets($this->opcions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->opcions);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsBusquedaPorIdSistemaPorIdOpcion(string $strFinalQuery,Pagination $pagination,int $id_sistema,?int $id_opcion) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sistema= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sistema->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sistema,opcion_util::$ID_SISTEMA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sistema);

			$parameterSelectionGeneralid_opcion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_opcion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_opcion,opcion_util::$ID_OPCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_opcion);

			$this->opcions=$this->opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				opcion_util::refrescarFKDescripciones($this->opcions);
			}
			//opcion_logic_add::checkopcionToGets($this->opcions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->opcions);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsBusquedaPorIdSistemaPorNombreWithConnection(string $strFinalQuery,Pagination $pagination,int $id_sistema,string $nombre) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sistema= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sistema->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sistema,opcion_util::$ID_SISTEMA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sistema);

			$parameterSelectionGeneralnombre= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$nombre."%",opcion_util::$NOMBRE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre);

			$this->opcions=$this->opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				opcion_util::refrescarFKDescripciones($this->opcions);
			}
			//opcion_logic_add::checkopcionToGets($this->opcions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->opcions);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsBusquedaPorIdSistemaPorNombre(string $strFinalQuery,Pagination $pagination,int $id_sistema,string $nombre) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sistema= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sistema->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sistema,opcion_util::$ID_SISTEMA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sistema);

			$parameterSelectionGeneralnombre= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$nombre."%",opcion_util::$NOMBRE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre);

			$this->opcions=$this->opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				opcion_util::refrescarFKDescripciones($this->opcions);
			}
			//opcion_logic_add::checkopcionToGets($this->opcions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->opcions);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idgrupo_opcionWithConnection(string $strFinalQuery,Pagination $pagination,int $id_grupo_opcion) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_grupo_opcion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_grupo_opcion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_grupo_opcion,opcion_util::$ID_GRUPO_OPCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_grupo_opcion);

			$this->opcions=$this->opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				opcion_util::refrescarFKDescripciones($this->opcions);
			}
			//opcion_logic_add::checkopcionToGets($this->opcions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->opcions);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idgrupo_opcion(string $strFinalQuery,Pagination $pagination,int $id_grupo_opcion) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_grupo_opcion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_grupo_opcion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_grupo_opcion,opcion_util::$ID_GRUPO_OPCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_grupo_opcion);

			$this->opcions=$this->opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				opcion_util::refrescarFKDescripciones($this->opcions);
			}
			//opcion_logic_add::checkopcionToGets($this->opcions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->opcions);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdmoduloWithConnection(string $strFinalQuery,Pagination $pagination,int $id_modulo) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_modulo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_modulo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_modulo,opcion_util::$ID_MODULO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_modulo);

			$this->opcions=$this->opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				opcion_util::refrescarFKDescripciones($this->opcions);
			}
			//opcion_logic_add::checkopcionToGets($this->opcions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->opcions);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idmodulo(string $strFinalQuery,Pagination $pagination,int $id_modulo) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_modulo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_modulo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_modulo,opcion_util::$ID_MODULO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_modulo);

			$this->opcions=$this->opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				opcion_util::refrescarFKDescripciones($this->opcions);
			}
			//opcion_logic_add::checkopcionToGets($this->opcions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->opcions);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdopcionWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_opcion) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_opcion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_opcion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_opcion,opcion_util::$ID_OPCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_opcion);

			$this->opcions=$this->opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				opcion_util::refrescarFKDescripciones($this->opcions);
			}
			//opcion_logic_add::checkopcionToGets($this->opcions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->opcions);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idopcion(string $strFinalQuery,Pagination $pagination,?int $id_opcion) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_opcion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_opcion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_opcion,opcion_util::$ID_OPCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_opcion);

			$this->opcions=$this->opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				opcion_util::refrescarFKDescripciones($this->opcions);
			}
			//opcion_logic_add::checkopcionToGets($this->opcions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->opcions);
		} catch(Exception $e) {
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
			$parameterSelectionGeneralid_sistema->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sistema,opcion_util::$ID_SISTEMA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sistema);

			$this->opcions=$this->opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				opcion_util::refrescarFKDescripciones($this->opcions);
			}
			//opcion_logic_add::checkopcionToGets($this->opcions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->opcions);

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
			$parameterSelectionGeneralid_sistema->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sistema,opcion_util::$ID_SISTEMA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sistema);

			$this->opcions=$this->opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				opcion_util::refrescarFKDescripciones($this->opcions);
			}
			//opcion_logic_add::checkopcionToGets($this->opcions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->opcions);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getPorIdSistemaPorIdOpcionPorNombreWithConnection(int $id_sistema,?int $id_opcion,string $nombre) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$parameterSelectionGeneralid_sistema= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sistema->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sistema,opcion_util::$ID_SISTEMA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sistema);

			$parameterSelectionGeneralid_opcion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_opcion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_opcion,opcion_util::$ID_OPCION,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_opcion);

			$parameterSelectionGeneralnombre= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre->setParameterSelectionGeneralEqual(ParameterType::$STRING,$nombre,opcion_util::$NOMBRE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre);

			$this->opcion=$this->opcionDataAccess->getEntityConnexionWhereSelect($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoad($this->opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());

				opcion_util::refrescarFKDescripcion($this->opcion);
			}

			//opcion_logic_add::checkopcionToGet($this->opcion,$this->datosCliente);
			//opcion_logic_add::updateopcionToGet($this->opcion);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();
		}
	}

	public function getPorIdSistemaPorIdOpcionPorNombre(int $id_sistema,?int $id_opcion,string $nombre) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$parameterSelectionGeneralid_sistema= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sistema->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sistema,opcion_util::$ID_SISTEMA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sistema);

			$parameterSelectionGeneralid_opcion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_opcion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_opcion,opcion_util::$ID_OPCION,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_opcion);

			$parameterSelectionGeneralnombre= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre->setParameterSelectionGeneralEqual(ParameterType::$STRING,$nombre,opcion_util::$NOMBRE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre);

			$this->opcion=$this->opcionDataAccess->getEntityConnexionWhereSelect($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoad($this->opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());

				opcion_util::refrescarFKDescripcion($this->opcion);
			}

			//opcion_logic_add::checkopcionToGet($this->opcion,$this->datosCliente);
			//opcion_logic_add::updateopcionToGet($this->opcion);
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
						
			//opcion_logic_add::checkopcionToSave($this->opcion,$this->datosCliente,$this->connexion);	       
			//opcion_logic_add::updateopcionToSave($this->opcion);			
			opcion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->opcion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->opcionLogicAdditional->checkGeneralEntityToSave($this,$this->opcion,$this->datosCliente,$this->connexion);
			
			
			opcion_data::save($this->opcion, $this->connexion);	    	       	 				
			//opcion_logic_add::checkopcionToSaveAfter($this->opcion,$this->datosCliente,$this->connexion);			
			//$this->opcionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->opcion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				opcion_util::refrescarFKDescripcion($this->opcion);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->opcion->getIsDeleted()) {
				$this->opcion=null;
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
						
			/*opcion_logic_add::checkopcionToSave($this->opcion,$this->datosCliente,$this->connexion);*/	        
			//opcion_logic_add::updateopcionToSave($this->opcion);			
			//$this->opcionLogicAdditional->checkGeneralEntityToSave($this,$this->opcion,$this->datosCliente,$this->connexion);			
			opcion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->opcion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			opcion_data::save($this->opcion, $this->connexion);	    	       	 						
			/*opcion_logic_add::checkopcionToSaveAfter($this->opcion,$this->datosCliente,$this->connexion);*/			
			//$this->opcionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->opcion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				opcion_util::refrescarFKDescripcion($this->opcion);				
			}
			
			if($this->opcion->getIsDeleted()) {
				$this->opcion=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(opcion $opcion,Connexion $connexion)  {
		$opcionLogic = new  opcion_logic();		  		  
        try {		
			$opcionLogic->setConnexion($connexion);			
			$opcionLogic->setopcion($opcion);			
			$opcionLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*opcion_logic_add::checkopcionToSaves($this->opcions,$this->datosCliente,$this->connexion);*/	        	
			//$this->opcionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->opcions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->opcions as $opcionLocal) {				
								
				//opcion_logic_add::updateopcionToSave($opcionLocal);	        	
				opcion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$opcionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				opcion_data::save($opcionLocal, $this->connexion);				
			}
			
			/*opcion_logic_add::checkopcionToSavesAfter($this->opcions,$this->datosCliente,$this->connexion);*/			
			//$this->opcionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->opcions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				opcion_util::refrescarFKDescripciones($this->opcions);
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
			/*opcion_logic_add::checkopcionToSaves($this->opcions,$this->datosCliente,$this->connexion);*/			
			//$this->opcionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->opcions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->opcions as $opcionLocal) {				
								
				//opcion_logic_add::updateopcionToSave($opcionLocal);	        	
				opcion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$opcionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				opcion_data::save($opcionLocal, $this->connexion);				
			}			
			
			/*opcion_logic_add::checkopcionToSavesAfter($this->opcions,$this->datosCliente,$this->connexion);*/			
			//$this->opcionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->opcions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				opcion_util::refrescarFKDescripciones($this->opcions);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $opcions,Connexion $connexion)  {
		$opcionLogic = new  opcion_logic();
		  		  
        try {		
			$opcionLogic->setConnexion($connexion);			
			$opcionLogic->setopcions($opcions);			
			$opcionLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$opcionsAux=array();
		
		foreach($this->opcions as $opcion) {
			if($opcion->getIsDeleted()==false) {
				$opcionsAux[]=$opcion;
			}
		}
		
		$this->opcions=$opcionsAux;
	}
	
	public function updateToGetsAuxiliar(array &$opcions) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->opcions as $opcion) {
				
				$opcion->setid_sistema_Descripcion(opcion_util::getsistemaDescripcion($opcion->getsistema()));
				$opcion->setid_opcion_Descripcion(opcion_util::getopcionDescripcion($opcion->getopcion()));
				$opcion->setid_grupo_opcion_Descripcion(opcion_util::getgrupo_opcionDescripcion($opcion->getgrupo_opcion()));
				$opcion->setid_modulo_Descripcion(opcion_util::getmoduloDescripcion($opcion->getmodulo()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$opcion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$opcion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$opcion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$opcionForeignKey=new opcion_param_return();//opcionForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sistema',$strRecargarFkTipos,',')) {
				$this->cargarCombossistemasFK($this->connexion,$strRecargarFkQuery,$opcionForeignKey,$opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_opcion',$strRecargarFkTipos,',')) {
				$this->cargarCombosopcionsFK($this->connexion,$strRecargarFkQuery,$opcionForeignKey,$opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_grupo_opcion',$strRecargarFkTipos,',')) {
				$this->cargarCombosgrupo_opcionsFK($this->connexion,$strRecargarFkQuery,$opcionForeignKey,$opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_modulo',$strRecargarFkTipos,',')) {
				$this->cargarCombosmodulosFK($this->connexion,$strRecargarFkQuery,$opcionForeignKey,$opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sistema',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossistemasFK($this->connexion,' where id=-1 ',$opcionForeignKey,$opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_opcion',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosopcionsFK($this->connexion,' where id=-1 ',$opcionForeignKey,$opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_grupo_opcion',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosgrupo_opcionsFK($this->connexion,' where id=-1 ',$opcionForeignKey,$opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_modulo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosmodulosFK($this->connexion,' where id=-1 ',$opcionForeignKey,$opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $opcionForeignKey;
			
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
	
	
	public function cargarCombossistemasFK($connexion=null,$strRecargarFkQuery='',$opcionForeignKey,$opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sistemaLogic= new sistema_logic();
		$pagination= new Pagination();
		$opcionForeignKey->sistemasFK=array();

		$sistemaLogic->setConnexion($connexion);
		$sistemaLogic->getsistemaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($opcion_session==null) {
			$opcion_session=new opcion_session();
		}
		
		if($opcion_session->bitBusquedaDesdeFKSesionsistema!=true) {
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
				if($opcionForeignKey->idsistemaDefaultFK==0) {
					$opcionForeignKey->idsistemaDefaultFK=$sistemaLocal->getId();
				}

				$opcionForeignKey->sistemasFK[$sistemaLocal->getId()]=opcion_util::getsistemaDescripcion($sistemaLocal);
			}

		} else {

			if($opcion_session->bigidsistemaActual!=null && $opcion_session->bigidsistemaActual > 0) {
				$sistemaLogic->getEntity($opcion_session->bigidsistemaActual);//WithConnection

				$opcionForeignKey->sistemasFK[$sistemaLogic->getsistema()->getId()]=opcion_util::getsistemaDescripcion($sistemaLogic->getsistema());
				$opcionForeignKey->idsistemaDefaultFK=$sistemaLogic->getsistema()->getId();
			}
		}
	}

	public function cargarCombosopcionsFK($connexion=null,$strRecargarFkQuery='',$opcionForeignKey,$opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$opcionLogic= new opcion_logic();
		$pagination= new Pagination();
		$opcionForeignKey->opcionsFK=array();

		$opcionLogic->setConnexion($connexion);
		$opcionLogic->getopcionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($opcion_session==null) {
			$opcion_session=new opcion_session();
		}
		
		if($opcion_session->bitBusquedaDesdeFKSesionopcion!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=opcion_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalopcion=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalopcion=Funciones::GetFinalQueryAppend($finalQueryGlobalopcion, '');
				$finalQueryGlobalopcion.=opcion_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalopcion.$strRecargarFkQuery;		

				$opcionLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($opcionLogic->getopcions() as $opcionLocal ) {
				if($opcionForeignKey->idopcionDefaultFK==0) {
					$opcionForeignKey->idopcionDefaultFK=$opcionLocal->getId();
				}

				$opcionForeignKey->opcionsFK[$opcionLocal->getId()]=opcion_util::getopcionDescripcion($opcionLocal);
			}

		} else {

			if($opcion_session->bigidopcionActual!=null && $opcion_session->bigidopcionActual > 0) {
				$opcionLogic->getEntity($opcion_session->bigidopcionActual);//WithConnection

				$opcionForeignKey->opcionsFK[$opcionLogic->getopcion()->getId()]=opcion_util::getopcionDescripcion($opcionLogic->getopcion());
				$opcionForeignKey->idopcionDefaultFK=$opcionLogic->getopcion()->getId();
			}
		}
	}

	public function cargarCombosgrupo_opcionsFK($connexion=null,$strRecargarFkQuery='',$opcionForeignKey,$opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$grupo_opcionLogic= new grupo_opcion_logic();
		$pagination= new Pagination();
		$opcionForeignKey->grupo_opcionsFK=array();

		$grupo_opcionLogic->setConnexion($connexion);
		$grupo_opcionLogic->getgrupo_opcionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($opcion_session==null) {
			$opcion_session=new opcion_session();
		}
		
		if($opcion_session->bitBusquedaDesdeFKSesiongrupo_opcion!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=grupo_opcion_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalgrupo_opcion=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalgrupo_opcion=Funciones::GetFinalQueryAppend($finalQueryGlobalgrupo_opcion, '');
				$finalQueryGlobalgrupo_opcion.=grupo_opcion_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalgrupo_opcion.$strRecargarFkQuery;		

				$grupo_opcionLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($grupo_opcionLogic->getgrupo_opcions() as $grupo_opcionLocal ) {
				if($opcionForeignKey->idgrupo_opcionDefaultFK==0) {
					$opcionForeignKey->idgrupo_opcionDefaultFK=$grupo_opcionLocal->getId();
				}

				$opcionForeignKey->grupo_opcionsFK[$grupo_opcionLocal->getId()]=opcion_util::getgrupo_opcionDescripcion($grupo_opcionLocal);
			}

		} else {

			if($opcion_session->bigidgrupo_opcionActual!=null && $opcion_session->bigidgrupo_opcionActual > 0) {
				$grupo_opcionLogic->getEntity($opcion_session->bigidgrupo_opcionActual);//WithConnection

				$opcionForeignKey->grupo_opcionsFK[$grupo_opcionLogic->getgrupo_opcion()->getId()]=opcion_util::getgrupo_opcionDescripcion($grupo_opcionLogic->getgrupo_opcion());
				$opcionForeignKey->idgrupo_opcionDefaultFK=$grupo_opcionLogic->getgrupo_opcion()->getId();
			}
		}
	}

	public function cargarCombosmodulosFK($connexion=null,$strRecargarFkQuery='',$opcionForeignKey,$opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$moduloLogic= new modulo_logic();
		$pagination= new Pagination();
		$opcionForeignKey->modulosFK=array();

		$moduloLogic->setConnexion($connexion);
		$moduloLogic->getmoduloDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($opcion_session==null) {
			$opcion_session=new opcion_session();
		}
		
		if($opcion_session->bitBusquedaDesdeFKSesionmodulo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=modulo_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalmodulo=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalmodulo=Funciones::GetFinalQueryAppend($finalQueryGlobalmodulo, '');
				$finalQueryGlobalmodulo.=modulo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalmodulo.$strRecargarFkQuery;		

				$moduloLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($moduloLogic->getmodulos() as $moduloLocal ) {
				if($opcionForeignKey->idmoduloDefaultFK==0) {
					$opcionForeignKey->idmoduloDefaultFK=$moduloLocal->getId();
				}

				$opcionForeignKey->modulosFK[$moduloLocal->getId()]=opcion_util::getmoduloDescripcion($moduloLocal);
			}

		} else {

			if($opcion_session->bigidmoduloActual!=null && $opcion_session->bigidmoduloActual > 0) {
				$moduloLogic->getEntity($opcion_session->bigidmoduloActual);//WithConnection

				$opcionForeignKey->modulosFK[$moduloLogic->getmodulo()->getId()]=opcion_util::getmoduloDescripcion($moduloLogic->getmodulo());
				$opcionForeignKey->idmoduloDefaultFK=$moduloLogic->getmodulo()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($opcion,$opcions,$accions,$perfilopcions,$campos) {
		$this->saveRelacionesBase($opcion,$opcions,$accions,$perfilopcions,$campos,true);
	}

	public function saveRelaciones($opcion,$opcions,$accions,$perfilopcions,$campos) {
		$this->saveRelacionesBase($opcion,$opcions,$accions,$perfilopcions,$campos,false);
	}

	public function saveRelacionesBase($opcion,$opcions=array(),$accions=array(),$perfilopcions=array(),$campos=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$opcion->setopcions($opcions);
			$opcion->setaccions($accions);
			$opcion->setperfil_opcions($perfilopcions);
			$opcion->setcampos($campos);
			$this->setopcion($opcion);

			if(true) {

				//opcion_logic_add::updateRelacionesToSave($opcion,$this);

				if(($this->opcion->getIsNew() || $this->opcion->getIsChanged()) && !$this->opcion->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($opcions,$accions,$perfilopcions,$campos);

				} else if($this->opcion->getIsDeleted()) {
					$this->saveRelacionesDetalles($opcions,$accions,$perfilopcions,$campos);
					$this->save();
				}

				//opcion_logic_add::updateRelacionesToSaveAfter($opcion,$this);

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
	
	
	public function saveRelacionesDetalles($opcions=array(),$accions=array(),$perfilopcions=array(),$campos=array()) {
		try {
	

			$idopcionActual=$this->getopcion()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/opcion_carga.php');
			opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$opcionLogicHijos_Desde_opcion=new opcion_logic();
			$opcionLogicHijos_Desde_opcion->setopcions($opcions);

			$opcionLogicHijos_Desde_opcion->setConnexion($this->getConnexion());
			$opcionLogicHijos_Desde_opcion->setDatosCliente($this->datosCliente);

			foreach($opcionLogicHijos_Desde_opcion->getopcions() as $opcionHijos_Desde_opcion) {
				$opcionHijos_Desde_opcion->setid_opcion($idopcionActual);

				$opcionLogicHijos_Desde_opcion->setopcion($opcionHijos_Desde_opcion);
				$opcionLogicHijos_Desde_opcion->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/accion_carga.php');
			accion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$accionLogic_Desde_opcion=new accion_logic();
			$accionLogic_Desde_opcion->setaccions($accions);

			$accionLogic_Desde_opcion->setConnexion($this->getConnexion());
			$accionLogic_Desde_opcion->setDatosCliente($this->datosCliente);

			foreach($accionLogic_Desde_opcion->getaccions() as $accion_Desde_opcion) {
				$accion_Desde_opcion->setid_opcion($idopcionActual);

				$accionLogic_Desde_opcion->setaccion($accion_Desde_opcion);
				$accionLogic_Desde_opcion->save();

				$idaccionActual=$accion_Desde_opcion->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/perfil_accion_carga.php');
				perfil_accion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$perfilaccionLogic_Desde_accion=new perfil_accion_logic();

				if($accion_Desde_opcion->getperfil_accions()==null){
					$accion_Desde_opcion->setperfil_accions(array());
				}

				$perfilaccionLogic_Desde_accion->setperfil_accions($accion_Desde_opcion->getperfil_accions());

				$perfilaccionLogic_Desde_accion->setConnexion($this->getConnexion());
				$perfilaccionLogic_Desde_accion->setDatosCliente($this->datosCliente);

				foreach($perfilaccionLogic_Desde_accion->getperfil_accions() as $perfilaccion_Desde_accion) {
					$perfilaccion_Desde_accion->setid_accion($idaccionActual);
				}

				$perfilaccionLogic_Desde_accion->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/perfil_opcion_carga.php');
			perfil_opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$perfilopcionLogic_Desde_opcion=new perfil_opcion_logic();
			$perfilopcionLogic_Desde_opcion->setperfil_opcions($perfilopcions);

			$perfilopcionLogic_Desde_opcion->setConnexion($this->getConnexion());
			$perfilopcionLogic_Desde_opcion->setDatosCliente($this->datosCliente);

			foreach($perfilopcionLogic_Desde_opcion->getperfil_opcions() as $perfilopcion_Desde_opcion) {
				$perfilopcion_Desde_opcion->setid_opcion($idopcionActual);
			}

			$perfilopcionLogic_Desde_opcion->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/campo_carga.php');
			campo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$campoLogic_Desde_opcion=new campo_logic();
			$campoLogic_Desde_opcion->setcampos($campos);

			$campoLogic_Desde_opcion->setConnexion($this->getConnexion());
			$campoLogic_Desde_opcion->setDatosCliente($this->datosCliente);

			foreach($campoLogic_Desde_opcion->getcampos() as $campo_Desde_opcion) {
				$campo_Desde_opcion->setid_opcion($idopcionActual);

				$campoLogic_Desde_opcion->setcampo($campo_Desde_opcion);
				$campoLogic_Desde_opcion->save();

				$idcampoActual=$campo_Desde_opcion->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/perfil_campo_carga.php');
				perfil_campo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$perfilcampoLogic_Desde_campo=new perfil_campo_logic();

				if($campo_Desde_opcion->getperfil_campos()==null){
					$campo_Desde_opcion->setperfil_campos(array());
				}

				$perfilcampoLogic_Desde_campo->setperfil_campos($campo_Desde_opcion->getperfil_campos());

				$perfilcampoLogic_Desde_campo->setConnexion($this->getConnexion());
				$perfilcampoLogic_Desde_campo->setDatosCliente($this->datosCliente);

				foreach($perfilcampoLogic_Desde_campo->getperfil_campos() as $perfilcampo_Desde_campo) {
					$perfilcampo_Desde_campo->setid_campo($idcampoActual);
				}

				$perfilcampoLogic_Desde_campo->saves();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $opcions,opcion_param_return $opcionParameterGeneral) : opcion_param_return {
		$opcionReturnGeneral=new opcion_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $opcionReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $opcions,opcion_param_return $opcionParameterGeneral) : opcion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$opcionReturnGeneral=new opcion_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $opcionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $opcions,opcion $opcion,opcion_param_return $opcionParameterGeneral,bool $isEsNuevoopcion,array $clases) : opcion_param_return {
		 try {	
			$opcionReturnGeneral=new opcion_param_return();
	
			$opcionReturnGeneral->setopcion($opcion);
			$opcionReturnGeneral->setopcions($opcions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$opcionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $opcionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $opcions,opcion $opcion,opcion_param_return $opcionParameterGeneral,bool $isEsNuevoopcion,array $clases) : opcion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$opcionReturnGeneral=new opcion_param_return();
	
			$opcionReturnGeneral->setopcion($opcion);
			$opcionReturnGeneral->setopcions($opcions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$opcionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $opcionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $opcions,opcion $opcion,opcion_param_return $opcionParameterGeneral,bool $isEsNuevoopcion,array $clases) : opcion_param_return {
		 try {	
			$opcionReturnGeneral=new opcion_param_return();
	
			$opcionReturnGeneral->setopcion($opcion);
			$opcionReturnGeneral->setopcions($opcions);
			
			
			
			return $opcionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $opcions,opcion $opcion,opcion_param_return $opcionParameterGeneral,bool $isEsNuevoopcion,array $clases) : opcion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$opcionReturnGeneral=new opcion_param_return();
	
			$opcionReturnGeneral->setopcion($opcion);
			$opcionReturnGeneral->setopcions($opcions);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $opcionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,opcion $opcion,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,opcion $opcion,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		opcion_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		opcion_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(opcion $opcion,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//opcion_logic_add::updateopcionToGet($this->opcion);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$opcion->setsistema($this->opcionDataAccess->getsistema($this->connexion,$opcion));
		$opcion->setopcion($this->opcionDataAccess->getopcion($this->connexion,$opcion));
		$opcion->setgrupo_opcion($this->opcionDataAccess->getgrupo_opcion($this->connexion,$opcion));
		$opcion->setmodulo($this->opcionDataAccess->getmodulo($this->connexion,$opcion));
		$opcion->setperfils($this->opcionDataAccess->getperfils($this->connexion,$opcion));
		$opcion->setopcions($this->opcionDataAccess->getopcions($this->connexion,$opcion));
		$opcion->setaccions($this->opcionDataAccess->getaccions($this->connexion,$opcion));
		$opcion->setperfil_opcions($this->opcionDataAccess->getperfil_opcions($this->connexion,$opcion));
		$opcion->setcampos($this->opcionDataAccess->getcampos($this->connexion,$opcion));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==sistema::$class.'') {
				$opcion->setsistema($this->opcionDataAccess->getsistema($this->connexion,$opcion));
				continue;
			}

			if($clas->clas==opcion::$class.'') {
				$opcion->setopcion($this->opcionDataAccess->getopcion($this->connexion,$opcion));
				continue;
			}

			if($clas->clas==grupo_opcion::$class.'') {
				$opcion->setgrupo_opcion($this->opcionDataAccess->getgrupo_opcion($this->connexion,$opcion));
				continue;
			}

			if($clas->clas==modulo::$class.'') {
				$opcion->setmodulo($this->opcionDataAccess->getmodulo($this->connexion,$opcion));
				continue;
			}

			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$opcion->setperfils($this->opcionDataAccess->getperfils($this->connexion,$opcion));

				if($this->isConDeep) {
					$perfilLogic= new perfil_logic($this->connexion);
					$perfilLogic->setperfils($opcion->getperfils());
					$classesLocal=perfil_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$perfilLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					perfil_util::refrescarFKDescripciones($perfilLogic->getperfils());
					$opcion->setperfils($perfilLogic->getperfils());
				}

				continue;
			}

			if($clas->clas==opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$opcion->setopcions($this->opcionDataAccess->getopcions($this->connexion,$opcion));

				if($this->isConDeep) {
					$opcionLogic= new opcion_logic($this->connexion);
					$opcionLogic->setopcions($opcion->getopcions());
					$classesLocal=opcion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$opcionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					opcion_util::refrescarFKDescripciones($opcionLogic->getopcions());
					$opcion->setopcions($opcionLogic->getopcions());
				}

				continue;
			}

			if($clas->clas==accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$opcion->setaccions($this->opcionDataAccess->getaccions($this->connexion,$opcion));

				if($this->isConDeep) {
					$accionLogic= new accion_logic($this->connexion);
					$accionLogic->setaccions($opcion->getaccions());
					$classesLocal=accion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$accionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					accion_util::refrescarFKDescripciones($accionLogic->getaccions());
					$opcion->setaccions($accionLogic->getaccions());
				}

				continue;
			}

			if($clas->clas==perfil_opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$opcion->setperfil_opcions($this->opcionDataAccess->getperfil_opcions($this->connexion,$opcion));

				if($this->isConDeep) {
					$perfilopcionLogic= new perfil_opcion_logic($this->connexion);
					$perfilopcionLogic->setperfil_opcions($opcion->getperfil_opcions());
					$classesLocal=perfil_opcion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$perfilopcionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					perfil_opcion_util::refrescarFKDescripciones($perfilopcionLogic->getperfil_opcions());
					$opcion->setperfil_opcions($perfilopcionLogic->getperfil_opcions());
				}

				continue;
			}

			if($clas->clas==campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$opcion->setcampos($this->opcionDataAccess->getcampos($this->connexion,$opcion));

				if($this->isConDeep) {
					$campoLogic= new campo_logic($this->connexion);
					$campoLogic->setcampos($opcion->getcampos());
					$classesLocal=campo_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$campoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					campo_util::refrescarFKDescripciones($campoLogic->getcampos());
					$opcion->setcampos($campoLogic->getcampos());
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
			$opcion->setsistema($this->opcionDataAccess->getsistema($this->connexion,$opcion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==opcion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$opcion->setopcion($this->opcionDataAccess->getopcion($this->connexion,$opcion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==grupo_opcion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$opcion->setgrupo_opcion($this->opcionDataAccess->getgrupo_opcion($this->connexion,$opcion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$opcion->setmodulo($this->opcionDataAccess->getmodulo($this->connexion,$opcion));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil::$class);
			$opcion->setperfils($this->opcionDataAccess->getperfils($this->connexion,$opcion));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(opcion::$class);
			$opcion->setopcions($this->opcionDataAccess->getopcions($this->connexion,$opcion));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(accion::$class);
			$opcion->setaccions($this->opcionDataAccess->getaccions($this->connexion,$opcion));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_opcion::$class);
			$opcion->setperfil_opcions($this->opcionDataAccess->getperfil_opcions($this->connexion,$opcion));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(campo::$class);
			$opcion->setcampos($this->opcionDataAccess->getcampos($this->connexion,$opcion));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$opcion->setsistema($this->opcionDataAccess->getsistema($this->connexion,$opcion));
		$sistemaLogic= new sistema_logic($this->connexion);
		$sistemaLogic->deepLoad($opcion->getsistema(),$isDeep,$deepLoadType,$clases);
				
		$opcion->setopcion($this->opcionDataAccess->getopcion($this->connexion,$opcion));
		$opcionLogic= new opcion_logic($this->connexion);
		$opcionLogic->deepLoad($opcion->getopcion(),$isDeep,$deepLoadType,$clases);
				
		$opcion->setgrupo_opcion($this->opcionDataAccess->getgrupo_opcion($this->connexion,$opcion));
		$grupo_opcionLogic= new grupo_opcion_logic($this->connexion);
		$grupo_opcionLogic->deepLoad($opcion->getgrupo_opcion(),$isDeep,$deepLoadType,$clases);
				
		$opcion->setmodulo($this->opcionDataAccess->getmodulo($this->connexion,$opcion));
		$moduloLogic= new modulo_logic($this->connexion);
		$moduloLogic->deepLoad($opcion->getmodulo(),$isDeep,$deepLoadType,$clases);
				

		$opcion->setperfils($this->opcionDataAccess->getperfils($this->connexion,$opcion));

		foreach($opcion->getperfils() as $perfil) {
			$perfilLogic= new perfil_logic($this->connexion);
			$perfilLogic->deepLoad($perfil,$isDeep,$deepLoadType,$clases);
		}

		$opcion->setopcions($this->opcionDataAccess->getopcions($this->connexion,$opcion));

		foreach($opcion->getopcions() as $opcion) {
			$opcionLogic= new opcion_logic($this->connexion);
			$opcionLogic->deepLoad($opcion,$isDeep,$deepLoadType,$clases);
		}

		$opcion->setaccions($this->opcionDataAccess->getaccions($this->connexion,$opcion));

		foreach($opcion->getaccions() as $accion) {
			$accionLogic= new accion_logic($this->connexion);
			$accionLogic->deepLoad($accion,$isDeep,$deepLoadType,$clases);
		}

		$opcion->setperfil_opcions($this->opcionDataAccess->getperfil_opcions($this->connexion,$opcion));

		foreach($opcion->getperfil_opcions() as $perfilopcion) {
			$perfilopcionLogic= new perfil_opcion_logic($this->connexion);
			$perfilopcionLogic->deepLoad($perfilopcion,$isDeep,$deepLoadType,$clases);
		}

		$opcion->setcampos($this->opcionDataAccess->getcampos($this->connexion,$opcion));

		foreach($opcion->getcampos() as $campo) {
			$campoLogic= new campo_logic($this->connexion);
			$campoLogic->deepLoad($campo,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==sistema::$class.'') {
				$opcion->setsistema($this->opcionDataAccess->getsistema($this->connexion,$opcion));
				$sistemaLogic= new sistema_logic($this->connexion);
				$sistemaLogic->deepLoad($opcion->getsistema(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==opcion::$class.'') {
				$opcion->setopcion($this->opcionDataAccess->getopcion($this->connexion,$opcion));
				$opcionLogic= new opcion_logic($this->connexion);
				$opcionLogic->deepLoad($opcion->getopcion(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==grupo_opcion::$class.'') {
				$opcion->setgrupo_opcion($this->opcionDataAccess->getgrupo_opcion($this->connexion,$opcion));
				$grupo_opcionLogic= new grupo_opcion_logic($this->connexion);
				$grupo_opcionLogic->deepLoad($opcion->getgrupo_opcion(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==modulo::$class.'') {
				$opcion->setmodulo($this->opcionDataAccess->getmodulo($this->connexion,$opcion));
				$moduloLogic= new modulo_logic($this->connexion);
				$moduloLogic->deepLoad($opcion->getmodulo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$opcion->setperfils($this->opcionDataAccess->getperfils($this->connexion,$opcion));

				foreach($opcion->getperfils() as $perfil) {
					$perfilLogic= new perfil_logic($this->connexion);
					$perfilLogic->deepLoad($perfil,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$opcion->setopcions($this->opcionDataAccess->getopcions($this->connexion,$opcion));

				foreach($opcion->getopcions() as $opcion) {
					$opcionLogic= new opcion_logic($this->connexion);
					$opcionLogic->deepLoad($opcion,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$opcion->setaccions($this->opcionDataAccess->getaccions($this->connexion,$opcion));

				foreach($opcion->getaccions() as $accion) {
					$accionLogic= new accion_logic($this->connexion);
					$accionLogic->deepLoad($accion,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==perfil_opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$opcion->setperfil_opcions($this->opcionDataAccess->getperfil_opcions($this->connexion,$opcion));

				foreach($opcion->getperfil_opcions() as $perfilopcion) {
					$perfilopcionLogic= new perfil_opcion_logic($this->connexion);
					$perfilopcionLogic->deepLoad($perfilopcion,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$opcion->setcampos($this->opcionDataAccess->getcampos($this->connexion,$opcion));

				foreach($opcion->getcampos() as $campo) {
					$campoLogic= new campo_logic($this->connexion);
					$campoLogic->deepLoad($campo,$isDeep,$deepLoadType,$clases);
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
			$opcion->setsistema($this->opcionDataAccess->getsistema($this->connexion,$opcion));
			$sistemaLogic= new sistema_logic($this->connexion);
			$sistemaLogic->deepLoad($opcion->getsistema(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==opcion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$opcion->setopcion($this->opcionDataAccess->getopcion($this->connexion,$opcion));
			$opcionLogic= new opcion_logic($this->connexion);
			$opcionLogic->deepLoad($opcion->getopcion(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==grupo_opcion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$opcion->setgrupo_opcion($this->opcionDataAccess->getgrupo_opcion($this->connexion,$opcion));
			$grupo_opcionLogic= new grupo_opcion_logic($this->connexion);
			$grupo_opcionLogic->deepLoad($opcion->getgrupo_opcion(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$opcion->setmodulo($this->opcionDataAccess->getmodulo($this->connexion,$opcion));
			$moduloLogic= new modulo_logic($this->connexion);
			$moduloLogic->deepLoad($opcion->getmodulo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil::$class);
			$opcion->setperfils($this->opcionDataAccess->getperfils($this->connexion,$opcion));

			foreach($opcion->getperfils() as $perfil) {
				$perfilLogic= new perfil_logic($this->connexion);
				$perfilLogic->deepLoad($perfil,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(opcion::$class);
			$opcion->setopcions($this->opcionDataAccess->getopcions($this->connexion,$opcion));

			foreach($opcion->getopcions() as $opcion) {
				$opcionLogic= new opcion_logic($this->connexion);
				$opcionLogic->deepLoad($opcion,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(accion::$class);
			$opcion->setaccions($this->opcionDataAccess->getaccions($this->connexion,$opcion));

			foreach($opcion->getaccions() as $accion) {
				$accionLogic= new accion_logic($this->connexion);
				$accionLogic->deepLoad($accion,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_opcion::$class);
			$opcion->setperfil_opcions($this->opcionDataAccess->getperfil_opcions($this->connexion,$opcion));

			foreach($opcion->getperfil_opcions() as $perfilopcion) {
				$perfilopcionLogic= new perfil_opcion_logic($this->connexion);
				$perfilopcionLogic->deepLoad($perfilopcion,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(campo::$class);
			$opcion->setcampos($this->opcionDataAccess->getcampos($this->connexion,$opcion));

			foreach($opcion->getcampos() as $campo) {
				$campoLogic= new campo_logic($this->connexion);
				$campoLogic->deepLoad($campo,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(opcion $opcion,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//opcion_logic_add::updateopcionToSave($this->opcion);			
			
			if(!$paraDeleteCascade) {				
				opcion_data::save($opcion, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		sistema_data::save($opcion->getsistema(),$this->connexion);
		opcion_data::save($opcion->getopcion(),$this->connexion);
		grupo_opcion_data::save($opcion->getgrupo_opcion(),$this->connexion);
		modulo_data::save($opcion->getmodulo(),$this->connexion);
		foreach($opcion->getperfils() as $perfil) {
			perfil_data::save($perfil,$this->connexion);
		}


		foreach($opcion->getopcions() as $opcion) {
			$opcion->setid_opcion($opcion->getId());
			opcion_data::save($opcion,$this->connexion);
		}


		foreach($opcion->getaccions() as $accion) {
			$accion->setid_opcion($opcion->getId());
			accion_data::save($accion,$this->connexion);
		}


		foreach($opcion->getperfil_opcions() as $perfilopcion) {
			$perfilopcion->setid_opcion($opcion->getId());
			perfil_opcion_data::save($perfilopcion,$this->connexion);
		}


		foreach($opcion->getcampos() as $campo) {
			$campo->setid_opcion($opcion->getId());
			campo_data::save($campo,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==sistema::$class.'') {
				sistema_data::save($opcion->getsistema(),$this->connexion);
				continue;
			}

			if($clas->clas==opcion::$class.'') {
				opcion_data::save($opcion->getopcion(),$this->connexion);
				continue;
			}

			if($clas->clas==grupo_opcion::$class.'') {
				grupo_opcion_data::save($opcion->getgrupo_opcion(),$this->connexion);
				continue;
			}

			if($clas->clas==modulo::$class.'') {
				modulo_data::save($opcion->getmodulo(),$this->connexion);
				continue;
			}


			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($opcion->getperfils() as $perfil) {
					perfil_data::save($perfil,$this->connexion);
				}

				continue;
			}

			if($clas->clas==opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($opcion->getopcions() as $opcion) {
					$opcion->setid_opcion($opcion->getId());
					opcion_data::save($opcion,$this->connexion);
				}

				continue;
			}

			if($clas->clas==accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($opcion->getaccions() as $accion) {
					$accion->setid_opcion($opcion->getId());
					accion_data::save($accion,$this->connexion);
				}

				continue;
			}

			if($clas->clas==perfil_opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($opcion->getperfil_opcions() as $perfilopcion) {
					$perfilopcion->setid_opcion($opcion->getId());
					perfil_opcion_data::save($perfilopcion,$this->connexion);
				}

				continue;
			}

			if($clas->clas==campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($opcion->getcampos() as $campo) {
					$campo->setid_opcion($opcion->getId());
					campo_data::save($campo,$this->connexion);
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
			sistema_data::save($opcion->getsistema(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==opcion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			opcion_data::save($opcion->getopcion(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==grupo_opcion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			grupo_opcion_data::save($opcion->getgrupo_opcion(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			modulo_data::save($opcion->getmodulo(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil::$class);

			foreach($opcion->getperfils() as $perfil) {
				perfil_data::save($perfil,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(opcion::$class);

			foreach($opcion->getopcions() as $opcion) {
				$opcion->setid_opcion($opcion->getId());
				opcion_data::save($opcion,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(accion::$class);

			foreach($opcion->getaccions() as $accion) {
				$accion->setid_opcion($opcion->getId());
				accion_data::save($accion,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_opcion::$class);

			foreach($opcion->getperfil_opcions() as $perfilopcion) {
				$perfilopcion->setid_opcion($opcion->getId());
				perfil_opcion_data::save($perfilopcion,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(campo::$class);

			foreach($opcion->getcampos() as $campo) {
				$campo->setid_opcion($opcion->getId());
				campo_data::save($campo,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		sistema_data::save($opcion->getsistema(),$this->connexion);
		$sistemaLogic= new sistema_logic($this->connexion);
		$sistemaLogic->deepSave($opcion->getsistema(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		opcion_data::save($opcion->getopcion(),$this->connexion);
		$opcionLogic= new opcion_logic($this->connexion);
		$opcionLogic->deepSave($opcion->getopcion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		grupo_opcion_data::save($opcion->getgrupo_opcion(),$this->connexion);
		$grupo_opcionLogic= new grupo_opcion_logic($this->connexion);
		$grupo_opcionLogic->deepSave($opcion->getgrupo_opcion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		modulo_data::save($opcion->getmodulo(),$this->connexion);
		$moduloLogic= new modulo_logic($this->connexion);
		$moduloLogic->deepSave($opcion->getmodulo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($opcion->getperfils() as $perfil) {
			$perfilLogic= new perfil_logic($this->connexion);
			perfil_data::save($perfil,$this->connexion);
			$perfilLogic->deepSave($perfil,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($opcion->getopcions() as $opcion) {
			$opcionLogic= new opcion_logic($this->connexion);
			$opcion->setid_opcion($opcion->getId());
			opcion_data::save($opcion,$this->connexion);
			$opcionLogic->deepSave($opcion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($opcion->getaccions() as $accion) {
			$accionLogic= new accion_logic($this->connexion);
			$accion->setid_opcion($opcion->getId());
			accion_data::save($accion,$this->connexion);
			$accionLogic->deepSave($accion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($opcion->getperfil_opcions() as $perfilopcion) {
			$perfilopcionLogic= new perfil_opcion_logic($this->connexion);
			$perfilopcion->setid_opcion($opcion->getId());
			perfil_opcion_data::save($perfilopcion,$this->connexion);
			$perfilopcionLogic->deepSave($perfilopcion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($opcion->getcampos() as $campo) {
			$campoLogic= new campo_logic($this->connexion);
			$campo->setid_opcion($opcion->getId());
			campo_data::save($campo,$this->connexion);
			$campoLogic->deepSave($campo,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==sistema::$class.'') {
				sistema_data::save($opcion->getsistema(),$this->connexion);
				$sistemaLogic= new sistema_logic($this->connexion);
				$sistemaLogic->deepSave($opcion->getsistema(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==opcion::$class.'') {
				opcion_data::save($opcion->getopcion(),$this->connexion);
				$opcionLogic= new opcion_logic($this->connexion);
				$opcionLogic->deepSave($opcion->getopcion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==grupo_opcion::$class.'') {
				grupo_opcion_data::save($opcion->getgrupo_opcion(),$this->connexion);
				$grupo_opcionLogic= new grupo_opcion_logic($this->connexion);
				$grupo_opcionLogic->deepSave($opcion->getgrupo_opcion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==modulo::$class.'') {
				modulo_data::save($opcion->getmodulo(),$this->connexion);
				$moduloLogic= new modulo_logic($this->connexion);
				$moduloLogic->deepSave($opcion->getmodulo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($opcion->getperfils() as $perfil) {
					$perfilLogic= new perfil_logic($this->connexion);
					perfil_data::save($perfil,$this->connexion);
					$perfilLogic->deepSave($perfil,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($opcion->getopcions() as $opcion) {
					$opcionLogic= new opcion_logic($this->connexion);
					$opcion->setid_opcion($opcion->getId());
					opcion_data::save($opcion,$this->connexion);
					$opcionLogic->deepSave($opcion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($opcion->getaccions() as $accion) {
					$accionLogic= new accion_logic($this->connexion);
					$accion->setid_opcion($opcion->getId());
					accion_data::save($accion,$this->connexion);
					$accionLogic->deepSave($accion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==perfil_opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($opcion->getperfil_opcions() as $perfilopcion) {
					$perfilopcionLogic= new perfil_opcion_logic($this->connexion);
					$perfilopcion->setid_opcion($opcion->getId());
					perfil_opcion_data::save($perfilopcion,$this->connexion);
					$perfilopcionLogic->deepSave($perfilopcion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($opcion->getcampos() as $campo) {
					$campoLogic= new campo_logic($this->connexion);
					$campo->setid_opcion($opcion->getId());
					campo_data::save($campo,$this->connexion);
					$campoLogic->deepSave($campo,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			sistema_data::save($opcion->getsistema(),$this->connexion);
			$sistemaLogic= new sistema_logic($this->connexion);
			$sistemaLogic->deepSave($opcion->getsistema(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==opcion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			opcion_data::save($opcion->getopcion(),$this->connexion);
			$opcionLogic= new opcion_logic($this->connexion);
			$opcionLogic->deepSave($opcion->getopcion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==grupo_opcion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			grupo_opcion_data::save($opcion->getgrupo_opcion(),$this->connexion);
			$grupo_opcionLogic= new grupo_opcion_logic($this->connexion);
			$grupo_opcionLogic->deepSave($opcion->getgrupo_opcion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			modulo_data::save($opcion->getmodulo(),$this->connexion);
			$moduloLogic= new modulo_logic($this->connexion);
			$moduloLogic->deepSave($opcion->getmodulo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil::$class);

			foreach($opcion->getperfils() as $perfil) {
				$perfilLogic= new perfil_logic($this->connexion);
				perfil_data::save($perfil,$this->connexion);
				$perfilLogic->deepSave($perfil,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(opcion::$class);

			foreach($opcion->getopcions() as $opcion) {
				$opcionLogic= new opcion_logic($this->connexion);
				$opcion->setid_opcion($opcion->getId());
				opcion_data::save($opcion,$this->connexion);
				$opcionLogic->deepSave($opcion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(accion::$class);

			foreach($opcion->getaccions() as $accion) {
				$accionLogic= new accion_logic($this->connexion);
				$accion->setid_opcion($opcion->getId());
				accion_data::save($accion,$this->connexion);
				$accionLogic->deepSave($accion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_opcion::$class);

			foreach($opcion->getperfil_opcions() as $perfilopcion) {
				$perfilopcionLogic= new perfil_opcion_logic($this->connexion);
				$perfilopcion->setid_opcion($opcion->getId());
				perfil_opcion_data::save($perfilopcion,$this->connexion);
				$perfilopcionLogic->deepSave($perfilopcion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(campo::$class);

			foreach($opcion->getcampos() as $campo) {
				$campoLogic= new campo_logic($this->connexion);
				$campo->setid_opcion($opcion->getId());
				campo_data::save($campo,$this->connexion);
				$campoLogic->deepSave($campo,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				opcion_data::save($opcion, $this->connexion);
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
			
			$this->deepLoad($this->opcion,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->opcions as $opcion) {
				$this->deepLoad($opcion,$isDeep,$deepLoadType,$clases);
								
				opcion_util::refrescarFKDescripciones($this->opcions);
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
			
			foreach($this->opcions as $opcion) {
				$this->deepLoad($opcion,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->opcion,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->opcions as $opcion) {
				$this->deepSave($opcion,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->opcions as $opcion) {
				$this->deepSave($opcion,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(opcion::$class);
				$classes[]=new Classe(grupo_opcion::$class);
				$classes[]=new Classe(modulo::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==sistema::$class) {
						$classes[]=new Classe(sistema::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==opcion::$class) {
						$classes[]=new Classe(opcion::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==grupo_opcion::$class) {
						$classes[]=new Classe(grupo_opcion::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==modulo::$class) {
						$classes[]=new Classe(modulo::$class);
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

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==opcion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(opcion::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==grupo_opcion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(grupo_opcion::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
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
	
	public static function getClassesRelsOf(array $classesP,string $deepLoadType) : array {
		try {
			 $classes=array();			
			
			if($deepLoadType==DeepLoadType::$NONE) {
				
				$classes[]=new Classe(perfil::$class);
				$classes[]=new Classe(opcion::$class);
				$classes[]=new Classe(accion::$class);
				$classes[]=new Classe(perfil_opcion::$class);
				$classes[]=new Classe(campo::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==perfil::$class) {
						$classes[]=new Classe(perfil::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==opcion::$class) {
						$classes[]=new Classe(opcion::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==accion::$class) {
						$classes[]=new Classe(accion::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==perfil_opcion::$class) {
						$classes[]=new Classe(perfil_opcion::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==campo::$class) {
						$classes[]=new Classe(campo::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==perfil::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(perfil::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==opcion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(opcion::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==accion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(accion::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==perfil_opcion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(perfil_opcion::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==campo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(campo::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getopcion() : ?opcion {	
		/*
		opcion_logic_add::checkopcionToGet($this->opcion,$this->datosCliente);
		opcion_logic_add::updateopcionToGet($this->opcion);
		*/
			
		return $this->opcion;
	}
		
	public function setopcion(opcion $newopcion) {
		$this->opcion = $newopcion;
	}
	
	public function getopcions() : array {		
		/*
		opcion_logic_add::checkopcionToGets($this->opcions,$this->datosCliente);
		
		foreach ($this->opcions as $opcionLocal ) {
			opcion_logic_add::updateopcionToGet($opcionLocal);
		}
		*/
		
		return $this->opcions;
	}
	
	public function setopcions(array $newopcions) {
		$this->opcions = $newopcions;
	}
	
	public function getopcionDataAccess() : opcion_data {
		return $this->opcionDataAccess;
	}
	
	public function setopcionDataAccess(opcion_data $newopcionDataAccess) {
		$this->opcionDataAccess = $newopcionDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        opcion_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		perfil_accion_logic::$logger;
		perfil_campo_logic::$logger;
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
