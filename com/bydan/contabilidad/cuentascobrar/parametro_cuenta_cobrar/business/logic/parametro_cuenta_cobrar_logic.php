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

namespace com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\util\parametro_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\util\parametro_cuenta_cobrar_param_return;

use com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\presentation\session\parametro_cuenta_cobrar_session;

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

use com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\util\parametro_cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\business\entity\parametro_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\business\data\parametro_cuenta_cobrar_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL


//REL DETALLES




class parametro_cuenta_cobrar_logic  extends GeneralEntityLogic implements parametro_cuenta_cobrar_logicI {	
	/*GENERAL*/
	public parametro_cuenta_cobrar_data $parametro_cuenta_cobrarDataAccess;
	//public ?parametro_cuenta_cobrar_logic_add $parametro_cuenta_cobrarLogicAdditional=null;
	public ?parametro_cuenta_cobrar $parametro_cuenta_cobrar;
	public array $parametro_cuenta_cobrars;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->parametro_cuenta_cobrarDataAccess = new parametro_cuenta_cobrar_data();			
			$this->parametro_cuenta_cobrars = array();
			$this->parametro_cuenta_cobrar = new parametro_cuenta_cobrar();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->parametro_cuenta_cobrarLogicAdditional = new parametro_cuenta_cobrar_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->parametro_cuenta_cobrarLogicAdditional==null) {
		//	$this->parametro_cuenta_cobrarLogicAdditional=new parametro_cuenta_cobrar_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->parametro_cuenta_cobrarDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->parametro_cuenta_cobrarDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->parametro_cuenta_cobrarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->parametro_cuenta_cobrarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->parametro_cuenta_cobrars = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_cuenta_cobrars=$this->parametro_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_cobrar_util::refrescarFKDescripciones($this->parametro_cuenta_cobrars);
			}
			
			//parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToGets($this->parametro_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_cuenta_cobrars);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->parametro_cuenta_cobrars = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_cuenta_cobrars=$this->parametro_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_cobrar_util::refrescarFKDescripciones($this->parametro_cuenta_cobrars);
			}
			
			//parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToGets($this->parametro_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_cuenta_cobrars);
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
		$this->parametro_cuenta_cobrar = new parametro_cuenta_cobrar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->parametro_cuenta_cobrar=$this->parametro_cuenta_cobrarDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_cuenta_cobrar_util::refrescarFKDescripcion($this->parametro_cuenta_cobrar);
			}
						
			//parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToGet($this->parametro_cuenta_cobrar,$this->datosCliente);
			//parametro_cuenta_cobrar_logic_add::updateparametro_cuenta_cobrarToGet($this->parametro_cuenta_cobrar);
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
		$this->parametro_cuenta_cobrar = new  parametro_cuenta_cobrar();
		  		  
        try {		
			$this->parametro_cuenta_cobrar=$this->parametro_cuenta_cobrarDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_cuenta_cobrar_util::refrescarFKDescripcion($this->parametro_cuenta_cobrar);
			}
			
			//parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToGet($this->parametro_cuenta_cobrar,$this->datosCliente);
			//parametro_cuenta_cobrar_logic_add::updateparametro_cuenta_cobrarToGet($this->parametro_cuenta_cobrar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?parametro_cuenta_cobrar {
		$parametro_cuenta_cobrarLogic = new  parametro_cuenta_cobrar_logic();
		  		  
        try {		
			$parametro_cuenta_cobrarLogic->setConnexion($connexion);			
			$parametro_cuenta_cobrarLogic->getEntity($id);			
			return $parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->parametro_cuenta_cobrar = new  parametro_cuenta_cobrar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->parametro_cuenta_cobrar=$this->parametro_cuenta_cobrarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_cuenta_cobrar_util::refrescarFKDescripcion($this->parametro_cuenta_cobrar);
			}
			
			//parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToGet($this->parametro_cuenta_cobrar,$this->datosCliente);
			//parametro_cuenta_cobrar_logic_add::updateparametro_cuenta_cobrarToGet($this->parametro_cuenta_cobrar);
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
		$this->parametro_cuenta_cobrar = new  parametro_cuenta_cobrar();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_cuenta_cobrar=$this->parametro_cuenta_cobrarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_cuenta_cobrar_util::refrescarFKDescripcion($this->parametro_cuenta_cobrar);
			}
			
			//parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToGet($this->parametro_cuenta_cobrar,$this->datosCliente);
			//parametro_cuenta_cobrar_logic_add::updateparametro_cuenta_cobrarToGet($this->parametro_cuenta_cobrar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?parametro_cuenta_cobrar {
		$parametro_cuenta_cobrarLogic = new  parametro_cuenta_cobrar_logic();
		  		  
        try {		
			$parametro_cuenta_cobrarLogic->setConnexion($connexion);			
			$parametro_cuenta_cobrarLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->parametro_cuenta_cobrars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_cuenta_cobrars=$this->parametro_cuenta_cobrarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_cobrar_util::refrescarFKDescripciones($this->parametro_cuenta_cobrars);
			}
			
			//parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToGets($this->parametro_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_cuenta_cobrars);			
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
		$this->parametro_cuenta_cobrars = array();
		  		  
        try {			
			$this->parametro_cuenta_cobrars=$this->parametro_cuenta_cobrarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_cobrar_util::refrescarFKDescripciones($this->parametro_cuenta_cobrars);
			}
			
			//parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToGets($this->parametro_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_cuenta_cobrars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->parametro_cuenta_cobrars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_cuenta_cobrars=$this->parametro_cuenta_cobrarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_cobrar_util::refrescarFKDescripciones($this->parametro_cuenta_cobrars);
			}
			
			//parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToGets($this->parametro_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_cuenta_cobrars);
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
		$this->parametro_cuenta_cobrars = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_cuenta_cobrars=$this->parametro_cuenta_cobrarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_cobrar_util::refrescarFKDescripciones($this->parametro_cuenta_cobrars);
			}
			
			//parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToGets($this->parametro_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_cuenta_cobrars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$parametro_cuenta_cobrarLogic = new  parametro_cuenta_cobrar_logic();
		  		  
        try {		
			$parametro_cuenta_cobrarLogic->setConnexion($connexion);			
			$parametro_cuenta_cobrarLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrars();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->parametro_cuenta_cobrars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_cuenta_cobrars=$this->parametro_cuenta_cobrarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_cobrar_util::refrescarFKDescripciones($this->parametro_cuenta_cobrars);
			}
			
			//parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToGets($this->parametro_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_cuenta_cobrars);
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
		$this->parametro_cuenta_cobrars = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_cuenta_cobrars=$this->parametro_cuenta_cobrarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_cobrar_util::refrescarFKDescripciones($this->parametro_cuenta_cobrars);
			}
			
			//parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToGets($this->parametro_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_cuenta_cobrars);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->parametro_cuenta_cobrars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_cuenta_cobrars=$this->parametro_cuenta_cobrarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_cobrar_util::refrescarFKDescripciones($this->parametro_cuenta_cobrars);
			}
			
			//parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToGets($this->parametro_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_cuenta_cobrars);
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
		$this->parametro_cuenta_cobrars = array();
		  		  
        try {			
			$this->parametro_cuenta_cobrars=$this->parametro_cuenta_cobrarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_cobrar_util::refrescarFKDescripciones($this->parametro_cuenta_cobrars);
			}	
			
			//parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToGets($this->parametro_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_cuenta_cobrars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->parametro_cuenta_cobrars = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_cuenta_cobrars=$this->parametro_cuenta_cobrarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_cobrar_util::refrescarFKDescripciones($this->parametro_cuenta_cobrars);
			}
			
			//parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToGets($this->parametro_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_cuenta_cobrars);
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
		$this->parametro_cuenta_cobrars = array();
		  		  
        try {		
			$this->parametro_cuenta_cobrars=$this->parametro_cuenta_cobrarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_cobrar_util::refrescarFKDescripciones($this->parametro_cuenta_cobrars);
			}
			
			//parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToGets($this->parametro_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_cuenta_cobrars);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,parametro_cuenta_cobrar_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->parametro_cuenta_cobrars=$this->parametro_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_cuenta_cobrar_util::refrescarFKDescripciones($this->parametro_cuenta_cobrars);
			}
			//parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToGets($this->parametro_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_cuenta_cobrars);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,parametro_cuenta_cobrar_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->parametro_cuenta_cobrars=$this->parametro_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_cuenta_cobrar_util::refrescarFKDescripciones($this->parametro_cuenta_cobrars);
			}
			//parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToGets($this->parametro_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_cuenta_cobrars);
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
						
			//parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToSave($this->parametro_cuenta_cobrar,$this->datosCliente,$this->connexion);	       
			//parametro_cuenta_cobrar_logic_add::updateparametro_cuenta_cobrarToSave($this->parametro_cuenta_cobrar);			
			parametro_cuenta_cobrar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->parametro_cuenta_cobrar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->parametro_cuenta_cobrarLogicAdditional->checkGeneralEntityToSave($this,$this->parametro_cuenta_cobrar,$this->datosCliente,$this->connexion);
			
			
			parametro_cuenta_cobrar_data::save($this->parametro_cuenta_cobrar, $this->connexion);	    	       	 				
			//parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToSaveAfter($this->parametro_cuenta_cobrar,$this->datosCliente,$this->connexion);			
			//$this->parametro_cuenta_cobrarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->parametro_cuenta_cobrar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->parametro_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->parametro_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				parametro_cuenta_cobrar_util::refrescarFKDescripcion($this->parametro_cuenta_cobrar);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->parametro_cuenta_cobrar->getIsDeleted()) {
				$this->parametro_cuenta_cobrar=null;
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
						
			/*parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToSave($this->parametro_cuenta_cobrar,$this->datosCliente,$this->connexion);*/	        
			//parametro_cuenta_cobrar_logic_add::updateparametro_cuenta_cobrarToSave($this->parametro_cuenta_cobrar);			
			//$this->parametro_cuenta_cobrarLogicAdditional->checkGeneralEntityToSave($this,$this->parametro_cuenta_cobrar,$this->datosCliente,$this->connexion);			
			parametro_cuenta_cobrar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->parametro_cuenta_cobrar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			parametro_cuenta_cobrar_data::save($this->parametro_cuenta_cobrar, $this->connexion);	    	       	 						
			/*parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToSaveAfter($this->parametro_cuenta_cobrar,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_cuenta_cobrarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->parametro_cuenta_cobrar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->parametro_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->parametro_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				parametro_cuenta_cobrar_util::refrescarFKDescripcion($this->parametro_cuenta_cobrar);				
			}
			
			if($this->parametro_cuenta_cobrar->getIsDeleted()) {
				$this->parametro_cuenta_cobrar=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(parametro_cuenta_cobrar $parametro_cuenta_cobrar,Connexion $connexion)  {
		$parametro_cuenta_cobrarLogic = new  parametro_cuenta_cobrar_logic();		  		  
        try {		
			$parametro_cuenta_cobrarLogic->setConnexion($connexion);			
			$parametro_cuenta_cobrarLogic->setparametro_cuenta_cobrar($parametro_cuenta_cobrar);			
			$parametro_cuenta_cobrarLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToSaves($this->parametro_cuenta_cobrars,$this->datosCliente,$this->connexion);*/	        	
			//$this->parametro_cuenta_cobrarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->parametro_cuenta_cobrars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->parametro_cuenta_cobrars as $parametro_cuenta_cobrarLocal) {				
								
				//parametro_cuenta_cobrar_logic_add::updateparametro_cuenta_cobrarToSave($parametro_cuenta_cobrarLocal);	        	
				parametro_cuenta_cobrar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$parametro_cuenta_cobrarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				parametro_cuenta_cobrar_data::save($parametro_cuenta_cobrarLocal, $this->connexion);				
			}
			
			/*parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToSavesAfter($this->parametro_cuenta_cobrars,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_cuenta_cobrarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->parametro_cuenta_cobrars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_cobrar_util::refrescarFKDescripciones($this->parametro_cuenta_cobrars);
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
			/*parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToSaves($this->parametro_cuenta_cobrars,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_cuenta_cobrarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->parametro_cuenta_cobrars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->parametro_cuenta_cobrars as $parametro_cuenta_cobrarLocal) {				
								
				//parametro_cuenta_cobrar_logic_add::updateparametro_cuenta_cobrarToSave($parametro_cuenta_cobrarLocal);	        	
				parametro_cuenta_cobrar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$parametro_cuenta_cobrarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				parametro_cuenta_cobrar_data::save($parametro_cuenta_cobrarLocal, $this->connexion);				
			}			
			
			/*parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToSavesAfter($this->parametro_cuenta_cobrars,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_cuenta_cobrarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->parametro_cuenta_cobrars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_cuenta_cobrar_util::refrescarFKDescripciones($this->parametro_cuenta_cobrars);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $parametro_cuenta_cobrars,Connexion $connexion)  {
		$parametro_cuenta_cobrarLogic = new  parametro_cuenta_cobrar_logic();
		  		  
        try {		
			$parametro_cuenta_cobrarLogic->setConnexion($connexion);			
			$parametro_cuenta_cobrarLogic->setparametro_cuenta_cobrars($parametro_cuenta_cobrars);			
			$parametro_cuenta_cobrarLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$parametro_cuenta_cobrarsAux=array();
		
		foreach($this->parametro_cuenta_cobrars as $parametro_cuenta_cobrar) {
			if($parametro_cuenta_cobrar->getIsDeleted()==false) {
				$parametro_cuenta_cobrarsAux[]=$parametro_cuenta_cobrar;
			}
		}
		
		$this->parametro_cuenta_cobrars=$parametro_cuenta_cobrarsAux;
	}
	
	public function updateToGetsAuxiliar(array &$parametro_cuenta_cobrars) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->parametro_cuenta_cobrars as $parametro_cuenta_cobrar) {
				
				$parametro_cuenta_cobrar->setid_empresa_Descripcion(parametro_cuenta_cobrar_util::getempresaDescripcion($parametro_cuenta_cobrar->getempresa()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$parametro_cuenta_cobrar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$parametro_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$parametro_cuenta_cobrar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$parametro_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$parametro_cuenta_cobrar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$parametro_cuenta_cobrarForeignKey=new parametro_cuenta_cobrar_param_return();//parametro_cuenta_cobrarForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$parametro_cuenta_cobrarForeignKey,$parametro_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$parametro_cuenta_cobrarForeignKey,$parametro_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $parametro_cuenta_cobrarForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$parametro_cuenta_cobrarForeignKey,$parametro_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$parametro_cuenta_cobrarForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($parametro_cuenta_cobrar_session==null) {
			$parametro_cuenta_cobrar_session=new parametro_cuenta_cobrar_session();
		}
		
		if($parametro_cuenta_cobrar_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($parametro_cuenta_cobrarForeignKey->idempresaDefaultFK==0) {
					$parametro_cuenta_cobrarForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$parametro_cuenta_cobrarForeignKey->empresasFK[$empresaLocal->getId()]=parametro_cuenta_cobrar_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($parametro_cuenta_cobrar_session->bigidempresaActual!=null && $parametro_cuenta_cobrar_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($parametro_cuenta_cobrar_session->bigidempresaActual);//WithConnection

				$parametro_cuenta_cobrarForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=parametro_cuenta_cobrar_util::getempresaDescripcion($empresaLogic->getempresa());
				$parametro_cuenta_cobrarForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($parametro_cuenta_cobrar) {
		$this->saveRelacionesBase($parametro_cuenta_cobrar,true);
	}

	public function saveRelaciones($parametro_cuenta_cobrar) {
		$this->saveRelacionesBase($parametro_cuenta_cobrar,false);
	}

	public function saveRelacionesBase($parametro_cuenta_cobrar,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setparametro_cuenta_cobrar($parametro_cuenta_cobrar);

			if(true) {

				//parametro_cuenta_cobrar_logic_add::updateRelacionesToSave($parametro_cuenta_cobrar,$this);

				if(($this->parametro_cuenta_cobrar->getIsNew() || $this->parametro_cuenta_cobrar->getIsChanged()) && !$this->parametro_cuenta_cobrar->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->parametro_cuenta_cobrar->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//parametro_cuenta_cobrar_logic_add::updateRelacionesToSaveAfter($parametro_cuenta_cobrar,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $parametro_cuenta_cobrars,parametro_cuenta_cobrar_param_return $parametro_cuenta_cobrarParameterGeneral) : parametro_cuenta_cobrar_param_return {
		$parametro_cuenta_cobrarReturnGeneral=new parametro_cuenta_cobrar_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $parametro_cuenta_cobrarReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $parametro_cuenta_cobrars,parametro_cuenta_cobrar_param_return $parametro_cuenta_cobrarParameterGeneral) : parametro_cuenta_cobrar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_cuenta_cobrarReturnGeneral=new parametro_cuenta_cobrar_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_cuenta_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_cuenta_cobrars,parametro_cuenta_cobrar $parametro_cuenta_cobrar,parametro_cuenta_cobrar_param_return $parametro_cuenta_cobrarParameterGeneral,bool $isEsNuevoparametro_cuenta_cobrar,array $clases) : parametro_cuenta_cobrar_param_return {
		 try {	
			$parametro_cuenta_cobrarReturnGeneral=new parametro_cuenta_cobrar_param_return();
	
			$parametro_cuenta_cobrarReturnGeneral->setparametro_cuenta_cobrar($parametro_cuenta_cobrar);
			$parametro_cuenta_cobrarReturnGeneral->setparametro_cuenta_cobrars($parametro_cuenta_cobrars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$parametro_cuenta_cobrarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $parametro_cuenta_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_cuenta_cobrars,parametro_cuenta_cobrar $parametro_cuenta_cobrar,parametro_cuenta_cobrar_param_return $parametro_cuenta_cobrarParameterGeneral,bool $isEsNuevoparametro_cuenta_cobrar,array $clases) : parametro_cuenta_cobrar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_cuenta_cobrarReturnGeneral=new parametro_cuenta_cobrar_param_return();
	
			$parametro_cuenta_cobrarReturnGeneral->setparametro_cuenta_cobrar($parametro_cuenta_cobrar);
			$parametro_cuenta_cobrarReturnGeneral->setparametro_cuenta_cobrars($parametro_cuenta_cobrars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$parametro_cuenta_cobrarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_cuenta_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_cuenta_cobrars,parametro_cuenta_cobrar $parametro_cuenta_cobrar,parametro_cuenta_cobrar_param_return $parametro_cuenta_cobrarParameterGeneral,bool $isEsNuevoparametro_cuenta_cobrar,array $clases) : parametro_cuenta_cobrar_param_return {
		 try {	
			$parametro_cuenta_cobrarReturnGeneral=new parametro_cuenta_cobrar_param_return();
	
			$parametro_cuenta_cobrarReturnGeneral->setparametro_cuenta_cobrar($parametro_cuenta_cobrar);
			$parametro_cuenta_cobrarReturnGeneral->setparametro_cuenta_cobrars($parametro_cuenta_cobrars);
			
			
			
			return $parametro_cuenta_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_cuenta_cobrars,parametro_cuenta_cobrar $parametro_cuenta_cobrar,parametro_cuenta_cobrar_param_return $parametro_cuenta_cobrarParameterGeneral,bool $isEsNuevoparametro_cuenta_cobrar,array $clases) : parametro_cuenta_cobrar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_cuenta_cobrarReturnGeneral=new parametro_cuenta_cobrar_param_return();
	
			$parametro_cuenta_cobrarReturnGeneral->setparametro_cuenta_cobrar($parametro_cuenta_cobrar);
			$parametro_cuenta_cobrarReturnGeneral->setparametro_cuenta_cobrars($parametro_cuenta_cobrars);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_cuenta_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,parametro_cuenta_cobrar $parametro_cuenta_cobrar,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,parametro_cuenta_cobrar $parametro_cuenta_cobrar,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		parametro_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(parametro_cuenta_cobrar $parametro_cuenta_cobrar,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//parametro_cuenta_cobrar_logic_add::updateparametro_cuenta_cobrarToGet($this->parametro_cuenta_cobrar);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$parametro_cuenta_cobrar->setempresa($this->parametro_cuenta_cobrarDataAccess->getempresa($this->connexion,$parametro_cuenta_cobrar));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$parametro_cuenta_cobrar->setempresa($this->parametro_cuenta_cobrarDataAccess->getempresa($this->connexion,$parametro_cuenta_cobrar));
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
			$parametro_cuenta_cobrar->setempresa($this->parametro_cuenta_cobrarDataAccess->getempresa($this->connexion,$parametro_cuenta_cobrar));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$parametro_cuenta_cobrar->setempresa($this->parametro_cuenta_cobrarDataAccess->getempresa($this->connexion,$parametro_cuenta_cobrar));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($parametro_cuenta_cobrar->getempresa(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$parametro_cuenta_cobrar->setempresa($this->parametro_cuenta_cobrarDataAccess->getempresa($this->connexion,$parametro_cuenta_cobrar));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($parametro_cuenta_cobrar->getempresa(),$isDeep,$deepLoadType,$clases);				
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
			$parametro_cuenta_cobrar->setempresa($this->parametro_cuenta_cobrarDataAccess->getempresa($this->connexion,$parametro_cuenta_cobrar));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($parametro_cuenta_cobrar->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(parametro_cuenta_cobrar $parametro_cuenta_cobrar,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//parametro_cuenta_cobrar_logic_add::updateparametro_cuenta_cobrarToSave($this->parametro_cuenta_cobrar);			
			
			if(!$paraDeleteCascade) {				
				parametro_cuenta_cobrar_data::save($parametro_cuenta_cobrar, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($parametro_cuenta_cobrar->getempresa(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($parametro_cuenta_cobrar->getempresa(),$this->connexion);
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
			empresa_data::save($parametro_cuenta_cobrar->getempresa(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($parametro_cuenta_cobrar->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($parametro_cuenta_cobrar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($parametro_cuenta_cobrar->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($parametro_cuenta_cobrar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
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
			empresa_data::save($parametro_cuenta_cobrar->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($parametro_cuenta_cobrar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				parametro_cuenta_cobrar_data::save($parametro_cuenta_cobrar, $this->connexion);
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
			
			$this->deepLoad($this->parametro_cuenta_cobrar,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->parametro_cuenta_cobrars as $parametro_cuenta_cobrar) {
				$this->deepLoad($parametro_cuenta_cobrar,$isDeep,$deepLoadType,$clases);
								
				parametro_cuenta_cobrar_util::refrescarFKDescripciones($this->parametro_cuenta_cobrars);
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
			
			foreach($this->parametro_cuenta_cobrars as $parametro_cuenta_cobrar) {
				$this->deepLoad($parametro_cuenta_cobrar,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->parametro_cuenta_cobrar,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->parametro_cuenta_cobrars as $parametro_cuenta_cobrar) {
				$this->deepSave($parametro_cuenta_cobrar,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->parametro_cuenta_cobrars as $parametro_cuenta_cobrar) {
				$this->deepSave($parametro_cuenta_cobrar,$isDeep,$deepLoadType,$clases,false);
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
	
	
	
	
	
	
	
	public function getparametro_cuenta_cobrar() : ?parametro_cuenta_cobrar {	
		/*
		parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToGet($this->parametro_cuenta_cobrar,$this->datosCliente);
		parametro_cuenta_cobrar_logic_add::updateparametro_cuenta_cobrarToGet($this->parametro_cuenta_cobrar);
		*/
			
		return $this->parametro_cuenta_cobrar;
	}
		
	public function setparametro_cuenta_cobrar(parametro_cuenta_cobrar $newparametro_cuenta_cobrar) {
		$this->parametro_cuenta_cobrar = $newparametro_cuenta_cobrar;
	}
	
	public function getparametro_cuenta_cobrars() : array {		
		/*
		parametro_cuenta_cobrar_logic_add::checkparametro_cuenta_cobrarToGets($this->parametro_cuenta_cobrars,$this->datosCliente);
		
		foreach ($this->parametro_cuenta_cobrars as $parametro_cuenta_cobrarLocal ) {
			parametro_cuenta_cobrar_logic_add::updateparametro_cuenta_cobrarToGet($parametro_cuenta_cobrarLocal);
		}
		*/
		
		return $this->parametro_cuenta_cobrars;
	}
	
	public function setparametro_cuenta_cobrars(array $newparametro_cuenta_cobrars) {
		$this->parametro_cuenta_cobrars = $newparametro_cuenta_cobrars;
	}
	
	public function getparametro_cuenta_cobrarDataAccess() : parametro_cuenta_cobrar_data {
		return $this->parametro_cuenta_cobrarDataAccess;
	}
	
	public function setparametro_cuenta_cobrarDataAccess(parametro_cuenta_cobrar_data $newparametro_cuenta_cobrarDataAccess) {
		$this->parametro_cuenta_cobrarDataAccess = $newparametro_cuenta_cobrarDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        parametro_cuenta_cobrar_carga::$CONTROLLER;;        
		
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
