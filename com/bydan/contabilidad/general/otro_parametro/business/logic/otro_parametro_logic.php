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

namespace com\bydan\contabilidad\general\otro_parametro\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\general\otro_parametro\util\otro_parametro_carga;
use com\bydan\contabilidad\general\otro_parametro\util\otro_parametro_param_return;


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

use com\bydan\contabilidad\general\otro_parametro\util\otro_parametro_util;
use com\bydan\contabilidad\general\otro_parametro\business\entity\otro_parametro;
use com\bydan\contabilidad\general\otro_parametro\business\data\otro_parametro_data;

//FK


//REL


//REL DETALLES




class otro_parametro_logic  extends GeneralEntityLogic implements otro_parametro_logicI {	
	/*GENERAL*/
	public otro_parametro_data $otro_parametroDataAccess;
	//public ?otro_parametro_logic_add $otro_parametroLogicAdditional=null;
	public ?otro_parametro $otro_parametro;
	public array $otro_parametros;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->otro_parametroDataAccess = new otro_parametro_data();			
			$this->otro_parametros = array();
			$this->otro_parametro = new otro_parametro();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->otro_parametroLogicAdditional = new otro_parametro_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->otro_parametroLogicAdditional==null) {
		//	$this->otro_parametroLogicAdditional=new otro_parametro_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->otro_parametroDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->otro_parametroDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->otro_parametroDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->otro_parametroDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->otro_parametros = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_parametros=$this->otro_parametroDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_parametro_util::refrescarFKDescripciones($this->otro_parametros);
			}
			
			//otro_parametro_logic_add::checkotro_parametroToGets($this->otro_parametros,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_parametros);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->otro_parametros = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_parametros=$this->otro_parametroDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_parametro_util::refrescarFKDescripciones($this->otro_parametros);
			}
			
			//otro_parametro_logic_add::checkotro_parametroToGets($this->otro_parametros,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_parametros);
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
		$this->otro_parametro = new otro_parametro();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->otro_parametro=$this->otro_parametroDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->otro_parametro,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				otro_parametro_util::refrescarFKDescripcion($this->otro_parametro);
			}
						
			//otro_parametro_logic_add::checkotro_parametroToGet($this->otro_parametro,$this->datosCliente);
			//otro_parametro_logic_add::updateotro_parametroToGet($this->otro_parametro);
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
		$this->otro_parametro = new  otro_parametro();
		  		  
        try {		
			$this->otro_parametro=$this->otro_parametroDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->otro_parametro,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				otro_parametro_util::refrescarFKDescripcion($this->otro_parametro);
			}
			
			//otro_parametro_logic_add::checkotro_parametroToGet($this->otro_parametro,$this->datosCliente);
			//otro_parametro_logic_add::updateotro_parametroToGet($this->otro_parametro);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?otro_parametro {
		$otro_parametroLogic = new  otro_parametro_logic();
		  		  
        try {		
			$otro_parametroLogic->setConnexion($connexion);			
			$otro_parametroLogic->getEntity($id);			
			return $otro_parametroLogic->getotro_parametro();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->otro_parametro = new  otro_parametro();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->otro_parametro=$this->otro_parametroDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->otro_parametro,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				otro_parametro_util::refrescarFKDescripcion($this->otro_parametro);
			}
			
			//otro_parametro_logic_add::checkotro_parametroToGet($this->otro_parametro,$this->datosCliente);
			//otro_parametro_logic_add::updateotro_parametroToGet($this->otro_parametro);
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
		$this->otro_parametro = new  otro_parametro();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_parametro=$this->otro_parametroDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->otro_parametro,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				otro_parametro_util::refrescarFKDescripcion($this->otro_parametro);
			}
			
			//otro_parametro_logic_add::checkotro_parametroToGet($this->otro_parametro,$this->datosCliente);
			//otro_parametro_logic_add::updateotro_parametroToGet($this->otro_parametro);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?otro_parametro {
		$otro_parametroLogic = new  otro_parametro_logic();
		  		  
        try {		
			$otro_parametroLogic->setConnexion($connexion);			
			$otro_parametroLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $otro_parametroLogic->getotro_parametro();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->otro_parametros = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->otro_parametros=$this->otro_parametroDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_parametro_util::refrescarFKDescripciones($this->otro_parametros);
			}
			
			//otro_parametro_logic_add::checkotro_parametroToGets($this->otro_parametros,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_parametros);			
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
		$this->otro_parametros = array();
		  		  
        try {			
			$this->otro_parametros=$this->otro_parametroDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_parametro_util::refrescarFKDescripciones($this->otro_parametros);
			}
			
			//otro_parametro_logic_add::checkotro_parametroToGets($this->otro_parametros,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_parametros);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->otro_parametros = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_parametros=$this->otro_parametroDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_parametro_util::refrescarFKDescripciones($this->otro_parametros);
			}
			
			//otro_parametro_logic_add::checkotro_parametroToGets($this->otro_parametros,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_parametros);
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
		$this->otro_parametros = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_parametros=$this->otro_parametroDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_parametro_util::refrescarFKDescripciones($this->otro_parametros);
			}
			
			//otro_parametro_logic_add::checkotro_parametroToGets($this->otro_parametros,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_parametros);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$otro_parametroLogic = new  otro_parametro_logic();
		  		  
        try {		
			$otro_parametroLogic->setConnexion($connexion);			
			$otro_parametroLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $otro_parametroLogic->getotro_parametros();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->otro_parametros = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->otro_parametros=$this->otro_parametroDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_parametro_util::refrescarFKDescripciones($this->otro_parametros);
			}
			
			//otro_parametro_logic_add::checkotro_parametroToGets($this->otro_parametros,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_parametros);
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
		$this->otro_parametros = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_parametros=$this->otro_parametroDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_parametro_util::refrescarFKDescripciones($this->otro_parametros);
			}
			
			//otro_parametro_logic_add::checkotro_parametroToGets($this->otro_parametros,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_parametros);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->otro_parametros = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_parametros=$this->otro_parametroDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_parametro_util::refrescarFKDescripciones($this->otro_parametros);
			}
			
			//otro_parametro_logic_add::checkotro_parametroToGets($this->otro_parametros,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_parametros);
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
		$this->otro_parametros = array();
		  		  
        try {			
			$this->otro_parametros=$this->otro_parametroDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_parametro_util::refrescarFKDescripciones($this->otro_parametros);
			}	
			
			//otro_parametro_logic_add::checkotro_parametroToGets($this->otro_parametros,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_parametros);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->otro_parametros = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->otro_parametros=$this->otro_parametroDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_parametro_util::refrescarFKDescripciones($this->otro_parametros);
			}
			
			//otro_parametro_logic_add::checkotro_parametroToGets($this->otro_parametros,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_parametros);
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
		$this->otro_parametros = array();
		  		  
        try {		
			$this->otro_parametros=$this->otro_parametroDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_parametro_util::refrescarFKDescripciones($this->otro_parametros);
			}
			
			//otro_parametro_logic_add::checkotro_parametroToGets($this->otro_parametros,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_parametros);

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
						
			//otro_parametro_logic_add::checkotro_parametroToSave($this->otro_parametro,$this->datosCliente,$this->connexion);	       
			//otro_parametro_logic_add::updateotro_parametroToSave($this->otro_parametro);			
			otro_parametro_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->otro_parametro,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->otro_parametroLogicAdditional->checkGeneralEntityToSave($this,$this->otro_parametro,$this->datosCliente,$this->connexion);
			
			
			otro_parametro_data::save($this->otro_parametro, $this->connexion);	    	       	 				
			//otro_parametro_logic_add::checkotro_parametroToSaveAfter($this->otro_parametro,$this->datosCliente,$this->connexion);			
			//$this->otro_parametroLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->otro_parametro,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->otro_parametro,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->otro_parametro,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				otro_parametro_util::refrescarFKDescripcion($this->otro_parametro);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->otro_parametro->getIsDeleted()) {
				$this->otro_parametro=null;
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
						
			/*otro_parametro_logic_add::checkotro_parametroToSave($this->otro_parametro,$this->datosCliente,$this->connexion);*/	        
			//otro_parametro_logic_add::updateotro_parametroToSave($this->otro_parametro);			
			//$this->otro_parametroLogicAdditional->checkGeneralEntityToSave($this,$this->otro_parametro,$this->datosCliente,$this->connexion);			
			otro_parametro_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->otro_parametro,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			otro_parametro_data::save($this->otro_parametro, $this->connexion);	    	       	 						
			/*otro_parametro_logic_add::checkotro_parametroToSaveAfter($this->otro_parametro,$this->datosCliente,$this->connexion);*/			
			//$this->otro_parametroLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->otro_parametro,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->otro_parametro,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->otro_parametro,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				otro_parametro_util::refrescarFKDescripcion($this->otro_parametro);				
			}
			
			if($this->otro_parametro->getIsDeleted()) {
				$this->otro_parametro=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(otro_parametro $otro_parametro,Connexion $connexion)  {
		$otro_parametroLogic = new  otro_parametro_logic();		  		  
        try {		
			$otro_parametroLogic->setConnexion($connexion);			
			$otro_parametroLogic->setotro_parametro($otro_parametro);			
			$otro_parametroLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*otro_parametro_logic_add::checkotro_parametroToSaves($this->otro_parametros,$this->datosCliente,$this->connexion);*/	        	
			//$this->otro_parametroLogicAdditional->checkGeneralEntitiesToSaves($this,$this->otro_parametros,$this->datosCliente,$this->connexion);
			
	   		foreach($this->otro_parametros as $otro_parametroLocal) {				
								
				//otro_parametro_logic_add::updateotro_parametroToSave($otro_parametroLocal);	        	
				otro_parametro_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$otro_parametroLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				otro_parametro_data::save($otro_parametroLocal, $this->connexion);				
			}
			
			/*otro_parametro_logic_add::checkotro_parametroToSavesAfter($this->otro_parametros,$this->datosCliente,$this->connexion);*/			
			//$this->otro_parametroLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->otro_parametros,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_parametro_util::refrescarFKDescripciones($this->otro_parametros);
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
			/*otro_parametro_logic_add::checkotro_parametroToSaves($this->otro_parametros,$this->datosCliente,$this->connexion);*/			
			//$this->otro_parametroLogicAdditional->checkGeneralEntitiesToSaves($this,$this->otro_parametros,$this->datosCliente,$this->connexion);
			
	   		foreach($this->otro_parametros as $otro_parametroLocal) {				
								
				//otro_parametro_logic_add::updateotro_parametroToSave($otro_parametroLocal);	        	
				otro_parametro_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$otro_parametroLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				otro_parametro_data::save($otro_parametroLocal, $this->connexion);				
			}			
			
			/*otro_parametro_logic_add::checkotro_parametroToSavesAfter($this->otro_parametros,$this->datosCliente,$this->connexion);*/			
			//$this->otro_parametroLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->otro_parametros,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_parametro_util::refrescarFKDescripciones($this->otro_parametros);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $otro_parametros,Connexion $connexion)  {
		$otro_parametroLogic = new  otro_parametro_logic();
		  		  
        try {		
			$otro_parametroLogic->setConnexion($connexion);			
			$otro_parametroLogic->setotro_parametros($otro_parametros);			
			$otro_parametroLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$otro_parametrosAux=array();
		
		foreach($this->otro_parametros as $otro_parametro) {
			if($otro_parametro->getIsDeleted()==false) {
				$otro_parametrosAux[]=$otro_parametro;
			}
		}
		
		$this->otro_parametros=$otro_parametrosAux;
	}
	
	public function updateToGetsAuxiliar(array &$otro_parametros) {
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
	
	
	
	public function saveRelacionesWithConnection($otro_parametro) {
		$this->saveRelacionesBase($otro_parametro,true);
	}

	public function saveRelaciones($otro_parametro) {
		$this->saveRelacionesBase($otro_parametro,false);
	}

	public function saveRelacionesBase($otro_parametro,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setotro_parametro($otro_parametro);

			if(true) {

				//otro_parametro_logic_add::updateRelacionesToSave($otro_parametro,$this);

				if(($this->otro_parametro->getIsNew() || $this->otro_parametro->getIsChanged()) && !$this->otro_parametro->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->otro_parametro->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//otro_parametro_logic_add::updateRelacionesToSaveAfter($otro_parametro,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $otro_parametros,otro_parametro_param_return $otro_parametroParameterGeneral) : otro_parametro_param_return {
		$otro_parametroReturnGeneral=new otro_parametro_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $otro_parametroReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $otro_parametros,otro_parametro_param_return $otro_parametroParameterGeneral) : otro_parametro_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$otro_parametroReturnGeneral=new otro_parametro_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $otro_parametroReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $otro_parametros,otro_parametro $otro_parametro,otro_parametro_param_return $otro_parametroParameterGeneral,bool $isEsNuevootro_parametro,array $clases) : otro_parametro_param_return {
		 try {	
			$otro_parametroReturnGeneral=new otro_parametro_param_return();
	
			$otro_parametroReturnGeneral->setotro_parametro($otro_parametro);
			$otro_parametroReturnGeneral->setotro_parametros($otro_parametros);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$otro_parametroReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $otro_parametroReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $otro_parametros,otro_parametro $otro_parametro,otro_parametro_param_return $otro_parametroParameterGeneral,bool $isEsNuevootro_parametro,array $clases) : otro_parametro_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$otro_parametroReturnGeneral=new otro_parametro_param_return();
	
			$otro_parametroReturnGeneral->setotro_parametro($otro_parametro);
			$otro_parametroReturnGeneral->setotro_parametros($otro_parametros);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$otro_parametroReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $otro_parametroReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $otro_parametros,otro_parametro $otro_parametro,otro_parametro_param_return $otro_parametroParameterGeneral,bool $isEsNuevootro_parametro,array $clases) : otro_parametro_param_return {
		 try {	
			$otro_parametroReturnGeneral=new otro_parametro_param_return();
	
			$otro_parametroReturnGeneral->setotro_parametro($otro_parametro);
			$otro_parametroReturnGeneral->setotro_parametros($otro_parametros);
			
			
			
			return $otro_parametroReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $otro_parametros,otro_parametro $otro_parametro,otro_parametro_param_return $otro_parametroParameterGeneral,bool $isEsNuevootro_parametro,array $clases) : otro_parametro_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$otro_parametroReturnGeneral=new otro_parametro_param_return();
	
			$otro_parametroReturnGeneral->setotro_parametro($otro_parametro);
			$otro_parametroReturnGeneral->setotro_parametros($otro_parametros);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $otro_parametroReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,otro_parametro $otro_parametro,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,otro_parametro $otro_parametro,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	
	
	public function deepLoad(otro_parametro $otro_parametro,bool $isDeep,string $deepLoadType,array $clases) {
		
		
		try {
			
			
			
			//otro_parametro_logic_add::updateotro_parametroToGet($this->otro_parametro);
			
			
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		
	}
	
	public function deepSave(otro_parametro $otro_parametro,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		
		
		try {
			
			
			//otro_parametro_logic_add::updateotro_parametroToSave($this->otro_parametro);			
			
			if(!$paraDeleteCascade) {				
				otro_parametro_data::save($otro_parametro, $this->connexion);
			}
			
			
			
			if($paraDeleteCascade) {				
				otro_parametro_data::save($otro_parametro, $this->connexion);
			}
			
		}catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}	
		
		
	}
		
	public function deepLoadWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {
			$this->getNewConnexionToDeep();
			
			$this->deepLoad($this->otro_parametro,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->otro_parametros as $otro_parametro) {
				$this->deepLoad($otro_parametro,$isDeep,$deepLoadType,$clases);
								
				otro_parametro_util::refrescarFKDescripciones($this->otro_parametros);
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
			
			foreach($this->otro_parametros as $otro_parametro) {
				$this->deepLoad($otro_parametro,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->otro_parametro,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->otro_parametros as $otro_parametro) {
				$this->deepSave($otro_parametro,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->otro_parametros as $otro_parametro) {
				$this->deepSave($otro_parametro,$isDeep,$deepLoadType,$clases,false);
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
	
	
	
	
	
	
	
	public function getotro_parametro() : ?otro_parametro {	
		/*
		otro_parametro_logic_add::checkotro_parametroToGet($this->otro_parametro,$this->datosCliente);
		otro_parametro_logic_add::updateotro_parametroToGet($this->otro_parametro);
		*/
			
		return $this->otro_parametro;
	}
		
	public function setotro_parametro(otro_parametro $newotro_parametro) {
		$this->otro_parametro = $newotro_parametro;
	}
	
	public function getotro_parametros() : array {		
		/*
		otro_parametro_logic_add::checkotro_parametroToGets($this->otro_parametros,$this->datosCliente);
		
		foreach ($this->otro_parametros as $otro_parametroLocal ) {
			otro_parametro_logic_add::updateotro_parametroToGet($otro_parametroLocal);
		}
		*/
		
		return $this->otro_parametros;
	}
	
	public function setotro_parametros(array $newotro_parametros) {
		$this->otro_parametros = $newotro_parametros;
	}
	
	public function getotro_parametroDataAccess() : otro_parametro_data {
		return $this->otro_parametroDataAccess;
	}
	
	public function setotro_parametroDataAccess(otro_parametro_data $newotro_parametroDataAccess) {
		$this->otro_parametroDataAccess = $newotro_parametroDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        otro_parametro_carga::$CONTROLLER;;        
		
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
