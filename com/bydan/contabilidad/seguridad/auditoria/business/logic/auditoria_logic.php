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

namespace com\bydan\contabilidad\seguridad\auditoria\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_carga;
use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_param_return;

use com\bydan\contabilidad\seguridad\auditoria\presentation\session\auditoria_session;

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


use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_util;
use com\bydan\contabilidad\seguridad\auditoria\business\entity\auditoria;
use com\bydan\contabilidad\seguridad\auditoria\business\data\auditoria_data;

//FK


use com\bydan\contabilidad\seguridad\usuario\business\data\usuario_data;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

//REL


use com\bydan\contabilidad\seguridad\auditoria_detalle\business\entity\auditoria_detalle;
use com\bydan\contabilidad\seguridad\auditoria_detalle\business\data\auditoria_detalle_data;
use com\bydan\contabilidad\seguridad\auditoria_detalle\business\logic\auditoria_detalle_logic;
use com\bydan\contabilidad\seguridad\auditoria_detalle\util\auditoria_detalle_carga;
use com\bydan\contabilidad\seguridad\auditoria_detalle\util\auditoria_detalle_util;

//REL DETALLES




class auditoria_logic  extends GeneralEntityLogic implements auditoria_logicI {	
	/*GENERAL*/
	public auditoria_data $auditoriaDataAccess;
	//public ?auditoria_logic_add $auditoriaLogicAdditional=null;
	public ?auditoria $auditoria;
	public array $auditorias;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->auditoriaDataAccess = new auditoria_data();			
			$this->auditorias = array();
			$this->auditoria = new auditoria();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->auditoriaLogicAdditional = new auditoria_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->auditoriaLogicAdditional==null) {
		//	$this->auditoriaLogicAdditional=new auditoria_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->auditoriaDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->auditoriaDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->auditoriaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->auditoriaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->auditorias = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->auditorias=$this->auditoriaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->auditorias);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->auditorias = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->auditorias=$this->auditoriaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->auditorias);
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
		$this->auditoria = new auditoria();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->auditoria=$this->auditoriaDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->auditoria,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				auditoria_util::refrescarFKDescripcion($this->auditoria);
			}
						
			//auditoria_logic_add::checkauditoriaToGet($this->auditoria,$this->datosCliente);
			//auditoria_logic_add::updateauditoriaToGet($this->auditoria);
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
		$this->auditoria = new  auditoria();
		  		  
        try {		
			$this->auditoria=$this->auditoriaDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->auditoria,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				auditoria_util::refrescarFKDescripcion($this->auditoria);
			}
			
			//auditoria_logic_add::checkauditoriaToGet($this->auditoria,$this->datosCliente);
			//auditoria_logic_add::updateauditoriaToGet($this->auditoria);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?auditoria {
		$auditoriaLogic = new  auditoria_logic();
		  		  
        try {		
			$auditoriaLogic->setConnexion($connexion);			
			$auditoriaLogic->getEntity($id);			
			return $auditoriaLogic->getauditoria();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->auditoria = new  auditoria();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->auditoria=$this->auditoriaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->auditoria,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				auditoria_util::refrescarFKDescripcion($this->auditoria);
			}
			
			//auditoria_logic_add::checkauditoriaToGet($this->auditoria,$this->datosCliente);
			//auditoria_logic_add::updateauditoriaToGet($this->auditoria);
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
		$this->auditoria = new  auditoria();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->auditoria=$this->auditoriaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->auditoria,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				auditoria_util::refrescarFKDescripcion($this->auditoria);
			}
			
			//auditoria_logic_add::checkauditoriaToGet($this->auditoria,$this->datosCliente);
			//auditoria_logic_add::updateauditoriaToGet($this->auditoria);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?auditoria {
		$auditoriaLogic = new  auditoria_logic();
		  		  
        try {		
			$auditoriaLogic->setConnexion($connexion);			
			$auditoriaLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $auditoriaLogic->getauditoria();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->auditorias = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->auditorias=$this->auditoriaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->auditorias);			
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
		$this->auditorias = array();
		  		  
        try {			
			$this->auditorias=$this->auditoriaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->auditorias);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->auditorias = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->auditorias=$this->auditoriaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->auditorias);
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
		$this->auditorias = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->auditorias=$this->auditoriaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->auditorias);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$auditoriaLogic = new  auditoria_logic();
		  		  
        try {		
			$auditoriaLogic->setConnexion($connexion);			
			$auditoriaLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $auditoriaLogic->getauditorias();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->auditorias = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->auditorias=$this->auditoriaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->auditorias);
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
		$this->auditorias = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->auditorias=$this->auditoriaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->auditorias);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->auditorias = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->auditorias=$this->auditoriaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->auditorias);
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
		$this->auditorias = array();
		  		  
        try {			
			$this->auditorias=$this->auditoriaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}	
			
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->auditorias);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->auditorias = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->auditorias=$this->auditoriaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->auditorias);
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
		$this->auditorias = array();
		  		  
        try {		
			$this->auditorias=$this->auditoriaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->auditorias);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsBusquedaPorIdUsuarioPorFechaHoraWithConnection(string $strFinalQuery,Pagination $pagination,int $id_usuario,string $fecha_hora,string $fecha_horaFinal) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_usuario= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,auditoria_util::$ID_USUARIO,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$parameterSelectionGeneralfecha_hora= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_hora->setParameterSelectionGeneralMayorIgual(ParameterType::$DATE,'\''.$fecha_hora.'\'',auditoria_util::$FECHA_HORA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_hora);

			$parameterSelectionGeneralfecha_horaFinal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_horaFinal->setParameterSelectionGeneralMenorIgual(ParameterType::$DATE,'\''.$fecha_horaFinal.'\'',auditoria_util::$FECHA_HORA,'Final',ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_horaFinal);

			$this->auditorias=$this->auditoriaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->auditorias);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsBusquedaPorIdUsuarioPorFechaHora(string $strFinalQuery,Pagination $pagination,int $id_usuario,string $fecha_hora,string $fecha_horaFinal) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_usuario= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,auditoria_util::$ID_USUARIO,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$parameterSelectionGeneralfecha_hora= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_hora->setParameterSelectionGeneralMayorIgual(ParameterType::$DATE,'\''.$fecha_hora.'\'',auditoria_util::$FECHA_HORA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_hora);

			$parameterSelectionGeneralfecha_horaFinal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_horaFinal->setParameterSelectionGeneralMenorIgual(ParameterType::$DATE,'\''.$fecha_horaFinal.'\'',auditoria_util::$FECHA_HORA,'Final',ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_horaFinal);

			$this->auditorias=$this->auditoriaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->auditorias);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsBusquedaPorIPPCPorFechaHoraWithConnection(string $strFinalQuery,Pagination $pagination,string $ip_pc,string $fecha_hora,string $fecha_horaFinal) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralip_pc= new ParameterSelectionGeneral();
			$parameterSelectionGeneralip_pc->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$ip_pc."%",auditoria_util::$IP_PC,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralip_pc);

			$parameterSelectionGeneralfecha_hora= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_hora->setParameterSelectionGeneralMayorIgual(ParameterType::$DATE,'\''.$fecha_hora.'\'',auditoria_util::$FECHA_HORA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_hora);

			$parameterSelectionGeneralfecha_horaFinal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_horaFinal->setParameterSelectionGeneralMenorIgual(ParameterType::$DATE,'\''.$fecha_horaFinal.'\'',auditoria_util::$FECHA_HORA,'Final',ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_horaFinal);

			$this->auditorias=$this->auditoriaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->auditorias);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsBusquedaPorIPPCPorFechaHora(string $strFinalQuery,Pagination $pagination,string $ip_pc,string $fecha_hora,string $fecha_horaFinal) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralip_pc= new ParameterSelectionGeneral();
			$parameterSelectionGeneralip_pc->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$ip_pc."%",auditoria_util::$IP_PC,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralip_pc);

			$parameterSelectionGeneralfecha_hora= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_hora->setParameterSelectionGeneralMayorIgual(ParameterType::$DATE,'\''.$fecha_hora.'\'',auditoria_util::$FECHA_HORA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_hora);

			$parameterSelectionGeneralfecha_horaFinal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_horaFinal->setParameterSelectionGeneralMenorIgual(ParameterType::$DATE,'\''.$fecha_horaFinal.'\'',auditoria_util::$FECHA_HORA,'Final',ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_horaFinal);

			$this->auditorias=$this->auditoriaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->auditorias);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsBusquedaPorNombrePCPorFechaHoraWithConnection(string $strFinalQuery,Pagination $pagination,string $nombre_pc,string $fecha_hora,string $fecha_horaFinal) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralnombre_pc= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre_pc->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$nombre_pc."%",auditoria_util::$NOMBRE_PC,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre_pc);

			$parameterSelectionGeneralfecha_hora= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_hora->setParameterSelectionGeneralMayorIgual(ParameterType::$DATE,'\''.$fecha_hora.'\'',auditoria_util::$FECHA_HORA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_hora);

			$parameterSelectionGeneralfecha_horaFinal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_horaFinal->setParameterSelectionGeneralMenorIgual(ParameterType::$DATE,'\''.$fecha_horaFinal.'\'',auditoria_util::$FECHA_HORA,'Final',ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_horaFinal);

			$this->auditorias=$this->auditoriaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->auditorias);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsBusquedaPorNombrePCPorFechaHora(string $strFinalQuery,Pagination $pagination,string $nombre_pc,string $fecha_hora,string $fecha_horaFinal) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralnombre_pc= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre_pc->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$nombre_pc."%",auditoria_util::$NOMBRE_PC,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre_pc);

			$parameterSelectionGeneralfecha_hora= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_hora->setParameterSelectionGeneralMayorIgual(ParameterType::$DATE,'\''.$fecha_hora.'\'',auditoria_util::$FECHA_HORA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_hora);

			$parameterSelectionGeneralfecha_horaFinal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_horaFinal->setParameterSelectionGeneralMenorIgual(ParameterType::$DATE,'\''.$fecha_horaFinal.'\'',auditoria_util::$FECHA_HORA,'Final',ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_horaFinal);

			$this->auditorias=$this->auditoriaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->auditorias);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsBusquedaPorNombreTablaPorFechaHoraWithConnection(string $strFinalQuery,Pagination $pagination,string $nombre_tabla,string $fecha_hora,string $fecha_horaFinal) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralnombre_tabla= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre_tabla->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$nombre_tabla."%",auditoria_util::$NOMBRE_TABLA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre_tabla);

			$parameterSelectionGeneralfecha_hora= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_hora->setParameterSelectionGeneralMayorIgual(ParameterType::$DATE,'\''.$fecha_hora.'\'',auditoria_util::$FECHA_HORA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_hora);

			$parameterSelectionGeneralfecha_horaFinal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_horaFinal->setParameterSelectionGeneralMenorIgual(ParameterType::$DATE,'\''.$fecha_horaFinal.'\'',auditoria_util::$FECHA_HORA,'Final',ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_horaFinal);

			$this->auditorias=$this->auditoriaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->auditorias);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsBusquedaPorNombreTablaPorFechaHora(string $strFinalQuery,Pagination $pagination,string $nombre_tabla,string $fecha_hora,string $fecha_horaFinal) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralnombre_tabla= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre_tabla->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$nombre_tabla."%",auditoria_util::$NOMBRE_TABLA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre_tabla);

			$parameterSelectionGeneralfecha_hora= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_hora->setParameterSelectionGeneralMayorIgual(ParameterType::$DATE,'\''.$fecha_hora.'\'',auditoria_util::$FECHA_HORA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_hora);

			$parameterSelectionGeneralfecha_horaFinal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_horaFinal->setParameterSelectionGeneralMenorIgual(ParameterType::$DATE,'\''.$fecha_horaFinal.'\'',auditoria_util::$FECHA_HORA,'Final',ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_horaFinal);

			$this->auditorias=$this->auditoriaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->auditorias);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsBusquedaPorObservacionesPorFechaHoraWithConnection(string $strFinalQuery,Pagination $pagination,string $fecha_hora,string $fecha_horaFinal,string $observacion) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralfecha_hora= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_hora->setParameterSelectionGeneralMayorIgual(ParameterType::$DATE,'\''.$fecha_hora.'\'',auditoria_util::$FECHA_HORA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_hora);

			$parameterSelectionGeneralfecha_horaFinal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_horaFinal->setParameterSelectionGeneralMenorIgual(ParameterType::$DATE,'\''.$fecha_horaFinal.'\'',auditoria_util::$FECHA_HORA,'Final',ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_horaFinal);

			$parameterSelectionGeneralobservacion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralobservacion->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$observacion."%",auditoria_util::$OBSERVACION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralobservacion);

			$this->auditorias=$this->auditoriaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->auditorias);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsBusquedaPorObservacionesPorFechaHora(string $strFinalQuery,Pagination $pagination,string $fecha_hora,string $fecha_horaFinal,string $observacion) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralfecha_hora= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_hora->setParameterSelectionGeneralMayorIgual(ParameterType::$DATE,'\''.$fecha_hora.'\'',auditoria_util::$FECHA_HORA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_hora);

			$parameterSelectionGeneralfecha_horaFinal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_horaFinal->setParameterSelectionGeneralMenorIgual(ParameterType::$DATE,'\''.$fecha_horaFinal.'\'',auditoria_util::$FECHA_HORA,'Final',ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_horaFinal);

			$parameterSelectionGeneralobservacion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralobservacion->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$observacion."%",auditoria_util::$OBSERVACION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralobservacion);

			$this->auditorias=$this->auditoriaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->auditorias);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsBusquedaPorProcesoPorFechaHoraWithConnection(string $strFinalQuery,Pagination $pagination,string $proceso,string $fecha_hora,string $fecha_horaFinal) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralproceso= new ParameterSelectionGeneral();
			$parameterSelectionGeneralproceso->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$proceso."%",auditoria_util::$PROCESO,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralproceso);

			$parameterSelectionGeneralfecha_hora= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_hora->setParameterSelectionGeneralMayorIgual(ParameterType::$DATE,'\''.$fecha_hora.'\'',auditoria_util::$FECHA_HORA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_hora);

			$parameterSelectionGeneralfecha_horaFinal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_horaFinal->setParameterSelectionGeneralMenorIgual(ParameterType::$DATE,'\''.$fecha_horaFinal.'\'',auditoria_util::$FECHA_HORA,'Final',ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_horaFinal);

			$this->auditorias=$this->auditoriaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->auditorias);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsBusquedaPorProcesoPorFechaHora(string $strFinalQuery,Pagination $pagination,string $proceso,string $fecha_hora,string $fecha_horaFinal) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralproceso= new ParameterSelectionGeneral();
			$parameterSelectionGeneralproceso->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$proceso."%",auditoria_util::$PROCESO,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralproceso);

			$parameterSelectionGeneralfecha_hora= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_hora->setParameterSelectionGeneralMayorIgual(ParameterType::$DATE,'\''.$fecha_hora.'\'',auditoria_util::$FECHA_HORA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_hora);

			$parameterSelectionGeneralfecha_horaFinal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_horaFinal->setParameterSelectionGeneralMenorIgual(ParameterType::$DATE,'\''.$fecha_horaFinal.'\'',auditoria_util::$FECHA_HORA,'Final',ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_horaFinal);

			$this->auditorias=$this->auditoriaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->auditorias);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsBusquedaPorUsuarioPCPorFechaHoraWithConnection(string $strFinalQuery,Pagination $pagination,string $usuario_pc,string $fecha_hora,string $fecha_horaFinal) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralusuario_pc= new ParameterSelectionGeneral();
			$parameterSelectionGeneralusuario_pc->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$usuario_pc."%",auditoria_util::$USUARIO_PC,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralusuario_pc);

			$parameterSelectionGeneralfecha_hora= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_hora->setParameterSelectionGeneralMayorIgual(ParameterType::$DATE,'\''.$fecha_hora.'\'',auditoria_util::$FECHA_HORA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_hora);

			$parameterSelectionGeneralfecha_horaFinal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_horaFinal->setParameterSelectionGeneralMenorIgual(ParameterType::$DATE,'\''.$fecha_horaFinal.'\'',auditoria_util::$FECHA_HORA,'Final',ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_horaFinal);

			$this->auditorias=$this->auditoriaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->auditorias);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsBusquedaPorUsuarioPCPorFechaHora(string $strFinalQuery,Pagination $pagination,string $usuario_pc,string $fecha_hora,string $fecha_horaFinal) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralusuario_pc= new ParameterSelectionGeneral();
			$parameterSelectionGeneralusuario_pc->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$usuario_pc."%",auditoria_util::$USUARIO_PC,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralusuario_pc);

			$parameterSelectionGeneralfecha_hora= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_hora->setParameterSelectionGeneralMayorIgual(ParameterType::$DATE,'\''.$fecha_hora.'\'',auditoria_util::$FECHA_HORA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_hora);

			$parameterSelectionGeneralfecha_horaFinal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_horaFinal->setParameterSelectionGeneralMenorIgual(ParameterType::$DATE,'\''.$fecha_horaFinal.'\'',auditoria_util::$FECHA_HORA,'Final',ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_horaFinal);

			$this->auditorias=$this->auditoriaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->auditorias);
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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,auditoria_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->auditorias=$this->auditoriaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->auditorias);

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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,auditoria_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->auditorias=$this->auditoriaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			//auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->auditorias);
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
						
			//auditoria_logic_add::checkauditoriaToSave($this->auditoria,$this->datosCliente,$this->connexion);	       
			//auditoria_logic_add::updateauditoriaToSave($this->auditoria);			
			auditoria_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->auditoria,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->auditoriaLogicAdditional->checkGeneralEntityToSave($this,$this->auditoria,$this->datosCliente,$this->connexion);
			
			
			auditoria_data::save($this->auditoria, $this->connexion);	    	       	 				
			//auditoria_logic_add::checkauditoriaToSaveAfter($this->auditoria,$this->datosCliente,$this->connexion);			
			//$this->auditoriaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->auditoria,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->auditoria,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->auditoria,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				auditoria_util::refrescarFKDescripcion($this->auditoria);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->auditoria->getIsDeleted()) {
				$this->auditoria=null;
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
						
			/*auditoria_logic_add::checkauditoriaToSave($this->auditoria,$this->datosCliente,$this->connexion);*/	        
			//auditoria_logic_add::updateauditoriaToSave($this->auditoria);			
			//$this->auditoriaLogicAdditional->checkGeneralEntityToSave($this,$this->auditoria,$this->datosCliente,$this->connexion);			
			auditoria_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->auditoria,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			auditoria_data::save($this->auditoria, $this->connexion);	    	       	 						
			/*auditoria_logic_add::checkauditoriaToSaveAfter($this->auditoria,$this->datosCliente,$this->connexion);*/			
			//$this->auditoriaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->auditoria,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->auditoria,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->auditoria,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				auditoria_util::refrescarFKDescripcion($this->auditoria);				
			}
			
			if($this->auditoria->getIsDeleted()) {
				$this->auditoria=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(auditoria $auditoria,Connexion $connexion)  {
		$auditoriaLogic = new  auditoria_logic();		  		  
        try {		
			$auditoriaLogic->setConnexion($connexion);			
			$auditoriaLogic->setauditoria($auditoria);			
			$auditoriaLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*auditoria_logic_add::checkauditoriaToSaves($this->auditorias,$this->datosCliente,$this->connexion);*/	        	
			//$this->auditoriaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->auditorias,$this->datosCliente,$this->connexion);
			
	   		foreach($this->auditorias as $auditoriaLocal) {				
								
				//auditoria_logic_add::updateauditoriaToSave($auditoriaLocal);	        	
				auditoria_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$auditoriaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				auditoria_data::save($auditoriaLocal, $this->connexion);				
			}
			
			/*auditoria_logic_add::checkauditoriaToSavesAfter($this->auditorias,$this->datosCliente,$this->connexion);*/			
			//$this->auditoriaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->auditorias,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_util::refrescarFKDescripciones($this->auditorias);
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
			/*auditoria_logic_add::checkauditoriaToSaves($this->auditorias,$this->datosCliente,$this->connexion);*/			
			//$this->auditoriaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->auditorias,$this->datosCliente,$this->connexion);
			
	   		foreach($this->auditorias as $auditoriaLocal) {				
								
				//auditoria_logic_add::updateauditoriaToSave($auditoriaLocal);	        	
				auditoria_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$auditoriaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				auditoria_data::save($auditoriaLocal, $this->connexion);				
			}			
			
			/*auditoria_logic_add::checkauditoriaToSavesAfter($this->auditorias,$this->datosCliente,$this->connexion);*/			
			//$this->auditoriaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->auditorias,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_util::refrescarFKDescripciones($this->auditorias);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $auditorias,Connexion $connexion)  {
		$auditoriaLogic = new  auditoria_logic();
		  		  
        try {		
			$auditoriaLogic->setConnexion($connexion);			
			$auditoriaLogic->setauditorias($auditorias);			
			$auditoriaLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$auditoriasAux=array();
		
		foreach($this->auditorias as $auditoria) {
			if($auditoria->getIsDeleted()==false) {
				$auditoriasAux[]=$auditoria;
			}
		}
		
		$this->auditorias=$auditoriasAux;
	}
	
	public function updateToGetsAuxiliar(array &$auditorias) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->auditorias as $auditoria) {
				
				$auditoria->setid_usuario_Descripcion(auditoria_util::getusuarioDescripcion($auditoria->getusuario()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$auditoria_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$auditoria_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$auditoria_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$auditoria_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$auditoria_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$auditoriaForeignKey=new auditoria_param_return();//auditoriaForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$auditoriaForeignKey,$auditoria_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$auditoriaForeignKey,$auditoria_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $auditoriaForeignKey;
			
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
	
	
	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$auditoriaForeignKey,$auditoria_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$auditoriaForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($auditoria_session==null) {
			$auditoria_session=new auditoria_session();
		}
		
		if($auditoria_session->bitBusquedaDesdeFKSesionusuario!=true) {
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
				if($auditoriaForeignKey->idusuarioDefaultFK==0) {
					$auditoriaForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$auditoriaForeignKey->usuariosFK[$usuarioLocal->getId()]=auditoria_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($auditoria_session->bigidusuarioActual!=null && $auditoria_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($auditoria_session->bigidusuarioActual);//WithConnection

				$auditoriaForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=auditoria_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$auditoriaForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($auditoria,$auditoriadetalles) {
		$this->saveRelacionesBase($auditoria,$auditoriadetalles,true);
	}

	public function saveRelaciones($auditoria,$auditoriadetalles) {
		$this->saveRelacionesBase($auditoria,$auditoriadetalles,false);
	}

	public function saveRelacionesBase($auditoria,$auditoriadetalles=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$auditoria->setauditoria_detalles($auditoriadetalles);
			$this->setauditoria($auditoria);

			if(true) {

				//auditoria_logic_add::updateRelacionesToSave($auditoria,$this);

				if(($this->auditoria->getIsNew() || $this->auditoria->getIsChanged()) && !$this->auditoria->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($auditoriadetalles);

				} else if($this->auditoria->getIsDeleted()) {
					$this->saveRelacionesDetalles($auditoriadetalles);
					$this->save();
				}

				//auditoria_logic_add::updateRelacionesToSaveAfter($auditoria,$this);

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
	
	
	public function saveRelacionesDetalles($auditoriadetalles=array()) {
		try {
	

			$idauditoriaActual=$this->getauditoria()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/auditoria_detalle_carga.php');
			auditoria_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$auditoriadetalleLogic_Desde_auditoria=new auditoria_detalle_logic();
			$auditoriadetalleLogic_Desde_auditoria->setauditoria_detalles($auditoriadetalles);

			$auditoriadetalleLogic_Desde_auditoria->setConnexion($this->getConnexion());
			$auditoriadetalleLogic_Desde_auditoria->setDatosCliente($this->datosCliente);

			foreach($auditoriadetalleLogic_Desde_auditoria->getauditoria_detalles() as $auditoriadetalle_Desde_auditoria) {
				$auditoriadetalle_Desde_auditoria->setid_auditoria($idauditoriaActual);
			}

			$auditoriadetalleLogic_Desde_auditoria->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $auditorias,auditoria_param_return $auditoriaParameterGeneral) : auditoria_param_return {
		$auditoriaReturnGeneral=new auditoria_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $auditoriaReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $auditorias,auditoria_param_return $auditoriaParameterGeneral) : auditoria_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$auditoriaReturnGeneral=new auditoria_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $auditoriaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $auditorias,auditoria $auditoria,auditoria_param_return $auditoriaParameterGeneral,bool $isEsNuevoauditoria,array $clases) : auditoria_param_return {
		 try {	
			$auditoriaReturnGeneral=new auditoria_param_return();
	
			$auditoriaReturnGeneral->setauditoria($auditoria);
			$auditoriaReturnGeneral->setauditorias($auditorias);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$auditoriaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $auditoriaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $auditorias,auditoria $auditoria,auditoria_param_return $auditoriaParameterGeneral,bool $isEsNuevoauditoria,array $clases) : auditoria_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$auditoriaReturnGeneral=new auditoria_param_return();
	
			$auditoriaReturnGeneral->setauditoria($auditoria);
			$auditoriaReturnGeneral->setauditorias($auditorias);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$auditoriaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $auditoriaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $auditorias,auditoria $auditoria,auditoria_param_return $auditoriaParameterGeneral,bool $isEsNuevoauditoria,array $clases) : auditoria_param_return {
		 try {	
			$auditoriaReturnGeneral=new auditoria_param_return();
	
			$auditoriaReturnGeneral->setauditoria($auditoria);
			$auditoriaReturnGeneral->setauditorias($auditorias);
			
			
			
			return $auditoriaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $auditorias,auditoria $auditoria,auditoria_param_return $auditoriaParameterGeneral,bool $isEsNuevoauditoria,array $clases) : auditoria_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$auditoriaReturnGeneral=new auditoria_param_return();
	
			$auditoriaReturnGeneral->setauditoria($auditoria);
			$auditoriaReturnGeneral->setauditorias($auditorias);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $auditoriaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,auditoria $auditoria,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,auditoria $auditoria,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		auditoria_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		auditoria_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(auditoria $auditoria,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//auditoria_logic_add::updateauditoriaToGet($this->auditoria);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$auditoria->setusuario($this->auditoriaDataAccess->getusuario($this->connexion,$auditoria));
		$auditoria->setauditoria_detalles($this->auditoriaDataAccess->getauditoria_detalles($this->connexion,$auditoria));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$auditoria->setusuario($this->auditoriaDataAccess->getusuario($this->connexion,$auditoria));
				continue;
			}

			if($clas->clas==auditoria_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$auditoria->setauditoria_detalles($this->auditoriaDataAccess->getauditoria_detalles($this->connexion,$auditoria));

				if($this->isConDeep) {
					$auditoriadetalleLogic= new auditoria_detalle_logic($this->connexion);
					$auditoriadetalleLogic->setauditoria_detalles($auditoria->getauditoria_detalles());
					$classesLocal=auditoria_detalle_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$auditoriadetalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					auditoria_detalle_util::refrescarFKDescripciones($auditoriadetalleLogic->getauditoria_detalles());
					$auditoria->setauditoria_detalles($auditoriadetalleLogic->getauditoria_detalles());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$auditoria->setusuario($this->auditoriaDataAccess->getusuario($this->connexion,$auditoria));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==auditoria_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(auditoria_detalle::$class);
			$auditoria->setauditoria_detalles($this->auditoriaDataAccess->getauditoria_detalles($this->connexion,$auditoria));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$auditoria->setusuario($this->auditoriaDataAccess->getusuario($this->connexion,$auditoria));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($auditoria->getusuario(),$isDeep,$deepLoadType,$clases);
				

		$auditoria->setauditoria_detalles($this->auditoriaDataAccess->getauditoria_detalles($this->connexion,$auditoria));

		foreach($auditoria->getauditoria_detalles() as $auditoriadetalle) {
			$auditoriadetalleLogic= new auditoria_detalle_logic($this->connexion);
			$auditoriadetalleLogic->deepLoad($auditoriadetalle,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$auditoria->setusuario($this->auditoriaDataAccess->getusuario($this->connexion,$auditoria));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($auditoria->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==auditoria_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$auditoria->setauditoria_detalles($this->auditoriaDataAccess->getauditoria_detalles($this->connexion,$auditoria));

				foreach($auditoria->getauditoria_detalles() as $auditoriadetalle) {
					$auditoriadetalleLogic= new auditoria_detalle_logic($this->connexion);
					$auditoriadetalleLogic->deepLoad($auditoriadetalle,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$auditoria->setusuario($this->auditoriaDataAccess->getusuario($this->connexion,$auditoria));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($auditoria->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==auditoria_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(auditoria_detalle::$class);
			$auditoria->setauditoria_detalles($this->auditoriaDataAccess->getauditoria_detalles($this->connexion,$auditoria));

			foreach($auditoria->getauditoria_detalles() as $auditoriadetalle) {
				$auditoriadetalleLogic= new auditoria_detalle_logic($this->connexion);
				$auditoriadetalleLogic->deepLoad($auditoriadetalle,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(auditoria $auditoria,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//auditoria_logic_add::updateauditoriaToSave($this->auditoria);			
			
			if(!$paraDeleteCascade) {				
				auditoria_data::save($auditoria, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		usuario_data::save($auditoria->getusuario(),$this->connexion);

		foreach($auditoria->getauditoria_detalles() as $auditoriadetalle) {
			$auditoriadetalle->setid_auditoria($auditoria->getId());
			auditoria_detalle_data::save($auditoriadetalle,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				usuario_data::save($auditoria->getusuario(),$this->connexion);
				continue;
			}


			if($clas->clas==auditoria_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($auditoria->getauditoria_detalles() as $auditoriadetalle) {
					$auditoriadetalle->setid_auditoria($auditoria->getId());
					auditoria_detalle_data::save($auditoriadetalle,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($auditoria->getusuario(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==auditoria_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(auditoria_detalle::$class);

			foreach($auditoria->getauditoria_detalles() as $auditoriadetalle) {
				$auditoriadetalle->setid_auditoria($auditoria->getId());
				auditoria_detalle_data::save($auditoriadetalle,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		usuario_data::save($auditoria->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($auditoria->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($auditoria->getauditoria_detalles() as $auditoriadetalle) {
			$auditoriadetalleLogic= new auditoria_detalle_logic($this->connexion);
			$auditoriadetalle->setid_auditoria($auditoria->getId());
			auditoria_detalle_data::save($auditoriadetalle,$this->connexion);
			$auditoriadetalleLogic->deepSave($auditoriadetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				usuario_data::save($auditoria->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($auditoria->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==auditoria_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($auditoria->getauditoria_detalles() as $auditoriadetalle) {
					$auditoriadetalleLogic= new auditoria_detalle_logic($this->connexion);
					$auditoriadetalle->setid_auditoria($auditoria->getId());
					auditoria_detalle_data::save($auditoriadetalle,$this->connexion);
					$auditoriadetalleLogic->deepSave($auditoriadetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($auditoria->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($auditoria->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==auditoria_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(auditoria_detalle::$class);

			foreach($auditoria->getauditoria_detalles() as $auditoriadetalle) {
				$auditoriadetalleLogic= new auditoria_detalle_logic($this->connexion);
				$auditoriadetalle->setid_auditoria($auditoria->getId());
				auditoria_detalle_data::save($auditoriadetalle,$this->connexion);
				$auditoriadetalleLogic->deepSave($auditoriadetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				auditoria_data::save($auditoria, $this->connexion);
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
			
			$this->deepLoad($this->auditoria,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->auditorias as $auditoria) {
				$this->deepLoad($auditoria,$isDeep,$deepLoadType,$clases);
								
				auditoria_util::refrescarFKDescripciones($this->auditorias);
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
			
			foreach($this->auditorias as $auditoria) {
				$this->deepLoad($auditoria,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->auditoria,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->auditorias as $auditoria) {
				$this->deepSave($auditoria,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->auditorias as $auditoria) {
				$this->deepSave($auditoria,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(usuario::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==usuario::$class) {
						$classes[]=new Classe(usuario::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

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
				
				$classes[]=new Classe(auditoria_detalle::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==auditoria_detalle::$class) {
						$classes[]=new Classe(auditoria_detalle::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==auditoria_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(auditoria_detalle::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getauditoria() : ?auditoria {	
		/*
		auditoria_logic_add::checkauditoriaToGet($this->auditoria,$this->datosCliente);
		auditoria_logic_add::updateauditoriaToGet($this->auditoria);
		*/
			
		return $this->auditoria;
	}
		
	public function setauditoria(auditoria $newauditoria) {
		$this->auditoria = $newauditoria;
	}
	
	public function getauditorias() : array {		
		/*
		auditoria_logic_add::checkauditoriaToGets($this->auditorias,$this->datosCliente);
		
		foreach ($this->auditorias as $auditoriaLocal ) {
			auditoria_logic_add::updateauditoriaToGet($auditoriaLocal);
		}
		*/
		
		return $this->auditorias;
	}
	
	public function setauditorias(array $newauditorias) {
		$this->auditorias = $newauditorias;
	}
	
	public function getauditoriaDataAccess() : auditoria_data {
		return $this->auditoriaDataAccess;
	}
	
	public function setauditoriaDataAccess(auditoria_data $newauditoriaDataAccess) {
		$this->auditoriaDataAccess = $newauditoriaDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        auditoria_carga::$CONTROLLER;;        
		
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
