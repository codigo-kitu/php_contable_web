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

namespace com\bydan\contabilidad\general\comentario_documento\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\general\comentario_documento\util\comentario_documento_carga;
use com\bydan\contabilidad\general\comentario_documento\util\comentario_documento_param_return;


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

use com\bydan\contabilidad\general\comentario_documento\util\comentario_documento_util;
use com\bydan\contabilidad\general\comentario_documento\business\entity\comentario_documento;
use com\bydan\contabilidad\general\comentario_documento\business\data\comentario_documento_data;

//FK


//REL


//REL DETALLES




class comentario_documento_logic  extends GeneralEntityLogic implements comentario_documento_logicI {	
	/*GENERAL*/
	public comentario_documento_data $comentario_documentoDataAccess;
	//public ?comentario_documento_logic_add $comentario_documentoLogicAdditional=null;
	public ?comentario_documento $comentario_documento;
	public array $comentario_documentos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->comentario_documentoDataAccess = new comentario_documento_data();			
			$this->comentario_documentos = array();
			$this->comentario_documento = new comentario_documento();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->comentario_documentoLogicAdditional = new comentario_documento_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->comentario_documentoLogicAdditional==null) {
		//	$this->comentario_documentoLogicAdditional=new comentario_documento_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->comentario_documentoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->comentario_documentoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->comentario_documentoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->comentario_documentoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->comentario_documentos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->comentario_documentos=$this->comentario_documentoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				comentario_documento_util::refrescarFKDescripciones($this->comentario_documentos);
			}
			
			//comentario_documento_logic_add::checkcomentario_documentoToGets($this->comentario_documentos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->comentario_documentos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->comentario_documentos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->comentario_documentos=$this->comentario_documentoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				comentario_documento_util::refrescarFKDescripciones($this->comentario_documentos);
			}
			
			//comentario_documento_logic_add::checkcomentario_documentoToGets($this->comentario_documentos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->comentario_documentos);
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
		$this->comentario_documento = new comentario_documento();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->comentario_documento=$this->comentario_documentoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->comentario_documento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				comentario_documento_util::refrescarFKDescripcion($this->comentario_documento);
			}
						
			//comentario_documento_logic_add::checkcomentario_documentoToGet($this->comentario_documento,$this->datosCliente);
			//comentario_documento_logic_add::updatecomentario_documentoToGet($this->comentario_documento);
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
		$this->comentario_documento = new  comentario_documento();
		  		  
        try {		
			$this->comentario_documento=$this->comentario_documentoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->comentario_documento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				comentario_documento_util::refrescarFKDescripcion($this->comentario_documento);
			}
			
			//comentario_documento_logic_add::checkcomentario_documentoToGet($this->comentario_documento,$this->datosCliente);
			//comentario_documento_logic_add::updatecomentario_documentoToGet($this->comentario_documento);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?comentario_documento {
		$comentario_documentoLogic = new  comentario_documento_logic();
		  		  
        try {		
			$comentario_documentoLogic->setConnexion($connexion);			
			$comentario_documentoLogic->getEntity($id);			
			return $comentario_documentoLogic->getcomentario_documento();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->comentario_documento = new  comentario_documento();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->comentario_documento=$this->comentario_documentoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->comentario_documento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				comentario_documento_util::refrescarFKDescripcion($this->comentario_documento);
			}
			
			//comentario_documento_logic_add::checkcomentario_documentoToGet($this->comentario_documento,$this->datosCliente);
			//comentario_documento_logic_add::updatecomentario_documentoToGet($this->comentario_documento);
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
		$this->comentario_documento = new  comentario_documento();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->comentario_documento=$this->comentario_documentoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->comentario_documento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				comentario_documento_util::refrescarFKDescripcion($this->comentario_documento);
			}
			
			//comentario_documento_logic_add::checkcomentario_documentoToGet($this->comentario_documento,$this->datosCliente);
			//comentario_documento_logic_add::updatecomentario_documentoToGet($this->comentario_documento);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?comentario_documento {
		$comentario_documentoLogic = new  comentario_documento_logic();
		  		  
        try {		
			$comentario_documentoLogic->setConnexion($connexion);			
			$comentario_documentoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $comentario_documentoLogic->getcomentario_documento();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->comentario_documentos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->comentario_documentos=$this->comentario_documentoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				comentario_documento_util::refrescarFKDescripciones($this->comentario_documentos);
			}
			
			//comentario_documento_logic_add::checkcomentario_documentoToGets($this->comentario_documentos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->comentario_documentos);			
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
		$this->comentario_documentos = array();
		  		  
        try {			
			$this->comentario_documentos=$this->comentario_documentoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				comentario_documento_util::refrescarFKDescripciones($this->comentario_documentos);
			}
			
			//comentario_documento_logic_add::checkcomentario_documentoToGets($this->comentario_documentos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->comentario_documentos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->comentario_documentos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->comentario_documentos=$this->comentario_documentoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				comentario_documento_util::refrescarFKDescripciones($this->comentario_documentos);
			}
			
			//comentario_documento_logic_add::checkcomentario_documentoToGets($this->comentario_documentos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->comentario_documentos);
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
		$this->comentario_documentos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->comentario_documentos=$this->comentario_documentoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				comentario_documento_util::refrescarFKDescripciones($this->comentario_documentos);
			}
			
			//comentario_documento_logic_add::checkcomentario_documentoToGets($this->comentario_documentos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->comentario_documentos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$comentario_documentoLogic = new  comentario_documento_logic();
		  		  
        try {		
			$comentario_documentoLogic->setConnexion($connexion);			
			$comentario_documentoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $comentario_documentoLogic->getcomentario_documentos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->comentario_documentos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->comentario_documentos=$this->comentario_documentoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				comentario_documento_util::refrescarFKDescripciones($this->comentario_documentos);
			}
			
			//comentario_documento_logic_add::checkcomentario_documentoToGets($this->comentario_documentos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->comentario_documentos);
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
		$this->comentario_documentos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->comentario_documentos=$this->comentario_documentoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				comentario_documento_util::refrescarFKDescripciones($this->comentario_documentos);
			}
			
			//comentario_documento_logic_add::checkcomentario_documentoToGets($this->comentario_documentos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->comentario_documentos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->comentario_documentos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->comentario_documentos=$this->comentario_documentoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				comentario_documento_util::refrescarFKDescripciones($this->comentario_documentos);
			}
			
			//comentario_documento_logic_add::checkcomentario_documentoToGets($this->comentario_documentos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->comentario_documentos);
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
		$this->comentario_documentos = array();
		  		  
        try {			
			$this->comentario_documentos=$this->comentario_documentoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				comentario_documento_util::refrescarFKDescripciones($this->comentario_documentos);
			}	
			
			//comentario_documento_logic_add::checkcomentario_documentoToGets($this->comentario_documentos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->comentario_documentos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->comentario_documentos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->comentario_documentos=$this->comentario_documentoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				comentario_documento_util::refrescarFKDescripciones($this->comentario_documentos);
			}
			
			//comentario_documento_logic_add::checkcomentario_documentoToGets($this->comentario_documentos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->comentario_documentos);
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
		$this->comentario_documentos = array();
		  		  
        try {		
			$this->comentario_documentos=$this->comentario_documentoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				comentario_documento_util::refrescarFKDescripciones($this->comentario_documentos);
			}
			
			//comentario_documento_logic_add::checkcomentario_documentoToGets($this->comentario_documentos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->comentario_documentos);

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
						
			//comentario_documento_logic_add::checkcomentario_documentoToSave($this->comentario_documento,$this->datosCliente,$this->connexion);	       
			//comentario_documento_logic_add::updatecomentario_documentoToSave($this->comentario_documento);			
			comentario_documento_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->comentario_documento,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->comentario_documentoLogicAdditional->checkGeneralEntityToSave($this,$this->comentario_documento,$this->datosCliente,$this->connexion);
			
			
			comentario_documento_data::save($this->comentario_documento, $this->connexion);	    	       	 				
			//comentario_documento_logic_add::checkcomentario_documentoToSaveAfter($this->comentario_documento,$this->datosCliente,$this->connexion);			
			//$this->comentario_documentoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->comentario_documento,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->comentario_documento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->comentario_documento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				comentario_documento_util::refrescarFKDescripcion($this->comentario_documento);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->comentario_documento->getIsDeleted()) {
				$this->comentario_documento=null;
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
						
			/*comentario_documento_logic_add::checkcomentario_documentoToSave($this->comentario_documento,$this->datosCliente,$this->connexion);*/	        
			//comentario_documento_logic_add::updatecomentario_documentoToSave($this->comentario_documento);			
			//$this->comentario_documentoLogicAdditional->checkGeneralEntityToSave($this,$this->comentario_documento,$this->datosCliente,$this->connexion);			
			comentario_documento_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->comentario_documento,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			comentario_documento_data::save($this->comentario_documento, $this->connexion);	    	       	 						
			/*comentario_documento_logic_add::checkcomentario_documentoToSaveAfter($this->comentario_documento,$this->datosCliente,$this->connexion);*/			
			//$this->comentario_documentoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->comentario_documento,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->comentario_documento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->comentario_documento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				comentario_documento_util::refrescarFKDescripcion($this->comentario_documento);				
			}
			
			if($this->comentario_documento->getIsDeleted()) {
				$this->comentario_documento=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(comentario_documento $comentario_documento,Connexion $connexion)  {
		$comentario_documentoLogic = new  comentario_documento_logic();		  		  
        try {		
			$comentario_documentoLogic->setConnexion($connexion);			
			$comentario_documentoLogic->setcomentario_documento($comentario_documento);			
			$comentario_documentoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*comentario_documento_logic_add::checkcomentario_documentoToSaves($this->comentario_documentos,$this->datosCliente,$this->connexion);*/	        	
			//$this->comentario_documentoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->comentario_documentos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->comentario_documentos as $comentario_documentoLocal) {				
								
				//comentario_documento_logic_add::updatecomentario_documentoToSave($comentario_documentoLocal);	        	
				comentario_documento_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$comentario_documentoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				comentario_documento_data::save($comentario_documentoLocal, $this->connexion);				
			}
			
			/*comentario_documento_logic_add::checkcomentario_documentoToSavesAfter($this->comentario_documentos,$this->datosCliente,$this->connexion);*/			
			//$this->comentario_documentoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->comentario_documentos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				comentario_documento_util::refrescarFKDescripciones($this->comentario_documentos);
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
			/*comentario_documento_logic_add::checkcomentario_documentoToSaves($this->comentario_documentos,$this->datosCliente,$this->connexion);*/			
			//$this->comentario_documentoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->comentario_documentos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->comentario_documentos as $comentario_documentoLocal) {				
								
				//comentario_documento_logic_add::updatecomentario_documentoToSave($comentario_documentoLocal);	        	
				comentario_documento_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$comentario_documentoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				comentario_documento_data::save($comentario_documentoLocal, $this->connexion);				
			}			
			
			/*comentario_documento_logic_add::checkcomentario_documentoToSavesAfter($this->comentario_documentos,$this->datosCliente,$this->connexion);*/			
			//$this->comentario_documentoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->comentario_documentos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				comentario_documento_util::refrescarFKDescripciones($this->comentario_documentos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $comentario_documentos,Connexion $connexion)  {
		$comentario_documentoLogic = new  comentario_documento_logic();
		  		  
        try {		
			$comentario_documentoLogic->setConnexion($connexion);			
			$comentario_documentoLogic->setcomentario_documentos($comentario_documentos);			
			$comentario_documentoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$comentario_documentosAux=array();
		
		foreach($this->comentario_documentos as $comentario_documento) {
			if($comentario_documento->getIsDeleted()==false) {
				$comentario_documentosAux[]=$comentario_documento;
			}
		}
		
		$this->comentario_documentos=$comentario_documentosAux;
	}
	
	public function updateToGetsAuxiliar(array &$comentario_documentos) {
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
	
	
	
	public function saveRelacionesWithConnection($comentario_documento) {
		$this->saveRelacionesBase($comentario_documento,true);
	}

	public function saveRelaciones($comentario_documento) {
		$this->saveRelacionesBase($comentario_documento,false);
	}

	public function saveRelacionesBase($comentario_documento,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setcomentario_documento($comentario_documento);

			if(true) {

				//comentario_documento_logic_add::updateRelacionesToSave($comentario_documento,$this);

				if(($this->comentario_documento->getIsNew() || $this->comentario_documento->getIsChanged()) && !$this->comentario_documento->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->comentario_documento->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//comentario_documento_logic_add::updateRelacionesToSaveAfter($comentario_documento,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $comentario_documentos,comentario_documento_param_return $comentario_documentoParameterGeneral) : comentario_documento_param_return {
		$comentario_documentoReturnGeneral=new comentario_documento_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $comentario_documentoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $comentario_documentos,comentario_documento_param_return $comentario_documentoParameterGeneral) : comentario_documento_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$comentario_documentoReturnGeneral=new comentario_documento_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $comentario_documentoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $comentario_documentos,comentario_documento $comentario_documento,comentario_documento_param_return $comentario_documentoParameterGeneral,bool $isEsNuevocomentario_documento,array $clases) : comentario_documento_param_return {
		 try {	
			$comentario_documentoReturnGeneral=new comentario_documento_param_return();
	
			$comentario_documentoReturnGeneral->setcomentario_documento($comentario_documento);
			$comentario_documentoReturnGeneral->setcomentario_documentos($comentario_documentos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$comentario_documentoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $comentario_documentoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $comentario_documentos,comentario_documento $comentario_documento,comentario_documento_param_return $comentario_documentoParameterGeneral,bool $isEsNuevocomentario_documento,array $clases) : comentario_documento_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$comentario_documentoReturnGeneral=new comentario_documento_param_return();
	
			$comentario_documentoReturnGeneral->setcomentario_documento($comentario_documento);
			$comentario_documentoReturnGeneral->setcomentario_documentos($comentario_documentos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$comentario_documentoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $comentario_documentoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $comentario_documentos,comentario_documento $comentario_documento,comentario_documento_param_return $comentario_documentoParameterGeneral,bool $isEsNuevocomentario_documento,array $clases) : comentario_documento_param_return {
		 try {	
			$comentario_documentoReturnGeneral=new comentario_documento_param_return();
	
			$comentario_documentoReturnGeneral->setcomentario_documento($comentario_documento);
			$comentario_documentoReturnGeneral->setcomentario_documentos($comentario_documentos);
			
			
			
			return $comentario_documentoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $comentario_documentos,comentario_documento $comentario_documento,comentario_documento_param_return $comentario_documentoParameterGeneral,bool $isEsNuevocomentario_documento,array $clases) : comentario_documento_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$comentario_documentoReturnGeneral=new comentario_documento_param_return();
	
			$comentario_documentoReturnGeneral->setcomentario_documento($comentario_documento);
			$comentario_documentoReturnGeneral->setcomentario_documentos($comentario_documentos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $comentario_documentoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,comentario_documento $comentario_documento,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,comentario_documento $comentario_documento,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	
	
	public function deepLoad(comentario_documento $comentario_documento,bool $isDeep,string $deepLoadType,array $clases) {
		
		
		try {
			
			
			
			//comentario_documento_logic_add::updatecomentario_documentoToGet($this->comentario_documento);
			
			
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		
	}
	
	public function deepSave(comentario_documento $comentario_documento,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		
		
		try {
			
			
			//comentario_documento_logic_add::updatecomentario_documentoToSave($this->comentario_documento);			
			
			if(!$paraDeleteCascade) {				
				comentario_documento_data::save($comentario_documento, $this->connexion);
			}
			
			
			
			if($paraDeleteCascade) {				
				comentario_documento_data::save($comentario_documento, $this->connexion);
			}
			
		}catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}	
		
		
	}
		
	public function deepLoadWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {
			$this->getNewConnexionToDeep();
			
			$this->deepLoad($this->comentario_documento,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->comentario_documentos as $comentario_documento) {
				$this->deepLoad($comentario_documento,$isDeep,$deepLoadType,$clases);
								
				comentario_documento_util::refrescarFKDescripciones($this->comentario_documentos);
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
			
			foreach($this->comentario_documentos as $comentario_documento) {
				$this->deepLoad($comentario_documento,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->comentario_documento,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->comentario_documentos as $comentario_documento) {
				$this->deepSave($comentario_documento,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->comentario_documentos as $comentario_documento) {
				$this->deepSave($comentario_documento,$isDeep,$deepLoadType,$clases,false);
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
	
	
	
	
	
	
	
	public function getcomentario_documento() : ?comentario_documento {	
		/*
		comentario_documento_logic_add::checkcomentario_documentoToGet($this->comentario_documento,$this->datosCliente);
		comentario_documento_logic_add::updatecomentario_documentoToGet($this->comentario_documento);
		*/
			
		return $this->comentario_documento;
	}
		
	public function setcomentario_documento(comentario_documento $newcomentario_documento) {
		$this->comentario_documento = $newcomentario_documento;
	}
	
	public function getcomentario_documentos() : array {		
		/*
		comentario_documento_logic_add::checkcomentario_documentoToGets($this->comentario_documentos,$this->datosCliente);
		
		foreach ($this->comentario_documentos as $comentario_documentoLocal ) {
			comentario_documento_logic_add::updatecomentario_documentoToGet($comentario_documentoLocal);
		}
		*/
		
		return $this->comentario_documentos;
	}
	
	public function setcomentario_documentos(array $newcomentario_documentos) {
		$this->comentario_documentos = $newcomentario_documentos;
	}
	
	public function getcomentario_documentoDataAccess() : comentario_documento_data {
		return $this->comentario_documentoDataAccess;
	}
	
	public function setcomentario_documentoDataAccess(comentario_documento_data $newcomentario_documentoDataAccess) {
		$this->comentario_documentoDataAccess = $newcomentario_documentoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        comentario_documento_carga::$CONTROLLER;;        
		
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
