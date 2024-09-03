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

namespace com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_carga;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_param_return;

use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\presentation\session\categoria_cheque_session;

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

use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_util;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\entity\categoria_cheque;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\data\categoria_cheque_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

//REL


use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\entity\cheque_cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\data\cheque_cuenta_corriente_data;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\logic\cheque_cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_util;

use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\entity\clasificacion_cheque;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\data\clasificacion_cheque_data;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\logic\clasificacion_cheque_logic;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_carga;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_util;

//REL DETALLES




class categoria_cheque_logic  extends GeneralEntityLogic implements categoria_cheque_logicI {	
	/*GENERAL*/
	public categoria_cheque_data $categoria_chequeDataAccess;
	//public ?categoria_cheque_logic_add $categoria_chequeLogicAdditional=null;
	public ?categoria_cheque $categoria_cheque;
	public array $categoria_cheques;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->categoria_chequeDataAccess = new categoria_cheque_data();			
			$this->categoria_cheques = array();
			$this->categoria_cheque = new categoria_cheque();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->categoria_chequeLogicAdditional = new categoria_cheque_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->categoria_chequeLogicAdditional==null) {
		//	$this->categoria_chequeLogicAdditional=new categoria_cheque_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->categoria_chequeDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->categoria_chequeDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->categoria_chequeDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->categoria_chequeDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->categoria_cheques = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_cheques=$this->categoria_chequeDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cheque_util::refrescarFKDescripciones($this->categoria_cheques);
			}
			
			//categoria_cheque_logic_add::checkcategoria_chequeToGets($this->categoria_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_cheques);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->categoria_cheques = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_cheques=$this->categoria_chequeDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cheque_util::refrescarFKDescripciones($this->categoria_cheques);
			}
			
			//categoria_cheque_logic_add::checkcategoria_chequeToGets($this->categoria_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_cheques);
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
		$this->categoria_cheque = new categoria_cheque();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->categoria_cheque=$this->categoria_chequeDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->categoria_cheque,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				categoria_cheque_util::refrescarFKDescripcion($this->categoria_cheque);
			}
						
			//categoria_cheque_logic_add::checkcategoria_chequeToGet($this->categoria_cheque,$this->datosCliente);
			//categoria_cheque_logic_add::updatecategoria_chequeToGet($this->categoria_cheque);
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
		$this->categoria_cheque = new  categoria_cheque();
		  		  
        try {		
			$this->categoria_cheque=$this->categoria_chequeDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->categoria_cheque,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				categoria_cheque_util::refrescarFKDescripcion($this->categoria_cheque);
			}
			
			//categoria_cheque_logic_add::checkcategoria_chequeToGet($this->categoria_cheque,$this->datosCliente);
			//categoria_cheque_logic_add::updatecategoria_chequeToGet($this->categoria_cheque);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?categoria_cheque {
		$categoria_chequeLogic = new  categoria_cheque_logic();
		  		  
        try {		
			$categoria_chequeLogic->setConnexion($connexion);			
			$categoria_chequeLogic->getEntity($id);			
			return $categoria_chequeLogic->getcategoria_cheque();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->categoria_cheque = new  categoria_cheque();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->categoria_cheque=$this->categoria_chequeDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->categoria_cheque,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				categoria_cheque_util::refrescarFKDescripcion($this->categoria_cheque);
			}
			
			//categoria_cheque_logic_add::checkcategoria_chequeToGet($this->categoria_cheque,$this->datosCliente);
			//categoria_cheque_logic_add::updatecategoria_chequeToGet($this->categoria_cheque);
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
		$this->categoria_cheque = new  categoria_cheque();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_cheque=$this->categoria_chequeDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->categoria_cheque,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				categoria_cheque_util::refrescarFKDescripcion($this->categoria_cheque);
			}
			
			//categoria_cheque_logic_add::checkcategoria_chequeToGet($this->categoria_cheque,$this->datosCliente);
			//categoria_cheque_logic_add::updatecategoria_chequeToGet($this->categoria_cheque);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?categoria_cheque {
		$categoria_chequeLogic = new  categoria_cheque_logic();
		  		  
        try {		
			$categoria_chequeLogic->setConnexion($connexion);			
			$categoria_chequeLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $categoria_chequeLogic->getcategoria_cheque();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->categoria_cheques = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->categoria_cheques=$this->categoria_chequeDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cheque_util::refrescarFKDescripciones($this->categoria_cheques);
			}
			
			//categoria_cheque_logic_add::checkcategoria_chequeToGets($this->categoria_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_cheques);			
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
		$this->categoria_cheques = array();
		  		  
        try {			
			$this->categoria_cheques=$this->categoria_chequeDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cheque_util::refrescarFKDescripciones($this->categoria_cheques);
			}
			
			//categoria_cheque_logic_add::checkcategoria_chequeToGets($this->categoria_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_cheques);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->categoria_cheques = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_cheques=$this->categoria_chequeDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cheque_util::refrescarFKDescripciones($this->categoria_cheques);
			}
			
			//categoria_cheque_logic_add::checkcategoria_chequeToGets($this->categoria_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_cheques);
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
		$this->categoria_cheques = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_cheques=$this->categoria_chequeDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cheque_util::refrescarFKDescripciones($this->categoria_cheques);
			}
			
			//categoria_cheque_logic_add::checkcategoria_chequeToGets($this->categoria_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_cheques);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$categoria_chequeLogic = new  categoria_cheque_logic();
		  		  
        try {		
			$categoria_chequeLogic->setConnexion($connexion);			
			$categoria_chequeLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $categoria_chequeLogic->getcategoria_cheques();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->categoria_cheques = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->categoria_cheques=$this->categoria_chequeDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cheque_util::refrescarFKDescripciones($this->categoria_cheques);
			}
			
			//categoria_cheque_logic_add::checkcategoria_chequeToGets($this->categoria_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_cheques);
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
		$this->categoria_cheques = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_cheques=$this->categoria_chequeDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cheque_util::refrescarFKDescripciones($this->categoria_cheques);
			}
			
			//categoria_cheque_logic_add::checkcategoria_chequeToGets($this->categoria_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_cheques);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->categoria_cheques = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_cheques=$this->categoria_chequeDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cheque_util::refrescarFKDescripciones($this->categoria_cheques);
			}
			
			//categoria_cheque_logic_add::checkcategoria_chequeToGets($this->categoria_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_cheques);
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
		$this->categoria_cheques = array();
		  		  
        try {			
			$this->categoria_cheques=$this->categoria_chequeDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cheque_util::refrescarFKDescripciones($this->categoria_cheques);
			}	
			
			//categoria_cheque_logic_add::checkcategoria_chequeToGets($this->categoria_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_cheques);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->categoria_cheques = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->categoria_cheques=$this->categoria_chequeDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cheque_util::refrescarFKDescripciones($this->categoria_cheques);
			}
			
			//categoria_cheque_logic_add::checkcategoria_chequeToGets($this->categoria_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_cheques);
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
		$this->categoria_cheques = array();
		  		  
        try {		
			$this->categoria_cheques=$this->categoria_chequeDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cheque_util::refrescarFKDescripciones($this->categoria_cheques);
			}
			
			//categoria_cheque_logic_add::checkcategoria_chequeToGets($this->categoria_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_cheques);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdcuentaWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_cuenta) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta,categoria_cheque_util::$ID_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta);

			$this->categoria_cheques=$this->categoria_chequeDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				categoria_cheque_util::refrescarFKDescripciones($this->categoria_cheques);
			}
			//categoria_cheque_logic_add::checkcategoria_chequeToGets($this->categoria_cheques,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->categoria_cheques);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta(string $strFinalQuery,Pagination $pagination,?int $id_cuenta) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta,categoria_cheque_util::$ID_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta);

			$this->categoria_cheques=$this->categoria_chequeDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				categoria_cheque_util::refrescarFKDescripciones($this->categoria_cheques);
			}
			//categoria_cheque_logic_add::checkcategoria_chequeToGets($this->categoria_cheques,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->categoria_cheques);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,categoria_cheque_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->categoria_cheques=$this->categoria_chequeDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				categoria_cheque_util::refrescarFKDescripciones($this->categoria_cheques);
			}
			//categoria_cheque_logic_add::checkcategoria_chequeToGets($this->categoria_cheques,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->categoria_cheques);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,categoria_cheque_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->categoria_cheques=$this->categoria_chequeDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				categoria_cheque_util::refrescarFKDescripciones($this->categoria_cheques);
			}
			//categoria_cheque_logic_add::checkcategoria_chequeToGets($this->categoria_cheques,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->categoria_cheques);
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
						
			//categoria_cheque_logic_add::checkcategoria_chequeToSave($this->categoria_cheque,$this->datosCliente,$this->connexion);	       
			//categoria_cheque_logic_add::updatecategoria_chequeToSave($this->categoria_cheque);			
			categoria_cheque_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->categoria_cheque,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->categoria_chequeLogicAdditional->checkGeneralEntityToSave($this,$this->categoria_cheque,$this->datosCliente,$this->connexion);
			
			
			categoria_cheque_data::save($this->categoria_cheque, $this->connexion);	    	       	 				
			//categoria_cheque_logic_add::checkcategoria_chequeToSaveAfter($this->categoria_cheque,$this->datosCliente,$this->connexion);			
			//$this->categoria_chequeLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->categoria_cheque,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->categoria_cheque,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->categoria_cheque,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				categoria_cheque_util::refrescarFKDescripcion($this->categoria_cheque);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->categoria_cheque->getIsDeleted()) {
				$this->categoria_cheque=null;
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
						
			/*categoria_cheque_logic_add::checkcategoria_chequeToSave($this->categoria_cheque,$this->datosCliente,$this->connexion);*/	        
			//categoria_cheque_logic_add::updatecategoria_chequeToSave($this->categoria_cheque);			
			//$this->categoria_chequeLogicAdditional->checkGeneralEntityToSave($this,$this->categoria_cheque,$this->datosCliente,$this->connexion);			
			categoria_cheque_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->categoria_cheque,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			categoria_cheque_data::save($this->categoria_cheque, $this->connexion);	    	       	 						
			/*categoria_cheque_logic_add::checkcategoria_chequeToSaveAfter($this->categoria_cheque,$this->datosCliente,$this->connexion);*/			
			//$this->categoria_chequeLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->categoria_cheque,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->categoria_cheque,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->categoria_cheque,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				categoria_cheque_util::refrescarFKDescripcion($this->categoria_cheque);				
			}
			
			if($this->categoria_cheque->getIsDeleted()) {
				$this->categoria_cheque=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(categoria_cheque $categoria_cheque,Connexion $connexion)  {
		$categoria_chequeLogic = new  categoria_cheque_logic();		  		  
        try {		
			$categoria_chequeLogic->setConnexion($connexion);			
			$categoria_chequeLogic->setcategoria_cheque($categoria_cheque);			
			$categoria_chequeLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*categoria_cheque_logic_add::checkcategoria_chequeToSaves($this->categoria_cheques,$this->datosCliente,$this->connexion);*/	        	
			//$this->categoria_chequeLogicAdditional->checkGeneralEntitiesToSaves($this,$this->categoria_cheques,$this->datosCliente,$this->connexion);
			
	   		foreach($this->categoria_cheques as $categoria_chequeLocal) {				
								
				//categoria_cheque_logic_add::updatecategoria_chequeToSave($categoria_chequeLocal);	        	
				categoria_cheque_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$categoria_chequeLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				categoria_cheque_data::save($categoria_chequeLocal, $this->connexion);				
			}
			
			/*categoria_cheque_logic_add::checkcategoria_chequeToSavesAfter($this->categoria_cheques,$this->datosCliente,$this->connexion);*/			
			//$this->categoria_chequeLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->categoria_cheques,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cheque_util::refrescarFKDescripciones($this->categoria_cheques);
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
			/*categoria_cheque_logic_add::checkcategoria_chequeToSaves($this->categoria_cheques,$this->datosCliente,$this->connexion);*/			
			//$this->categoria_chequeLogicAdditional->checkGeneralEntitiesToSaves($this,$this->categoria_cheques,$this->datosCliente,$this->connexion);
			
	   		foreach($this->categoria_cheques as $categoria_chequeLocal) {				
								
				//categoria_cheque_logic_add::updatecategoria_chequeToSave($categoria_chequeLocal);	        	
				categoria_cheque_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$categoria_chequeLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				categoria_cheque_data::save($categoria_chequeLocal, $this->connexion);				
			}			
			
			/*categoria_cheque_logic_add::checkcategoria_chequeToSavesAfter($this->categoria_cheques,$this->datosCliente,$this->connexion);*/			
			//$this->categoria_chequeLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->categoria_cheques,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cheque_util::refrescarFKDescripciones($this->categoria_cheques);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $categoria_cheques,Connexion $connexion)  {
		$categoria_chequeLogic = new  categoria_cheque_logic();
		  		  
        try {		
			$categoria_chequeLogic->setConnexion($connexion);			
			$categoria_chequeLogic->setcategoria_cheques($categoria_cheques);			
			$categoria_chequeLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$categoria_chequesAux=array();
		
		foreach($this->categoria_cheques as $categoria_cheque) {
			if($categoria_cheque->getIsDeleted()==false) {
				$categoria_chequesAux[]=$categoria_cheque;
			}
		}
		
		$this->categoria_cheques=$categoria_chequesAux;
	}
	
	public function updateToGetsAuxiliar(array &$categoria_cheques) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->categoria_cheques as $categoria_cheque) {
				
				$categoria_cheque->setid_empresa_Descripcion(categoria_cheque_util::getempresaDescripcion($categoria_cheque->getempresa()));
				$categoria_cheque->setid_cuenta_Descripcion(categoria_cheque_util::getcuentaDescripcion($categoria_cheque->getcuenta()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$categoria_cheque_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$categoria_cheque_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$categoria_cheque_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$categoria_cheque_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$categoria_cheque_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$categoria_chequeForeignKey=new categoria_cheque_param_return();//categoria_chequeForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$categoria_chequeForeignKey,$categoria_cheque_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta',$strRecargarFkTipos,',')) {
				$this->cargarComboscuentasFK($this->connexion,$strRecargarFkQuery,$categoria_chequeForeignKey,$categoria_cheque_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$categoria_chequeForeignKey,$categoria_cheque_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuentasFK($this->connexion,' where id=-1 ',$categoria_chequeForeignKey,$categoria_cheque_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $categoria_chequeForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$categoria_chequeForeignKey,$categoria_cheque_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$categoria_chequeForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($categoria_cheque_session==null) {
			$categoria_cheque_session=new categoria_cheque_session();
		}
		
		if($categoria_cheque_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($categoria_chequeForeignKey->idempresaDefaultFK==0) {
					$categoria_chequeForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$categoria_chequeForeignKey->empresasFK[$empresaLocal->getId()]=categoria_cheque_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($categoria_cheque_session->bigidempresaActual!=null && $categoria_cheque_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($categoria_cheque_session->bigidempresaActual);//WithConnection

				$categoria_chequeForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=categoria_cheque_util::getempresaDescripcion($empresaLogic->getempresa());
				$categoria_chequeForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarComboscuentasFK($connexion=null,$strRecargarFkQuery='',$categoria_chequeForeignKey,$categoria_cheque_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$categoria_chequeForeignKey->cuentasFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($categoria_cheque_session==null) {
			$categoria_cheque_session=new categoria_cheque_session();
		}
		
		if($categoria_cheque_session->bitBusquedaDesdeFKSesioncuenta!=true) {
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
				if($categoria_chequeForeignKey->idcuentaDefaultFK==0) {
					$categoria_chequeForeignKey->idcuentaDefaultFK=$cuentaLocal->getId();
				}

				$categoria_chequeForeignKey->cuentasFK[$cuentaLocal->getId()]=categoria_cheque_util::getcuentaDescripcion($cuentaLocal);
			}

		} else {

			if($categoria_cheque_session->bigidcuentaActual!=null && $categoria_cheque_session->bigidcuentaActual > 0) {
				$cuentaLogic->getEntity($categoria_cheque_session->bigidcuentaActual);//WithConnection

				$categoria_chequeForeignKey->cuentasFK[$cuentaLogic->getcuenta()->getId()]=categoria_cheque_util::getcuentaDescripcion($cuentaLogic->getcuenta());
				$categoria_chequeForeignKey->idcuentaDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($categoria_cheque,$chequecuentacorrientes,$clasificacioncheques) {
		$this->saveRelacionesBase($categoria_cheque,$chequecuentacorrientes,$clasificacioncheques,true);
	}

	public function saveRelaciones($categoria_cheque,$chequecuentacorrientes,$clasificacioncheques) {
		$this->saveRelacionesBase($categoria_cheque,$chequecuentacorrientes,$clasificacioncheques,false);
	}

	public function saveRelacionesBase($categoria_cheque,$chequecuentacorrientes=array(),$clasificacioncheques=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$categoria_cheque->setcheque_cuenta_corrientes($chequecuentacorrientes);
			$categoria_cheque->setclasificacion_cheques($clasificacioncheques);
			$this->setcategoria_cheque($categoria_cheque);

			if(true) {

				//categoria_cheque_logic_add::updateRelacionesToSave($categoria_cheque,$this);

				if(($this->categoria_cheque->getIsNew() || $this->categoria_cheque->getIsChanged()) && !$this->categoria_cheque->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($chequecuentacorrientes,$clasificacioncheques);

				} else if($this->categoria_cheque->getIsDeleted()) {
					$this->saveRelacionesDetalles($chequecuentacorrientes,$clasificacioncheques);
					$this->save();
				}

				//categoria_cheque_logic_add::updateRelacionesToSaveAfter($categoria_cheque,$this);

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
	
	
	public function saveRelacionesDetalles($chequecuentacorrientes=array(),$clasificacioncheques=array()) {
		try {
	

			$idcategoria_chequeActual=$this->getcategoria_cheque()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/util/cheque_cuenta_corriente_carga.php');
			cheque_cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$chequecuentacorrienteLogic_Desde_categoria_cheque=new cheque_cuenta_corriente_logic();
			$chequecuentacorrienteLogic_Desde_categoria_cheque->setcheque_cuenta_corrientes($chequecuentacorrientes);

			$chequecuentacorrienteLogic_Desde_categoria_cheque->setConnexion($this->getConnexion());
			$chequecuentacorrienteLogic_Desde_categoria_cheque->setDatosCliente($this->datosCliente);

			foreach($chequecuentacorrienteLogic_Desde_categoria_cheque->getcheque_cuenta_corrientes() as $chequecuentacorriente_Desde_categoria_cheque) {
				$chequecuentacorriente_Desde_categoria_cheque->setid_categoria_cheque($idcategoria_chequeActual);
			}

			$chequecuentacorrienteLogic_Desde_categoria_cheque->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/util/clasificacion_cheque_carga.php');
			clasificacion_cheque_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$clasificacionchequeLogic_Desde_categoria_cheque=new clasificacion_cheque_logic();
			$clasificacionchequeLogic_Desde_categoria_cheque->setclasificacion_cheques($clasificacioncheques);

			$clasificacionchequeLogic_Desde_categoria_cheque->setConnexion($this->getConnexion());
			$clasificacionchequeLogic_Desde_categoria_cheque->setDatosCliente($this->datosCliente);

			foreach($clasificacionchequeLogic_Desde_categoria_cheque->getclasificacion_cheques() as $clasificacioncheque_Desde_categoria_cheque) {
				$clasificacioncheque_Desde_categoria_cheque->setid_categoria_cheque($idcategoria_chequeActual);
			}

			$clasificacionchequeLogic_Desde_categoria_cheque->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $categoria_cheques,categoria_cheque_param_return $categoria_chequeParameterGeneral) : categoria_cheque_param_return {
		$categoria_chequeReturnGeneral=new categoria_cheque_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $categoria_chequeReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $categoria_cheques,categoria_cheque_param_return $categoria_chequeParameterGeneral) : categoria_cheque_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$categoria_chequeReturnGeneral=new categoria_cheque_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $categoria_chequeReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $categoria_cheques,categoria_cheque $categoria_cheque,categoria_cheque_param_return $categoria_chequeParameterGeneral,bool $isEsNuevocategoria_cheque,array $clases) : categoria_cheque_param_return {
		 try {	
			$categoria_chequeReturnGeneral=new categoria_cheque_param_return();
	
			$categoria_chequeReturnGeneral->setcategoria_cheque($categoria_cheque);
			$categoria_chequeReturnGeneral->setcategoria_cheques($categoria_cheques);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$categoria_chequeReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $categoria_chequeReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $categoria_cheques,categoria_cheque $categoria_cheque,categoria_cheque_param_return $categoria_chequeParameterGeneral,bool $isEsNuevocategoria_cheque,array $clases) : categoria_cheque_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$categoria_chequeReturnGeneral=new categoria_cheque_param_return();
	
			$categoria_chequeReturnGeneral->setcategoria_cheque($categoria_cheque);
			$categoria_chequeReturnGeneral->setcategoria_cheques($categoria_cheques);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$categoria_chequeReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $categoria_chequeReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $categoria_cheques,categoria_cheque $categoria_cheque,categoria_cheque_param_return $categoria_chequeParameterGeneral,bool $isEsNuevocategoria_cheque,array $clases) : categoria_cheque_param_return {
		 try {	
			$categoria_chequeReturnGeneral=new categoria_cheque_param_return();
	
			$categoria_chequeReturnGeneral->setcategoria_cheque($categoria_cheque);
			$categoria_chequeReturnGeneral->setcategoria_cheques($categoria_cheques);
			
			
			
			return $categoria_chequeReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $categoria_cheques,categoria_cheque $categoria_cheque,categoria_cheque_param_return $categoria_chequeParameterGeneral,bool $isEsNuevocategoria_cheque,array $clases) : categoria_cheque_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$categoria_chequeReturnGeneral=new categoria_cheque_param_return();
	
			$categoria_chequeReturnGeneral->setcategoria_cheque($categoria_cheque);
			$categoria_chequeReturnGeneral->setcategoria_cheques($categoria_cheques);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $categoria_chequeReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,categoria_cheque $categoria_cheque,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,categoria_cheque $categoria_cheque,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		categoria_cheque_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		categoria_cheque_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(categoria_cheque $categoria_cheque,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//categoria_cheque_logic_add::updatecategoria_chequeToGet($this->categoria_cheque);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$categoria_cheque->setempresa($this->categoria_chequeDataAccess->getempresa($this->connexion,$categoria_cheque));
		$categoria_cheque->setcuenta($this->categoria_chequeDataAccess->getcuenta($this->connexion,$categoria_cheque));
		$categoria_cheque->setcheque_cuenta_corrientes($this->categoria_chequeDataAccess->getcheque_cuenta_corrientes($this->connexion,$categoria_cheque));
		$categoria_cheque->setclasificacion_cheques($this->categoria_chequeDataAccess->getclasificacion_cheques($this->connexion,$categoria_cheque));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$categoria_cheque->setempresa($this->categoria_chequeDataAccess->getempresa($this->connexion,$categoria_cheque));
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				$categoria_cheque->setcuenta($this->categoria_chequeDataAccess->getcuenta($this->connexion,$categoria_cheque));
				continue;
			}

			if($clas->clas==cheque_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$categoria_cheque->setcheque_cuenta_corrientes($this->categoria_chequeDataAccess->getcheque_cuenta_corrientes($this->connexion,$categoria_cheque));

				if($this->isConDeep) {
					$chequecuentacorrienteLogic= new cheque_cuenta_corriente_logic($this->connexion);
					$chequecuentacorrienteLogic->setcheque_cuenta_corrientes($categoria_cheque->getcheque_cuenta_corrientes());
					$classesLocal=cheque_cuenta_corriente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$chequecuentacorrienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cheque_cuenta_corriente_util::refrescarFKDescripciones($chequecuentacorrienteLogic->getcheque_cuenta_corrientes());
					$categoria_cheque->setcheque_cuenta_corrientes($chequecuentacorrienteLogic->getcheque_cuenta_corrientes());
				}

				continue;
			}

			if($clas->clas==clasificacion_cheque::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$categoria_cheque->setclasificacion_cheques($this->categoria_chequeDataAccess->getclasificacion_cheques($this->connexion,$categoria_cheque));

				if($this->isConDeep) {
					$clasificacionchequeLogic= new clasificacion_cheque_logic($this->connexion);
					$clasificacionchequeLogic->setclasificacion_cheques($categoria_cheque->getclasificacion_cheques());
					$classesLocal=clasificacion_cheque_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$clasificacionchequeLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					clasificacion_cheque_util::refrescarFKDescripciones($clasificacionchequeLogic->getclasificacion_cheques());
					$categoria_cheque->setclasificacion_cheques($clasificacionchequeLogic->getclasificacion_cheques());
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
			$categoria_cheque->setempresa($this->categoria_chequeDataAccess->getempresa($this->connexion,$categoria_cheque));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$categoria_cheque->setcuenta($this->categoria_chequeDataAccess->getcuenta($this->connexion,$categoria_cheque));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cheque_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cheque_cuenta_corriente::$class);
			$categoria_cheque->setcheque_cuenta_corrientes($this->categoria_chequeDataAccess->getcheque_cuenta_corrientes($this->connexion,$categoria_cheque));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==clasificacion_cheque::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(clasificacion_cheque::$class);
			$categoria_cheque->setclasificacion_cheques($this->categoria_chequeDataAccess->getclasificacion_cheques($this->connexion,$categoria_cheque));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$categoria_cheque->setempresa($this->categoria_chequeDataAccess->getempresa($this->connexion,$categoria_cheque));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($categoria_cheque->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$categoria_cheque->setcuenta($this->categoria_chequeDataAccess->getcuenta($this->connexion,$categoria_cheque));
		$cuentaLogic= new cuenta_logic($this->connexion);
		$cuentaLogic->deepLoad($categoria_cheque->getcuenta(),$isDeep,$deepLoadType,$clases);
				

		$categoria_cheque->setcheque_cuenta_corrientes($this->categoria_chequeDataAccess->getcheque_cuenta_corrientes($this->connexion,$categoria_cheque));

		foreach($categoria_cheque->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
			$chequecuentacorrienteLogic= new cheque_cuenta_corriente_logic($this->connexion);
			$chequecuentacorrienteLogic->deepLoad($chequecuentacorriente,$isDeep,$deepLoadType,$clases);
		}

		$categoria_cheque->setclasificacion_cheques($this->categoria_chequeDataAccess->getclasificacion_cheques($this->connexion,$categoria_cheque));

		foreach($categoria_cheque->getclasificacion_cheques() as $clasificacioncheque) {
			$clasificacionchequeLogic= new clasificacion_cheque_logic($this->connexion);
			$clasificacionchequeLogic->deepLoad($clasificacioncheque,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$categoria_cheque->setempresa($this->categoria_chequeDataAccess->getempresa($this->connexion,$categoria_cheque));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($categoria_cheque->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				$categoria_cheque->setcuenta($this->categoria_chequeDataAccess->getcuenta($this->connexion,$categoria_cheque));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($categoria_cheque->getcuenta(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cheque_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$categoria_cheque->setcheque_cuenta_corrientes($this->categoria_chequeDataAccess->getcheque_cuenta_corrientes($this->connexion,$categoria_cheque));

				foreach($categoria_cheque->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
					$chequecuentacorrienteLogic= new cheque_cuenta_corriente_logic($this->connexion);
					$chequecuentacorrienteLogic->deepLoad($chequecuentacorriente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==clasificacion_cheque::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$categoria_cheque->setclasificacion_cheques($this->categoria_chequeDataAccess->getclasificacion_cheques($this->connexion,$categoria_cheque));

				foreach($categoria_cheque->getclasificacion_cheques() as $clasificacioncheque) {
					$clasificacionchequeLogic= new clasificacion_cheque_logic($this->connexion);
					$clasificacionchequeLogic->deepLoad($clasificacioncheque,$isDeep,$deepLoadType,$clases);
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
			$categoria_cheque->setempresa($this->categoria_chequeDataAccess->getempresa($this->connexion,$categoria_cheque));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($categoria_cheque->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$categoria_cheque->setcuenta($this->categoria_chequeDataAccess->getcuenta($this->connexion,$categoria_cheque));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($categoria_cheque->getcuenta(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cheque_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cheque_cuenta_corriente::$class);
			$categoria_cheque->setcheque_cuenta_corrientes($this->categoria_chequeDataAccess->getcheque_cuenta_corrientes($this->connexion,$categoria_cheque));

			foreach($categoria_cheque->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
				$chequecuentacorrienteLogic= new cheque_cuenta_corriente_logic($this->connexion);
				$chequecuentacorrienteLogic->deepLoad($chequecuentacorriente,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==clasificacion_cheque::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(clasificacion_cheque::$class);
			$categoria_cheque->setclasificacion_cheques($this->categoria_chequeDataAccess->getclasificacion_cheques($this->connexion,$categoria_cheque));

			foreach($categoria_cheque->getclasificacion_cheques() as $clasificacioncheque) {
				$clasificacionchequeLogic= new clasificacion_cheque_logic($this->connexion);
				$clasificacionchequeLogic->deepLoad($clasificacioncheque,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(categoria_cheque $categoria_cheque,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//categoria_cheque_logic_add::updatecategoria_chequeToSave($this->categoria_cheque);			
			
			if(!$paraDeleteCascade) {				
				categoria_cheque_data::save($categoria_cheque, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($categoria_cheque->getempresa(),$this->connexion);
		cuenta_data::save($categoria_cheque->getcuenta(),$this->connexion);

		foreach($categoria_cheque->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
			$chequecuentacorriente->setid_categoria_cheque($categoria_cheque->getId());
			cheque_cuenta_corriente_data::save($chequecuentacorriente,$this->connexion);
		}


		foreach($categoria_cheque->getclasificacion_cheques() as $clasificacioncheque) {
			$clasificacioncheque->setid_categoria_cheque($categoria_cheque->getId());
			clasificacion_cheque_data::save($clasificacioncheque,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($categoria_cheque->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				cuenta_data::save($categoria_cheque->getcuenta(),$this->connexion);
				continue;
			}


			if($clas->clas==cheque_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($categoria_cheque->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
					$chequecuentacorriente->setid_categoria_cheque($categoria_cheque->getId());
					cheque_cuenta_corriente_data::save($chequecuentacorriente,$this->connexion);
				}

				continue;
			}

			if($clas->clas==clasificacion_cheque::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($categoria_cheque->getclasificacion_cheques() as $clasificacioncheque) {
					$clasificacioncheque->setid_categoria_cheque($categoria_cheque->getId());
					clasificacion_cheque_data::save($clasificacioncheque,$this->connexion);
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
			empresa_data::save($categoria_cheque->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($categoria_cheque->getcuenta(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cheque_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cheque_cuenta_corriente::$class);

			foreach($categoria_cheque->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
				$chequecuentacorriente->setid_categoria_cheque($categoria_cheque->getId());
				cheque_cuenta_corriente_data::save($chequecuentacorriente,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==clasificacion_cheque::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(clasificacion_cheque::$class);

			foreach($categoria_cheque->getclasificacion_cheques() as $clasificacioncheque) {
				$clasificacioncheque->setid_categoria_cheque($categoria_cheque->getId());
				clasificacion_cheque_data::save($clasificacioncheque,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($categoria_cheque->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($categoria_cheque->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($categoria_cheque->getcuenta(),$this->connexion);
		$cuentaLogic= new cuenta_logic($this->connexion);
		$cuentaLogic->deepSave($categoria_cheque->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($categoria_cheque->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
			$chequecuentacorrienteLogic= new cheque_cuenta_corriente_logic($this->connexion);
			$chequecuentacorriente->setid_categoria_cheque($categoria_cheque->getId());
			cheque_cuenta_corriente_data::save($chequecuentacorriente,$this->connexion);
			$chequecuentacorrienteLogic->deepSave($chequecuentacorriente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($categoria_cheque->getclasificacion_cheques() as $clasificacioncheque) {
			$clasificacionchequeLogic= new clasificacion_cheque_logic($this->connexion);
			$clasificacioncheque->setid_categoria_cheque($categoria_cheque->getId());
			clasificacion_cheque_data::save($clasificacioncheque,$this->connexion);
			$clasificacionchequeLogic->deepSave($clasificacioncheque,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($categoria_cheque->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($categoria_cheque->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				cuenta_data::save($categoria_cheque->getcuenta(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($categoria_cheque->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==cheque_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($categoria_cheque->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
					$chequecuentacorrienteLogic= new cheque_cuenta_corriente_logic($this->connexion);
					$chequecuentacorriente->setid_categoria_cheque($categoria_cheque->getId());
					cheque_cuenta_corriente_data::save($chequecuentacorriente,$this->connexion);
					$chequecuentacorrienteLogic->deepSave($chequecuentacorriente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==clasificacion_cheque::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($categoria_cheque->getclasificacion_cheques() as $clasificacioncheque) {
					$clasificacionchequeLogic= new clasificacion_cheque_logic($this->connexion);
					$clasificacioncheque->setid_categoria_cheque($categoria_cheque->getId());
					clasificacion_cheque_data::save($clasificacioncheque,$this->connexion);
					$clasificacionchequeLogic->deepSave($clasificacioncheque,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($categoria_cheque->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($categoria_cheque->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($categoria_cheque->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($categoria_cheque->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cheque_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cheque_cuenta_corriente::$class);

			foreach($categoria_cheque->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
				$chequecuentacorrienteLogic= new cheque_cuenta_corriente_logic($this->connexion);
				$chequecuentacorriente->setid_categoria_cheque($categoria_cheque->getId());
				cheque_cuenta_corriente_data::save($chequecuentacorriente,$this->connexion);
				$chequecuentacorrienteLogic->deepSave($chequecuentacorriente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==clasificacion_cheque::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(clasificacion_cheque::$class);

			foreach($categoria_cheque->getclasificacion_cheques() as $clasificacioncheque) {
				$clasificacionchequeLogic= new clasificacion_cheque_logic($this->connexion);
				$clasificacioncheque->setid_categoria_cheque($categoria_cheque->getId());
				clasificacion_cheque_data::save($clasificacioncheque,$this->connexion);
				$clasificacionchequeLogic->deepSave($clasificacioncheque,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				categoria_cheque_data::save($categoria_cheque, $this->connexion);
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
			
			$this->deepLoad($this->categoria_cheque,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->categoria_cheques as $categoria_cheque) {
				$this->deepLoad($categoria_cheque,$isDeep,$deepLoadType,$clases);
								
				categoria_cheque_util::refrescarFKDescripciones($this->categoria_cheques);
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
			
			foreach($this->categoria_cheques as $categoria_cheque) {
				$this->deepLoad($categoria_cheque,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->categoria_cheque,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->categoria_cheques as $categoria_cheque) {
				$this->deepSave($categoria_cheque,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->categoria_cheques as $categoria_cheque) {
				$this->deepSave($categoria_cheque,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(cuenta::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta::$class) {
						$classes[]=new Classe(cuenta::$class);
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
					if($clas->clas==cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta::$class);
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
				
				$classes[]=new Classe(cheque_cuenta_corriente::$class);
				$classes[]=new Classe(clasificacion_cheque::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==cheque_cuenta_corriente::$class) {
						$classes[]=new Classe(cheque_cuenta_corriente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==clasificacion_cheque::$class) {
						$classes[]=new Classe(clasificacion_cheque::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==cheque_cuenta_corriente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cheque_cuenta_corriente::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==clasificacion_cheque::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(clasificacion_cheque::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getcategoria_cheque() : ?categoria_cheque {	
		/*
		categoria_cheque_logic_add::checkcategoria_chequeToGet($this->categoria_cheque,$this->datosCliente);
		categoria_cheque_logic_add::updatecategoria_chequeToGet($this->categoria_cheque);
		*/
			
		return $this->categoria_cheque;
	}
		
	public function setcategoria_cheque(categoria_cheque $newcategoria_cheque) {
		$this->categoria_cheque = $newcategoria_cheque;
	}
	
	public function getcategoria_cheques() : array {		
		/*
		categoria_cheque_logic_add::checkcategoria_chequeToGets($this->categoria_cheques,$this->datosCliente);
		
		foreach ($this->categoria_cheques as $categoria_chequeLocal ) {
			categoria_cheque_logic_add::updatecategoria_chequeToGet($categoria_chequeLocal);
		}
		*/
		
		return $this->categoria_cheques;
	}
	
	public function setcategoria_cheques(array $newcategoria_cheques) {
		$this->categoria_cheques = $newcategoria_cheques;
	}
	
	public function getcategoria_chequeDataAccess() : categoria_cheque_data {
		return $this->categoria_chequeDataAccess;
	}
	
	public function setcategoria_chequeDataAccess(categoria_cheque_data $newcategoria_chequeDataAccess) {
		$this->categoria_chequeDataAccess = $newcategoria_chequeDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        categoria_cheque_carga::$CONTROLLER;;        
		
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
