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

namespace com\bydan\contabilidad\cuentaspagar\parametro_cuenta_pagar\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentaspagar\parametro_cuenta_pagar\util\parametro_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\parametro_cuenta_pagar\util\parametro_cuenta_pagar_param_return;

use com\bydan\contabilidad\cuentaspagar\parametro_cuenta_pagar\presentation\session\parametro_cuenta_pagar_session;

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

use com\bydan\contabilidad\cuentaspagar\parametro_cuenta_pagar\util\parametro_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\parametro_cuenta_pagar\business\entity\parametro_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\parametro_cuenta_pagar\business\data\parametro_cuenta_pagar_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL


//REL DETALLES




class parametro_cuenta_pagar_logic  extends GeneralEntityLogic implements parametro_cuenta_pagar_logicI {	
	/*GENERAL*/
	public parametro_cuenta_pagar_data $parametro_cuenta_pagarDataAccess;
	//public ?parametro_cuenta_pagar_logic_add $parametro_cuenta_pagarLogicAdditional=null;
	public ?parametro_cuenta_pagar $parametro_cuenta_pagar;
	public array $parametro_cuenta_pagars;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->parametro_cuenta_pagarDataAccess = new parametro_cuenta_pagar_data();			
			$this->parametro_cuenta_pagars = array();
			$this->parametro_cuenta_pagar = new parametro_cuenta_pagar();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->parametro_cuenta_pagarLogicAdditional = new parametro_cuenta_pagar_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->parametro_cuenta_pagarLogicAdditional==null) {
		//	$this->parametro_cuenta_pagarLogicAdditional=new parametro_cuenta_pagar_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->parametro_cuenta_pagarDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->parametro_cuenta_pagarDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->parametro_cuenta_pagarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->parametro_cuenta_pagarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->parametro_cuenta_pagars = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_cuenta_pagars=$this->parametro_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_pagar_util::refrescarFKDescripciones($this->parametro_cuenta_pagars);
			}
			
			//parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToGets($this->parametro_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_cuenta_pagars);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->parametro_cuenta_pagars = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_cuenta_pagars=$this->parametro_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_pagar_util::refrescarFKDescripciones($this->parametro_cuenta_pagars);
			}
			
			//parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToGets($this->parametro_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_cuenta_pagars);
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
		$this->parametro_cuenta_pagar = new parametro_cuenta_pagar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->parametro_cuenta_pagar=$this->parametro_cuenta_pagarDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_cuenta_pagar_util::refrescarFKDescripcion($this->parametro_cuenta_pagar);
			}
						
			//parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToGet($this->parametro_cuenta_pagar,$this->datosCliente);
			//parametro_cuenta_pagar_logic_add::updateparametro_cuenta_pagarToGet($this->parametro_cuenta_pagar);
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
		$this->parametro_cuenta_pagar = new  parametro_cuenta_pagar();
		  		  
        try {		
			$this->parametro_cuenta_pagar=$this->parametro_cuenta_pagarDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_cuenta_pagar_util::refrescarFKDescripcion($this->parametro_cuenta_pagar);
			}
			
			//parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToGet($this->parametro_cuenta_pagar,$this->datosCliente);
			//parametro_cuenta_pagar_logic_add::updateparametro_cuenta_pagarToGet($this->parametro_cuenta_pagar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?parametro_cuenta_pagar {
		$parametro_cuenta_pagarLogic = new  parametro_cuenta_pagar_logic();
		  		  
        try {		
			$parametro_cuenta_pagarLogic->setConnexion($connexion);			
			$parametro_cuenta_pagarLogic->getEntity($id);			
			return $parametro_cuenta_pagarLogic->getparametro_cuenta_pagar();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->parametro_cuenta_pagar = new  parametro_cuenta_pagar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->parametro_cuenta_pagar=$this->parametro_cuenta_pagarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_cuenta_pagar_util::refrescarFKDescripcion($this->parametro_cuenta_pagar);
			}
			
			//parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToGet($this->parametro_cuenta_pagar,$this->datosCliente);
			//parametro_cuenta_pagar_logic_add::updateparametro_cuenta_pagarToGet($this->parametro_cuenta_pagar);
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
		$this->parametro_cuenta_pagar = new  parametro_cuenta_pagar();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_cuenta_pagar=$this->parametro_cuenta_pagarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_cuenta_pagar_util::refrescarFKDescripcion($this->parametro_cuenta_pagar);
			}
			
			//parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToGet($this->parametro_cuenta_pagar,$this->datosCliente);
			//parametro_cuenta_pagar_logic_add::updateparametro_cuenta_pagarToGet($this->parametro_cuenta_pagar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?parametro_cuenta_pagar {
		$parametro_cuenta_pagarLogic = new  parametro_cuenta_pagar_logic();
		  		  
        try {		
			$parametro_cuenta_pagarLogic->setConnexion($connexion);			
			$parametro_cuenta_pagarLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $parametro_cuenta_pagarLogic->getparametro_cuenta_pagar();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->parametro_cuenta_pagars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_cuenta_pagars=$this->parametro_cuenta_pagarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_pagar_util::refrescarFKDescripciones($this->parametro_cuenta_pagars);
			}
			
			//parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToGets($this->parametro_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_cuenta_pagars);			
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
		$this->parametro_cuenta_pagars = array();
		  		  
        try {			
			$this->parametro_cuenta_pagars=$this->parametro_cuenta_pagarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_pagar_util::refrescarFKDescripciones($this->parametro_cuenta_pagars);
			}
			
			//parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToGets($this->parametro_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_cuenta_pagars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->parametro_cuenta_pagars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_cuenta_pagars=$this->parametro_cuenta_pagarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_pagar_util::refrescarFKDescripciones($this->parametro_cuenta_pagars);
			}
			
			//parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToGets($this->parametro_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_cuenta_pagars);
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
		$this->parametro_cuenta_pagars = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_cuenta_pagars=$this->parametro_cuenta_pagarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_pagar_util::refrescarFKDescripciones($this->parametro_cuenta_pagars);
			}
			
			//parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToGets($this->parametro_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_cuenta_pagars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$parametro_cuenta_pagarLogic = new  parametro_cuenta_pagar_logic();
		  		  
        try {		
			$parametro_cuenta_pagarLogic->setConnexion($connexion);			
			$parametro_cuenta_pagarLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $parametro_cuenta_pagarLogic->getparametro_cuenta_pagars();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->parametro_cuenta_pagars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_cuenta_pagars=$this->parametro_cuenta_pagarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_pagar_util::refrescarFKDescripciones($this->parametro_cuenta_pagars);
			}
			
			//parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToGets($this->parametro_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_cuenta_pagars);
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
		$this->parametro_cuenta_pagars = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_cuenta_pagars=$this->parametro_cuenta_pagarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_pagar_util::refrescarFKDescripciones($this->parametro_cuenta_pagars);
			}
			
			//parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToGets($this->parametro_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_cuenta_pagars);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->parametro_cuenta_pagars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_cuenta_pagars=$this->parametro_cuenta_pagarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_pagar_util::refrescarFKDescripciones($this->parametro_cuenta_pagars);
			}
			
			//parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToGets($this->parametro_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_cuenta_pagars);
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
		$this->parametro_cuenta_pagars = array();
		  		  
        try {			
			$this->parametro_cuenta_pagars=$this->parametro_cuenta_pagarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_pagar_util::refrescarFKDescripciones($this->parametro_cuenta_pagars);
			}	
			
			//parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToGets($this->parametro_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_cuenta_pagars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->parametro_cuenta_pagars = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_cuenta_pagars=$this->parametro_cuenta_pagarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_pagar_util::refrescarFKDescripciones($this->parametro_cuenta_pagars);
			}
			
			//parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToGets($this->parametro_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_cuenta_pagars);
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
		$this->parametro_cuenta_pagars = array();
		  		  
        try {		
			$this->parametro_cuenta_pagars=$this->parametro_cuenta_pagarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_pagar_util::refrescarFKDescripciones($this->parametro_cuenta_pagars);
			}
			
			//parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToGets($this->parametro_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_cuenta_pagars);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,parametro_cuenta_pagar_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->parametro_cuenta_pagars=$this->parametro_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_cuenta_pagar_util::refrescarFKDescripciones($this->parametro_cuenta_pagars);
			}
			//parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToGets($this->parametro_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_cuenta_pagars);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,parametro_cuenta_pagar_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->parametro_cuenta_pagars=$this->parametro_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_cuenta_pagar_util::refrescarFKDescripciones($this->parametro_cuenta_pagars);
			}
			//parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToGets($this->parametro_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_cuenta_pagars);
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
						
			//parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToSave($this->parametro_cuenta_pagar,$this->datosCliente,$this->connexion);	       
			//parametro_cuenta_pagar_logic_add::updateparametro_cuenta_pagarToSave($this->parametro_cuenta_pagar);			
			parametro_cuenta_pagar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->parametro_cuenta_pagar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->parametro_cuenta_pagarLogicAdditional->checkGeneralEntityToSave($this,$this->parametro_cuenta_pagar,$this->datosCliente,$this->connexion);
			
			
			parametro_cuenta_pagar_data::save($this->parametro_cuenta_pagar, $this->connexion);	    	       	 				
			//parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToSaveAfter($this->parametro_cuenta_pagar,$this->datosCliente,$this->connexion);			
			//$this->parametro_cuenta_pagarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->parametro_cuenta_pagar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->parametro_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->parametro_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				parametro_cuenta_pagar_util::refrescarFKDescripcion($this->parametro_cuenta_pagar);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->parametro_cuenta_pagar->getIsDeleted()) {
				$this->parametro_cuenta_pagar=null;
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
						
			/*parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToSave($this->parametro_cuenta_pagar,$this->datosCliente,$this->connexion);*/	        
			//parametro_cuenta_pagar_logic_add::updateparametro_cuenta_pagarToSave($this->parametro_cuenta_pagar);			
			//$this->parametro_cuenta_pagarLogicAdditional->checkGeneralEntityToSave($this,$this->parametro_cuenta_pagar,$this->datosCliente,$this->connexion);			
			parametro_cuenta_pagar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->parametro_cuenta_pagar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			parametro_cuenta_pagar_data::save($this->parametro_cuenta_pagar, $this->connexion);	    	       	 						
			/*parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToSaveAfter($this->parametro_cuenta_pagar,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_cuenta_pagarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->parametro_cuenta_pagar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->parametro_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->parametro_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				parametro_cuenta_pagar_util::refrescarFKDescripcion($this->parametro_cuenta_pagar);				
			}
			
			if($this->parametro_cuenta_pagar->getIsDeleted()) {
				$this->parametro_cuenta_pagar=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(parametro_cuenta_pagar $parametro_cuenta_pagar,Connexion $connexion)  {
		$parametro_cuenta_pagarLogic = new  parametro_cuenta_pagar_logic();		  		  
        try {		
			$parametro_cuenta_pagarLogic->setConnexion($connexion);			
			$parametro_cuenta_pagarLogic->setparametro_cuenta_pagar($parametro_cuenta_pagar);			
			$parametro_cuenta_pagarLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToSaves($this->parametro_cuenta_pagars,$this->datosCliente,$this->connexion);*/	        	
			//$this->parametro_cuenta_pagarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->parametro_cuenta_pagars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->parametro_cuenta_pagars as $parametro_cuenta_pagarLocal) {				
								
				//parametro_cuenta_pagar_logic_add::updateparametro_cuenta_pagarToSave($parametro_cuenta_pagarLocal);	        	
				parametro_cuenta_pagar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$parametro_cuenta_pagarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				parametro_cuenta_pagar_data::save($parametro_cuenta_pagarLocal, $this->connexion);				
			}
			
			/*parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToSavesAfter($this->parametro_cuenta_pagars,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_cuenta_pagarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->parametro_cuenta_pagars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_pagar_util::refrescarFKDescripciones($this->parametro_cuenta_pagars);
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
			/*parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToSaves($this->parametro_cuenta_pagars,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_cuenta_pagarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->parametro_cuenta_pagars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->parametro_cuenta_pagars as $parametro_cuenta_pagarLocal) {				
								
				//parametro_cuenta_pagar_logic_add::updateparametro_cuenta_pagarToSave($parametro_cuenta_pagarLocal);	        	
				parametro_cuenta_pagar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$parametro_cuenta_pagarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				parametro_cuenta_pagar_data::save($parametro_cuenta_pagarLocal, $this->connexion);				
			}			
			
			/*parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToSavesAfter($this->parametro_cuenta_pagars,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_cuenta_pagarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->parametro_cuenta_pagars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_pagar_util::refrescarFKDescripciones($this->parametro_cuenta_pagars);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $parametro_cuenta_pagars,Connexion $connexion)  {
		$parametro_cuenta_pagarLogic = new  parametro_cuenta_pagar_logic();
		  		  
        try {		
			$parametro_cuenta_pagarLogic->setConnexion($connexion);			
			$parametro_cuenta_pagarLogic->setparametro_cuenta_pagars($parametro_cuenta_pagars);			
			$parametro_cuenta_pagarLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$parametro_cuenta_pagarsAux=array();
		
		foreach($this->parametro_cuenta_pagars as $parametro_cuenta_pagar) {
			if($parametro_cuenta_pagar->getIsDeleted()==false) {
				$parametro_cuenta_pagarsAux[]=$parametro_cuenta_pagar;
			}
		}
		
		$this->parametro_cuenta_pagars=$parametro_cuenta_pagarsAux;
	}
	
	public function updateToGetsAuxiliar(array &$parametro_cuenta_pagars) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->parametro_cuenta_pagars as $parametro_cuenta_pagar) {
				
				$parametro_cuenta_pagar->setid_empresa_Descripcion(parametro_cuenta_pagar_util::getempresaDescripcion($parametro_cuenta_pagar->getempresa()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$parametro_cuenta_pagar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$parametro_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$parametro_cuenta_pagar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$parametro_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$parametro_cuenta_pagar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$parametro_cuenta_pagarForeignKey=new parametro_cuenta_pagar_param_return();//parametro_cuenta_pagarForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$parametro_cuenta_pagarForeignKey,$parametro_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$parametro_cuenta_pagarForeignKey,$parametro_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $parametro_cuenta_pagarForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$parametro_cuenta_pagarForeignKey,$parametro_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$parametro_cuenta_pagarForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($parametro_cuenta_pagar_session==null) {
			$parametro_cuenta_pagar_session=new parametro_cuenta_pagar_session();
		}
		
		if($parametro_cuenta_pagar_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($parametro_cuenta_pagarForeignKey->idempresaDefaultFK==0) {
					$parametro_cuenta_pagarForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$parametro_cuenta_pagarForeignKey->empresasFK[$empresaLocal->getId()]=parametro_cuenta_pagar_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($parametro_cuenta_pagar_session->bigidempresaActual!=null && $parametro_cuenta_pagar_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($parametro_cuenta_pagar_session->bigidempresaActual);//WithConnection

				$parametro_cuenta_pagarForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=parametro_cuenta_pagar_util::getempresaDescripcion($empresaLogic->getempresa());
				$parametro_cuenta_pagarForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($parametro_cuenta_pagar) {
		$this->saveRelacionesBase($parametro_cuenta_pagar,true);
	}

	public function saveRelaciones($parametro_cuenta_pagar) {
		$this->saveRelacionesBase($parametro_cuenta_pagar,false);
	}

	public function saveRelacionesBase($parametro_cuenta_pagar,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setparametro_cuenta_pagar($parametro_cuenta_pagar);

			if(true) {

				//parametro_cuenta_pagar_logic_add::updateRelacionesToSave($parametro_cuenta_pagar,$this);

				if(($this->parametro_cuenta_pagar->getIsNew() || $this->parametro_cuenta_pagar->getIsChanged()) && !$this->parametro_cuenta_pagar->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->parametro_cuenta_pagar->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//parametro_cuenta_pagar_logic_add::updateRelacionesToSaveAfter($parametro_cuenta_pagar,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $parametro_cuenta_pagars,parametro_cuenta_pagar_param_return $parametro_cuenta_pagarParameterGeneral) : parametro_cuenta_pagar_param_return {
		$parametro_cuenta_pagarReturnGeneral=new parametro_cuenta_pagar_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $parametro_cuenta_pagarReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $parametro_cuenta_pagars,parametro_cuenta_pagar_param_return $parametro_cuenta_pagarParameterGeneral) : parametro_cuenta_pagar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_cuenta_pagarReturnGeneral=new parametro_cuenta_pagar_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_cuenta_pagarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_cuenta_pagars,parametro_cuenta_pagar $parametro_cuenta_pagar,parametro_cuenta_pagar_param_return $parametro_cuenta_pagarParameterGeneral,bool $isEsNuevoparametro_cuenta_pagar,array $clases) : parametro_cuenta_pagar_param_return {
		 try {	
			$parametro_cuenta_pagarReturnGeneral=new parametro_cuenta_pagar_param_return();
	
			$parametro_cuenta_pagarReturnGeneral->setparametro_cuenta_pagar($parametro_cuenta_pagar);
			$parametro_cuenta_pagarReturnGeneral->setparametro_cuenta_pagars($parametro_cuenta_pagars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$parametro_cuenta_pagarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $parametro_cuenta_pagarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_cuenta_pagars,parametro_cuenta_pagar $parametro_cuenta_pagar,parametro_cuenta_pagar_param_return $parametro_cuenta_pagarParameterGeneral,bool $isEsNuevoparametro_cuenta_pagar,array $clases) : parametro_cuenta_pagar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_cuenta_pagarReturnGeneral=new parametro_cuenta_pagar_param_return();
	
			$parametro_cuenta_pagarReturnGeneral->setparametro_cuenta_pagar($parametro_cuenta_pagar);
			$parametro_cuenta_pagarReturnGeneral->setparametro_cuenta_pagars($parametro_cuenta_pagars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$parametro_cuenta_pagarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_cuenta_pagarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_cuenta_pagars,parametro_cuenta_pagar $parametro_cuenta_pagar,parametro_cuenta_pagar_param_return $parametro_cuenta_pagarParameterGeneral,bool $isEsNuevoparametro_cuenta_pagar,array $clases) : parametro_cuenta_pagar_param_return {
		 try {	
			$parametro_cuenta_pagarReturnGeneral=new parametro_cuenta_pagar_param_return();
	
			$parametro_cuenta_pagarReturnGeneral->setparametro_cuenta_pagar($parametro_cuenta_pagar);
			$parametro_cuenta_pagarReturnGeneral->setparametro_cuenta_pagars($parametro_cuenta_pagars);
			
			
			
			return $parametro_cuenta_pagarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_cuenta_pagars,parametro_cuenta_pagar $parametro_cuenta_pagar,parametro_cuenta_pagar_param_return $parametro_cuenta_pagarParameterGeneral,bool $isEsNuevoparametro_cuenta_pagar,array $clases) : parametro_cuenta_pagar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_cuenta_pagarReturnGeneral=new parametro_cuenta_pagar_param_return();
	
			$parametro_cuenta_pagarReturnGeneral->setparametro_cuenta_pagar($parametro_cuenta_pagar);
			$parametro_cuenta_pagarReturnGeneral->setparametro_cuenta_pagars($parametro_cuenta_pagars);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_cuenta_pagarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,parametro_cuenta_pagar $parametro_cuenta_pagar,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,parametro_cuenta_pagar $parametro_cuenta_pagar,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		parametro_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(parametro_cuenta_pagar $parametro_cuenta_pagar,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//parametro_cuenta_pagar_logic_add::updateparametro_cuenta_pagarToGet($this->parametro_cuenta_pagar);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$parametro_cuenta_pagar->setempresa($this->parametro_cuenta_pagarDataAccess->getempresa($this->connexion,$parametro_cuenta_pagar));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$parametro_cuenta_pagar->setempresa($this->parametro_cuenta_pagarDataAccess->getempresa($this->connexion,$parametro_cuenta_pagar));
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
			$parametro_cuenta_pagar->setempresa($this->parametro_cuenta_pagarDataAccess->getempresa($this->connexion,$parametro_cuenta_pagar));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$parametro_cuenta_pagar->setempresa($this->parametro_cuenta_pagarDataAccess->getempresa($this->connexion,$parametro_cuenta_pagar));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($parametro_cuenta_pagar->getempresa(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$parametro_cuenta_pagar->setempresa($this->parametro_cuenta_pagarDataAccess->getempresa($this->connexion,$parametro_cuenta_pagar));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($parametro_cuenta_pagar->getempresa(),$isDeep,$deepLoadType,$clases);				
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
			$parametro_cuenta_pagar->setempresa($this->parametro_cuenta_pagarDataAccess->getempresa($this->connexion,$parametro_cuenta_pagar));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($parametro_cuenta_pagar->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(parametro_cuenta_pagar $parametro_cuenta_pagar,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//parametro_cuenta_pagar_logic_add::updateparametro_cuenta_pagarToSave($this->parametro_cuenta_pagar);			
			
			if(!$paraDeleteCascade) {				
				parametro_cuenta_pagar_data::save($parametro_cuenta_pagar, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($parametro_cuenta_pagar->getempresa(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($parametro_cuenta_pagar->getempresa(),$this->connexion);
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
			empresa_data::save($parametro_cuenta_pagar->getempresa(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($parametro_cuenta_pagar->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($parametro_cuenta_pagar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($parametro_cuenta_pagar->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($parametro_cuenta_pagar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
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
			empresa_data::save($parametro_cuenta_pagar->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($parametro_cuenta_pagar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				parametro_cuenta_pagar_data::save($parametro_cuenta_pagar, $this->connexion);
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
			
			$this->deepLoad($this->parametro_cuenta_pagar,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->parametro_cuenta_pagars as $parametro_cuenta_pagar) {
				$this->deepLoad($parametro_cuenta_pagar,$isDeep,$deepLoadType,$clases);
								
				parametro_cuenta_pagar_util::refrescarFKDescripciones($this->parametro_cuenta_pagars);
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
			
			foreach($this->parametro_cuenta_pagars as $parametro_cuenta_pagar) {
				$this->deepLoad($parametro_cuenta_pagar,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->parametro_cuenta_pagar,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->parametro_cuenta_pagars as $parametro_cuenta_pagar) {
				$this->deepSave($parametro_cuenta_pagar,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->parametro_cuenta_pagars as $parametro_cuenta_pagar) {
				$this->deepSave($parametro_cuenta_pagar,$isDeep,$deepLoadType,$clases,false);
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
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
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
	
	
	
	
	
	
	
	public function getparametro_cuenta_pagar() : ?parametro_cuenta_pagar {	
		/*
		parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToGet($this->parametro_cuenta_pagar,$this->datosCliente);
		parametro_cuenta_pagar_logic_add::updateparametro_cuenta_pagarToGet($this->parametro_cuenta_pagar);
		*/
			
		return $this->parametro_cuenta_pagar;
	}
		
	public function setparametro_cuenta_pagar(parametro_cuenta_pagar $newparametro_cuenta_pagar) {
		$this->parametro_cuenta_pagar = $newparametro_cuenta_pagar;
	}
	
	public function getparametro_cuenta_pagars() : array {		
		/*
		parametro_cuenta_pagar_logic_add::checkparametro_cuenta_pagarToGets($this->parametro_cuenta_pagars,$this->datosCliente);
		
		foreach ($this->parametro_cuenta_pagars as $parametro_cuenta_pagarLocal ) {
			parametro_cuenta_pagar_logic_add::updateparametro_cuenta_pagarToGet($parametro_cuenta_pagarLocal);
		}
		*/
		
		return $this->parametro_cuenta_pagars;
	}
	
	public function setparametro_cuenta_pagars(array $newparametro_cuenta_pagars) {
		$this->parametro_cuenta_pagars = $newparametro_cuenta_pagars;
	}
	
	public function getparametro_cuenta_pagarDataAccess() : parametro_cuenta_pagar_data {
		return $this->parametro_cuenta_pagarDataAccess;
	}
	
	public function setparametro_cuenta_pagarDataAccess(parametro_cuenta_pagar_data $newparametro_cuenta_pagarDataAccess) {
		$this->parametro_cuenta_pagarDataAccess = $newparametro_cuenta_pagarDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        parametro_cuenta_pagar_carga::$CONTROLLER;;        
		
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
