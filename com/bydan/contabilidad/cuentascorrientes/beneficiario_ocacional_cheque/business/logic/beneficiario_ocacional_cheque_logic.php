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

namespace com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\util\beneficiario_ocacional_cheque_carga;
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\util\beneficiario_ocacional_cheque_param_return;


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

use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\util\beneficiario_ocacional_cheque_util;
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\business\entity\beneficiario_ocacional_cheque;
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\business\data\beneficiario_ocacional_cheque_data;

//FK


//REL


use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\entity\cheque_cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\data\cheque_cuenta_corriente_data;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\logic\cheque_cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_util;

//REL DETALLES




class beneficiario_ocacional_cheque_logic  extends GeneralEntityLogic implements beneficiario_ocacional_cheque_logicI {	
	/*GENERAL*/
	public beneficiario_ocacional_cheque_data $beneficiario_ocacional_chequeDataAccess;
	//public ?beneficiario_ocacional_cheque_logic_add $beneficiario_ocacional_chequeLogicAdditional=null;
	public ?beneficiario_ocacional_cheque $beneficiario_ocacional_cheque;
	public array $beneficiario_ocacional_cheques;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->beneficiario_ocacional_chequeDataAccess = new beneficiario_ocacional_cheque_data();			
			$this->beneficiario_ocacional_cheques = array();
			$this->beneficiario_ocacional_cheque = new beneficiario_ocacional_cheque();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->beneficiario_ocacional_chequeLogicAdditional = new beneficiario_ocacional_cheque_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->beneficiario_ocacional_chequeLogicAdditional==null) {
		//	$this->beneficiario_ocacional_chequeLogicAdditional=new beneficiario_ocacional_cheque_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->beneficiario_ocacional_chequeDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->beneficiario_ocacional_chequeDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->beneficiario_ocacional_chequeDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->beneficiario_ocacional_chequeDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->beneficiario_ocacional_cheques = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->beneficiario_ocacional_cheques=$this->beneficiario_ocacional_chequeDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				beneficiario_ocacional_cheque_util::refrescarFKDescripciones($this->beneficiario_ocacional_cheques);
			}
			
			//beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToGets($this->beneficiario_ocacional_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->beneficiario_ocacional_cheques);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->beneficiario_ocacional_cheques = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->beneficiario_ocacional_cheques=$this->beneficiario_ocacional_chequeDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				beneficiario_ocacional_cheque_util::refrescarFKDescripciones($this->beneficiario_ocacional_cheques);
			}
			
			//beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToGets($this->beneficiario_ocacional_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->beneficiario_ocacional_cheques);
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
		$this->beneficiario_ocacional_cheque = new beneficiario_ocacional_cheque();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->beneficiario_ocacional_cheque=$this->beneficiario_ocacional_chequeDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->beneficiario_ocacional_cheque,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				beneficiario_ocacional_cheque_util::refrescarFKDescripcion($this->beneficiario_ocacional_cheque);
			}
						
			//beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToGet($this->beneficiario_ocacional_cheque,$this->datosCliente);
			//beneficiario_ocacional_cheque_logic_add::updatebeneficiario_ocacional_chequeToGet($this->beneficiario_ocacional_cheque);
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
		$this->beneficiario_ocacional_cheque = new  beneficiario_ocacional_cheque();
		  		  
        try {		
			$this->beneficiario_ocacional_cheque=$this->beneficiario_ocacional_chequeDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->beneficiario_ocacional_cheque,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				beneficiario_ocacional_cheque_util::refrescarFKDescripcion($this->beneficiario_ocacional_cheque);
			}
			
			//beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToGet($this->beneficiario_ocacional_cheque,$this->datosCliente);
			//beneficiario_ocacional_cheque_logic_add::updatebeneficiario_ocacional_chequeToGet($this->beneficiario_ocacional_cheque);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?beneficiario_ocacional_cheque {
		$beneficiario_ocacional_chequeLogic = new  beneficiario_ocacional_cheque_logic();
		  		  
        try {		
			$beneficiario_ocacional_chequeLogic->setConnexion($connexion);			
			$beneficiario_ocacional_chequeLogic->getEntity($id);			
			return $beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->beneficiario_ocacional_cheque = new  beneficiario_ocacional_cheque();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->beneficiario_ocacional_cheque=$this->beneficiario_ocacional_chequeDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->beneficiario_ocacional_cheque,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				beneficiario_ocacional_cheque_util::refrescarFKDescripcion($this->beneficiario_ocacional_cheque);
			}
			
			//beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToGet($this->beneficiario_ocacional_cheque,$this->datosCliente);
			//beneficiario_ocacional_cheque_logic_add::updatebeneficiario_ocacional_chequeToGet($this->beneficiario_ocacional_cheque);
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
		$this->beneficiario_ocacional_cheque = new  beneficiario_ocacional_cheque();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->beneficiario_ocacional_cheque=$this->beneficiario_ocacional_chequeDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->beneficiario_ocacional_cheque,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				beneficiario_ocacional_cheque_util::refrescarFKDescripcion($this->beneficiario_ocacional_cheque);
			}
			
			//beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToGet($this->beneficiario_ocacional_cheque,$this->datosCliente);
			//beneficiario_ocacional_cheque_logic_add::updatebeneficiario_ocacional_chequeToGet($this->beneficiario_ocacional_cheque);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?beneficiario_ocacional_cheque {
		$beneficiario_ocacional_chequeLogic = new  beneficiario_ocacional_cheque_logic();
		  		  
        try {		
			$beneficiario_ocacional_chequeLogic->setConnexion($connexion);			
			$beneficiario_ocacional_chequeLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->beneficiario_ocacional_cheques = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->beneficiario_ocacional_cheques=$this->beneficiario_ocacional_chequeDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				beneficiario_ocacional_cheque_util::refrescarFKDescripciones($this->beneficiario_ocacional_cheques);
			}
			
			//beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToGets($this->beneficiario_ocacional_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->beneficiario_ocacional_cheques);			
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
		$this->beneficiario_ocacional_cheques = array();
		  		  
        try {			
			$this->beneficiario_ocacional_cheques=$this->beneficiario_ocacional_chequeDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				beneficiario_ocacional_cheque_util::refrescarFKDescripciones($this->beneficiario_ocacional_cheques);
			}
			
			//beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToGets($this->beneficiario_ocacional_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->beneficiario_ocacional_cheques);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->beneficiario_ocacional_cheques = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->beneficiario_ocacional_cheques=$this->beneficiario_ocacional_chequeDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				beneficiario_ocacional_cheque_util::refrescarFKDescripciones($this->beneficiario_ocacional_cheques);
			}
			
			//beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToGets($this->beneficiario_ocacional_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->beneficiario_ocacional_cheques);
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
		$this->beneficiario_ocacional_cheques = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->beneficiario_ocacional_cheques=$this->beneficiario_ocacional_chequeDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				beneficiario_ocacional_cheque_util::refrescarFKDescripciones($this->beneficiario_ocacional_cheques);
			}
			
			//beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToGets($this->beneficiario_ocacional_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->beneficiario_ocacional_cheques);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$beneficiario_ocacional_chequeLogic = new  beneficiario_ocacional_cheque_logic();
		  		  
        try {		
			$beneficiario_ocacional_chequeLogic->setConnexion($connexion);			
			$beneficiario_ocacional_chequeLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->beneficiario_ocacional_cheques = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->beneficiario_ocacional_cheques=$this->beneficiario_ocacional_chequeDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				beneficiario_ocacional_cheque_util::refrescarFKDescripciones($this->beneficiario_ocacional_cheques);
			}
			
			//beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToGets($this->beneficiario_ocacional_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->beneficiario_ocacional_cheques);
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
		$this->beneficiario_ocacional_cheques = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->beneficiario_ocacional_cheques=$this->beneficiario_ocacional_chequeDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				beneficiario_ocacional_cheque_util::refrescarFKDescripciones($this->beneficiario_ocacional_cheques);
			}
			
			//beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToGets($this->beneficiario_ocacional_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->beneficiario_ocacional_cheques);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->beneficiario_ocacional_cheques = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->beneficiario_ocacional_cheques=$this->beneficiario_ocacional_chequeDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				beneficiario_ocacional_cheque_util::refrescarFKDescripciones($this->beneficiario_ocacional_cheques);
			}
			
			//beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToGets($this->beneficiario_ocacional_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->beneficiario_ocacional_cheques);
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
		$this->beneficiario_ocacional_cheques = array();
		  		  
        try {			
			$this->beneficiario_ocacional_cheques=$this->beneficiario_ocacional_chequeDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				beneficiario_ocacional_cheque_util::refrescarFKDescripciones($this->beneficiario_ocacional_cheques);
			}	
			
			//beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToGets($this->beneficiario_ocacional_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->beneficiario_ocacional_cheques);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->beneficiario_ocacional_cheques = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->beneficiario_ocacional_cheques=$this->beneficiario_ocacional_chequeDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				beneficiario_ocacional_cheque_util::refrescarFKDescripciones($this->beneficiario_ocacional_cheques);
			}
			
			//beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToGets($this->beneficiario_ocacional_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->beneficiario_ocacional_cheques);
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
		$this->beneficiario_ocacional_cheques = array();
		  		  
        try {		
			$this->beneficiario_ocacional_cheques=$this->beneficiario_ocacional_chequeDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				beneficiario_ocacional_cheque_util::refrescarFKDescripciones($this->beneficiario_ocacional_cheques);
			}
			
			//beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToGets($this->beneficiario_ocacional_cheques,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->beneficiario_ocacional_cheques);

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
						
			//beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToSave($this->beneficiario_ocacional_cheque,$this->datosCliente,$this->connexion);	       
			//beneficiario_ocacional_cheque_logic_add::updatebeneficiario_ocacional_chequeToSave($this->beneficiario_ocacional_cheque);			
			beneficiario_ocacional_cheque_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->beneficiario_ocacional_cheque,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->beneficiario_ocacional_chequeLogicAdditional->checkGeneralEntityToSave($this,$this->beneficiario_ocacional_cheque,$this->datosCliente,$this->connexion);
			
			
			beneficiario_ocacional_cheque_data::save($this->beneficiario_ocacional_cheque, $this->connexion);	    	       	 				
			//beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToSaveAfter($this->beneficiario_ocacional_cheque,$this->datosCliente,$this->connexion);			
			//$this->beneficiario_ocacional_chequeLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->beneficiario_ocacional_cheque,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->beneficiario_ocacional_cheque,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->beneficiario_ocacional_cheque,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				beneficiario_ocacional_cheque_util::refrescarFKDescripcion($this->beneficiario_ocacional_cheque);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->beneficiario_ocacional_cheque->getIsDeleted()) {
				$this->beneficiario_ocacional_cheque=null;
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
						
			/*beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToSave($this->beneficiario_ocacional_cheque,$this->datosCliente,$this->connexion);*/	        
			//beneficiario_ocacional_cheque_logic_add::updatebeneficiario_ocacional_chequeToSave($this->beneficiario_ocacional_cheque);			
			//$this->beneficiario_ocacional_chequeLogicAdditional->checkGeneralEntityToSave($this,$this->beneficiario_ocacional_cheque,$this->datosCliente,$this->connexion);			
			beneficiario_ocacional_cheque_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->beneficiario_ocacional_cheque,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			beneficiario_ocacional_cheque_data::save($this->beneficiario_ocacional_cheque, $this->connexion);	    	       	 						
			/*beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToSaveAfter($this->beneficiario_ocacional_cheque,$this->datosCliente,$this->connexion);*/			
			//$this->beneficiario_ocacional_chequeLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->beneficiario_ocacional_cheque,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->beneficiario_ocacional_cheque,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->beneficiario_ocacional_cheque,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				beneficiario_ocacional_cheque_util::refrescarFKDescripcion($this->beneficiario_ocacional_cheque);				
			}
			
			if($this->beneficiario_ocacional_cheque->getIsDeleted()) {
				$this->beneficiario_ocacional_cheque=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,Connexion $connexion)  {
		$beneficiario_ocacional_chequeLogic = new  beneficiario_ocacional_cheque_logic();		  		  
        try {		
			$beneficiario_ocacional_chequeLogic->setConnexion($connexion);			
			$beneficiario_ocacional_chequeLogic->setbeneficiario_ocacional_cheque($beneficiario_ocacional_cheque);			
			$beneficiario_ocacional_chequeLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToSaves($this->beneficiario_ocacional_cheques,$this->datosCliente,$this->connexion);*/	        	
			//$this->beneficiario_ocacional_chequeLogicAdditional->checkGeneralEntitiesToSaves($this,$this->beneficiario_ocacional_cheques,$this->datosCliente,$this->connexion);
			
	   		foreach($this->beneficiario_ocacional_cheques as $beneficiario_ocacional_chequeLocal) {				
								
				//beneficiario_ocacional_cheque_logic_add::updatebeneficiario_ocacional_chequeToSave($beneficiario_ocacional_chequeLocal);	        	
				beneficiario_ocacional_cheque_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$beneficiario_ocacional_chequeLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				beneficiario_ocacional_cheque_data::save($beneficiario_ocacional_chequeLocal, $this->connexion);				
			}
			
			/*beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToSavesAfter($this->beneficiario_ocacional_cheques,$this->datosCliente,$this->connexion);*/			
			//$this->beneficiario_ocacional_chequeLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->beneficiario_ocacional_cheques,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				beneficiario_ocacional_cheque_util::refrescarFKDescripciones($this->beneficiario_ocacional_cheques);
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
			/*beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToSaves($this->beneficiario_ocacional_cheques,$this->datosCliente,$this->connexion);*/			
			//$this->beneficiario_ocacional_chequeLogicAdditional->checkGeneralEntitiesToSaves($this,$this->beneficiario_ocacional_cheques,$this->datosCliente,$this->connexion);
			
	   		foreach($this->beneficiario_ocacional_cheques as $beneficiario_ocacional_chequeLocal) {				
								
				//beneficiario_ocacional_cheque_logic_add::updatebeneficiario_ocacional_chequeToSave($beneficiario_ocacional_chequeLocal);	        	
				beneficiario_ocacional_cheque_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$beneficiario_ocacional_chequeLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				beneficiario_ocacional_cheque_data::save($beneficiario_ocacional_chequeLocal, $this->connexion);				
			}			
			
			/*beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToSavesAfter($this->beneficiario_ocacional_cheques,$this->datosCliente,$this->connexion);*/			
			//$this->beneficiario_ocacional_chequeLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->beneficiario_ocacional_cheques,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				beneficiario_ocacional_cheque_util::refrescarFKDescripciones($this->beneficiario_ocacional_cheques);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $beneficiario_ocacional_cheques,Connexion $connexion)  {
		$beneficiario_ocacional_chequeLogic = new  beneficiario_ocacional_cheque_logic();
		  		  
        try {		
			$beneficiario_ocacional_chequeLogic->setConnexion($connexion);			
			$beneficiario_ocacional_chequeLogic->setbeneficiario_ocacional_cheques($beneficiario_ocacional_cheques);			
			$beneficiario_ocacional_chequeLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$beneficiario_ocacional_chequesAux=array();
		
		foreach($this->beneficiario_ocacional_cheques as $beneficiario_ocacional_cheque) {
			if($beneficiario_ocacional_cheque->getIsDeleted()==false) {
				$beneficiario_ocacional_chequesAux[]=$beneficiario_ocacional_cheque;
			}
		}
		
		$this->beneficiario_ocacional_cheques=$beneficiario_ocacional_chequesAux;
	}
	
	public function updateToGetsAuxiliar(array &$beneficiario_ocacional_cheques) {
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
	
	
	
	public function saveRelacionesWithConnection($beneficiario_ocacional_cheque,$chequecuentacorrientes) {
		$this->saveRelacionesBase($beneficiario_ocacional_cheque,$chequecuentacorrientes,true);
	}

	public function saveRelaciones($beneficiario_ocacional_cheque,$chequecuentacorrientes) {
		$this->saveRelacionesBase($beneficiario_ocacional_cheque,$chequecuentacorrientes,false);
	}

	public function saveRelacionesBase($beneficiario_ocacional_cheque,$chequecuentacorrientes=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$beneficiario_ocacional_cheque->setcheque_cuenta_corrientes($chequecuentacorrientes);
			$this->setbeneficiario_ocacional_cheque($beneficiario_ocacional_cheque);

			if(true) {

				//beneficiario_ocacional_cheque_logic_add::updateRelacionesToSave($beneficiario_ocacional_cheque,$this);

				if(($this->beneficiario_ocacional_cheque->getIsNew() || $this->beneficiario_ocacional_cheque->getIsChanged()) && !$this->beneficiario_ocacional_cheque->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($chequecuentacorrientes);

				} else if($this->beneficiario_ocacional_cheque->getIsDeleted()) {
					$this->saveRelacionesDetalles($chequecuentacorrientes);
					$this->save();
				}

				//beneficiario_ocacional_cheque_logic_add::updateRelacionesToSaveAfter($beneficiario_ocacional_cheque,$this);

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
	
	
	public function saveRelacionesDetalles($chequecuentacorrientes=array()) {
		try {
	

			$idbeneficiario_ocacional_chequeActual=$this->getbeneficiario_ocacional_cheque()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/util/cheque_cuenta_corriente_carga.php');
			cheque_cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$chequecuentacorrienteLogic_Desde_beneficiario_ocacional_cheque=new cheque_cuenta_corriente_logic();
			$chequecuentacorrienteLogic_Desde_beneficiario_ocacional_cheque->setcheque_cuenta_corrientes($chequecuentacorrientes);

			$chequecuentacorrienteLogic_Desde_beneficiario_ocacional_cheque->setConnexion($this->getConnexion());
			$chequecuentacorrienteLogic_Desde_beneficiario_ocacional_cheque->setDatosCliente($this->datosCliente);

			foreach($chequecuentacorrienteLogic_Desde_beneficiario_ocacional_cheque->getcheque_cuenta_corrientes() as $chequecuentacorriente_Desde_beneficiario_ocacional_cheque) {
				$chequecuentacorriente_Desde_beneficiario_ocacional_cheque->setid_beneficiario_ocacional_cheque($idbeneficiario_ocacional_chequeActual);
			}

			$chequecuentacorrienteLogic_Desde_beneficiario_ocacional_cheque->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $beneficiario_ocacional_cheques,beneficiario_ocacional_cheque_param_return $beneficiario_ocacional_chequeParameterGeneral) : beneficiario_ocacional_cheque_param_return {
		$beneficiario_ocacional_chequeReturnGeneral=new beneficiario_ocacional_cheque_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $beneficiario_ocacional_chequeReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $beneficiario_ocacional_cheques,beneficiario_ocacional_cheque_param_return $beneficiario_ocacional_chequeParameterGeneral) : beneficiario_ocacional_cheque_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$beneficiario_ocacional_chequeReturnGeneral=new beneficiario_ocacional_cheque_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $beneficiario_ocacional_chequeReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $beneficiario_ocacional_cheques,beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,beneficiario_ocacional_cheque_param_return $beneficiario_ocacional_chequeParameterGeneral,bool $isEsNuevobeneficiario_ocacional_cheque,array $clases) : beneficiario_ocacional_cheque_param_return {
		 try {	
			$beneficiario_ocacional_chequeReturnGeneral=new beneficiario_ocacional_cheque_param_return();
	
			$beneficiario_ocacional_chequeReturnGeneral->setbeneficiario_ocacional_cheque($beneficiario_ocacional_cheque);
			$beneficiario_ocacional_chequeReturnGeneral->setbeneficiario_ocacional_cheques($beneficiario_ocacional_cheques);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$beneficiario_ocacional_chequeReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $beneficiario_ocacional_chequeReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $beneficiario_ocacional_cheques,beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,beneficiario_ocacional_cheque_param_return $beneficiario_ocacional_chequeParameterGeneral,bool $isEsNuevobeneficiario_ocacional_cheque,array $clases) : beneficiario_ocacional_cheque_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$beneficiario_ocacional_chequeReturnGeneral=new beneficiario_ocacional_cheque_param_return();
	
			$beneficiario_ocacional_chequeReturnGeneral->setbeneficiario_ocacional_cheque($beneficiario_ocacional_cheque);
			$beneficiario_ocacional_chequeReturnGeneral->setbeneficiario_ocacional_cheques($beneficiario_ocacional_cheques);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$beneficiario_ocacional_chequeReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $beneficiario_ocacional_chequeReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $beneficiario_ocacional_cheques,beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,beneficiario_ocacional_cheque_param_return $beneficiario_ocacional_chequeParameterGeneral,bool $isEsNuevobeneficiario_ocacional_cheque,array $clases) : beneficiario_ocacional_cheque_param_return {
		 try {	
			$beneficiario_ocacional_chequeReturnGeneral=new beneficiario_ocacional_cheque_param_return();
	
			$beneficiario_ocacional_chequeReturnGeneral->setbeneficiario_ocacional_cheque($beneficiario_ocacional_cheque);
			$beneficiario_ocacional_chequeReturnGeneral->setbeneficiario_ocacional_cheques($beneficiario_ocacional_cheques);
			
			
			
			return $beneficiario_ocacional_chequeReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $beneficiario_ocacional_cheques,beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,beneficiario_ocacional_cheque_param_return $beneficiario_ocacional_chequeParameterGeneral,bool $isEsNuevobeneficiario_ocacional_cheque,array $clases) : beneficiario_ocacional_cheque_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$beneficiario_ocacional_chequeReturnGeneral=new beneficiario_ocacional_cheque_param_return();
	
			$beneficiario_ocacional_chequeReturnGeneral->setbeneficiario_ocacional_cheque($beneficiario_ocacional_cheque);
			$beneficiario_ocacional_chequeReturnGeneral->setbeneficiario_ocacional_cheques($beneficiario_ocacional_cheques);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $beneficiario_ocacional_chequeReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		beneficiario_ocacional_cheque_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//beneficiario_ocacional_cheque_logic_add::updatebeneficiario_ocacional_chequeToGet($this->beneficiario_ocacional_cheque);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$beneficiario_ocacional_cheque->setcheque_cuenta_corrientes($this->beneficiario_ocacional_chequeDataAccess->getcheque_cuenta_corrientes($this->connexion,$beneficiario_ocacional_cheque));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cheque_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$beneficiario_ocacional_cheque->setcheque_cuenta_corrientes($this->beneficiario_ocacional_chequeDataAccess->getcheque_cuenta_corrientes($this->connexion,$beneficiario_ocacional_cheque));

				if($this->isConDeep) {
					$chequecuentacorrienteLogic= new cheque_cuenta_corriente_logic($this->connexion);
					$chequecuentacorrienteLogic->setcheque_cuenta_corrientes($beneficiario_ocacional_cheque->getcheque_cuenta_corrientes());
					$classesLocal=cheque_cuenta_corriente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$chequecuentacorrienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cheque_cuenta_corriente_util::refrescarFKDescripciones($chequecuentacorrienteLogic->getcheque_cuenta_corrientes());
					$beneficiario_ocacional_cheque->setcheque_cuenta_corrientes($chequecuentacorrienteLogic->getcheque_cuenta_corrientes());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


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
			$beneficiario_ocacional_cheque->setcheque_cuenta_corrientes($this->beneficiario_ocacional_chequeDataAccess->getcheque_cuenta_corrientes($this->connexion,$beneficiario_ocacional_cheque));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {


		$beneficiario_ocacional_cheque->setcheque_cuenta_corrientes($this->beneficiario_ocacional_chequeDataAccess->getcheque_cuenta_corrientes($this->connexion,$beneficiario_ocacional_cheque));

		foreach($beneficiario_ocacional_cheque->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
			$chequecuentacorrienteLogic= new cheque_cuenta_corriente_logic($this->connexion);
			$chequecuentacorrienteLogic->deepLoad($chequecuentacorriente,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cheque_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$beneficiario_ocacional_cheque->setcheque_cuenta_corrientes($this->beneficiario_ocacional_chequeDataAccess->getcheque_cuenta_corrientes($this->connexion,$beneficiario_ocacional_cheque));

				foreach($beneficiario_ocacional_cheque->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
					$chequecuentacorrienteLogic= new cheque_cuenta_corriente_logic($this->connexion);
					$chequecuentacorrienteLogic->deepLoad($chequecuentacorriente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


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
			$beneficiario_ocacional_cheque->setcheque_cuenta_corrientes($this->beneficiario_ocacional_chequeDataAccess->getcheque_cuenta_corrientes($this->connexion,$beneficiario_ocacional_cheque));

			foreach($beneficiario_ocacional_cheque->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
				$chequecuentacorrienteLogic= new cheque_cuenta_corriente_logic($this->connexion);
				$chequecuentacorrienteLogic->deepLoad($chequecuentacorriente,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//beneficiario_ocacional_cheque_logic_add::updatebeneficiario_ocacional_chequeToSave($this->beneficiario_ocacional_cheque);			
			
			if(!$paraDeleteCascade) {				
				beneficiario_ocacional_cheque_data::save($beneficiario_ocacional_cheque, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($beneficiario_ocacional_cheque->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
			$chequecuentacorriente->setid_beneficiario_ocacional_cheque($beneficiario_ocacional_cheque->getId());
			cheque_cuenta_corriente_data::save($chequecuentacorriente,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==cheque_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($beneficiario_ocacional_cheque->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
					$chequecuentacorriente->setid_beneficiario_ocacional_cheque($beneficiario_ocacional_cheque->getId());
					cheque_cuenta_corriente_data::save($chequecuentacorriente,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


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

			foreach($beneficiario_ocacional_cheque->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
				$chequecuentacorriente->setid_beneficiario_ocacional_cheque($beneficiario_ocacional_cheque->getId());
				cheque_cuenta_corriente_data::save($chequecuentacorriente,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($beneficiario_ocacional_cheque->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
			$chequecuentacorrienteLogic= new cheque_cuenta_corriente_logic($this->connexion);
			$chequecuentacorriente->setid_beneficiario_ocacional_cheque($beneficiario_ocacional_cheque->getId());
			cheque_cuenta_corriente_data::save($chequecuentacorriente,$this->connexion);
			$chequecuentacorrienteLogic->deepSave($chequecuentacorriente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==cheque_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($beneficiario_ocacional_cheque->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
					$chequecuentacorrienteLogic= new cheque_cuenta_corriente_logic($this->connexion);
					$chequecuentacorriente->setid_beneficiario_ocacional_cheque($beneficiario_ocacional_cheque->getId());
					cheque_cuenta_corriente_data::save($chequecuentacorriente,$this->connexion);
					$chequecuentacorrienteLogic->deepSave($chequecuentacorriente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {



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

			foreach($beneficiario_ocacional_cheque->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
				$chequecuentacorrienteLogic= new cheque_cuenta_corriente_logic($this->connexion);
				$chequecuentacorriente->setid_beneficiario_ocacional_cheque($beneficiario_ocacional_cheque->getId());
				cheque_cuenta_corriente_data::save($chequecuentacorriente,$this->connexion);
				$chequecuentacorrienteLogic->deepSave($chequecuentacorriente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				beneficiario_ocacional_cheque_data::save($beneficiario_ocacional_cheque, $this->connexion);
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
			
			$this->deepLoad($this->beneficiario_ocacional_cheque,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->beneficiario_ocacional_cheques as $beneficiario_ocacional_cheque) {
				$this->deepLoad($beneficiario_ocacional_cheque,$isDeep,$deepLoadType,$clases);
								
				beneficiario_ocacional_cheque_util::refrescarFKDescripciones($this->beneficiario_ocacional_cheques);
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
			
			foreach($this->beneficiario_ocacional_cheques as $beneficiario_ocacional_cheque) {
				$this->deepLoad($beneficiario_ocacional_cheque,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->beneficiario_ocacional_cheque,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->beneficiario_ocacional_cheques as $beneficiario_ocacional_cheque) {
				$this->deepSave($beneficiario_ocacional_cheque,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->beneficiario_ocacional_cheques as $beneficiario_ocacional_cheque) {
				$this->deepSave($beneficiario_ocacional_cheque,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(cheque_cuenta_corriente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==cheque_cuenta_corriente::$class) {
						$classes[]=new Classe(cheque_cuenta_corriente::$class);
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

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getbeneficiario_ocacional_cheque() : ?beneficiario_ocacional_cheque {	
		/*
		beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToGet($this->beneficiario_ocacional_cheque,$this->datosCliente);
		beneficiario_ocacional_cheque_logic_add::updatebeneficiario_ocacional_chequeToGet($this->beneficiario_ocacional_cheque);
		*/
			
		return $this->beneficiario_ocacional_cheque;
	}
		
	public function setbeneficiario_ocacional_cheque(beneficiario_ocacional_cheque $newbeneficiario_ocacional_cheque) {
		$this->beneficiario_ocacional_cheque = $newbeneficiario_ocacional_cheque;
	}
	
	public function getbeneficiario_ocacional_cheques() : array {		
		/*
		beneficiario_ocacional_cheque_logic_add::checkbeneficiario_ocacional_chequeToGets($this->beneficiario_ocacional_cheques,$this->datosCliente);
		
		foreach ($this->beneficiario_ocacional_cheques as $beneficiario_ocacional_chequeLocal ) {
			beneficiario_ocacional_cheque_logic_add::updatebeneficiario_ocacional_chequeToGet($beneficiario_ocacional_chequeLocal);
		}
		*/
		
		return $this->beneficiario_ocacional_cheques;
	}
	
	public function setbeneficiario_ocacional_cheques(array $newbeneficiario_ocacional_cheques) {
		$this->beneficiario_ocacional_cheques = $newbeneficiario_ocacional_cheques;
	}
	
	public function getbeneficiario_ocacional_chequeDataAccess() : beneficiario_ocacional_cheque_data {
		return $this->beneficiario_ocacional_chequeDataAccess;
	}
	
	public function setbeneficiario_ocacional_chequeDataAccess(beneficiario_ocacional_cheque_data $newbeneficiario_ocacional_chequeDataAccess) {
		$this->beneficiario_ocacional_chequeDataAccess = $newbeneficiario_ocacional_chequeDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        beneficiario_ocacional_cheque_carga::$CONTROLLER;;        
		
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
