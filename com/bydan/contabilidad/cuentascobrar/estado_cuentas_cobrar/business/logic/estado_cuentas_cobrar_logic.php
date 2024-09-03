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

namespace com\bydan\contabilidad\cuentascobrar\estado_cuentas_cobrar\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentascobrar\estado_cuentas_cobrar\util\estado_cuentas_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\estado_cuentas_cobrar\util\estado_cuentas_cobrar_param_return;


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

use com\bydan\contabilidad\cuentascobrar\estado_cuentas_cobrar\util\estado_cuentas_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\estado_cuentas_cobrar\business\entity\estado_cuentas_cobrar;
use com\bydan\contabilidad\cuentascobrar\estado_cuentas_cobrar\business\data\estado_cuentas_cobrar_data;

//FK


//REL


use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\entity\cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\data\cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\logic\cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_util;

//REL DETALLES

use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\util\debito_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\util\pago_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\util\credito_cuenta_cobrar_carga;



class estado_cuentas_cobrar_logic  extends GeneralEntityLogic implements estado_cuentas_cobrar_logicI {	
	/*GENERAL*/
	public estado_cuentas_cobrar_data $estado_cuentas_cobrarDataAccess;
	public ?estado_cuentas_cobrar_logic_add $estado_cuentas_cobrarLogicAdditional=null;
	public ?estado_cuentas_cobrar $estado_cuentas_cobrar;
	public array $estado_cuentas_cobrars;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->estado_cuentas_cobrarDataAccess = new estado_cuentas_cobrar_data();			
			$this->estado_cuentas_cobrars = array();
			$this->estado_cuentas_cobrar = new estado_cuentas_cobrar();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->estado_cuentas_cobrarLogicAdditional = new estado_cuentas_cobrar_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->estado_cuentas_cobrarLogicAdditional==null) {
			$this->estado_cuentas_cobrarLogicAdditional=new estado_cuentas_cobrar_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->estado_cuentas_cobrarDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->estado_cuentas_cobrarDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->estado_cuentas_cobrarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->estado_cuentas_cobrarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->estado_cuentas_cobrars = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_cuentas_cobrars=$this->estado_cuentas_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_cobrar_util::refrescarFKDescripciones($this->estado_cuentas_cobrars);
			}
			
			estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToGets($this->estado_cuentas_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_cobrars);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->estado_cuentas_cobrars = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_cuentas_cobrars=$this->estado_cuentas_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_cobrar_util::refrescarFKDescripciones($this->estado_cuentas_cobrars);
			}
			
			estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToGets($this->estado_cuentas_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_cobrars);
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
		$this->estado_cuentas_cobrar = new estado_cuentas_cobrar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->estado_cuentas_cobrar=$this->estado_cuentas_cobrarDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->estado_cuentas_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estado_cuentas_cobrar_util::refrescarFKDescripcion($this->estado_cuentas_cobrar);
			}
						
			estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToGet($this->estado_cuentas_cobrar,$this->datosCliente);
			estado_cuentas_cobrar_logic_add::updateestado_cuentas_cobrarToGet($this->estado_cuentas_cobrar);
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
		$this->estado_cuentas_cobrar = new  estado_cuentas_cobrar();
		  		  
        try {		
			$this->estado_cuentas_cobrar=$this->estado_cuentas_cobrarDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->estado_cuentas_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estado_cuentas_cobrar_util::refrescarFKDescripcion($this->estado_cuentas_cobrar);
			}
			
			estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToGet($this->estado_cuentas_cobrar,$this->datosCliente);
			estado_cuentas_cobrar_logic_add::updateestado_cuentas_cobrarToGet($this->estado_cuentas_cobrar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?estado_cuentas_cobrar {
		$estado_cuentas_cobrarLogic = new  estado_cuentas_cobrar_logic();
		  		  
        try {		
			$estado_cuentas_cobrarLogic->setConnexion($connexion);			
			$estado_cuentas_cobrarLogic->getEntity($id);			
			return $estado_cuentas_cobrarLogic->getestado_cuentas_cobrar();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->estado_cuentas_cobrar = new  estado_cuentas_cobrar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->estado_cuentas_cobrar=$this->estado_cuentas_cobrarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->estado_cuentas_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estado_cuentas_cobrar_util::refrescarFKDescripcion($this->estado_cuentas_cobrar);
			}
			
			estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToGet($this->estado_cuentas_cobrar,$this->datosCliente);
			estado_cuentas_cobrar_logic_add::updateestado_cuentas_cobrarToGet($this->estado_cuentas_cobrar);
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
		$this->estado_cuentas_cobrar = new  estado_cuentas_cobrar();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_cuentas_cobrar=$this->estado_cuentas_cobrarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->estado_cuentas_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estado_cuentas_cobrar_util::refrescarFKDescripcion($this->estado_cuentas_cobrar);
			}
			
			estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToGet($this->estado_cuentas_cobrar,$this->datosCliente);
			estado_cuentas_cobrar_logic_add::updateestado_cuentas_cobrarToGet($this->estado_cuentas_cobrar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?estado_cuentas_cobrar {
		$estado_cuentas_cobrarLogic = new  estado_cuentas_cobrar_logic();
		  		  
        try {		
			$estado_cuentas_cobrarLogic->setConnexion($connexion);			
			$estado_cuentas_cobrarLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $estado_cuentas_cobrarLogic->getestado_cuentas_cobrar();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->estado_cuentas_cobrars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->estado_cuentas_cobrars=$this->estado_cuentas_cobrarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_cobrar_util::refrescarFKDescripciones($this->estado_cuentas_cobrars);
			}
			
			estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToGets($this->estado_cuentas_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_cobrars);			
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
		$this->estado_cuentas_cobrars = array();
		  		  
        try {			
			$this->estado_cuentas_cobrars=$this->estado_cuentas_cobrarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_cobrar_util::refrescarFKDescripciones($this->estado_cuentas_cobrars);
			}
			
			estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToGets($this->estado_cuentas_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_cobrars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->estado_cuentas_cobrars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_cuentas_cobrars=$this->estado_cuentas_cobrarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_cobrar_util::refrescarFKDescripciones($this->estado_cuentas_cobrars);
			}
			
			estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToGets($this->estado_cuentas_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_cobrars);
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
		$this->estado_cuentas_cobrars = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_cuentas_cobrars=$this->estado_cuentas_cobrarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_cobrar_util::refrescarFKDescripciones($this->estado_cuentas_cobrars);
			}
			
			estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToGets($this->estado_cuentas_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_cobrars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$estado_cuentas_cobrarLogic = new  estado_cuentas_cobrar_logic();
		  		  
        try {		
			$estado_cuentas_cobrarLogic->setConnexion($connexion);			
			$estado_cuentas_cobrarLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $estado_cuentas_cobrarLogic->getestado_cuentas_cobrars();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->estado_cuentas_cobrars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->estado_cuentas_cobrars=$this->estado_cuentas_cobrarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_cobrar_util::refrescarFKDescripciones($this->estado_cuentas_cobrars);
			}
			
			estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToGets($this->estado_cuentas_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_cobrars);
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
		$this->estado_cuentas_cobrars = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_cuentas_cobrars=$this->estado_cuentas_cobrarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_cobrar_util::refrescarFKDescripciones($this->estado_cuentas_cobrars);
			}
			
			estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToGets($this->estado_cuentas_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_cobrars);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->estado_cuentas_cobrars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado_cuentas_cobrars=$this->estado_cuentas_cobrarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_cobrar_util::refrescarFKDescripciones($this->estado_cuentas_cobrars);
			}
			
			estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToGets($this->estado_cuentas_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_cobrars);
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
		$this->estado_cuentas_cobrars = array();
		  		  
        try {			
			$this->estado_cuentas_cobrars=$this->estado_cuentas_cobrarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_cobrar_util::refrescarFKDescripciones($this->estado_cuentas_cobrars);
			}	
			
			estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToGets($this->estado_cuentas_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_cobrars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->estado_cuentas_cobrars = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->estado_cuentas_cobrars=$this->estado_cuentas_cobrarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_cobrar_util::refrescarFKDescripciones($this->estado_cuentas_cobrars);
			}
			
			estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToGets($this->estado_cuentas_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_cobrars);
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
		$this->estado_cuentas_cobrars = array();
		  		  
        try {		
			$this->estado_cuentas_cobrars=$this->estado_cuentas_cobrarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_cobrar_util::refrescarFKDescripciones($this->estado_cuentas_cobrars);
			}
			
			estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToGets($this->estado_cuentas_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estado_cuentas_cobrars);

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
						
			//estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToSave($this->estado_cuentas_cobrar,$this->datosCliente,$this->connexion);	       
			estado_cuentas_cobrar_logic_add::updateestado_cuentas_cobrarToSave($this->estado_cuentas_cobrar);			
			estado_cuentas_cobrar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->estado_cuentas_cobrar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->estado_cuentas_cobrarLogicAdditional->checkGeneralEntityToSave($this,$this->estado_cuentas_cobrar,$this->datosCliente,$this->connexion);
			
			
			estado_cuentas_cobrar_data::save($this->estado_cuentas_cobrar, $this->connexion);	    	       	 				
			//estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToSaveAfter($this->estado_cuentas_cobrar,$this->datosCliente,$this->connexion);			
			$this->estado_cuentas_cobrarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->estado_cuentas_cobrar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->estado_cuentas_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->estado_cuentas_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				estado_cuentas_cobrar_util::refrescarFKDescripcion($this->estado_cuentas_cobrar);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->estado_cuentas_cobrar->getIsDeleted()) {
				$this->estado_cuentas_cobrar=null;
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
						
			/*estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToSave($this->estado_cuentas_cobrar,$this->datosCliente,$this->connexion);*/	        
			estado_cuentas_cobrar_logic_add::updateestado_cuentas_cobrarToSave($this->estado_cuentas_cobrar);			
			$this->estado_cuentas_cobrarLogicAdditional->checkGeneralEntityToSave($this,$this->estado_cuentas_cobrar,$this->datosCliente,$this->connexion);			
			estado_cuentas_cobrar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->estado_cuentas_cobrar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			estado_cuentas_cobrar_data::save($this->estado_cuentas_cobrar, $this->connexion);	    	       	 						
			/*estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToSaveAfter($this->estado_cuentas_cobrar,$this->datosCliente,$this->connexion);*/			
			$this->estado_cuentas_cobrarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->estado_cuentas_cobrar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->estado_cuentas_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->estado_cuentas_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				estado_cuentas_cobrar_util::refrescarFKDescripcion($this->estado_cuentas_cobrar);				
			}
			
			if($this->estado_cuentas_cobrar->getIsDeleted()) {
				$this->estado_cuentas_cobrar=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(estado_cuentas_cobrar $estado_cuentas_cobrar,Connexion $connexion)  {
		$estado_cuentas_cobrarLogic = new  estado_cuentas_cobrar_logic();		  		  
        try {		
			$estado_cuentas_cobrarLogic->setConnexion($connexion);			
			$estado_cuentas_cobrarLogic->setestado_cuentas_cobrar($estado_cuentas_cobrar);			
			$estado_cuentas_cobrarLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToSaves($this->estado_cuentas_cobrars,$this->datosCliente,$this->connexion);*/	        	
			$this->estado_cuentas_cobrarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->estado_cuentas_cobrars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->estado_cuentas_cobrars as $estado_cuentas_cobrarLocal) {				
								
				estado_cuentas_cobrar_logic_add::updateestado_cuentas_cobrarToSave($estado_cuentas_cobrarLocal);	        	
				estado_cuentas_cobrar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$estado_cuentas_cobrarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				estado_cuentas_cobrar_data::save($estado_cuentas_cobrarLocal, $this->connexion);				
			}
			
			/*estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToSavesAfter($this->estado_cuentas_cobrars,$this->datosCliente,$this->connexion);*/			
			$this->estado_cuentas_cobrarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->estado_cuentas_cobrars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_cobrar_util::refrescarFKDescripciones($this->estado_cuentas_cobrars);
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
			/*estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToSaves($this->estado_cuentas_cobrars,$this->datosCliente,$this->connexion);*/			
			$this->estado_cuentas_cobrarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->estado_cuentas_cobrars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->estado_cuentas_cobrars as $estado_cuentas_cobrarLocal) {				
								
				estado_cuentas_cobrar_logic_add::updateestado_cuentas_cobrarToSave($estado_cuentas_cobrarLocal);	        	
				estado_cuentas_cobrar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$estado_cuentas_cobrarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				estado_cuentas_cobrar_data::save($estado_cuentas_cobrarLocal, $this->connexion);				
			}			
			
			/*estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToSavesAfter($this->estado_cuentas_cobrars,$this->datosCliente,$this->connexion);*/			
			$this->estado_cuentas_cobrarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->estado_cuentas_cobrars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_cuentas_cobrar_util::refrescarFKDescripciones($this->estado_cuentas_cobrars);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $estado_cuentas_cobrars,Connexion $connexion)  {
		$estado_cuentas_cobrarLogic = new  estado_cuentas_cobrar_logic();
		  		  
        try {		
			$estado_cuentas_cobrarLogic->setConnexion($connexion);			
			$estado_cuentas_cobrarLogic->setestado_cuentas_cobrars($estado_cuentas_cobrars);			
			$estado_cuentas_cobrarLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$estado_cuentas_cobrarsAux=array();
		
		foreach($this->estado_cuentas_cobrars as $estado_cuentas_cobrar) {
			if($estado_cuentas_cobrar->getIsDeleted()==false) {
				$estado_cuentas_cobrarsAux[]=$estado_cuentas_cobrar;
			}
		}
		
		$this->estado_cuentas_cobrars=$estado_cuentas_cobrarsAux;
	}
	
	public function updateToGetsAuxiliar(array &$estado_cuentas_cobrars) {
		if($this->estado_cuentas_cobrarLogicAdditional==null) {
			$this->estado_cuentas_cobrarLogicAdditional=new estado_cuentas_cobrar_logic_add();
		}
		
		
		$this->estado_cuentas_cobrarLogicAdditional->updateToGets($estado_cuentas_cobrars,$this);					
		$this->estado_cuentas_cobrarLogicAdditional->updateToGetsReferencia($estado_cuentas_cobrars,$this);			
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
	
	
	
	public function saveRelacionesWithConnection($estado_cuentas_cobrar,$cuentacobrars) {
		$this->saveRelacionesBase($estado_cuentas_cobrar,$cuentacobrars,true);
	}

	public function saveRelaciones($estado_cuentas_cobrar,$cuentacobrars) {
		$this->saveRelacionesBase($estado_cuentas_cobrar,$cuentacobrars,false);
	}

	public function saveRelacionesBase($estado_cuentas_cobrar,$cuentacobrars=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$estado_cuentas_cobrar->setcuenta_cobrars($cuentacobrars);
			$this->setestado_cuentas_cobrar($estado_cuentas_cobrar);

				if(($this->estado_cuentas_cobrar->getIsNew() || $this->estado_cuentas_cobrar->getIsChanged()) && !$this->estado_cuentas_cobrar->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($cuentacobrars);

				} else if($this->estado_cuentas_cobrar->getIsDeleted()) {
					$this->saveRelacionesDetalles($cuentacobrars);
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
	
	
	public function saveRelacionesDetalles($cuentacobrars=array()) {
		try {
	

			$idestado_cuentas_cobrarActual=$this->getestado_cuentas_cobrar()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/cuenta_cobrar_carga.php');
			cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cuentacobrarLogic_Desde_estado_cuentas_cobrar=new cuenta_cobrar_logic();
			$cuentacobrarLogic_Desde_estado_cuentas_cobrar->setcuenta_cobrars($cuentacobrars);

			$cuentacobrarLogic_Desde_estado_cuentas_cobrar->setConnexion($this->getConnexion());
			$cuentacobrarLogic_Desde_estado_cuentas_cobrar->setDatosCliente($this->datosCliente);

			foreach($cuentacobrarLogic_Desde_estado_cuentas_cobrar->getcuenta_cobrars() as $cuentacobrar_Desde_estado_cuentas_cobrar) {
				$cuentacobrar_Desde_estado_cuentas_cobrar->setid_estado_cuentas_cobrar($idestado_cuentas_cobrarActual);

				$cuentacobrarLogic_Desde_estado_cuentas_cobrar->setcuenta_cobrar($cuentacobrar_Desde_estado_cuentas_cobrar);
				$cuentacobrarLogic_Desde_estado_cuentas_cobrar->save();

				$idcuenta_cobrarActual=$cuenta_cobrar_Desde_estado_cuentas_cobrar->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/debito_cuenta_cobrar_carga.php');
				debito_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$debitocuentacobrarLogic_Desde_cuenta_cobrar=new debito_cuenta_cobrar_logic();

				if($cuenta_cobrar_Desde_estado_cuentas_cobrar->getdebito_cuenta_cobrars()==null){
					$cuenta_cobrar_Desde_estado_cuentas_cobrar->setdebito_cuenta_cobrars(array());
				}

				$debitocuentacobrarLogic_Desde_cuenta_cobrar->setdebito_cuenta_cobrars($cuenta_cobrar_Desde_estado_cuentas_cobrar->getdebito_cuenta_cobrars());

				$debitocuentacobrarLogic_Desde_cuenta_cobrar->setConnexion($this->getConnexion());
				$debitocuentacobrarLogic_Desde_cuenta_cobrar->setDatosCliente($this->datosCliente);

				foreach($debitocuentacobrarLogic_Desde_cuenta_cobrar->getdebito_cuenta_cobrars() as $debitocuentacobrar_Desde_cuenta_cobrar) {
					$debitocuentacobrar_Desde_cuenta_cobrar->setid_cuenta_cobrar($idcuenta_cobrarActual);
				}

				$debitocuentacobrarLogic_Desde_cuenta_cobrar->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/pago_cuenta_cobrar_carga.php');
				pago_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$pagocuentacobrarLogic_Desde_cuenta_cobrar=new pago_cuenta_cobrar_logic();

				if($cuenta_cobrar_Desde_estado_cuentas_cobrar->getpago_cuenta_cobrars()==null){
					$cuenta_cobrar_Desde_estado_cuentas_cobrar->setpago_cuenta_cobrars(array());
				}

				$pagocuentacobrarLogic_Desde_cuenta_cobrar->setpago_cuenta_cobrars($cuenta_cobrar_Desde_estado_cuentas_cobrar->getpago_cuenta_cobrars());

				$pagocuentacobrarLogic_Desde_cuenta_cobrar->setConnexion($this->getConnexion());
				$pagocuentacobrarLogic_Desde_cuenta_cobrar->setDatosCliente($this->datosCliente);

				foreach($pagocuentacobrarLogic_Desde_cuenta_cobrar->getpago_cuenta_cobrars() as $pagocuentacobrar_Desde_cuenta_cobrar) {
					$pagocuentacobrar_Desde_cuenta_cobrar->setid_cuenta_cobrar($idcuenta_cobrarActual);
				}

				$pagocuentacobrarLogic_Desde_cuenta_cobrar->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/credito_cuenta_cobrar_carga.php');
				credito_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$creditocuentacobrarLogic_Desde_cuenta_cobrar=new credito_cuenta_cobrar_logic();

				if($cuenta_cobrar_Desde_estado_cuentas_cobrar->getcredito_cuenta_cobrars()==null){
					$cuenta_cobrar_Desde_estado_cuentas_cobrar->setcredito_cuenta_cobrars(array());
				}

				$creditocuentacobrarLogic_Desde_cuenta_cobrar->setcredito_cuenta_cobrars($cuenta_cobrar_Desde_estado_cuentas_cobrar->getcredito_cuenta_cobrars());

				$creditocuentacobrarLogic_Desde_cuenta_cobrar->setConnexion($this->getConnexion());
				$creditocuentacobrarLogic_Desde_cuenta_cobrar->setDatosCliente($this->datosCliente);

				foreach($creditocuentacobrarLogic_Desde_cuenta_cobrar->getcredito_cuenta_cobrars() as $creditocuentacobrar_Desde_cuenta_cobrar) {
					$creditocuentacobrar_Desde_cuenta_cobrar->setid_cuenta_cobrar($idcuenta_cobrarActual);
				}

				$creditocuentacobrarLogic_Desde_cuenta_cobrar->saves();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $estado_cuentas_cobrars,estado_cuentas_cobrar_param_return $estado_cuentas_cobrarParameterGeneral) : estado_cuentas_cobrar_param_return {
		$estado_cuentas_cobrarReturnGeneral=new estado_cuentas_cobrar_param_return();
	
		 try {	
			
			if($this->estado_cuentas_cobrarLogicAdditional==null) {
				$this->estado_cuentas_cobrarLogicAdditional=new estado_cuentas_cobrar_logic_add();
			}
			
			$this->estado_cuentas_cobrarLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$estado_cuentas_cobrars,$estado_cuentas_cobrarParameterGeneral,$estado_cuentas_cobrarReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $estado_cuentas_cobrarReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $estado_cuentas_cobrars,estado_cuentas_cobrar_param_return $estado_cuentas_cobrarParameterGeneral) : estado_cuentas_cobrar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$estado_cuentas_cobrarReturnGeneral=new estado_cuentas_cobrar_param_return();
	
			
			if($this->estado_cuentas_cobrarLogicAdditional==null) {
				$this->estado_cuentas_cobrarLogicAdditional=new estado_cuentas_cobrar_logic_add();
			}
			
			$this->estado_cuentas_cobrarLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$estado_cuentas_cobrars,$estado_cuentas_cobrarParameterGeneral,$estado_cuentas_cobrarReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $estado_cuentas_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estado_cuentas_cobrars,estado_cuentas_cobrar $estado_cuentas_cobrar,estado_cuentas_cobrar_param_return $estado_cuentas_cobrarParameterGeneral,bool $isEsNuevoestado_cuentas_cobrar,array $clases) : estado_cuentas_cobrar_param_return {
		 try {	
			$estado_cuentas_cobrarReturnGeneral=new estado_cuentas_cobrar_param_return();
	
			$estado_cuentas_cobrarReturnGeneral->setestado_cuentas_cobrar($estado_cuentas_cobrar);
			$estado_cuentas_cobrarReturnGeneral->setestado_cuentas_cobrars($estado_cuentas_cobrars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$estado_cuentas_cobrarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->estado_cuentas_cobrarLogicAdditional==null) {
				$this->estado_cuentas_cobrarLogicAdditional=new estado_cuentas_cobrar_logic_add();
			}
			
			$estado_cuentas_cobrarReturnGeneral=$this->estado_cuentas_cobrarLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_cuentas_cobrars,$estado_cuentas_cobrar,$estado_cuentas_cobrarParameterGeneral,$estado_cuentas_cobrarReturnGeneral,$isEsNuevoestado_cuentas_cobrar,$clases);
			
			/*estado_cuentas_cobrarLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_cuentas_cobrars,$estado_cuentas_cobrar,$estado_cuentas_cobrarParameterGeneral,$estado_cuentas_cobrarReturnGeneral,$isEsNuevoestado_cuentas_cobrar,$clases);*/
			
			return $estado_cuentas_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estado_cuentas_cobrars,estado_cuentas_cobrar $estado_cuentas_cobrar,estado_cuentas_cobrar_param_return $estado_cuentas_cobrarParameterGeneral,bool $isEsNuevoestado_cuentas_cobrar,array $clases) : estado_cuentas_cobrar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$estado_cuentas_cobrarReturnGeneral=new estado_cuentas_cobrar_param_return();
	
			$estado_cuentas_cobrarReturnGeneral->setestado_cuentas_cobrar($estado_cuentas_cobrar);
			$estado_cuentas_cobrarReturnGeneral->setestado_cuentas_cobrars($estado_cuentas_cobrars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$estado_cuentas_cobrarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->estado_cuentas_cobrarLogicAdditional==null) {
				$this->estado_cuentas_cobrarLogicAdditional=new estado_cuentas_cobrar_logic_add();
			}
			
			$estado_cuentas_cobrarReturnGeneral=$this->estado_cuentas_cobrarLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_cuentas_cobrars,$estado_cuentas_cobrar,$estado_cuentas_cobrarParameterGeneral,$estado_cuentas_cobrarReturnGeneral,$isEsNuevoestado_cuentas_cobrar,$clases);
			
			/*estado_cuentas_cobrarLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_cuentas_cobrars,$estado_cuentas_cobrar,$estado_cuentas_cobrarParameterGeneral,$estado_cuentas_cobrarReturnGeneral,$isEsNuevoestado_cuentas_cobrar,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $estado_cuentas_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estado_cuentas_cobrars,estado_cuentas_cobrar $estado_cuentas_cobrar,estado_cuentas_cobrar_param_return $estado_cuentas_cobrarParameterGeneral,bool $isEsNuevoestado_cuentas_cobrar,array $clases) : estado_cuentas_cobrar_param_return {
		 try {	
			$estado_cuentas_cobrarReturnGeneral=new estado_cuentas_cobrar_param_return();
	
			$estado_cuentas_cobrarReturnGeneral->setestado_cuentas_cobrar($estado_cuentas_cobrar);
			$estado_cuentas_cobrarReturnGeneral->setestado_cuentas_cobrars($estado_cuentas_cobrars);
			
			
			
			if($this->estado_cuentas_cobrarLogicAdditional==null) {
				$this->estado_cuentas_cobrarLogicAdditional=new estado_cuentas_cobrar_logic_add();
			}
			
			$estado_cuentas_cobrarReturnGeneral=$this->estado_cuentas_cobrarLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_cuentas_cobrars,$estado_cuentas_cobrar,$estado_cuentas_cobrarParameterGeneral,$estado_cuentas_cobrarReturnGeneral,$isEsNuevoestado_cuentas_cobrar,$clases);
			
			/*estado_cuentas_cobrarLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_cuentas_cobrars,$estado_cuentas_cobrar,$estado_cuentas_cobrarParameterGeneral,$estado_cuentas_cobrarReturnGeneral,$isEsNuevoestado_cuentas_cobrar,$clases);*/
			
			return $estado_cuentas_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estado_cuentas_cobrars,estado_cuentas_cobrar $estado_cuentas_cobrar,estado_cuentas_cobrar_param_return $estado_cuentas_cobrarParameterGeneral,bool $isEsNuevoestado_cuentas_cobrar,array $clases) : estado_cuentas_cobrar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$estado_cuentas_cobrarReturnGeneral=new estado_cuentas_cobrar_param_return();
	
			$estado_cuentas_cobrarReturnGeneral->setestado_cuentas_cobrar($estado_cuentas_cobrar);
			$estado_cuentas_cobrarReturnGeneral->setestado_cuentas_cobrars($estado_cuentas_cobrars);
			
			
			if($this->estado_cuentas_cobrarLogicAdditional==null) {
				$this->estado_cuentas_cobrarLogicAdditional=new estado_cuentas_cobrar_logic_add();
			}
			
			$estado_cuentas_cobrarReturnGeneral=$this->estado_cuentas_cobrarLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_cuentas_cobrars,$estado_cuentas_cobrar,$estado_cuentas_cobrarParameterGeneral,$estado_cuentas_cobrarReturnGeneral,$isEsNuevoestado_cuentas_cobrar,$clases);
			
			/*estado_cuentas_cobrarLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estado_cuentas_cobrars,$estado_cuentas_cobrar,$estado_cuentas_cobrarParameterGeneral,$estado_cuentas_cobrarReturnGeneral,$isEsNuevoestado_cuentas_cobrar,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $estado_cuentas_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,estado_cuentas_cobrar $estado_cuentas_cobrar,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,estado_cuentas_cobrar $estado_cuentas_cobrar,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		estado_cuentas_cobrar_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(estado_cuentas_cobrar $estado_cuentas_cobrar,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			estado_cuentas_cobrar_logic_add::updateestado_cuentas_cobrarToGet($this->estado_cuentas_cobrar);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$estado_cuentas_cobrar->setcuenta_cobrars($this->estado_cuentas_cobrarDataAccess->getcuenta_cobrars($this->connexion,$estado_cuentas_cobrar));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado_cuentas_cobrar->setcuenta_cobrars($this->estado_cuentas_cobrarDataAccess->getcuenta_cobrars($this->connexion,$estado_cuentas_cobrar));

				if($this->isConDeep) {
					$cuentacobrarLogic= new cuenta_cobrar_logic($this->connexion);
					$cuentacobrarLogic->setcuenta_cobrars($estado_cuentas_cobrar->getcuenta_cobrars());
					$classesLocal=cuenta_cobrar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cuentacobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cuenta_cobrar_util::refrescarFKDescripciones($cuentacobrarLogic->getcuenta_cobrars());
					$estado_cuentas_cobrar->setcuenta_cobrars($cuentacobrarLogic->getcuenta_cobrars());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_cobrar::$class);
			$estado_cuentas_cobrar->setcuenta_cobrars($this->estado_cuentas_cobrarDataAccess->getcuenta_cobrars($this->connexion,$estado_cuentas_cobrar));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {


		$estado_cuentas_cobrar->setcuenta_cobrars($this->estado_cuentas_cobrarDataAccess->getcuenta_cobrars($this->connexion,$estado_cuentas_cobrar));

		foreach($estado_cuentas_cobrar->getcuenta_cobrars() as $cuentacobrar) {
			$cuentacobrarLogic= new cuenta_cobrar_logic($this->connexion);
			$cuentacobrarLogic->deepLoad($cuentacobrar,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado_cuentas_cobrar->setcuenta_cobrars($this->estado_cuentas_cobrarDataAccess->getcuenta_cobrars($this->connexion,$estado_cuentas_cobrar));

				foreach($estado_cuentas_cobrar->getcuenta_cobrars() as $cuentacobrar) {
					$cuentacobrarLogic= new cuenta_cobrar_logic($this->connexion);
					$cuentacobrarLogic->deepLoad($cuentacobrar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_cobrar::$class);
			$estado_cuentas_cobrar->setcuenta_cobrars($this->estado_cuentas_cobrarDataAccess->getcuenta_cobrars($this->connexion,$estado_cuentas_cobrar));

			foreach($estado_cuentas_cobrar->getcuenta_cobrars() as $cuentacobrar) {
				$cuentacobrarLogic= new cuenta_cobrar_logic($this->connexion);
				$cuentacobrarLogic->deepLoad($cuentacobrar,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(estado_cuentas_cobrar $estado_cuentas_cobrar,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			estado_cuentas_cobrar_logic_add::updateestado_cuentas_cobrarToSave($this->estado_cuentas_cobrar);			
			
			if(!$paraDeleteCascade) {				
				estado_cuentas_cobrar_data::save($estado_cuentas_cobrar, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($estado_cuentas_cobrar->getcuenta_cobrars() as $cuentacobrar) {
			$cuentacobrar->setid_estado_cuentas_cobrar($estado_cuentas_cobrar->getId());
			cuenta_cobrar_data::save($cuentacobrar,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado_cuentas_cobrar->getcuenta_cobrars() as $cuentacobrar) {
					$cuentacobrar->setid_estado_cuentas_cobrar($estado_cuentas_cobrar->getId());
					cuenta_cobrar_data::save($cuentacobrar,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_cobrar::$class);

			foreach($estado_cuentas_cobrar->getcuenta_cobrars() as $cuentacobrar) {
				$cuentacobrar->setid_estado_cuentas_cobrar($estado_cuentas_cobrar->getId());
				cuenta_cobrar_data::save($cuentacobrar,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($estado_cuentas_cobrar->getcuenta_cobrars() as $cuentacobrar) {
			$cuentacobrarLogic= new cuenta_cobrar_logic($this->connexion);
			$cuentacobrar->setid_estado_cuentas_cobrar($estado_cuentas_cobrar->getId());
			cuenta_cobrar_data::save($cuentacobrar,$this->connexion);
			$cuentacobrarLogic->deepSave($cuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado_cuentas_cobrar->getcuenta_cobrars() as $cuentacobrar) {
					$cuentacobrarLogic= new cuenta_cobrar_logic($this->connexion);
					$cuentacobrar->setid_estado_cuentas_cobrar($estado_cuentas_cobrar->getId());
					cuenta_cobrar_data::save($cuentacobrar,$this->connexion);
					$cuentacobrarLogic->deepSave($cuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {



		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_cobrar::$class);

			foreach($estado_cuentas_cobrar->getcuenta_cobrars() as $cuentacobrar) {
				$cuentacobrarLogic= new cuenta_cobrar_logic($this->connexion);
				$cuentacobrar->setid_estado_cuentas_cobrar($estado_cuentas_cobrar->getId());
				cuenta_cobrar_data::save($cuentacobrar,$this->connexion);
				$cuentacobrarLogic->deepSave($cuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				estado_cuentas_cobrar_data::save($estado_cuentas_cobrar, $this->connexion);
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
			
			$this->deepLoad($this->estado_cuentas_cobrar,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->estado_cuentas_cobrars as $estado_cuentas_cobrar) {
				$this->deepLoad($estado_cuentas_cobrar,$isDeep,$deepLoadType,$clases);
								
				estado_cuentas_cobrar_util::refrescarFKDescripciones($this->estado_cuentas_cobrars);
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
			
			foreach($this->estado_cuentas_cobrars as $estado_cuentas_cobrar) {
				$this->deepLoad($estado_cuentas_cobrar,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->estado_cuentas_cobrar,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->estado_cuentas_cobrars as $estado_cuentas_cobrar) {
				$this->deepSave($estado_cuentas_cobrar,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->estado_cuentas_cobrars as $estado_cuentas_cobrar) {
				$this->deepSave($estado_cuentas_cobrar,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(cuenta_cobrar::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==cuenta_cobrar::$class) {
						$classes[]=new Classe(cuenta_cobrar::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==cuenta_cobrar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_cobrar::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getestado_cuentas_cobrar() : ?estado_cuentas_cobrar {	
		/*
		estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToGet($this->estado_cuentas_cobrar,$this->datosCliente);
		estado_cuentas_cobrar_logic_add::updateestado_cuentas_cobrarToGet($this->estado_cuentas_cobrar);
		*/
			
		return $this->estado_cuentas_cobrar;
	}
		
	public function setestado_cuentas_cobrar(estado_cuentas_cobrar $newestado_cuentas_cobrar) {
		$this->estado_cuentas_cobrar = $newestado_cuentas_cobrar;
	}
	
	public function getestado_cuentas_cobrars() : array {		
		/*
		estado_cuentas_cobrar_logic_add::checkestado_cuentas_cobrarToGets($this->estado_cuentas_cobrars,$this->datosCliente);
		
		foreach ($this->estado_cuentas_cobrars as $estado_cuentas_cobrarLocal ) {
			estado_cuentas_cobrar_logic_add::updateestado_cuentas_cobrarToGet($estado_cuentas_cobrarLocal);
		}
		*/
		
		return $this->estado_cuentas_cobrars;
	}
	
	public function setestado_cuentas_cobrars(array $newestado_cuentas_cobrars) {
		$this->estado_cuentas_cobrars = $newestado_cuentas_cobrars;
	}
	
	public function getestado_cuentas_cobrarDataAccess() : estado_cuentas_cobrar_data {
		return $this->estado_cuentas_cobrarDataAccess;
	}
	
	public function setestado_cuentas_cobrarDataAccess(estado_cuentas_cobrar_data $newestado_cuentas_cobrarDataAccess) {
		$this->estado_cuentas_cobrarDataAccess = $newestado_cuentas_cobrarDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        estado_cuentas_cobrar_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		debito_cuenta_cobrar_logic::$logger;
		pago_cuenta_cobrar_logic::$logger;
		credito_cuenta_cobrar_logic::$logger;
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
