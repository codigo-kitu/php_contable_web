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

namespace com\bydan\contabilidad\general\empresa\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_param_return;

use com\bydan\contabilidad\general\empresa\presentation\session\empresa_session;

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

use com\bydan\contabilidad\general\empresa\util\empresa_util;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;

//FK


use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\pais\business\data\pais_data;
use com\bydan\contabilidad\seguridad\pais\business\logic\pais_logic;
use com\bydan\contabilidad\seguridad\pais\util\pais_util;

use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;
use com\bydan\contabilidad\seguridad\ciudad\business\data\ciudad_data;
use com\bydan\contabilidad\seguridad\ciudad\business\logic\ciudad_logic;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_util;

//REL


//REL DETALLES




class empresa_logic  extends GeneralEntityLogic implements empresa_logicI {	
	/*GENERAL*/
	public empresa_data $empresaDataAccess;
	//public ?empresa_logic_add $empresaLogicAdditional=null;
	public ?empresa $empresa;
	public array $empresas;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->empresaDataAccess = new empresa_data();			
			$this->empresas = array();
			$this->empresa = new empresa();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->empresaLogicAdditional = new empresa_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->empresaLogicAdditional==null) {
		//	$this->empresaLogicAdditional=new empresa_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->empresaDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->empresaDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->empresaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->empresaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->empresas = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->empresas=$this->empresaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				empresa_util::refrescarFKDescripciones($this->empresas);
			}
			
			//empresa_logic_add::checkempresaToGets($this->empresas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->empresas);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->empresas = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->empresas=$this->empresaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				empresa_util::refrescarFKDescripciones($this->empresas);
			}
			
			//empresa_logic_add::checkempresaToGets($this->empresas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->empresas);
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
		$this->empresa = new empresa();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->empresa=$this->empresaDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->empresa,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				empresa_util::refrescarFKDescripcion($this->empresa);
			}
						
			//empresa_logic_add::checkempresaToGet($this->empresa,$this->datosCliente);
			//empresa_logic_add::updateempresaToGet($this->empresa);
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
		$this->empresa = new  empresa();
		  		  
        try {		
			$this->empresa=$this->empresaDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->empresa,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				empresa_util::refrescarFKDescripcion($this->empresa);
			}
			
			//empresa_logic_add::checkempresaToGet($this->empresa,$this->datosCliente);
			//empresa_logic_add::updateempresaToGet($this->empresa);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?empresa {
		$empresaLogic = new  empresa_logic();
		  		  
        try {		
			$empresaLogic->setConnexion($connexion);			
			$empresaLogic->getEntity($id);			
			return $empresaLogic->getempresa();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->empresa = new  empresa();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->empresa=$this->empresaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->empresa,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				empresa_util::refrescarFKDescripcion($this->empresa);
			}
			
			//empresa_logic_add::checkempresaToGet($this->empresa,$this->datosCliente);
			//empresa_logic_add::updateempresaToGet($this->empresa);
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
		$this->empresa = new  empresa();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->empresa=$this->empresaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->empresa,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				empresa_util::refrescarFKDescripcion($this->empresa);
			}
			
			//empresa_logic_add::checkempresaToGet($this->empresa,$this->datosCliente);
			//empresa_logic_add::updateempresaToGet($this->empresa);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?empresa {
		$empresaLogic = new  empresa_logic();
		  		  
        try {		
			$empresaLogic->setConnexion($connexion);			
			$empresaLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $empresaLogic->getempresa();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->empresas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->empresas=$this->empresaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				empresa_util::refrescarFKDescripciones($this->empresas);
			}
			
			//empresa_logic_add::checkempresaToGets($this->empresas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->empresas);			
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
		$this->empresas = array();
		  		  
        try {			
			$this->empresas=$this->empresaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				empresa_util::refrescarFKDescripciones($this->empresas);
			}
			
			//empresa_logic_add::checkempresaToGets($this->empresas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->empresas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->empresas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->empresas=$this->empresaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				empresa_util::refrescarFKDescripciones($this->empresas);
			}
			
			//empresa_logic_add::checkempresaToGets($this->empresas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->empresas);
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
		$this->empresas = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->empresas=$this->empresaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				empresa_util::refrescarFKDescripciones($this->empresas);
			}
			
			//empresa_logic_add::checkempresaToGets($this->empresas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->empresas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$empresaLogic = new  empresa_logic();
		  		  
        try {		
			$empresaLogic->setConnexion($connexion);			
			$empresaLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $empresaLogic->getempresas();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->empresas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->empresas=$this->empresaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				empresa_util::refrescarFKDescripciones($this->empresas);
			}
			
			//empresa_logic_add::checkempresaToGets($this->empresas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->empresas);
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
		$this->empresas = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->empresas=$this->empresaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				empresa_util::refrescarFKDescripciones($this->empresas);
			}
			
			//empresa_logic_add::checkempresaToGets($this->empresas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->empresas);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->empresas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->empresas=$this->empresaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				empresa_util::refrescarFKDescripciones($this->empresas);
			}
			
			//empresa_logic_add::checkempresaToGets($this->empresas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->empresas);
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
		$this->empresas = array();
		  		  
        try {			
			$this->empresas=$this->empresaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				empresa_util::refrescarFKDescripciones($this->empresas);
			}	
			
			//empresa_logic_add::checkempresaToGets($this->empresas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->empresas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->empresas = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->empresas=$this->empresaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				empresa_util::refrescarFKDescripciones($this->empresas);
			}
			
			//empresa_logic_add::checkempresaToGets($this->empresas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->empresas);
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
		$this->empresas = array();
		  		  
        try {		
			$this->empresas=$this->empresaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				empresa_util::refrescarFKDescripciones($this->empresas);
			}
			
			//empresa_logic_add::checkempresaToGets($this->empresas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->empresas);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdciudadWithConnection(string $strFinalQuery,Pagination $pagination,int $id_ciudad) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_ciudad= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_ciudad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ciudad,empresa_util::$ID_CIUDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ciudad);

			$this->empresas=$this->empresaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				empresa_util::refrescarFKDescripciones($this->empresas);
			}
			//empresa_logic_add::checkempresaToGets($this->empresas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->empresas);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idciudad(string $strFinalQuery,Pagination $pagination,int $id_ciudad) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_ciudad= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_ciudad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ciudad,empresa_util::$ID_CIUDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ciudad);

			$this->empresas=$this->empresaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				empresa_util::refrescarFKDescripciones($this->empresas);
			}
			//empresa_logic_add::checkempresaToGets($this->empresas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->empresas);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdpaisWithConnection(string $strFinalQuery,Pagination $pagination,int $id_pais) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_pais= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_pais->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_pais,empresa_util::$ID_PAIS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_pais);

			$this->empresas=$this->empresaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				empresa_util::refrescarFKDescripciones($this->empresas);
			}
			//empresa_logic_add::checkempresaToGets($this->empresas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->empresas);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idpais(string $strFinalQuery,Pagination $pagination,int $id_pais) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_pais= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_pais->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_pais,empresa_util::$ID_PAIS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_pais);

			$this->empresas=$this->empresaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				empresa_util::refrescarFKDescripciones($this->empresas);
			}
			//empresa_logic_add::checkempresaToGets($this->empresas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->empresas);
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
						
			//empresa_logic_add::checkempresaToSave($this->empresa,$this->datosCliente,$this->connexion);	       
			//empresa_logic_add::updateempresaToSave($this->empresa);			
			empresa_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->empresa,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->empresaLogicAdditional->checkGeneralEntityToSave($this,$this->empresa,$this->datosCliente,$this->connexion);
			
			
			empresa_data::save($this->empresa, $this->connexion);	    	       	 				
			//empresa_logic_add::checkempresaToSaveAfter($this->empresa,$this->datosCliente,$this->connexion);			
			//$this->empresaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->empresa,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->empresa,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->empresa,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				empresa_util::refrescarFKDescripcion($this->empresa);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->empresa->getIsDeleted()) {
				$this->empresa=null;
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
						
			/*empresa_logic_add::checkempresaToSave($this->empresa,$this->datosCliente,$this->connexion);*/	        
			//empresa_logic_add::updateempresaToSave($this->empresa);			
			//$this->empresaLogicAdditional->checkGeneralEntityToSave($this,$this->empresa,$this->datosCliente,$this->connexion);			
			empresa_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->empresa,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			empresa_data::save($this->empresa, $this->connexion);	    	       	 						
			/*empresa_logic_add::checkempresaToSaveAfter($this->empresa,$this->datosCliente,$this->connexion);*/			
			//$this->empresaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->empresa,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->empresa,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->empresa,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				empresa_util::refrescarFKDescripcion($this->empresa);				
			}
			
			if($this->empresa->getIsDeleted()) {
				$this->empresa=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(empresa $empresa,Connexion $connexion)  {
		$empresaLogic = new  empresa_logic();		  		  
        try {		
			$empresaLogic->setConnexion($connexion);			
			$empresaLogic->setempresa($empresa);			
			$empresaLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*empresa_logic_add::checkempresaToSaves($this->empresas,$this->datosCliente,$this->connexion);*/	        	
			//$this->empresaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->empresas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->empresas as $empresaLocal) {				
								
				//empresa_logic_add::updateempresaToSave($empresaLocal);	        	
				empresa_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$empresaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				empresa_data::save($empresaLocal, $this->connexion);				
			}
			
			/*empresa_logic_add::checkempresaToSavesAfter($this->empresas,$this->datosCliente,$this->connexion);*/			
			//$this->empresaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->empresas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				empresa_util::refrescarFKDescripciones($this->empresas);
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
			/*empresa_logic_add::checkempresaToSaves($this->empresas,$this->datosCliente,$this->connexion);*/			
			//$this->empresaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->empresas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->empresas as $empresaLocal) {				
								
				//empresa_logic_add::updateempresaToSave($empresaLocal);	        	
				empresa_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$empresaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				empresa_data::save($empresaLocal, $this->connexion);				
			}			
			
			/*empresa_logic_add::checkempresaToSavesAfter($this->empresas,$this->datosCliente,$this->connexion);*/			
			//$this->empresaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->empresas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				empresa_util::refrescarFKDescripciones($this->empresas);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $empresas,Connexion $connexion)  {
		$empresaLogic = new  empresa_logic();
		  		  
        try {		
			$empresaLogic->setConnexion($connexion);			
			$empresaLogic->setempresas($empresas);			
			$empresaLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$empresasAux=array();
		
		foreach($this->empresas as $empresa) {
			if($empresa->getIsDeleted()==false) {
				$empresasAux[]=$empresa;
			}
		}
		
		$this->empresas=$empresasAux;
	}
	
	public function updateToGetsAuxiliar(array &$empresas) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->empresas as $empresa) {
				
				$empresa->setid_pais_Descripcion(empresa_util::getpaisDescripcion($empresa->getpais()));
				$empresa->setid_ciudad_Descripcion(empresa_util::getciudadDescripcion($empresa->getciudad()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$empresa_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$empresa_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$empresa_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$empresa_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$empresa_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$empresaForeignKey=new empresa_param_return();//empresaForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_pais',$strRecargarFkTipos,',')) {
				$this->cargarCombospaissFK($this->connexion,$strRecargarFkQuery,$empresaForeignKey,$empresa_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ciudad',$strRecargarFkTipos,',')) {
				$this->cargarCombosciudadsFK($this->connexion,$strRecargarFkQuery,$empresaForeignKey,$empresa_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_pais',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombospaissFK($this->connexion,' where id=-1 ',$empresaForeignKey,$empresa_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ciudad',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosciudadsFK($this->connexion,' where id=-1 ',$empresaForeignKey,$empresa_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $empresaForeignKey;
			
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
	
	
	public function cargarCombospaissFK($connexion=null,$strRecargarFkQuery='',$empresaForeignKey,$empresa_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$paisLogic= new pais_logic();
		$pagination= new Pagination();
		$empresaForeignKey->paissFK=array();

		$paisLogic->setConnexion($connexion);
		$paisLogic->getpaisDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($empresa_session==null) {
			$empresa_session=new empresa_session();
		}
		
		if($empresa_session->bitBusquedaDesdeFKSesionpais!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=pais_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalpais=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalpais=Funciones::GetFinalQueryAppend($finalQueryGlobalpais, '');
				$finalQueryGlobalpais.=pais_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalpais.$strRecargarFkQuery;		

				$paisLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($paisLogic->getpaiss() as $paisLocal ) {
				if($empresaForeignKey->idpaisDefaultFK==0) {
					$empresaForeignKey->idpaisDefaultFK=$paisLocal->getId();
				}

				$empresaForeignKey->paissFK[$paisLocal->getId()]=empresa_util::getpaisDescripcion($paisLocal);
			}

		} else {

			if($empresa_session->bigidpaisActual!=null && $empresa_session->bigidpaisActual > 0) {
				$paisLogic->getEntity($empresa_session->bigidpaisActual);//WithConnection

				$empresaForeignKey->paissFK[$paisLogic->getpais()->getId()]=empresa_util::getpaisDescripcion($paisLogic->getpais());
				$empresaForeignKey->idpaisDefaultFK=$paisLogic->getpais()->getId();
			}
		}
	}

	public function cargarCombosciudadsFK($connexion=null,$strRecargarFkQuery='',$empresaForeignKey,$empresa_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ciudadLogic= new ciudad_logic();
		$pagination= new Pagination();
		$empresaForeignKey->ciudadsFK=array();

		$ciudadLogic->setConnexion($connexion);
		$ciudadLogic->getciudadDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($empresa_session==null) {
			$empresa_session=new empresa_session();
		}
		
		if($empresa_session->bitBusquedaDesdeFKSesionciudad!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=ciudad_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalciudad=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalciudad=Funciones::GetFinalQueryAppend($finalQueryGlobalciudad, '');
				$finalQueryGlobalciudad.=ciudad_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalciudad.$strRecargarFkQuery;		

				$ciudadLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($ciudadLogic->getciudads() as $ciudadLocal ) {
				if($empresaForeignKey->idciudadDefaultFK==0) {
					$empresaForeignKey->idciudadDefaultFK=$ciudadLocal->getId();
				}

				$empresaForeignKey->ciudadsFK[$ciudadLocal->getId()]=empresa_util::getciudadDescripcion($ciudadLocal);
			}

		} else {

			if($empresa_session->bigidciudadActual!=null && $empresa_session->bigidciudadActual > 0) {
				$ciudadLogic->getEntity($empresa_session->bigidciudadActual);//WithConnection

				$empresaForeignKey->ciudadsFK[$ciudadLogic->getciudad()->getId()]=empresa_util::getciudadDescripcion($ciudadLogic->getciudad());
				$empresaForeignKey->idciudadDefaultFK=$ciudadLogic->getciudad()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($empresa) {
		$this->saveRelacionesBase($empresa,true);
	}

	public function saveRelaciones($empresa) {
		$this->saveRelacionesBase($empresa,false);
	}

	public function saveRelacionesBase($empresa,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setempresa($empresa);

			if(true) {

				//empresa_logic_add::updateRelacionesToSave($empresa,$this);

				if(($this->empresa->getIsNew() || $this->empresa->getIsChanged()) && !$this->empresa->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->empresa->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//empresa_logic_add::updateRelacionesToSaveAfter($empresa,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $empresas,empresa_param_return $empresaParameterGeneral) : empresa_param_return {
		$empresaReturnGeneral=new empresa_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $empresaReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $empresas,empresa_param_return $empresaParameterGeneral) : empresa_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$empresaReturnGeneral=new empresa_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $empresaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $empresas,empresa $empresa,empresa_param_return $empresaParameterGeneral,bool $isEsNuevoempresa,array $clases) : empresa_param_return {
		 try {	
			$empresaReturnGeneral=new empresa_param_return();
	
			$empresaReturnGeneral->setempresa($empresa);
			$empresaReturnGeneral->setempresas($empresas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$empresaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $empresaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $empresas,empresa $empresa,empresa_param_return $empresaParameterGeneral,bool $isEsNuevoempresa,array $clases) : empresa_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$empresaReturnGeneral=new empresa_param_return();
	
			$empresaReturnGeneral->setempresa($empresa);
			$empresaReturnGeneral->setempresas($empresas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$empresaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $empresaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $empresas,empresa $empresa,empresa_param_return $empresaParameterGeneral,bool $isEsNuevoempresa,array $clases) : empresa_param_return {
		 try {	
			$empresaReturnGeneral=new empresa_param_return();
	
			$empresaReturnGeneral->setempresa($empresa);
			$empresaReturnGeneral->setempresas($empresas);
			
			
			
			return $empresaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $empresas,empresa $empresa,empresa_param_return $empresaParameterGeneral,bool $isEsNuevoempresa,array $clases) : empresa_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$empresaReturnGeneral=new empresa_param_return();
	
			$empresaReturnGeneral->setempresa($empresa);
			$empresaReturnGeneral->setempresas($empresas);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $empresaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,empresa $empresa,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,empresa $empresa,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		empresa_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(empresa $empresa,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//empresa_logic_add::updateempresaToGet($this->empresa);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$empresa->setpais($this->empresaDataAccess->getpais($this->connexion,$empresa));
		$empresa->setciudad($this->empresaDataAccess->getciudad($this->connexion,$empresa));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$empresa->setpais($this->empresaDataAccess->getpais($this->connexion,$empresa));
				continue;
			}

			if($clas->clas==ciudad::$class.'') {
				$empresa->setciudad($this->empresaDataAccess->getciudad($this->connexion,$empresa));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$empresa->setpais($this->empresaDataAccess->getpais($this->connexion,$empresa));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ciudad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$empresa->setciudad($this->empresaDataAccess->getciudad($this->connexion,$empresa));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$empresa->setpais($this->empresaDataAccess->getpais($this->connexion,$empresa));
		$paisLogic= new pais_logic($this->connexion);
		$paisLogic->deepLoad($empresa->getpais(),$isDeep,$deepLoadType,$clases);
				
		$empresa->setciudad($this->empresaDataAccess->getciudad($this->connexion,$empresa));
		$ciudadLogic= new ciudad_logic($this->connexion);
		$ciudadLogic->deepLoad($empresa->getciudad(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$empresa->setpais($this->empresaDataAccess->getpais($this->connexion,$empresa));
				$paisLogic= new pais_logic($this->connexion);
				$paisLogic->deepLoad($empresa->getpais(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ciudad::$class.'') {
				$empresa->setciudad($this->empresaDataAccess->getciudad($this->connexion,$empresa));
				$ciudadLogic= new ciudad_logic($this->connexion);
				$ciudadLogic->deepLoad($empresa->getciudad(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$empresa->setpais($this->empresaDataAccess->getpais($this->connexion,$empresa));
			$paisLogic= new pais_logic($this->connexion);
			$paisLogic->deepLoad($empresa->getpais(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ciudad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$empresa->setciudad($this->empresaDataAccess->getciudad($this->connexion,$empresa));
			$ciudadLogic= new ciudad_logic($this->connexion);
			$ciudadLogic->deepLoad($empresa->getciudad(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(empresa $empresa,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//empresa_logic_add::updateempresaToSave($this->empresa);			
			
			if(!$paraDeleteCascade) {				
				empresa_data::save($empresa, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		pais_data::save($empresa->getpais(),$this->connexion);
		ciudad_data::save($empresa->getciudad(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				pais_data::save($empresa->getpais(),$this->connexion);
				continue;
			}

			if($clas->clas==ciudad::$class.'') {
				ciudad_data::save($empresa->getciudad(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			pais_data::save($empresa->getpais(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ciudad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ciudad_data::save($empresa->getciudad(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		pais_data::save($empresa->getpais(),$this->connexion);
		$paisLogic= new pais_logic($this->connexion);
		$paisLogic->deepSave($empresa->getpais(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ciudad_data::save($empresa->getciudad(),$this->connexion);
		$ciudadLogic= new ciudad_logic($this->connexion);
		$ciudadLogic->deepSave($empresa->getciudad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				pais_data::save($empresa->getpais(),$this->connexion);
				$paisLogic= new pais_logic($this->connexion);
				$paisLogic->deepSave($empresa->getpais(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ciudad::$class.'') {
				ciudad_data::save($empresa->getciudad(),$this->connexion);
				$ciudadLogic= new ciudad_logic($this->connexion);
				$ciudadLogic->deepSave($empresa->getciudad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			pais_data::save($empresa->getpais(),$this->connexion);
			$paisLogic= new pais_logic($this->connexion);
			$paisLogic->deepSave($empresa->getpais(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ciudad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ciudad_data::save($empresa->getciudad(),$this->connexion);
			$ciudadLogic= new ciudad_logic($this->connexion);
			$ciudadLogic->deepSave($empresa->getciudad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				empresa_data::save($empresa, $this->connexion);
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
			
			$this->deepLoad($this->empresa,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->empresas as $empresa) {
				$this->deepLoad($empresa,$isDeep,$deepLoadType,$clases);
								
				empresa_util::refrescarFKDescripciones($this->empresas);
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
			
			foreach($this->empresas as $empresa) {
				$this->deepLoad($empresa,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->empresa,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->empresas as $empresa) {
				$this->deepSave($empresa,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->empresas as $empresa) {
				$this->deepSave($empresa,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(pais::$class);
				$classes[]=new Classe(ciudad::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==pais::$class) {
						$classes[]=new Classe(pais::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==ciudad::$class) {
						$classes[]=new Classe(ciudad::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==pais::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(pais::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==ciudad::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(ciudad::$class);
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
	
	
	
	
	
	
	
	public function getempresa() : ?empresa {	
		/*
		empresa_logic_add::checkempresaToGet($this->empresa,$this->datosCliente);
		empresa_logic_add::updateempresaToGet($this->empresa);
		*/
			
		return $this->empresa;
	}
		
	public function setempresa(empresa $newempresa) {
		$this->empresa = $newempresa;
	}
	
	public function getempresas() : array {		
		/*
		empresa_logic_add::checkempresaToGets($this->empresas,$this->datosCliente);
		
		foreach ($this->empresas as $empresaLocal ) {
			empresa_logic_add::updateempresaToGet($empresaLocal);
		}
		*/
		
		return $this->empresas;
	}
	
	public function setempresas(array $newempresas) {
		$this->empresas = $newempresas;
	}
	
	public function getempresaDataAccess() : empresa_data {
		return $this->empresaDataAccess;
	}
	
	public function setempresaDataAccess(empresa_data $newempresaDataAccess) {
		$this->empresaDataAccess = $newempresaDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        empresa_carga::$CONTROLLER;;        
		
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
