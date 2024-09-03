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

namespace com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\util\estado_cuentas_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\util\estado_cuentas_pagar_param_return;


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

use com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\util\estado_cuentas_pagar_util;
use com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\business\entity\estado_cuentas_pagar;
use com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\business\data\estado_cuentas_pagar_data;

//FK


//REL


use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\entity\cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\data\cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\logic\cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_util;

//REL DETALLES

use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\util\debito_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_carga;



class estado_cuentas_pagar_logic  extends GeneralEntityLogic implements estado_cuentas_pagar_logicI {	
	/*GENERAL*/
	public estado_cuentas_pagar_data $estado_cuentas_pagarDataAccess;
	public ?estado_cuentas_pagar_logic_add $estado_cuentas_pagarLogicAdditional=null;
	public ?estado_cuentas_pagar $estado_cuentas_pagar;
	public array $estado_cuentas_pagars;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->estado_cuentas_pagarDataAccess = new estado_cuentas_pagar_data();			
			$this->estado_cuentas_pagars = array();
			$this->estado_cuentas_pagar = new estado_cuentas_pagar();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->estado_cuentas_pagarLogicAdditional = new estado_cuentas_pagar_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->estado_cuentas_pagarLogicAdditional==null) {
			$this->estado_cuentas_pagarLogicAdditional=new estado_cuentas_pagar_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->estado_cuentas_pagarDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->estado_cuentas_pagarDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->estado_cuentas_pagarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->estado_cuentas_pagarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->estado_cuentas_pagars = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_cuentas_pagars=$this->estado_cuentas_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_pagar_util::refrescarFKDescripciones($this->estado_cuentas_pagars);
			}
			
			estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToGets($this->estado_cuentas_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_pagars);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->estado_cuentas_pagars = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_cuentas_pagars=$this->estado_cuentas_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_pagar_util::refrescarFKDescripciones($this->estado_cuentas_pagars);
			}
			
			estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToGets($this->estado_cuentas_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_pagars);
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
		$this->estado_cuentas_pagar = new estado_cuentas_pagar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->estado_cuentas_pagar=$this->estado_cuentas_pagarDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->estado_cuentas_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estado_cuentas_pagar_util::refrescarFKDescripcion($this->estado_cuentas_pagar);
			}
						
			estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToGet($this->estado_cuentas_pagar,$this->datosCliente);
			estado_cuentas_pagar_logic_add::updateestado_cuentas_pagarToGet($this->estado_cuentas_pagar);
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
		$this->estado_cuentas_pagar = new  estado_cuentas_pagar();
		  		  
        try {		
			$this->estado_cuentas_pagar=$this->estado_cuentas_pagarDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->estado_cuentas_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estado_cuentas_pagar_util::refrescarFKDescripcion($this->estado_cuentas_pagar);
			}
			
			estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToGet($this->estado_cuentas_pagar,$this->datosCliente);
			estado_cuentas_pagar_logic_add::updateestado_cuentas_pagarToGet($this->estado_cuentas_pagar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?estado_cuentas_pagar {
		$estado_cuentas_pagarLogic = new  estado_cuentas_pagar_logic();
		  		  
        try {		
			$estado_cuentas_pagarLogic->setConnexion($connexion);			
			$estado_cuentas_pagarLogic->getEntity($id);			
			return $estado_cuentas_pagarLogic->getestado_cuentas_pagar();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->estado_cuentas_pagar = new  estado_cuentas_pagar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->estado_cuentas_pagar=$this->estado_cuentas_pagarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->estado_cuentas_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estado_cuentas_pagar_util::refrescarFKDescripcion($this->estado_cuentas_pagar);
			}
			
			estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToGet($this->estado_cuentas_pagar,$this->datosCliente);
			estado_cuentas_pagar_logic_add::updateestado_cuentas_pagarToGet($this->estado_cuentas_pagar);
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
		$this->estado_cuentas_pagar = new  estado_cuentas_pagar();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_cuentas_pagar=$this->estado_cuentas_pagarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->estado_cuentas_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estado_cuentas_pagar_util::refrescarFKDescripcion($this->estado_cuentas_pagar);
			}
			
			estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToGet($this->estado_cuentas_pagar,$this->datosCliente);
			estado_cuentas_pagar_logic_add::updateestado_cuentas_pagarToGet($this->estado_cuentas_pagar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?estado_cuentas_pagar {
		$estado_cuentas_pagarLogic = new  estado_cuentas_pagar_logic();
		  		  
        try {		
			$estado_cuentas_pagarLogic->setConnexion($connexion);			
			$estado_cuentas_pagarLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $estado_cuentas_pagarLogic->getestado_cuentas_pagar();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->estado_cuentas_pagars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->estado_cuentas_pagars=$this->estado_cuentas_pagarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_pagar_util::refrescarFKDescripciones($this->estado_cuentas_pagars);
			}
			
			estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToGets($this->estado_cuentas_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_pagars);			
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
		$this->estado_cuentas_pagars = array();
		  		  
        try {			
			$this->estado_cuentas_pagars=$this->estado_cuentas_pagarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_pagar_util::refrescarFKDescripciones($this->estado_cuentas_pagars);
			}
			
			estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToGets($this->estado_cuentas_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_pagars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->estado_cuentas_pagars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_cuentas_pagars=$this->estado_cuentas_pagarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_pagar_util::refrescarFKDescripciones($this->estado_cuentas_pagars);
			}
			
			estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToGets($this->estado_cuentas_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_pagars);
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
		$this->estado_cuentas_pagars = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_cuentas_pagars=$this->estado_cuentas_pagarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_pagar_util::refrescarFKDescripciones($this->estado_cuentas_pagars);
			}
			
			estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToGets($this->estado_cuentas_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_pagars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$estado_cuentas_pagarLogic = new  estado_cuentas_pagar_logic();
		  		  
        try {		
			$estado_cuentas_pagarLogic->setConnexion($connexion);			
			$estado_cuentas_pagarLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $estado_cuentas_pagarLogic->getestado_cuentas_pagars();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->estado_cuentas_pagars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->estado_cuentas_pagars=$this->estado_cuentas_pagarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_pagar_util::refrescarFKDescripciones($this->estado_cuentas_pagars);
			}
			
			estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToGets($this->estado_cuentas_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_pagars);
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
		$this->estado_cuentas_pagars = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_cuentas_pagars=$this->estado_cuentas_pagarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_pagar_util::refrescarFKDescripciones($this->estado_cuentas_pagars);
			}
			
			estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToGets($this->estado_cuentas_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_pagars);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->estado_cuentas_pagars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_cuentas_pagars=$this->estado_cuentas_pagarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_pagar_util::refrescarFKDescripciones($this->estado_cuentas_pagars);
			}
			
			estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToGets($this->estado_cuentas_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_pagars);
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
		$this->estado_cuentas_pagars = array();
		  		  
        try {			
			$this->estado_cuentas_pagars=$this->estado_cuentas_pagarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_pagar_util::refrescarFKDescripciones($this->estado_cuentas_pagars);
			}	
			
			estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToGets($this->estado_cuentas_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_pagars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->estado_cuentas_pagars = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->estado_cuentas_pagars=$this->estado_cuentas_pagarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_pagar_util::refrescarFKDescripciones($this->estado_cuentas_pagars);
			}
			
			estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToGets($this->estado_cuentas_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_pagars);
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
		$this->estado_cuentas_pagars = array();
		  		  
        try {		
			$this->estado_cuentas_pagars=$this->estado_cuentas_pagarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_pagar_util::refrescarFKDescripciones($this->estado_cuentas_pagars);
			}
			
			estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToGets($this->estado_cuentas_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_pagars);

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
						
			//estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToSave($this->estado_cuentas_pagar,$this->datosCliente,$this->connexion);	       
			estado_cuentas_pagar_logic_add::updateestado_cuentas_pagarToSave($this->estado_cuentas_pagar);			
			estado_cuentas_pagar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->estado_cuentas_pagar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->estado_cuentas_pagarLogicAdditional->checkGeneralEntityToSave($this,$this->estado_cuentas_pagar,$this->datosCliente,$this->connexion);
			
			
			estado_cuentas_pagar_data::save($this->estado_cuentas_pagar, $this->connexion);	    	       	 				
			//estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToSaveAfter($this->estado_cuentas_pagar,$this->datosCliente,$this->connexion);			
			$this->estado_cuentas_pagarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->estado_cuentas_pagar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->estado_cuentas_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->estado_cuentas_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				estado_cuentas_pagar_util::refrescarFKDescripcion($this->estado_cuentas_pagar);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->estado_cuentas_pagar->getIsDeleted()) {
				$this->estado_cuentas_pagar=null;
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
						
			/*estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToSave($this->estado_cuentas_pagar,$this->datosCliente,$this->connexion);*/	        
			estado_cuentas_pagar_logic_add::updateestado_cuentas_pagarToSave($this->estado_cuentas_pagar);			
			$this->estado_cuentas_pagarLogicAdditional->checkGeneralEntityToSave($this,$this->estado_cuentas_pagar,$this->datosCliente,$this->connexion);			
			estado_cuentas_pagar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->estado_cuentas_pagar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			estado_cuentas_pagar_data::save($this->estado_cuentas_pagar, $this->connexion);	    	       	 						
			/*estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToSaveAfter($this->estado_cuentas_pagar,$this->datosCliente,$this->connexion);*/			
			$this->estado_cuentas_pagarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->estado_cuentas_pagar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->estado_cuentas_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->estado_cuentas_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				estado_cuentas_pagar_util::refrescarFKDescripcion($this->estado_cuentas_pagar);				
			}
			
			if($this->estado_cuentas_pagar->getIsDeleted()) {
				$this->estado_cuentas_pagar=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(estado_cuentas_pagar $estado_cuentas_pagar,Connexion $connexion)  {
		$estado_cuentas_pagarLogic = new  estado_cuentas_pagar_logic();		  		  
        try {		
			$estado_cuentas_pagarLogic->setConnexion($connexion);			
			$estado_cuentas_pagarLogic->setestado_cuentas_pagar($estado_cuentas_pagar);			
			$estado_cuentas_pagarLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToSaves($this->estado_cuentas_pagars,$this->datosCliente,$this->connexion);*/	        	
			$this->estado_cuentas_pagarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->estado_cuentas_pagars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->estado_cuentas_pagars as $estado_cuentas_pagarLocal) {				
								
				estado_cuentas_pagar_logic_add::updateestado_cuentas_pagarToSave($estado_cuentas_pagarLocal);	        	
				estado_cuentas_pagar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$estado_cuentas_pagarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				estado_cuentas_pagar_data::save($estado_cuentas_pagarLocal, $this->connexion);				
			}
			
			/*estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToSavesAfter($this->estado_cuentas_pagars,$this->datosCliente,$this->connexion);*/			
			$this->estado_cuentas_pagarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->estado_cuentas_pagars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_pagar_util::refrescarFKDescripciones($this->estado_cuentas_pagars);
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
			/*estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToSaves($this->estado_cuentas_pagars,$this->datosCliente,$this->connexion);*/			
			$this->estado_cuentas_pagarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->estado_cuentas_pagars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->estado_cuentas_pagars as $estado_cuentas_pagarLocal) {				
								
				estado_cuentas_pagar_logic_add::updateestado_cuentas_pagarToSave($estado_cuentas_pagarLocal);	        	
				estado_cuentas_pagar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$estado_cuentas_pagarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				estado_cuentas_pagar_data::save($estado_cuentas_pagarLocal, $this->connexion);				
			}			
			
			/*estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToSavesAfter($this->estado_cuentas_pagars,$this->datosCliente,$this->connexion);*/			
			$this->estado_cuentas_pagarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->estado_cuentas_pagars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_pagar_util::refrescarFKDescripciones($this->estado_cuentas_pagars);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $estado_cuentas_pagars,Connexion $connexion)  {
		$estado_cuentas_pagarLogic = new  estado_cuentas_pagar_logic();
		  		  
        try {		
			$estado_cuentas_pagarLogic->setConnexion($connexion);			
			$estado_cuentas_pagarLogic->setestado_cuentas_pagars($estado_cuentas_pagars);			
			$estado_cuentas_pagarLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$estado_cuentas_pagarsAux=array();
		
		foreach($this->estado_cuentas_pagars as $estado_cuentas_pagar) {
			if($estado_cuentas_pagar->getIsDeleted()==false) {
				$estado_cuentas_pagarsAux[]=$estado_cuentas_pagar;
			}
		}
		
		$this->estado_cuentas_pagars=$estado_cuentas_pagarsAux;
	}
	
	public function updateToGetsAuxiliar(array &$estado_cuentas_pagars) {
		if($this->estado_cuentas_pagarLogicAdditional==null) {
			$this->estado_cuentas_pagarLogicAdditional=new estado_cuentas_pagar_logic_add();
		}
		
		
		$this->estado_cuentas_pagarLogicAdditional->updateToGets($estado_cuentas_pagars,$this);					
		$this->estado_cuentas_pagarLogicAdditional->updateToGetsReferencia($estado_cuentas_pagars,$this);			
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
	
	
	
	public function saveRelacionesWithConnection($estado_cuentas_pagar,$cuentapagars) {
		$this->saveRelacionesBase($estado_cuentas_pagar,$cuentapagars,true);
	}

	public function saveRelaciones($estado_cuentas_pagar,$cuentapagars) {
		$this->saveRelacionesBase($estado_cuentas_pagar,$cuentapagars,false);
	}

	public function saveRelacionesBase($estado_cuentas_pagar,$cuentapagars=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$estado_cuentas_pagar->setcuenta_pagars($cuentapagars);
			$this->setestado_cuentas_pagar($estado_cuentas_pagar);

				if(($this->estado_cuentas_pagar->getIsNew() || $this->estado_cuentas_pagar->getIsChanged()) && !$this->estado_cuentas_pagar->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($cuentapagars);

				} else if($this->estado_cuentas_pagar->getIsDeleted()) {
					$this->saveRelacionesDetalles($cuentapagars);
					$this->save();
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
	
	
	public function saveRelacionesDetalles($cuentapagars=array()) {
		try {
	

			$idestado_cuentas_pagarActual=$this->getestado_cuentas_pagar()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/cuenta_pagar_carga.php');
			cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cuentapagarLogic_Desde_estado_cuentas_pagar=new cuenta_pagar_logic();
			$cuentapagarLogic_Desde_estado_cuentas_pagar->setcuenta_pagars($cuentapagars);

			$cuentapagarLogic_Desde_estado_cuentas_pagar->setConnexion($this->getConnexion());
			$cuentapagarLogic_Desde_estado_cuentas_pagar->setDatosCliente($this->datosCliente);

			foreach($cuentapagarLogic_Desde_estado_cuentas_pagar->getcuenta_pagars() as $cuentapagar_Desde_estado_cuentas_pagar) {
				$cuentapagar_Desde_estado_cuentas_pagar->setid_estado_cuentas_pagar($idestado_cuentas_pagarActual);

				$cuentapagarLogic_Desde_estado_cuentas_pagar->setcuenta_pagar($cuentapagar_Desde_estado_cuentas_pagar);
				$cuentapagarLogic_Desde_estado_cuentas_pagar->save();

				$idcuenta_pagarActual=$cuenta_pagar_Desde_estado_cuentas_pagar->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/debito_cuenta_pagar_carga.php');
				debito_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$debitocuentapagarLogic_Desde_cuenta_pagar=new debito_cuenta_pagar_logic();

				if($cuenta_pagar_Desde_estado_cuentas_pagar->getdebito_cuenta_pagars()==null){
					$cuenta_pagar_Desde_estado_cuentas_pagar->setdebito_cuenta_pagars(array());
				}

				$debitocuentapagarLogic_Desde_cuenta_pagar->setdebito_cuenta_pagars($cuenta_pagar_Desde_estado_cuentas_pagar->getdebito_cuenta_pagars());

				$debitocuentapagarLogic_Desde_cuenta_pagar->setConnexion($this->getConnexion());
				$debitocuentapagarLogic_Desde_cuenta_pagar->setDatosCliente($this->datosCliente);

				foreach($debitocuentapagarLogic_Desde_cuenta_pagar->getdebito_cuenta_pagars() as $debitocuentapagar_Desde_cuenta_pagar) {
					$debitocuentapagar_Desde_cuenta_pagar->setid_cuenta_pagar($idcuenta_pagarActual);
				}

				$debitocuentapagarLogic_Desde_cuenta_pagar->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/credito_cuenta_pagar_carga.php');
				credito_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$creditocuentapagarLogic_Desde_cuenta_pagar=new credito_cuenta_pagar_logic();

				if($cuenta_pagar_Desde_estado_cuentas_pagar->getcredito_cuenta_pagars()==null){
					$cuenta_pagar_Desde_estado_cuentas_pagar->setcredito_cuenta_pagars(array());
				}

				$creditocuentapagarLogic_Desde_cuenta_pagar->setcredito_cuenta_pagars($cuenta_pagar_Desde_estado_cuentas_pagar->getcredito_cuenta_pagars());

				$creditocuentapagarLogic_Desde_cuenta_pagar->setConnexion($this->getConnexion());
				$creditocuentapagarLogic_Desde_cuenta_pagar->setDatosCliente($this->datosCliente);

				foreach($creditocuentapagarLogic_Desde_cuenta_pagar->getcredito_cuenta_pagars() as $creditocuentapagar_Desde_cuenta_pagar) {
					$creditocuentapagar_Desde_cuenta_pagar->setid_cuenta_pagar($idcuenta_pagarActual);
				}

				$creditocuentapagarLogic_Desde_cuenta_pagar->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/pago_cuenta_pagar_carga.php');
				pago_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$pagocuentapagarLogic_Desde_cuenta_pagar=new pago_cuenta_pagar_logic();

				if($cuenta_pagar_Desde_estado_cuentas_pagar->getpago_cuenta_pagars()==null){
					$cuenta_pagar_Desde_estado_cuentas_pagar->setpago_cuenta_pagars(array());
				}

				$pagocuentapagarLogic_Desde_cuenta_pagar->setpago_cuenta_pagars($cuenta_pagar_Desde_estado_cuentas_pagar->getpago_cuenta_pagars());

				$pagocuentapagarLogic_Desde_cuenta_pagar->setConnexion($this->getConnexion());
				$pagocuentapagarLogic_Desde_cuenta_pagar->setDatosCliente($this->datosCliente);

				foreach($pagocuentapagarLogic_Desde_cuenta_pagar->getpago_cuenta_pagars() as $pagocuentapagar_Desde_cuenta_pagar) {
					$pagocuentapagar_Desde_cuenta_pagar->setid_cuenta_pagar($idcuenta_pagarActual);
				}

				$pagocuentapagarLogic_Desde_cuenta_pagar->saves();
			}


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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $estado_cuentas_pagars,estado_cuentas_pagar_param_return $estado_cuentas_pagarParameterGeneral) : estado_cuentas_pagar_param_return {
		$estado_cuentas_pagarReturnGeneral=new estado_cuentas_pagar_param_return();
	
		 try {	
			
			if($this->estado_cuentas_pagarLogicAdditional==null) {
				$this->estado_cuentas_pagarLogicAdditional=new estado_cuentas_pagar_logic_add();
			}
			
			$this->estado_cuentas_pagarLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$estado_cuentas_pagars,$estado_cuentas_pagarParameterGeneral,$estado_cuentas_pagarReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $estado_cuentas_pagarReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $estado_cuentas_pagars,estado_cuentas_pagar_param_return $estado_cuentas_pagarParameterGeneral) : estado_cuentas_pagar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$estado_cuentas_pagarReturnGeneral=new estado_cuentas_pagar_param_return();
	
			
			if($this->estado_cuentas_pagarLogicAdditional==null) {
				$this->estado_cuentas_pagarLogicAdditional=new estado_cuentas_pagar_logic_add();
			}
			
			$this->estado_cuentas_pagarLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$estado_cuentas_pagars,$estado_cuentas_pagarParameterGeneral,$estado_cuentas_pagarReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $estado_cuentas_pagarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estado_cuentas_pagars,estado_cuentas_pagar $estado_cuentas_pagar,estado_cuentas_pagar_param_return $estado_cuentas_pagarParameterGeneral,bool $isEsNuevoestado_cuentas_pagar,array $clases) : estado_cuentas_pagar_param_return {
		 try {	
			$estado_cuentas_pagarReturnGeneral=new estado_cuentas_pagar_param_return();
	
			$estado_cuentas_pagarReturnGeneral->setestado_cuentas_pagar($estado_cuentas_pagar);
			$estado_cuentas_pagarReturnGeneral->setestado_cuentas_pagars($estado_cuentas_pagars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$estado_cuentas_pagarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->estado_cuentas_pagarLogicAdditional==null) {
				$this->estado_cuentas_pagarLogicAdditional=new estado_cuentas_pagar_logic_add();
			}
			
			$estado_cuentas_pagarReturnGeneral=$this->estado_cuentas_pagarLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_cuentas_pagars,$estado_cuentas_pagar,$estado_cuentas_pagarParameterGeneral,$estado_cuentas_pagarReturnGeneral,$isEsNuevoestado_cuentas_pagar,$clases);
			
			/*estado_cuentas_pagarLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_cuentas_pagars,$estado_cuentas_pagar,$estado_cuentas_pagarParameterGeneral,$estado_cuentas_pagarReturnGeneral,$isEsNuevoestado_cuentas_pagar,$clases);*/
			
			return $estado_cuentas_pagarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estado_cuentas_pagars,estado_cuentas_pagar $estado_cuentas_pagar,estado_cuentas_pagar_param_return $estado_cuentas_pagarParameterGeneral,bool $isEsNuevoestado_cuentas_pagar,array $clases) : estado_cuentas_pagar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$estado_cuentas_pagarReturnGeneral=new estado_cuentas_pagar_param_return();
	
			$estado_cuentas_pagarReturnGeneral->setestado_cuentas_pagar($estado_cuentas_pagar);
			$estado_cuentas_pagarReturnGeneral->setestado_cuentas_pagars($estado_cuentas_pagars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$estado_cuentas_pagarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->estado_cuentas_pagarLogicAdditional==null) {
				$this->estado_cuentas_pagarLogicAdditional=new estado_cuentas_pagar_logic_add();
			}
			
			$estado_cuentas_pagarReturnGeneral=$this->estado_cuentas_pagarLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_cuentas_pagars,$estado_cuentas_pagar,$estado_cuentas_pagarParameterGeneral,$estado_cuentas_pagarReturnGeneral,$isEsNuevoestado_cuentas_pagar,$clases);
			
			/*estado_cuentas_pagarLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_cuentas_pagars,$estado_cuentas_pagar,$estado_cuentas_pagarParameterGeneral,$estado_cuentas_pagarReturnGeneral,$isEsNuevoestado_cuentas_pagar,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $estado_cuentas_pagarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estado_cuentas_pagars,estado_cuentas_pagar $estado_cuentas_pagar,estado_cuentas_pagar_param_return $estado_cuentas_pagarParameterGeneral,bool $isEsNuevoestado_cuentas_pagar,array $clases) : estado_cuentas_pagar_param_return {
		 try {	
			$estado_cuentas_pagarReturnGeneral=new estado_cuentas_pagar_param_return();
	
			$estado_cuentas_pagarReturnGeneral->setestado_cuentas_pagar($estado_cuentas_pagar);
			$estado_cuentas_pagarReturnGeneral->setestado_cuentas_pagars($estado_cuentas_pagars);
			
			
			
			if($this->estado_cuentas_pagarLogicAdditional==null) {
				$this->estado_cuentas_pagarLogicAdditional=new estado_cuentas_pagar_logic_add();
			}
			
			$estado_cuentas_pagarReturnGeneral=$this->estado_cuentas_pagarLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_cuentas_pagars,$estado_cuentas_pagar,$estado_cuentas_pagarParameterGeneral,$estado_cuentas_pagarReturnGeneral,$isEsNuevoestado_cuentas_pagar,$clases);
			
			/*estado_cuentas_pagarLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_cuentas_pagars,$estado_cuentas_pagar,$estado_cuentas_pagarParameterGeneral,$estado_cuentas_pagarReturnGeneral,$isEsNuevoestado_cuentas_pagar,$clases);*/
			
			return $estado_cuentas_pagarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estado_cuentas_pagars,estado_cuentas_pagar $estado_cuentas_pagar,estado_cuentas_pagar_param_return $estado_cuentas_pagarParameterGeneral,bool $isEsNuevoestado_cuentas_pagar,array $clases) : estado_cuentas_pagar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$estado_cuentas_pagarReturnGeneral=new estado_cuentas_pagar_param_return();
	
			$estado_cuentas_pagarReturnGeneral->setestado_cuentas_pagar($estado_cuentas_pagar);
			$estado_cuentas_pagarReturnGeneral->setestado_cuentas_pagars($estado_cuentas_pagars);
			
			
			if($this->estado_cuentas_pagarLogicAdditional==null) {
				$this->estado_cuentas_pagarLogicAdditional=new estado_cuentas_pagar_logic_add();
			}
			
			$estado_cuentas_pagarReturnGeneral=$this->estado_cuentas_pagarLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_cuentas_pagars,$estado_cuentas_pagar,$estado_cuentas_pagarParameterGeneral,$estado_cuentas_pagarReturnGeneral,$isEsNuevoestado_cuentas_pagar,$clases);
			
			/*estado_cuentas_pagarLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_cuentas_pagars,$estado_cuentas_pagar,$estado_cuentas_pagarParameterGeneral,$estado_cuentas_pagarReturnGeneral,$isEsNuevoestado_cuentas_pagar,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $estado_cuentas_pagarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,estado_cuentas_pagar $estado_cuentas_pagar,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,estado_cuentas_pagar $estado_cuentas_pagar,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		estado_cuentas_pagar_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(estado_cuentas_pagar $estado_cuentas_pagar,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			estado_cuentas_pagar_logic_add::updateestado_cuentas_pagarToGet($this->estado_cuentas_pagar);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$estado_cuentas_pagar->setcuenta_pagars($this->estado_cuentas_pagarDataAccess->getcuenta_pagars($this->connexion,$estado_cuentas_pagar));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado_cuentas_pagar->setcuenta_pagars($this->estado_cuentas_pagarDataAccess->getcuenta_pagars($this->connexion,$estado_cuentas_pagar));

				if($this->isConDeep) {
					$cuentapagarLogic= new cuenta_pagar_logic($this->connexion);
					$cuentapagarLogic->setcuenta_pagars($estado_cuentas_pagar->getcuenta_pagars());
					$classesLocal=cuenta_pagar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cuentapagarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cuenta_pagar_util::refrescarFKDescripciones($cuentapagarLogic->getcuenta_pagars());
					$estado_cuentas_pagar->setcuenta_pagars($cuentapagarLogic->getcuenta_pagars());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_pagar::$class);
			$estado_cuentas_pagar->setcuenta_pagars($this->estado_cuentas_pagarDataAccess->getcuenta_pagars($this->connexion,$estado_cuentas_pagar));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {


		$estado_cuentas_pagar->setcuenta_pagars($this->estado_cuentas_pagarDataAccess->getcuenta_pagars($this->connexion,$estado_cuentas_pagar));

		foreach($estado_cuentas_pagar->getcuenta_pagars() as $cuentapagar) {
			$cuentapagarLogic= new cuenta_pagar_logic($this->connexion);
			$cuentapagarLogic->deepLoad($cuentapagar,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado_cuentas_pagar->setcuenta_pagars($this->estado_cuentas_pagarDataAccess->getcuenta_pagars($this->connexion,$estado_cuentas_pagar));

				foreach($estado_cuentas_pagar->getcuenta_pagars() as $cuentapagar) {
					$cuentapagarLogic= new cuenta_pagar_logic($this->connexion);
					$cuentapagarLogic->deepLoad($cuentapagar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_pagar::$class);
			$estado_cuentas_pagar->setcuenta_pagars($this->estado_cuentas_pagarDataAccess->getcuenta_pagars($this->connexion,$estado_cuentas_pagar));

			foreach($estado_cuentas_pagar->getcuenta_pagars() as $cuentapagar) {
				$cuentapagarLogic= new cuenta_pagar_logic($this->connexion);
				$cuentapagarLogic->deepLoad($cuentapagar,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(estado_cuentas_pagar $estado_cuentas_pagar,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			estado_cuentas_pagar_logic_add::updateestado_cuentas_pagarToSave($this->estado_cuentas_pagar);			
			
			if(!$paraDeleteCascade) {				
				estado_cuentas_pagar_data::save($estado_cuentas_pagar, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($estado_cuentas_pagar->getcuenta_pagars() as $cuentapagar) {
			$cuentapagar->setid_estado_cuentas_pagar($estado_cuentas_pagar->getId());
			cuenta_pagar_data::save($cuentapagar,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado_cuentas_pagar->getcuenta_pagars() as $cuentapagar) {
					$cuentapagar->setid_estado_cuentas_pagar($estado_cuentas_pagar->getId());
					cuenta_pagar_data::save($cuentapagar,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_pagar::$class);

			foreach($estado_cuentas_pagar->getcuenta_pagars() as $cuentapagar) {
				$cuentapagar->setid_estado_cuentas_pagar($estado_cuentas_pagar->getId());
				cuenta_pagar_data::save($cuentapagar,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($estado_cuentas_pagar->getcuenta_pagars() as $cuentapagar) {
			$cuentapagarLogic= new cuenta_pagar_logic($this->connexion);
			$cuentapagar->setid_estado_cuentas_pagar($estado_cuentas_pagar->getId());
			cuenta_pagar_data::save($cuentapagar,$this->connexion);
			$cuentapagarLogic->deepSave($cuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado_cuentas_pagar->getcuenta_pagars() as $cuentapagar) {
					$cuentapagarLogic= new cuenta_pagar_logic($this->connexion);
					$cuentapagar->setid_estado_cuentas_pagar($estado_cuentas_pagar->getId());
					cuenta_pagar_data::save($cuentapagar,$this->connexion);
					$cuentapagarLogic->deepSave($cuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {



		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_pagar::$class);

			foreach($estado_cuentas_pagar->getcuenta_pagars() as $cuentapagar) {
				$cuentapagarLogic= new cuenta_pagar_logic($this->connexion);
				$cuentapagar->setid_estado_cuentas_pagar($estado_cuentas_pagar->getId());
				cuenta_pagar_data::save($cuentapagar,$this->connexion);
				$cuentapagarLogic->deepSave($cuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				estado_cuentas_pagar_data::save($estado_cuentas_pagar, $this->connexion);
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
			
			$this->deepLoad($this->estado_cuentas_pagar,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->estado_cuentas_pagars as $estado_cuentas_pagar) {
				$this->deepLoad($estado_cuentas_pagar,$isDeep,$deepLoadType,$clases);
								
				estado_cuentas_pagar_util::refrescarFKDescripciones($this->estado_cuentas_pagars);
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
			
			foreach($this->estado_cuentas_pagars as $estado_cuentas_pagar) {
				$this->deepLoad($estado_cuentas_pagar,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->estado_cuentas_pagar,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->estado_cuentas_pagars as $estado_cuentas_pagar) {
				$this->deepSave($estado_cuentas_pagar,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->estado_cuentas_pagars as $estado_cuentas_pagar) {
				$this->deepSave($estado_cuentas_pagar,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(cuenta_pagar::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==cuenta_pagar::$class) {
						$classes[]=new Classe(cuenta_pagar::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==cuenta_pagar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_pagar::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getestado_cuentas_pagar() : ?estado_cuentas_pagar {	
		/*
		estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToGet($this->estado_cuentas_pagar,$this->datosCliente);
		estado_cuentas_pagar_logic_add::updateestado_cuentas_pagarToGet($this->estado_cuentas_pagar);
		*/
			
		return $this->estado_cuentas_pagar;
	}
		
	public function setestado_cuentas_pagar(estado_cuentas_pagar $newestado_cuentas_pagar) {
		$this->estado_cuentas_pagar = $newestado_cuentas_pagar;
	}
	
	public function getestado_cuentas_pagars() : array {		
		/*
		estado_cuentas_pagar_logic_add::checkestado_cuentas_pagarToGets($this->estado_cuentas_pagars,$this->datosCliente);
		
		foreach ($this->estado_cuentas_pagars as $estado_cuentas_pagarLocal ) {
			estado_cuentas_pagar_logic_add::updateestado_cuentas_pagarToGet($estado_cuentas_pagarLocal);
		}
		*/
		
		return $this->estado_cuentas_pagars;
	}
	
	public function setestado_cuentas_pagars(array $newestado_cuentas_pagars) {
		$this->estado_cuentas_pagars = $newestado_cuentas_pagars;
	}
	
	public function getestado_cuentas_pagarDataAccess() : estado_cuentas_pagar_data {
		return $this->estado_cuentas_pagarDataAccess;
	}
	
	public function setestado_cuentas_pagarDataAccess(estado_cuentas_pagar_data $newestado_cuentas_pagarDataAccess) {
		$this->estado_cuentas_pagarDataAccess = $newestado_cuentas_pagarDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        estado_cuentas_pagar_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		debito_cuenta_pagar_logic::$logger;
		credito_cuenta_pagar_logic::$logger;
		pago_cuenta_pagar_logic::$logger;
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
