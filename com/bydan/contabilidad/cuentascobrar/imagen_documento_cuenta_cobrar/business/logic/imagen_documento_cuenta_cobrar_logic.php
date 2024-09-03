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

namespace com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\util\imagen_documento_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\util\imagen_documento_cuenta_cobrar_param_return;

use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\presentation\session\imagen_documento_cuenta_cobrar_session;

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

use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\util\imagen_documento_cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\business\entity\imagen_documento_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\business\data\imagen_documento_cuenta_cobrar_data;

//FK


use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\entity\documento_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\data\documento_cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\logic\documento_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_util;

//REL


//REL DETALLES




class imagen_documento_cuenta_cobrar_logic  extends GeneralEntityLogic implements imagen_documento_cuenta_cobrar_logicI {	
	/*GENERAL*/
	public imagen_documento_cuenta_cobrar_data $imagen_documento_cuenta_cobrarDataAccess;
	//public ?imagen_documento_cuenta_cobrar_logic_add $imagen_documento_cuenta_cobrarLogicAdditional=null;
	public ?imagen_documento_cuenta_cobrar $imagen_documento_cuenta_cobrar;
	public array $imagen_documento_cuenta_cobrars;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->imagen_documento_cuenta_cobrarDataAccess = new imagen_documento_cuenta_cobrar_data();			
			$this->imagen_documento_cuenta_cobrars = array();
			$this->imagen_documento_cuenta_cobrar = new imagen_documento_cuenta_cobrar();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->imagen_documento_cuenta_cobrarLogicAdditional = new imagen_documento_cuenta_cobrar_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->imagen_documento_cuenta_cobrarLogicAdditional==null) {
		//	$this->imagen_documento_cuenta_cobrarLogicAdditional=new imagen_documento_cuenta_cobrar_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->imagen_documento_cuenta_cobrarDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->imagen_documento_cuenta_cobrarDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->imagen_documento_cuenta_cobrarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->imagen_documento_cuenta_cobrarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_documento_cuenta_cobrars = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_documento_cuenta_cobrars=$this->imagen_documento_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_cobrar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_cobrars);
			}
			
			//imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToGets($this->imagen_documento_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_cobrars);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_documento_cuenta_cobrars = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_documento_cuenta_cobrars=$this->imagen_documento_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_cobrar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_cobrars);
			}
			
			//imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToGets($this->imagen_documento_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_cobrars);
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
		$this->imagen_documento_cuenta_cobrar = new imagen_documento_cuenta_cobrar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->imagen_documento_cuenta_cobrar=$this->imagen_documento_cuenta_cobrarDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_documento_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_documento_cuenta_cobrar_util::refrescarFKDescripcion($this->imagen_documento_cuenta_cobrar);
			}
						
			//imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToGet($this->imagen_documento_cuenta_cobrar,$this->datosCliente);
			//imagen_documento_cuenta_cobrar_logic_add::updateimagen_documento_cuenta_cobrarToGet($this->imagen_documento_cuenta_cobrar);
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
		$this->imagen_documento_cuenta_cobrar = new  imagen_documento_cuenta_cobrar();
		  		  
        try {		
			$this->imagen_documento_cuenta_cobrar=$this->imagen_documento_cuenta_cobrarDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_documento_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_documento_cuenta_cobrar_util::refrescarFKDescripcion($this->imagen_documento_cuenta_cobrar);
			}
			
			//imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToGet($this->imagen_documento_cuenta_cobrar,$this->datosCliente);
			//imagen_documento_cuenta_cobrar_logic_add::updateimagen_documento_cuenta_cobrarToGet($this->imagen_documento_cuenta_cobrar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?imagen_documento_cuenta_cobrar {
		$imagen_documento_cuenta_cobrarLogic = new  imagen_documento_cuenta_cobrar_logic();
		  		  
        try {		
			$imagen_documento_cuenta_cobrarLogic->setConnexion($connexion);			
			$imagen_documento_cuenta_cobrarLogic->getEntity($id);			
			return $imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrar();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->imagen_documento_cuenta_cobrar = new  imagen_documento_cuenta_cobrar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->imagen_documento_cuenta_cobrar=$this->imagen_documento_cuenta_cobrarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_documento_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_documento_cuenta_cobrar_util::refrescarFKDescripcion($this->imagen_documento_cuenta_cobrar);
			}
			
			//imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToGet($this->imagen_documento_cuenta_cobrar,$this->datosCliente);
			//imagen_documento_cuenta_cobrar_logic_add::updateimagen_documento_cuenta_cobrarToGet($this->imagen_documento_cuenta_cobrar);
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
		$this->imagen_documento_cuenta_cobrar = new  imagen_documento_cuenta_cobrar();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_documento_cuenta_cobrar=$this->imagen_documento_cuenta_cobrarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_documento_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_documento_cuenta_cobrar_util::refrescarFKDescripcion($this->imagen_documento_cuenta_cobrar);
			}
			
			//imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToGet($this->imagen_documento_cuenta_cobrar,$this->datosCliente);
			//imagen_documento_cuenta_cobrar_logic_add::updateimagen_documento_cuenta_cobrarToGet($this->imagen_documento_cuenta_cobrar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?imagen_documento_cuenta_cobrar {
		$imagen_documento_cuenta_cobrarLogic = new  imagen_documento_cuenta_cobrar_logic();
		  		  
        try {		
			$imagen_documento_cuenta_cobrarLogic->setConnexion($connexion);			
			$imagen_documento_cuenta_cobrarLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrar();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_documento_cuenta_cobrars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_documento_cuenta_cobrars=$this->imagen_documento_cuenta_cobrarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_cobrar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_cobrars);
			}
			
			//imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToGets($this->imagen_documento_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_cobrars);			
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
		$this->imagen_documento_cuenta_cobrars = array();
		  		  
        try {			
			$this->imagen_documento_cuenta_cobrars=$this->imagen_documento_cuenta_cobrarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_cobrar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_cobrars);
			}
			
			//imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToGets($this->imagen_documento_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_cobrars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->imagen_documento_cuenta_cobrars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_documento_cuenta_cobrars=$this->imagen_documento_cuenta_cobrarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_cobrar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_cobrars);
			}
			
			//imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToGets($this->imagen_documento_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_cobrars);
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
		$this->imagen_documento_cuenta_cobrars = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_documento_cuenta_cobrars=$this->imagen_documento_cuenta_cobrarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_cobrar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_cobrars);
			}
			
			//imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToGets($this->imagen_documento_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_cobrars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$imagen_documento_cuenta_cobrarLogic = new  imagen_documento_cuenta_cobrar_logic();
		  		  
        try {		
			$imagen_documento_cuenta_cobrarLogic->setConnexion($connexion);			
			$imagen_documento_cuenta_cobrarLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrars();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->imagen_documento_cuenta_cobrars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_documento_cuenta_cobrars=$this->imagen_documento_cuenta_cobrarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_cobrar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_cobrars);
			}
			
			//imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToGets($this->imagen_documento_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_cobrars);
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
		$this->imagen_documento_cuenta_cobrars = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_documento_cuenta_cobrars=$this->imagen_documento_cuenta_cobrarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_cobrar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_cobrars);
			}
			
			//imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToGets($this->imagen_documento_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_cobrars);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->imagen_documento_cuenta_cobrars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_documento_cuenta_cobrars=$this->imagen_documento_cuenta_cobrarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_cobrar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_cobrars);
			}
			
			//imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToGets($this->imagen_documento_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_cobrars);
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
		$this->imagen_documento_cuenta_cobrars = array();
		  		  
        try {			
			$this->imagen_documento_cuenta_cobrars=$this->imagen_documento_cuenta_cobrarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_cobrar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_cobrars);
			}	
			
			//imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToGets($this->imagen_documento_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_cobrars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_documento_cuenta_cobrars = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_documento_cuenta_cobrars=$this->imagen_documento_cuenta_cobrarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_cobrar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_cobrars);
			}
			
			//imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToGets($this->imagen_documento_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_cobrars);
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
		$this->imagen_documento_cuenta_cobrars = array();
		  		  
        try {		
			$this->imagen_documento_cuenta_cobrars=$this->imagen_documento_cuenta_cobrarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_cobrar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_cobrars);
			}
			
			//imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToGets($this->imagen_documento_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_cobrars);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_Iddocumento_cuenta_cobrarWithConnection(string $strFinalQuery,Pagination $pagination,int $id_documento_cuenta_cobrar) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_documento_cuenta_cobrar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_documento_cuenta_cobrar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_documento_cuenta_cobrar,imagen_documento_cuenta_cobrar_util::$ID_DOCUMENTO_CUENTA_COBRAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_documento_cuenta_cobrar);

			$this->imagen_documento_cuenta_cobrars=$this->imagen_documento_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				imagen_documento_cuenta_cobrar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_cobrars);
			}
			//imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToGets($this->imagen_documento_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_cobrars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Iddocumento_cuenta_cobrar(string $strFinalQuery,Pagination $pagination,int $id_documento_cuenta_cobrar) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_documento_cuenta_cobrar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_documento_cuenta_cobrar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_documento_cuenta_cobrar,imagen_documento_cuenta_cobrar_util::$ID_DOCUMENTO_CUENTA_COBRAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_documento_cuenta_cobrar);

			$this->imagen_documento_cuenta_cobrars=$this->imagen_documento_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				imagen_documento_cuenta_cobrar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_cobrars);
			}
			//imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToGets($this->imagen_documento_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_cobrars);
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
						
			//imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToSave($this->imagen_documento_cuenta_cobrar,$this->datosCliente,$this->connexion);	       
			//imagen_documento_cuenta_cobrar_logic_add::updateimagen_documento_cuenta_cobrarToSave($this->imagen_documento_cuenta_cobrar);			
			imagen_documento_cuenta_cobrar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_documento_cuenta_cobrar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->imagen_documento_cuenta_cobrarLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_documento_cuenta_cobrar,$this->datosCliente,$this->connexion);
			
			
			imagen_documento_cuenta_cobrar_data::save($this->imagen_documento_cuenta_cobrar, $this->connexion);	    	       	 				
			//imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToSaveAfter($this->imagen_documento_cuenta_cobrar,$this->datosCliente,$this->connexion);			
			//$this->imagen_documento_cuenta_cobrarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_documento_cuenta_cobrar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_documento_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_documento_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_documento_cuenta_cobrar_util::refrescarFKDescripcion($this->imagen_documento_cuenta_cobrar);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->imagen_documento_cuenta_cobrar->getIsDeleted()) {
				$this->imagen_documento_cuenta_cobrar=null;
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
						
			/*imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToSave($this->imagen_documento_cuenta_cobrar,$this->datosCliente,$this->connexion);*/	        
			//imagen_documento_cuenta_cobrar_logic_add::updateimagen_documento_cuenta_cobrarToSave($this->imagen_documento_cuenta_cobrar);			
			//$this->imagen_documento_cuenta_cobrarLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_documento_cuenta_cobrar,$this->datosCliente,$this->connexion);			
			imagen_documento_cuenta_cobrar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_documento_cuenta_cobrar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			imagen_documento_cuenta_cobrar_data::save($this->imagen_documento_cuenta_cobrar, $this->connexion);	    	       	 						
			/*imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToSaveAfter($this->imagen_documento_cuenta_cobrar,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_documento_cuenta_cobrarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_documento_cuenta_cobrar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_documento_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_documento_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_documento_cuenta_cobrar_util::refrescarFKDescripcion($this->imagen_documento_cuenta_cobrar);				
			}
			
			if($this->imagen_documento_cuenta_cobrar->getIsDeleted()) {
				$this->imagen_documento_cuenta_cobrar=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(imagen_documento_cuenta_cobrar $imagen_documento_cuenta_cobrar,Connexion $connexion)  {
		$imagen_documento_cuenta_cobrarLogic = new  imagen_documento_cuenta_cobrar_logic();		  		  
        try {		
			$imagen_documento_cuenta_cobrarLogic->setConnexion($connexion);			
			$imagen_documento_cuenta_cobrarLogic->setimagen_documento_cuenta_cobrar($imagen_documento_cuenta_cobrar);			
			$imagen_documento_cuenta_cobrarLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToSaves($this->imagen_documento_cuenta_cobrars,$this->datosCliente,$this->connexion);*/	        	
			//$this->imagen_documento_cuenta_cobrarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_documento_cuenta_cobrars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_documento_cuenta_cobrars as $imagen_documento_cuenta_cobrarLocal) {				
								
				//imagen_documento_cuenta_cobrar_logic_add::updateimagen_documento_cuenta_cobrarToSave($imagen_documento_cuenta_cobrarLocal);	        	
				imagen_documento_cuenta_cobrar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_documento_cuenta_cobrarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				imagen_documento_cuenta_cobrar_data::save($imagen_documento_cuenta_cobrarLocal, $this->connexion);				
			}
			
			/*imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToSavesAfter($this->imagen_documento_cuenta_cobrars,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_documento_cuenta_cobrarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_documento_cuenta_cobrars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_cobrar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_cobrars);
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
			/*imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToSaves($this->imagen_documento_cuenta_cobrars,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_documento_cuenta_cobrarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_documento_cuenta_cobrars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_documento_cuenta_cobrars as $imagen_documento_cuenta_cobrarLocal) {				
								
				//imagen_documento_cuenta_cobrar_logic_add::updateimagen_documento_cuenta_cobrarToSave($imagen_documento_cuenta_cobrarLocal);	        	
				imagen_documento_cuenta_cobrar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_documento_cuenta_cobrarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				imagen_documento_cuenta_cobrar_data::save($imagen_documento_cuenta_cobrarLocal, $this->connexion);				
			}			
			
			/*imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToSavesAfter($this->imagen_documento_cuenta_cobrars,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_documento_cuenta_cobrarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_documento_cuenta_cobrars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_cobrar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_cobrars);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $imagen_documento_cuenta_cobrars,Connexion $connexion)  {
		$imagen_documento_cuenta_cobrarLogic = new  imagen_documento_cuenta_cobrar_logic();
		  		  
        try {		
			$imagen_documento_cuenta_cobrarLogic->setConnexion($connexion);			
			$imagen_documento_cuenta_cobrarLogic->setimagen_documento_cuenta_cobrars($imagen_documento_cuenta_cobrars);			
			$imagen_documento_cuenta_cobrarLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$imagen_documento_cuenta_cobrarsAux=array();
		
		foreach($this->imagen_documento_cuenta_cobrars as $imagen_documento_cuenta_cobrar) {
			if($imagen_documento_cuenta_cobrar->getIsDeleted()==false) {
				$imagen_documento_cuenta_cobrarsAux[]=$imagen_documento_cuenta_cobrar;
			}
		}
		
		$this->imagen_documento_cuenta_cobrars=$imagen_documento_cuenta_cobrarsAux;
	}
	
	public function updateToGetsAuxiliar(array &$imagen_documento_cuenta_cobrars) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->imagen_documento_cuenta_cobrars as $imagen_documento_cuenta_cobrar) {
				
				$imagen_documento_cuenta_cobrar->setid_documento_cuenta_cobrar_Descripcion(imagen_documento_cuenta_cobrar_util::getdocumento_cuenta_cobrarDescripcion($imagen_documento_cuenta_cobrar->getdocumento_cuenta_cobrar()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$imagen_documento_cuenta_cobrar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$imagen_documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$imagen_documento_cuenta_cobrar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$imagen_documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$imagen_documento_cuenta_cobrar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$imagen_documento_cuenta_cobrarForeignKey=new imagen_documento_cuenta_cobrar_param_return();//imagen_documento_cuenta_cobrarForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_documento_cuenta_cobrar',$strRecargarFkTipos,',')) {
				$this->cargarCombosdocumento_cuenta_cobrarsFK($this->connexion,$strRecargarFkQuery,$imagen_documento_cuenta_cobrarForeignKey,$imagen_documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_documento_cuenta_cobrar',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosdocumento_cuenta_cobrarsFK($this->connexion,' where id=-1 ',$imagen_documento_cuenta_cobrarForeignKey,$imagen_documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $imagen_documento_cuenta_cobrarForeignKey;
			
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
	
	
	public function cargarCombosdocumento_cuenta_cobrarsFK($connexion=null,$strRecargarFkQuery='',$imagen_documento_cuenta_cobrarForeignKey,$imagen_documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic();
		$pagination= new Pagination();
		$imagen_documento_cuenta_cobrarForeignKey->documento_cuenta_cobrarsFK=array();

		$documento_cuenta_cobrarLogic->setConnexion($connexion);
		$documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($imagen_documento_cuenta_cobrar_session==null) {
			$imagen_documento_cuenta_cobrar_session=new imagen_documento_cuenta_cobrar_session();
		}
		
		if($imagen_documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesiondocumento_cuenta_cobrar!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=documento_cuenta_cobrar_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaldocumento_cuenta_cobrar=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaldocumento_cuenta_cobrar=Funciones::GetFinalQueryAppend($finalQueryGlobaldocumento_cuenta_cobrar, '');
				$finalQueryGlobaldocumento_cuenta_cobrar.=documento_cuenta_cobrar_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaldocumento_cuenta_cobrar.$strRecargarFkQuery;		

				$documento_cuenta_cobrarLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars() as $documento_cuenta_cobrarLocal ) {
				if($imagen_documento_cuenta_cobrarForeignKey->iddocumento_cuenta_cobrarDefaultFK==0) {
					$imagen_documento_cuenta_cobrarForeignKey->iddocumento_cuenta_cobrarDefaultFK=$documento_cuenta_cobrarLocal->getId();
				}

				$imagen_documento_cuenta_cobrarForeignKey->documento_cuenta_cobrarsFK[$documento_cuenta_cobrarLocal->getId()]=imagen_documento_cuenta_cobrar_util::getdocumento_cuenta_cobrarDescripcion($documento_cuenta_cobrarLocal);
			}

		} else {

			if($imagen_documento_cuenta_cobrar_session->bigiddocumento_cuenta_cobrarActual!=null && $imagen_documento_cuenta_cobrar_session->bigiddocumento_cuenta_cobrarActual > 0) {
				$documento_cuenta_cobrarLogic->getEntity($imagen_documento_cuenta_cobrar_session->bigiddocumento_cuenta_cobrarActual);//WithConnection

				$imagen_documento_cuenta_cobrarForeignKey->documento_cuenta_cobrarsFK[$documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getId()]=imagen_documento_cuenta_cobrar_util::getdocumento_cuenta_cobrarDescripcion($documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar());
				$imagen_documento_cuenta_cobrarForeignKey->iddocumento_cuenta_cobrarDefaultFK=$documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($imagen_documento_cuenta_cobrar) {
		$this->saveRelacionesBase($imagen_documento_cuenta_cobrar,true);
	}

	public function saveRelaciones($imagen_documento_cuenta_cobrar) {
		$this->saveRelacionesBase($imagen_documento_cuenta_cobrar,false);
	}

	public function saveRelacionesBase($imagen_documento_cuenta_cobrar,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setimagen_documento_cuenta_cobrar($imagen_documento_cuenta_cobrar);

			if(true) {

				//imagen_documento_cuenta_cobrar_logic_add::updateRelacionesToSave($imagen_documento_cuenta_cobrar,$this);

				if(($this->imagen_documento_cuenta_cobrar->getIsNew() || $this->imagen_documento_cuenta_cobrar->getIsChanged()) && !$this->imagen_documento_cuenta_cobrar->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->imagen_documento_cuenta_cobrar->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//imagen_documento_cuenta_cobrar_logic_add::updateRelacionesToSaveAfter($imagen_documento_cuenta_cobrar,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $imagen_documento_cuenta_cobrars,imagen_documento_cuenta_cobrar_param_return $imagen_documento_cuenta_cobrarParameterGeneral) : imagen_documento_cuenta_cobrar_param_return {
		$imagen_documento_cuenta_cobrarReturnGeneral=new imagen_documento_cuenta_cobrar_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $imagen_documento_cuenta_cobrarReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $imagen_documento_cuenta_cobrars,imagen_documento_cuenta_cobrar_param_return $imagen_documento_cuenta_cobrarParameterGeneral) : imagen_documento_cuenta_cobrar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_documento_cuenta_cobrarReturnGeneral=new imagen_documento_cuenta_cobrar_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_documento_cuenta_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_documento_cuenta_cobrars,imagen_documento_cuenta_cobrar $imagen_documento_cuenta_cobrar,imagen_documento_cuenta_cobrar_param_return $imagen_documento_cuenta_cobrarParameterGeneral,bool $isEsNuevoimagen_documento_cuenta_cobrar,array $clases) : imagen_documento_cuenta_cobrar_param_return {
		 try {	
			$imagen_documento_cuenta_cobrarReturnGeneral=new imagen_documento_cuenta_cobrar_param_return();
	
			$imagen_documento_cuenta_cobrarReturnGeneral->setimagen_documento_cuenta_cobrar($imagen_documento_cuenta_cobrar);
			$imagen_documento_cuenta_cobrarReturnGeneral->setimagen_documento_cuenta_cobrars($imagen_documento_cuenta_cobrars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_documento_cuenta_cobrarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $imagen_documento_cuenta_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_documento_cuenta_cobrars,imagen_documento_cuenta_cobrar $imagen_documento_cuenta_cobrar,imagen_documento_cuenta_cobrar_param_return $imagen_documento_cuenta_cobrarParameterGeneral,bool $isEsNuevoimagen_documento_cuenta_cobrar,array $clases) : imagen_documento_cuenta_cobrar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_documento_cuenta_cobrarReturnGeneral=new imagen_documento_cuenta_cobrar_param_return();
	
			$imagen_documento_cuenta_cobrarReturnGeneral->setimagen_documento_cuenta_cobrar($imagen_documento_cuenta_cobrar);
			$imagen_documento_cuenta_cobrarReturnGeneral->setimagen_documento_cuenta_cobrars($imagen_documento_cuenta_cobrars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_documento_cuenta_cobrarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_documento_cuenta_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_documento_cuenta_cobrars,imagen_documento_cuenta_cobrar $imagen_documento_cuenta_cobrar,imagen_documento_cuenta_cobrar_param_return $imagen_documento_cuenta_cobrarParameterGeneral,bool $isEsNuevoimagen_documento_cuenta_cobrar,array $clases) : imagen_documento_cuenta_cobrar_param_return {
		 try {	
			$imagen_documento_cuenta_cobrarReturnGeneral=new imagen_documento_cuenta_cobrar_param_return();
	
			$imagen_documento_cuenta_cobrarReturnGeneral->setimagen_documento_cuenta_cobrar($imagen_documento_cuenta_cobrar);
			$imagen_documento_cuenta_cobrarReturnGeneral->setimagen_documento_cuenta_cobrars($imagen_documento_cuenta_cobrars);
			
			
			
			return $imagen_documento_cuenta_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_documento_cuenta_cobrars,imagen_documento_cuenta_cobrar $imagen_documento_cuenta_cobrar,imagen_documento_cuenta_cobrar_param_return $imagen_documento_cuenta_cobrarParameterGeneral,bool $isEsNuevoimagen_documento_cuenta_cobrar,array $clases) : imagen_documento_cuenta_cobrar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_documento_cuenta_cobrarReturnGeneral=new imagen_documento_cuenta_cobrar_param_return();
	
			$imagen_documento_cuenta_cobrarReturnGeneral->setimagen_documento_cuenta_cobrar($imagen_documento_cuenta_cobrar);
			$imagen_documento_cuenta_cobrarReturnGeneral->setimagen_documento_cuenta_cobrars($imagen_documento_cuenta_cobrars);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_documento_cuenta_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,imagen_documento_cuenta_cobrar $imagen_documento_cuenta_cobrar,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,imagen_documento_cuenta_cobrar $imagen_documento_cuenta_cobrar,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		imagen_documento_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(imagen_documento_cuenta_cobrar $imagen_documento_cuenta_cobrar,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//imagen_documento_cuenta_cobrar_logic_add::updateimagen_documento_cuenta_cobrarToGet($this->imagen_documento_cuenta_cobrar);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$imagen_documento_cuenta_cobrar->setdocumento_cuenta_cobrar($this->imagen_documento_cuenta_cobrarDataAccess->getdocumento_cuenta_cobrar($this->connexion,$imagen_documento_cuenta_cobrar));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				$imagen_documento_cuenta_cobrar->setdocumento_cuenta_cobrar($this->imagen_documento_cuenta_cobrarDataAccess->getdocumento_cuenta_cobrar($this->connexion,$imagen_documento_cuenta_cobrar));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$imagen_documento_cuenta_cobrar->setdocumento_cuenta_cobrar($this->imagen_documento_cuenta_cobrarDataAccess->getdocumento_cuenta_cobrar($this->connexion,$imagen_documento_cuenta_cobrar));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$imagen_documento_cuenta_cobrar->setdocumento_cuenta_cobrar($this->imagen_documento_cuenta_cobrarDataAccess->getdocumento_cuenta_cobrar($this->connexion,$imagen_documento_cuenta_cobrar));
		$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
		$documento_cuenta_cobrarLogic->deepLoad($imagen_documento_cuenta_cobrar->getdocumento_cuenta_cobrar(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				$imagen_documento_cuenta_cobrar->setdocumento_cuenta_cobrar($this->imagen_documento_cuenta_cobrarDataAccess->getdocumento_cuenta_cobrar($this->connexion,$imagen_documento_cuenta_cobrar));
				$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
				$documento_cuenta_cobrarLogic->deepLoad($imagen_documento_cuenta_cobrar->getdocumento_cuenta_cobrar(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$imagen_documento_cuenta_cobrar->setdocumento_cuenta_cobrar($this->imagen_documento_cuenta_cobrarDataAccess->getdocumento_cuenta_cobrar($this->connexion,$imagen_documento_cuenta_cobrar));
			$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
			$documento_cuenta_cobrarLogic->deepLoad($imagen_documento_cuenta_cobrar->getdocumento_cuenta_cobrar(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(imagen_documento_cuenta_cobrar $imagen_documento_cuenta_cobrar,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//imagen_documento_cuenta_cobrar_logic_add::updateimagen_documento_cuenta_cobrarToSave($this->imagen_documento_cuenta_cobrar);			
			
			if(!$paraDeleteCascade) {				
				imagen_documento_cuenta_cobrar_data::save($imagen_documento_cuenta_cobrar, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		documento_cuenta_cobrar_data::save($imagen_documento_cuenta_cobrar->getdocumento_cuenta_cobrar(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				documento_cuenta_cobrar_data::save($imagen_documento_cuenta_cobrar->getdocumento_cuenta_cobrar(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			documento_cuenta_cobrar_data::save($imagen_documento_cuenta_cobrar->getdocumento_cuenta_cobrar(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		documento_cuenta_cobrar_data::save($imagen_documento_cuenta_cobrar->getdocumento_cuenta_cobrar(),$this->connexion);
		$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
		$documento_cuenta_cobrarLogic->deepSave($imagen_documento_cuenta_cobrar->getdocumento_cuenta_cobrar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				documento_cuenta_cobrar_data::save($imagen_documento_cuenta_cobrar->getdocumento_cuenta_cobrar(),$this->connexion);
				$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
				$documento_cuenta_cobrarLogic->deepSave($imagen_documento_cuenta_cobrar->getdocumento_cuenta_cobrar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			documento_cuenta_cobrar_data::save($imagen_documento_cuenta_cobrar->getdocumento_cuenta_cobrar(),$this->connexion);
			$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
			$documento_cuenta_cobrarLogic->deepSave($imagen_documento_cuenta_cobrar->getdocumento_cuenta_cobrar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				imagen_documento_cuenta_cobrar_data::save($imagen_documento_cuenta_cobrar, $this->connexion);
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
			
			$this->deepLoad($this->imagen_documento_cuenta_cobrar,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->imagen_documento_cuenta_cobrars as $imagen_documento_cuenta_cobrar) {
				$this->deepLoad($imagen_documento_cuenta_cobrar,$isDeep,$deepLoadType,$clases);
								
				imagen_documento_cuenta_cobrar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_cobrars);
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
			
			foreach($this->imagen_documento_cuenta_cobrars as $imagen_documento_cuenta_cobrar) {
				$this->deepLoad($imagen_documento_cuenta_cobrar,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->imagen_documento_cuenta_cobrar,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->imagen_documento_cuenta_cobrars as $imagen_documento_cuenta_cobrar) {
				$this->deepSave($imagen_documento_cuenta_cobrar,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->imagen_documento_cuenta_cobrars as $imagen_documento_cuenta_cobrar) {
				$this->deepSave($imagen_documento_cuenta_cobrar,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(documento_cuenta_cobrar::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==documento_cuenta_cobrar::$class) {
						$classes[]=new Classe(documento_cuenta_cobrar::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==documento_cuenta_cobrar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(documento_cuenta_cobrar::$class);
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
	
	
	
	
	
	
	
	public function getimagen_documento_cuenta_cobrar() : ?imagen_documento_cuenta_cobrar {	
		/*
		imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToGet($this->imagen_documento_cuenta_cobrar,$this->datosCliente);
		imagen_documento_cuenta_cobrar_logic_add::updateimagen_documento_cuenta_cobrarToGet($this->imagen_documento_cuenta_cobrar);
		*/
			
		return $this->imagen_documento_cuenta_cobrar;
	}
		
	public function setimagen_documento_cuenta_cobrar(imagen_documento_cuenta_cobrar $newimagen_documento_cuenta_cobrar) {
		$this->imagen_documento_cuenta_cobrar = $newimagen_documento_cuenta_cobrar;
	}
	
	public function getimagen_documento_cuenta_cobrars() : array {		
		/*
		imagen_documento_cuenta_cobrar_logic_add::checkimagen_documento_cuenta_cobrarToGets($this->imagen_documento_cuenta_cobrars,$this->datosCliente);
		
		foreach ($this->imagen_documento_cuenta_cobrars as $imagen_documento_cuenta_cobrarLocal ) {
			imagen_documento_cuenta_cobrar_logic_add::updateimagen_documento_cuenta_cobrarToGet($imagen_documento_cuenta_cobrarLocal);
		}
		*/
		
		return $this->imagen_documento_cuenta_cobrars;
	}
	
	public function setimagen_documento_cuenta_cobrars(array $newimagen_documento_cuenta_cobrars) {
		$this->imagen_documento_cuenta_cobrars = $newimagen_documento_cuenta_cobrars;
	}
	
	public function getimagen_documento_cuenta_cobrarDataAccess() : imagen_documento_cuenta_cobrar_data {
		return $this->imagen_documento_cuenta_cobrarDataAccess;
	}
	
	public function setimagen_documento_cuenta_cobrarDataAccess(imagen_documento_cuenta_cobrar_data $newimagen_documento_cuenta_cobrarDataAccess) {
		$this->imagen_documento_cuenta_cobrarDataAccess = $newimagen_documento_cuenta_cobrarDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        imagen_documento_cuenta_cobrar_carga::$CONTROLLER;;        
		
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
