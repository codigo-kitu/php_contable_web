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

namespace com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\util\estado_cuentas_corrientes_carga;
use com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\util\estado_cuentas_corrientes_param_return;


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

use com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\util\estado_cuentas_corrientes_util;
use com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\business\entity\estado_cuentas_corrientes;
use com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\business\data\estado_cuentas_corrientes_data;

//FK


//REL


use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\data\cuenta_corriente_data;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;

//REL DETALLES

use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\util\retiro_cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\util\deposito_cuenta_corriente_carga;



class estado_cuentas_corrientes_logic  extends GeneralEntityLogic implements estado_cuentas_corrientes_logicI {	
	/*GENERAL*/
	public estado_cuentas_corrientes_data $estado_cuentas_corrientesDataAccess;
	public ?estado_cuentas_corrientes_logic_add $estado_cuentas_corrientesLogicAdditional=null;
	public ?estado_cuentas_corrientes $estado_cuentas_corrientes;
	public array $estado_cuentas_corrientess;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->estado_cuentas_corrientesDataAccess = new estado_cuentas_corrientes_data();			
			$this->estado_cuentas_corrientess = array();
			$this->estado_cuentas_corrientes = new estado_cuentas_corrientes();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->estado_cuentas_corrientesLogicAdditional = new estado_cuentas_corrientes_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->estado_cuentas_corrientesLogicAdditional==null) {
			$this->estado_cuentas_corrientesLogicAdditional=new estado_cuentas_corrientes_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->estado_cuentas_corrientesDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->estado_cuentas_corrientesDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->estado_cuentas_corrientesDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->estado_cuentas_corrientesDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->estado_cuentas_corrientess = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_cuentas_corrientess=$this->estado_cuentas_corrientesDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_corrientes_util::refrescarFKDescripciones($this->estado_cuentas_corrientess);
			}
			
			estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToGets($this->estado_cuentas_corrientess,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_corrientess);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->estado_cuentas_corrientess = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_cuentas_corrientess=$this->estado_cuentas_corrientesDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_corrientes_util::refrescarFKDescripciones($this->estado_cuentas_corrientess);
			}
			
			estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToGets($this->estado_cuentas_corrientess,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_corrientess);
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
		$this->estado_cuentas_corrientes = new estado_cuentas_corrientes();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->estado_cuentas_corrientes=$this->estado_cuentas_corrientesDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->estado_cuentas_corrientes,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estado_cuentas_corrientes_util::refrescarFKDescripcion($this->estado_cuentas_corrientes);
			}
						
			estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToGet($this->estado_cuentas_corrientes,$this->datosCliente);
			estado_cuentas_corrientes_logic_add::updateestado_cuentas_corrientesToGet($this->estado_cuentas_corrientes);
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
		$this->estado_cuentas_corrientes = new  estado_cuentas_corrientes();
		  		  
        try {		
			$this->estado_cuentas_corrientes=$this->estado_cuentas_corrientesDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->estado_cuentas_corrientes,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estado_cuentas_corrientes_util::refrescarFKDescripcion($this->estado_cuentas_corrientes);
			}
			
			estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToGet($this->estado_cuentas_corrientes,$this->datosCliente);
			estado_cuentas_corrientes_logic_add::updateestado_cuentas_corrientesToGet($this->estado_cuentas_corrientes);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?estado_cuentas_corrientes {
		$estado_cuentas_corrientesLogic = new  estado_cuentas_corrientes_logic();
		  		  
        try {		
			$estado_cuentas_corrientesLogic->setConnexion($connexion);			
			$estado_cuentas_corrientesLogic->getEntity($id);			
			return $estado_cuentas_corrientesLogic->getestado_cuentas_corrientes();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->estado_cuentas_corrientes = new  estado_cuentas_corrientes();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->estado_cuentas_corrientes=$this->estado_cuentas_corrientesDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->estado_cuentas_corrientes,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estado_cuentas_corrientes_util::refrescarFKDescripcion($this->estado_cuentas_corrientes);
			}
			
			estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToGet($this->estado_cuentas_corrientes,$this->datosCliente);
			estado_cuentas_corrientes_logic_add::updateestado_cuentas_corrientesToGet($this->estado_cuentas_corrientes);
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
		$this->estado_cuentas_corrientes = new  estado_cuentas_corrientes();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_cuentas_corrientes=$this->estado_cuentas_corrientesDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->estado_cuentas_corrientes,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estado_cuentas_corrientes_util::refrescarFKDescripcion($this->estado_cuentas_corrientes);
			}
			
			estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToGet($this->estado_cuentas_corrientes,$this->datosCliente);
			estado_cuentas_corrientes_logic_add::updateestado_cuentas_corrientesToGet($this->estado_cuentas_corrientes);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?estado_cuentas_corrientes {
		$estado_cuentas_corrientesLogic = new  estado_cuentas_corrientes_logic();
		  		  
        try {		
			$estado_cuentas_corrientesLogic->setConnexion($connexion);			
			$estado_cuentas_corrientesLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $estado_cuentas_corrientesLogic->getestado_cuentas_corrientes();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->estado_cuentas_corrientess = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->estado_cuentas_corrientess=$this->estado_cuentas_corrientesDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_corrientes_util::refrescarFKDescripciones($this->estado_cuentas_corrientess);
			}
			
			estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToGets($this->estado_cuentas_corrientess,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_corrientess);			
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
		$this->estado_cuentas_corrientess = array();
		  		  
        try {			
			$this->estado_cuentas_corrientess=$this->estado_cuentas_corrientesDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_corrientes_util::refrescarFKDescripciones($this->estado_cuentas_corrientess);
			}
			
			estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToGets($this->estado_cuentas_corrientess,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_corrientess);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->estado_cuentas_corrientess = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_cuentas_corrientess=$this->estado_cuentas_corrientesDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_corrientes_util::refrescarFKDescripciones($this->estado_cuentas_corrientess);
			}
			
			estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToGets($this->estado_cuentas_corrientess,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_corrientess);
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
		$this->estado_cuentas_corrientess = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_cuentas_corrientess=$this->estado_cuentas_corrientesDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_corrientes_util::refrescarFKDescripciones($this->estado_cuentas_corrientess);
			}
			
			estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToGets($this->estado_cuentas_corrientess,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_corrientess);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$estado_cuentas_corrientesLogic = new  estado_cuentas_corrientes_logic();
		  		  
        try {		
			$estado_cuentas_corrientesLogic->setConnexion($connexion);			
			$estado_cuentas_corrientesLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $estado_cuentas_corrientesLogic->getestado_cuentas_corrientess();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->estado_cuentas_corrientess = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->estado_cuentas_corrientess=$this->estado_cuentas_corrientesDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_corrientes_util::refrescarFKDescripciones($this->estado_cuentas_corrientess);
			}
			
			estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToGets($this->estado_cuentas_corrientess,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_corrientess);
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
		$this->estado_cuentas_corrientess = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_cuentas_corrientess=$this->estado_cuentas_corrientesDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_corrientes_util::refrescarFKDescripciones($this->estado_cuentas_corrientess);
			}
			
			estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToGets($this->estado_cuentas_corrientess,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_corrientess);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->estado_cuentas_corrientess = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_cuentas_corrientess=$this->estado_cuentas_corrientesDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_corrientes_util::refrescarFKDescripciones($this->estado_cuentas_corrientess);
			}
			
			estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToGets($this->estado_cuentas_corrientess,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_corrientess);
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
		$this->estado_cuentas_corrientess = array();
		  		  
        try {			
			$this->estado_cuentas_corrientess=$this->estado_cuentas_corrientesDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_corrientes_util::refrescarFKDescripciones($this->estado_cuentas_corrientess);
			}	
			
			estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToGets($this->estado_cuentas_corrientess,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_corrientess);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->estado_cuentas_corrientess = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->estado_cuentas_corrientess=$this->estado_cuentas_corrientesDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_corrientes_util::refrescarFKDescripciones($this->estado_cuentas_corrientess);
			}
			
			estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToGets($this->estado_cuentas_corrientess,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_corrientess);
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
		$this->estado_cuentas_corrientess = array();
		  		  
        try {		
			$this->estado_cuentas_corrientess=$this->estado_cuentas_corrientesDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_corrientes_util::refrescarFKDescripciones($this->estado_cuentas_corrientess);
			}
			
			estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToGets($this->estado_cuentas_corrientess,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_corrientess);

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
						
			//estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToSave($this->estado_cuentas_corrientes,$this->datosCliente,$this->connexion);	       
			estado_cuentas_corrientes_logic_add::updateestado_cuentas_corrientesToSave($this->estado_cuentas_corrientes);			
			estado_cuentas_corrientes_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->estado_cuentas_corrientes,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->estado_cuentas_corrientesLogicAdditional->checkGeneralEntityToSave($this,$this->estado_cuentas_corrientes,$this->datosCliente,$this->connexion);
			
			
			estado_cuentas_corrientes_data::save($this->estado_cuentas_corrientes, $this->connexion);	    	       	 				
			//estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToSaveAfter($this->estado_cuentas_corrientes,$this->datosCliente,$this->connexion);			
			$this->estado_cuentas_corrientesLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->estado_cuentas_corrientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->estado_cuentas_corrientes,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->estado_cuentas_corrientes,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				estado_cuentas_corrientes_util::refrescarFKDescripcion($this->estado_cuentas_corrientes);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->estado_cuentas_corrientes->getIsDeleted()) {
				$this->estado_cuentas_corrientes=null;
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
						
			/*estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToSave($this->estado_cuentas_corrientes,$this->datosCliente,$this->connexion);*/	        
			estado_cuentas_corrientes_logic_add::updateestado_cuentas_corrientesToSave($this->estado_cuentas_corrientes);			
			$this->estado_cuentas_corrientesLogicAdditional->checkGeneralEntityToSave($this,$this->estado_cuentas_corrientes,$this->datosCliente,$this->connexion);			
			estado_cuentas_corrientes_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->estado_cuentas_corrientes,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			estado_cuentas_corrientes_data::save($this->estado_cuentas_corrientes, $this->connexion);	    	       	 						
			/*estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToSaveAfter($this->estado_cuentas_corrientes,$this->datosCliente,$this->connexion);*/			
			$this->estado_cuentas_corrientesLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->estado_cuentas_corrientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->estado_cuentas_corrientes,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->estado_cuentas_corrientes,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				estado_cuentas_corrientes_util::refrescarFKDescripcion($this->estado_cuentas_corrientes);				
			}
			
			if($this->estado_cuentas_corrientes->getIsDeleted()) {
				$this->estado_cuentas_corrientes=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(estado_cuentas_corrientes $estado_cuentas_corrientes,Connexion $connexion)  {
		$estado_cuentas_corrientesLogic = new  estado_cuentas_corrientes_logic();		  		  
        try {		
			$estado_cuentas_corrientesLogic->setConnexion($connexion);			
			$estado_cuentas_corrientesLogic->setestado_cuentas_corrientes($estado_cuentas_corrientes);			
			$estado_cuentas_corrientesLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToSaves($this->estado_cuentas_corrientess,$this->datosCliente,$this->connexion);*/	        	
			$this->estado_cuentas_corrientesLogicAdditional->checkGeneralEntitiesToSaves($this,$this->estado_cuentas_corrientess,$this->datosCliente,$this->connexion);
			
	   		foreach($this->estado_cuentas_corrientess as $estado_cuentas_corrientesLocal) {				
								
				estado_cuentas_corrientes_logic_add::updateestado_cuentas_corrientesToSave($estado_cuentas_corrientesLocal);	        	
				estado_cuentas_corrientes_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$estado_cuentas_corrientesLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				estado_cuentas_corrientes_data::save($estado_cuentas_corrientesLocal, $this->connexion);				
			}
			
			/*estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToSavesAfter($this->estado_cuentas_corrientess,$this->datosCliente,$this->connexion);*/			
			$this->estado_cuentas_corrientesLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->estado_cuentas_corrientess,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_corrientes_util::refrescarFKDescripciones($this->estado_cuentas_corrientess);
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
			/*estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToSaves($this->estado_cuentas_corrientess,$this->datosCliente,$this->connexion);*/			
			$this->estado_cuentas_corrientesLogicAdditional->checkGeneralEntitiesToSaves($this,$this->estado_cuentas_corrientess,$this->datosCliente,$this->connexion);
			
	   		foreach($this->estado_cuentas_corrientess as $estado_cuentas_corrientesLocal) {				
								
				estado_cuentas_corrientes_logic_add::updateestado_cuentas_corrientesToSave($estado_cuentas_corrientesLocal);	        	
				estado_cuentas_corrientes_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$estado_cuentas_corrientesLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				estado_cuentas_corrientes_data::save($estado_cuentas_corrientesLocal, $this->connexion);				
			}			
			
			/*estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToSavesAfter($this->estado_cuentas_corrientess,$this->datosCliente,$this->connexion);*/			
			$this->estado_cuentas_corrientesLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->estado_cuentas_corrientess,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_corrientes_util::refrescarFKDescripciones($this->estado_cuentas_corrientess);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $estado_cuentas_corrientess,Connexion $connexion)  {
		$estado_cuentas_corrientesLogic = new  estado_cuentas_corrientes_logic();
		  		  
        try {		
			$estado_cuentas_corrientesLogic->setConnexion($connexion);			
			$estado_cuentas_corrientesLogic->setestado_cuentas_corrientess($estado_cuentas_corrientess);			
			$estado_cuentas_corrientesLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$estado_cuentas_corrientessAux=array();
		
		foreach($this->estado_cuentas_corrientess as $estado_cuentas_corrientes) {
			if($estado_cuentas_corrientes->getIsDeleted()==false) {
				$estado_cuentas_corrientessAux[]=$estado_cuentas_corrientes;
			}
		}
		
		$this->estado_cuentas_corrientess=$estado_cuentas_corrientessAux;
	}
	
	public function updateToGetsAuxiliar(array &$estado_cuentas_corrientess) {
		if($this->estado_cuentas_corrientesLogicAdditional==null) {
			$this->estado_cuentas_corrientesLogicAdditional=new estado_cuentas_corrientes_logic_add();
		}
		
		
		$this->estado_cuentas_corrientesLogicAdditional->updateToGets($estado_cuentas_corrientess,$this);					
		$this->estado_cuentas_corrientesLogicAdditional->updateToGetsReferencia($estado_cuentas_corrientess,$this);			
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
	
	
	
	public function saveRelacionesWithConnection($estado_cuentas_corrientes,$cuentacorrientes) {
		$this->saveRelacionesBase($estado_cuentas_corrientes,$cuentacorrientes,true);
	}

	public function saveRelaciones($estado_cuentas_corrientes,$cuentacorrientes) {
		$this->saveRelacionesBase($estado_cuentas_corrientes,$cuentacorrientes,false);
	}

	public function saveRelacionesBase($estado_cuentas_corrientes,$cuentacorrientes=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$estado_cuentas_corrientes->setcuenta_corrientes($cuentacorrientes);
			$this->setestado_cuentas_corrientes($estado_cuentas_corrientes);

				if(($this->estado_cuentas_corrientes->getIsNew() || $this->estado_cuentas_corrientes->getIsChanged()) && !$this->estado_cuentas_corrientes->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($cuentacorrientes);

				} else if($this->estado_cuentas_corrientes->getIsDeleted()) {
					$this->saveRelacionesDetalles($cuentacorrientes);
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
	
	
	public function saveRelacionesDetalles($cuentacorrientes=array()) {
		try {
	

			$idestado_cuentas_corrientesActual=$this->getestado_cuentas_corrientes()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/util/cuenta_corriente_carga.php');
			cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cuentacorrienteLogic_Desde_estado_cuentas_corrientes=new cuenta_corriente_logic();
			$cuentacorrienteLogic_Desde_estado_cuentas_corrientes->setcuenta_corrientes($cuentacorrientes);

			$cuentacorrienteLogic_Desde_estado_cuentas_corrientes->setConnexion($this->getConnexion());
			$cuentacorrienteLogic_Desde_estado_cuentas_corrientes->setDatosCliente($this->datosCliente);

			foreach($cuentacorrienteLogic_Desde_estado_cuentas_corrientes->getcuenta_corrientes() as $cuentacorriente_Desde_estado_cuentas_corrientes) {
				$cuentacorriente_Desde_estado_cuentas_corrientes->setid_estado_cuentas_corrientes($idestado_cuentas_corrientesActual);

				$cuentacorrienteLogic_Desde_estado_cuentas_corrientes->setcuenta_corriente($cuentacorriente_Desde_estado_cuentas_corrientes);
				$cuentacorrienteLogic_Desde_estado_cuentas_corrientes->save();

				$idcuenta_corrienteActual=$cuenta_corriente_Desde_estado_cuentas_corrientes->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/util/cheque_cuenta_corriente_carga.php');
				cheque_cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$chequecuentacorrienteLogic_Desde_cuenta_corriente=new cheque_cuenta_corriente_logic();

				if($cuenta_corriente_Desde_estado_cuentas_corrientes->getcheque_cuenta_corrientes()==null){
					$cuenta_corriente_Desde_estado_cuentas_corrientes->setcheque_cuenta_corrientes(array());
				}

				$chequecuentacorrienteLogic_Desde_cuenta_corriente->setcheque_cuenta_corrientes($cuenta_corriente_Desde_estado_cuentas_corrientes->getcheque_cuenta_corrientes());

				$chequecuentacorrienteLogic_Desde_cuenta_corriente->setConnexion($this->getConnexion());
				$chequecuentacorrienteLogic_Desde_cuenta_corriente->setDatosCliente($this->datosCliente);

				foreach($chequecuentacorrienteLogic_Desde_cuenta_corriente->getcheque_cuenta_corrientes() as $chequecuentacorriente_Desde_cuenta_corriente) {
					$chequecuentacorriente_Desde_cuenta_corriente->setid_cuenta_corriente($idcuenta_corrienteActual);
				}

				$chequecuentacorrienteLogic_Desde_cuenta_corriente->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/util/retiro_cuenta_corriente_carga.php');
				retiro_cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$retirocuentacorrienteLogic_Desde_cuenta_corriente=new retiro_cuenta_corriente_logic();

				if($cuenta_corriente_Desde_estado_cuentas_corrientes->getretiro_cuenta_corrientes()==null){
					$cuenta_corriente_Desde_estado_cuentas_corrientes->setretiro_cuenta_corrientes(array());
				}

				$retirocuentacorrienteLogic_Desde_cuenta_corriente->setretiro_cuenta_corrientes($cuenta_corriente_Desde_estado_cuentas_corrientes->getretiro_cuenta_corrientes());

				$retirocuentacorrienteLogic_Desde_cuenta_corriente->setConnexion($this->getConnexion());
				$retirocuentacorrienteLogic_Desde_cuenta_corriente->setDatosCliente($this->datosCliente);

				foreach($retirocuentacorrienteLogic_Desde_cuenta_corriente->getretiro_cuenta_corrientes() as $retirocuentacorriente_Desde_cuenta_corriente) {
					$retirocuentacorriente_Desde_cuenta_corriente->setid_cuenta_corriente($idcuenta_corrienteActual);
				}

				$retirocuentacorrienteLogic_Desde_cuenta_corriente->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/util/deposito_cuenta_corriente_carga.php');
				deposito_cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$depositocuentacorrienteLogic_Desde_cuenta_corriente=new deposito_cuenta_corriente_logic();

				if($cuenta_corriente_Desde_estado_cuentas_corrientes->getdeposito_cuenta_corrientes()==null){
					$cuenta_corriente_Desde_estado_cuentas_corrientes->setdeposito_cuenta_corrientes(array());
				}

				$depositocuentacorrienteLogic_Desde_cuenta_corriente->setdeposito_cuenta_corrientes($cuenta_corriente_Desde_estado_cuentas_corrientes->getdeposito_cuenta_corrientes());

				$depositocuentacorrienteLogic_Desde_cuenta_corriente->setConnexion($this->getConnexion());
				$depositocuentacorrienteLogic_Desde_cuenta_corriente->setDatosCliente($this->datosCliente);

				foreach($depositocuentacorrienteLogic_Desde_cuenta_corriente->getdeposito_cuenta_corrientes() as $depositocuentacorriente_Desde_cuenta_corriente) {
					$depositocuentacorriente_Desde_cuenta_corriente->setid_cuenta_corriente($idcuenta_corrienteActual);
				}

				$depositocuentacorrienteLogic_Desde_cuenta_corriente->saves();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $estado_cuentas_corrientess,estado_cuentas_corrientes_param_return $estado_cuentas_corrientesParameterGeneral) : estado_cuentas_corrientes_param_return {
		$estado_cuentas_corrientesReturnGeneral=new estado_cuentas_corrientes_param_return();
	
		 try {	
			
			if($this->estado_cuentas_corrientesLogicAdditional==null) {
				$this->estado_cuentas_corrientesLogicAdditional=new estado_cuentas_corrientes_logic_add();
			}
			
			$this->estado_cuentas_corrientesLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$estado_cuentas_corrientess,$estado_cuentas_corrientesParameterGeneral,$estado_cuentas_corrientesReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $estado_cuentas_corrientesReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $estado_cuentas_corrientess,estado_cuentas_corrientes_param_return $estado_cuentas_corrientesParameterGeneral) : estado_cuentas_corrientes_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$estado_cuentas_corrientesReturnGeneral=new estado_cuentas_corrientes_param_return();
	
			
			if($this->estado_cuentas_corrientesLogicAdditional==null) {
				$this->estado_cuentas_corrientesLogicAdditional=new estado_cuentas_corrientes_logic_add();
			}
			
			$this->estado_cuentas_corrientesLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$estado_cuentas_corrientess,$estado_cuentas_corrientesParameterGeneral,$estado_cuentas_corrientesReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $estado_cuentas_corrientesReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estado_cuentas_corrientess,estado_cuentas_corrientes $estado_cuentas_corrientes,estado_cuentas_corrientes_param_return $estado_cuentas_corrientesParameterGeneral,bool $isEsNuevoestado_cuentas_corrientes,array $clases) : estado_cuentas_corrientes_param_return {
		 try {	
			$estado_cuentas_corrientesReturnGeneral=new estado_cuentas_corrientes_param_return();
	
			$estado_cuentas_corrientesReturnGeneral->setestado_cuentas_corrientes($estado_cuentas_corrientes);
			$estado_cuentas_corrientesReturnGeneral->setestado_cuentas_corrientess($estado_cuentas_corrientess);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$estado_cuentas_corrientesReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->estado_cuentas_corrientesLogicAdditional==null) {
				$this->estado_cuentas_corrientesLogicAdditional=new estado_cuentas_corrientes_logic_add();
			}
			
			$estado_cuentas_corrientesReturnGeneral=$this->estado_cuentas_corrientesLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_cuentas_corrientess,$estado_cuentas_corrientes,$estado_cuentas_corrientesParameterGeneral,$estado_cuentas_corrientesReturnGeneral,$isEsNuevoestado_cuentas_corrientes,$clases);
			
			/*estado_cuentas_corrientesLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_cuentas_corrientess,$estado_cuentas_corrientes,$estado_cuentas_corrientesParameterGeneral,$estado_cuentas_corrientesReturnGeneral,$isEsNuevoestado_cuentas_corrientes,$clases);*/
			
			return $estado_cuentas_corrientesReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estado_cuentas_corrientess,estado_cuentas_corrientes $estado_cuentas_corrientes,estado_cuentas_corrientes_param_return $estado_cuentas_corrientesParameterGeneral,bool $isEsNuevoestado_cuentas_corrientes,array $clases) : estado_cuentas_corrientes_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$estado_cuentas_corrientesReturnGeneral=new estado_cuentas_corrientes_param_return();
	
			$estado_cuentas_corrientesReturnGeneral->setestado_cuentas_corrientes($estado_cuentas_corrientes);
			$estado_cuentas_corrientesReturnGeneral->setestado_cuentas_corrientess($estado_cuentas_corrientess);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$estado_cuentas_corrientesReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->estado_cuentas_corrientesLogicAdditional==null) {
				$this->estado_cuentas_corrientesLogicAdditional=new estado_cuentas_corrientes_logic_add();
			}
			
			$estado_cuentas_corrientesReturnGeneral=$this->estado_cuentas_corrientesLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_cuentas_corrientess,$estado_cuentas_corrientes,$estado_cuentas_corrientesParameterGeneral,$estado_cuentas_corrientesReturnGeneral,$isEsNuevoestado_cuentas_corrientes,$clases);
			
			/*estado_cuentas_corrientesLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_cuentas_corrientess,$estado_cuentas_corrientes,$estado_cuentas_corrientesParameterGeneral,$estado_cuentas_corrientesReturnGeneral,$isEsNuevoestado_cuentas_corrientes,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $estado_cuentas_corrientesReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estado_cuentas_corrientess,estado_cuentas_corrientes $estado_cuentas_corrientes,estado_cuentas_corrientes_param_return $estado_cuentas_corrientesParameterGeneral,bool $isEsNuevoestado_cuentas_corrientes,array $clases) : estado_cuentas_corrientes_param_return {
		 try {	
			$estado_cuentas_corrientesReturnGeneral=new estado_cuentas_corrientes_param_return();
	
			$estado_cuentas_corrientesReturnGeneral->setestado_cuentas_corrientes($estado_cuentas_corrientes);
			$estado_cuentas_corrientesReturnGeneral->setestado_cuentas_corrientess($estado_cuentas_corrientess);
			
			
			
			if($this->estado_cuentas_corrientesLogicAdditional==null) {
				$this->estado_cuentas_corrientesLogicAdditional=new estado_cuentas_corrientes_logic_add();
			}
			
			$estado_cuentas_corrientesReturnGeneral=$this->estado_cuentas_corrientesLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_cuentas_corrientess,$estado_cuentas_corrientes,$estado_cuentas_corrientesParameterGeneral,$estado_cuentas_corrientesReturnGeneral,$isEsNuevoestado_cuentas_corrientes,$clases);
			
			/*estado_cuentas_corrientesLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_cuentas_corrientess,$estado_cuentas_corrientes,$estado_cuentas_corrientesParameterGeneral,$estado_cuentas_corrientesReturnGeneral,$isEsNuevoestado_cuentas_corrientes,$clases);*/
			
			return $estado_cuentas_corrientesReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estado_cuentas_corrientess,estado_cuentas_corrientes $estado_cuentas_corrientes,estado_cuentas_corrientes_param_return $estado_cuentas_corrientesParameterGeneral,bool $isEsNuevoestado_cuentas_corrientes,array $clases) : estado_cuentas_corrientes_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$estado_cuentas_corrientesReturnGeneral=new estado_cuentas_corrientes_param_return();
	
			$estado_cuentas_corrientesReturnGeneral->setestado_cuentas_corrientes($estado_cuentas_corrientes);
			$estado_cuentas_corrientesReturnGeneral->setestado_cuentas_corrientess($estado_cuentas_corrientess);
			
			
			if($this->estado_cuentas_corrientesLogicAdditional==null) {
				$this->estado_cuentas_corrientesLogicAdditional=new estado_cuentas_corrientes_logic_add();
			}
			
			$estado_cuentas_corrientesReturnGeneral=$this->estado_cuentas_corrientesLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_cuentas_corrientess,$estado_cuentas_corrientes,$estado_cuentas_corrientesParameterGeneral,$estado_cuentas_corrientesReturnGeneral,$isEsNuevoestado_cuentas_corrientes,$clases);
			
			/*estado_cuentas_corrientesLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_cuentas_corrientess,$estado_cuentas_corrientes,$estado_cuentas_corrientesParameterGeneral,$estado_cuentas_corrientesReturnGeneral,$isEsNuevoestado_cuentas_corrientes,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $estado_cuentas_corrientesReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,estado_cuentas_corrientes $estado_cuentas_corrientes,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,estado_cuentas_corrientes $estado_cuentas_corrientes,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		estado_cuentas_corrientes_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(estado_cuentas_corrientes $estado_cuentas_corrientes,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			estado_cuentas_corrientes_logic_add::updateestado_cuentas_corrientesToGet($this->estado_cuentas_corrientes);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$estado_cuentas_corrientes->setcuenta_corrientes($this->estado_cuentas_corrientesDataAccess->getcuenta_corrientes($this->connexion,$estado_cuentas_corrientes));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado_cuentas_corrientes->setcuenta_corrientes($this->estado_cuentas_corrientesDataAccess->getcuenta_corrientes($this->connexion,$estado_cuentas_corrientes));

				if($this->isConDeep) {
					$cuentacorrienteLogic= new cuenta_corriente_logic($this->connexion);
					$cuentacorrienteLogic->setcuenta_corrientes($estado_cuentas_corrientes->getcuenta_corrientes());
					$classesLocal=cuenta_corriente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cuentacorrienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cuenta_corriente_util::refrescarFKDescripciones($cuentacorrienteLogic->getcuenta_corrientes());
					$estado_cuentas_corrientes->setcuenta_corrientes($cuentacorrienteLogic->getcuenta_corrientes());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_corriente::$class);
			$estado_cuentas_corrientes->setcuenta_corrientes($this->estado_cuentas_corrientesDataAccess->getcuenta_corrientes($this->connexion,$estado_cuentas_corrientes));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {


		$estado_cuentas_corrientes->setcuenta_corrientes($this->estado_cuentas_corrientesDataAccess->getcuenta_corrientes($this->connexion,$estado_cuentas_corrientes));

		foreach($estado_cuentas_corrientes->getcuenta_corrientes() as $cuentacorriente) {
			$cuentacorrienteLogic= new cuenta_corriente_logic($this->connexion);
			$cuentacorrienteLogic->deepLoad($cuentacorriente,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado_cuentas_corrientes->setcuenta_corrientes($this->estado_cuentas_corrientesDataAccess->getcuenta_corrientes($this->connexion,$estado_cuentas_corrientes));

				foreach($estado_cuentas_corrientes->getcuenta_corrientes() as $cuentacorriente) {
					$cuentacorrienteLogic= new cuenta_corriente_logic($this->connexion);
					$cuentacorrienteLogic->deepLoad($cuentacorriente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_corriente::$class);
			$estado_cuentas_corrientes->setcuenta_corrientes($this->estado_cuentas_corrientesDataAccess->getcuenta_corrientes($this->connexion,$estado_cuentas_corrientes));

			foreach($estado_cuentas_corrientes->getcuenta_corrientes() as $cuentacorriente) {
				$cuentacorrienteLogic= new cuenta_corriente_logic($this->connexion);
				$cuentacorrienteLogic->deepLoad($cuentacorriente,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(estado_cuentas_corrientes $estado_cuentas_corrientes,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			estado_cuentas_corrientes_logic_add::updateestado_cuentas_corrientesToSave($this->estado_cuentas_corrientes);			
			
			if(!$paraDeleteCascade) {				
				estado_cuentas_corrientes_data::save($estado_cuentas_corrientes, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($estado_cuentas_corrientes->getcuenta_corrientes() as $cuentacorriente) {
			$cuentacorriente->setid_estado_cuentas_corrientes($estado_cuentas_corrientes->getId());
			cuenta_corriente_data::save($cuentacorriente,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado_cuentas_corrientes->getcuenta_corrientes() as $cuentacorriente) {
					$cuentacorriente->setid_estado_cuentas_corrientes($estado_cuentas_corrientes->getId());
					cuenta_corriente_data::save($cuentacorriente,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_corriente::$class);

			foreach($estado_cuentas_corrientes->getcuenta_corrientes() as $cuentacorriente) {
				$cuentacorriente->setid_estado_cuentas_corrientes($estado_cuentas_corrientes->getId());
				cuenta_corriente_data::save($cuentacorriente,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($estado_cuentas_corrientes->getcuenta_corrientes() as $cuentacorriente) {
			$cuentacorrienteLogic= new cuenta_corriente_logic($this->connexion);
			$cuentacorriente->setid_estado_cuentas_corrientes($estado_cuentas_corrientes->getId());
			cuenta_corriente_data::save($cuentacorriente,$this->connexion);
			$cuentacorrienteLogic->deepSave($cuentacorriente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado_cuentas_corrientes->getcuenta_corrientes() as $cuentacorriente) {
					$cuentacorrienteLogic= new cuenta_corriente_logic($this->connexion);
					$cuentacorriente->setid_estado_cuentas_corrientes($estado_cuentas_corrientes->getId());
					cuenta_corriente_data::save($cuentacorriente,$this->connexion);
					$cuentacorrienteLogic->deepSave($cuentacorriente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {



		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_corriente::$class);

			foreach($estado_cuentas_corrientes->getcuenta_corrientes() as $cuentacorriente) {
				$cuentacorrienteLogic= new cuenta_corriente_logic($this->connexion);
				$cuentacorriente->setid_estado_cuentas_corrientes($estado_cuentas_corrientes->getId());
				cuenta_corriente_data::save($cuentacorriente,$this->connexion);
				$cuentacorrienteLogic->deepSave($cuentacorriente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				estado_cuentas_corrientes_data::save($estado_cuentas_corrientes, $this->connexion);
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
			
			$this->deepLoad($this->estado_cuentas_corrientes,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->estado_cuentas_corrientess as $estado_cuentas_corrientes) {
				$this->deepLoad($estado_cuentas_corrientes,$isDeep,$deepLoadType,$clases);
								
				estado_cuentas_corrientes_util::refrescarFKDescripciones($this->estado_cuentas_corrientess);
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
			
			foreach($this->estado_cuentas_corrientess as $estado_cuentas_corrientes) {
				$this->deepLoad($estado_cuentas_corrientes,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->estado_cuentas_corrientes,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->estado_cuentas_corrientess as $estado_cuentas_corrientes) {
				$this->deepSave($estado_cuentas_corrientes,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->estado_cuentas_corrientess as $estado_cuentas_corrientes) {
				$this->deepSave($estado_cuentas_corrientes,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(cuenta_corriente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==cuenta_corriente::$class) {
						$classes[]=new Classe(cuenta_corriente::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
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
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getestado_cuentas_corrientes() : ?estado_cuentas_corrientes {	
		/*
		estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToGet($this->estado_cuentas_corrientes,$this->datosCliente);
		estado_cuentas_corrientes_logic_add::updateestado_cuentas_corrientesToGet($this->estado_cuentas_corrientes);
		*/
			
		return $this->estado_cuentas_corrientes;
	}
		
	public function setestado_cuentas_corrientes(estado_cuentas_corrientes $newestado_cuentas_corrientes) {
		$this->estado_cuentas_corrientes = $newestado_cuentas_corrientes;
	}
	
	public function getestado_cuentas_corrientess() : array {		
		/*
		estado_cuentas_corrientes_logic_add::checkestado_cuentas_corrientesToGets($this->estado_cuentas_corrientess,$this->datosCliente);
		
		foreach ($this->estado_cuentas_corrientess as $estado_cuentas_corrientesLocal ) {
			estado_cuentas_corrientes_logic_add::updateestado_cuentas_corrientesToGet($estado_cuentas_corrientesLocal);
		}
		*/
		
		return $this->estado_cuentas_corrientess;
	}
	
	public function setestado_cuentas_corrientess(array $newestado_cuentas_corrientess) {
		$this->estado_cuentas_corrientess = $newestado_cuentas_corrientess;
	}
	
	public function getestado_cuentas_corrientesDataAccess() : estado_cuentas_corrientes_data {
		return $this->estado_cuentas_corrientesDataAccess;
	}
	
	public function setestado_cuentas_corrientesDataAccess(estado_cuentas_corrientes_data $newestado_cuentas_corrientesDataAccess) {
		$this->estado_cuentas_corrientesDataAccess = $newestado_cuentas_corrientesDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        estado_cuentas_corrientes_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		cheque_cuenta_corriente_logic::$logger;
		retiro_cuenta_corriente_logic::$logger;
		deposito_cuenta_corriente_logic::$logger;
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
