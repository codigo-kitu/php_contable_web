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

namespace com\bydan\contabilidad\contabilidad\contador_auxiliar\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\contabilidad\contador_auxiliar\util\contador_auxiliar_carga;
use com\bydan\contabilidad\contabilidad\contador_auxiliar\util\contador_auxiliar_param_return;

use com\bydan\contabilidad\contabilidad\contador_auxiliar\presentation\session\contador_auxiliar_session;

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

use com\bydan\contabilidad\contabilidad\contador_auxiliar\util\contador_auxiliar_util;
use com\bydan\contabilidad\contabilidad\contador_auxiliar\business\entity\contador_auxiliar;
use com\bydan\contabilidad\contabilidad\contador_auxiliar\business\data\contador_auxiliar_data;

//FK


use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\entity\libro_auxiliar;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\data\libro_auxiliar_data;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\logic\libro_auxiliar_logic;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_util;

//REL


//REL DETALLES




class contador_auxiliar_logic  extends GeneralEntityLogic implements contador_auxiliar_logicI {	
	/*GENERAL*/
	public contador_auxiliar_data $contador_auxiliarDataAccess;
	//public ?contador_auxiliar_logic_add $contador_auxiliarLogicAdditional=null;
	public ?contador_auxiliar $contador_auxiliar;
	public array $contador_auxiliars;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->contador_auxiliarDataAccess = new contador_auxiliar_data();			
			$this->contador_auxiliars = array();
			$this->contador_auxiliar = new contador_auxiliar();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->contador_auxiliarLogicAdditional = new contador_auxiliar_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->contador_auxiliarLogicAdditional==null) {
		//	$this->contador_auxiliarLogicAdditional=new contador_auxiliar_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->contador_auxiliarDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->contador_auxiliarDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->contador_auxiliarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->contador_auxiliarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->contador_auxiliars = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->contador_auxiliars=$this->contador_auxiliarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				contador_auxiliar_util::refrescarFKDescripciones($this->contador_auxiliars);
			}
			
			//contador_auxiliar_logic_add::checkcontador_auxiliarToGets($this->contador_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->contador_auxiliars);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->contador_auxiliars = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->contador_auxiliars=$this->contador_auxiliarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				contador_auxiliar_util::refrescarFKDescripciones($this->contador_auxiliars);
			}
			
			//contador_auxiliar_logic_add::checkcontador_auxiliarToGets($this->contador_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->contador_auxiliars);
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
		$this->contador_auxiliar = new contador_auxiliar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->contador_auxiliar=$this->contador_auxiliarDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->contador_auxiliar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				contador_auxiliar_util::refrescarFKDescripcion($this->contador_auxiliar);
			}
						
			//contador_auxiliar_logic_add::checkcontador_auxiliarToGet($this->contador_auxiliar,$this->datosCliente);
			//contador_auxiliar_logic_add::updatecontador_auxiliarToGet($this->contador_auxiliar);
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
		$this->contador_auxiliar = new  contador_auxiliar();
		  		  
        try {		
			$this->contador_auxiliar=$this->contador_auxiliarDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->contador_auxiliar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				contador_auxiliar_util::refrescarFKDescripcion($this->contador_auxiliar);
			}
			
			//contador_auxiliar_logic_add::checkcontador_auxiliarToGet($this->contador_auxiliar,$this->datosCliente);
			//contador_auxiliar_logic_add::updatecontador_auxiliarToGet($this->contador_auxiliar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?contador_auxiliar {
		$contador_auxiliarLogic = new  contador_auxiliar_logic();
		  		  
        try {		
			$contador_auxiliarLogic->setConnexion($connexion);			
			$contador_auxiliarLogic->getEntity($id);			
			return $contador_auxiliarLogic->getcontador_auxiliar();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->contador_auxiliar = new  contador_auxiliar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->contador_auxiliar=$this->contador_auxiliarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->contador_auxiliar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				contador_auxiliar_util::refrescarFKDescripcion($this->contador_auxiliar);
			}
			
			//contador_auxiliar_logic_add::checkcontador_auxiliarToGet($this->contador_auxiliar,$this->datosCliente);
			//contador_auxiliar_logic_add::updatecontador_auxiliarToGet($this->contador_auxiliar);
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
		$this->contador_auxiliar = new  contador_auxiliar();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->contador_auxiliar=$this->contador_auxiliarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->contador_auxiliar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				contador_auxiliar_util::refrescarFKDescripcion($this->contador_auxiliar);
			}
			
			//contador_auxiliar_logic_add::checkcontador_auxiliarToGet($this->contador_auxiliar,$this->datosCliente);
			//contador_auxiliar_logic_add::updatecontador_auxiliarToGet($this->contador_auxiliar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?contador_auxiliar {
		$contador_auxiliarLogic = new  contador_auxiliar_logic();
		  		  
        try {		
			$contador_auxiliarLogic->setConnexion($connexion);			
			$contador_auxiliarLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $contador_auxiliarLogic->getcontador_auxiliar();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->contador_auxiliars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->contador_auxiliars=$this->contador_auxiliarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				contador_auxiliar_util::refrescarFKDescripciones($this->contador_auxiliars);
			}
			
			//contador_auxiliar_logic_add::checkcontador_auxiliarToGets($this->contador_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->contador_auxiliars);			
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
		$this->contador_auxiliars = array();
		  		  
        try {			
			$this->contador_auxiliars=$this->contador_auxiliarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				contador_auxiliar_util::refrescarFKDescripciones($this->contador_auxiliars);
			}
			
			//contador_auxiliar_logic_add::checkcontador_auxiliarToGets($this->contador_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->contador_auxiliars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->contador_auxiliars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->contador_auxiliars=$this->contador_auxiliarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				contador_auxiliar_util::refrescarFKDescripciones($this->contador_auxiliars);
			}
			
			//contador_auxiliar_logic_add::checkcontador_auxiliarToGets($this->contador_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->contador_auxiliars);
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
		$this->contador_auxiliars = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->contador_auxiliars=$this->contador_auxiliarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				contador_auxiliar_util::refrescarFKDescripciones($this->contador_auxiliars);
			}
			
			//contador_auxiliar_logic_add::checkcontador_auxiliarToGets($this->contador_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->contador_auxiliars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$contador_auxiliarLogic = new  contador_auxiliar_logic();
		  		  
        try {		
			$contador_auxiliarLogic->setConnexion($connexion);			
			$contador_auxiliarLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $contador_auxiliarLogic->getcontador_auxiliars();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->contador_auxiliars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->contador_auxiliars=$this->contador_auxiliarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				contador_auxiliar_util::refrescarFKDescripciones($this->contador_auxiliars);
			}
			
			//contador_auxiliar_logic_add::checkcontador_auxiliarToGets($this->contador_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->contador_auxiliars);
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
		$this->contador_auxiliars = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->contador_auxiliars=$this->contador_auxiliarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				contador_auxiliar_util::refrescarFKDescripciones($this->contador_auxiliars);
			}
			
			//contador_auxiliar_logic_add::checkcontador_auxiliarToGets($this->contador_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->contador_auxiliars);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->contador_auxiliars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->contador_auxiliars=$this->contador_auxiliarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				contador_auxiliar_util::refrescarFKDescripciones($this->contador_auxiliars);
			}
			
			//contador_auxiliar_logic_add::checkcontador_auxiliarToGets($this->contador_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->contador_auxiliars);
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
		$this->contador_auxiliars = array();
		  		  
        try {			
			$this->contador_auxiliars=$this->contador_auxiliarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				contador_auxiliar_util::refrescarFKDescripciones($this->contador_auxiliars);
			}	
			
			//contador_auxiliar_logic_add::checkcontador_auxiliarToGets($this->contador_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->contador_auxiliars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->contador_auxiliars = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->contador_auxiliars=$this->contador_auxiliarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				contador_auxiliar_util::refrescarFKDescripciones($this->contador_auxiliars);
			}
			
			//contador_auxiliar_logic_add::checkcontador_auxiliarToGets($this->contador_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->contador_auxiliars);
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
		$this->contador_auxiliars = array();
		  		  
        try {		
			$this->contador_auxiliars=$this->contador_auxiliarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				contador_auxiliar_util::refrescarFKDescripciones($this->contador_auxiliars);
			}
			
			//contador_auxiliar_logic_add::checkcontador_auxiliarToGets($this->contador_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->contador_auxiliars);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_Idlibro_auxiliarWithConnection(string $strFinalQuery,Pagination $pagination,int $id_libro_auxiliar) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_libro_auxiliar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_libro_auxiliar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_libro_auxiliar,contador_auxiliar_util::$ID_LIBRO_AUXILIAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_libro_auxiliar);

			$this->contador_auxiliars=$this->contador_auxiliarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				contador_auxiliar_util::refrescarFKDescripciones($this->contador_auxiliars);
			}
			//contador_auxiliar_logic_add::checkcontador_auxiliarToGets($this->contador_auxiliars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->contador_auxiliars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idlibro_auxiliar(string $strFinalQuery,Pagination $pagination,int $id_libro_auxiliar) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_libro_auxiliar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_libro_auxiliar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_libro_auxiliar,contador_auxiliar_util::$ID_LIBRO_AUXILIAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_libro_auxiliar);

			$this->contador_auxiliars=$this->contador_auxiliarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				contador_auxiliar_util::refrescarFKDescripciones($this->contador_auxiliars);
			}
			//contador_auxiliar_logic_add::checkcontador_auxiliarToGets($this->contador_auxiliars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->contador_auxiliars);
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
						
			//contador_auxiliar_logic_add::checkcontador_auxiliarToSave($this->contador_auxiliar,$this->datosCliente,$this->connexion);	       
			//contador_auxiliar_logic_add::updatecontador_auxiliarToSave($this->contador_auxiliar);			
			contador_auxiliar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->contador_auxiliar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->contador_auxiliarLogicAdditional->checkGeneralEntityToSave($this,$this->contador_auxiliar,$this->datosCliente,$this->connexion);
			
			
			contador_auxiliar_data::save($this->contador_auxiliar, $this->connexion);	    	       	 				
			//contador_auxiliar_logic_add::checkcontador_auxiliarToSaveAfter($this->contador_auxiliar,$this->datosCliente,$this->connexion);			
			//$this->contador_auxiliarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->contador_auxiliar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->contador_auxiliar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->contador_auxiliar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				contador_auxiliar_util::refrescarFKDescripcion($this->contador_auxiliar);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->contador_auxiliar->getIsDeleted()) {
				$this->contador_auxiliar=null;
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
						
			/*contador_auxiliar_logic_add::checkcontador_auxiliarToSave($this->contador_auxiliar,$this->datosCliente,$this->connexion);*/	        
			//contador_auxiliar_logic_add::updatecontador_auxiliarToSave($this->contador_auxiliar);			
			//$this->contador_auxiliarLogicAdditional->checkGeneralEntityToSave($this,$this->contador_auxiliar,$this->datosCliente,$this->connexion);			
			contador_auxiliar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->contador_auxiliar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			contador_auxiliar_data::save($this->contador_auxiliar, $this->connexion);	    	       	 						
			/*contador_auxiliar_logic_add::checkcontador_auxiliarToSaveAfter($this->contador_auxiliar,$this->datosCliente,$this->connexion);*/			
			//$this->contador_auxiliarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->contador_auxiliar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->contador_auxiliar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->contador_auxiliar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				contador_auxiliar_util::refrescarFKDescripcion($this->contador_auxiliar);				
			}
			
			if($this->contador_auxiliar->getIsDeleted()) {
				$this->contador_auxiliar=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(contador_auxiliar $contador_auxiliar,Connexion $connexion)  {
		$contador_auxiliarLogic = new  contador_auxiliar_logic();		  		  
        try {		
			$contador_auxiliarLogic->setConnexion($connexion);			
			$contador_auxiliarLogic->setcontador_auxiliar($contador_auxiliar);			
			$contador_auxiliarLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*contador_auxiliar_logic_add::checkcontador_auxiliarToSaves($this->contador_auxiliars,$this->datosCliente,$this->connexion);*/	        	
			//$this->contador_auxiliarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->contador_auxiliars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->contador_auxiliars as $contador_auxiliarLocal) {				
								
				//contador_auxiliar_logic_add::updatecontador_auxiliarToSave($contador_auxiliarLocal);	        	
				contador_auxiliar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$contador_auxiliarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				contador_auxiliar_data::save($contador_auxiliarLocal, $this->connexion);				
			}
			
			/*contador_auxiliar_logic_add::checkcontador_auxiliarToSavesAfter($this->contador_auxiliars,$this->datosCliente,$this->connexion);*/			
			//$this->contador_auxiliarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->contador_auxiliars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				contador_auxiliar_util::refrescarFKDescripciones($this->contador_auxiliars);
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
			/*contador_auxiliar_logic_add::checkcontador_auxiliarToSaves($this->contador_auxiliars,$this->datosCliente,$this->connexion);*/			
			//$this->contador_auxiliarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->contador_auxiliars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->contador_auxiliars as $contador_auxiliarLocal) {				
								
				//contador_auxiliar_logic_add::updatecontador_auxiliarToSave($contador_auxiliarLocal);	        	
				contador_auxiliar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$contador_auxiliarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				contador_auxiliar_data::save($contador_auxiliarLocal, $this->connexion);				
			}			
			
			/*contador_auxiliar_logic_add::checkcontador_auxiliarToSavesAfter($this->contador_auxiliars,$this->datosCliente,$this->connexion);*/			
			//$this->contador_auxiliarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->contador_auxiliars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				contador_auxiliar_util::refrescarFKDescripciones($this->contador_auxiliars);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $contador_auxiliars,Connexion $connexion)  {
		$contador_auxiliarLogic = new  contador_auxiliar_logic();
		  		  
        try {		
			$contador_auxiliarLogic->setConnexion($connexion);			
			$contador_auxiliarLogic->setcontador_auxiliars($contador_auxiliars);			
			$contador_auxiliarLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$contador_auxiliarsAux=array();
		
		foreach($this->contador_auxiliars as $contador_auxiliar) {
			if($contador_auxiliar->getIsDeleted()==false) {
				$contador_auxiliarsAux[]=$contador_auxiliar;
			}
		}
		
		$this->contador_auxiliars=$contador_auxiliarsAux;
	}
	
	public function updateToGetsAuxiliar(array &$contador_auxiliars) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->contador_auxiliars as $contador_auxiliar) {
				
				$contador_auxiliar->setid_libro_auxiliar_Descripcion(contador_auxiliar_util::getlibro_auxiliarDescripcion($contador_auxiliar->getlibro_auxiliar()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$contador_auxiliar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$contador_auxiliar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$contador_auxiliar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$contador_auxiliar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$contador_auxiliar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$contador_auxiliarForeignKey=new contador_auxiliar_param_return();//contador_auxiliarForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_libro_auxiliar',$strRecargarFkTipos,',')) {
				$this->cargarComboslibro_auxiliarsFK($this->connexion,$strRecargarFkQuery,$contador_auxiliarForeignKey,$contador_auxiliar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_libro_auxiliar',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboslibro_auxiliarsFK($this->connexion,' where id=-1 ',$contador_auxiliarForeignKey,$contador_auxiliar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $contador_auxiliarForeignKey;
			
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
	
	
	public function cargarComboslibro_auxiliarsFK($connexion=null,$strRecargarFkQuery='',$contador_auxiliarForeignKey,$contador_auxiliar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$libro_auxiliarLogic= new libro_auxiliar_logic();
		$pagination= new Pagination();
		$contador_auxiliarForeignKey->libro_auxiliarsFK=array();

		$libro_auxiliarLogic->setConnexion($connexion);
		$libro_auxiliarLogic->getlibro_auxiliarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($contador_auxiliar_session==null) {
			$contador_auxiliar_session=new contador_auxiliar_session();
		}
		
		if($contador_auxiliar_session->bitBusquedaDesdeFKSesionlibro_auxiliar!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=libro_auxiliar_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGloballibro_auxiliar=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGloballibro_auxiliar=Funciones::GetFinalQueryAppend($finalQueryGloballibro_auxiliar, '');
				$finalQueryGloballibro_auxiliar.=libro_auxiliar_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGloballibro_auxiliar.$strRecargarFkQuery;		

				$libro_auxiliarLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($libro_auxiliarLogic->getlibro_auxiliars() as $libro_auxiliarLocal ) {
				if($contador_auxiliarForeignKey->idlibro_auxiliarDefaultFK==0) {
					$contador_auxiliarForeignKey->idlibro_auxiliarDefaultFK=$libro_auxiliarLocal->getId();
				}

				$contador_auxiliarForeignKey->libro_auxiliarsFK[$libro_auxiliarLocal->getId()]=contador_auxiliar_util::getlibro_auxiliarDescripcion($libro_auxiliarLocal);
			}

		} else {

			if($contador_auxiliar_session->bigidlibro_auxiliarActual!=null && $contador_auxiliar_session->bigidlibro_auxiliarActual > 0) {
				$libro_auxiliarLogic->getEntity($contador_auxiliar_session->bigidlibro_auxiliarActual);//WithConnection

				$contador_auxiliarForeignKey->libro_auxiliarsFK[$libro_auxiliarLogic->getlibro_auxiliar()->getId()]=contador_auxiliar_util::getlibro_auxiliarDescripcion($libro_auxiliarLogic->getlibro_auxiliar());
				$contador_auxiliarForeignKey->idlibro_auxiliarDefaultFK=$libro_auxiliarLogic->getlibro_auxiliar()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($contador_auxiliar) {
		$this->saveRelacionesBase($contador_auxiliar,true);
	}

	public function saveRelaciones($contador_auxiliar) {
		$this->saveRelacionesBase($contador_auxiliar,false);
	}

	public function saveRelacionesBase($contador_auxiliar,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setcontador_auxiliar($contador_auxiliar);

			if(true) {

				//contador_auxiliar_logic_add::updateRelacionesToSave($contador_auxiliar,$this);

				if(($this->contador_auxiliar->getIsNew() || $this->contador_auxiliar->getIsChanged()) && !$this->contador_auxiliar->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->contador_auxiliar->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//contador_auxiliar_logic_add::updateRelacionesToSaveAfter($contador_auxiliar,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $contador_auxiliars,contador_auxiliar_param_return $contador_auxiliarParameterGeneral) : contador_auxiliar_param_return {
		$contador_auxiliarReturnGeneral=new contador_auxiliar_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $contador_auxiliarReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $contador_auxiliars,contador_auxiliar_param_return $contador_auxiliarParameterGeneral) : contador_auxiliar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$contador_auxiliarReturnGeneral=new contador_auxiliar_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $contador_auxiliarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $contador_auxiliars,contador_auxiliar $contador_auxiliar,contador_auxiliar_param_return $contador_auxiliarParameterGeneral,bool $isEsNuevocontador_auxiliar,array $clases) : contador_auxiliar_param_return {
		 try {	
			$contador_auxiliarReturnGeneral=new contador_auxiliar_param_return();
	
			$contador_auxiliarReturnGeneral->setcontador_auxiliar($contador_auxiliar);
			$contador_auxiliarReturnGeneral->setcontador_auxiliars($contador_auxiliars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$contador_auxiliarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $contador_auxiliarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $contador_auxiliars,contador_auxiliar $contador_auxiliar,contador_auxiliar_param_return $contador_auxiliarParameterGeneral,bool $isEsNuevocontador_auxiliar,array $clases) : contador_auxiliar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$contador_auxiliarReturnGeneral=new contador_auxiliar_param_return();
	
			$contador_auxiliarReturnGeneral->setcontador_auxiliar($contador_auxiliar);
			$contador_auxiliarReturnGeneral->setcontador_auxiliars($contador_auxiliars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$contador_auxiliarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $contador_auxiliarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $contador_auxiliars,contador_auxiliar $contador_auxiliar,contador_auxiliar_param_return $contador_auxiliarParameterGeneral,bool $isEsNuevocontador_auxiliar,array $clases) : contador_auxiliar_param_return {
		 try {	
			$contador_auxiliarReturnGeneral=new contador_auxiliar_param_return();
	
			$contador_auxiliarReturnGeneral->setcontador_auxiliar($contador_auxiliar);
			$contador_auxiliarReturnGeneral->setcontador_auxiliars($contador_auxiliars);
			
			
			
			return $contador_auxiliarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $contador_auxiliars,contador_auxiliar $contador_auxiliar,contador_auxiliar_param_return $contador_auxiliarParameterGeneral,bool $isEsNuevocontador_auxiliar,array $clases) : contador_auxiliar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$contador_auxiliarReturnGeneral=new contador_auxiliar_param_return();
	
			$contador_auxiliarReturnGeneral->setcontador_auxiliar($contador_auxiliar);
			$contador_auxiliarReturnGeneral->setcontador_auxiliars($contador_auxiliars);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $contador_auxiliarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,contador_auxiliar $contador_auxiliar,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,contador_auxiliar $contador_auxiliar,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		contador_auxiliar_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(contador_auxiliar $contador_auxiliar,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//contador_auxiliar_logic_add::updatecontador_auxiliarToGet($this->contador_auxiliar);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$contador_auxiliar->setlibro_auxiliar($this->contador_auxiliarDataAccess->getlibro_auxiliar($this->connexion,$contador_auxiliar));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==libro_auxiliar::$class.'') {
				$contador_auxiliar->setlibro_auxiliar($this->contador_auxiliarDataAccess->getlibro_auxiliar($this->connexion,$contador_auxiliar));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==libro_auxiliar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$contador_auxiliar->setlibro_auxiliar($this->contador_auxiliarDataAccess->getlibro_auxiliar($this->connexion,$contador_auxiliar));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$contador_auxiliar->setlibro_auxiliar($this->contador_auxiliarDataAccess->getlibro_auxiliar($this->connexion,$contador_auxiliar));
		$libro_auxiliarLogic= new libro_auxiliar_logic($this->connexion);
		$libro_auxiliarLogic->deepLoad($contador_auxiliar->getlibro_auxiliar(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==libro_auxiliar::$class.'') {
				$contador_auxiliar->setlibro_auxiliar($this->contador_auxiliarDataAccess->getlibro_auxiliar($this->connexion,$contador_auxiliar));
				$libro_auxiliarLogic= new libro_auxiliar_logic($this->connexion);
				$libro_auxiliarLogic->deepLoad($contador_auxiliar->getlibro_auxiliar(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==libro_auxiliar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$contador_auxiliar->setlibro_auxiliar($this->contador_auxiliarDataAccess->getlibro_auxiliar($this->connexion,$contador_auxiliar));
			$libro_auxiliarLogic= new libro_auxiliar_logic($this->connexion);
			$libro_auxiliarLogic->deepLoad($contador_auxiliar->getlibro_auxiliar(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(contador_auxiliar $contador_auxiliar,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//contador_auxiliar_logic_add::updatecontador_auxiliarToSave($this->contador_auxiliar);			
			
			if(!$paraDeleteCascade) {				
				contador_auxiliar_data::save($contador_auxiliar, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		libro_auxiliar_data::save($contador_auxiliar->getlibro_auxiliar(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==libro_auxiliar::$class.'') {
				libro_auxiliar_data::save($contador_auxiliar->getlibro_auxiliar(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==libro_auxiliar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			libro_auxiliar_data::save($contador_auxiliar->getlibro_auxiliar(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		libro_auxiliar_data::save($contador_auxiliar->getlibro_auxiliar(),$this->connexion);
		$libro_auxiliarLogic= new libro_auxiliar_logic($this->connexion);
		$libro_auxiliarLogic->deepSave($contador_auxiliar->getlibro_auxiliar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==libro_auxiliar::$class.'') {
				libro_auxiliar_data::save($contador_auxiliar->getlibro_auxiliar(),$this->connexion);
				$libro_auxiliarLogic= new libro_auxiliar_logic($this->connexion);
				$libro_auxiliarLogic->deepSave($contador_auxiliar->getlibro_auxiliar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==libro_auxiliar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			libro_auxiliar_data::save($contador_auxiliar->getlibro_auxiliar(),$this->connexion);
			$libro_auxiliarLogic= new libro_auxiliar_logic($this->connexion);
			$libro_auxiliarLogic->deepSave($contador_auxiliar->getlibro_auxiliar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				contador_auxiliar_data::save($contador_auxiliar, $this->connexion);
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
			
			$this->deepLoad($this->contador_auxiliar,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->contador_auxiliars as $contador_auxiliar) {
				$this->deepLoad($contador_auxiliar,$isDeep,$deepLoadType,$clases);
								
				contador_auxiliar_util::refrescarFKDescripciones($this->contador_auxiliars);
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
			
			foreach($this->contador_auxiliars as $contador_auxiliar) {
				$this->deepLoad($contador_auxiliar,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->contador_auxiliar,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->contador_auxiliars as $contador_auxiliar) {
				$this->deepSave($contador_auxiliar,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->contador_auxiliars as $contador_auxiliar) {
				$this->deepSave($contador_auxiliar,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(libro_auxiliar::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==libro_auxiliar::$class) {
						$classes[]=new Classe(libro_auxiliar::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==libro_auxiliar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(libro_auxiliar::$class);
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
	
	
	
	
	
	
	
	public function getcontador_auxiliar() : ?contador_auxiliar {	
		/*
		contador_auxiliar_logic_add::checkcontador_auxiliarToGet($this->contador_auxiliar,$this->datosCliente);
		contador_auxiliar_logic_add::updatecontador_auxiliarToGet($this->contador_auxiliar);
		*/
			
		return $this->contador_auxiliar;
	}
		
	public function setcontador_auxiliar(contador_auxiliar $newcontador_auxiliar) {
		$this->contador_auxiliar = $newcontador_auxiliar;
	}
	
	public function getcontador_auxiliars() : array {		
		/*
		contador_auxiliar_logic_add::checkcontador_auxiliarToGets($this->contador_auxiliars,$this->datosCliente);
		
		foreach ($this->contador_auxiliars as $contador_auxiliarLocal ) {
			contador_auxiliar_logic_add::updatecontador_auxiliarToGet($contador_auxiliarLocal);
		}
		*/
		
		return $this->contador_auxiliars;
	}
	
	public function setcontador_auxiliars(array $newcontador_auxiliars) {
		$this->contador_auxiliars = $newcontador_auxiliars;
	}
	
	public function getcontador_auxiliarDataAccess() : contador_auxiliar_data {
		return $this->contador_auxiliarDataAccess;
	}
	
	public function setcontador_auxiliarDataAccess(contador_auxiliar_data $newcontador_auxiliarDataAccess) {
		$this->contador_auxiliarDataAccess = $newcontador_auxiliarDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        contador_auxiliar_carga::$CONTROLLER;;        
		
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
