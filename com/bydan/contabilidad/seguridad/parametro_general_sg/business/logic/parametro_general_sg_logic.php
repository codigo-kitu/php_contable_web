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

namespace com\bydan\contabilidad\seguridad\parametro_general_sg\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\parametro_general_sg\util\parametro_general_sg_carga;
use com\bydan\contabilidad\seguridad\parametro_general_sg\util\parametro_general_sg_param_return;


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

use com\bydan\contabilidad\seguridad\parametro_general_sg\util\parametro_general_sg_util;
use com\bydan\contabilidad\seguridad\parametro_general_sg\business\entity\parametro_general_sg;
use com\bydan\contabilidad\seguridad\parametro_general_sg\business\data\parametro_general_sg_data;

//FK


//REL


//REL DETALLES




class parametro_general_sg_logic  extends GeneralEntityLogic implements parametro_general_sg_logicI {	
	/*GENERAL*/
	public parametro_general_sg_data $parametro_general_sgDataAccess;
	//public ?parametro_general_sg_logic_add $parametro_general_sgLogicAdditional=null;
	public ?parametro_general_sg $parametro_general_sg;
	public array $parametro_general_sgs;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->parametro_general_sgDataAccess = new parametro_general_sg_data();			
			$this->parametro_general_sgs = array();
			$this->parametro_general_sg = new parametro_general_sg();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->parametro_general_sgLogicAdditional = new parametro_general_sg_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->parametro_general_sgLogicAdditional==null) {
		//	$this->parametro_general_sgLogicAdditional=new parametro_general_sg_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->parametro_general_sgDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->parametro_general_sgDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->parametro_general_sgDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->parametro_general_sgDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->parametro_general_sgs = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_general_sgs=$this->parametro_general_sgDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_sg_util::refrescarFKDescripciones($this->parametro_general_sgs);
			}
			
			//parametro_general_sg_logic_add::checkparametro_general_sgToGets($this->parametro_general_sgs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_general_sgs);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->parametro_general_sgs = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_general_sgs=$this->parametro_general_sgDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_sg_util::refrescarFKDescripciones($this->parametro_general_sgs);
			}
			
			//parametro_general_sg_logic_add::checkparametro_general_sgToGets($this->parametro_general_sgs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_general_sgs);
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
		$this->parametro_general_sg = new parametro_general_sg();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->parametro_general_sg=$this->parametro_general_sgDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_general_sg,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_general_sg_util::refrescarFKDescripcion($this->parametro_general_sg);
			}
						
			//parametro_general_sg_logic_add::checkparametro_general_sgToGet($this->parametro_general_sg,$this->datosCliente);
			//parametro_general_sg_logic_add::updateparametro_general_sgToGet($this->parametro_general_sg);
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
		$this->parametro_general_sg = new  parametro_general_sg();
		  		  
        try {		
			$this->parametro_general_sg=$this->parametro_general_sgDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_general_sg,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_general_sg_util::refrescarFKDescripcion($this->parametro_general_sg);
			}
			
			//parametro_general_sg_logic_add::checkparametro_general_sgToGet($this->parametro_general_sg,$this->datosCliente);
			//parametro_general_sg_logic_add::updateparametro_general_sgToGet($this->parametro_general_sg);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?parametro_general_sg {
		$parametro_general_sgLogic = new  parametro_general_sg_logic();
		  		  
        try {		
			$parametro_general_sgLogic->setConnexion($connexion);			
			$parametro_general_sgLogic->getEntity($id);			
			return $parametro_general_sgLogic->getparametro_general_sg();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->parametro_general_sg = new  parametro_general_sg();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->parametro_general_sg=$this->parametro_general_sgDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_general_sg,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_general_sg_util::refrescarFKDescripcion($this->parametro_general_sg);
			}
			
			//parametro_general_sg_logic_add::checkparametro_general_sgToGet($this->parametro_general_sg,$this->datosCliente);
			//parametro_general_sg_logic_add::updateparametro_general_sgToGet($this->parametro_general_sg);
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
		$this->parametro_general_sg = new  parametro_general_sg();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_general_sg=$this->parametro_general_sgDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_general_sg,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_general_sg_util::refrescarFKDescripcion($this->parametro_general_sg);
			}
			
			//parametro_general_sg_logic_add::checkparametro_general_sgToGet($this->parametro_general_sg,$this->datosCliente);
			//parametro_general_sg_logic_add::updateparametro_general_sgToGet($this->parametro_general_sg);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?parametro_general_sg {
		$parametro_general_sgLogic = new  parametro_general_sg_logic();
		  		  
        try {		
			$parametro_general_sgLogic->setConnexion($connexion);			
			$parametro_general_sgLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $parametro_general_sgLogic->getparametro_general_sg();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->parametro_general_sgs = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_general_sgs=$this->parametro_general_sgDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_sg_util::refrescarFKDescripciones($this->parametro_general_sgs);
			}
			
			//parametro_general_sg_logic_add::checkparametro_general_sgToGets($this->parametro_general_sgs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_general_sgs);			
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
		$this->parametro_general_sgs = array();
		  		  
        try {			
			$this->parametro_general_sgs=$this->parametro_general_sgDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_sg_util::refrescarFKDescripciones($this->parametro_general_sgs);
			}
			
			//parametro_general_sg_logic_add::checkparametro_general_sgToGets($this->parametro_general_sgs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_general_sgs);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->parametro_general_sgs = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_general_sgs=$this->parametro_general_sgDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_sg_util::refrescarFKDescripciones($this->parametro_general_sgs);
			}
			
			//parametro_general_sg_logic_add::checkparametro_general_sgToGets($this->parametro_general_sgs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_general_sgs);
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
		$this->parametro_general_sgs = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_general_sgs=$this->parametro_general_sgDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_sg_util::refrescarFKDescripciones($this->parametro_general_sgs);
			}
			
			//parametro_general_sg_logic_add::checkparametro_general_sgToGets($this->parametro_general_sgs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_general_sgs);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$parametro_general_sgLogic = new  parametro_general_sg_logic();
		  		  
        try {		
			$parametro_general_sgLogic->setConnexion($connexion);			
			$parametro_general_sgLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $parametro_general_sgLogic->getparametro_general_sgs();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->parametro_general_sgs = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_general_sgs=$this->parametro_general_sgDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_sg_util::refrescarFKDescripciones($this->parametro_general_sgs);
			}
			
			//parametro_general_sg_logic_add::checkparametro_general_sgToGets($this->parametro_general_sgs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_general_sgs);
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
		$this->parametro_general_sgs = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_general_sgs=$this->parametro_general_sgDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_sg_util::refrescarFKDescripciones($this->parametro_general_sgs);
			}
			
			//parametro_general_sg_logic_add::checkparametro_general_sgToGets($this->parametro_general_sgs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_general_sgs);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->parametro_general_sgs = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_general_sgs=$this->parametro_general_sgDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_sg_util::refrescarFKDescripciones($this->parametro_general_sgs);
			}
			
			//parametro_general_sg_logic_add::checkparametro_general_sgToGets($this->parametro_general_sgs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_general_sgs);
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
		$this->parametro_general_sgs = array();
		  		  
        try {			
			$this->parametro_general_sgs=$this->parametro_general_sgDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_sg_util::refrescarFKDescripciones($this->parametro_general_sgs);
			}	
			
			//parametro_general_sg_logic_add::checkparametro_general_sgToGets($this->parametro_general_sgs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_general_sgs);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->parametro_general_sgs = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_general_sgs=$this->parametro_general_sgDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_sg_util::refrescarFKDescripciones($this->parametro_general_sgs);
			}
			
			//parametro_general_sg_logic_add::checkparametro_general_sgToGets($this->parametro_general_sgs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_general_sgs);
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
		$this->parametro_general_sgs = array();
		  		  
        try {		
			$this->parametro_general_sgs=$this->parametro_general_sgDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_sg_util::refrescarFKDescripciones($this->parametro_general_sgs);
			}
			
			//parametro_general_sg_logic_add::checkparametro_general_sgToGets($this->parametro_general_sgs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_general_sgs);

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
						
			//parametro_general_sg_logic_add::checkparametro_general_sgToSave($this->parametro_general_sg,$this->datosCliente,$this->connexion);	       
			//parametro_general_sg_logic_add::updateparametro_general_sgToSave($this->parametro_general_sg);			
			parametro_general_sg_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->parametro_general_sg,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->parametro_general_sgLogicAdditional->checkGeneralEntityToSave($this,$this->parametro_general_sg,$this->datosCliente,$this->connexion);
			
			
			parametro_general_sg_data::save($this->parametro_general_sg, $this->connexion);	    	       	 				
			//parametro_general_sg_logic_add::checkparametro_general_sgToSaveAfter($this->parametro_general_sg,$this->datosCliente,$this->connexion);			
			//$this->parametro_general_sgLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->parametro_general_sg,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->parametro_general_sg,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->parametro_general_sg,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				parametro_general_sg_util::refrescarFKDescripcion($this->parametro_general_sg);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->parametro_general_sg->getIsDeleted()) {
				$this->parametro_general_sg=null;
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
						
			/*parametro_general_sg_logic_add::checkparametro_general_sgToSave($this->parametro_general_sg,$this->datosCliente,$this->connexion);*/	        
			//parametro_general_sg_logic_add::updateparametro_general_sgToSave($this->parametro_general_sg);			
			//$this->parametro_general_sgLogicAdditional->checkGeneralEntityToSave($this,$this->parametro_general_sg,$this->datosCliente,$this->connexion);			
			parametro_general_sg_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->parametro_general_sg,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			parametro_general_sg_data::save($this->parametro_general_sg, $this->connexion);	    	       	 						
			/*parametro_general_sg_logic_add::checkparametro_general_sgToSaveAfter($this->parametro_general_sg,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_general_sgLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->parametro_general_sg,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->parametro_general_sg,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->parametro_general_sg,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				parametro_general_sg_util::refrescarFKDescripcion($this->parametro_general_sg);				
			}
			
			if($this->parametro_general_sg->getIsDeleted()) {
				$this->parametro_general_sg=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(parametro_general_sg $parametro_general_sg,Connexion $connexion)  {
		$parametro_general_sgLogic = new  parametro_general_sg_logic();		  		  
        try {		
			$parametro_general_sgLogic->setConnexion($connexion);			
			$parametro_general_sgLogic->setparametro_general_sg($parametro_general_sg);			
			$parametro_general_sgLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*parametro_general_sg_logic_add::checkparametro_general_sgToSaves($this->parametro_general_sgs,$this->datosCliente,$this->connexion);*/	        	
			//$this->parametro_general_sgLogicAdditional->checkGeneralEntitiesToSaves($this,$this->parametro_general_sgs,$this->datosCliente,$this->connexion);
			
	   		foreach($this->parametro_general_sgs as $parametro_general_sgLocal) {				
								
				//parametro_general_sg_logic_add::updateparametro_general_sgToSave($parametro_general_sgLocal);	        	
				parametro_general_sg_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$parametro_general_sgLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				parametro_general_sg_data::save($parametro_general_sgLocal, $this->connexion);				
			}
			
			/*parametro_general_sg_logic_add::checkparametro_general_sgToSavesAfter($this->parametro_general_sgs,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_general_sgLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->parametro_general_sgs,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_sg_util::refrescarFKDescripciones($this->parametro_general_sgs);
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
			/*parametro_general_sg_logic_add::checkparametro_general_sgToSaves($this->parametro_general_sgs,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_general_sgLogicAdditional->checkGeneralEntitiesToSaves($this,$this->parametro_general_sgs,$this->datosCliente,$this->connexion);
			
	   		foreach($this->parametro_general_sgs as $parametro_general_sgLocal) {				
								
				//parametro_general_sg_logic_add::updateparametro_general_sgToSave($parametro_general_sgLocal);	        	
				parametro_general_sg_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$parametro_general_sgLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				parametro_general_sg_data::save($parametro_general_sgLocal, $this->connexion);				
			}			
			
			/*parametro_general_sg_logic_add::checkparametro_general_sgToSavesAfter($this->parametro_general_sgs,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_general_sgLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->parametro_general_sgs,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_general_sg_util::refrescarFKDescripciones($this->parametro_general_sgs);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $parametro_general_sgs,Connexion $connexion)  {
		$parametro_general_sgLogic = new  parametro_general_sg_logic();
		  		  
        try {		
			$parametro_general_sgLogic->setConnexion($connexion);			
			$parametro_general_sgLogic->setparametro_general_sgs($parametro_general_sgs);			
			$parametro_general_sgLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$parametro_general_sgsAux=array();
		
		foreach($this->parametro_general_sgs as $parametro_general_sg) {
			if($parametro_general_sg->getIsDeleted()==false) {
				$parametro_general_sgsAux[]=$parametro_general_sg;
			}
		}
		
		$this->parametro_general_sgs=$parametro_general_sgsAux;
	}
	
	public function updateToGetsAuxiliar(array &$parametro_general_sgs) {
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
	
	
	
	public function saveRelacionesWithConnection($parametro_general_sg) {
		$this->saveRelacionesBase($parametro_general_sg,true);
	}

	public function saveRelaciones($parametro_general_sg) {
		$this->saveRelacionesBase($parametro_general_sg,false);
	}

	public function saveRelacionesBase($parametro_general_sg,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setparametro_general_sg($parametro_general_sg);

			if(true) {

				//parametro_general_sg_logic_add::updateRelacionesToSave($parametro_general_sg,$this);

				if(($this->parametro_general_sg->getIsNew() || $this->parametro_general_sg->getIsChanged()) && !$this->parametro_general_sg->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->parametro_general_sg->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//parametro_general_sg_logic_add::updateRelacionesToSaveAfter($parametro_general_sg,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $parametro_general_sgs,parametro_general_sg_param_return $parametro_general_sgParameterGeneral) : parametro_general_sg_param_return {
		$parametro_general_sgReturnGeneral=new parametro_general_sg_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $parametro_general_sgReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $parametro_general_sgs,parametro_general_sg_param_return $parametro_general_sgParameterGeneral) : parametro_general_sg_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_general_sgReturnGeneral=new parametro_general_sg_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_general_sgReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_general_sgs,parametro_general_sg $parametro_general_sg,parametro_general_sg_param_return $parametro_general_sgParameterGeneral,bool $isEsNuevoparametro_general_sg,array $clases) : parametro_general_sg_param_return {
		 try {	
			$parametro_general_sgReturnGeneral=new parametro_general_sg_param_return();
	
			$parametro_general_sgReturnGeneral->setparametro_general_sg($parametro_general_sg);
			$parametro_general_sgReturnGeneral->setparametro_general_sgs($parametro_general_sgs);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$parametro_general_sgReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $parametro_general_sgReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_general_sgs,parametro_general_sg $parametro_general_sg,parametro_general_sg_param_return $parametro_general_sgParameterGeneral,bool $isEsNuevoparametro_general_sg,array $clases) : parametro_general_sg_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_general_sgReturnGeneral=new parametro_general_sg_param_return();
	
			$parametro_general_sgReturnGeneral->setparametro_general_sg($parametro_general_sg);
			$parametro_general_sgReturnGeneral->setparametro_general_sgs($parametro_general_sgs);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$parametro_general_sgReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_general_sgReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_general_sgs,parametro_general_sg $parametro_general_sg,parametro_general_sg_param_return $parametro_general_sgParameterGeneral,bool $isEsNuevoparametro_general_sg,array $clases) : parametro_general_sg_param_return {
		 try {	
			$parametro_general_sgReturnGeneral=new parametro_general_sg_param_return();
	
			$parametro_general_sgReturnGeneral->setparametro_general_sg($parametro_general_sg);
			$parametro_general_sgReturnGeneral->setparametro_general_sgs($parametro_general_sgs);
			
			
			
			return $parametro_general_sgReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_general_sgs,parametro_general_sg $parametro_general_sg,parametro_general_sg_param_return $parametro_general_sgParameterGeneral,bool $isEsNuevoparametro_general_sg,array $clases) : parametro_general_sg_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_general_sgReturnGeneral=new parametro_general_sg_param_return();
	
			$parametro_general_sgReturnGeneral->setparametro_general_sg($parametro_general_sg);
			$parametro_general_sgReturnGeneral->setparametro_general_sgs($parametro_general_sgs);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_general_sgReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,parametro_general_sg $parametro_general_sg,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,parametro_general_sg $parametro_general_sg,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	
	
	public function deepLoad(parametro_general_sg $parametro_general_sg,bool $isDeep,string $deepLoadType,array $clases) {
		
		
		try {
			
			
			
			//parametro_general_sg_logic_add::updateparametro_general_sgToGet($this->parametro_general_sg);
			
			
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		
	}
	
	public function deepSave(parametro_general_sg $parametro_general_sg,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		
		
		try {
			
			
			//parametro_general_sg_logic_add::updateparametro_general_sgToSave($this->parametro_general_sg);			
			
			if(!$paraDeleteCascade) {				
				parametro_general_sg_data::save($parametro_general_sg, $this->connexion);
			}
			
			
			
			if($paraDeleteCascade) {				
				parametro_general_sg_data::save($parametro_general_sg, $this->connexion);
			}
			
		}catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}	
		
		
	}
		
	public function deepLoadWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {
			$this->getNewConnexionToDeep();
			
			$this->deepLoad($this->parametro_general_sg,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->parametro_general_sgs as $parametro_general_sg) {
				$this->deepLoad($parametro_general_sg,$isDeep,$deepLoadType,$clases);
								
				parametro_general_sg_util::refrescarFKDescripciones($this->parametro_general_sgs);
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
			
			foreach($this->parametro_general_sgs as $parametro_general_sg) {
				$this->deepLoad($parametro_general_sg,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->parametro_general_sg,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->parametro_general_sgs as $parametro_general_sg) {
				$this->deepSave($parametro_general_sg,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->parametro_general_sgs as $parametro_general_sg) {
				$this->deepSave($parametro_general_sg,$isDeep,$deepLoadType,$clases,false);
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
	
	
	
	
	
	
	
	public function getparametro_general_sg() : ?parametro_general_sg {	
		/*
		parametro_general_sg_logic_add::checkparametro_general_sgToGet($this->parametro_general_sg,$this->datosCliente);
		parametro_general_sg_logic_add::updateparametro_general_sgToGet($this->parametro_general_sg);
		*/
			
		return $this->parametro_general_sg;
	}
		
	public function setparametro_general_sg(parametro_general_sg $newparametro_general_sg) {
		$this->parametro_general_sg = $newparametro_general_sg;
	}
	
	public function getparametro_general_sgs() : array {		
		/*
		parametro_general_sg_logic_add::checkparametro_general_sgToGets($this->parametro_general_sgs,$this->datosCliente);
		
		foreach ($this->parametro_general_sgs as $parametro_general_sgLocal ) {
			parametro_general_sg_logic_add::updateparametro_general_sgToGet($parametro_general_sgLocal);
		}
		*/
		
		return $this->parametro_general_sgs;
	}
	
	public function setparametro_general_sgs(array $newparametro_general_sgs) {
		$this->parametro_general_sgs = $newparametro_general_sgs;
	}
	
	public function getparametro_general_sgDataAccess() : parametro_general_sg_data {
		return $this->parametro_general_sgDataAccess;
	}
	
	public function setparametro_general_sgDataAccess(parametro_general_sg_data $newparametro_general_sgDataAccess) {
		$this->parametro_general_sgDataAccess = $newparametro_general_sgDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        parametro_general_sg_carga::$CONTROLLER;;        
		
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
