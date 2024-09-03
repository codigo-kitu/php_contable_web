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

namespace com\bydan\contabilidad\cuentascorrientes\instrumento_pago\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\util\instrumento_pago_carga;
use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\util\instrumento_pago_param_return;

use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\presentation\session\instrumento_pago_session;

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

use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\util\instrumento_pago_util;
use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\business\entity\instrumento_pago;
use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\business\data\instrumento_pago_data;

//FK


use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\data\cuenta_corriente_data;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;

//REL


//REL DETALLES




class instrumento_pago_logic  extends GeneralEntityLogic implements instrumento_pago_logicI {	
	/*GENERAL*/
	public instrumento_pago_data $instrumento_pagoDataAccess;
	//public ?instrumento_pago_logic_add $instrumento_pagoLogicAdditional=null;
	public ?instrumento_pago $instrumento_pago;
	public array $instrumento_pagos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->instrumento_pagoDataAccess = new instrumento_pago_data();			
			$this->instrumento_pagos = array();
			$this->instrumento_pago = new instrumento_pago();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->instrumento_pagoLogicAdditional = new instrumento_pago_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->instrumento_pagoLogicAdditional==null) {
		//	$this->instrumento_pagoLogicAdditional=new instrumento_pago_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->instrumento_pagoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->instrumento_pagoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->instrumento_pagoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->instrumento_pagoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->instrumento_pagos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->instrumento_pagos=$this->instrumento_pagoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				instrumento_pago_util::refrescarFKDescripciones($this->instrumento_pagos);
			}
			
			//instrumento_pago_logic_add::checkinstrumento_pagoToGets($this->instrumento_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->instrumento_pagos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->instrumento_pagos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->instrumento_pagos=$this->instrumento_pagoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				instrumento_pago_util::refrescarFKDescripciones($this->instrumento_pagos);
			}
			
			//instrumento_pago_logic_add::checkinstrumento_pagoToGets($this->instrumento_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->instrumento_pagos);
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
		$this->instrumento_pago = new instrumento_pago();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->instrumento_pago=$this->instrumento_pagoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->instrumento_pago,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				instrumento_pago_util::refrescarFKDescripcion($this->instrumento_pago);
			}
						
			//instrumento_pago_logic_add::checkinstrumento_pagoToGet($this->instrumento_pago,$this->datosCliente);
			//instrumento_pago_logic_add::updateinstrumento_pagoToGet($this->instrumento_pago);
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
		$this->instrumento_pago = new  instrumento_pago();
		  		  
        try {		
			$this->instrumento_pago=$this->instrumento_pagoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->instrumento_pago,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				instrumento_pago_util::refrescarFKDescripcion($this->instrumento_pago);
			}
			
			//instrumento_pago_logic_add::checkinstrumento_pagoToGet($this->instrumento_pago,$this->datosCliente);
			//instrumento_pago_logic_add::updateinstrumento_pagoToGet($this->instrumento_pago);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?instrumento_pago {
		$instrumento_pagoLogic = new  instrumento_pago_logic();
		  		  
        try {		
			$instrumento_pagoLogic->setConnexion($connexion);			
			$instrumento_pagoLogic->getEntity($id);			
			return $instrumento_pagoLogic->getinstrumento_pago();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->instrumento_pago = new  instrumento_pago();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->instrumento_pago=$this->instrumento_pagoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->instrumento_pago,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				instrumento_pago_util::refrescarFKDescripcion($this->instrumento_pago);
			}
			
			//instrumento_pago_logic_add::checkinstrumento_pagoToGet($this->instrumento_pago,$this->datosCliente);
			//instrumento_pago_logic_add::updateinstrumento_pagoToGet($this->instrumento_pago);
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
		$this->instrumento_pago = new  instrumento_pago();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->instrumento_pago=$this->instrumento_pagoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->instrumento_pago,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				instrumento_pago_util::refrescarFKDescripcion($this->instrumento_pago);
			}
			
			//instrumento_pago_logic_add::checkinstrumento_pagoToGet($this->instrumento_pago,$this->datosCliente);
			//instrumento_pago_logic_add::updateinstrumento_pagoToGet($this->instrumento_pago);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?instrumento_pago {
		$instrumento_pagoLogic = new  instrumento_pago_logic();
		  		  
        try {		
			$instrumento_pagoLogic->setConnexion($connexion);			
			$instrumento_pagoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $instrumento_pagoLogic->getinstrumento_pago();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->instrumento_pagos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->instrumento_pagos=$this->instrumento_pagoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				instrumento_pago_util::refrescarFKDescripciones($this->instrumento_pagos);
			}
			
			//instrumento_pago_logic_add::checkinstrumento_pagoToGets($this->instrumento_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->instrumento_pagos);			
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
		$this->instrumento_pagos = array();
		  		  
        try {			
			$this->instrumento_pagos=$this->instrumento_pagoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				instrumento_pago_util::refrescarFKDescripciones($this->instrumento_pagos);
			}
			
			//instrumento_pago_logic_add::checkinstrumento_pagoToGets($this->instrumento_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->instrumento_pagos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->instrumento_pagos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->instrumento_pagos=$this->instrumento_pagoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				instrumento_pago_util::refrescarFKDescripciones($this->instrumento_pagos);
			}
			
			//instrumento_pago_logic_add::checkinstrumento_pagoToGets($this->instrumento_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->instrumento_pagos);
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
		$this->instrumento_pagos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->instrumento_pagos=$this->instrumento_pagoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				instrumento_pago_util::refrescarFKDescripciones($this->instrumento_pagos);
			}
			
			//instrumento_pago_logic_add::checkinstrumento_pagoToGets($this->instrumento_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->instrumento_pagos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$instrumento_pagoLogic = new  instrumento_pago_logic();
		  		  
        try {		
			$instrumento_pagoLogic->setConnexion($connexion);			
			$instrumento_pagoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $instrumento_pagoLogic->getinstrumento_pagos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->instrumento_pagos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->instrumento_pagos=$this->instrumento_pagoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				instrumento_pago_util::refrescarFKDescripciones($this->instrumento_pagos);
			}
			
			//instrumento_pago_logic_add::checkinstrumento_pagoToGets($this->instrumento_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->instrumento_pagos);
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
		$this->instrumento_pagos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->instrumento_pagos=$this->instrumento_pagoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				instrumento_pago_util::refrescarFKDescripciones($this->instrumento_pagos);
			}
			
			//instrumento_pago_logic_add::checkinstrumento_pagoToGets($this->instrumento_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->instrumento_pagos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->instrumento_pagos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->instrumento_pagos=$this->instrumento_pagoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				instrumento_pago_util::refrescarFKDescripciones($this->instrumento_pagos);
			}
			
			//instrumento_pago_logic_add::checkinstrumento_pagoToGets($this->instrumento_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->instrumento_pagos);
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
		$this->instrumento_pagos = array();
		  		  
        try {			
			$this->instrumento_pagos=$this->instrumento_pagoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				instrumento_pago_util::refrescarFKDescripciones($this->instrumento_pagos);
			}	
			
			//instrumento_pago_logic_add::checkinstrumento_pagoToGets($this->instrumento_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->instrumento_pagos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->instrumento_pagos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->instrumento_pagos=$this->instrumento_pagoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				instrumento_pago_util::refrescarFKDescripciones($this->instrumento_pagos);
			}
			
			//instrumento_pago_logic_add::checkinstrumento_pagoToGets($this->instrumento_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->instrumento_pagos);
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
		$this->instrumento_pagos = array();
		  		  
        try {		
			$this->instrumento_pagos=$this->instrumento_pagoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				instrumento_pago_util::refrescarFKDescripciones($this->instrumento_pagos);
			}
			
			//instrumento_pago_logic_add::checkinstrumento_pagoToGets($this->instrumento_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->instrumento_pagos);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_Idcuenta_comprasWithConnection(string $strFinalQuery,Pagination $pagination,int $id_cuenta_compras) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_compras= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_compras->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_compras,instrumento_pago_util::$ID_CUENTA_COMPRAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_compras);

			$this->instrumento_pagos=$this->instrumento_pagoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				instrumento_pago_util::refrescarFKDescripciones($this->instrumento_pagos);
			}
			//instrumento_pago_logic_add::checkinstrumento_pagoToGets($this->instrumento_pagos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->instrumento_pagos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta_compras(string $strFinalQuery,Pagination $pagination,int $id_cuenta_compras) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_compras= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_compras->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_compras,instrumento_pago_util::$ID_CUENTA_COMPRAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_compras);

			$this->instrumento_pagos=$this->instrumento_pagoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				instrumento_pago_util::refrescarFKDescripciones($this->instrumento_pagos);
			}
			//instrumento_pago_logic_add::checkinstrumento_pagoToGets($this->instrumento_pagos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->instrumento_pagos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idcuenta_corrienteWithConnection(string $strFinalQuery,Pagination $pagination,int $id_cuenta_corriente) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_corriente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_corriente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_corriente,instrumento_pago_util::$ID_CUENTA_CORRIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_corriente);

			$this->instrumento_pagos=$this->instrumento_pagoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				instrumento_pago_util::refrescarFKDescripciones($this->instrumento_pagos);
			}
			//instrumento_pago_logic_add::checkinstrumento_pagoToGets($this->instrumento_pagos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->instrumento_pagos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta_corriente(string $strFinalQuery,Pagination $pagination,int $id_cuenta_corriente) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_corriente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_corriente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_corriente,instrumento_pago_util::$ID_CUENTA_CORRIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_corriente);

			$this->instrumento_pagos=$this->instrumento_pagoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				instrumento_pago_util::refrescarFKDescripciones($this->instrumento_pagos);
			}
			//instrumento_pago_logic_add::checkinstrumento_pagoToGets($this->instrumento_pagos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->instrumento_pagos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idcuenta_ventasWithConnection(string $strFinalQuery,Pagination $pagination,int $id_cuenta_ventas) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_ventas= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_ventas->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_ventas,instrumento_pago_util::$ID_CUENTA_VENTAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_ventas);

			$this->instrumento_pagos=$this->instrumento_pagoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				instrumento_pago_util::refrescarFKDescripciones($this->instrumento_pagos);
			}
			//instrumento_pago_logic_add::checkinstrumento_pagoToGets($this->instrumento_pagos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->instrumento_pagos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta_ventas(string $strFinalQuery,Pagination $pagination,int $id_cuenta_ventas) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_ventas= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_ventas->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_ventas,instrumento_pago_util::$ID_CUENTA_VENTAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_ventas);

			$this->instrumento_pagos=$this->instrumento_pagoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				instrumento_pago_util::refrescarFKDescripciones($this->instrumento_pagos);
			}
			//instrumento_pago_logic_add::checkinstrumento_pagoToGets($this->instrumento_pagos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->instrumento_pagos);
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
						
			//instrumento_pago_logic_add::checkinstrumento_pagoToSave($this->instrumento_pago,$this->datosCliente,$this->connexion);	       
			//instrumento_pago_logic_add::updateinstrumento_pagoToSave($this->instrumento_pago);			
			instrumento_pago_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->instrumento_pago,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->instrumento_pagoLogicAdditional->checkGeneralEntityToSave($this,$this->instrumento_pago,$this->datosCliente,$this->connexion);
			
			
			instrumento_pago_data::save($this->instrumento_pago, $this->connexion);	    	       	 				
			//instrumento_pago_logic_add::checkinstrumento_pagoToSaveAfter($this->instrumento_pago,$this->datosCliente,$this->connexion);			
			//$this->instrumento_pagoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->instrumento_pago,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->instrumento_pago,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->instrumento_pago,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				instrumento_pago_util::refrescarFKDescripcion($this->instrumento_pago);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->instrumento_pago->getIsDeleted()) {
				$this->instrumento_pago=null;
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
						
			/*instrumento_pago_logic_add::checkinstrumento_pagoToSave($this->instrumento_pago,$this->datosCliente,$this->connexion);*/	        
			//instrumento_pago_logic_add::updateinstrumento_pagoToSave($this->instrumento_pago);			
			//$this->instrumento_pagoLogicAdditional->checkGeneralEntityToSave($this,$this->instrumento_pago,$this->datosCliente,$this->connexion);			
			instrumento_pago_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->instrumento_pago,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			instrumento_pago_data::save($this->instrumento_pago, $this->connexion);	    	       	 						
			/*instrumento_pago_logic_add::checkinstrumento_pagoToSaveAfter($this->instrumento_pago,$this->datosCliente,$this->connexion);*/			
			//$this->instrumento_pagoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->instrumento_pago,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->instrumento_pago,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->instrumento_pago,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				instrumento_pago_util::refrescarFKDescripcion($this->instrumento_pago);				
			}
			
			if($this->instrumento_pago->getIsDeleted()) {
				$this->instrumento_pago=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(instrumento_pago $instrumento_pago,Connexion $connexion)  {
		$instrumento_pagoLogic = new  instrumento_pago_logic();		  		  
        try {		
			$instrumento_pagoLogic->setConnexion($connexion);			
			$instrumento_pagoLogic->setinstrumento_pago($instrumento_pago);			
			$instrumento_pagoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*instrumento_pago_logic_add::checkinstrumento_pagoToSaves($this->instrumento_pagos,$this->datosCliente,$this->connexion);*/	        	
			//$this->instrumento_pagoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->instrumento_pagos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->instrumento_pagos as $instrumento_pagoLocal) {				
								
				//instrumento_pago_logic_add::updateinstrumento_pagoToSave($instrumento_pagoLocal);	        	
				instrumento_pago_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$instrumento_pagoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				instrumento_pago_data::save($instrumento_pagoLocal, $this->connexion);				
			}
			
			/*instrumento_pago_logic_add::checkinstrumento_pagoToSavesAfter($this->instrumento_pagos,$this->datosCliente,$this->connexion);*/			
			//$this->instrumento_pagoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->instrumento_pagos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				instrumento_pago_util::refrescarFKDescripciones($this->instrumento_pagos);
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
			/*instrumento_pago_logic_add::checkinstrumento_pagoToSaves($this->instrumento_pagos,$this->datosCliente,$this->connexion);*/			
			//$this->instrumento_pagoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->instrumento_pagos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->instrumento_pagos as $instrumento_pagoLocal) {				
								
				//instrumento_pago_logic_add::updateinstrumento_pagoToSave($instrumento_pagoLocal);	        	
				instrumento_pago_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$instrumento_pagoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				instrumento_pago_data::save($instrumento_pagoLocal, $this->connexion);				
			}			
			
			/*instrumento_pago_logic_add::checkinstrumento_pagoToSavesAfter($this->instrumento_pagos,$this->datosCliente,$this->connexion);*/			
			//$this->instrumento_pagoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->instrumento_pagos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				instrumento_pago_util::refrescarFKDescripciones($this->instrumento_pagos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $instrumento_pagos,Connexion $connexion)  {
		$instrumento_pagoLogic = new  instrumento_pago_logic();
		  		  
        try {		
			$instrumento_pagoLogic->setConnexion($connexion);			
			$instrumento_pagoLogic->setinstrumento_pagos($instrumento_pagos);			
			$instrumento_pagoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$instrumento_pagosAux=array();
		
		foreach($this->instrumento_pagos as $instrumento_pago) {
			if($instrumento_pago->getIsDeleted()==false) {
				$instrumento_pagosAux[]=$instrumento_pago;
			}
		}
		
		$this->instrumento_pagos=$instrumento_pagosAux;
	}
	
	public function updateToGetsAuxiliar(array &$instrumento_pagos) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->instrumento_pagos as $instrumento_pago) {
				
				$instrumento_pago->setid_cuenta_compras_Descripcion(instrumento_pago_util::getcuenta_comprasDescripcion($instrumento_pago->getcuenta_compras()));
				$instrumento_pago->setid_cuenta_ventas_Descripcion(instrumento_pago_util::getcuenta_ventasDescripcion($instrumento_pago->getcuenta_ventas()));
				$instrumento_pago->setid_cuenta_corriente_Descripcion(instrumento_pago_util::getcuenta_corrienteDescripcion($instrumento_pago->getcuenta_corriente()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$instrumento_pago_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$instrumento_pago_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$instrumento_pago_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$instrumento_pago_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$instrumento_pago_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$instrumento_pagoForeignKey=new instrumento_pago_param_return();//instrumento_pagoForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_compras',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_comprassFK($this->connexion,$strRecargarFkQuery,$instrumento_pagoForeignKey,$instrumento_pago_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_ventas',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_ventassFK($this->connexion,$strRecargarFkQuery,$instrumento_pagoForeignKey,$instrumento_pago_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_corriente',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_corrientesFK($this->connexion,$strRecargarFkQuery,$instrumento_pagoForeignKey,$instrumento_pago_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_compras',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_comprassFK($this->connexion,' where id=-1 ',$instrumento_pagoForeignKey,$instrumento_pago_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_ventas',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_ventassFK($this->connexion,' where id=-1 ',$instrumento_pagoForeignKey,$instrumento_pago_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_corriente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_corrientesFK($this->connexion,' where id=-1 ',$instrumento_pagoForeignKey,$instrumento_pago_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $instrumento_pagoForeignKey;
			
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
	
	
	public function cargarComboscuenta_comprassFK($connexion=null,$strRecargarFkQuery='',$instrumento_pagoForeignKey,$instrumento_pago_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$instrumento_pagoForeignKey->cuenta_comprassFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($instrumento_pago_session==null) {
			$instrumento_pago_session=new instrumento_pago_session();
		}
		
		if($instrumento_pago_session->bitBusquedaDesdeFKSesioncuenta_compras!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcuenta=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta, '');
				$finalQueryGlobalcuenta.=cuenta_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta.$strRecargarFkQuery;		

				$cuentaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($cuentaLogic->getcuentas() as $cuentaLocal ) {
				if($instrumento_pagoForeignKey->idcuenta_comprasDefaultFK==0) {
					$instrumento_pagoForeignKey->idcuenta_comprasDefaultFK=$cuentaLocal->getId();
				}

				$instrumento_pagoForeignKey->cuenta_comprassFK[$cuentaLocal->getId()]=instrumento_pago_util::getcuenta_comprasDescripcion($cuentaLocal);
			}

		} else {

			if($instrumento_pago_session->bigidcuenta_comprasActual!=null && $instrumento_pago_session->bigidcuenta_comprasActual > 0) {
				$cuentaLogic->getEntity($instrumento_pago_session->bigidcuenta_comprasActual);//WithConnection

				$instrumento_pagoForeignKey->cuenta_comprassFK[$cuentaLogic->getcuenta()->getId()]=instrumento_pago_util::getcuenta_comprasDescripcion($cuentaLogic->getcuenta());
				$instrumento_pagoForeignKey->idcuenta_comprasDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarComboscuenta_ventassFK($connexion=null,$strRecargarFkQuery='',$instrumento_pagoForeignKey,$instrumento_pago_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$instrumento_pagoForeignKey->cuenta_ventassFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($instrumento_pago_session==null) {
			$instrumento_pago_session=new instrumento_pago_session();
		}
		
		if($instrumento_pago_session->bitBusquedaDesdeFKSesioncuenta_ventas!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcuenta=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta, '');
				$finalQueryGlobalcuenta.=cuenta_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta.$strRecargarFkQuery;		

				$cuentaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($cuentaLogic->getcuentas() as $cuentaLocal ) {
				if($instrumento_pagoForeignKey->idcuenta_ventasDefaultFK==0) {
					$instrumento_pagoForeignKey->idcuenta_ventasDefaultFK=$cuentaLocal->getId();
				}

				$instrumento_pagoForeignKey->cuenta_ventassFK[$cuentaLocal->getId()]=instrumento_pago_util::getcuenta_ventasDescripcion($cuentaLocal);
			}

		} else {

			if($instrumento_pago_session->bigidcuenta_ventasActual!=null && $instrumento_pago_session->bigidcuenta_ventasActual > 0) {
				$cuentaLogic->getEntity($instrumento_pago_session->bigidcuenta_ventasActual);//WithConnection

				$instrumento_pagoForeignKey->cuenta_ventassFK[$cuentaLogic->getcuenta()->getId()]=instrumento_pago_util::getcuenta_ventasDescripcion($cuentaLogic->getcuenta());
				$instrumento_pagoForeignKey->idcuenta_ventasDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarComboscuenta_corrientesFK($connexion=null,$strRecargarFkQuery='',$instrumento_pagoForeignKey,$instrumento_pago_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuenta_corrienteLogic= new cuenta_corriente_logic();
		$pagination= new Pagination();
		$instrumento_pagoForeignKey->cuenta_corrientesFK=array();

		$cuenta_corrienteLogic->setConnexion($connexion);
		$cuenta_corrienteLogic->getcuenta_corrienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($instrumento_pago_session==null) {
			$instrumento_pago_session=new instrumento_pago_session();
		}
		
		if($instrumento_pago_session->bitBusquedaDesdeFKSesioncuenta_corriente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_corriente_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcuenta_corriente=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta_corriente=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta_corriente, '');
				$finalQueryGlobalcuenta_corriente.=cuenta_corriente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta_corriente.$strRecargarFkQuery;		

				$cuenta_corrienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($cuenta_corrienteLogic->getcuenta_corrientes() as $cuenta_corrienteLocal ) {
				if($instrumento_pagoForeignKey->idcuenta_corrienteDefaultFK==0) {
					$instrumento_pagoForeignKey->idcuenta_corrienteDefaultFK=$cuenta_corrienteLocal->getId();
				}

				$instrumento_pagoForeignKey->cuenta_corrientesFK[$cuenta_corrienteLocal->getId()]=instrumento_pago_util::getcuenta_corrienteDescripcion($cuenta_corrienteLocal);
			}

		} else {

			if($instrumento_pago_session->bigidcuenta_corrienteActual!=null && $instrumento_pago_session->bigidcuenta_corrienteActual > 0) {
				$cuenta_corrienteLogic->getEntity($instrumento_pago_session->bigidcuenta_corrienteActual);//WithConnection

				$instrumento_pagoForeignKey->cuenta_corrientesFK[$cuenta_corrienteLogic->getcuenta_corriente()->getId()]=instrumento_pago_util::getcuenta_corrienteDescripcion($cuenta_corrienteLogic->getcuenta_corriente());
				$instrumento_pagoForeignKey->idcuenta_corrienteDefaultFK=$cuenta_corrienteLogic->getcuenta_corriente()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($instrumento_pago) {
		$this->saveRelacionesBase($instrumento_pago,true);
	}

	public function saveRelaciones($instrumento_pago) {
		$this->saveRelacionesBase($instrumento_pago,false);
	}

	public function saveRelacionesBase($instrumento_pago,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setinstrumento_pago($instrumento_pago);

			if(true) {

				//instrumento_pago_logic_add::updateRelacionesToSave($instrumento_pago,$this);

				if(($this->instrumento_pago->getIsNew() || $this->instrumento_pago->getIsChanged()) && !$this->instrumento_pago->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->instrumento_pago->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//instrumento_pago_logic_add::updateRelacionesToSaveAfter($instrumento_pago,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $instrumento_pagos,instrumento_pago_param_return $instrumento_pagoParameterGeneral) : instrumento_pago_param_return {
		$instrumento_pagoReturnGeneral=new instrumento_pago_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $instrumento_pagoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $instrumento_pagos,instrumento_pago_param_return $instrumento_pagoParameterGeneral) : instrumento_pago_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$instrumento_pagoReturnGeneral=new instrumento_pago_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $instrumento_pagoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $instrumento_pagos,instrumento_pago $instrumento_pago,instrumento_pago_param_return $instrumento_pagoParameterGeneral,bool $isEsNuevoinstrumento_pago,array $clases) : instrumento_pago_param_return {
		 try {	
			$instrumento_pagoReturnGeneral=new instrumento_pago_param_return();
	
			$instrumento_pagoReturnGeneral->setinstrumento_pago($instrumento_pago);
			$instrumento_pagoReturnGeneral->setinstrumento_pagos($instrumento_pagos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$instrumento_pagoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $instrumento_pagoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $instrumento_pagos,instrumento_pago $instrumento_pago,instrumento_pago_param_return $instrumento_pagoParameterGeneral,bool $isEsNuevoinstrumento_pago,array $clases) : instrumento_pago_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$instrumento_pagoReturnGeneral=new instrumento_pago_param_return();
	
			$instrumento_pagoReturnGeneral->setinstrumento_pago($instrumento_pago);
			$instrumento_pagoReturnGeneral->setinstrumento_pagos($instrumento_pagos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$instrumento_pagoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $instrumento_pagoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $instrumento_pagos,instrumento_pago $instrumento_pago,instrumento_pago_param_return $instrumento_pagoParameterGeneral,bool $isEsNuevoinstrumento_pago,array $clases) : instrumento_pago_param_return {
		 try {	
			$instrumento_pagoReturnGeneral=new instrumento_pago_param_return();
	
			$instrumento_pagoReturnGeneral->setinstrumento_pago($instrumento_pago);
			$instrumento_pagoReturnGeneral->setinstrumento_pagos($instrumento_pagos);
			
			
			
			return $instrumento_pagoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $instrumento_pagos,instrumento_pago $instrumento_pago,instrumento_pago_param_return $instrumento_pagoParameterGeneral,bool $isEsNuevoinstrumento_pago,array $clases) : instrumento_pago_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$instrumento_pagoReturnGeneral=new instrumento_pago_param_return();
	
			$instrumento_pagoReturnGeneral->setinstrumento_pago($instrumento_pago);
			$instrumento_pagoReturnGeneral->setinstrumento_pagos($instrumento_pagos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $instrumento_pagoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,instrumento_pago $instrumento_pago,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,instrumento_pago $instrumento_pago,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		instrumento_pago_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(instrumento_pago $instrumento_pago,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//instrumento_pago_logic_add::updateinstrumento_pagoToGet($this->instrumento_pago);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$instrumento_pago->setcuenta_compras($this->instrumento_pagoDataAccess->getcuenta_compras($this->connexion,$instrumento_pago));
		$instrumento_pago->setcuenta_ventas($this->instrumento_pagoDataAccess->getcuenta_ventas($this->connexion,$instrumento_pago));
		$instrumento_pago->setcuenta_corriente($this->instrumento_pagoDataAccess->getcuenta_corriente($this->connexion,$instrumento_pago));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compras') {
				$instrumento_pago->setcuenta_compras($this->instrumento_pagoDataAccess->getcuenta_compras($this->connexion,$instrumento_pago));
				continue;
			}

			if($clas->clas==cuenta::$class.'_ventas') {
				$instrumento_pago->setcuenta_ventas($this->instrumento_pagoDataAccess->getcuenta_ventas($this->connexion,$instrumento_pago));
				continue;
			}

			if($clas->clas==cuenta_corriente::$class.'') {
				$instrumento_pago->setcuenta_corriente($this->instrumento_pagoDataAccess->getcuenta_corriente($this->connexion,$instrumento_pago));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$instrumento_pago->setcuenta_compras($this->instrumento_pagoDataAccess->getcuenta_compras($this->connexion,$instrumento_pago));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$instrumento_pago->setcuenta_ventas($this->instrumento_pagoDataAccess->getcuenta_ventas($this->connexion,$instrumento_pago));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$instrumento_pago->setcuenta_corriente($this->instrumento_pagoDataAccess->getcuenta_corriente($this->connexion,$instrumento_pago));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$instrumento_pago->setcuenta_compras($this->instrumento_pagoDataAccess->getcuenta_compras($this->connexion,$instrumento_pago));
		$cuenta_comprasLogic= new cuenta_logic($this->connexion);
		$cuenta_comprasLogic->deepLoad($instrumento_pago->getcuenta_compras(),$isDeep,$deepLoadType,$clases);
				
		$instrumento_pago->setcuenta_ventas($this->instrumento_pagoDataAccess->getcuenta_ventas($this->connexion,$instrumento_pago));
		$cuenta_ventasLogic= new cuenta_logic($this->connexion);
		$cuenta_ventasLogic->deepLoad($instrumento_pago->getcuenta_ventas(),$isDeep,$deepLoadType,$clases);
				
		$instrumento_pago->setcuenta_corriente($this->instrumento_pagoDataAccess->getcuenta_corriente($this->connexion,$instrumento_pago));
		$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
		$cuenta_corrienteLogic->deepLoad($instrumento_pago->getcuenta_corriente(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compras') {
				$instrumento_pago->setcuenta_compras($this->instrumento_pagoDataAccess->getcuenta_compras($this->connexion,$instrumento_pago));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($instrumento_pago->getcuenta_compras(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_ventas') {
				$instrumento_pago->setcuenta_ventas($this->instrumento_pagoDataAccess->getcuenta_ventas($this->connexion,$instrumento_pago));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($instrumento_pago->getcuenta_ventas(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta_corriente::$class.'') {
				$instrumento_pago->setcuenta_corriente($this->instrumento_pagoDataAccess->getcuenta_corriente($this->connexion,$instrumento_pago));
				$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
				$cuenta_corrienteLogic->deepLoad($instrumento_pago->getcuenta_corriente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$instrumento_pago->setcuenta_compras($this->instrumento_pagoDataAccess->getcuenta_compras($this->connexion,$instrumento_pago));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($instrumento_pago->getcuenta_compras(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$instrumento_pago->setcuenta_ventas($this->instrumento_pagoDataAccess->getcuenta_ventas($this->connexion,$instrumento_pago));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($instrumento_pago->getcuenta_ventas(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$instrumento_pago->setcuenta_corriente($this->instrumento_pagoDataAccess->getcuenta_corriente($this->connexion,$instrumento_pago));
			$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
			$cuenta_corrienteLogic->deepLoad($instrumento_pago->getcuenta_corriente(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(instrumento_pago $instrumento_pago,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//instrumento_pago_logic_add::updateinstrumento_pagoToSave($this->instrumento_pago);			
			
			if(!$paraDeleteCascade) {				
				instrumento_pago_data::save($instrumento_pago, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		cuenta_data::save($instrumento_pago->getcuenta_compras(),$this->connexion);
		cuenta_data::save($instrumento_pago->getcuenta_ventas(),$this->connexion);
		cuenta_corriente_data::save($instrumento_pago->getcuenta_corriente(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compras') {
				cuenta_data::save($instrumento_pago->getcuenta_compras(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'_ventas') {
				cuenta_data::save($instrumento_pago->getcuenta_ventas(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta_corriente::$class.'') {
				cuenta_corriente_data::save($instrumento_pago->getcuenta_corriente(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($instrumento_pago->getcuenta_compras(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($instrumento_pago->getcuenta_ventas(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_corriente_data::save($instrumento_pago->getcuenta_corriente(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		cuenta_data::save($instrumento_pago->getcuenta_compras(),$this->connexion);
		$cuenta_comprasLogic= new cuenta_logic($this->connexion);
		$cuenta_comprasLogic->deepSave($instrumento_pago->getcuenta_compras(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($instrumento_pago->getcuenta_ventas(),$this->connexion);
		$cuenta_ventasLogic= new cuenta_logic($this->connexion);
		$cuenta_ventasLogic->deepSave($instrumento_pago->getcuenta_ventas(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_corriente_data::save($instrumento_pago->getcuenta_corriente(),$this->connexion);
		$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
		$cuenta_corrienteLogic->deepSave($instrumento_pago->getcuenta_corriente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compras') {
				cuenta_data::save($instrumento_pago->getcuenta_compras(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($instrumento_pago->getcuenta_compras(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_ventas') {
				cuenta_data::save($instrumento_pago->getcuenta_ventas(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($instrumento_pago->getcuenta_ventas(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta_corriente::$class.'') {
				cuenta_corriente_data::save($instrumento_pago->getcuenta_corriente(),$this->connexion);
				$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
				$cuenta_corrienteLogic->deepSave($instrumento_pago->getcuenta_corriente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($instrumento_pago->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($instrumento_pago->getcuenta_compras(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($instrumento_pago->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($instrumento_pago->getcuenta_ventas(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_corriente_data::save($instrumento_pago->getcuenta_corriente(),$this->connexion);
			$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
			$cuenta_corrienteLogic->deepSave($instrumento_pago->getcuenta_corriente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				instrumento_pago_data::save($instrumento_pago, $this->connexion);
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
			
			$this->deepLoad($this->instrumento_pago,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->instrumento_pagos as $instrumento_pago) {
				$this->deepLoad($instrumento_pago,$isDeep,$deepLoadType,$clases);
								
				instrumento_pago_util::refrescarFKDescripciones($this->instrumento_pagos);
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
			
			foreach($this->instrumento_pagos as $instrumento_pago) {
				$this->deepLoad($instrumento_pago,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->instrumento_pago,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->instrumento_pagos as $instrumento_pago) {
				$this->deepSave($instrumento_pago,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->instrumento_pagos as $instrumento_pago) {
				$this->deepSave($instrumento_pago,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(cuenta_corriente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta::$class) {
						$classes[]=new Classe(cuenta::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta::$class) {
						$classes[]=new Classe(cuenta::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta_corriente::$class) {
						$classes[]=new Classe(cuenta_corriente::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta_corriente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_corriente::$class);
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
	
	
	
	
	
	
	
	public function getinstrumento_pago() : ?instrumento_pago {	
		/*
		instrumento_pago_logic_add::checkinstrumento_pagoToGet($this->instrumento_pago,$this->datosCliente);
		instrumento_pago_logic_add::updateinstrumento_pagoToGet($this->instrumento_pago);
		*/
			
		return $this->instrumento_pago;
	}
		
	public function setinstrumento_pago(instrumento_pago $newinstrumento_pago) {
		$this->instrumento_pago = $newinstrumento_pago;
	}
	
	public function getinstrumento_pagos() : array {		
		/*
		instrumento_pago_logic_add::checkinstrumento_pagoToGets($this->instrumento_pagos,$this->datosCliente);
		
		foreach ($this->instrumento_pagos as $instrumento_pagoLocal ) {
			instrumento_pago_logic_add::updateinstrumento_pagoToGet($instrumento_pagoLocal);
		}
		*/
		
		return $this->instrumento_pagos;
	}
	
	public function setinstrumento_pagos(array $newinstrumento_pagos) {
		$this->instrumento_pagos = $newinstrumento_pagos;
	}
	
	public function getinstrumento_pagoDataAccess() : instrumento_pago_data {
		return $this->instrumento_pagoDataAccess;
	}
	
	public function setinstrumento_pagoDataAccess(instrumento_pago_data $newinstrumento_pagoDataAccess) {
		$this->instrumento_pagoDataAccess = $newinstrumento_pagoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        instrumento_pago_carga::$CONTROLLER;;        
		
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
