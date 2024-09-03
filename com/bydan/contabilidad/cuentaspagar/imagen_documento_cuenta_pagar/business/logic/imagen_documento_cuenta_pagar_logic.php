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

namespace com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\util\imagen_documento_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\util\imagen_documento_cuenta_pagar_param_return;

use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\presentation\session\imagen_documento_cuenta_pagar_session;

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

use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\util\imagen_documento_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\business\entity\imagen_documento_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\business\data\imagen_documento_cuenta_pagar_data;

//FK


use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\entity\documento_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\data\documento_cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\logic\documento_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_util;

//REL


//REL DETALLES




class imagen_documento_cuenta_pagar_logic  extends GeneralEntityLogic implements imagen_documento_cuenta_pagar_logicI {	
	/*GENERAL*/
	public imagen_documento_cuenta_pagar_data $imagen_documento_cuenta_pagarDataAccess;
	//public ?imagen_documento_cuenta_pagar_logic_add $imagen_documento_cuenta_pagarLogicAdditional=null;
	public ?imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar;
	public array $imagen_documento_cuenta_pagars;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->imagen_documento_cuenta_pagarDataAccess = new imagen_documento_cuenta_pagar_data();			
			$this->imagen_documento_cuenta_pagars = array();
			$this->imagen_documento_cuenta_pagar = new imagen_documento_cuenta_pagar();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->imagen_documento_cuenta_pagarLogicAdditional = new imagen_documento_cuenta_pagar_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->imagen_documento_cuenta_pagarLogicAdditional==null) {
		//	$this->imagen_documento_cuenta_pagarLogicAdditional=new imagen_documento_cuenta_pagar_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->imagen_documento_cuenta_pagarDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->imagen_documento_cuenta_pagarDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->imagen_documento_cuenta_pagarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->imagen_documento_cuenta_pagarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_documento_cuenta_pagars = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_documento_cuenta_pagars=$this->imagen_documento_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_pagar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_pagars);
			}
			
			//imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToGets($this->imagen_documento_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_pagars);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_documento_cuenta_pagars = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_documento_cuenta_pagars=$this->imagen_documento_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_pagar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_pagars);
			}
			
			//imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToGets($this->imagen_documento_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_pagars);
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
		$this->imagen_documento_cuenta_pagar = new imagen_documento_cuenta_pagar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->imagen_documento_cuenta_pagar=$this->imagen_documento_cuenta_pagarDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_documento_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_documento_cuenta_pagar_util::refrescarFKDescripcion($this->imagen_documento_cuenta_pagar);
			}
						
			//imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToGet($this->imagen_documento_cuenta_pagar,$this->datosCliente);
			//imagen_documento_cuenta_pagar_logic_add::updateimagen_documento_cuenta_pagarToGet($this->imagen_documento_cuenta_pagar);
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
		$this->imagen_documento_cuenta_pagar = new  imagen_documento_cuenta_pagar();
		  		  
        try {		
			$this->imagen_documento_cuenta_pagar=$this->imagen_documento_cuenta_pagarDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_documento_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_documento_cuenta_pagar_util::refrescarFKDescripcion($this->imagen_documento_cuenta_pagar);
			}
			
			//imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToGet($this->imagen_documento_cuenta_pagar,$this->datosCliente);
			//imagen_documento_cuenta_pagar_logic_add::updateimagen_documento_cuenta_pagarToGet($this->imagen_documento_cuenta_pagar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?imagen_documento_cuenta_pagar {
		$imagen_documento_cuenta_pagarLogic = new  imagen_documento_cuenta_pagar_logic();
		  		  
        try {		
			$imagen_documento_cuenta_pagarLogic->setConnexion($connexion);			
			$imagen_documento_cuenta_pagarLogic->getEntity($id);			
			return $imagen_documento_cuenta_pagarLogic->getimagen_documento_cuenta_pagar();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->imagen_documento_cuenta_pagar = new  imagen_documento_cuenta_pagar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->imagen_documento_cuenta_pagar=$this->imagen_documento_cuenta_pagarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_documento_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_documento_cuenta_pagar_util::refrescarFKDescripcion($this->imagen_documento_cuenta_pagar);
			}
			
			//imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToGet($this->imagen_documento_cuenta_pagar,$this->datosCliente);
			//imagen_documento_cuenta_pagar_logic_add::updateimagen_documento_cuenta_pagarToGet($this->imagen_documento_cuenta_pagar);
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
		$this->imagen_documento_cuenta_pagar = new  imagen_documento_cuenta_pagar();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_documento_cuenta_pagar=$this->imagen_documento_cuenta_pagarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_documento_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_documento_cuenta_pagar_util::refrescarFKDescripcion($this->imagen_documento_cuenta_pagar);
			}
			
			//imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToGet($this->imagen_documento_cuenta_pagar,$this->datosCliente);
			//imagen_documento_cuenta_pagar_logic_add::updateimagen_documento_cuenta_pagarToGet($this->imagen_documento_cuenta_pagar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?imagen_documento_cuenta_pagar {
		$imagen_documento_cuenta_pagarLogic = new  imagen_documento_cuenta_pagar_logic();
		  		  
        try {		
			$imagen_documento_cuenta_pagarLogic->setConnexion($connexion);			
			$imagen_documento_cuenta_pagarLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $imagen_documento_cuenta_pagarLogic->getimagen_documento_cuenta_pagar();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_documento_cuenta_pagars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_documento_cuenta_pagars=$this->imagen_documento_cuenta_pagarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_pagar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_pagars);
			}
			
			//imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToGets($this->imagen_documento_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_pagars);			
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
		$this->imagen_documento_cuenta_pagars = array();
		  		  
        try {			
			$this->imagen_documento_cuenta_pagars=$this->imagen_documento_cuenta_pagarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_pagar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_pagars);
			}
			
			//imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToGets($this->imagen_documento_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_pagars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->imagen_documento_cuenta_pagars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_documento_cuenta_pagars=$this->imagen_documento_cuenta_pagarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_pagar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_pagars);
			}
			
			//imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToGets($this->imagen_documento_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_pagars);
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
		$this->imagen_documento_cuenta_pagars = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_documento_cuenta_pagars=$this->imagen_documento_cuenta_pagarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_pagar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_pagars);
			}
			
			//imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToGets($this->imagen_documento_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_pagars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$imagen_documento_cuenta_pagarLogic = new  imagen_documento_cuenta_pagar_logic();
		  		  
        try {		
			$imagen_documento_cuenta_pagarLogic->setConnexion($connexion);			
			$imagen_documento_cuenta_pagarLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $imagen_documento_cuenta_pagarLogic->getimagen_documento_cuenta_pagars();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->imagen_documento_cuenta_pagars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_documento_cuenta_pagars=$this->imagen_documento_cuenta_pagarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_pagar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_pagars);
			}
			
			//imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToGets($this->imagen_documento_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_pagars);
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
		$this->imagen_documento_cuenta_pagars = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_documento_cuenta_pagars=$this->imagen_documento_cuenta_pagarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_pagar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_pagars);
			}
			
			//imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToGets($this->imagen_documento_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_pagars);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->imagen_documento_cuenta_pagars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_documento_cuenta_pagars=$this->imagen_documento_cuenta_pagarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_pagar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_pagars);
			}
			
			//imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToGets($this->imagen_documento_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_pagars);
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
		$this->imagen_documento_cuenta_pagars = array();
		  		  
        try {			
			$this->imagen_documento_cuenta_pagars=$this->imagen_documento_cuenta_pagarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_pagar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_pagars);
			}	
			
			//imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToGets($this->imagen_documento_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_pagars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_documento_cuenta_pagars = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_documento_cuenta_pagars=$this->imagen_documento_cuenta_pagarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_pagar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_pagars);
			}
			
			//imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToGets($this->imagen_documento_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_pagars);
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
		$this->imagen_documento_cuenta_pagars = array();
		  		  
        try {		
			$this->imagen_documento_cuenta_pagars=$this->imagen_documento_cuenta_pagarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_pagar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_pagars);
			}
			
			//imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToGets($this->imagen_documento_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_pagars);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_Iddocumento_cuenta_pagarWithConnection(string $strFinalQuery,Pagination $pagination,int $id_documento_cuenta_pagar) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_documento_cuenta_pagar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_documento_cuenta_pagar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_documento_cuenta_pagar,imagen_documento_cuenta_pagar_util::$ID_DOCUMENTO_CUENTA_PAGAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_documento_cuenta_pagar);

			$this->imagen_documento_cuenta_pagars=$this->imagen_documento_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				imagen_documento_cuenta_pagar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_pagars);
			}
			//imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToGets($this->imagen_documento_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_pagars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Iddocumento_cuenta_pagar(string $strFinalQuery,Pagination $pagination,int $id_documento_cuenta_pagar) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_documento_cuenta_pagar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_documento_cuenta_pagar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_documento_cuenta_pagar,imagen_documento_cuenta_pagar_util::$ID_DOCUMENTO_CUENTA_PAGAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_documento_cuenta_pagar);

			$this->imagen_documento_cuenta_pagars=$this->imagen_documento_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				imagen_documento_cuenta_pagar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_pagars);
			}
			//imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToGets($this->imagen_documento_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->imagen_documento_cuenta_pagars);
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
						
			//imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToSave($this->imagen_documento_cuenta_pagar,$this->datosCliente,$this->connexion);	       
			//imagen_documento_cuenta_pagar_logic_add::updateimagen_documento_cuenta_pagarToSave($this->imagen_documento_cuenta_pagar);			
			imagen_documento_cuenta_pagar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_documento_cuenta_pagar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->imagen_documento_cuenta_pagarLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_documento_cuenta_pagar,$this->datosCliente,$this->connexion);
			
			
			imagen_documento_cuenta_pagar_data::save($this->imagen_documento_cuenta_pagar, $this->connexion);	    	       	 				
			//imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToSaveAfter($this->imagen_documento_cuenta_pagar,$this->datosCliente,$this->connexion);			
			//$this->imagen_documento_cuenta_pagarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_documento_cuenta_pagar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_documento_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_documento_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_documento_cuenta_pagar_util::refrescarFKDescripcion($this->imagen_documento_cuenta_pagar);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->imagen_documento_cuenta_pagar->getIsDeleted()) {
				$this->imagen_documento_cuenta_pagar=null;
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
						
			/*imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToSave($this->imagen_documento_cuenta_pagar,$this->datosCliente,$this->connexion);*/	        
			//imagen_documento_cuenta_pagar_logic_add::updateimagen_documento_cuenta_pagarToSave($this->imagen_documento_cuenta_pagar);			
			//$this->imagen_documento_cuenta_pagarLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_documento_cuenta_pagar,$this->datosCliente,$this->connexion);			
			imagen_documento_cuenta_pagar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_documento_cuenta_pagar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			imagen_documento_cuenta_pagar_data::save($this->imagen_documento_cuenta_pagar, $this->connexion);	    	       	 						
			/*imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToSaveAfter($this->imagen_documento_cuenta_pagar,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_documento_cuenta_pagarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_documento_cuenta_pagar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_documento_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_documento_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_documento_cuenta_pagar_util::refrescarFKDescripcion($this->imagen_documento_cuenta_pagar);				
			}
			
			if($this->imagen_documento_cuenta_pagar->getIsDeleted()) {
				$this->imagen_documento_cuenta_pagar=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar,Connexion $connexion)  {
		$imagen_documento_cuenta_pagarLogic = new  imagen_documento_cuenta_pagar_logic();		  		  
        try {		
			$imagen_documento_cuenta_pagarLogic->setConnexion($connexion);			
			$imagen_documento_cuenta_pagarLogic->setimagen_documento_cuenta_pagar($imagen_documento_cuenta_pagar);			
			$imagen_documento_cuenta_pagarLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToSaves($this->imagen_documento_cuenta_pagars,$this->datosCliente,$this->connexion);*/	        	
			//$this->imagen_documento_cuenta_pagarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_documento_cuenta_pagars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_documento_cuenta_pagars as $imagen_documento_cuenta_pagarLocal) {				
								
				//imagen_documento_cuenta_pagar_logic_add::updateimagen_documento_cuenta_pagarToSave($imagen_documento_cuenta_pagarLocal);	        	
				imagen_documento_cuenta_pagar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_documento_cuenta_pagarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				imagen_documento_cuenta_pagar_data::save($imagen_documento_cuenta_pagarLocal, $this->connexion);				
			}
			
			/*imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToSavesAfter($this->imagen_documento_cuenta_pagars,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_documento_cuenta_pagarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_documento_cuenta_pagars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_pagar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_pagars);
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
			/*imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToSaves($this->imagen_documento_cuenta_pagars,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_documento_cuenta_pagarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_documento_cuenta_pagars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_documento_cuenta_pagars as $imagen_documento_cuenta_pagarLocal) {				
								
				//imagen_documento_cuenta_pagar_logic_add::updateimagen_documento_cuenta_pagarToSave($imagen_documento_cuenta_pagarLocal);	        	
				imagen_documento_cuenta_pagar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_documento_cuenta_pagarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				imagen_documento_cuenta_pagar_data::save($imagen_documento_cuenta_pagarLocal, $this->connexion);				
			}			
			
			/*imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToSavesAfter($this->imagen_documento_cuenta_pagars,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_documento_cuenta_pagarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_documento_cuenta_pagars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_documento_cuenta_pagar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_pagars);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $imagen_documento_cuenta_pagars,Connexion $connexion)  {
		$imagen_documento_cuenta_pagarLogic = new  imagen_documento_cuenta_pagar_logic();
		  		  
        try {		
			$imagen_documento_cuenta_pagarLogic->setConnexion($connexion);			
			$imagen_documento_cuenta_pagarLogic->setimagen_documento_cuenta_pagars($imagen_documento_cuenta_pagars);			
			$imagen_documento_cuenta_pagarLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$imagen_documento_cuenta_pagarsAux=array();
		
		foreach($this->imagen_documento_cuenta_pagars as $imagen_documento_cuenta_pagar) {
			if($imagen_documento_cuenta_pagar->getIsDeleted()==false) {
				$imagen_documento_cuenta_pagarsAux[]=$imagen_documento_cuenta_pagar;
			}
		}
		
		$this->imagen_documento_cuenta_pagars=$imagen_documento_cuenta_pagarsAux;
	}
	
	public function updateToGetsAuxiliar(array &$imagen_documento_cuenta_pagars) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->imagen_documento_cuenta_pagars as $imagen_documento_cuenta_pagar) {
				
				$imagen_documento_cuenta_pagar->setid_documento_cuenta_pagar_Descripcion(imagen_documento_cuenta_pagar_util::getdocumento_cuenta_pagarDescripcion($imagen_documento_cuenta_pagar->getdocumento_cuenta_pagar()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$imagen_documento_cuenta_pagar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$imagen_documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$imagen_documento_cuenta_pagar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$imagen_documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$imagen_documento_cuenta_pagar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$imagen_documento_cuenta_pagarForeignKey=new imagen_documento_cuenta_pagar_param_return();//imagen_documento_cuenta_pagarForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_documento_cuenta_pagar',$strRecargarFkTipos,',')) {
				$this->cargarCombosdocumento_cuenta_pagarsFK($this->connexion,$strRecargarFkQuery,$imagen_documento_cuenta_pagarForeignKey,$imagen_documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_documento_cuenta_pagar',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosdocumento_cuenta_pagarsFK($this->connexion,' where id=-1 ',$imagen_documento_cuenta_pagarForeignKey,$imagen_documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $imagen_documento_cuenta_pagarForeignKey;
			
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
	
	
	public function cargarCombosdocumento_cuenta_pagarsFK($connexion=null,$strRecargarFkQuery='',$imagen_documento_cuenta_pagarForeignKey,$imagen_documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$documento_cuenta_pagarLogic= new documento_cuenta_pagar_logic();
		$pagination= new Pagination();
		$imagen_documento_cuenta_pagarForeignKey->documento_cuenta_pagarsFK=array();

		$documento_cuenta_pagarLogic->setConnexion($connexion);
		$documento_cuenta_pagarLogic->getdocumento_cuenta_pagarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($imagen_documento_cuenta_pagar_session==null) {
			$imagen_documento_cuenta_pagar_session=new imagen_documento_cuenta_pagar_session();
		}
		
		if($imagen_documento_cuenta_pagar_session->bitBusquedaDesdeFKSesiondocumento_cuenta_pagar!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=documento_cuenta_pagar_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaldocumento_cuenta_pagar=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaldocumento_cuenta_pagar=Funciones::GetFinalQueryAppend($finalQueryGlobaldocumento_cuenta_pagar, '');
				$finalQueryGlobaldocumento_cuenta_pagar.=documento_cuenta_pagar_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaldocumento_cuenta_pagar.$strRecargarFkQuery;		

				$documento_cuenta_pagarLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($documento_cuenta_pagarLogic->getdocumento_cuenta_pagars() as $documento_cuenta_pagarLocal ) {
				if($imagen_documento_cuenta_pagarForeignKey->iddocumento_cuenta_pagarDefaultFK==0) {
					$imagen_documento_cuenta_pagarForeignKey->iddocumento_cuenta_pagarDefaultFK=$documento_cuenta_pagarLocal->getId();
				}

				$imagen_documento_cuenta_pagarForeignKey->documento_cuenta_pagarsFK[$documento_cuenta_pagarLocal->getId()]=imagen_documento_cuenta_pagar_util::getdocumento_cuenta_pagarDescripcion($documento_cuenta_pagarLocal);
			}

		} else {

			if($imagen_documento_cuenta_pagar_session->bigiddocumento_cuenta_pagarActual!=null && $imagen_documento_cuenta_pagar_session->bigiddocumento_cuenta_pagarActual > 0) {
				$documento_cuenta_pagarLogic->getEntity($imagen_documento_cuenta_pagar_session->bigiddocumento_cuenta_pagarActual);//WithConnection

				$imagen_documento_cuenta_pagarForeignKey->documento_cuenta_pagarsFK[$documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getId()]=imagen_documento_cuenta_pagar_util::getdocumento_cuenta_pagarDescripcion($documento_cuenta_pagarLogic->getdocumento_cuenta_pagar());
				$imagen_documento_cuenta_pagarForeignKey->iddocumento_cuenta_pagarDefaultFK=$documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($imagen_documento_cuenta_pagar) {
		$this->saveRelacionesBase($imagen_documento_cuenta_pagar,true);
	}

	public function saveRelaciones($imagen_documento_cuenta_pagar) {
		$this->saveRelacionesBase($imagen_documento_cuenta_pagar,false);
	}

	public function saveRelacionesBase($imagen_documento_cuenta_pagar,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setimagen_documento_cuenta_pagar($imagen_documento_cuenta_pagar);

			if(true) {

				//imagen_documento_cuenta_pagar_logic_add::updateRelacionesToSave($imagen_documento_cuenta_pagar,$this);

				if(($this->imagen_documento_cuenta_pagar->getIsNew() || $this->imagen_documento_cuenta_pagar->getIsChanged()) && !$this->imagen_documento_cuenta_pagar->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->imagen_documento_cuenta_pagar->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//imagen_documento_cuenta_pagar_logic_add::updateRelacionesToSaveAfter($imagen_documento_cuenta_pagar,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $imagen_documento_cuenta_pagars,imagen_documento_cuenta_pagar_param_return $imagen_documento_cuenta_pagarParameterGeneral) : imagen_documento_cuenta_pagar_param_return {
		$imagen_documento_cuenta_pagarReturnGeneral=new imagen_documento_cuenta_pagar_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $imagen_documento_cuenta_pagarReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $imagen_documento_cuenta_pagars,imagen_documento_cuenta_pagar_param_return $imagen_documento_cuenta_pagarParameterGeneral) : imagen_documento_cuenta_pagar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_documento_cuenta_pagarReturnGeneral=new imagen_documento_cuenta_pagar_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_documento_cuenta_pagarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_documento_cuenta_pagars,imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar,imagen_documento_cuenta_pagar_param_return $imagen_documento_cuenta_pagarParameterGeneral,bool $isEsNuevoimagen_documento_cuenta_pagar,array $clases) : imagen_documento_cuenta_pagar_param_return {
		 try {	
			$imagen_documento_cuenta_pagarReturnGeneral=new imagen_documento_cuenta_pagar_param_return();
	
			$imagen_documento_cuenta_pagarReturnGeneral->setimagen_documento_cuenta_pagar($imagen_documento_cuenta_pagar);
			$imagen_documento_cuenta_pagarReturnGeneral->setimagen_documento_cuenta_pagars($imagen_documento_cuenta_pagars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_documento_cuenta_pagarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $imagen_documento_cuenta_pagarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_documento_cuenta_pagars,imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar,imagen_documento_cuenta_pagar_param_return $imagen_documento_cuenta_pagarParameterGeneral,bool $isEsNuevoimagen_documento_cuenta_pagar,array $clases) : imagen_documento_cuenta_pagar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_documento_cuenta_pagarReturnGeneral=new imagen_documento_cuenta_pagar_param_return();
	
			$imagen_documento_cuenta_pagarReturnGeneral->setimagen_documento_cuenta_pagar($imagen_documento_cuenta_pagar);
			$imagen_documento_cuenta_pagarReturnGeneral->setimagen_documento_cuenta_pagars($imagen_documento_cuenta_pagars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_documento_cuenta_pagarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_documento_cuenta_pagarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_documento_cuenta_pagars,imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar,imagen_documento_cuenta_pagar_param_return $imagen_documento_cuenta_pagarParameterGeneral,bool $isEsNuevoimagen_documento_cuenta_pagar,array $clases) : imagen_documento_cuenta_pagar_param_return {
		 try {	
			$imagen_documento_cuenta_pagarReturnGeneral=new imagen_documento_cuenta_pagar_param_return();
	
			$imagen_documento_cuenta_pagarReturnGeneral->setimagen_documento_cuenta_pagar($imagen_documento_cuenta_pagar);
			$imagen_documento_cuenta_pagarReturnGeneral->setimagen_documento_cuenta_pagars($imagen_documento_cuenta_pagars);
			
			
			
			return $imagen_documento_cuenta_pagarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_documento_cuenta_pagars,imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar,imagen_documento_cuenta_pagar_param_return $imagen_documento_cuenta_pagarParameterGeneral,bool $isEsNuevoimagen_documento_cuenta_pagar,array $clases) : imagen_documento_cuenta_pagar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_documento_cuenta_pagarReturnGeneral=new imagen_documento_cuenta_pagar_param_return();
	
			$imagen_documento_cuenta_pagarReturnGeneral->setimagen_documento_cuenta_pagar($imagen_documento_cuenta_pagar);
			$imagen_documento_cuenta_pagarReturnGeneral->setimagen_documento_cuenta_pagars($imagen_documento_cuenta_pagars);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_documento_cuenta_pagarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		imagen_documento_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//imagen_documento_cuenta_pagar_logic_add::updateimagen_documento_cuenta_pagarToGet($this->imagen_documento_cuenta_pagar);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$imagen_documento_cuenta_pagar->setdocumento_cuenta_pagar($this->imagen_documento_cuenta_pagarDataAccess->getdocumento_cuenta_pagar($this->connexion,$imagen_documento_cuenta_pagar));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_pagar::$class.'') {
				$imagen_documento_cuenta_pagar->setdocumento_cuenta_pagar($this->imagen_documento_cuenta_pagarDataAccess->getdocumento_cuenta_pagar($this->connexion,$imagen_documento_cuenta_pagar));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$imagen_documento_cuenta_pagar->setdocumento_cuenta_pagar($this->imagen_documento_cuenta_pagarDataAccess->getdocumento_cuenta_pagar($this->connexion,$imagen_documento_cuenta_pagar));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$imagen_documento_cuenta_pagar->setdocumento_cuenta_pagar($this->imagen_documento_cuenta_pagarDataAccess->getdocumento_cuenta_pagar($this->connexion,$imagen_documento_cuenta_pagar));
		$documento_cuenta_pagarLogic= new documento_cuenta_pagar_logic($this->connexion);
		$documento_cuenta_pagarLogic->deepLoad($imagen_documento_cuenta_pagar->getdocumento_cuenta_pagar(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_pagar::$class.'') {
				$imagen_documento_cuenta_pagar->setdocumento_cuenta_pagar($this->imagen_documento_cuenta_pagarDataAccess->getdocumento_cuenta_pagar($this->connexion,$imagen_documento_cuenta_pagar));
				$documento_cuenta_pagarLogic= new documento_cuenta_pagar_logic($this->connexion);
				$documento_cuenta_pagarLogic->deepLoad($imagen_documento_cuenta_pagar->getdocumento_cuenta_pagar(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$imagen_documento_cuenta_pagar->setdocumento_cuenta_pagar($this->imagen_documento_cuenta_pagarDataAccess->getdocumento_cuenta_pagar($this->connexion,$imagen_documento_cuenta_pagar));
			$documento_cuenta_pagarLogic= new documento_cuenta_pagar_logic($this->connexion);
			$documento_cuenta_pagarLogic->deepLoad($imagen_documento_cuenta_pagar->getdocumento_cuenta_pagar(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//imagen_documento_cuenta_pagar_logic_add::updateimagen_documento_cuenta_pagarToSave($this->imagen_documento_cuenta_pagar);			
			
			if(!$paraDeleteCascade) {				
				imagen_documento_cuenta_pagar_data::save($imagen_documento_cuenta_pagar, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		documento_cuenta_pagar_data::save($imagen_documento_cuenta_pagar->getdocumento_cuenta_pagar(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_pagar::$class.'') {
				documento_cuenta_pagar_data::save($imagen_documento_cuenta_pagar->getdocumento_cuenta_pagar(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			documento_cuenta_pagar_data::save($imagen_documento_cuenta_pagar->getdocumento_cuenta_pagar(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		documento_cuenta_pagar_data::save($imagen_documento_cuenta_pagar->getdocumento_cuenta_pagar(),$this->connexion);
		$documento_cuenta_pagarLogic= new documento_cuenta_pagar_logic($this->connexion);
		$documento_cuenta_pagarLogic->deepSave($imagen_documento_cuenta_pagar->getdocumento_cuenta_pagar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_pagar::$class.'') {
				documento_cuenta_pagar_data::save($imagen_documento_cuenta_pagar->getdocumento_cuenta_pagar(),$this->connexion);
				$documento_cuenta_pagarLogic= new documento_cuenta_pagar_logic($this->connexion);
				$documento_cuenta_pagarLogic->deepSave($imagen_documento_cuenta_pagar->getdocumento_cuenta_pagar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			documento_cuenta_pagar_data::save($imagen_documento_cuenta_pagar->getdocumento_cuenta_pagar(),$this->connexion);
			$documento_cuenta_pagarLogic= new documento_cuenta_pagar_logic($this->connexion);
			$documento_cuenta_pagarLogic->deepSave($imagen_documento_cuenta_pagar->getdocumento_cuenta_pagar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				imagen_documento_cuenta_pagar_data::save($imagen_documento_cuenta_pagar, $this->connexion);
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
			
			$this->deepLoad($this->imagen_documento_cuenta_pagar,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->imagen_documento_cuenta_pagars as $imagen_documento_cuenta_pagar) {
				$this->deepLoad($imagen_documento_cuenta_pagar,$isDeep,$deepLoadType,$clases);
								
				imagen_documento_cuenta_pagar_util::refrescarFKDescripciones($this->imagen_documento_cuenta_pagars);
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
			
			foreach($this->imagen_documento_cuenta_pagars as $imagen_documento_cuenta_pagar) {
				$this->deepLoad($imagen_documento_cuenta_pagar,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->imagen_documento_cuenta_pagar,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->imagen_documento_cuenta_pagars as $imagen_documento_cuenta_pagar) {
				$this->deepSave($imagen_documento_cuenta_pagar,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->imagen_documento_cuenta_pagars as $imagen_documento_cuenta_pagar) {
				$this->deepSave($imagen_documento_cuenta_pagar,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(documento_cuenta_pagar::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==documento_cuenta_pagar::$class) {
						$classes[]=new Classe(documento_cuenta_pagar::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==documento_cuenta_pagar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(documento_cuenta_pagar::$class);
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
	
	
	
	
	
	
	
	public function getimagen_documento_cuenta_pagar() : ?imagen_documento_cuenta_pagar {	
		/*
		imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToGet($this->imagen_documento_cuenta_pagar,$this->datosCliente);
		imagen_documento_cuenta_pagar_logic_add::updateimagen_documento_cuenta_pagarToGet($this->imagen_documento_cuenta_pagar);
		*/
			
		return $this->imagen_documento_cuenta_pagar;
	}
		
	public function setimagen_documento_cuenta_pagar(imagen_documento_cuenta_pagar $newimagen_documento_cuenta_pagar) {
		$this->imagen_documento_cuenta_pagar = $newimagen_documento_cuenta_pagar;
	}
	
	public function getimagen_documento_cuenta_pagars() : array {		
		/*
		imagen_documento_cuenta_pagar_logic_add::checkimagen_documento_cuenta_pagarToGets($this->imagen_documento_cuenta_pagars,$this->datosCliente);
		
		foreach ($this->imagen_documento_cuenta_pagars as $imagen_documento_cuenta_pagarLocal ) {
			imagen_documento_cuenta_pagar_logic_add::updateimagen_documento_cuenta_pagarToGet($imagen_documento_cuenta_pagarLocal);
		}
		*/
		
		return $this->imagen_documento_cuenta_pagars;
	}
	
	public function setimagen_documento_cuenta_pagars(array $newimagen_documento_cuenta_pagars) {
		$this->imagen_documento_cuenta_pagars = $newimagen_documento_cuenta_pagars;
	}
	
	public function getimagen_documento_cuenta_pagarDataAccess() : imagen_documento_cuenta_pagar_data {
		return $this->imagen_documento_cuenta_pagarDataAccess;
	}
	
	public function setimagen_documento_cuenta_pagarDataAccess(imagen_documento_cuenta_pagar_data $newimagen_documento_cuenta_pagarDataAccess) {
		$this->imagen_documento_cuenta_pagarDataAccess = $newimagen_documento_cuenta_pagarDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        imagen_documento_cuenta_pagar_carga::$CONTROLLER;;        
		
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
