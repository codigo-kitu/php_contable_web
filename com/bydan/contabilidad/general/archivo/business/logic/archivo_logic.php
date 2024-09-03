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

namespace com\bydan\contabilidad\general\archivo\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\general\archivo\util\archivo_carga;
use com\bydan\contabilidad\general\archivo\util\archivo_param_return;


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

use com\bydan\contabilidad\general\archivo\util\archivo_util;
use com\bydan\contabilidad\general\archivo\business\entity\archivo;
use com\bydan\contabilidad\general\archivo\business\data\archivo_data;

//FK


//REL


use com\bydan\contabilidad\general\otro_documento\business\entity\otro_documento;
use com\bydan\contabilidad\general\otro_documento\business\data\otro_documento_data;
use com\bydan\contabilidad\general\otro_documento\business\logic\otro_documento_logic;
use com\bydan\contabilidad\general\otro_documento\util\otro_documento_carga;
use com\bydan\contabilidad\general\otro_documento\util\otro_documento_util;

//REL DETALLES




class archivo_logic  extends GeneralEntityLogic implements archivo_logicI {	
	/*GENERAL*/
	public archivo_data $archivoDataAccess;
	//public ?archivo_logic_add $archivoLogicAdditional=null;
	public ?archivo $archivo;
	public array $archivos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->archivoDataAccess = new archivo_data();			
			$this->archivos = array();
			$this->archivo = new archivo();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->archivoLogicAdditional = new archivo_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->archivoLogicAdditional==null) {
		//	$this->archivoLogicAdditional=new archivo_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->archivoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->archivoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->archivoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->archivoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->archivos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->archivos=$this->archivoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				archivo_util::refrescarFKDescripciones($this->archivos);
			}
			
			//archivo_logic_add::checkarchivoToGets($this->archivos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->archivos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->archivos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->archivos=$this->archivoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				archivo_util::refrescarFKDescripciones($this->archivos);
			}
			
			//archivo_logic_add::checkarchivoToGets($this->archivos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->archivos);
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
		$this->archivo = new archivo();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->archivo=$this->archivoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->archivo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				archivo_util::refrescarFKDescripcion($this->archivo);
			}
						
			//archivo_logic_add::checkarchivoToGet($this->archivo,$this->datosCliente);
			//archivo_logic_add::updatearchivoToGet($this->archivo);
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
		$this->archivo = new  archivo();
		  		  
        try {		
			$this->archivo=$this->archivoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->archivo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				archivo_util::refrescarFKDescripcion($this->archivo);
			}
			
			//archivo_logic_add::checkarchivoToGet($this->archivo,$this->datosCliente);
			//archivo_logic_add::updatearchivoToGet($this->archivo);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?archivo {
		$archivoLogic = new  archivo_logic();
		  		  
        try {		
			$archivoLogic->setConnexion($connexion);			
			$archivoLogic->getEntity($id);			
			return $archivoLogic->getarchivo();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->archivo = new  archivo();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->archivo=$this->archivoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->archivo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				archivo_util::refrescarFKDescripcion($this->archivo);
			}
			
			//archivo_logic_add::checkarchivoToGet($this->archivo,$this->datosCliente);
			//archivo_logic_add::updatearchivoToGet($this->archivo);
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
		$this->archivo = new  archivo();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->archivo=$this->archivoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->archivo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				archivo_util::refrescarFKDescripcion($this->archivo);
			}
			
			//archivo_logic_add::checkarchivoToGet($this->archivo,$this->datosCliente);
			//archivo_logic_add::updatearchivoToGet($this->archivo);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?archivo {
		$archivoLogic = new  archivo_logic();
		  		  
        try {		
			$archivoLogic->setConnexion($connexion);			
			$archivoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $archivoLogic->getarchivo();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->archivos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->archivos=$this->archivoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				archivo_util::refrescarFKDescripciones($this->archivos);
			}
			
			//archivo_logic_add::checkarchivoToGets($this->archivos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->archivos);			
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
		$this->archivos = array();
		  		  
        try {			
			$this->archivos=$this->archivoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				archivo_util::refrescarFKDescripciones($this->archivos);
			}
			
			//archivo_logic_add::checkarchivoToGets($this->archivos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->archivos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->archivos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->archivos=$this->archivoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				archivo_util::refrescarFKDescripciones($this->archivos);
			}
			
			//archivo_logic_add::checkarchivoToGets($this->archivos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->archivos);
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
		$this->archivos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->archivos=$this->archivoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				archivo_util::refrescarFKDescripciones($this->archivos);
			}
			
			//archivo_logic_add::checkarchivoToGets($this->archivos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->archivos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$archivoLogic = new  archivo_logic();
		  		  
        try {		
			$archivoLogic->setConnexion($connexion);			
			$archivoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $archivoLogic->getarchivos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->archivos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->archivos=$this->archivoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				archivo_util::refrescarFKDescripciones($this->archivos);
			}
			
			//archivo_logic_add::checkarchivoToGets($this->archivos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->archivos);
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
		$this->archivos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->archivos=$this->archivoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				archivo_util::refrescarFKDescripciones($this->archivos);
			}
			
			//archivo_logic_add::checkarchivoToGets($this->archivos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->archivos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->archivos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->archivos=$this->archivoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				archivo_util::refrescarFKDescripciones($this->archivos);
			}
			
			//archivo_logic_add::checkarchivoToGets($this->archivos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->archivos);
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
		$this->archivos = array();
		  		  
        try {			
			$this->archivos=$this->archivoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				archivo_util::refrescarFKDescripciones($this->archivos);
			}	
			
			//archivo_logic_add::checkarchivoToGets($this->archivos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->archivos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->archivos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->archivos=$this->archivoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				archivo_util::refrescarFKDescripciones($this->archivos);
			}
			
			//archivo_logic_add::checkarchivoToGets($this->archivos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->archivos);
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
		$this->archivos = array();
		  		  
        try {		
			$this->archivos=$this->archivoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				archivo_util::refrescarFKDescripciones($this->archivos);
			}
			
			//archivo_logic_add::checkarchivoToGets($this->archivos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->archivos);

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
						
			//archivo_logic_add::checkarchivoToSave($this->archivo,$this->datosCliente,$this->connexion);	       
			//archivo_logic_add::updatearchivoToSave($this->archivo);			
			archivo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->archivo,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->archivoLogicAdditional->checkGeneralEntityToSave($this,$this->archivo,$this->datosCliente,$this->connexion);
			
			
			archivo_data::save($this->archivo, $this->connexion);	    	       	 				
			//archivo_logic_add::checkarchivoToSaveAfter($this->archivo,$this->datosCliente,$this->connexion);			
			//$this->archivoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->archivo,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->archivo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->archivo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				archivo_util::refrescarFKDescripcion($this->archivo);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->archivo->getIsDeleted()) {
				$this->archivo=null;
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
						
			/*archivo_logic_add::checkarchivoToSave($this->archivo,$this->datosCliente,$this->connexion);*/	        
			//archivo_logic_add::updatearchivoToSave($this->archivo);			
			//$this->archivoLogicAdditional->checkGeneralEntityToSave($this,$this->archivo,$this->datosCliente,$this->connexion);			
			archivo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->archivo,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			archivo_data::save($this->archivo, $this->connexion);	    	       	 						
			/*archivo_logic_add::checkarchivoToSaveAfter($this->archivo,$this->datosCliente,$this->connexion);*/			
			//$this->archivoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->archivo,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->archivo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->archivo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				archivo_util::refrescarFKDescripcion($this->archivo);				
			}
			
			if($this->archivo->getIsDeleted()) {
				$this->archivo=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(archivo $archivo,Connexion $connexion)  {
		$archivoLogic = new  archivo_logic();		  		  
        try {		
			$archivoLogic->setConnexion($connexion);			
			$archivoLogic->setarchivo($archivo);			
			$archivoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*archivo_logic_add::checkarchivoToSaves($this->archivos,$this->datosCliente,$this->connexion);*/	        	
			//$this->archivoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->archivos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->archivos as $archivoLocal) {				
								
				//archivo_logic_add::updatearchivoToSave($archivoLocal);	        	
				archivo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$archivoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				archivo_data::save($archivoLocal, $this->connexion);				
			}
			
			/*archivo_logic_add::checkarchivoToSavesAfter($this->archivos,$this->datosCliente,$this->connexion);*/			
			//$this->archivoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->archivos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				archivo_util::refrescarFKDescripciones($this->archivos);
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
			/*archivo_logic_add::checkarchivoToSaves($this->archivos,$this->datosCliente,$this->connexion);*/			
			//$this->archivoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->archivos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->archivos as $archivoLocal) {				
								
				//archivo_logic_add::updatearchivoToSave($archivoLocal);	        	
				archivo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$archivoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				archivo_data::save($archivoLocal, $this->connexion);				
			}			
			
			/*archivo_logic_add::checkarchivoToSavesAfter($this->archivos,$this->datosCliente,$this->connexion);*/			
			//$this->archivoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->archivos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				archivo_util::refrescarFKDescripciones($this->archivos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $archivos,Connexion $connexion)  {
		$archivoLogic = new  archivo_logic();
		  		  
        try {		
			$archivoLogic->setConnexion($connexion);			
			$archivoLogic->setarchivos($archivos);			
			$archivoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$archivosAux=array();
		
		foreach($this->archivos as $archivo) {
			if($archivo->getIsDeleted()==false) {
				$archivosAux[]=$archivo;
			}
		}
		
		$this->archivos=$archivosAux;
	}
	
	public function updateToGetsAuxiliar(array &$archivos) {
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
	
	
	
	public function saveRelacionesWithConnection($archivo,$otrodocumentos) {
		$this->saveRelacionesBase($archivo,$otrodocumentos,true);
	}

	public function saveRelaciones($archivo,$otrodocumentos) {
		$this->saveRelacionesBase($archivo,$otrodocumentos,false);
	}

	public function saveRelacionesBase($archivo,$otrodocumentos=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$archivo->setotro_documentos($otrodocumentos);
			$this->setarchivo($archivo);

			if(true) {

				//archivo_logic_add::updateRelacionesToSave($archivo,$this);

				if(($this->archivo->getIsNew() || $this->archivo->getIsChanged()) && !$this->archivo->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($otrodocumentos);

				} else if($this->archivo->getIsDeleted()) {
					$this->saveRelacionesDetalles($otrodocumentos);
					$this->save();
				}

				//archivo_logic_add::updateRelacionesToSaveAfter($archivo,$this);

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
	
	
	public function saveRelacionesDetalles($otrodocumentos=array()) {
		try {
	

			$idarchivoActual=$this->getarchivo()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/util/otro_documento_carga.php');
			otro_documento_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$otrodocumentoLogic_Desde_archivo=new otro_documento_logic();
			$otrodocumentoLogic_Desde_archivo->setotro_documentos($otrodocumentos);

			$otrodocumentoLogic_Desde_archivo->setConnexion($this->getConnexion());
			$otrodocumentoLogic_Desde_archivo->setDatosCliente($this->datosCliente);

			foreach($otrodocumentoLogic_Desde_archivo->getotro_documentos() as $otrodocumento_Desde_archivo) {
				$otrodocumento_Desde_archivo->setid_archivo($idarchivoActual);
			}

			$otrodocumentoLogic_Desde_archivo->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $archivos,archivo_param_return $archivoParameterGeneral) : archivo_param_return {
		$archivoReturnGeneral=new archivo_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $archivoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $archivos,archivo_param_return $archivoParameterGeneral) : archivo_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$archivoReturnGeneral=new archivo_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $archivoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $archivos,archivo $archivo,archivo_param_return $archivoParameterGeneral,bool $isEsNuevoarchivo,array $clases) : archivo_param_return {
		 try {	
			$archivoReturnGeneral=new archivo_param_return();
	
			$archivoReturnGeneral->setarchivo($archivo);
			$archivoReturnGeneral->setarchivos($archivos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$archivoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $archivoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $archivos,archivo $archivo,archivo_param_return $archivoParameterGeneral,bool $isEsNuevoarchivo,array $clases) : archivo_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$archivoReturnGeneral=new archivo_param_return();
	
			$archivoReturnGeneral->setarchivo($archivo);
			$archivoReturnGeneral->setarchivos($archivos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$archivoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $archivoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $archivos,archivo $archivo,archivo_param_return $archivoParameterGeneral,bool $isEsNuevoarchivo,array $clases) : archivo_param_return {
		 try {	
			$archivoReturnGeneral=new archivo_param_return();
	
			$archivoReturnGeneral->setarchivo($archivo);
			$archivoReturnGeneral->setarchivos($archivos);
			
			
			
			return $archivoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $archivos,archivo $archivo,archivo_param_return $archivoParameterGeneral,bool $isEsNuevoarchivo,array $clases) : archivo_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$archivoReturnGeneral=new archivo_param_return();
	
			$archivoReturnGeneral->setarchivo($archivo);
			$archivoReturnGeneral->setarchivos($archivos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $archivoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,archivo $archivo,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,archivo $archivo,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		archivo_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(archivo $archivo,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//archivo_logic_add::updatearchivoToGet($this->archivo);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$archivo->setotro_documentos($this->archivoDataAccess->getotro_documentos($this->connexion,$archivo));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==otro_documento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$archivo->setotro_documentos($this->archivoDataAccess->getotro_documentos($this->connexion,$archivo));

				if($this->isConDeep) {
					$otrodocumentoLogic= new otro_documento_logic($this->connexion);
					$otrodocumentoLogic->setotro_documentos($archivo->getotro_documentos());
					$classesLocal=otro_documento_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$otrodocumentoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					otro_documento_util::refrescarFKDescripciones($otrodocumentoLogic->getotro_documentos());
					$archivo->setotro_documentos($otrodocumentoLogic->getotro_documentos());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==otro_documento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(otro_documento::$class);
			$archivo->setotro_documentos($this->archivoDataAccess->getotro_documentos($this->connexion,$archivo));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {


		$archivo->setotro_documentos($this->archivoDataAccess->getotro_documentos($this->connexion,$archivo));

		foreach($archivo->getotro_documentos() as $otrodocumento) {
			$otrodocumentoLogic= new otro_documento_logic($this->connexion);
			$otrodocumentoLogic->deepLoad($otrodocumento,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==otro_documento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$archivo->setotro_documentos($this->archivoDataAccess->getotro_documentos($this->connexion,$archivo));

				foreach($archivo->getotro_documentos() as $otrodocumento) {
					$otrodocumentoLogic= new otro_documento_logic($this->connexion);
					$otrodocumentoLogic->deepLoad($otrodocumento,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==otro_documento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(otro_documento::$class);
			$archivo->setotro_documentos($this->archivoDataAccess->getotro_documentos($this->connexion,$archivo));

			foreach($archivo->getotro_documentos() as $otrodocumento) {
				$otrodocumentoLogic= new otro_documento_logic($this->connexion);
				$otrodocumentoLogic->deepLoad($otrodocumento,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(archivo $archivo,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//archivo_logic_add::updatearchivoToSave($this->archivo);			
			
			if(!$paraDeleteCascade) {				
				archivo_data::save($archivo, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($archivo->getotro_documentos() as $otrodocumento) {
			$otrodocumento->setid_archivo($archivo->getId());
			otro_documento_data::save($otrodocumento,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==otro_documento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($archivo->getotro_documentos() as $otrodocumento) {
					$otrodocumento->setid_archivo($archivo->getId());
					otro_documento_data::save($otrodocumento,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==otro_documento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(otro_documento::$class);

			foreach($archivo->getotro_documentos() as $otrodocumento) {
				$otrodocumento->setid_archivo($archivo->getId());
				otro_documento_data::save($otrodocumento,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($archivo->getotro_documentos() as $otrodocumento) {
			$otrodocumentoLogic= new otro_documento_logic($this->connexion);
			$otrodocumento->setid_archivo($archivo->getId());
			otro_documento_data::save($otrodocumento,$this->connexion);
			$otrodocumentoLogic->deepSave($otrodocumento,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==otro_documento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($archivo->getotro_documentos() as $otrodocumento) {
					$otrodocumentoLogic= new otro_documento_logic($this->connexion);
					$otrodocumento->setid_archivo($archivo->getId());
					otro_documento_data::save($otrodocumento,$this->connexion);
					$otrodocumentoLogic->deepSave($otrodocumento,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {



		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==otro_documento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(otro_documento::$class);

			foreach($archivo->getotro_documentos() as $otrodocumento) {
				$otrodocumentoLogic= new otro_documento_logic($this->connexion);
				$otrodocumento->setid_archivo($archivo->getId());
				otro_documento_data::save($otrodocumento,$this->connexion);
				$otrodocumentoLogic->deepSave($otrodocumento,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				archivo_data::save($archivo, $this->connexion);
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
			
			$this->deepLoad($this->archivo,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->archivos as $archivo) {
				$this->deepLoad($archivo,$isDeep,$deepLoadType,$clases);
								
				archivo_util::refrescarFKDescripciones($this->archivos);
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
			
			foreach($this->archivos as $archivo) {
				$this->deepLoad($archivo,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->archivo,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->archivos as $archivo) {
				$this->deepSave($archivo,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->archivos as $archivo) {
				$this->deepSave($archivo,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(otro_documento::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==otro_documento::$class) {
						$classes[]=new Classe(otro_documento::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==otro_documento::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(otro_documento::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getarchivo() : ?archivo {	
		/*
		archivo_logic_add::checkarchivoToGet($this->archivo,$this->datosCliente);
		archivo_logic_add::updatearchivoToGet($this->archivo);
		*/
			
		return $this->archivo;
	}
		
	public function setarchivo(archivo $newarchivo) {
		$this->archivo = $newarchivo;
	}
	
	public function getarchivos() : array {		
		/*
		archivo_logic_add::checkarchivoToGets($this->archivos,$this->datosCliente);
		
		foreach ($this->archivos as $archivoLocal ) {
			archivo_logic_add::updatearchivoToGet($archivoLocal);
		}
		*/
		
		return $this->archivos;
	}
	
	public function setarchivos(array $newarchivos) {
		$this->archivos = $newarchivos;
	}
	
	public function getarchivoDataAccess() : archivo_data {
		return $this->archivoDataAccess;
	}
	
	public function setarchivoDataAccess(archivo_data $newarchivoDataAccess) {
		$this->archivoDataAccess = $newarchivoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        archivo_carga::$CONTROLLER;;        
		
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
