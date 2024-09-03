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

namespace com\bydan\contabilidad\cuentascorrientes\banco\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentascorrientes\banco\util\banco_carga;
use com\bydan\contabilidad\cuentascorrientes\banco\util\banco_param_return;

use com\bydan\contabilidad\cuentascorrientes\banco\presentation\session\banco_session;

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

use com\bydan\contabilidad\cuentascorrientes\banco\util\banco_util;
use com\bydan\contabilidad\cuentascorrientes\banco\business\entity\banco;
use com\bydan\contabilidad\cuentascorrientes\banco\business\data\banco_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

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



class banco_logic  extends GeneralEntityLogic implements banco_logicI {	
	/*GENERAL*/
	public banco_data $bancoDataAccess;
	//public ?banco_logic_add $bancoLogicAdditional=null;
	public ?banco $banco;
	public array $bancos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->bancoDataAccess = new banco_data();			
			$this->bancos = array();
			$this->banco = new banco();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->bancoLogicAdditional = new banco_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->bancoLogicAdditional==null) {
		//	$this->bancoLogicAdditional=new banco_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->bancoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->bancoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->bancoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->bancoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->bancos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->bancos=$this->bancoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				banco_util::refrescarFKDescripciones($this->bancos);
			}
			
			//banco_logic_add::checkbancoToGets($this->bancos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->bancos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->bancos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->bancos=$this->bancoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				banco_util::refrescarFKDescripciones($this->bancos);
			}
			
			//banco_logic_add::checkbancoToGets($this->bancos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->bancos);
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
		$this->banco = new banco();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->banco=$this->bancoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->banco,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				banco_util::refrescarFKDescripcion($this->banco);
			}
						
			//banco_logic_add::checkbancoToGet($this->banco,$this->datosCliente);
			//banco_logic_add::updatebancoToGet($this->banco);
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
		$this->banco = new  banco();
		  		  
        try {		
			$this->banco=$this->bancoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->banco,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				banco_util::refrescarFKDescripcion($this->banco);
			}
			
			//banco_logic_add::checkbancoToGet($this->banco,$this->datosCliente);
			//banco_logic_add::updatebancoToGet($this->banco);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?banco {
		$bancoLogic = new  banco_logic();
		  		  
        try {		
			$bancoLogic->setConnexion($connexion);			
			$bancoLogic->getEntity($id);			
			return $bancoLogic->getbanco();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->banco = new  banco();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->banco=$this->bancoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->banco,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				banco_util::refrescarFKDescripcion($this->banco);
			}
			
			//banco_logic_add::checkbancoToGet($this->banco,$this->datosCliente);
			//banco_logic_add::updatebancoToGet($this->banco);
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
		$this->banco = new  banco();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->banco=$this->bancoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->banco,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				banco_util::refrescarFKDescripcion($this->banco);
			}
			
			//banco_logic_add::checkbancoToGet($this->banco,$this->datosCliente);
			//banco_logic_add::updatebancoToGet($this->banco);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?banco {
		$bancoLogic = new  banco_logic();
		  		  
        try {		
			$bancoLogic->setConnexion($connexion);			
			$bancoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $bancoLogic->getbanco();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->bancos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->bancos=$this->bancoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				banco_util::refrescarFKDescripciones($this->bancos);
			}
			
			//banco_logic_add::checkbancoToGets($this->bancos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->bancos);			
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
		$this->bancos = array();
		  		  
        try {			
			$this->bancos=$this->bancoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				banco_util::refrescarFKDescripciones($this->bancos);
			}
			
			//banco_logic_add::checkbancoToGets($this->bancos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->bancos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->bancos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->bancos=$this->bancoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				banco_util::refrescarFKDescripciones($this->bancos);
			}
			
			//banco_logic_add::checkbancoToGets($this->bancos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->bancos);
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
		$this->bancos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->bancos=$this->bancoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				banco_util::refrescarFKDescripciones($this->bancos);
			}
			
			//banco_logic_add::checkbancoToGets($this->bancos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->bancos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$bancoLogic = new  banco_logic();
		  		  
        try {		
			$bancoLogic->setConnexion($connexion);			
			$bancoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $bancoLogic->getbancos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->bancos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->bancos=$this->bancoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				banco_util::refrescarFKDescripciones($this->bancos);
			}
			
			//banco_logic_add::checkbancoToGets($this->bancos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->bancos);
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
		$this->bancos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->bancos=$this->bancoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				banco_util::refrescarFKDescripciones($this->bancos);
			}
			
			//banco_logic_add::checkbancoToGets($this->bancos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->bancos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->bancos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->bancos=$this->bancoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				banco_util::refrescarFKDescripciones($this->bancos);
			}
			
			//banco_logic_add::checkbancoToGets($this->bancos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->bancos);
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
		$this->bancos = array();
		  		  
        try {			
			$this->bancos=$this->bancoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				banco_util::refrescarFKDescripciones($this->bancos);
			}	
			
			//banco_logic_add::checkbancoToGets($this->bancos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->bancos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->bancos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->bancos=$this->bancoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				banco_util::refrescarFKDescripciones($this->bancos);
			}
			
			//banco_logic_add::checkbancoToGets($this->bancos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->bancos);
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
		$this->bancos = array();
		  		  
        try {		
			$this->bancos=$this->bancoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				banco_util::refrescarFKDescripciones($this->bancos);
			}
			
			//banco_logic_add::checkbancoToGets($this->bancos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->bancos);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,banco_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->bancos=$this->bancoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				banco_util::refrescarFKDescripciones($this->bancos);
			}
			//banco_logic_add::checkbancoToGets($this->bancos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->bancos);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,banco_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->bancos=$this->bancoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				banco_util::refrescarFKDescripciones($this->bancos);
			}
			//banco_logic_add::checkbancoToGets($this->bancos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->bancos);
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
						
			//banco_logic_add::checkbancoToSave($this->banco,$this->datosCliente,$this->connexion);	       
			//banco_logic_add::updatebancoToSave($this->banco);			
			banco_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->banco,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->bancoLogicAdditional->checkGeneralEntityToSave($this,$this->banco,$this->datosCliente,$this->connexion);
			
			
			banco_data::save($this->banco, $this->connexion);	    	       	 				
			//banco_logic_add::checkbancoToSaveAfter($this->banco,$this->datosCliente,$this->connexion);			
			//$this->bancoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->banco,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->banco,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->banco,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				banco_util::refrescarFKDescripcion($this->banco);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->banco->getIsDeleted()) {
				$this->banco=null;
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
						
			/*banco_logic_add::checkbancoToSave($this->banco,$this->datosCliente,$this->connexion);*/	        
			//banco_logic_add::updatebancoToSave($this->banco);			
			//$this->bancoLogicAdditional->checkGeneralEntityToSave($this,$this->banco,$this->datosCliente,$this->connexion);			
			banco_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->banco,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			banco_data::save($this->banco, $this->connexion);	    	       	 						
			/*banco_logic_add::checkbancoToSaveAfter($this->banco,$this->datosCliente,$this->connexion);*/			
			//$this->bancoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->banco,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->banco,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->banco,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				banco_util::refrescarFKDescripcion($this->banco);				
			}
			
			if($this->banco->getIsDeleted()) {
				$this->banco=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(banco $banco,Connexion $connexion)  {
		$bancoLogic = new  banco_logic();		  		  
        try {		
			$bancoLogic->setConnexion($connexion);			
			$bancoLogic->setbanco($banco);			
			$bancoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*banco_logic_add::checkbancoToSaves($this->bancos,$this->datosCliente,$this->connexion);*/	        	
			//$this->bancoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->bancos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->bancos as $bancoLocal) {				
								
				//banco_logic_add::updatebancoToSave($bancoLocal);	        	
				banco_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$bancoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				banco_data::save($bancoLocal, $this->connexion);				
			}
			
			/*banco_logic_add::checkbancoToSavesAfter($this->bancos,$this->datosCliente,$this->connexion);*/			
			//$this->bancoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->bancos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				banco_util::refrescarFKDescripciones($this->bancos);
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
			/*banco_logic_add::checkbancoToSaves($this->bancos,$this->datosCliente,$this->connexion);*/			
			//$this->bancoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->bancos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->bancos as $bancoLocal) {				
								
				//banco_logic_add::updatebancoToSave($bancoLocal);	        	
				banco_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$bancoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				banco_data::save($bancoLocal, $this->connexion);				
			}			
			
			/*banco_logic_add::checkbancoToSavesAfter($this->bancos,$this->datosCliente,$this->connexion);*/			
			//$this->bancoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->bancos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				banco_util::refrescarFKDescripciones($this->bancos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $bancos,Connexion $connexion)  {
		$bancoLogic = new  banco_logic();
		  		  
        try {		
			$bancoLogic->setConnexion($connexion);			
			$bancoLogic->setbancos($bancos);			
			$bancoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$bancosAux=array();
		
		foreach($this->bancos as $banco) {
			if($banco->getIsDeleted()==false) {
				$bancosAux[]=$banco;
			}
		}
		
		$this->bancos=$bancosAux;
	}
	
	public function updateToGetsAuxiliar(array &$bancos) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->bancos as $banco) {
				
				$banco->setid_empresa_Descripcion(banco_util::getempresaDescripcion($banco->getempresa()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$banco_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$banco_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$banco_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$banco_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$banco_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$bancoForeignKey=new banco_param_return();//bancoForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$bancoForeignKey,$banco_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$bancoForeignKey,$banco_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $bancoForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$bancoForeignKey,$banco_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$bancoForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($banco_session==null) {
			$banco_session=new banco_session();
		}
		
		if($banco_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($bancoForeignKey->idempresaDefaultFK==0) {
					$bancoForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$bancoForeignKey->empresasFK[$empresaLocal->getId()]=banco_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($banco_session->bigidempresaActual!=null && $banco_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($banco_session->bigidempresaActual);//WithConnection

				$bancoForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=banco_util::getempresaDescripcion($empresaLogic->getempresa());
				$bancoForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($banco,$cuentacorrientes) {
		$this->saveRelacionesBase($banco,$cuentacorrientes,true);
	}

	public function saveRelaciones($banco,$cuentacorrientes) {
		$this->saveRelacionesBase($banco,$cuentacorrientes,false);
	}

	public function saveRelacionesBase($banco,$cuentacorrientes=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$banco->setcuenta_corrientes($cuentacorrientes);
			$this->setbanco($banco);

			if(true) {

				//banco_logic_add::updateRelacionesToSave($banco,$this);

				if(($this->banco->getIsNew() || $this->banco->getIsChanged()) && !$this->banco->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($cuentacorrientes);

				} else if($this->banco->getIsDeleted()) {
					$this->saveRelacionesDetalles($cuentacorrientes);
					$this->save();
				}

				//banco_logic_add::updateRelacionesToSaveAfter($banco,$this);

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
	
	
	public function saveRelacionesDetalles($cuentacorrientes=array()) {
		try {
	

			$idbancoActual=$this->getbanco()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/util/cuenta_corriente_carga.php');
			cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cuentacorrienteLogic_Desde_banco=new cuenta_corriente_logic();
			$cuentacorrienteLogic_Desde_banco->setcuenta_corrientes($cuentacorrientes);

			$cuentacorrienteLogic_Desde_banco->setConnexion($this->getConnexion());
			$cuentacorrienteLogic_Desde_banco->setDatosCliente($this->datosCliente);

			foreach($cuentacorrienteLogic_Desde_banco->getcuenta_corrientes() as $cuentacorriente_Desde_banco) {
				$cuentacorriente_Desde_banco->setid_banco($idbancoActual);

				$cuentacorrienteLogic_Desde_banco->setcuenta_corriente($cuentacorriente_Desde_banco);
				$cuentacorrienteLogic_Desde_banco->save();

				$idcuenta_corrienteActual=$cuenta_corriente_Desde_banco->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/util/cheque_cuenta_corriente_carga.php');
				cheque_cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$chequecuentacorrienteLogic_Desde_cuenta_corriente=new cheque_cuenta_corriente_logic();

				if($cuenta_corriente_Desde_banco->getcheque_cuenta_corrientes()==null){
					$cuenta_corriente_Desde_banco->setcheque_cuenta_corrientes(array());
				}

				$chequecuentacorrienteLogic_Desde_cuenta_corriente->setcheque_cuenta_corrientes($cuenta_corriente_Desde_banco->getcheque_cuenta_corrientes());

				$chequecuentacorrienteLogic_Desde_cuenta_corriente->setConnexion($this->getConnexion());
				$chequecuentacorrienteLogic_Desde_cuenta_corriente->setDatosCliente($this->datosCliente);

				foreach($chequecuentacorrienteLogic_Desde_cuenta_corriente->getcheque_cuenta_corrientes() as $chequecuentacorriente_Desde_cuenta_corriente) {
					$chequecuentacorriente_Desde_cuenta_corriente->setid_cuenta_corriente($idcuenta_corrienteActual);
				}

				$chequecuentacorrienteLogic_Desde_cuenta_corriente->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/util/retiro_cuenta_corriente_carga.php');
				retiro_cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$retirocuentacorrienteLogic_Desde_cuenta_corriente=new retiro_cuenta_corriente_logic();

				if($cuenta_corriente_Desde_banco->getretiro_cuenta_corrientes()==null){
					$cuenta_corriente_Desde_banco->setretiro_cuenta_corrientes(array());
				}

				$retirocuentacorrienteLogic_Desde_cuenta_corriente->setretiro_cuenta_corrientes($cuenta_corriente_Desde_banco->getretiro_cuenta_corrientes());

				$retirocuentacorrienteLogic_Desde_cuenta_corriente->setConnexion($this->getConnexion());
				$retirocuentacorrienteLogic_Desde_cuenta_corriente->setDatosCliente($this->datosCliente);

				foreach($retirocuentacorrienteLogic_Desde_cuenta_corriente->getretiro_cuenta_corrientes() as $retirocuentacorriente_Desde_cuenta_corriente) {
					$retirocuentacorriente_Desde_cuenta_corriente->setid_cuenta_corriente($idcuenta_corrienteActual);
				}

				$retirocuentacorrienteLogic_Desde_cuenta_corriente->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/util/deposito_cuenta_corriente_carga.php');
				deposito_cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$depositocuentacorrienteLogic_Desde_cuenta_corriente=new deposito_cuenta_corriente_logic();

				if($cuenta_corriente_Desde_banco->getdeposito_cuenta_corrientes()==null){
					$cuenta_corriente_Desde_banco->setdeposito_cuenta_corrientes(array());
				}

				$depositocuentacorrienteLogic_Desde_cuenta_corriente->setdeposito_cuenta_corrientes($cuenta_corriente_Desde_banco->getdeposito_cuenta_corrientes());

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $bancos,banco_param_return $bancoParameterGeneral) : banco_param_return {
		$bancoReturnGeneral=new banco_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $bancoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $bancos,banco_param_return $bancoParameterGeneral) : banco_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$bancoReturnGeneral=new banco_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $bancoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $bancos,banco $banco,banco_param_return $bancoParameterGeneral,bool $isEsNuevobanco,array $clases) : banco_param_return {
		 try {	
			$bancoReturnGeneral=new banco_param_return();
	
			$bancoReturnGeneral->setbanco($banco);
			$bancoReturnGeneral->setbancos($bancos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$bancoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $bancoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $bancos,banco $banco,banco_param_return $bancoParameterGeneral,bool $isEsNuevobanco,array $clases) : banco_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$bancoReturnGeneral=new banco_param_return();
	
			$bancoReturnGeneral->setbanco($banco);
			$bancoReturnGeneral->setbancos($bancos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$bancoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $bancoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $bancos,banco $banco,banco_param_return $bancoParameterGeneral,bool $isEsNuevobanco,array $clases) : banco_param_return {
		 try {	
			$bancoReturnGeneral=new banco_param_return();
	
			$bancoReturnGeneral->setbanco($banco);
			$bancoReturnGeneral->setbancos($bancos);
			
			
			
			return $bancoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $bancos,banco $banco,banco_param_return $bancoParameterGeneral,bool $isEsNuevobanco,array $clases) : banco_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$bancoReturnGeneral=new banco_param_return();
	
			$bancoReturnGeneral->setbanco($banco);
			$bancoReturnGeneral->setbancos($bancos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $bancoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,banco $banco,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,banco $banco,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		banco_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		banco_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(banco $banco,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//banco_logic_add::updatebancoToGet($this->banco);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$banco->setempresa($this->bancoDataAccess->getempresa($this->connexion,$banco));
		$banco->setcuenta_corrientes($this->bancoDataAccess->getcuenta_corrientes($this->connexion,$banco));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$banco->setempresa($this->bancoDataAccess->getempresa($this->connexion,$banco));
				continue;
			}

			if($clas->clas==cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$banco->setcuenta_corrientes($this->bancoDataAccess->getcuenta_corrientes($this->connexion,$banco));

				if($this->isConDeep) {
					$cuentacorrienteLogic= new cuenta_corriente_logic($this->connexion);
					$cuentacorrienteLogic->setcuenta_corrientes($banco->getcuenta_corrientes());
					$classesLocal=cuenta_corriente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cuentacorrienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cuenta_corriente_util::refrescarFKDescripciones($cuentacorrienteLogic->getcuenta_corrientes());
					$banco->setcuenta_corrientes($cuentacorrienteLogic->getcuenta_corrientes());
				}

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
			$banco->setempresa($this->bancoDataAccess->getempresa($this->connexion,$banco));
		}

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
			$banco->setcuenta_corrientes($this->bancoDataAccess->getcuenta_corrientes($this->connexion,$banco));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$banco->setempresa($this->bancoDataAccess->getempresa($this->connexion,$banco));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($banco->getempresa(),$isDeep,$deepLoadType,$clases);
				

		$banco->setcuenta_corrientes($this->bancoDataAccess->getcuenta_corrientes($this->connexion,$banco));

		foreach($banco->getcuenta_corrientes() as $cuentacorriente) {
			$cuentacorrienteLogic= new cuenta_corriente_logic($this->connexion);
			$cuentacorrienteLogic->deepLoad($cuentacorriente,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$banco->setempresa($this->bancoDataAccess->getempresa($this->connexion,$banco));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($banco->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$banco->setcuenta_corrientes($this->bancoDataAccess->getcuenta_corrientes($this->connexion,$banco));

				foreach($banco->getcuenta_corrientes() as $cuentacorriente) {
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
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$banco->setempresa($this->bancoDataAccess->getempresa($this->connexion,$banco));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($banco->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

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
			$banco->setcuenta_corrientes($this->bancoDataAccess->getcuenta_corrientes($this->connexion,$banco));

			foreach($banco->getcuenta_corrientes() as $cuentacorriente) {
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
	
	public function deepSave(banco $banco,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//banco_logic_add::updatebancoToSave($this->banco);			
			
			if(!$paraDeleteCascade) {				
				banco_data::save($banco, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($banco->getempresa(),$this->connexion);

		foreach($banco->getcuenta_corrientes() as $cuentacorriente) {
			$cuentacorriente->setid_banco($banco->getId());
			cuenta_corriente_data::save($cuentacorriente,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($banco->getempresa(),$this->connexion);
				continue;
			}


			if($clas->clas==cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($banco->getcuenta_corrientes() as $cuentacorriente) {
					$cuentacorriente->setid_banco($banco->getId());
					cuenta_corriente_data::save($cuentacorriente,$this->connexion);
				}

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
			empresa_data::save($banco->getempresa(),$this->connexion);
		}


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

			foreach($banco->getcuenta_corrientes() as $cuentacorriente) {
				$cuentacorriente->setid_banco($banco->getId());
				cuenta_corriente_data::save($cuentacorriente,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($banco->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($banco->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($banco->getcuenta_corrientes() as $cuentacorriente) {
			$cuentacorrienteLogic= new cuenta_corriente_logic($this->connexion);
			$cuentacorriente->setid_banco($banco->getId());
			cuenta_corriente_data::save($cuentacorriente,$this->connexion);
			$cuentacorrienteLogic->deepSave($cuentacorriente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($banco->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($banco->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($banco->getcuenta_corrientes() as $cuentacorriente) {
					$cuentacorrienteLogic= new cuenta_corriente_logic($this->connexion);
					$cuentacorriente->setid_banco($banco->getId());
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
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			empresa_data::save($banco->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($banco->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


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

			foreach($banco->getcuenta_corrientes() as $cuentacorriente) {
				$cuentacorrienteLogic= new cuenta_corriente_logic($this->connexion);
				$cuentacorriente->setid_banco($banco->getId());
				cuenta_corriente_data::save($cuentacorriente,$this->connexion);
				$cuentacorrienteLogic->deepSave($cuentacorriente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				banco_data::save($banco, $this->connexion);
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
			
			$this->deepLoad($this->banco,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->bancos as $banco) {
				$this->deepLoad($banco,$isDeep,$deepLoadType,$clases);
								
				banco_util::refrescarFKDescripciones($this->bancos);
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
			
			foreach($this->bancos as $banco) {
				$this->deepLoad($banco,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->banco,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->bancos as $banco) {
				$this->deepSave($banco,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->bancos as $banco) {
				$this->deepSave($banco,$isDeep,$deepLoadType,$clases,false);
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
	
	
	
	
	
	
	
	public function getbanco() : ?banco {	
		/*
		banco_logic_add::checkbancoToGet($this->banco,$this->datosCliente);
		banco_logic_add::updatebancoToGet($this->banco);
		*/
			
		return $this->banco;
	}
		
	public function setbanco(banco $newbanco) {
		$this->banco = $newbanco;
	}
	
	public function getbancos() : array {		
		/*
		banco_logic_add::checkbancoToGets($this->bancos,$this->datosCliente);
		
		foreach ($this->bancos as $bancoLocal ) {
			banco_logic_add::updatebancoToGet($bancoLocal);
		}
		*/
		
		return $this->bancos;
	}
	
	public function setbancos(array $newbancos) {
		$this->bancos = $newbancos;
	}
	
	public function getbancoDataAccess() : banco_data {
		return $this->bancoDataAccess;
	}
	
	public function setbancoDataAccess(banco_data $newbancoDataAccess) {
		$this->bancoDataAccess = $newbancoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        banco_carga::$CONTROLLER;;        
		
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
