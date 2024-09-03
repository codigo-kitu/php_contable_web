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

namespace com\bydan\contabilidad\general\otro_documento\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\general\otro_documento\util\otro_documento_carga;
use com\bydan\contabilidad\general\otro_documento\util\otro_documento_param_return;

use com\bydan\contabilidad\general\otro_documento\presentation\session\otro_documento_session;

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

use com\bydan\contabilidad\general\otro_documento\util\otro_documento_util;
use com\bydan\contabilidad\general\otro_documento\business\entity\otro_documento;
use com\bydan\contabilidad\general\otro_documento\business\data\otro_documento_data;

//FK


use com\bydan\contabilidad\general\archivo\business\entity\archivo;
use com\bydan\contabilidad\general\archivo\business\data\archivo_data;
use com\bydan\contabilidad\general\archivo\business\logic\archivo_logic;
use com\bydan\contabilidad\general\archivo\util\archivo_util;

//REL


//REL DETALLES




class otro_documento_logic  extends GeneralEntityLogic implements otro_documento_logicI {	
	/*GENERAL*/
	public otro_documento_data $otro_documentoDataAccess;
	//public ?otro_documento_logic_add $otro_documentoLogicAdditional=null;
	public ?otro_documento $otro_documento;
	public array $otro_documentos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->otro_documentoDataAccess = new otro_documento_data();			
			$this->otro_documentos = array();
			$this->otro_documento = new otro_documento();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->otro_documentoLogicAdditional = new otro_documento_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->otro_documentoLogicAdditional==null) {
		//	$this->otro_documentoLogicAdditional=new otro_documento_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->otro_documentoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->otro_documentoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->otro_documentoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->otro_documentoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->otro_documentos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_documentos=$this->otro_documentoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_documento_util::refrescarFKDescripciones($this->otro_documentos);
			}
			
			//otro_documento_logic_add::checkotro_documentoToGets($this->otro_documentos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_documentos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->otro_documentos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_documentos=$this->otro_documentoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_documento_util::refrescarFKDescripciones($this->otro_documentos);
			}
			
			//otro_documento_logic_add::checkotro_documentoToGets($this->otro_documentos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_documentos);
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
		$this->otro_documento = new otro_documento();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->otro_documento=$this->otro_documentoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->otro_documento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				otro_documento_util::refrescarFKDescripcion($this->otro_documento);
			}
						
			//otro_documento_logic_add::checkotro_documentoToGet($this->otro_documento,$this->datosCliente);
			//otro_documento_logic_add::updateotro_documentoToGet($this->otro_documento);
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
		$this->otro_documento = new  otro_documento();
		  		  
        try {		
			$this->otro_documento=$this->otro_documentoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->otro_documento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				otro_documento_util::refrescarFKDescripcion($this->otro_documento);
			}
			
			//otro_documento_logic_add::checkotro_documentoToGet($this->otro_documento,$this->datosCliente);
			//otro_documento_logic_add::updateotro_documentoToGet($this->otro_documento);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?otro_documento {
		$otro_documentoLogic = new  otro_documento_logic();
		  		  
        try {		
			$otro_documentoLogic->setConnexion($connexion);			
			$otro_documentoLogic->getEntity($id);			
			return $otro_documentoLogic->getotro_documento();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->otro_documento = new  otro_documento();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->otro_documento=$this->otro_documentoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->otro_documento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				otro_documento_util::refrescarFKDescripcion($this->otro_documento);
			}
			
			//otro_documento_logic_add::checkotro_documentoToGet($this->otro_documento,$this->datosCliente);
			//otro_documento_logic_add::updateotro_documentoToGet($this->otro_documento);
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
		$this->otro_documento = new  otro_documento();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_documento=$this->otro_documentoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->otro_documento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				otro_documento_util::refrescarFKDescripcion($this->otro_documento);
			}
			
			//otro_documento_logic_add::checkotro_documentoToGet($this->otro_documento,$this->datosCliente);
			//otro_documento_logic_add::updateotro_documentoToGet($this->otro_documento);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?otro_documento {
		$otro_documentoLogic = new  otro_documento_logic();
		  		  
        try {		
			$otro_documentoLogic->setConnexion($connexion);			
			$otro_documentoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $otro_documentoLogic->getotro_documento();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->otro_documentos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->otro_documentos=$this->otro_documentoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_documento_util::refrescarFKDescripciones($this->otro_documentos);
			}
			
			//otro_documento_logic_add::checkotro_documentoToGets($this->otro_documentos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_documentos);			
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
		$this->otro_documentos = array();
		  		  
        try {			
			$this->otro_documentos=$this->otro_documentoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_documento_util::refrescarFKDescripciones($this->otro_documentos);
			}
			
			//otro_documento_logic_add::checkotro_documentoToGets($this->otro_documentos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_documentos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->otro_documentos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_documentos=$this->otro_documentoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_documento_util::refrescarFKDescripciones($this->otro_documentos);
			}
			
			//otro_documento_logic_add::checkotro_documentoToGets($this->otro_documentos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_documentos);
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
		$this->otro_documentos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_documentos=$this->otro_documentoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_documento_util::refrescarFKDescripciones($this->otro_documentos);
			}
			
			//otro_documento_logic_add::checkotro_documentoToGets($this->otro_documentos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_documentos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$otro_documentoLogic = new  otro_documento_logic();
		  		  
        try {		
			$otro_documentoLogic->setConnexion($connexion);			
			$otro_documentoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $otro_documentoLogic->getotro_documentos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->otro_documentos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->otro_documentos=$this->otro_documentoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_documento_util::refrescarFKDescripciones($this->otro_documentos);
			}
			
			//otro_documento_logic_add::checkotro_documentoToGets($this->otro_documentos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_documentos);
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
		$this->otro_documentos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_documentos=$this->otro_documentoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_documento_util::refrescarFKDescripciones($this->otro_documentos);
			}
			
			//otro_documento_logic_add::checkotro_documentoToGets($this->otro_documentos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_documentos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->otro_documentos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_documentos=$this->otro_documentoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_documento_util::refrescarFKDescripciones($this->otro_documentos);
			}
			
			//otro_documento_logic_add::checkotro_documentoToGets($this->otro_documentos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_documentos);
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
		$this->otro_documentos = array();
		  		  
        try {			
			$this->otro_documentos=$this->otro_documentoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_documento_util::refrescarFKDescripciones($this->otro_documentos);
			}	
			
			//otro_documento_logic_add::checkotro_documentoToGets($this->otro_documentos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_documentos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->otro_documentos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->otro_documentos=$this->otro_documentoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_documento_util::refrescarFKDescripciones($this->otro_documentos);
			}
			
			//otro_documento_logic_add::checkotro_documentoToGets($this->otro_documentos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_documentos);
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
		$this->otro_documentos = array();
		  		  
        try {		
			$this->otro_documentos=$this->otro_documentoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_documento_util::refrescarFKDescripciones($this->otro_documentos);
			}
			
			//otro_documento_logic_add::checkotro_documentoToGets($this->otro_documentos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_documentos);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdarchivoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_archivo) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_archivo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_archivo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_archivo,otro_documento_util::$ID_ARCHIVO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_archivo);

			$this->otro_documentos=$this->otro_documentoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				otro_documento_util::refrescarFKDescripciones($this->otro_documentos);
			}
			//otro_documento_logic_add::checkotro_documentoToGets($this->otro_documentos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->otro_documentos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idarchivo(string $strFinalQuery,Pagination $pagination,int $id_archivo) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_archivo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_archivo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_archivo,otro_documento_util::$ID_ARCHIVO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_archivo);

			$this->otro_documentos=$this->otro_documentoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				otro_documento_util::refrescarFKDescripciones($this->otro_documentos);
			}
			//otro_documento_logic_add::checkotro_documentoToGets($this->otro_documentos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->otro_documentos);
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
						
			//otro_documento_logic_add::checkotro_documentoToSave($this->otro_documento,$this->datosCliente,$this->connexion);	       
			//otro_documento_logic_add::updateotro_documentoToSave($this->otro_documento);			
			otro_documento_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->otro_documento,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->otro_documentoLogicAdditional->checkGeneralEntityToSave($this,$this->otro_documento,$this->datosCliente,$this->connexion);
			
			
			otro_documento_data::save($this->otro_documento, $this->connexion);	    	       	 				
			//otro_documento_logic_add::checkotro_documentoToSaveAfter($this->otro_documento,$this->datosCliente,$this->connexion);			
			//$this->otro_documentoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->otro_documento,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->otro_documento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->otro_documento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				otro_documento_util::refrescarFKDescripcion($this->otro_documento);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->otro_documento->getIsDeleted()) {
				$this->otro_documento=null;
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
						
			/*otro_documento_logic_add::checkotro_documentoToSave($this->otro_documento,$this->datosCliente,$this->connexion);*/	        
			//otro_documento_logic_add::updateotro_documentoToSave($this->otro_documento);			
			//$this->otro_documentoLogicAdditional->checkGeneralEntityToSave($this,$this->otro_documento,$this->datosCliente,$this->connexion);			
			otro_documento_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->otro_documento,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			otro_documento_data::save($this->otro_documento, $this->connexion);	    	       	 						
			/*otro_documento_logic_add::checkotro_documentoToSaveAfter($this->otro_documento,$this->datosCliente,$this->connexion);*/			
			//$this->otro_documentoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->otro_documento,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->otro_documento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->otro_documento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				otro_documento_util::refrescarFKDescripcion($this->otro_documento);				
			}
			
			if($this->otro_documento->getIsDeleted()) {
				$this->otro_documento=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(otro_documento $otro_documento,Connexion $connexion)  {
		$otro_documentoLogic = new  otro_documento_logic();		  		  
        try {		
			$otro_documentoLogic->setConnexion($connexion);			
			$otro_documentoLogic->setotro_documento($otro_documento);			
			$otro_documentoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*otro_documento_logic_add::checkotro_documentoToSaves($this->otro_documentos,$this->datosCliente,$this->connexion);*/	        	
			//$this->otro_documentoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->otro_documentos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->otro_documentos as $otro_documentoLocal) {				
								
				//otro_documento_logic_add::updateotro_documentoToSave($otro_documentoLocal);	        	
				otro_documento_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$otro_documentoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				otro_documento_data::save($otro_documentoLocal, $this->connexion);				
			}
			
			/*otro_documento_logic_add::checkotro_documentoToSavesAfter($this->otro_documentos,$this->datosCliente,$this->connexion);*/			
			//$this->otro_documentoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->otro_documentos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_documento_util::refrescarFKDescripciones($this->otro_documentos);
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
			/*otro_documento_logic_add::checkotro_documentoToSaves($this->otro_documentos,$this->datosCliente,$this->connexion);*/			
			//$this->otro_documentoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->otro_documentos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->otro_documentos as $otro_documentoLocal) {				
								
				//otro_documento_logic_add::updateotro_documentoToSave($otro_documentoLocal);	        	
				otro_documento_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$otro_documentoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				otro_documento_data::save($otro_documentoLocal, $this->connexion);				
			}			
			
			/*otro_documento_logic_add::checkotro_documentoToSavesAfter($this->otro_documentos,$this->datosCliente,$this->connexion);*/			
			//$this->otro_documentoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->otro_documentos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_documento_util::refrescarFKDescripciones($this->otro_documentos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $otro_documentos,Connexion $connexion)  {
		$otro_documentoLogic = new  otro_documento_logic();
		  		  
        try {		
			$otro_documentoLogic->setConnexion($connexion);			
			$otro_documentoLogic->setotro_documentos($otro_documentos);			
			$otro_documentoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$otro_documentosAux=array();
		
		foreach($this->otro_documentos as $otro_documento) {
			if($otro_documento->getIsDeleted()==false) {
				$otro_documentosAux[]=$otro_documento;
			}
		}
		
		$this->otro_documentos=$otro_documentosAux;
	}
	
	public function updateToGetsAuxiliar(array &$otro_documentos) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->otro_documentos as $otro_documento) {
				
				$otro_documento->setid_archivo_Descripcion(otro_documento_util::getarchivoDescripcion($otro_documento->getarchivo()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$otro_documento_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$otro_documento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$otro_documento_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$otro_documento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$otro_documento_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$otro_documentoForeignKey=new otro_documento_param_return();//otro_documentoForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_archivo',$strRecargarFkTipos,',')) {
				$this->cargarCombosarchivosFK($this->connexion,$strRecargarFkQuery,$otro_documentoForeignKey,$otro_documento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_archivo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosarchivosFK($this->connexion,' where id=-1 ',$otro_documentoForeignKey,$otro_documento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $otro_documentoForeignKey;
			
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
	
	
	public function cargarCombosarchivosFK($connexion=null,$strRecargarFkQuery='',$otro_documentoForeignKey,$otro_documento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$archivoLogic= new archivo_logic();
		$pagination= new Pagination();
		$otro_documentoForeignKey->archivosFK=array();

		$archivoLogic->setConnexion($connexion);
		$archivoLogic->getarchivoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($otro_documento_session==null) {
			$otro_documento_session=new otro_documento_session();
		}
		
		if($otro_documento_session->bitBusquedaDesdeFKSesionarchivo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=archivo_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalarchivo=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalarchivo=Funciones::GetFinalQueryAppend($finalQueryGlobalarchivo, '');
				$finalQueryGlobalarchivo.=archivo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalarchivo.$strRecargarFkQuery;		

				$archivoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($archivoLogic->getarchivos() as $archivoLocal ) {
				if($otro_documentoForeignKey->idarchivoDefaultFK==0) {
					$otro_documentoForeignKey->idarchivoDefaultFK=$archivoLocal->getId();
				}

				$otro_documentoForeignKey->archivosFK[$archivoLocal->getId()]=otro_documento_util::getarchivoDescripcion($archivoLocal);
			}

		} else {

			if($otro_documento_session->bigidarchivoActual!=null && $otro_documento_session->bigidarchivoActual > 0) {
				$archivoLogic->getEntity($otro_documento_session->bigidarchivoActual);//WithConnection

				$otro_documentoForeignKey->archivosFK[$archivoLogic->getarchivo()->getId()]=otro_documento_util::getarchivoDescripcion($archivoLogic->getarchivo());
				$otro_documentoForeignKey->idarchivoDefaultFK=$archivoLogic->getarchivo()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($otro_documento) {
		$this->saveRelacionesBase($otro_documento,true);
	}

	public function saveRelaciones($otro_documento) {
		$this->saveRelacionesBase($otro_documento,false);
	}

	public function saveRelacionesBase($otro_documento,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setotro_documento($otro_documento);

			if(true) {

				//otro_documento_logic_add::updateRelacionesToSave($otro_documento,$this);

				if(($this->otro_documento->getIsNew() || $this->otro_documento->getIsChanged()) && !$this->otro_documento->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->otro_documento->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//otro_documento_logic_add::updateRelacionesToSaveAfter($otro_documento,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $otro_documentos,otro_documento_param_return $otro_documentoParameterGeneral) : otro_documento_param_return {
		$otro_documentoReturnGeneral=new otro_documento_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $otro_documentoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $otro_documentos,otro_documento_param_return $otro_documentoParameterGeneral) : otro_documento_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$otro_documentoReturnGeneral=new otro_documento_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $otro_documentoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $otro_documentos,otro_documento $otro_documento,otro_documento_param_return $otro_documentoParameterGeneral,bool $isEsNuevootro_documento,array $clases) : otro_documento_param_return {
		 try {	
			$otro_documentoReturnGeneral=new otro_documento_param_return();
	
			$otro_documentoReturnGeneral->setotro_documento($otro_documento);
			$otro_documentoReturnGeneral->setotro_documentos($otro_documentos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$otro_documentoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $otro_documentoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $otro_documentos,otro_documento $otro_documento,otro_documento_param_return $otro_documentoParameterGeneral,bool $isEsNuevootro_documento,array $clases) : otro_documento_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$otro_documentoReturnGeneral=new otro_documento_param_return();
	
			$otro_documentoReturnGeneral->setotro_documento($otro_documento);
			$otro_documentoReturnGeneral->setotro_documentos($otro_documentos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$otro_documentoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $otro_documentoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $otro_documentos,otro_documento $otro_documento,otro_documento_param_return $otro_documentoParameterGeneral,bool $isEsNuevootro_documento,array $clases) : otro_documento_param_return {
		 try {	
			$otro_documentoReturnGeneral=new otro_documento_param_return();
	
			$otro_documentoReturnGeneral->setotro_documento($otro_documento);
			$otro_documentoReturnGeneral->setotro_documentos($otro_documentos);
			
			
			
			return $otro_documentoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $otro_documentos,otro_documento $otro_documento,otro_documento_param_return $otro_documentoParameterGeneral,bool $isEsNuevootro_documento,array $clases) : otro_documento_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$otro_documentoReturnGeneral=new otro_documento_param_return();
	
			$otro_documentoReturnGeneral->setotro_documento($otro_documento);
			$otro_documentoReturnGeneral->setotro_documentos($otro_documentos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $otro_documentoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,otro_documento $otro_documento,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,otro_documento $otro_documento,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		otro_documento_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(otro_documento $otro_documento,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//otro_documento_logic_add::updateotro_documentoToGet($this->otro_documento);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$otro_documento->setarchivo($this->otro_documentoDataAccess->getarchivo($this->connexion,$otro_documento));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==archivo::$class.'') {
				$otro_documento->setarchivo($this->otro_documentoDataAccess->getarchivo($this->connexion,$otro_documento));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==archivo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$otro_documento->setarchivo($this->otro_documentoDataAccess->getarchivo($this->connexion,$otro_documento));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$otro_documento->setarchivo($this->otro_documentoDataAccess->getarchivo($this->connexion,$otro_documento));
		$archivoLogic= new archivo_logic($this->connexion);
		$archivoLogic->deepLoad($otro_documento->getarchivo(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==archivo::$class.'') {
				$otro_documento->setarchivo($this->otro_documentoDataAccess->getarchivo($this->connexion,$otro_documento));
				$archivoLogic= new archivo_logic($this->connexion);
				$archivoLogic->deepLoad($otro_documento->getarchivo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==archivo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$otro_documento->setarchivo($this->otro_documentoDataAccess->getarchivo($this->connexion,$otro_documento));
			$archivoLogic= new archivo_logic($this->connexion);
			$archivoLogic->deepLoad($otro_documento->getarchivo(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(otro_documento $otro_documento,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//otro_documento_logic_add::updateotro_documentoToSave($this->otro_documento);			
			
			if(!$paraDeleteCascade) {				
				otro_documento_data::save($otro_documento, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		archivo_data::save($otro_documento->getarchivo(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==archivo::$class.'') {
				archivo_data::save($otro_documento->getarchivo(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==archivo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			archivo_data::save($otro_documento->getarchivo(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		archivo_data::save($otro_documento->getarchivo(),$this->connexion);
		$archivoLogic= new archivo_logic($this->connexion);
		$archivoLogic->deepSave($otro_documento->getarchivo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==archivo::$class.'') {
				archivo_data::save($otro_documento->getarchivo(),$this->connexion);
				$archivoLogic= new archivo_logic($this->connexion);
				$archivoLogic->deepSave($otro_documento->getarchivo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==archivo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			archivo_data::save($otro_documento->getarchivo(),$this->connexion);
			$archivoLogic= new archivo_logic($this->connexion);
			$archivoLogic->deepSave($otro_documento->getarchivo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				otro_documento_data::save($otro_documento, $this->connexion);
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
			
			$this->deepLoad($this->otro_documento,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->otro_documentos as $otro_documento) {
				$this->deepLoad($otro_documento,$isDeep,$deepLoadType,$clases);
								
				otro_documento_util::refrescarFKDescripciones($this->otro_documentos);
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
			
			foreach($this->otro_documentos as $otro_documento) {
				$this->deepLoad($otro_documento,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->otro_documento,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->otro_documentos as $otro_documento) {
				$this->deepSave($otro_documento,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->otro_documentos as $otro_documento) {
				$this->deepSave($otro_documento,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(archivo::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==archivo::$class) {
						$classes[]=new Classe(archivo::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==archivo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(archivo::$class);
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
	
	
	
	
	
	
	
	public function getotro_documento() : ?otro_documento {	
		/*
		otro_documento_logic_add::checkotro_documentoToGet($this->otro_documento,$this->datosCliente);
		otro_documento_logic_add::updateotro_documentoToGet($this->otro_documento);
		*/
			
		return $this->otro_documento;
	}
		
	public function setotro_documento(otro_documento $newotro_documento) {
		$this->otro_documento = $newotro_documento;
	}
	
	public function getotro_documentos() : array {		
		/*
		otro_documento_logic_add::checkotro_documentoToGets($this->otro_documentos,$this->datosCliente);
		
		foreach ($this->otro_documentos as $otro_documentoLocal ) {
			otro_documento_logic_add::updateotro_documentoToGet($otro_documentoLocal);
		}
		*/
		
		return $this->otro_documentos;
	}
	
	public function setotro_documentos(array $newotro_documentos) {
		$this->otro_documentos = $newotro_documentos;
	}
	
	public function getotro_documentoDataAccess() : otro_documento_data {
		return $this->otro_documentoDataAccess;
	}
	
	public function setotro_documentoDataAccess(otro_documento_data $newotro_documentoDataAccess) {
		$this->otro_documentoDataAccess = $newotro_documentoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        otro_documento_carga::$CONTROLLER;;        
		
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
