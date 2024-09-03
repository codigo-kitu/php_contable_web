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

namespace com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_param_return;

use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\presentation\session\pago_cuenta_pagar_session;

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

use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\business\entity\pago_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\business\data\pago_cuenta_pagar_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\general\sucursal\business\data\sucursal_data;
use com\bydan\contabilidad\general\sucursal\business\logic\sucursal_logic;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\business\data\ejercicio_data;
use com\bydan\contabilidad\contabilidad\ejercicio\business\logic\ejercicio_logic;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\business\data\periodo_data;
use com\bydan\contabilidad\contabilidad\periodo\business\logic\periodo_logic;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;

use com\bydan\contabilidad\seguridad\usuario\business\data\usuario_data;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\entity\cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\data\cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\logic\cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_util;

use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\entity\forma_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\data\forma_pago_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\logic\forma_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\data\estado_data;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_util;

//REL


//REL DETALLES




class pago_cuenta_pagar_logic  extends GeneralEntityLogic implements pago_cuenta_pagar_logicI {	
	/*GENERAL*/
	public pago_cuenta_pagar_data $pago_cuenta_pagarDataAccess;
	public ?pago_cuenta_pagar_logic_add $pago_cuenta_pagarLogicAdditional=null;
	public ?pago_cuenta_pagar $pago_cuenta_pagar;
	public array $pago_cuenta_pagars;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->pago_cuenta_pagarDataAccess = new pago_cuenta_pagar_data();			
			$this->pago_cuenta_pagars = array();
			$this->pago_cuenta_pagar = new pago_cuenta_pagar();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->pago_cuenta_pagarLogicAdditional = new pago_cuenta_pagar_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->pago_cuenta_pagarLogicAdditional==null) {
			$this->pago_cuenta_pagarLogicAdditional=new pago_cuenta_pagar_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->pago_cuenta_pagarDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->pago_cuenta_pagarDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->pago_cuenta_pagarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->pago_cuenta_pagarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->pago_cuenta_pagars = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->pago_cuenta_pagars = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);
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
		$this->pago_cuenta_pagar = new pago_cuenta_pagar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->pago_cuenta_pagar=$this->pago_cuenta_pagarDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->pago_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				pago_cuenta_pagar_util::refrescarFKDescripcion($this->pago_cuenta_pagar);
			}
						
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGet($this->pago_cuenta_pagar,$this->datosCliente);
			pago_cuenta_pagar_logic_add::updatepago_cuenta_pagarToGet($this->pago_cuenta_pagar);
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
		$this->pago_cuenta_pagar = new  pago_cuenta_pagar();
		  		  
        try {		
			$this->pago_cuenta_pagar=$this->pago_cuenta_pagarDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->pago_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				pago_cuenta_pagar_util::refrescarFKDescripcion($this->pago_cuenta_pagar);
			}
			
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGet($this->pago_cuenta_pagar,$this->datosCliente);
			pago_cuenta_pagar_logic_add::updatepago_cuenta_pagarToGet($this->pago_cuenta_pagar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?pago_cuenta_pagar {
		$pago_cuenta_pagarLogic = new  pago_cuenta_pagar_logic();
		  		  
        try {		
			$pago_cuenta_pagarLogic->setConnexion($connexion);			
			$pago_cuenta_pagarLogic->getEntity($id);			
			return $pago_cuenta_pagarLogic->getpago_cuenta_pagar();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->pago_cuenta_pagar = new  pago_cuenta_pagar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->pago_cuenta_pagar=$this->pago_cuenta_pagarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->pago_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				pago_cuenta_pagar_util::refrescarFKDescripcion($this->pago_cuenta_pagar);
			}
			
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGet($this->pago_cuenta_pagar,$this->datosCliente);
			pago_cuenta_pagar_logic_add::updatepago_cuenta_pagarToGet($this->pago_cuenta_pagar);
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
		$this->pago_cuenta_pagar = new  pago_cuenta_pagar();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->pago_cuenta_pagar=$this->pago_cuenta_pagarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->pago_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				pago_cuenta_pagar_util::refrescarFKDescripcion($this->pago_cuenta_pagar);
			}
			
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGet($this->pago_cuenta_pagar,$this->datosCliente);
			pago_cuenta_pagar_logic_add::updatepago_cuenta_pagarToGet($this->pago_cuenta_pagar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?pago_cuenta_pagar {
		$pago_cuenta_pagarLogic = new  pago_cuenta_pagar_logic();
		  		  
        try {		
			$pago_cuenta_pagarLogic->setConnexion($connexion);			
			$pago_cuenta_pagarLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $pago_cuenta_pagarLogic->getpago_cuenta_pagar();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->pago_cuenta_pagars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);			
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
		$this->pago_cuenta_pagars = array();
		  		  
        try {			
			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->pago_cuenta_pagars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);
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
		$this->pago_cuenta_pagars = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$pago_cuenta_pagarLogic = new  pago_cuenta_pagar_logic();
		  		  
        try {		
			$pago_cuenta_pagarLogic->setConnexion($connexion);			
			$pago_cuenta_pagarLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $pago_cuenta_pagarLogic->getpago_cuenta_pagars();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->pago_cuenta_pagars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);
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
		$this->pago_cuenta_pagars = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->pago_cuenta_pagars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);
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
		$this->pago_cuenta_pagars = array();
		  		  
        try {			
			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}	
			
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->pago_cuenta_pagars = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);
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
		$this->pago_cuenta_pagars = array();
		  		  
        try {		
			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_Idcuenta_pagarWithConnection(string $strFinalQuery,Pagination $pagination,int $id_cuenta_pagar) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_pagar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_pagar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_pagar,pago_cuenta_pagar_util::$ID_CUENTA_PAGAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_pagar);

			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta_pagar(string $strFinalQuery,Pagination $pagination,int $id_cuenta_pagar) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_pagar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_pagar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_pagar,pago_cuenta_pagar_util::$ID_CUENTA_PAGAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_pagar);

			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdejercicioWithConnection(string $strFinalQuery,Pagination $pagination,int $id_ejercicio) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_ejercicio= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,pago_cuenta_pagar_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idejercicio(string $strFinalQuery,Pagination $pagination,int $id_ejercicio) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_ejercicio= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,pago_cuenta_pagar_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);
		} catch(Exception $e) {
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,pago_cuenta_pagar_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,pago_cuenta_pagar_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdestadoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_estado) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_estado= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,pago_cuenta_pagar_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idestado(string $strFinalQuery,Pagination $pagination,int $id_estado) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_estado= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,pago_cuenta_pagar_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idforma_pago_proveedorWithConnection(string $strFinalQuery,Pagination $pagination,int $id_forma_pago_proveedor) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_forma_pago_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_forma_pago_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_forma_pago_proveedor,pago_cuenta_pagar_util::$ID_FORMA_PAGO_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_forma_pago_proveedor);

			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idforma_pago_proveedor(string $strFinalQuery,Pagination $pagination,int $id_forma_pago_proveedor) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_forma_pago_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_forma_pago_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_forma_pago_proveedor,pago_cuenta_pagar_util::$ID_FORMA_PAGO_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_forma_pago_proveedor);

			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdperiodoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_periodo) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_periodo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,pago_cuenta_pagar_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idperiodo(string $strFinalQuery,Pagination $pagination,int $id_periodo) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_periodo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,pago_cuenta_pagar_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdsucursalWithConnection(string $strFinalQuery,Pagination $pagination,int $id_sucursal) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sucursal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,pago_cuenta_pagar_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idsucursal(string $strFinalQuery,Pagination $pagination,int $id_sucursal) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sucursal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,pago_cuenta_pagar_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdusuarioWithConnection(string $strFinalQuery,Pagination $pagination,int $id_usuario) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_usuario= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,pago_cuenta_pagar_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idusuario(string $strFinalQuery,Pagination $pagination,int $id_usuario) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_usuario= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,pago_cuenta_pagar_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->pago_cuenta_pagars=$this->pago_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->pago_cuenta_pagars);
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
						
			//pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToSave($this->pago_cuenta_pagar,$this->datosCliente,$this->connexion);	       
			pago_cuenta_pagar_logic_add::updatepago_cuenta_pagarToSave($this->pago_cuenta_pagar);			
			pago_cuenta_pagar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->pago_cuenta_pagar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->pago_cuenta_pagarLogicAdditional->checkGeneralEntityToSave($this,$this->pago_cuenta_pagar,$this->datosCliente,$this->connexion);
			
			
			pago_cuenta_pagar_data::save($this->pago_cuenta_pagar, $this->connexion);	    	       	 				
			//pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToSaveAfter($this->pago_cuenta_pagar,$this->datosCliente,$this->connexion);			
			$this->pago_cuenta_pagarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->pago_cuenta_pagar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->pago_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->pago_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				pago_cuenta_pagar_util::refrescarFKDescripcion($this->pago_cuenta_pagar);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->pago_cuenta_pagar->getIsDeleted()) {
				$this->pago_cuenta_pagar=null;
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
						
			/*pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToSave($this->pago_cuenta_pagar,$this->datosCliente,$this->connexion);*/	        
			pago_cuenta_pagar_logic_add::updatepago_cuenta_pagarToSave($this->pago_cuenta_pagar);			
			$this->pago_cuenta_pagarLogicAdditional->checkGeneralEntityToSave($this,$this->pago_cuenta_pagar,$this->datosCliente,$this->connexion);			
			pago_cuenta_pagar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->pago_cuenta_pagar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			pago_cuenta_pagar_data::save($this->pago_cuenta_pagar, $this->connexion);	    	       	 						
			/*pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToSaveAfter($this->pago_cuenta_pagar,$this->datosCliente,$this->connexion);*/			
			$this->pago_cuenta_pagarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->pago_cuenta_pagar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->pago_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->pago_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				pago_cuenta_pagar_util::refrescarFKDescripcion($this->pago_cuenta_pagar);				
			}
			
			if($this->pago_cuenta_pagar->getIsDeleted()) {
				$this->pago_cuenta_pagar=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(pago_cuenta_pagar $pago_cuenta_pagar,Connexion $connexion)  {
		$pago_cuenta_pagarLogic = new  pago_cuenta_pagar_logic();		  		  
        try {		
			$pago_cuenta_pagarLogic->setConnexion($connexion);			
			$pago_cuenta_pagarLogic->setpago_cuenta_pagar($pago_cuenta_pagar);			
			$pago_cuenta_pagarLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToSaves($this->pago_cuenta_pagars,$this->datosCliente,$this->connexion);*/	        	
			$this->pago_cuenta_pagarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->pago_cuenta_pagars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->pago_cuenta_pagars as $pago_cuenta_pagarLocal) {				
								
				pago_cuenta_pagar_logic_add::updatepago_cuenta_pagarToSave($pago_cuenta_pagarLocal);	        	
				pago_cuenta_pagar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$pago_cuenta_pagarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				pago_cuenta_pagar_data::save($pago_cuenta_pagarLocal, $this->connexion);				
			}
			
			/*pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToSavesAfter($this->pago_cuenta_pagars,$this->datosCliente,$this->connexion);*/			
			$this->pago_cuenta_pagarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->pago_cuenta_pagars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
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
			/*pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToSaves($this->pago_cuenta_pagars,$this->datosCliente,$this->connexion);*/			
			$this->pago_cuenta_pagarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->pago_cuenta_pagars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->pago_cuenta_pagars as $pago_cuenta_pagarLocal) {				
								
				pago_cuenta_pagar_logic_add::updatepago_cuenta_pagarToSave($pago_cuenta_pagarLocal);	        	
				pago_cuenta_pagar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$pago_cuenta_pagarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				pago_cuenta_pagar_data::save($pago_cuenta_pagarLocal, $this->connexion);				
			}			
			
			/*pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToSavesAfter($this->pago_cuenta_pagars,$this->datosCliente,$this->connexion);*/			
			$this->pago_cuenta_pagarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->pago_cuenta_pagars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $pago_cuenta_pagars,Connexion $connexion)  {
		$pago_cuenta_pagarLogic = new  pago_cuenta_pagar_logic();
		  		  
        try {		
			$pago_cuenta_pagarLogic->setConnexion($connexion);			
			$pago_cuenta_pagarLogic->setpago_cuenta_pagars($pago_cuenta_pagars);			
			$pago_cuenta_pagarLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$pago_cuenta_pagarsAux=array();
		
		foreach($this->pago_cuenta_pagars as $pago_cuenta_pagar) {
			if($pago_cuenta_pagar->getIsDeleted()==false) {
				$pago_cuenta_pagarsAux[]=$pago_cuenta_pagar;
			}
		}
		
		$this->pago_cuenta_pagars=$pago_cuenta_pagarsAux;
	}
	
	public function updateToGetsAuxiliar(array &$pago_cuenta_pagars) {
		if($this->pago_cuenta_pagarLogicAdditional==null) {
			$this->pago_cuenta_pagarLogicAdditional=new pago_cuenta_pagar_logic_add();
		}
		
		
		$this->pago_cuenta_pagarLogicAdditional->updateToGets($pago_cuenta_pagars,$this);					
		$this->pago_cuenta_pagarLogicAdditional->updateToGetsReferencia($pago_cuenta_pagars,$this);			
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->pago_cuenta_pagars as $pago_cuenta_pagar) {
				
				$pago_cuenta_pagar->setid_empresa_Descripcion(pago_cuenta_pagar_util::getempresaDescripcion($pago_cuenta_pagar->getempresa()));
				$pago_cuenta_pagar->setid_sucursal_Descripcion(pago_cuenta_pagar_util::getsucursalDescripcion($pago_cuenta_pagar->getsucursal()));
				$pago_cuenta_pagar->setid_ejercicio_Descripcion(pago_cuenta_pagar_util::getejercicioDescripcion($pago_cuenta_pagar->getejercicio()));
				$pago_cuenta_pagar->setid_periodo_Descripcion(pago_cuenta_pagar_util::getperiodoDescripcion($pago_cuenta_pagar->getperiodo()));
				$pago_cuenta_pagar->setid_usuario_Descripcion(pago_cuenta_pagar_util::getusuarioDescripcion($pago_cuenta_pagar->getusuario()));
				$pago_cuenta_pagar->setid_cuenta_pagar_Descripcion(pago_cuenta_pagar_util::getcuenta_pagarDescripcion($pago_cuenta_pagar->getcuenta_pagar()));
				$pago_cuenta_pagar->setid_forma_pago_proveedor_Descripcion(pago_cuenta_pagar_util::getforma_pago_proveedorDescripcion($pago_cuenta_pagar->getforma_pago_proveedor()));
				$pago_cuenta_pagar->setid_estado_Descripcion(pago_cuenta_pagar_util::getestadoDescripcion($pago_cuenta_pagar->getestado()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$pago_cuenta_pagar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$pago_cuenta_pagar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$pago_cuenta_pagar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$pago_cuenta_pagarForeignKey=new pago_cuenta_pagar_param_return();//pago_cuenta_pagarForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$pago_cuenta_pagarForeignKey,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTipos,',')) {
				$this->cargarCombossucursalsFK($this->connexion,$strRecargarFkQuery,$pago_cuenta_pagarForeignKey,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$pago_cuenta_pagarForeignKey,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$pago_cuenta_pagarForeignKey,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$pago_cuenta_pagarForeignKey,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_pagar',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_pagarsFK($this->connexion,$strRecargarFkQuery,$pago_cuenta_pagarForeignKey,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_forma_pago_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosforma_pago_proveedorsFK($this->connexion,$strRecargarFkQuery,$pago_cuenta_pagarForeignKey,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado',$strRecargarFkTipos,',')) {
				$this->cargarCombosestadosFK($this->connexion,$strRecargarFkQuery,$pago_cuenta_pagarForeignKey,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$pago_cuenta_pagarForeignKey,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossucursalsFK($this->connexion,' where id=-1 ',$pago_cuenta_pagarForeignKey,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$pago_cuenta_pagarForeignKey,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$pago_cuenta_pagarForeignKey,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$pago_cuenta_pagarForeignKey,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_pagar',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_pagarsFK($this->connexion,' where id=-1 ',$pago_cuenta_pagarForeignKey,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_forma_pago_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosforma_pago_proveedorsFK($this->connexion,' where id=-1 ',$pago_cuenta_pagarForeignKey,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_estado',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosestadosFK($this->connexion,' where id=-1 ',$pago_cuenta_pagarForeignKey,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $pago_cuenta_pagarForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$pago_cuenta_pagarForeignKey,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$pago_cuenta_pagarForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($pago_cuenta_pagar_session==null) {
			$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
		}
		
		if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($pago_cuenta_pagarForeignKey->idempresaDefaultFK==0) {
					$pago_cuenta_pagarForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$pago_cuenta_pagarForeignKey->empresasFK[$empresaLocal->getId()]=pago_cuenta_pagar_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($pago_cuenta_pagar_session->bigidempresaActual!=null && $pago_cuenta_pagar_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($pago_cuenta_pagar_session->bigidempresaActual);//WithConnection

				$pago_cuenta_pagarForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=pago_cuenta_pagar_util::getempresaDescripcion($empresaLogic->getempresa());
				$pago_cuenta_pagarForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery='',$pago_cuenta_pagarForeignKey,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$pago_cuenta_pagarForeignKey->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($pago_cuenta_pagar_session==null) {
			$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
		}
		
		if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionsucursal!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=sucursal_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalsucursal=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalsucursal=Funciones::GetFinalQueryAppend($finalQueryGlobalsucursal, '');
				$finalQueryGlobalsucursal.=sucursal_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalsucursal.$strRecargarFkQuery;		

				$sucursalLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($sucursalLogic->getsucursals() as $sucursalLocal ) {
				if($pago_cuenta_pagarForeignKey->idsucursalDefaultFK==0) {
					$pago_cuenta_pagarForeignKey->idsucursalDefaultFK=$sucursalLocal->getId();
				}

				$pago_cuenta_pagarForeignKey->sucursalsFK[$sucursalLocal->getId()]=pago_cuenta_pagar_util::getsucursalDescripcion($sucursalLocal);
			}

		} else {

			if($pago_cuenta_pagar_session->bigidsucursalActual!=null && $pago_cuenta_pagar_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($pago_cuenta_pagar_session->bigidsucursalActual);//WithConnection

				$pago_cuenta_pagarForeignKey->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=pago_cuenta_pagar_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$pago_cuenta_pagarForeignKey->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$pago_cuenta_pagarForeignKey,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$pago_cuenta_pagarForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($pago_cuenta_pagar_session==null) {
			$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
		}
		
		if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionejercicio!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=ejercicio_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalejercicio=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalejercicio=Funciones::GetFinalQueryAppend($finalQueryGlobalejercicio, '');
				$finalQueryGlobalejercicio.=ejercicio_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalejercicio.$strRecargarFkQuery;		

				$ejercicioLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($ejercicioLogic->getejercicios() as $ejercicioLocal ) {
				if($pago_cuenta_pagarForeignKey->idejercicioDefaultFK==0) {
					$pago_cuenta_pagarForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$pago_cuenta_pagarForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=pago_cuenta_pagar_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($pago_cuenta_pagar_session->bigidejercicioActual!=null && $pago_cuenta_pagar_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($pago_cuenta_pagar_session->bigidejercicioActual);//WithConnection

				$pago_cuenta_pagarForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=pago_cuenta_pagar_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$pago_cuenta_pagarForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$pago_cuenta_pagarForeignKey,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$pago_cuenta_pagarForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($pago_cuenta_pagar_session==null) {
			$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
		}
		
		if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionperiodo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=periodo_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalperiodo=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalperiodo=Funciones::GetFinalQueryAppend($finalQueryGlobalperiodo, '');
				$finalQueryGlobalperiodo.=periodo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalperiodo.$strRecargarFkQuery;		

				$periodoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($periodoLogic->getperiodos() as $periodoLocal ) {
				if($pago_cuenta_pagarForeignKey->idperiodoDefaultFK==0) {
					$pago_cuenta_pagarForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$pago_cuenta_pagarForeignKey->periodosFK[$periodoLocal->getId()]=pago_cuenta_pagar_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($pago_cuenta_pagar_session->bigidperiodoActual!=null && $pago_cuenta_pagar_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($pago_cuenta_pagar_session->bigidperiodoActual);//WithConnection

				$pago_cuenta_pagarForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=pago_cuenta_pagar_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$pago_cuenta_pagarForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$pago_cuenta_pagarForeignKey,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$pago_cuenta_pagarForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($pago_cuenta_pagar_session==null) {
			$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
		}
		
		if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionusuario!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=usuario_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalusuario=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalusuario=Funciones::GetFinalQueryAppend($finalQueryGlobalusuario, '');
				$finalQueryGlobalusuario.=usuario_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalusuario.$strRecargarFkQuery;		

				$usuarioLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($usuarioLogic->getusuarios() as $usuarioLocal ) {
				if($pago_cuenta_pagarForeignKey->idusuarioDefaultFK==0) {
					$pago_cuenta_pagarForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$pago_cuenta_pagarForeignKey->usuariosFK[$usuarioLocal->getId()]=pago_cuenta_pagar_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($pago_cuenta_pagar_session->bigidusuarioActual!=null && $pago_cuenta_pagar_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($pago_cuenta_pagar_session->bigidusuarioActual);//WithConnection

				$pago_cuenta_pagarForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=pago_cuenta_pagar_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$pago_cuenta_pagarForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarComboscuenta_pagarsFK($connexion=null,$strRecargarFkQuery='',$pago_cuenta_pagarForeignKey,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuenta_pagarLogic= new cuenta_pagar_logic();
		$pagination= new Pagination();
		$pago_cuenta_pagarForeignKey->cuenta_pagarsFK=array();

		$cuenta_pagarLogic->setConnexion($connexion);
		$cuenta_pagarLogic->getcuenta_pagarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($pago_cuenta_pagar_session==null) {
			$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
		}
		
		if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesioncuenta_pagar!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_pagar_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcuenta_pagar=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta_pagar=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta_pagar, '');
				$finalQueryGlobalcuenta_pagar.=cuenta_pagar_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta_pagar.$strRecargarFkQuery;		

				$cuenta_pagarLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($cuenta_pagarLogic->getcuenta_pagars() as $cuenta_pagarLocal ) {
				if($pago_cuenta_pagarForeignKey->idcuenta_pagarDefaultFK==0) {
					$pago_cuenta_pagarForeignKey->idcuenta_pagarDefaultFK=$cuenta_pagarLocal->getId();
				}

				$pago_cuenta_pagarForeignKey->cuenta_pagarsFK[$cuenta_pagarLocal->getId()]=pago_cuenta_pagar_util::getcuenta_pagarDescripcion($cuenta_pagarLocal);
			}

		} else {

			if($pago_cuenta_pagar_session->bigidcuenta_pagarActual!=null && $pago_cuenta_pagar_session->bigidcuenta_pagarActual > 0) {
				$cuenta_pagarLogic->getEntity($pago_cuenta_pagar_session->bigidcuenta_pagarActual);//WithConnection

				$pago_cuenta_pagarForeignKey->cuenta_pagarsFK[$cuenta_pagarLogic->getcuenta_pagar()->getId()]=pago_cuenta_pagar_util::getcuenta_pagarDescripcion($cuenta_pagarLogic->getcuenta_pagar());
				$pago_cuenta_pagarForeignKey->idcuenta_pagarDefaultFK=$cuenta_pagarLogic->getcuenta_pagar()->getId();
			}
		}
	}

	public function cargarCombosforma_pago_proveedorsFK($connexion=null,$strRecargarFkQuery='',$pago_cuenta_pagarForeignKey,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$forma_pago_proveedorLogic= new forma_pago_proveedor_logic();
		$pagination= new Pagination();
		$pago_cuenta_pagarForeignKey->forma_pago_proveedorsFK=array();

		$forma_pago_proveedorLogic->setConnexion($connexion);
		$forma_pago_proveedorLogic->getforma_pago_proveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($pago_cuenta_pagar_session==null) {
			$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
		}
		
		if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionforma_pago_proveedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=forma_pago_proveedor_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalforma_pago_proveedor=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalforma_pago_proveedor=Funciones::GetFinalQueryAppend($finalQueryGlobalforma_pago_proveedor, '');
				$finalQueryGlobalforma_pago_proveedor.=forma_pago_proveedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalforma_pago_proveedor.$strRecargarFkQuery;		

				$forma_pago_proveedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($forma_pago_proveedorLogic->getforma_pago_proveedors() as $forma_pago_proveedorLocal ) {
				if($pago_cuenta_pagarForeignKey->idforma_pago_proveedorDefaultFK==0) {
					$pago_cuenta_pagarForeignKey->idforma_pago_proveedorDefaultFK=$forma_pago_proveedorLocal->getId();
				}

				$pago_cuenta_pagarForeignKey->forma_pago_proveedorsFK[$forma_pago_proveedorLocal->getId()]=pago_cuenta_pagar_util::getforma_pago_proveedorDescripcion($forma_pago_proveedorLocal);
			}

		} else {

			if($pago_cuenta_pagar_session->bigidforma_pago_proveedorActual!=null && $pago_cuenta_pagar_session->bigidforma_pago_proveedorActual > 0) {
				$forma_pago_proveedorLogic->getEntity($pago_cuenta_pagar_session->bigidforma_pago_proveedorActual);//WithConnection

				$pago_cuenta_pagarForeignKey->forma_pago_proveedorsFK[$forma_pago_proveedorLogic->getforma_pago_proveedor()->getId()]=pago_cuenta_pagar_util::getforma_pago_proveedorDescripcion($forma_pago_proveedorLogic->getforma_pago_proveedor());
				$pago_cuenta_pagarForeignKey->idforma_pago_proveedorDefaultFK=$forma_pago_proveedorLogic->getforma_pago_proveedor()->getId();
			}
		}
	}

	public function cargarCombosestadosFK($connexion=null,$strRecargarFkQuery='',$pago_cuenta_pagarForeignKey,$pago_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$estadoLogic= new estado_logic();
		$pagination= new Pagination();
		$pago_cuenta_pagarForeignKey->estadosFK=array();

		$estadoLogic->setConnexion($connexion);
		$estadoLogic->getestadoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($pago_cuenta_pagar_session==null) {
			$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
		}
		
		if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionestado!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=estado_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalestado=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalestado=Funciones::GetFinalQueryAppend($finalQueryGlobalestado, '');
				$finalQueryGlobalestado.=estado_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalestado.$strRecargarFkQuery;		

				$estadoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($estadoLogic->getestados() as $estadoLocal ) {
				if($pago_cuenta_pagarForeignKey->idestadoDefaultFK==0) {
					$pago_cuenta_pagarForeignKey->idestadoDefaultFK=$estadoLocal->getId();
				}

				$pago_cuenta_pagarForeignKey->estadosFK[$estadoLocal->getId()]=pago_cuenta_pagar_util::getestadoDescripcion($estadoLocal);
			}

		} else {

			if($pago_cuenta_pagar_session->bigidestadoActual!=null && $pago_cuenta_pagar_session->bigidestadoActual > 0) {
				$estadoLogic->getEntity($pago_cuenta_pagar_session->bigidestadoActual);//WithConnection

				$pago_cuenta_pagarForeignKey->estadosFK[$estadoLogic->getestado()->getId()]=pago_cuenta_pagar_util::getestadoDescripcion($estadoLogic->getestado());
				$pago_cuenta_pagarForeignKey->idestadoDefaultFK=$estadoLogic->getestado()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($pago_cuenta_pagar) {
		$this->saveRelacionesBase($pago_cuenta_pagar,true);
	}

	public function saveRelaciones($pago_cuenta_pagar) {
		$this->saveRelacionesBase($pago_cuenta_pagar,false);
	}

	public function saveRelacionesBase($pago_cuenta_pagar,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setpago_cuenta_pagar($pago_cuenta_pagar);

			if(pago_cuenta_pagar_logic_add::validarSaveRelaciones($pago_cuenta_pagar,$this)) {

				pago_cuenta_pagar_logic_add::updateRelacionesToSave($pago_cuenta_pagar,$this);

				if(($this->pago_cuenta_pagar->getIsNew() || $this->pago_cuenta_pagar->getIsChanged()) && !$this->pago_cuenta_pagar->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->pago_cuenta_pagar->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				pago_cuenta_pagar_logic_add::updateRelacionesToSaveAfter($pago_cuenta_pagar,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $pago_cuenta_pagars,pago_cuenta_pagar_param_return $pago_cuenta_pagarParameterGeneral) : pago_cuenta_pagar_param_return {
		$pago_cuenta_pagarReturnGeneral=new pago_cuenta_pagar_param_return();
	
		 try {	
			
			if($this->pago_cuenta_pagarLogicAdditional==null) {
				$this->pago_cuenta_pagarLogicAdditional=new pago_cuenta_pagar_logic_add();
			}
			
			$this->pago_cuenta_pagarLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$pago_cuenta_pagars,$pago_cuenta_pagarParameterGeneral,$pago_cuenta_pagarReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $pago_cuenta_pagarReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $pago_cuenta_pagars,pago_cuenta_pagar_param_return $pago_cuenta_pagarParameterGeneral) : pago_cuenta_pagar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$pago_cuenta_pagarReturnGeneral=new pago_cuenta_pagar_param_return();
	
			
			if($this->pago_cuenta_pagarLogicAdditional==null) {
				$this->pago_cuenta_pagarLogicAdditional=new pago_cuenta_pagar_logic_add();
			}
			
			$this->pago_cuenta_pagarLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$pago_cuenta_pagars,$pago_cuenta_pagarParameterGeneral,$pago_cuenta_pagarReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $pago_cuenta_pagarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $pago_cuenta_pagars,pago_cuenta_pagar $pago_cuenta_pagar,pago_cuenta_pagar_param_return $pago_cuenta_pagarParameterGeneral,bool $isEsNuevopago_cuenta_pagar,array $clases) : pago_cuenta_pagar_param_return {
		 try {	
			$pago_cuenta_pagarReturnGeneral=new pago_cuenta_pagar_param_return();
	
			$pago_cuenta_pagarReturnGeneral->setpago_cuenta_pagar($pago_cuenta_pagar);
			$pago_cuenta_pagarReturnGeneral->setpago_cuenta_pagars($pago_cuenta_pagars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$pago_cuenta_pagarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->pago_cuenta_pagarLogicAdditional==null) {
				$this->pago_cuenta_pagarLogicAdditional=new pago_cuenta_pagar_logic_add();
			}
			
			$pago_cuenta_pagarReturnGeneral=$this->pago_cuenta_pagarLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$pago_cuenta_pagars,$pago_cuenta_pagar,$pago_cuenta_pagarParameterGeneral,$pago_cuenta_pagarReturnGeneral,$isEsNuevopago_cuenta_pagar,$clases);
			
			/*pago_cuenta_pagarLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$pago_cuenta_pagars,$pago_cuenta_pagar,$pago_cuenta_pagarParameterGeneral,$pago_cuenta_pagarReturnGeneral,$isEsNuevopago_cuenta_pagar,$clases);*/
			
			return $pago_cuenta_pagarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $pago_cuenta_pagars,pago_cuenta_pagar $pago_cuenta_pagar,pago_cuenta_pagar_param_return $pago_cuenta_pagarParameterGeneral,bool $isEsNuevopago_cuenta_pagar,array $clases) : pago_cuenta_pagar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$pago_cuenta_pagarReturnGeneral=new pago_cuenta_pagar_param_return();
	
			$pago_cuenta_pagarReturnGeneral->setpago_cuenta_pagar($pago_cuenta_pagar);
			$pago_cuenta_pagarReturnGeneral->setpago_cuenta_pagars($pago_cuenta_pagars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$pago_cuenta_pagarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->pago_cuenta_pagarLogicAdditional==null) {
				$this->pago_cuenta_pagarLogicAdditional=new pago_cuenta_pagar_logic_add();
			}
			
			$pago_cuenta_pagarReturnGeneral=$this->pago_cuenta_pagarLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$pago_cuenta_pagars,$pago_cuenta_pagar,$pago_cuenta_pagarParameterGeneral,$pago_cuenta_pagarReturnGeneral,$isEsNuevopago_cuenta_pagar,$clases);
			
			/*pago_cuenta_pagarLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$pago_cuenta_pagars,$pago_cuenta_pagar,$pago_cuenta_pagarParameterGeneral,$pago_cuenta_pagarReturnGeneral,$isEsNuevopago_cuenta_pagar,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $pago_cuenta_pagarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $pago_cuenta_pagars,pago_cuenta_pagar $pago_cuenta_pagar,pago_cuenta_pagar_param_return $pago_cuenta_pagarParameterGeneral,bool $isEsNuevopago_cuenta_pagar,array $clases) : pago_cuenta_pagar_param_return {
		 try {	
			$pago_cuenta_pagarReturnGeneral=new pago_cuenta_pagar_param_return();
	
			$pago_cuenta_pagarReturnGeneral->setpago_cuenta_pagar($pago_cuenta_pagar);
			$pago_cuenta_pagarReturnGeneral->setpago_cuenta_pagars($pago_cuenta_pagars);
			
			
			
			if($this->pago_cuenta_pagarLogicAdditional==null) {
				$this->pago_cuenta_pagarLogicAdditional=new pago_cuenta_pagar_logic_add();
			}
			
			$pago_cuenta_pagarReturnGeneral=$this->pago_cuenta_pagarLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$pago_cuenta_pagars,$pago_cuenta_pagar,$pago_cuenta_pagarParameterGeneral,$pago_cuenta_pagarReturnGeneral,$isEsNuevopago_cuenta_pagar,$clases);
			
			/*pago_cuenta_pagarLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$pago_cuenta_pagars,$pago_cuenta_pagar,$pago_cuenta_pagarParameterGeneral,$pago_cuenta_pagarReturnGeneral,$isEsNuevopago_cuenta_pagar,$clases);*/
			
			return $pago_cuenta_pagarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $pago_cuenta_pagars,pago_cuenta_pagar $pago_cuenta_pagar,pago_cuenta_pagar_param_return $pago_cuenta_pagarParameterGeneral,bool $isEsNuevopago_cuenta_pagar,array $clases) : pago_cuenta_pagar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$pago_cuenta_pagarReturnGeneral=new pago_cuenta_pagar_param_return();
	
			$pago_cuenta_pagarReturnGeneral->setpago_cuenta_pagar($pago_cuenta_pagar);
			$pago_cuenta_pagarReturnGeneral->setpago_cuenta_pagars($pago_cuenta_pagars);
			
			
			if($this->pago_cuenta_pagarLogicAdditional==null) {
				$this->pago_cuenta_pagarLogicAdditional=new pago_cuenta_pagar_logic_add();
			}
			
			$pago_cuenta_pagarReturnGeneral=$this->pago_cuenta_pagarLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$pago_cuenta_pagars,$pago_cuenta_pagar,$pago_cuenta_pagarParameterGeneral,$pago_cuenta_pagarReturnGeneral,$isEsNuevopago_cuenta_pagar,$clases);
			
			/*pago_cuenta_pagarLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$pago_cuenta_pagars,$pago_cuenta_pagar,$pago_cuenta_pagarParameterGeneral,$pago_cuenta_pagarReturnGeneral,$isEsNuevopago_cuenta_pagar,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $pago_cuenta_pagarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,pago_cuenta_pagar $pago_cuenta_pagar,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,pago_cuenta_pagar $pago_cuenta_pagar,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		pago_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(pago_cuenta_pagar $pago_cuenta_pagar,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			pago_cuenta_pagar_logic_add::updatepago_cuenta_pagarToGet($this->pago_cuenta_pagar);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$pago_cuenta_pagar->setempresa($this->pago_cuenta_pagarDataAccess->getempresa($this->connexion,$pago_cuenta_pagar));
		$pago_cuenta_pagar->setsucursal($this->pago_cuenta_pagarDataAccess->getsucursal($this->connexion,$pago_cuenta_pagar));
		$pago_cuenta_pagar->setejercicio($this->pago_cuenta_pagarDataAccess->getejercicio($this->connexion,$pago_cuenta_pagar));
		$pago_cuenta_pagar->setperiodo($this->pago_cuenta_pagarDataAccess->getperiodo($this->connexion,$pago_cuenta_pagar));
		$pago_cuenta_pagar->setusuario($this->pago_cuenta_pagarDataAccess->getusuario($this->connexion,$pago_cuenta_pagar));
		$pago_cuenta_pagar->setcuenta_pagar($this->pago_cuenta_pagarDataAccess->getcuenta_pagar($this->connexion,$pago_cuenta_pagar));
		$pago_cuenta_pagar->setforma_pago_proveedor($this->pago_cuenta_pagarDataAccess->getforma_pago_proveedor($this->connexion,$pago_cuenta_pagar));
		$pago_cuenta_pagar->setestado($this->pago_cuenta_pagarDataAccess->getestado($this->connexion,$pago_cuenta_pagar));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$pago_cuenta_pagar->setempresa($this->pago_cuenta_pagarDataAccess->getempresa($this->connexion,$pago_cuenta_pagar));
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$pago_cuenta_pagar->setsucursal($this->pago_cuenta_pagarDataAccess->getsucursal($this->connexion,$pago_cuenta_pagar));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$pago_cuenta_pagar->setejercicio($this->pago_cuenta_pagarDataAccess->getejercicio($this->connexion,$pago_cuenta_pagar));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$pago_cuenta_pagar->setperiodo($this->pago_cuenta_pagarDataAccess->getperiodo($this->connexion,$pago_cuenta_pagar));
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$pago_cuenta_pagar->setusuario($this->pago_cuenta_pagarDataAccess->getusuario($this->connexion,$pago_cuenta_pagar));
				continue;
			}

			if($clas->clas==cuenta_pagar::$class.'') {
				$pago_cuenta_pagar->setcuenta_pagar($this->pago_cuenta_pagarDataAccess->getcuenta_pagar($this->connexion,$pago_cuenta_pagar));
				continue;
			}

			if($clas->clas==forma_pago_proveedor::$class.'') {
				$pago_cuenta_pagar->setforma_pago_proveedor($this->pago_cuenta_pagarDataAccess->getforma_pago_proveedor($this->connexion,$pago_cuenta_pagar));
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$pago_cuenta_pagar->setestado($this->pago_cuenta_pagarDataAccess->getestado($this->connexion,$pago_cuenta_pagar));
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
			$pago_cuenta_pagar->setempresa($this->pago_cuenta_pagarDataAccess->getempresa($this->connexion,$pago_cuenta_pagar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$pago_cuenta_pagar->setsucursal($this->pago_cuenta_pagarDataAccess->getsucursal($this->connexion,$pago_cuenta_pagar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$pago_cuenta_pagar->setejercicio($this->pago_cuenta_pagarDataAccess->getejercicio($this->connexion,$pago_cuenta_pagar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$pago_cuenta_pagar->setperiodo($this->pago_cuenta_pagarDataAccess->getperiodo($this->connexion,$pago_cuenta_pagar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$pago_cuenta_pagar->setusuario($this->pago_cuenta_pagarDataAccess->getusuario($this->connexion,$pago_cuenta_pagar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$pago_cuenta_pagar->setcuenta_pagar($this->pago_cuenta_pagarDataAccess->getcuenta_pagar($this->connexion,$pago_cuenta_pagar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==forma_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$pago_cuenta_pagar->setforma_pago_proveedor($this->pago_cuenta_pagarDataAccess->getforma_pago_proveedor($this->connexion,$pago_cuenta_pagar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$pago_cuenta_pagar->setestado($this->pago_cuenta_pagarDataAccess->getestado($this->connexion,$pago_cuenta_pagar));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$pago_cuenta_pagar->setempresa($this->pago_cuenta_pagarDataAccess->getempresa($this->connexion,$pago_cuenta_pagar));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($pago_cuenta_pagar->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$pago_cuenta_pagar->setsucursal($this->pago_cuenta_pagarDataAccess->getsucursal($this->connexion,$pago_cuenta_pagar));
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepLoad($pago_cuenta_pagar->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		$pago_cuenta_pagar->setejercicio($this->pago_cuenta_pagarDataAccess->getejercicio($this->connexion,$pago_cuenta_pagar));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($pago_cuenta_pagar->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$pago_cuenta_pagar->setperiodo($this->pago_cuenta_pagarDataAccess->getperiodo($this->connexion,$pago_cuenta_pagar));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($pago_cuenta_pagar->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		$pago_cuenta_pagar->setusuario($this->pago_cuenta_pagarDataAccess->getusuario($this->connexion,$pago_cuenta_pagar));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($pago_cuenta_pagar->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$pago_cuenta_pagar->setcuenta_pagar($this->pago_cuenta_pagarDataAccess->getcuenta_pagar($this->connexion,$pago_cuenta_pagar));
		$cuenta_pagarLogic= new cuenta_pagar_logic($this->connexion);
		$cuenta_pagarLogic->deepLoad($pago_cuenta_pagar->getcuenta_pagar(),$isDeep,$deepLoadType,$clases);
				
		$pago_cuenta_pagar->setforma_pago_proveedor($this->pago_cuenta_pagarDataAccess->getforma_pago_proveedor($this->connexion,$pago_cuenta_pagar));
		$forma_pago_proveedorLogic= new forma_pago_proveedor_logic($this->connexion);
		$forma_pago_proveedorLogic->deepLoad($pago_cuenta_pagar->getforma_pago_proveedor(),$isDeep,$deepLoadType,$clases);
				
		$pago_cuenta_pagar->setestado($this->pago_cuenta_pagarDataAccess->getestado($this->connexion,$pago_cuenta_pagar));
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepLoad($pago_cuenta_pagar->getestado(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$pago_cuenta_pagar->setempresa($this->pago_cuenta_pagarDataAccess->getempresa($this->connexion,$pago_cuenta_pagar));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($pago_cuenta_pagar->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$pago_cuenta_pagar->setsucursal($this->pago_cuenta_pagarDataAccess->getsucursal($this->connexion,$pago_cuenta_pagar));
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($pago_cuenta_pagar->getsucursal(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$pago_cuenta_pagar->setejercicio($this->pago_cuenta_pagarDataAccess->getejercicio($this->connexion,$pago_cuenta_pagar));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($pago_cuenta_pagar->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$pago_cuenta_pagar->setperiodo($this->pago_cuenta_pagarDataAccess->getperiodo($this->connexion,$pago_cuenta_pagar));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($pago_cuenta_pagar->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$pago_cuenta_pagar->setusuario($this->pago_cuenta_pagarDataAccess->getusuario($this->connexion,$pago_cuenta_pagar));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($pago_cuenta_pagar->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta_pagar::$class.'') {
				$pago_cuenta_pagar->setcuenta_pagar($this->pago_cuenta_pagarDataAccess->getcuenta_pagar($this->connexion,$pago_cuenta_pagar));
				$cuenta_pagarLogic= new cuenta_pagar_logic($this->connexion);
				$cuenta_pagarLogic->deepLoad($pago_cuenta_pagar->getcuenta_pagar(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==forma_pago_proveedor::$class.'') {
				$pago_cuenta_pagar->setforma_pago_proveedor($this->pago_cuenta_pagarDataAccess->getforma_pago_proveedor($this->connexion,$pago_cuenta_pagar));
				$forma_pago_proveedorLogic= new forma_pago_proveedor_logic($this->connexion);
				$forma_pago_proveedorLogic->deepLoad($pago_cuenta_pagar->getforma_pago_proveedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$pago_cuenta_pagar->setestado($this->pago_cuenta_pagarDataAccess->getestado($this->connexion,$pago_cuenta_pagar));
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepLoad($pago_cuenta_pagar->getestado(),$isDeep,$deepLoadType,$clases);				
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
			$pago_cuenta_pagar->setempresa($this->pago_cuenta_pagarDataAccess->getempresa($this->connexion,$pago_cuenta_pagar));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($pago_cuenta_pagar->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$pago_cuenta_pagar->setsucursal($this->pago_cuenta_pagarDataAccess->getsucursal($this->connexion,$pago_cuenta_pagar));
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($pago_cuenta_pagar->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$pago_cuenta_pagar->setejercicio($this->pago_cuenta_pagarDataAccess->getejercicio($this->connexion,$pago_cuenta_pagar));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($pago_cuenta_pagar->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$pago_cuenta_pagar->setperiodo($this->pago_cuenta_pagarDataAccess->getperiodo($this->connexion,$pago_cuenta_pagar));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($pago_cuenta_pagar->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$pago_cuenta_pagar->setusuario($this->pago_cuenta_pagarDataAccess->getusuario($this->connexion,$pago_cuenta_pagar));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($pago_cuenta_pagar->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$pago_cuenta_pagar->setcuenta_pagar($this->pago_cuenta_pagarDataAccess->getcuenta_pagar($this->connexion,$pago_cuenta_pagar));
			$cuenta_pagarLogic= new cuenta_pagar_logic($this->connexion);
			$cuenta_pagarLogic->deepLoad($pago_cuenta_pagar->getcuenta_pagar(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==forma_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$pago_cuenta_pagar->setforma_pago_proveedor($this->pago_cuenta_pagarDataAccess->getforma_pago_proveedor($this->connexion,$pago_cuenta_pagar));
			$forma_pago_proveedorLogic= new forma_pago_proveedor_logic($this->connexion);
			$forma_pago_proveedorLogic->deepLoad($pago_cuenta_pagar->getforma_pago_proveedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$pago_cuenta_pagar->setestado($this->pago_cuenta_pagarDataAccess->getestado($this->connexion,$pago_cuenta_pagar));
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepLoad($pago_cuenta_pagar->getestado(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(pago_cuenta_pagar $pago_cuenta_pagar,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			pago_cuenta_pagar_logic_add::updatepago_cuenta_pagarToSave($this->pago_cuenta_pagar);			
			
			if(!$paraDeleteCascade) {				
				pago_cuenta_pagar_data::save($pago_cuenta_pagar, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($pago_cuenta_pagar->getempresa(),$this->connexion);
		sucursal_data::save($pago_cuenta_pagar->getsucursal(),$this->connexion);
		ejercicio_data::save($pago_cuenta_pagar->getejercicio(),$this->connexion);
		periodo_data::save($pago_cuenta_pagar->getperiodo(),$this->connexion);
		usuario_data::save($pago_cuenta_pagar->getusuario(),$this->connexion);
		cuenta_pagar_data::save($pago_cuenta_pagar->getcuenta_pagar(),$this->connexion);
		forma_pago_proveedor_data::save($pago_cuenta_pagar->getforma_pago_proveedor(),$this->connexion);
		estado_data::save($pago_cuenta_pagar->getestado(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($pago_cuenta_pagar->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($pago_cuenta_pagar->getsucursal(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($pago_cuenta_pagar->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($pago_cuenta_pagar->getperiodo(),$this->connexion);
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($pago_cuenta_pagar->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta_pagar::$class.'') {
				cuenta_pagar_data::save($pago_cuenta_pagar->getcuenta_pagar(),$this->connexion);
				continue;
			}

			if($clas->clas==forma_pago_proveedor::$class.'') {
				forma_pago_proveedor_data::save($pago_cuenta_pagar->getforma_pago_proveedor(),$this->connexion);
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($pago_cuenta_pagar->getestado(),$this->connexion);
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
			empresa_data::save($pago_cuenta_pagar->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($pago_cuenta_pagar->getsucursal(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($pago_cuenta_pagar->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($pago_cuenta_pagar->getperiodo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($pago_cuenta_pagar->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_pagar_data::save($pago_cuenta_pagar->getcuenta_pagar(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==forma_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			forma_pago_proveedor_data::save($pago_cuenta_pagar->getforma_pago_proveedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($pago_cuenta_pagar->getestado(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($pago_cuenta_pagar->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($pago_cuenta_pagar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sucursal_data::save($pago_cuenta_pagar->getsucursal(),$this->connexion);
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepSave($pago_cuenta_pagar->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($pago_cuenta_pagar->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($pago_cuenta_pagar->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($pago_cuenta_pagar->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($pago_cuenta_pagar->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		usuario_data::save($pago_cuenta_pagar->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($pago_cuenta_pagar->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_pagar_data::save($pago_cuenta_pagar->getcuenta_pagar(),$this->connexion);
		$cuenta_pagarLogic= new cuenta_pagar_logic($this->connexion);
		$cuenta_pagarLogic->deepSave($pago_cuenta_pagar->getcuenta_pagar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		forma_pago_proveedor_data::save($pago_cuenta_pagar->getforma_pago_proveedor(),$this->connexion);
		$forma_pago_proveedorLogic= new forma_pago_proveedor_logic($this->connexion);
		$forma_pago_proveedorLogic->deepSave($pago_cuenta_pagar->getforma_pago_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		estado_data::save($pago_cuenta_pagar->getestado(),$this->connexion);
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepSave($pago_cuenta_pagar->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($pago_cuenta_pagar->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($pago_cuenta_pagar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($pago_cuenta_pagar->getsucursal(),$this->connexion);
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepSave($pago_cuenta_pagar->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($pago_cuenta_pagar->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($pago_cuenta_pagar->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($pago_cuenta_pagar->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($pago_cuenta_pagar->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($pago_cuenta_pagar->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($pago_cuenta_pagar->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta_pagar::$class.'') {
				cuenta_pagar_data::save($pago_cuenta_pagar->getcuenta_pagar(),$this->connexion);
				$cuenta_pagarLogic= new cuenta_pagar_logic($this->connexion);
				$cuenta_pagarLogic->deepSave($pago_cuenta_pagar->getcuenta_pagar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==forma_pago_proveedor::$class.'') {
				forma_pago_proveedor_data::save($pago_cuenta_pagar->getforma_pago_proveedor(),$this->connexion);
				$forma_pago_proveedorLogic= new forma_pago_proveedor_logic($this->connexion);
				$forma_pago_proveedorLogic->deepSave($pago_cuenta_pagar->getforma_pago_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($pago_cuenta_pagar->getestado(),$this->connexion);
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepSave($pago_cuenta_pagar->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
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
			empresa_data::save($pago_cuenta_pagar->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($pago_cuenta_pagar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($pago_cuenta_pagar->getsucursal(),$this->connexion);
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepSave($pago_cuenta_pagar->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($pago_cuenta_pagar->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($pago_cuenta_pagar->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($pago_cuenta_pagar->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($pago_cuenta_pagar->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($pago_cuenta_pagar->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($pago_cuenta_pagar->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_pagar_data::save($pago_cuenta_pagar->getcuenta_pagar(),$this->connexion);
			$cuenta_pagarLogic= new cuenta_pagar_logic($this->connexion);
			$cuenta_pagarLogic->deepSave($pago_cuenta_pagar->getcuenta_pagar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==forma_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			forma_pago_proveedor_data::save($pago_cuenta_pagar->getforma_pago_proveedor(),$this->connexion);
			$forma_pago_proveedorLogic= new forma_pago_proveedor_logic($this->connexion);
			$forma_pago_proveedorLogic->deepSave($pago_cuenta_pagar->getforma_pago_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($pago_cuenta_pagar->getestado(),$this->connexion);
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepSave($pago_cuenta_pagar->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				pago_cuenta_pagar_data::save($pago_cuenta_pagar, $this->connexion);
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
			
			$this->deepLoad($this->pago_cuenta_pagar,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->pago_cuenta_pagars as $pago_cuenta_pagar) {
				$this->deepLoad($pago_cuenta_pagar,$isDeep,$deepLoadType,$clases);
								
				pago_cuenta_pagar_util::refrescarFKDescripciones($this->pago_cuenta_pagars);
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
			
			foreach($this->pago_cuenta_pagars as $pago_cuenta_pagar) {
				$this->deepLoad($pago_cuenta_pagar,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->pago_cuenta_pagar,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->pago_cuenta_pagars as $pago_cuenta_pagar) {
				$this->deepSave($pago_cuenta_pagar,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->pago_cuenta_pagars as $pago_cuenta_pagar) {
				$this->deepSave($pago_cuenta_pagar,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(sucursal::$class);
				$classes[]=new Classe(ejercicio::$class);
				$classes[]=new Classe(periodo::$class);
				$classes[]=new Classe(usuario::$class);
				$classes[]=new Classe(cuenta_pagar::$class);
				$classes[]=new Classe(forma_pago_proveedor::$class);
				$classes[]=new Classe(estado::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==sucursal::$class) {
						$classes[]=new Classe(sucursal::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==ejercicio::$class) {
						$classes[]=new Classe(ejercicio::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==periodo::$class) {
						$classes[]=new Classe(periodo::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==usuario::$class) {
						$classes[]=new Classe(usuario::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta_pagar::$class) {
						$classes[]=new Classe(cuenta_pagar::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==forma_pago_proveedor::$class) {
						$classes[]=new Classe(forma_pago_proveedor::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==estado::$class) {
						$classes[]=new Classe(estado::$class);
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

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==sucursal::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(sucursal::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==ejercicio::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(ejercicio::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==periodo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(periodo::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==usuario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(usuario::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta_pagar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_pagar::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==forma_pago_proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(forma_pago_proveedor::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==estado::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(estado::$class);
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
	
	
	
	
	
	
	
	public function getpago_cuenta_pagar() : ?pago_cuenta_pagar {	
		/*
		pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGet($this->pago_cuenta_pagar,$this->datosCliente);
		pago_cuenta_pagar_logic_add::updatepago_cuenta_pagarToGet($this->pago_cuenta_pagar);
		*/
			
		return $this->pago_cuenta_pagar;
	}
		
	public function setpago_cuenta_pagar(pago_cuenta_pagar $newpago_cuenta_pagar) {
		$this->pago_cuenta_pagar = $newpago_cuenta_pagar;
	}
	
	public function getpago_cuenta_pagars() : array {		
		/*
		pago_cuenta_pagar_logic_add::checkpago_cuenta_pagarToGets($this->pago_cuenta_pagars,$this->datosCliente);
		
		foreach ($this->pago_cuenta_pagars as $pago_cuenta_pagarLocal ) {
			pago_cuenta_pagar_logic_add::updatepago_cuenta_pagarToGet($pago_cuenta_pagarLocal);
		}
		*/
		
		return $this->pago_cuenta_pagars;
	}
	
	public function setpago_cuenta_pagars(array $newpago_cuenta_pagars) {
		$this->pago_cuenta_pagars = $newpago_cuenta_pagars;
	}
	
	public function getpago_cuenta_pagarDataAccess() : pago_cuenta_pagar_data {
		return $this->pago_cuenta_pagarDataAccess;
	}
	
	public function setpago_cuenta_pagarDataAccess(pago_cuenta_pagar_data $newpago_cuenta_pagarDataAccess) {
		$this->pago_cuenta_pagarDataAccess = $newpago_cuenta_pagarDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        pago_cuenta_pagar_carga::$CONTROLLER;;        
		
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
