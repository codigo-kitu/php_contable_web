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

namespace com\bydan\contabilidad\seguridad\campo\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\campo\util\campo_carga;
use com\bydan\contabilidad\seguridad\campo\util\campo_param_return;

use com\bydan\contabilidad\seguridad\campo\presentation\session\campo_session;

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

use com\bydan\contabilidad\seguridad\campo\util\campo_util;
use com\bydan\contabilidad\seguridad\campo\business\entity\campo;
use com\bydan\contabilidad\seguridad\campo\business\data\campo_data;

//FK


use com\bydan\contabilidad\seguridad\opcion\business\data\opcion_data;
use com\bydan\contabilidad\seguridad\opcion\business\logic\opcion_logic;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_util;

//REL


use com\bydan\contabilidad\seguridad\perfil_campo\business\entity\perfil_campo;
use com\bydan\contabilidad\seguridad\perfil_campo\business\data\perfil_campo_data;
use com\bydan\contabilidad\seguridad\perfil_campo\business\logic\perfil_campo_logic;
use com\bydan\contabilidad\seguridad\perfil_campo\util\perfil_campo_carga;
use com\bydan\contabilidad\seguridad\perfil_campo\util\perfil_campo_util;

use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;
use com\bydan\contabilidad\seguridad\perfil\business\data\perfil_data;
use com\bydan\contabilidad\seguridad\perfil\business\logic\perfil_logic;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;

//REL DETALLES




class campo_logic  extends GeneralEntityLogic implements campo_logicI {	
	/*GENERAL*/
	public campo_data $campoDataAccess;
	//public ?campo_logic_add $campoLogicAdditional=null;
	public ?campo $campo;
	public array $campos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->campoDataAccess = new campo_data();			
			$this->campos = array();
			$this->campo = new campo();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->campoLogicAdditional = new campo_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->campoLogicAdditional==null) {
		//	$this->campoLogicAdditional=new campo_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->campoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->campoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->campoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->campoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->campos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->campos=$this->campoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				campo_util::refrescarFKDescripciones($this->campos);
			}
			
			//campo_logic_add::checkcampoToGets($this->campos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->campos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->campos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->campos=$this->campoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				campo_util::refrescarFKDescripciones($this->campos);
			}
			
			//campo_logic_add::checkcampoToGets($this->campos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->campos);
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
		$this->campo = new campo();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->campo=$this->campoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->campo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				campo_util::refrescarFKDescripcion($this->campo);
			}
						
			//campo_logic_add::checkcampoToGet($this->campo,$this->datosCliente);
			//campo_logic_add::updatecampoToGet($this->campo);
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
		$this->campo = new  campo();
		  		  
        try {		
			$this->campo=$this->campoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->campo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				campo_util::refrescarFKDescripcion($this->campo);
			}
			
			//campo_logic_add::checkcampoToGet($this->campo,$this->datosCliente);
			//campo_logic_add::updatecampoToGet($this->campo);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?campo {
		$campoLogic = new  campo_logic();
		  		  
        try {		
			$campoLogic->setConnexion($connexion);			
			$campoLogic->getEntity($id);			
			return $campoLogic->getcampo();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->campo = new  campo();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->campo=$this->campoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->campo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				campo_util::refrescarFKDescripcion($this->campo);
			}
			
			//campo_logic_add::checkcampoToGet($this->campo,$this->datosCliente);
			//campo_logic_add::updatecampoToGet($this->campo);
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
		$this->campo = new  campo();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->campo=$this->campoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->campo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				campo_util::refrescarFKDescripcion($this->campo);
			}
			
			//campo_logic_add::checkcampoToGet($this->campo,$this->datosCliente);
			//campo_logic_add::updatecampoToGet($this->campo);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?campo {
		$campoLogic = new  campo_logic();
		  		  
        try {		
			$campoLogic->setConnexion($connexion);			
			$campoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $campoLogic->getcampo();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->campos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->campos=$this->campoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				campo_util::refrescarFKDescripciones($this->campos);
			}
			
			//campo_logic_add::checkcampoToGets($this->campos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->campos);			
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
		$this->campos = array();
		  		  
        try {			
			$this->campos=$this->campoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				campo_util::refrescarFKDescripciones($this->campos);
			}
			
			//campo_logic_add::checkcampoToGets($this->campos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->campos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->campos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->campos=$this->campoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				campo_util::refrescarFKDescripciones($this->campos);
			}
			
			//campo_logic_add::checkcampoToGets($this->campos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->campos);
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
		$this->campos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->campos=$this->campoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				campo_util::refrescarFKDescripciones($this->campos);
			}
			
			//campo_logic_add::checkcampoToGets($this->campos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->campos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$campoLogic = new  campo_logic();
		  		  
        try {		
			$campoLogic->setConnexion($connexion);			
			$campoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $campoLogic->getcampos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->campos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->campos=$this->campoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				campo_util::refrescarFKDescripciones($this->campos);
			}
			
			//campo_logic_add::checkcampoToGets($this->campos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->campos);
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
		$this->campos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->campos=$this->campoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				campo_util::refrescarFKDescripciones($this->campos);
			}
			
			//campo_logic_add::checkcampoToGets($this->campos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->campos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->campos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->campos=$this->campoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				campo_util::refrescarFKDescripciones($this->campos);
			}
			
			//campo_logic_add::checkcampoToGets($this->campos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->campos);
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
		$this->campos = array();
		  		  
        try {			
			$this->campos=$this->campoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				campo_util::refrescarFKDescripciones($this->campos);
			}	
			
			//campo_logic_add::checkcampoToGets($this->campos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->campos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->campos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->campos=$this->campoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				campo_util::refrescarFKDescripciones($this->campos);
			}
			
			//campo_logic_add::checkcampoToGets($this->campos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->campos);
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
		$this->campos = array();
		  		  
        try {		
			$this->campos=$this->campoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				campo_util::refrescarFKDescripciones($this->campos);
			}
			
			//campo_logic_add::checkcampoToGets($this->campos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->campos);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdopcionWithConnection(string $strFinalQuery,Pagination $pagination,int $id_opcion) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_opcion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_opcion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_opcion,campo_util::$ID_OPCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_opcion);

			$this->campos=$this->campoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				campo_util::refrescarFKDescripciones($this->campos);
			}
			//campo_logic_add::checkcampoToGets($this->campos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->campos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idopcion(string $strFinalQuery,Pagination $pagination,int $id_opcion) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_opcion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_opcion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_opcion,campo_util::$ID_OPCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_opcion);

			$this->campos=$this->campoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				campo_util::refrescarFKDescripciones($this->campos);
			}
			//campo_logic_add::checkcampoToGets($this->campos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->campos);
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
						
			//campo_logic_add::checkcampoToSave($this->campo,$this->datosCliente,$this->connexion);	       
			//campo_logic_add::updatecampoToSave($this->campo);			
			campo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->campo,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->campoLogicAdditional->checkGeneralEntityToSave($this,$this->campo,$this->datosCliente,$this->connexion);
			
			
			campo_data::save($this->campo, $this->connexion);	    	       	 				
			//campo_logic_add::checkcampoToSaveAfter($this->campo,$this->datosCliente,$this->connexion);			
			//$this->campoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->campo,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->campo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->campo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				campo_util::refrescarFKDescripcion($this->campo);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->campo->getIsDeleted()) {
				$this->campo=null;
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
						
			/*campo_logic_add::checkcampoToSave($this->campo,$this->datosCliente,$this->connexion);*/	        
			//campo_logic_add::updatecampoToSave($this->campo);			
			//$this->campoLogicAdditional->checkGeneralEntityToSave($this,$this->campo,$this->datosCliente,$this->connexion);			
			campo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->campo,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			campo_data::save($this->campo, $this->connexion);	    	       	 						
			/*campo_logic_add::checkcampoToSaveAfter($this->campo,$this->datosCliente,$this->connexion);*/			
			//$this->campoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->campo,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->campo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->campo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				campo_util::refrescarFKDescripcion($this->campo);				
			}
			
			if($this->campo->getIsDeleted()) {
				$this->campo=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(campo $campo,Connexion $connexion)  {
		$campoLogic = new  campo_logic();		  		  
        try {		
			$campoLogic->setConnexion($connexion);			
			$campoLogic->setcampo($campo);			
			$campoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*campo_logic_add::checkcampoToSaves($this->campos,$this->datosCliente,$this->connexion);*/	        	
			//$this->campoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->campos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->campos as $campoLocal) {				
								
				//campo_logic_add::updatecampoToSave($campoLocal);	        	
				campo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$campoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				campo_data::save($campoLocal, $this->connexion);				
			}
			
			/*campo_logic_add::checkcampoToSavesAfter($this->campos,$this->datosCliente,$this->connexion);*/			
			//$this->campoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->campos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				campo_util::refrescarFKDescripciones($this->campos);
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
			/*campo_logic_add::checkcampoToSaves($this->campos,$this->datosCliente,$this->connexion);*/			
			//$this->campoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->campos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->campos as $campoLocal) {				
								
				//campo_logic_add::updatecampoToSave($campoLocal);	        	
				campo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$campoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				campo_data::save($campoLocal, $this->connexion);				
			}			
			
			/*campo_logic_add::checkcampoToSavesAfter($this->campos,$this->datosCliente,$this->connexion);*/			
			//$this->campoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->campos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				campo_util::refrescarFKDescripciones($this->campos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $campos,Connexion $connexion)  {
		$campoLogic = new  campo_logic();
		  		  
        try {		
			$campoLogic->setConnexion($connexion);			
			$campoLogic->setcampos($campos);			
			$campoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$camposAux=array();
		
		foreach($this->campos as $campo) {
			if($campo->getIsDeleted()==false) {
				$camposAux[]=$campo;
			}
		}
		
		$this->campos=$camposAux;
	}
	
	public function updateToGetsAuxiliar(array &$campos) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->campos as $campo) {
				
				$campo->setid_opcion_Descripcion(campo_util::getopcionDescripcion($campo->getopcion()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$campo_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$campo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$campo_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$campo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$campo_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$campoForeignKey=new campo_param_return();//campoForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_opcion',$strRecargarFkTipos,',')) {
				$this->cargarCombosopcionsFK($this->connexion,$strRecargarFkQuery,$campoForeignKey,$campo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_opcion',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosopcionsFK($this->connexion,' where id=-1 ',$campoForeignKey,$campo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $campoForeignKey;
			
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
	
	
	public function cargarCombosopcionsFK($connexion=null,$strRecargarFkQuery='',$campoForeignKey,$campo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$opcionLogic= new opcion_logic();
		$pagination= new Pagination();
		$campoForeignKey->opcionsFK=array();

		$opcionLogic->setConnexion($connexion);
		$opcionLogic->getopcionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($campo_session==null) {
			$campo_session=new campo_session();
		}
		
		if($campo_session->bitBusquedaDesdeFKSesionopcion!=true) {
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
				if($campoForeignKey->idopcionDefaultFK==0) {
					$campoForeignKey->idopcionDefaultFK=$opcionLocal->getId();
				}

				$campoForeignKey->opcionsFK[$opcionLocal->getId()]=campo_util::getopcionDescripcion($opcionLocal);
			}

		} else {

			if($campo_session->bigidopcionActual!=null && $campo_session->bigidopcionActual > 0) {
				$opcionLogic->getEntity($campo_session->bigidopcionActual);//WithConnection

				$campoForeignKey->opcionsFK[$opcionLogic->getopcion()->getId()]=campo_util::getopcionDescripcion($opcionLogic->getopcion());
				$campoForeignKey->idopcionDefaultFK=$opcionLogic->getopcion()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($campo,$perfilcampos) {
		$this->saveRelacionesBase($campo,$perfilcampos,true);
	}

	public function saveRelaciones($campo,$perfilcampos) {
		$this->saveRelacionesBase($campo,$perfilcampos,false);
	}

	public function saveRelacionesBase($campo,$perfilcampos=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$campo->setperfil_campos($perfilcampos);
			$this->setcampo($campo);

			if(true) {

				//campo_logic_add::updateRelacionesToSave($campo,$this);

				if(($this->campo->getIsNew() || $this->campo->getIsChanged()) && !$this->campo->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($perfilcampos);

				} else if($this->campo->getIsDeleted()) {
					$this->saveRelacionesDetalles($perfilcampos);
					$this->save();
				}

				//campo_logic_add::updateRelacionesToSaveAfter($campo,$this);

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
	
	
	public function saveRelacionesDetalles($perfilcampos=array()) {
		try {
	

			$idcampoActual=$this->getcampo()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/perfil_campo_carga.php');
			perfil_campo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$perfilcampoLogic_Desde_campo=new perfil_campo_logic();
			$perfilcampoLogic_Desde_campo->setperfil_campos($perfilcampos);

			$perfilcampoLogic_Desde_campo->setConnexion($this->getConnexion());
			$perfilcampoLogic_Desde_campo->setDatosCliente($this->datosCliente);

			foreach($perfilcampoLogic_Desde_campo->getperfil_campos() as $perfilcampo_Desde_campo) {
				$perfilcampo_Desde_campo->setid_campo($idcampoActual);
			}

			$perfilcampoLogic_Desde_campo->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $campos,campo_param_return $campoParameterGeneral) : campo_param_return {
		$campoReturnGeneral=new campo_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $campoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $campos,campo_param_return $campoParameterGeneral) : campo_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$campoReturnGeneral=new campo_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $campoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $campos,campo $campo,campo_param_return $campoParameterGeneral,bool $isEsNuevocampo,array $clases) : campo_param_return {
		 try {	
			$campoReturnGeneral=new campo_param_return();
	
			$campoReturnGeneral->setcampo($campo);
			$campoReturnGeneral->setcampos($campos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$campoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $campoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $campos,campo $campo,campo_param_return $campoParameterGeneral,bool $isEsNuevocampo,array $clases) : campo_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$campoReturnGeneral=new campo_param_return();
	
			$campoReturnGeneral->setcampo($campo);
			$campoReturnGeneral->setcampos($campos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$campoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $campoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $campos,campo $campo,campo_param_return $campoParameterGeneral,bool $isEsNuevocampo,array $clases) : campo_param_return {
		 try {	
			$campoReturnGeneral=new campo_param_return();
	
			$campoReturnGeneral->setcampo($campo);
			$campoReturnGeneral->setcampos($campos);
			
			
			
			return $campoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $campos,campo $campo,campo_param_return $campoParameterGeneral,bool $isEsNuevocampo,array $clases) : campo_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$campoReturnGeneral=new campo_param_return();
	
			$campoReturnGeneral->setcampo($campo);
			$campoReturnGeneral->setcampos($campos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $campoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,campo $campo,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,campo $campo,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		campo_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		campo_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(campo $campo,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//campo_logic_add::updatecampoToGet($this->campo);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$campo->setopcion($this->campoDataAccess->getopcion($this->connexion,$campo));
		$campo->setperfil_campos($this->campoDataAccess->getperfil_campos($this->connexion,$campo));
		$campo->setperfils($this->campoDataAccess->getperfils($this->connexion,$campo));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==opcion::$class.'') {
				$campo->setopcion($this->campoDataAccess->getopcion($this->connexion,$campo));
				continue;
			}

			if($clas->clas==perfil_campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$campo->setperfil_campos($this->campoDataAccess->getperfil_campos($this->connexion,$campo));

				if($this->isConDeep) {
					$perfilcampoLogic= new perfil_campo_logic($this->connexion);
					$perfilcampoLogic->setperfil_campos($campo->getperfil_campos());
					$classesLocal=perfil_campo_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$perfilcampoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					perfil_campo_util::refrescarFKDescripciones($perfilcampoLogic->getperfil_campos());
					$campo->setperfil_campos($perfilcampoLogic->getperfil_campos());
				}

				continue;
			}

			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$campo->setperfils($this->campoDataAccess->getperfils($this->connexion,$campo));

				if($this->isConDeep) {
					$perfilLogic= new perfil_logic($this->connexion);
					$perfilLogic->setperfils($campo->getperfils());
					$classesLocal=perfil_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$perfilLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					perfil_util::refrescarFKDescripciones($perfilLogic->getperfils());
					$campo->setperfils($perfilLogic->getperfils());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==opcion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$campo->setopcion($this->campoDataAccess->getopcion($this->connexion,$campo));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_campo::$class);
			$campo->setperfil_campos($this->campoDataAccess->getperfil_campos($this->connexion,$campo));
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
			$campo->setperfils($this->campoDataAccess->getperfils($this->connexion,$campo));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$campo->setopcion($this->campoDataAccess->getopcion($this->connexion,$campo));
		$opcionLogic= new opcion_logic($this->connexion);
		$opcionLogic->deepLoad($campo->getopcion(),$isDeep,$deepLoadType,$clases);
				

		$campo->setperfil_campos($this->campoDataAccess->getperfil_campos($this->connexion,$campo));

		foreach($campo->getperfil_campos() as $perfilcampo) {
			$perfilcampoLogic= new perfil_campo_logic($this->connexion);
			$perfilcampoLogic->deepLoad($perfilcampo,$isDeep,$deepLoadType,$clases);
		}

		$campo->setperfils($this->campoDataAccess->getperfils($this->connexion,$campo));

		foreach($campo->getperfils() as $perfil) {
			$perfilLogic= new perfil_logic($this->connexion);
			$perfilLogic->deepLoad($perfil,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==opcion::$class.'') {
				$campo->setopcion($this->campoDataAccess->getopcion($this->connexion,$campo));
				$opcionLogic= new opcion_logic($this->connexion);
				$opcionLogic->deepLoad($campo->getopcion(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==perfil_campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$campo->setperfil_campos($this->campoDataAccess->getperfil_campos($this->connexion,$campo));

				foreach($campo->getperfil_campos() as $perfilcampo) {
					$perfilcampoLogic= new perfil_campo_logic($this->connexion);
					$perfilcampoLogic->deepLoad($perfilcampo,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$campo->setperfils($this->campoDataAccess->getperfils($this->connexion,$campo));

				foreach($campo->getperfils() as $perfil) {
					$perfilLogic= new perfil_logic($this->connexion);
					$perfilLogic->deepLoad($perfil,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==opcion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$campo->setopcion($this->campoDataAccess->getopcion($this->connexion,$campo));
			$opcionLogic= new opcion_logic($this->connexion);
			$opcionLogic->deepLoad($campo->getopcion(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_campo::$class);
			$campo->setperfil_campos($this->campoDataAccess->getperfil_campos($this->connexion,$campo));

			foreach($campo->getperfil_campos() as $perfilcampo) {
				$perfilcampoLogic= new perfil_campo_logic($this->connexion);
				$perfilcampoLogic->deepLoad($perfilcampo,$isDeep,$deepLoadType,$clases);
			}
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
			$campo->setperfils($this->campoDataAccess->getperfils($this->connexion,$campo));

			foreach($campo->getperfils() as $perfil) {
				$perfilLogic= new perfil_logic($this->connexion);
				$perfilLogic->deepLoad($perfil,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(campo $campo,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//campo_logic_add::updatecampoToSave($this->campo);			
			
			if(!$paraDeleteCascade) {				
				campo_data::save($campo, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		opcion_data::save($campo->getopcion(),$this->connexion);

		foreach($campo->getperfil_campos() as $perfilcampo) {
			$perfilcampo->setid_campo($campo->getId());
			perfil_campo_data::save($perfilcampo,$this->connexion);
		}

		foreach($campo->getperfils() as $perfil) {
			perfil_data::save($perfil,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==opcion::$class.'') {
				opcion_data::save($campo->getopcion(),$this->connexion);
				continue;
			}


			if($clas->clas==perfil_campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($campo->getperfil_campos() as $perfilcampo) {
					$perfilcampo->setid_campo($campo->getId());
					perfil_campo_data::save($perfilcampo,$this->connexion);
				}

				continue;
			}

			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($campo->getperfils() as $perfil) {
					perfil_data::save($perfil,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==opcion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			opcion_data::save($campo->getopcion(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_campo::$class);

			foreach($campo->getperfil_campos() as $perfilcampo) {
				$perfilcampo->setid_campo($campo->getId());
				perfil_campo_data::save($perfilcampo,$this->connexion);
			}

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

			foreach($campo->getperfils() as $perfil) {
				perfil_data::save($perfil,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		opcion_data::save($campo->getopcion(),$this->connexion);
		$opcionLogic= new opcion_logic($this->connexion);
		$opcionLogic->deepSave($campo->getopcion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($campo->getperfil_campos() as $perfilcampo) {
			$perfilcampoLogic= new perfil_campo_logic($this->connexion);
			$perfilcampo->setid_campo($campo->getId());
			perfil_campo_data::save($perfilcampo,$this->connexion);
			$perfilcampoLogic->deepSave($perfilcampo,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($campo->getperfils() as $perfil) {
			$perfilLogic= new perfil_logic($this->connexion);
			perfil_data::save($perfil,$this->connexion);
			$perfilLogic->deepSave($perfil,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==opcion::$class.'') {
				opcion_data::save($campo->getopcion(),$this->connexion);
				$opcionLogic= new opcion_logic($this->connexion);
				$opcionLogic->deepSave($campo->getopcion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==perfil_campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($campo->getperfil_campos() as $perfilcampo) {
					$perfilcampoLogic= new perfil_campo_logic($this->connexion);
					$perfilcampo->setid_campo($campo->getId());
					perfil_campo_data::save($perfilcampo,$this->connexion);
					$perfilcampoLogic->deepSave($perfilcampo,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($campo->getperfils() as $perfil) {
					$perfilLogic= new perfil_logic($this->connexion);
					perfil_data::save($perfil,$this->connexion);
					$perfilLogic->deepSave($perfil,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==opcion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			opcion_data::save($campo->getopcion(),$this->connexion);
			$opcionLogic= new opcion_logic($this->connexion);
			$opcionLogic->deepSave($campo->getopcion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_campo::$class);

			foreach($campo->getperfil_campos() as $perfilcampo) {
				$perfilcampoLogic= new perfil_campo_logic($this->connexion);
				$perfilcampo->setid_campo($campo->getId());
				perfil_campo_data::save($perfilcampo,$this->connexion);
				$perfilcampoLogic->deepSave($perfilcampo,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
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

			foreach($campo->getperfils() as $perfil) {
				$perfilLogic= new perfil_logic($this->connexion);
				perfil_data::save($perfil,$this->connexion);
				$perfilLogic->deepSave($perfil,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				campo_data::save($campo, $this->connexion);
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
			
			$this->deepLoad($this->campo,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->campos as $campo) {
				$this->deepLoad($campo,$isDeep,$deepLoadType,$clases);
								
				campo_util::refrescarFKDescripciones($this->campos);
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
			
			foreach($this->campos as $campo) {
				$this->deepLoad($campo,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->campo,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->campos as $campo) {
				$this->deepSave($campo,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->campos as $campo) {
				$this->deepSave($campo,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(opcion::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==opcion::$class) {
						$classes[]=new Classe(opcion::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

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
				
				$classes[]=new Classe(perfil_campo::$class);
				$classes[]=new Classe(perfil::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==perfil_campo::$class) {
						$classes[]=new Classe(perfil_campo::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==perfil::$class) {
						$classes[]=new Classe(perfil::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==perfil_campo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(perfil_campo::$class);
				}

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

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getcampo() : ?campo {	
		/*
		campo_logic_add::checkcampoToGet($this->campo,$this->datosCliente);
		campo_logic_add::updatecampoToGet($this->campo);
		*/
			
		return $this->campo;
	}
		
	public function setcampo(campo $newcampo) {
		$this->campo = $newcampo;
	}
	
	public function getcampos() : array {		
		/*
		campo_logic_add::checkcampoToGets($this->campos,$this->datosCliente);
		
		foreach ($this->campos as $campoLocal ) {
			campo_logic_add::updatecampoToGet($campoLocal);
		}
		*/
		
		return $this->campos;
	}
	
	public function setcampos(array $newcampos) {
		$this->campos = $newcampos;
	}
	
	public function getcampoDataAccess() : campo_data {
		return $this->campoDataAccess;
	}
	
	public function setcampoDataAccess(campo_data $newcampoDataAccess) {
		$this->campoDataAccess = $newcampoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        campo_carga::$CONTROLLER;;        
		
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
