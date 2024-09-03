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

namespace com\bydan\contabilidad\seguridad\municipio\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\municipio\util\municipio_carga;
use com\bydan\contabilidad\seguridad\municipio\util\municipio_param_return;


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

use com\bydan\contabilidad\seguridad\municipio\util\municipio_util;
use com\bydan\contabilidad\seguridad\municipio\business\entity\municipio;
use com\bydan\contabilidad\seguridad\municipio\business\data\municipio_data;

//FK


//REL


//REL DETALLES




class municipio_logic  extends GeneralEntityLogic implements municipio_logicI {	
	/*GENERAL*/
	public municipio_data $municipioDataAccess;
	//public ?municipio_logic_add $municipioLogicAdditional=null;
	public ?municipio $municipio;
	public array $municipios;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->municipioDataAccess = new municipio_data();			
			$this->municipios = array();
			$this->municipio = new municipio();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->municipioLogicAdditional = new municipio_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->municipioLogicAdditional==null) {
		//	$this->municipioLogicAdditional=new municipio_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->municipioDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->municipioDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->municipioDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->municipioDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->municipios = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->municipios=$this->municipioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				municipio_util::refrescarFKDescripciones($this->municipios);
			}
			
			//municipio_logic_add::checkmunicipioToGets($this->municipios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->municipios);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->municipios = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->municipios=$this->municipioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				municipio_util::refrescarFKDescripciones($this->municipios);
			}
			
			//municipio_logic_add::checkmunicipioToGets($this->municipios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->municipios);
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
		$this->municipio = new municipio();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->municipio=$this->municipioDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->municipio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				municipio_util::refrescarFKDescripcion($this->municipio);
			}
						
			//municipio_logic_add::checkmunicipioToGet($this->municipio,$this->datosCliente);
			//municipio_logic_add::updatemunicipioToGet($this->municipio);
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
		$this->municipio = new  municipio();
		  		  
        try {		
			$this->municipio=$this->municipioDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->municipio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				municipio_util::refrescarFKDescripcion($this->municipio);
			}
			
			//municipio_logic_add::checkmunicipioToGet($this->municipio,$this->datosCliente);
			//municipio_logic_add::updatemunicipioToGet($this->municipio);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?municipio {
		$municipioLogic = new  municipio_logic();
		  		  
        try {		
			$municipioLogic->setConnexion($connexion);			
			$municipioLogic->getEntity($id);			
			return $municipioLogic->getmunicipio();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->municipio = new  municipio();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->municipio=$this->municipioDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->municipio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				municipio_util::refrescarFKDescripcion($this->municipio);
			}
			
			//municipio_logic_add::checkmunicipioToGet($this->municipio,$this->datosCliente);
			//municipio_logic_add::updatemunicipioToGet($this->municipio);
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
		$this->municipio = new  municipio();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->municipio=$this->municipioDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->municipio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				municipio_util::refrescarFKDescripcion($this->municipio);
			}
			
			//municipio_logic_add::checkmunicipioToGet($this->municipio,$this->datosCliente);
			//municipio_logic_add::updatemunicipioToGet($this->municipio);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?municipio {
		$municipioLogic = new  municipio_logic();
		  		  
        try {		
			$municipioLogic->setConnexion($connexion);			
			$municipioLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $municipioLogic->getmunicipio();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->municipios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->municipios=$this->municipioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				municipio_util::refrescarFKDescripciones($this->municipios);
			}
			
			//municipio_logic_add::checkmunicipioToGets($this->municipios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->municipios);			
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
		$this->municipios = array();
		  		  
        try {			
			$this->municipios=$this->municipioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				municipio_util::refrescarFKDescripciones($this->municipios);
			}
			
			//municipio_logic_add::checkmunicipioToGets($this->municipios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->municipios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->municipios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->municipios=$this->municipioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				municipio_util::refrescarFKDescripciones($this->municipios);
			}
			
			//municipio_logic_add::checkmunicipioToGets($this->municipios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->municipios);
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
		$this->municipios = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->municipios=$this->municipioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				municipio_util::refrescarFKDescripciones($this->municipios);
			}
			
			//municipio_logic_add::checkmunicipioToGets($this->municipios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->municipios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$municipioLogic = new  municipio_logic();
		  		  
        try {		
			$municipioLogic->setConnexion($connexion);			
			$municipioLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $municipioLogic->getmunicipios();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->municipios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->municipios=$this->municipioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				municipio_util::refrescarFKDescripciones($this->municipios);
			}
			
			//municipio_logic_add::checkmunicipioToGets($this->municipios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->municipios);
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
		$this->municipios = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->municipios=$this->municipioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				municipio_util::refrescarFKDescripciones($this->municipios);
			}
			
			//municipio_logic_add::checkmunicipioToGets($this->municipios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->municipios);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->municipios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->municipios=$this->municipioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				municipio_util::refrescarFKDescripciones($this->municipios);
			}
			
			//municipio_logic_add::checkmunicipioToGets($this->municipios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->municipios);
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
		$this->municipios = array();
		  		  
        try {			
			$this->municipios=$this->municipioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				municipio_util::refrescarFKDescripciones($this->municipios);
			}	
			
			//municipio_logic_add::checkmunicipioToGets($this->municipios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->municipios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->municipios = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->municipios=$this->municipioDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				municipio_util::refrescarFKDescripciones($this->municipios);
			}
			
			//municipio_logic_add::checkmunicipioToGets($this->municipios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->municipios);
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
		$this->municipios = array();
		  		  
        try {		
			$this->municipios=$this->municipioDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				municipio_util::refrescarFKDescripciones($this->municipios);
			}
			
			//municipio_logic_add::checkmunicipioToGets($this->municipios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->municipios);

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
						
			//municipio_logic_add::checkmunicipioToSave($this->municipio,$this->datosCliente,$this->connexion);	       
			//municipio_logic_add::updatemunicipioToSave($this->municipio);			
			municipio_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->municipio,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->municipioLogicAdditional->checkGeneralEntityToSave($this,$this->municipio,$this->datosCliente,$this->connexion);
			
			
			municipio_data::save($this->municipio, $this->connexion);	    	       	 				
			//municipio_logic_add::checkmunicipioToSaveAfter($this->municipio,$this->datosCliente,$this->connexion);			
			//$this->municipioLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->municipio,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->municipio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->municipio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				municipio_util::refrescarFKDescripcion($this->municipio);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->municipio->getIsDeleted()) {
				$this->municipio=null;
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
						
			/*municipio_logic_add::checkmunicipioToSave($this->municipio,$this->datosCliente,$this->connexion);*/	        
			//municipio_logic_add::updatemunicipioToSave($this->municipio);			
			//$this->municipioLogicAdditional->checkGeneralEntityToSave($this,$this->municipio,$this->datosCliente,$this->connexion);			
			municipio_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->municipio,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			municipio_data::save($this->municipio, $this->connexion);	    	       	 						
			/*municipio_logic_add::checkmunicipioToSaveAfter($this->municipio,$this->datosCliente,$this->connexion);*/			
			//$this->municipioLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->municipio,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->municipio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->municipio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				municipio_util::refrescarFKDescripcion($this->municipio);				
			}
			
			if($this->municipio->getIsDeleted()) {
				$this->municipio=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(municipio $municipio,Connexion $connexion)  {
		$municipioLogic = new  municipio_logic();		  		  
        try {		
			$municipioLogic->setConnexion($connexion);			
			$municipioLogic->setmunicipio($municipio);			
			$municipioLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*municipio_logic_add::checkmunicipioToSaves($this->municipios,$this->datosCliente,$this->connexion);*/	        	
			//$this->municipioLogicAdditional->checkGeneralEntitiesToSaves($this,$this->municipios,$this->datosCliente,$this->connexion);
			
	   		foreach($this->municipios as $municipioLocal) {				
								
				//municipio_logic_add::updatemunicipioToSave($municipioLocal);	        	
				municipio_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$municipioLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				municipio_data::save($municipioLocal, $this->connexion);				
			}
			
			/*municipio_logic_add::checkmunicipioToSavesAfter($this->municipios,$this->datosCliente,$this->connexion);*/			
			//$this->municipioLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->municipios,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				municipio_util::refrescarFKDescripciones($this->municipios);
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
			/*municipio_logic_add::checkmunicipioToSaves($this->municipios,$this->datosCliente,$this->connexion);*/			
			//$this->municipioLogicAdditional->checkGeneralEntitiesToSaves($this,$this->municipios,$this->datosCliente,$this->connexion);
			
	   		foreach($this->municipios as $municipioLocal) {				
								
				//municipio_logic_add::updatemunicipioToSave($municipioLocal);	        	
				municipio_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$municipioLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				municipio_data::save($municipioLocal, $this->connexion);				
			}			
			
			/*municipio_logic_add::checkmunicipioToSavesAfter($this->municipios,$this->datosCliente,$this->connexion);*/			
			//$this->municipioLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->municipios,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				municipio_util::refrescarFKDescripciones($this->municipios);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $municipios,Connexion $connexion)  {
		$municipioLogic = new  municipio_logic();
		  		  
        try {		
			$municipioLogic->setConnexion($connexion);			
			$municipioLogic->setmunicipios($municipios);			
			$municipioLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$municipiosAux=array();
		
		foreach($this->municipios as $municipio) {
			if($municipio->getIsDeleted()==false) {
				$municipiosAux[]=$municipio;
			}
		}
		
		$this->municipios=$municipiosAux;
	}
	
	public function updateToGetsAuxiliar(array &$municipios) {
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
	
	
	
	public function saveRelacionesWithConnection($municipio) {
		$this->saveRelacionesBase($municipio,true);
	}

	public function saveRelaciones($municipio) {
		$this->saveRelacionesBase($municipio,false);
	}

	public function saveRelacionesBase($municipio,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setmunicipio($municipio);

			if(true) {

				//municipio_logic_add::updateRelacionesToSave($municipio,$this);

				if(($this->municipio->getIsNew() || $this->municipio->getIsChanged()) && !$this->municipio->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->municipio->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//municipio_logic_add::updateRelacionesToSaveAfter($municipio,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $municipios,municipio_param_return $municipioParameterGeneral) : municipio_param_return {
		$municipioReturnGeneral=new municipio_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $municipioReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $municipios,municipio_param_return $municipioParameterGeneral) : municipio_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$municipioReturnGeneral=new municipio_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $municipioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $municipios,municipio $municipio,municipio_param_return $municipioParameterGeneral,bool $isEsNuevomunicipio,array $clases) : municipio_param_return {
		 try {	
			$municipioReturnGeneral=new municipio_param_return();
	
			$municipioReturnGeneral->setmunicipio($municipio);
			$municipioReturnGeneral->setmunicipios($municipios);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$municipioReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $municipioReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $municipios,municipio $municipio,municipio_param_return $municipioParameterGeneral,bool $isEsNuevomunicipio,array $clases) : municipio_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$municipioReturnGeneral=new municipio_param_return();
	
			$municipioReturnGeneral->setmunicipio($municipio);
			$municipioReturnGeneral->setmunicipios($municipios);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$municipioReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $municipioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $municipios,municipio $municipio,municipio_param_return $municipioParameterGeneral,bool $isEsNuevomunicipio,array $clases) : municipio_param_return {
		 try {	
			$municipioReturnGeneral=new municipio_param_return();
	
			$municipioReturnGeneral->setmunicipio($municipio);
			$municipioReturnGeneral->setmunicipios($municipios);
			
			
			
			return $municipioReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $municipios,municipio $municipio,municipio_param_return $municipioParameterGeneral,bool $isEsNuevomunicipio,array $clases) : municipio_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$municipioReturnGeneral=new municipio_param_return();
	
			$municipioReturnGeneral->setmunicipio($municipio);
			$municipioReturnGeneral->setmunicipios($municipios);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $municipioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,municipio $municipio,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,municipio $municipio,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	
	
	public function deepLoad(municipio $municipio,bool $isDeep,string $deepLoadType,array $clases) {
		
		
		try {
			
			
			
			//municipio_logic_add::updatemunicipioToGet($this->municipio);
			
			
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		
	}
	
	public function deepSave(municipio $municipio,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		
		
		try {
			
			
			//municipio_logic_add::updatemunicipioToSave($this->municipio);			
			
			if(!$paraDeleteCascade) {				
				municipio_data::save($municipio, $this->connexion);
			}
			
			
			
			if($paraDeleteCascade) {				
				municipio_data::save($municipio, $this->connexion);
			}
			
		}catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}	
		
		
	}
		
	public function deepLoadWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {
			$this->getNewConnexionToDeep();
			
			$this->deepLoad($this->municipio,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->municipios as $municipio) {
				$this->deepLoad($municipio,$isDeep,$deepLoadType,$clases);
								
				municipio_util::refrescarFKDescripciones($this->municipios);
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
			
			foreach($this->municipios as $municipio) {
				$this->deepLoad($municipio,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->municipio,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->municipios as $municipio) {
				$this->deepSave($municipio,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->municipios as $municipio) {
				$this->deepSave($municipio,$isDeep,$deepLoadType,$clases,false);
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
	
	
	
	
	
	
	
	public function getmunicipio() : ?municipio {	
		/*
		municipio_logic_add::checkmunicipioToGet($this->municipio,$this->datosCliente);
		municipio_logic_add::updatemunicipioToGet($this->municipio);
		*/
			
		return $this->municipio;
	}
		
	public function setmunicipio(municipio $newmunicipio) {
		$this->municipio = $newmunicipio;
	}
	
	public function getmunicipios() : array {		
		/*
		municipio_logic_add::checkmunicipioToGets($this->municipios,$this->datosCliente);
		
		foreach ($this->municipios as $municipioLocal ) {
			municipio_logic_add::updatemunicipioToGet($municipioLocal);
		}
		*/
		
		return $this->municipios;
	}
	
	public function setmunicipios(array $newmunicipios) {
		$this->municipios = $newmunicipios;
	}
	
	public function getmunicipioDataAccess() : municipio_data {
		return $this->municipioDataAccess;
	}
	
	public function setmunicipioDataAccess(municipio_data $newmunicipioDataAccess) {
		$this->municipioDataAccess = $newmunicipioDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        municipio_carga::$CONTROLLER;;        
		
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
