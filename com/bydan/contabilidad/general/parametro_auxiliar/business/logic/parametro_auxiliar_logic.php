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

namespace com\bydan\contabilidad\general\parametro_auxiliar\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\general\parametro_auxiliar\util\parametro_auxiliar_carga;
use com\bydan\contabilidad\general\parametro_auxiliar\util\parametro_auxiliar_param_return;

use com\bydan\contabilidad\general\parametro_auxiliar\presentation\session\parametro_auxiliar_session;

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

use com\bydan\contabilidad\general\parametro_auxiliar\util\parametro_auxiliar_util;
use com\bydan\contabilidad\general\parametro_auxiliar\business\entity\parametro_auxiliar;
use com\bydan\contabilidad\general\parametro_auxiliar\business\data\parametro_auxiliar_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\tipo_costeo_kardex\business\entity\tipo_costeo_kardex;
use com\bydan\contabilidad\general\tipo_costeo_kardex\business\data\tipo_costeo_kardex_data;
use com\bydan\contabilidad\general\tipo_costeo_kardex\business\logic\tipo_costeo_kardex_logic;
use com\bydan\contabilidad\general\tipo_costeo_kardex\util\tipo_costeo_kardex_util;

//REL


//REL DETALLES




class parametro_auxiliar_logic  extends GeneralEntityLogic implements parametro_auxiliar_logicI {	
	/*GENERAL*/
	public parametro_auxiliar_data $parametro_auxiliarDataAccess;
	//public ?parametro_auxiliar_logic_add $parametro_auxiliarLogicAdditional=null;
	public ?parametro_auxiliar $parametro_auxiliar;
	public array $parametro_auxiliars;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->parametro_auxiliarDataAccess = new parametro_auxiliar_data();			
			$this->parametro_auxiliars = array();
			$this->parametro_auxiliar = new parametro_auxiliar();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->parametro_auxiliarLogicAdditional = new parametro_auxiliar_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->parametro_auxiliarLogicAdditional==null) {
		//	$this->parametro_auxiliarLogicAdditional=new parametro_auxiliar_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->parametro_auxiliarDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->parametro_auxiliarDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->parametro_auxiliarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->parametro_auxiliarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->parametro_auxiliars = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_auxiliars=$this->parametro_auxiliarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_auxiliar_util::refrescarFKDescripciones($this->parametro_auxiliars);
			}
			
			//parametro_auxiliar_logic_add::checkparametro_auxiliarToGets($this->parametro_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_auxiliars);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->parametro_auxiliars = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_auxiliars=$this->parametro_auxiliarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_auxiliar_util::refrescarFKDescripciones($this->parametro_auxiliars);
			}
			
			//parametro_auxiliar_logic_add::checkparametro_auxiliarToGets($this->parametro_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_auxiliars);
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
		$this->parametro_auxiliar = new parametro_auxiliar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->parametro_auxiliar=$this->parametro_auxiliarDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_auxiliar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_auxiliar_util::refrescarFKDescripcion($this->parametro_auxiliar);
			}
						
			//parametro_auxiliar_logic_add::checkparametro_auxiliarToGet($this->parametro_auxiliar,$this->datosCliente);
			//parametro_auxiliar_logic_add::updateparametro_auxiliarToGet($this->parametro_auxiliar);
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
		$this->parametro_auxiliar = new  parametro_auxiliar();
		  		  
        try {		
			$this->parametro_auxiliar=$this->parametro_auxiliarDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_auxiliar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_auxiliar_util::refrescarFKDescripcion($this->parametro_auxiliar);
			}
			
			//parametro_auxiliar_logic_add::checkparametro_auxiliarToGet($this->parametro_auxiliar,$this->datosCliente);
			//parametro_auxiliar_logic_add::updateparametro_auxiliarToGet($this->parametro_auxiliar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?parametro_auxiliar {
		$parametro_auxiliarLogic = new  parametro_auxiliar_logic();
		  		  
        try {		
			$parametro_auxiliarLogic->setConnexion($connexion);			
			$parametro_auxiliarLogic->getEntity($id);			
			return $parametro_auxiliarLogic->getparametro_auxiliar();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->parametro_auxiliar = new  parametro_auxiliar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->parametro_auxiliar=$this->parametro_auxiliarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_auxiliar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_auxiliar_util::refrescarFKDescripcion($this->parametro_auxiliar);
			}
			
			//parametro_auxiliar_logic_add::checkparametro_auxiliarToGet($this->parametro_auxiliar,$this->datosCliente);
			//parametro_auxiliar_logic_add::updateparametro_auxiliarToGet($this->parametro_auxiliar);
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
		$this->parametro_auxiliar = new  parametro_auxiliar();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_auxiliar=$this->parametro_auxiliarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_auxiliar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_auxiliar_util::refrescarFKDescripcion($this->parametro_auxiliar);
			}
			
			//parametro_auxiliar_logic_add::checkparametro_auxiliarToGet($this->parametro_auxiliar,$this->datosCliente);
			//parametro_auxiliar_logic_add::updateparametro_auxiliarToGet($this->parametro_auxiliar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?parametro_auxiliar {
		$parametro_auxiliarLogic = new  parametro_auxiliar_logic();
		  		  
        try {		
			$parametro_auxiliarLogic->setConnexion($connexion);			
			$parametro_auxiliarLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $parametro_auxiliarLogic->getparametro_auxiliar();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->parametro_auxiliars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_auxiliars=$this->parametro_auxiliarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_auxiliar_util::refrescarFKDescripciones($this->parametro_auxiliars);
			}
			
			//parametro_auxiliar_logic_add::checkparametro_auxiliarToGets($this->parametro_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_auxiliars);			
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
		$this->parametro_auxiliars = array();
		  		  
        try {			
			$this->parametro_auxiliars=$this->parametro_auxiliarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_auxiliar_util::refrescarFKDescripciones($this->parametro_auxiliars);
			}
			
			//parametro_auxiliar_logic_add::checkparametro_auxiliarToGets($this->parametro_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_auxiliars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->parametro_auxiliars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_auxiliars=$this->parametro_auxiliarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_auxiliar_util::refrescarFKDescripciones($this->parametro_auxiliars);
			}
			
			//parametro_auxiliar_logic_add::checkparametro_auxiliarToGets($this->parametro_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_auxiliars);
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
		$this->parametro_auxiliars = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_auxiliars=$this->parametro_auxiliarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_auxiliar_util::refrescarFKDescripciones($this->parametro_auxiliars);
			}
			
			//parametro_auxiliar_logic_add::checkparametro_auxiliarToGets($this->parametro_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_auxiliars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$parametro_auxiliarLogic = new  parametro_auxiliar_logic();
		  		  
        try {		
			$parametro_auxiliarLogic->setConnexion($connexion);			
			$parametro_auxiliarLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $parametro_auxiliarLogic->getparametro_auxiliars();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->parametro_auxiliars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_auxiliars=$this->parametro_auxiliarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_auxiliar_util::refrescarFKDescripciones($this->parametro_auxiliars);
			}
			
			//parametro_auxiliar_logic_add::checkparametro_auxiliarToGets($this->parametro_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_auxiliars);
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
		$this->parametro_auxiliars = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_auxiliars=$this->parametro_auxiliarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_auxiliar_util::refrescarFKDescripciones($this->parametro_auxiliars);
			}
			
			//parametro_auxiliar_logic_add::checkparametro_auxiliarToGets($this->parametro_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_auxiliars);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->parametro_auxiliars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_auxiliars=$this->parametro_auxiliarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_auxiliar_util::refrescarFKDescripciones($this->parametro_auxiliars);
			}
			
			//parametro_auxiliar_logic_add::checkparametro_auxiliarToGets($this->parametro_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_auxiliars);
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
		$this->parametro_auxiliars = array();
		  		  
        try {			
			$this->parametro_auxiliars=$this->parametro_auxiliarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_auxiliar_util::refrescarFKDescripciones($this->parametro_auxiliars);
			}	
			
			//parametro_auxiliar_logic_add::checkparametro_auxiliarToGets($this->parametro_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_auxiliars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->parametro_auxiliars = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_auxiliars=$this->parametro_auxiliarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_auxiliar_util::refrescarFKDescripciones($this->parametro_auxiliars);
			}
			
			//parametro_auxiliar_logic_add::checkparametro_auxiliarToGets($this->parametro_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_auxiliars);
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
		$this->parametro_auxiliars = array();
		  		  
        try {		
			$this->parametro_auxiliars=$this->parametro_auxiliarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_auxiliar_util::refrescarFKDescripciones($this->parametro_auxiliars);
			}
			
			//parametro_auxiliar_logic_add::checkparametro_auxiliarToGets($this->parametro_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_auxiliars);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdempresaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_empresa) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_empresa= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,parametro_auxiliar_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->parametro_auxiliars=$this->parametro_auxiliarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_auxiliar_util::refrescarFKDescripciones($this->parametro_auxiliars);
			}
			//parametro_auxiliar_logic_add::checkparametro_auxiliarToGets($this->parametro_auxiliars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_auxiliars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idempresa(string $strFinalQuery,Pagination $pagination,int $id_empresa) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_empresa= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,parametro_auxiliar_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->parametro_auxiliars=$this->parametro_auxiliarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_auxiliar_util::refrescarFKDescripciones($this->parametro_auxiliars);
			}
			//parametro_auxiliar_logic_add::checkparametro_auxiliarToGets($this->parametro_auxiliars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_auxiliars);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idtipo_costeo_kardexWithConnection(string $strFinalQuery,Pagination $pagination,int $id_tipo_costeo_kardex) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_costeo_kardex= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_costeo_kardex->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_costeo_kardex,parametro_auxiliar_util::$ID_TIPO_COSTEO_KARDEX,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_costeo_kardex);

			$this->parametro_auxiliars=$this->parametro_auxiliarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_auxiliar_util::refrescarFKDescripciones($this->parametro_auxiliars);
			}
			//parametro_auxiliar_logic_add::checkparametro_auxiliarToGets($this->parametro_auxiliars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_auxiliars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtipo_costeo_kardex(string $strFinalQuery,Pagination $pagination,int $id_tipo_costeo_kardex) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_costeo_kardex= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_costeo_kardex->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_costeo_kardex,parametro_auxiliar_util::$ID_TIPO_COSTEO_KARDEX,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_costeo_kardex);

			$this->parametro_auxiliars=$this->parametro_auxiliarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_auxiliar_util::refrescarFKDescripciones($this->parametro_auxiliars);
			}
			//parametro_auxiliar_logic_add::checkparametro_auxiliarToGets($this->parametro_auxiliars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_auxiliars);
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
						
			//parametro_auxiliar_logic_add::checkparametro_auxiliarToSave($this->parametro_auxiliar,$this->datosCliente,$this->connexion);	       
			//parametro_auxiliar_logic_add::updateparametro_auxiliarToSave($this->parametro_auxiliar);			
			parametro_auxiliar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->parametro_auxiliar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->parametro_auxiliarLogicAdditional->checkGeneralEntityToSave($this,$this->parametro_auxiliar,$this->datosCliente,$this->connexion);
			
			
			parametro_auxiliar_data::save($this->parametro_auxiliar, $this->connexion);	    	       	 				
			//parametro_auxiliar_logic_add::checkparametro_auxiliarToSaveAfter($this->parametro_auxiliar,$this->datosCliente,$this->connexion);			
			//$this->parametro_auxiliarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->parametro_auxiliar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->parametro_auxiliar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->parametro_auxiliar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				parametro_auxiliar_util::refrescarFKDescripcion($this->parametro_auxiliar);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->parametro_auxiliar->getIsDeleted()) {
				$this->parametro_auxiliar=null;
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
						
			/*parametro_auxiliar_logic_add::checkparametro_auxiliarToSave($this->parametro_auxiliar,$this->datosCliente,$this->connexion);*/	        
			//parametro_auxiliar_logic_add::updateparametro_auxiliarToSave($this->parametro_auxiliar);			
			//$this->parametro_auxiliarLogicAdditional->checkGeneralEntityToSave($this,$this->parametro_auxiliar,$this->datosCliente,$this->connexion);			
			parametro_auxiliar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->parametro_auxiliar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			parametro_auxiliar_data::save($this->parametro_auxiliar, $this->connexion);	    	       	 						
			/*parametro_auxiliar_logic_add::checkparametro_auxiliarToSaveAfter($this->parametro_auxiliar,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_auxiliarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->parametro_auxiliar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->parametro_auxiliar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->parametro_auxiliar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				parametro_auxiliar_util::refrescarFKDescripcion($this->parametro_auxiliar);				
			}
			
			if($this->parametro_auxiliar->getIsDeleted()) {
				$this->parametro_auxiliar=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(parametro_auxiliar $parametro_auxiliar,Connexion $connexion)  {
		$parametro_auxiliarLogic = new  parametro_auxiliar_logic();		  		  
        try {		
			$parametro_auxiliarLogic->setConnexion($connexion);			
			$parametro_auxiliarLogic->setparametro_auxiliar($parametro_auxiliar);			
			$parametro_auxiliarLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*parametro_auxiliar_logic_add::checkparametro_auxiliarToSaves($this->parametro_auxiliars,$this->datosCliente,$this->connexion);*/	        	
			//$this->parametro_auxiliarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->parametro_auxiliars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->parametro_auxiliars as $parametro_auxiliarLocal) {				
								
				//parametro_auxiliar_logic_add::updateparametro_auxiliarToSave($parametro_auxiliarLocal);	        	
				parametro_auxiliar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$parametro_auxiliarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				parametro_auxiliar_data::save($parametro_auxiliarLocal, $this->connexion);				
			}
			
			/*parametro_auxiliar_logic_add::checkparametro_auxiliarToSavesAfter($this->parametro_auxiliars,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_auxiliarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->parametro_auxiliars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_auxiliar_util::refrescarFKDescripciones($this->parametro_auxiliars);
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
			/*parametro_auxiliar_logic_add::checkparametro_auxiliarToSaves($this->parametro_auxiliars,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_auxiliarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->parametro_auxiliars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->parametro_auxiliars as $parametro_auxiliarLocal) {				
								
				//parametro_auxiliar_logic_add::updateparametro_auxiliarToSave($parametro_auxiliarLocal);	        	
				parametro_auxiliar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$parametro_auxiliarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				parametro_auxiliar_data::save($parametro_auxiliarLocal, $this->connexion);				
			}			
			
			/*parametro_auxiliar_logic_add::checkparametro_auxiliarToSavesAfter($this->parametro_auxiliars,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_auxiliarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->parametro_auxiliars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_auxiliar_util::refrescarFKDescripciones($this->parametro_auxiliars);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $parametro_auxiliars,Connexion $connexion)  {
		$parametro_auxiliarLogic = new  parametro_auxiliar_logic();
		  		  
        try {		
			$parametro_auxiliarLogic->setConnexion($connexion);			
			$parametro_auxiliarLogic->setparametro_auxiliars($parametro_auxiliars);			
			$parametro_auxiliarLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$parametro_auxiliarsAux=array();
		
		foreach($this->parametro_auxiliars as $parametro_auxiliar) {
			if($parametro_auxiliar->getIsDeleted()==false) {
				$parametro_auxiliarsAux[]=$parametro_auxiliar;
			}
		}
		
		$this->parametro_auxiliars=$parametro_auxiliarsAux;
	}
	
	public function updateToGetsAuxiliar(array &$parametro_auxiliars) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->parametro_auxiliars as $parametro_auxiliar) {
				
				$parametro_auxiliar->setid_empresa_Descripcion(parametro_auxiliar_util::getempresaDescripcion($parametro_auxiliar->getempresa()));
				$parametro_auxiliar->setid_tipo_costeo_kardex_Descripcion(parametro_auxiliar_util::gettipo_costeo_kardexDescripcion($parametro_auxiliar->gettipo_costeo_kardex()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$parametro_auxiliar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$parametro_auxiliar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$parametro_auxiliar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$parametro_auxiliar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$parametro_auxiliar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$parametro_auxiliarForeignKey=new parametro_auxiliar_param_return();//parametro_auxiliarForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$parametro_auxiliarForeignKey,$parametro_auxiliar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_costeo_kardex',$strRecargarFkTipos,',')) {
				$this->cargarCombostipo_costeo_kardexsFK($this->connexion,$strRecargarFkQuery,$parametro_auxiliarForeignKey,$parametro_auxiliar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$parametro_auxiliarForeignKey,$parametro_auxiliar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_tipo_costeo_kardex',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostipo_costeo_kardexsFK($this->connexion,' where id=-1 ',$parametro_auxiliarForeignKey,$parametro_auxiliar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $parametro_auxiliarForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$parametro_auxiliarForeignKey,$parametro_auxiliar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$parametro_auxiliarForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($parametro_auxiliar_session==null) {
			$parametro_auxiliar_session=new parametro_auxiliar_session();
		}
		
		if($parametro_auxiliar_session->bitBusquedaDesdeFKSesionempresa!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=empresa_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalempresa=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalempresa=Funciones::GetFinalQueryAppend($finalQueryGlobalempresa, '');
				$finalQueryGlobalempresa.=empresa_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalempresa.$strRecargarFkQuery;		

				$empresaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($empresaLogic->getempresas() as $empresaLocal ) {
				if($parametro_auxiliarForeignKey->idempresaDefaultFK==0) {
					$parametro_auxiliarForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$parametro_auxiliarForeignKey->empresasFK[$empresaLocal->getId()]=parametro_auxiliar_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($parametro_auxiliar_session->bigidempresaActual!=null && $parametro_auxiliar_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($parametro_auxiliar_session->bigidempresaActual);//WithConnection

				$parametro_auxiliarForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=parametro_auxiliar_util::getempresaDescripcion($empresaLogic->getempresa());
				$parametro_auxiliarForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombostipo_costeo_kardexsFK($connexion=null,$strRecargarFkQuery='',$parametro_auxiliarForeignKey,$parametro_auxiliar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$tipo_costeo_kardexLogic= new tipo_costeo_kardex_logic();
		$pagination= new Pagination();
		$parametro_auxiliarForeignKey->tipo_costeo_kardexsFK=array();

		$tipo_costeo_kardexLogic->setConnexion($connexion);
		$tipo_costeo_kardexLogic->gettipo_costeo_kardexDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($parametro_auxiliar_session==null) {
			$parametro_auxiliar_session=new parametro_auxiliar_session();
		}
		
		if($parametro_auxiliar_session->bitBusquedaDesdeFKSesiontipo_costeo_kardex!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_costeo_kardex_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaltipo_costeo_kardex=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_costeo_kardex=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_costeo_kardex, '');
				$finalQueryGlobaltipo_costeo_kardex.=tipo_costeo_kardex_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_costeo_kardex.$strRecargarFkQuery;		

				$tipo_costeo_kardexLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($tipo_costeo_kardexLogic->gettipo_costeo_kardexs() as $tipo_costeo_kardexLocal ) {
				if($parametro_auxiliarForeignKey->idtipo_costeo_kardexDefaultFK==0) {
					$parametro_auxiliarForeignKey->idtipo_costeo_kardexDefaultFK=$tipo_costeo_kardexLocal->getId();
				}

				$parametro_auxiliarForeignKey->tipo_costeo_kardexsFK[$tipo_costeo_kardexLocal->getId()]=parametro_auxiliar_util::gettipo_costeo_kardexDescripcion($tipo_costeo_kardexLocal);
			}

		} else {

			if($parametro_auxiliar_session->bigidtipo_costeo_kardexActual!=null && $parametro_auxiliar_session->bigidtipo_costeo_kardexActual > 0) {
				$tipo_costeo_kardexLogic->getEntity($parametro_auxiliar_session->bigidtipo_costeo_kardexActual);//WithConnection

				$parametro_auxiliarForeignKey->tipo_costeo_kardexsFK[$tipo_costeo_kardexLogic->gettipo_costeo_kardex()->getId()]=parametro_auxiliar_util::gettipo_costeo_kardexDescripcion($tipo_costeo_kardexLogic->gettipo_costeo_kardex());
				$parametro_auxiliarForeignKey->idtipo_costeo_kardexDefaultFK=$tipo_costeo_kardexLogic->gettipo_costeo_kardex()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($parametro_auxiliar) {
		$this->saveRelacionesBase($parametro_auxiliar,true);
	}

	public function saveRelaciones($parametro_auxiliar) {
		$this->saveRelacionesBase($parametro_auxiliar,false);
	}

	public function saveRelacionesBase($parametro_auxiliar,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setparametro_auxiliar($parametro_auxiliar);

			if(true) {

				//parametro_auxiliar_logic_add::updateRelacionesToSave($parametro_auxiliar,$this);

				if(($this->parametro_auxiliar->getIsNew() || $this->parametro_auxiliar->getIsChanged()) && !$this->parametro_auxiliar->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->parametro_auxiliar->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//parametro_auxiliar_logic_add::updateRelacionesToSaveAfter($parametro_auxiliar,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $parametro_auxiliars,parametro_auxiliar_param_return $parametro_auxiliarParameterGeneral) : parametro_auxiliar_param_return {
		$parametro_auxiliarReturnGeneral=new parametro_auxiliar_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $parametro_auxiliarReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $parametro_auxiliars,parametro_auxiliar_param_return $parametro_auxiliarParameterGeneral) : parametro_auxiliar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_auxiliarReturnGeneral=new parametro_auxiliar_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_auxiliarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_auxiliars,parametro_auxiliar $parametro_auxiliar,parametro_auxiliar_param_return $parametro_auxiliarParameterGeneral,bool $isEsNuevoparametro_auxiliar,array $clases) : parametro_auxiliar_param_return {
		 try {	
			$parametro_auxiliarReturnGeneral=new parametro_auxiliar_param_return();
	
			$parametro_auxiliarReturnGeneral->setparametro_auxiliar($parametro_auxiliar);
			$parametro_auxiliarReturnGeneral->setparametro_auxiliars($parametro_auxiliars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$parametro_auxiliarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $parametro_auxiliarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_auxiliars,parametro_auxiliar $parametro_auxiliar,parametro_auxiliar_param_return $parametro_auxiliarParameterGeneral,bool $isEsNuevoparametro_auxiliar,array $clases) : parametro_auxiliar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_auxiliarReturnGeneral=new parametro_auxiliar_param_return();
	
			$parametro_auxiliarReturnGeneral->setparametro_auxiliar($parametro_auxiliar);
			$parametro_auxiliarReturnGeneral->setparametro_auxiliars($parametro_auxiliars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$parametro_auxiliarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_auxiliarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_auxiliars,parametro_auxiliar $parametro_auxiliar,parametro_auxiliar_param_return $parametro_auxiliarParameterGeneral,bool $isEsNuevoparametro_auxiliar,array $clases) : parametro_auxiliar_param_return {
		 try {	
			$parametro_auxiliarReturnGeneral=new parametro_auxiliar_param_return();
	
			$parametro_auxiliarReturnGeneral->setparametro_auxiliar($parametro_auxiliar);
			$parametro_auxiliarReturnGeneral->setparametro_auxiliars($parametro_auxiliars);
			
			
			
			return $parametro_auxiliarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_auxiliars,parametro_auxiliar $parametro_auxiliar,parametro_auxiliar_param_return $parametro_auxiliarParameterGeneral,bool $isEsNuevoparametro_auxiliar,array $clases) : parametro_auxiliar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_auxiliarReturnGeneral=new parametro_auxiliar_param_return();
	
			$parametro_auxiliarReturnGeneral->setparametro_auxiliar($parametro_auxiliar);
			$parametro_auxiliarReturnGeneral->setparametro_auxiliars($parametro_auxiliars);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_auxiliarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,parametro_auxiliar $parametro_auxiliar,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,parametro_auxiliar $parametro_auxiliar,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		parametro_auxiliar_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(parametro_auxiliar $parametro_auxiliar,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//parametro_auxiliar_logic_add::updateparametro_auxiliarToGet($this->parametro_auxiliar);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$parametro_auxiliar->setempresa($this->parametro_auxiliarDataAccess->getempresa($this->connexion,$parametro_auxiliar));
		$parametro_auxiliar->settipo_costeo_kardex($this->parametro_auxiliarDataAccess->gettipo_costeo_kardex($this->connexion,$parametro_auxiliar));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$parametro_auxiliar->setempresa($this->parametro_auxiliarDataAccess->getempresa($this->connexion,$parametro_auxiliar));
				continue;
			}

			if($clas->clas==tipo_costeo_kardex::$class.'') {
				$parametro_auxiliar->settipo_costeo_kardex($this->parametro_auxiliarDataAccess->gettipo_costeo_kardex($this->connexion,$parametro_auxiliar));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_auxiliar->setempresa($this->parametro_auxiliarDataAccess->getempresa($this->connexion,$parametro_auxiliar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==tipo_costeo_kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_auxiliar->settipo_costeo_kardex($this->parametro_auxiliarDataAccess->gettipo_costeo_kardex($this->connexion,$parametro_auxiliar));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$parametro_auxiliar->setempresa($this->parametro_auxiliarDataAccess->getempresa($this->connexion,$parametro_auxiliar));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($parametro_auxiliar->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$parametro_auxiliar->settipo_costeo_kardex($this->parametro_auxiliarDataAccess->gettipo_costeo_kardex($this->connexion,$parametro_auxiliar));
		$tipo_costeo_kardexLogic= new tipo_costeo_kardex_logic($this->connexion);
		$tipo_costeo_kardexLogic->deepLoad($parametro_auxiliar->gettipo_costeo_kardex(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$parametro_auxiliar->setempresa($this->parametro_auxiliarDataAccess->getempresa($this->connexion,$parametro_auxiliar));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($parametro_auxiliar->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==tipo_costeo_kardex::$class.'') {
				$parametro_auxiliar->settipo_costeo_kardex($this->parametro_auxiliarDataAccess->gettipo_costeo_kardex($this->connexion,$parametro_auxiliar));
				$tipo_costeo_kardexLogic= new tipo_costeo_kardex_logic($this->connexion);
				$tipo_costeo_kardexLogic->deepLoad($parametro_auxiliar->gettipo_costeo_kardex(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_auxiliar->setempresa($this->parametro_auxiliarDataAccess->getempresa($this->connexion,$parametro_auxiliar));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($parametro_auxiliar->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_costeo_kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_auxiliar->settipo_costeo_kardex($this->parametro_auxiliarDataAccess->gettipo_costeo_kardex($this->connexion,$parametro_auxiliar));
			$tipo_costeo_kardexLogic= new tipo_costeo_kardex_logic($this->connexion);
			$tipo_costeo_kardexLogic->deepLoad($parametro_auxiliar->gettipo_costeo_kardex(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(parametro_auxiliar $parametro_auxiliar,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//parametro_auxiliar_logic_add::updateparametro_auxiliarToSave($this->parametro_auxiliar);			
			
			if(!$paraDeleteCascade) {				
				parametro_auxiliar_data::save($parametro_auxiliar, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($parametro_auxiliar->getempresa(),$this->connexion);
		tipo_costeo_kardex_data::save($parametro_auxiliar->gettipo_costeo_kardex(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($parametro_auxiliar->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==tipo_costeo_kardex::$class.'') {
				tipo_costeo_kardex_data::save($parametro_auxiliar->gettipo_costeo_kardex(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			empresa_data::save($parametro_auxiliar->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_costeo_kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_costeo_kardex_data::save($parametro_auxiliar->gettipo_costeo_kardex(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($parametro_auxiliar->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($parametro_auxiliar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		tipo_costeo_kardex_data::save($parametro_auxiliar->gettipo_costeo_kardex(),$this->connexion);
		$tipo_costeo_kardexLogic= new tipo_costeo_kardex_logic($this->connexion);
		$tipo_costeo_kardexLogic->deepSave($parametro_auxiliar->gettipo_costeo_kardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($parametro_auxiliar->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($parametro_auxiliar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==tipo_costeo_kardex::$class.'') {
				tipo_costeo_kardex_data::save($parametro_auxiliar->gettipo_costeo_kardex(),$this->connexion);
				$tipo_costeo_kardexLogic= new tipo_costeo_kardex_logic($this->connexion);
				$tipo_costeo_kardexLogic->deepSave($parametro_auxiliar->gettipo_costeo_kardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			empresa_data::save($parametro_auxiliar->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($parametro_auxiliar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_costeo_kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_costeo_kardex_data::save($parametro_auxiliar->gettipo_costeo_kardex(),$this->connexion);
			$tipo_costeo_kardexLogic= new tipo_costeo_kardex_logic($this->connexion);
			$tipo_costeo_kardexLogic->deepSave($parametro_auxiliar->gettipo_costeo_kardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				parametro_auxiliar_data::save($parametro_auxiliar, $this->connexion);
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
			
			$this->deepLoad($this->parametro_auxiliar,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->parametro_auxiliars as $parametro_auxiliar) {
				$this->deepLoad($parametro_auxiliar,$isDeep,$deepLoadType,$clases);
								
				parametro_auxiliar_util::refrescarFKDescripciones($this->parametro_auxiliars);
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
			
			foreach($this->parametro_auxiliars as $parametro_auxiliar) {
				$this->deepLoad($parametro_auxiliar,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->parametro_auxiliar,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->parametro_auxiliars as $parametro_auxiliar) {
				$this->deepSave($parametro_auxiliar,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->parametro_auxiliars as $parametro_auxiliar) {
				$this->deepSave($parametro_auxiliar,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(empresa::$class);
				$classes[]=new Classe(tipo_costeo_kardex::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==tipo_costeo_kardex::$class) {
						$classes[]=new Classe(tipo_costeo_kardex::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(empresa::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==tipo_costeo_kardex::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_costeo_kardex::$class);
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
	
	
	
	
	
	
	
	public function getparametro_auxiliar() : ?parametro_auxiliar {	
		/*
		parametro_auxiliar_logic_add::checkparametro_auxiliarToGet($this->parametro_auxiliar,$this->datosCliente);
		parametro_auxiliar_logic_add::updateparametro_auxiliarToGet($this->parametro_auxiliar);
		*/
			
		return $this->parametro_auxiliar;
	}
		
	public function setparametro_auxiliar(parametro_auxiliar $newparametro_auxiliar) {
		$this->parametro_auxiliar = $newparametro_auxiliar;
	}
	
	public function getparametro_auxiliars() : array {		
		/*
		parametro_auxiliar_logic_add::checkparametro_auxiliarToGets($this->parametro_auxiliars,$this->datosCliente);
		
		foreach ($this->parametro_auxiliars as $parametro_auxiliarLocal ) {
			parametro_auxiliar_logic_add::updateparametro_auxiliarToGet($parametro_auxiliarLocal);
		}
		*/
		
		return $this->parametro_auxiliars;
	}
	
	public function setparametro_auxiliars(array $newparametro_auxiliars) {
		$this->parametro_auxiliars = $newparametro_auxiliars;
	}
	
	public function getparametro_auxiliarDataAccess() : parametro_auxiliar_data {
		return $this->parametro_auxiliarDataAccess;
	}
	
	public function setparametro_auxiliarDataAccess(parametro_auxiliar_data $newparametro_auxiliarDataAccess) {
		$this->parametro_auxiliarDataAccess = $newparametro_auxiliarDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        parametro_auxiliar_carga::$CONTROLLER;;        
		
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
