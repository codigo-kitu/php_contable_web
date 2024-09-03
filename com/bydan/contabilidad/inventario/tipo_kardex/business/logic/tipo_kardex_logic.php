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

namespace com\bydan\contabilidad\inventario\tipo_kardex\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\tipo_kardex\util\tipo_kardex_carga;
use com\bydan\contabilidad\inventario\tipo_kardex\util\tipo_kardex_param_return;


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

use com\bydan\contabilidad\inventario\tipo_kardex\util\tipo_kardex_util;
use com\bydan\contabilidad\inventario\tipo_kardex\business\entity\tipo_kardex;
use com\bydan\contabilidad\inventario\tipo_kardex\business\data\tipo_kardex_data;

//FK


//REL


use com\bydan\contabilidad\inventario\parametro_inventario\business\entity\parametro_inventario;
use com\bydan\contabilidad\inventario\parametro_inventario\business\data\parametro_inventario_data;
use com\bydan\contabilidad\inventario\parametro_inventario\business\logic\parametro_inventario_logic;
use com\bydan\contabilidad\inventario\parametro_inventario\util\parametro_inventario_carga;
use com\bydan\contabilidad\inventario\parametro_inventario\util\parametro_inventario_util;

use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;
use com\bydan\contabilidad\inventario\kardex\business\data\kardex_data;
use com\bydan\contabilidad\inventario\kardex\business\logic\kardex_logic;
use com\bydan\contabilidad\inventario\kardex\util\kardex_carga;
use com\bydan\contabilidad\inventario\kardex\util\kardex_util;

//REL DETALLES

use com\bydan\contabilidad\inventario\kardex_detalle\util\kardex_detalle_carga;



class tipo_kardex_logic  extends GeneralEntityLogic implements tipo_kardex_logicI {	
	/*GENERAL*/
	public tipo_kardex_data $tipo_kardexDataAccess;
	public ?tipo_kardex_logic_add $tipo_kardexLogicAdditional=null;
	public ?tipo_kardex $tipo_kardex;
	public array $tipo_kardexs;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->tipo_kardexDataAccess = new tipo_kardex_data();			
			$this->tipo_kardexs = array();
			$this->tipo_kardex = new tipo_kardex();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->tipo_kardexLogicAdditional = new tipo_kardex_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->tipo_kardexLogicAdditional==null) {
			$this->tipo_kardexLogicAdditional=new tipo_kardex_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->tipo_kardexDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->tipo_kardexDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->tipo_kardexDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->tipo_kardexDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->tipo_kardexs = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_kardexs=$this->tipo_kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_kardex_util::refrescarFKDescripciones($this->tipo_kardexs);
			}
			
			tipo_kardex_logic_add::checktipo_kardexToGets($this->tipo_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_kardexs);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->tipo_kardexs = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_kardexs=$this->tipo_kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_kardex_util::refrescarFKDescripciones($this->tipo_kardexs);
			}
			
			tipo_kardex_logic_add::checktipo_kardexToGets($this->tipo_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_kardexs);
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
		$this->tipo_kardex = new tipo_kardex();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->tipo_kardex=$this->tipo_kardexDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_kardex_util::refrescarFKDescripcion($this->tipo_kardex);
			}
						
			tipo_kardex_logic_add::checktipo_kardexToGet($this->tipo_kardex,$this->datosCliente);
			tipo_kardex_logic_add::updatetipo_kardexToGet($this->tipo_kardex);
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
		$this->tipo_kardex = new  tipo_kardex();
		  		  
        try {		
			$this->tipo_kardex=$this->tipo_kardexDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_kardex_util::refrescarFKDescripcion($this->tipo_kardex);
			}
			
			tipo_kardex_logic_add::checktipo_kardexToGet($this->tipo_kardex,$this->datosCliente);
			tipo_kardex_logic_add::updatetipo_kardexToGet($this->tipo_kardex);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?tipo_kardex {
		$tipo_kardexLogic = new  tipo_kardex_logic();
		  		  
        try {		
			$tipo_kardexLogic->setConnexion($connexion);			
			$tipo_kardexLogic->getEntity($id);			
			return $tipo_kardexLogic->gettipo_kardex();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->tipo_kardex = new  tipo_kardex();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->tipo_kardex=$this->tipo_kardexDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_kardex_util::refrescarFKDescripcion($this->tipo_kardex);
			}
			
			tipo_kardex_logic_add::checktipo_kardexToGet($this->tipo_kardex,$this->datosCliente);
			tipo_kardex_logic_add::updatetipo_kardexToGet($this->tipo_kardex);
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
		$this->tipo_kardex = new  tipo_kardex();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_kardex=$this->tipo_kardexDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_kardex_util::refrescarFKDescripcion($this->tipo_kardex);
			}
			
			tipo_kardex_logic_add::checktipo_kardexToGet($this->tipo_kardex,$this->datosCliente);
			tipo_kardex_logic_add::updatetipo_kardexToGet($this->tipo_kardex);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?tipo_kardex {
		$tipo_kardexLogic = new  tipo_kardex_logic();
		  		  
        try {		
			$tipo_kardexLogic->setConnexion($connexion);			
			$tipo_kardexLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $tipo_kardexLogic->gettipo_kardex();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tipo_kardexs = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_kardexs=$this->tipo_kardexDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_kardex_util::refrescarFKDescripciones($this->tipo_kardexs);
			}
			
			tipo_kardex_logic_add::checktipo_kardexToGets($this->tipo_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_kardexs);			
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
		$this->tipo_kardexs = array();
		  		  
        try {			
			$this->tipo_kardexs=$this->tipo_kardexDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_kardex_util::refrescarFKDescripciones($this->tipo_kardexs);
			}
			
			tipo_kardex_logic_add::checktipo_kardexToGets($this->tipo_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_kardexs);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->tipo_kardexs = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_kardexs=$this->tipo_kardexDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_kardex_util::refrescarFKDescripciones($this->tipo_kardexs);
			}
			
			tipo_kardex_logic_add::checktipo_kardexToGets($this->tipo_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_kardexs);
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
		$this->tipo_kardexs = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_kardexs=$this->tipo_kardexDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_kardex_util::refrescarFKDescripciones($this->tipo_kardexs);
			}
			
			tipo_kardex_logic_add::checktipo_kardexToGets($this->tipo_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_kardexs);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$tipo_kardexLogic = new  tipo_kardex_logic();
		  		  
        try {		
			$tipo_kardexLogic->setConnexion($connexion);			
			$tipo_kardexLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $tipo_kardexLogic->gettipo_kardexs();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->tipo_kardexs = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_kardexs=$this->tipo_kardexDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_kardex_util::refrescarFKDescripciones($this->tipo_kardexs);
			}
			
			tipo_kardex_logic_add::checktipo_kardexToGets($this->tipo_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_kardexs);
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
		$this->tipo_kardexs = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_kardexs=$this->tipo_kardexDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_kardex_util::refrescarFKDescripciones($this->tipo_kardexs);
			}
			
			tipo_kardex_logic_add::checktipo_kardexToGets($this->tipo_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_kardexs);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->tipo_kardexs = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_kardexs=$this->tipo_kardexDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_kardex_util::refrescarFKDescripciones($this->tipo_kardexs);
			}
			
			tipo_kardex_logic_add::checktipo_kardexToGets($this->tipo_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_kardexs);
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
		$this->tipo_kardexs = array();
		  		  
        try {			
			$this->tipo_kardexs=$this->tipo_kardexDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_kardex_util::refrescarFKDescripciones($this->tipo_kardexs);
			}	
			
			tipo_kardex_logic_add::checktipo_kardexToGets($this->tipo_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_kardexs);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tipo_kardexs = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_kardexs=$this->tipo_kardexDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_kardex_util::refrescarFKDescripciones($this->tipo_kardexs);
			}
			
			tipo_kardex_logic_add::checktipo_kardexToGets($this->tipo_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_kardexs);
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
		$this->tipo_kardexs = array();
		  		  
        try {		
			$this->tipo_kardexs=$this->tipo_kardexDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_kardex_util::refrescarFKDescripciones($this->tipo_kardexs);
			}
			
			tipo_kardex_logic_add::checktipo_kardexToGets($this->tipo_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_kardexs);

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
						
			//tipo_kardex_logic_add::checktipo_kardexToSave($this->tipo_kardex,$this->datosCliente,$this->connexion);	       
			tipo_kardex_logic_add::updatetipo_kardexToSave($this->tipo_kardex);			
			tipo_kardex_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tipo_kardex,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->tipo_kardexLogicAdditional->checkGeneralEntityToSave($this,$this->tipo_kardex,$this->datosCliente,$this->connexion);
			
			
			tipo_kardex_data::save($this->tipo_kardex, $this->connexion);	    	       	 				
			//tipo_kardex_logic_add::checktipo_kardexToSaveAfter($this->tipo_kardex,$this->datosCliente,$this->connexion);			
			$this->tipo_kardexLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tipo_kardex,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tipo_kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tipo_kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tipo_kardex_util::refrescarFKDescripcion($this->tipo_kardex);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->tipo_kardex->getIsDeleted()) {
				$this->tipo_kardex=null;
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
						
			/*tipo_kardex_logic_add::checktipo_kardexToSave($this->tipo_kardex,$this->datosCliente,$this->connexion);*/	        
			tipo_kardex_logic_add::updatetipo_kardexToSave($this->tipo_kardex);			
			$this->tipo_kardexLogicAdditional->checkGeneralEntityToSave($this,$this->tipo_kardex,$this->datosCliente,$this->connexion);			
			tipo_kardex_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tipo_kardex,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			tipo_kardex_data::save($this->tipo_kardex, $this->connexion);	    	       	 						
			/*tipo_kardex_logic_add::checktipo_kardexToSaveAfter($this->tipo_kardex,$this->datosCliente,$this->connexion);*/			
			$this->tipo_kardexLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tipo_kardex,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tipo_kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tipo_kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tipo_kardex_util::refrescarFKDescripcion($this->tipo_kardex);				
			}
			
			if($this->tipo_kardex->getIsDeleted()) {
				$this->tipo_kardex=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(tipo_kardex $tipo_kardex,Connexion $connexion)  {
		$tipo_kardexLogic = new  tipo_kardex_logic();		  		  
        try {		
			$tipo_kardexLogic->setConnexion($connexion);			
			$tipo_kardexLogic->settipo_kardex($tipo_kardex);			
			$tipo_kardexLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*tipo_kardex_logic_add::checktipo_kardexToSaves($this->tipo_kardexs,$this->datosCliente,$this->connexion);*/	        	
			$this->tipo_kardexLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tipo_kardexs,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tipo_kardexs as $tipo_kardexLocal) {				
								
				tipo_kardex_logic_add::updatetipo_kardexToSave($tipo_kardexLocal);	        	
				tipo_kardex_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tipo_kardexLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				tipo_kardex_data::save($tipo_kardexLocal, $this->connexion);				
			}
			
			/*tipo_kardex_logic_add::checktipo_kardexToSavesAfter($this->tipo_kardexs,$this->datosCliente,$this->connexion);*/			
			$this->tipo_kardexLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tipo_kardexs,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_kardex_util::refrescarFKDescripciones($this->tipo_kardexs);
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
			/*tipo_kardex_logic_add::checktipo_kardexToSaves($this->tipo_kardexs,$this->datosCliente,$this->connexion);*/			
			$this->tipo_kardexLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tipo_kardexs,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tipo_kardexs as $tipo_kardexLocal) {				
								
				tipo_kardex_logic_add::updatetipo_kardexToSave($tipo_kardexLocal);	        	
				tipo_kardex_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tipo_kardexLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				tipo_kardex_data::save($tipo_kardexLocal, $this->connexion);				
			}			
			
			/*tipo_kardex_logic_add::checktipo_kardexToSavesAfter($this->tipo_kardexs,$this->datosCliente,$this->connexion);*/			
			$this->tipo_kardexLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tipo_kardexs,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_kardex_util::refrescarFKDescripciones($this->tipo_kardexs);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $tipo_kardexs,Connexion $connexion)  {
		$tipo_kardexLogic = new  tipo_kardex_logic();
		  		  
        try {		
			$tipo_kardexLogic->setConnexion($connexion);			
			$tipo_kardexLogic->settipo_kardexs($tipo_kardexs);			
			$tipo_kardexLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$tipo_kardexsAux=array();
		
		foreach($this->tipo_kardexs as $tipo_kardex) {
			if($tipo_kardex->getIsDeleted()==false) {
				$tipo_kardexsAux[]=$tipo_kardex;
			}
		}
		
		$this->tipo_kardexs=$tipo_kardexsAux;
	}
	
	public function updateToGetsAuxiliar(array &$tipo_kardexs) {
		if($this->tipo_kardexLogicAdditional==null) {
			$this->tipo_kardexLogicAdditional=new tipo_kardex_logic_add();
		}
		
		
		$this->tipo_kardexLogicAdditional->updateToGets($tipo_kardexs,$this);					
		$this->tipo_kardexLogicAdditional->updateToGetsReferencia($tipo_kardexs,$this);			
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
	
	
	
	public function saveRelacionesWithConnection($tipo_kardex,$parametroinventarios,$kardexs) {
		$this->saveRelacionesBase($tipo_kardex,$parametroinventarios,$kardexs,true);
	}

	public function saveRelaciones($tipo_kardex,$parametroinventarios,$kardexs) {
		$this->saveRelacionesBase($tipo_kardex,$parametroinventarios,$kardexs,false);
	}

	public function saveRelacionesBase($tipo_kardex,$parametroinventarios=array(),$kardexs=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$tipo_kardex->setparametro_inventarios($parametroinventarios);
			$tipo_kardex->setkardexs($kardexs);
			$this->settipo_kardex($tipo_kardex);

				if(($this->tipo_kardex->getIsNew() || $this->tipo_kardex->getIsChanged()) && !$this->tipo_kardex->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($parametroinventarios,$kardexs);

				} else if($this->tipo_kardex->getIsDeleted()) {
					$this->saveRelacionesDetalles($parametroinventarios,$kardexs);
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
	
	
	public function saveRelacionesDetalles($parametroinventarios=array(),$kardexs=array()) {
		try {
	

			$idtipo_kardexActual=$this->gettipo_kardex()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/parametro_inventario_carga.php');
			parametro_inventario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$parametroinventarioLogic_Desde_tipo_kardex=new parametro_inventario_logic();
			$parametroinventarioLogic_Desde_tipo_kardex->setparametro_inventarios($parametroinventarios);

			$parametroinventarioLogic_Desde_tipo_kardex->setConnexion($this->getConnexion());
			$parametroinventarioLogic_Desde_tipo_kardex->setDatosCliente($this->datosCliente);

			foreach($parametroinventarioLogic_Desde_tipo_kardex->getparametro_inventarios() as $parametroinventario_Desde_tipo_kardex) {
				$parametroinventario_Desde_tipo_kardex->setid_tipo_kardex($idtipo_kardexActual);
			}

			$parametroinventarioLogic_Desde_tipo_kardex->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/kardex_carga.php');
			kardex_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$kardexLogic_Desde_tipo_kardex=new kardex_logic();
			$kardexLogic_Desde_tipo_kardex->setkardexs($kardexs);

			$kardexLogic_Desde_tipo_kardex->setConnexion($this->getConnexion());
			$kardexLogic_Desde_tipo_kardex->setDatosCliente($this->datosCliente);

			foreach($kardexLogic_Desde_tipo_kardex->getkardexs() as $kardex_Desde_tipo_kardex) {
				$kardex_Desde_tipo_kardex->setid_tipo_kardex($idtipo_kardexActual);

				$kardexLogic_Desde_tipo_kardex->setkardex($kardex_Desde_tipo_kardex);
				$kardexLogic_Desde_tipo_kardex->save();

				$idkardexActual=$kardex_Desde_tipo_kardex->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/kardex_detalle_carga.php');
				kardex_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$kardexdetalleLogic_Desde_kardex=new kardex_detalle_logic();

				if($kardex_Desde_tipo_kardex->getkardex_detalles()==null){
					$kardex_Desde_tipo_kardex->setkardex_detalles(array());
				}

				$kardexdetalleLogic_Desde_kardex->setkardex_detalles($kardex_Desde_tipo_kardex->getkardex_detalles());

				$kardexdetalleLogic_Desde_kardex->setConnexion($this->getConnexion());
				$kardexdetalleLogic_Desde_kardex->setDatosCliente($this->datosCliente);

				foreach($kardexdetalleLogic_Desde_kardex->getkardex_detalles() as $kardexdetalle_Desde_kardex) {
					$kardexdetalle_Desde_kardex->setid_kardex($idkardexActual);
				}

				$kardexdetalleLogic_Desde_kardex->saves();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $tipo_kardexs,tipo_kardex_param_return $tipo_kardexParameterGeneral) : tipo_kardex_param_return {
		$tipo_kardexReturnGeneral=new tipo_kardex_param_return();
	
		 try {	
			
			if($this->tipo_kardexLogicAdditional==null) {
				$this->tipo_kardexLogicAdditional=new tipo_kardex_logic_add();
			}
			
			$this->tipo_kardexLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$tipo_kardexs,$tipo_kardexParameterGeneral,$tipo_kardexReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $tipo_kardexReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $tipo_kardexs,tipo_kardex_param_return $tipo_kardexParameterGeneral) : tipo_kardex_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_kardexReturnGeneral=new tipo_kardex_param_return();
	
			
			if($this->tipo_kardexLogicAdditional==null) {
				$this->tipo_kardexLogicAdditional=new tipo_kardex_logic_add();
			}
			
			$this->tipo_kardexLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$tipo_kardexs,$tipo_kardexParameterGeneral,$tipo_kardexReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_kardexReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_kardexs,tipo_kardex $tipo_kardex,tipo_kardex_param_return $tipo_kardexParameterGeneral,bool $isEsNuevotipo_kardex,array $clases) : tipo_kardex_param_return {
		 try {	
			$tipo_kardexReturnGeneral=new tipo_kardex_param_return();
	
			$tipo_kardexReturnGeneral->settipo_kardex($tipo_kardex);
			$tipo_kardexReturnGeneral->settipo_kardexs($tipo_kardexs);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tipo_kardexReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->tipo_kardexLogicAdditional==null) {
				$this->tipo_kardexLogicAdditional=new tipo_kardex_logic_add();
			}
			
			$tipo_kardexReturnGeneral=$this->tipo_kardexLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$tipo_kardexs,$tipo_kardex,$tipo_kardexParameterGeneral,$tipo_kardexReturnGeneral,$isEsNuevotipo_kardex,$clases);
			
			/*tipo_kardexLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$tipo_kardexs,$tipo_kardex,$tipo_kardexParameterGeneral,$tipo_kardexReturnGeneral,$isEsNuevotipo_kardex,$clases);*/
			
			return $tipo_kardexReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_kardexs,tipo_kardex $tipo_kardex,tipo_kardex_param_return $tipo_kardexParameterGeneral,bool $isEsNuevotipo_kardex,array $clases) : tipo_kardex_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_kardexReturnGeneral=new tipo_kardex_param_return();
	
			$tipo_kardexReturnGeneral->settipo_kardex($tipo_kardex);
			$tipo_kardexReturnGeneral->settipo_kardexs($tipo_kardexs);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tipo_kardexReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->tipo_kardexLogicAdditional==null) {
				$this->tipo_kardexLogicAdditional=new tipo_kardex_logic_add();
			}
			
			$tipo_kardexReturnGeneral=$this->tipo_kardexLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$tipo_kardexs,$tipo_kardex,$tipo_kardexParameterGeneral,$tipo_kardexReturnGeneral,$isEsNuevotipo_kardex,$clases);
			
			/*tipo_kardexLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$tipo_kardexs,$tipo_kardex,$tipo_kardexParameterGeneral,$tipo_kardexReturnGeneral,$isEsNuevotipo_kardex,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_kardexReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_kardexs,tipo_kardex $tipo_kardex,tipo_kardex_param_return $tipo_kardexParameterGeneral,bool $isEsNuevotipo_kardex,array $clases) : tipo_kardex_param_return {
		 try {	
			$tipo_kardexReturnGeneral=new tipo_kardex_param_return();
	
			$tipo_kardexReturnGeneral->settipo_kardex($tipo_kardex);
			$tipo_kardexReturnGeneral->settipo_kardexs($tipo_kardexs);
			
			
			
			if($this->tipo_kardexLogicAdditional==null) {
				$this->tipo_kardexLogicAdditional=new tipo_kardex_logic_add();
			}
			
			$tipo_kardexReturnGeneral=$this->tipo_kardexLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$tipo_kardexs,$tipo_kardex,$tipo_kardexParameterGeneral,$tipo_kardexReturnGeneral,$isEsNuevotipo_kardex,$clases);
			
			/*tipo_kardexLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$tipo_kardexs,$tipo_kardex,$tipo_kardexParameterGeneral,$tipo_kardexReturnGeneral,$isEsNuevotipo_kardex,$clases);*/
			
			return $tipo_kardexReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_kardexs,tipo_kardex $tipo_kardex,tipo_kardex_param_return $tipo_kardexParameterGeneral,bool $isEsNuevotipo_kardex,array $clases) : tipo_kardex_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_kardexReturnGeneral=new tipo_kardex_param_return();
	
			$tipo_kardexReturnGeneral->settipo_kardex($tipo_kardex);
			$tipo_kardexReturnGeneral->settipo_kardexs($tipo_kardexs);
			
			
			if($this->tipo_kardexLogicAdditional==null) {
				$this->tipo_kardexLogicAdditional=new tipo_kardex_logic_add();
			}
			
			$tipo_kardexReturnGeneral=$this->tipo_kardexLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$tipo_kardexs,$tipo_kardex,$tipo_kardexParameterGeneral,$tipo_kardexReturnGeneral,$isEsNuevotipo_kardex,$clases);
			
			/*tipo_kardexLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$tipo_kardexs,$tipo_kardex,$tipo_kardexParameterGeneral,$tipo_kardexReturnGeneral,$isEsNuevotipo_kardex,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_kardexReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,tipo_kardex $tipo_kardex,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,tipo_kardex $tipo_kardex,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		tipo_kardex_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(tipo_kardex $tipo_kardex,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			tipo_kardex_logic_add::updatetipo_kardexToGet($this->tipo_kardex);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$tipo_kardex->setparametro_inventarios($this->tipo_kardexDataAccess->getparametro_inventarios($this->connexion,$tipo_kardex));
		$tipo_kardex->setkardexs($this->tipo_kardexDataAccess->getkardexs($this->connexion,$tipo_kardex));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==parametro_inventario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_kardex->setparametro_inventarios($this->tipo_kardexDataAccess->getparametro_inventarios($this->connexion,$tipo_kardex));

				if($this->isConDeep) {
					$parametroinventarioLogic= new parametro_inventario_logic($this->connexion);
					$parametroinventarioLogic->setparametro_inventarios($tipo_kardex->getparametro_inventarios());
					$classesLocal=parametro_inventario_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$parametroinventarioLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					parametro_inventario_util::refrescarFKDescripciones($parametroinventarioLogic->getparametro_inventarios());
					$tipo_kardex->setparametro_inventarios($parametroinventarioLogic->getparametro_inventarios());
				}

				continue;
			}

			if($clas->clas==kardex::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_kardex->setkardexs($this->tipo_kardexDataAccess->getkardexs($this->connexion,$tipo_kardex));

				if($this->isConDeep) {
					$kardexLogic= new kardex_logic($this->connexion);
					$kardexLogic->setkardexs($tipo_kardex->getkardexs());
					$classesLocal=kardex_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$kardexLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					kardex_util::refrescarFKDescripciones($kardexLogic->getkardexs());
					$tipo_kardex->setkardexs($kardexLogic->getkardexs());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_inventario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_inventario::$class);
			$tipo_kardex->setparametro_inventarios($this->tipo_kardexDataAccess->getparametro_inventarios($this->connexion,$tipo_kardex));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==kardex::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(kardex::$class);
			$tipo_kardex->setkardexs($this->tipo_kardexDataAccess->getkardexs($this->connexion,$tipo_kardex));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {


		$tipo_kardex->setparametro_inventarios($this->tipo_kardexDataAccess->getparametro_inventarios($this->connexion,$tipo_kardex));

		foreach($tipo_kardex->getparametro_inventarios() as $parametroinventario) {
			$parametroinventarioLogic= new parametro_inventario_logic($this->connexion);
			$parametroinventarioLogic->deepLoad($parametroinventario,$isDeep,$deepLoadType,$clases);
		}

		$tipo_kardex->setkardexs($this->tipo_kardexDataAccess->getkardexs($this->connexion,$tipo_kardex));

		foreach($tipo_kardex->getkardexs() as $kardex) {
			$kardexLogic= new kardex_logic($this->connexion);
			$kardexLogic->deepLoad($kardex,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==parametro_inventario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_kardex->setparametro_inventarios($this->tipo_kardexDataAccess->getparametro_inventarios($this->connexion,$tipo_kardex));

				foreach($tipo_kardex->getparametro_inventarios() as $parametroinventario) {
					$parametroinventarioLogic= new parametro_inventario_logic($this->connexion);
					$parametroinventarioLogic->deepLoad($parametroinventario,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==kardex::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_kardex->setkardexs($this->tipo_kardexDataAccess->getkardexs($this->connexion,$tipo_kardex));

				foreach($tipo_kardex->getkardexs() as $kardex) {
					$kardexLogic= new kardex_logic($this->connexion);
					$kardexLogic->deepLoad($kardex,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_inventario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_inventario::$class);
			$tipo_kardex->setparametro_inventarios($this->tipo_kardexDataAccess->getparametro_inventarios($this->connexion,$tipo_kardex));

			foreach($tipo_kardex->getparametro_inventarios() as $parametroinventario) {
				$parametroinventarioLogic= new parametro_inventario_logic($this->connexion);
				$parametroinventarioLogic->deepLoad($parametroinventario,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==kardex::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(kardex::$class);
			$tipo_kardex->setkardexs($this->tipo_kardexDataAccess->getkardexs($this->connexion,$tipo_kardex));

			foreach($tipo_kardex->getkardexs() as $kardex) {
				$kardexLogic= new kardex_logic($this->connexion);
				$kardexLogic->deepLoad($kardex,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(tipo_kardex $tipo_kardex,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			tipo_kardex_logic_add::updatetipo_kardexToSave($this->tipo_kardex);			
			
			if(!$paraDeleteCascade) {				
				tipo_kardex_data::save($tipo_kardex, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($tipo_kardex->getparametro_inventarios() as $parametroinventario) {
			$parametroinventario->setid_tipo_kardex($tipo_kardex->getId());
			parametro_inventario_data::save($parametroinventario,$this->connexion);
		}


		foreach($tipo_kardex->getkardexs() as $kardex) {
			$kardex->setid_tipo_kardex($tipo_kardex->getId());
			kardex_data::save($kardex,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==parametro_inventario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_kardex->getparametro_inventarios() as $parametroinventario) {
					$parametroinventario->setid_tipo_kardex($tipo_kardex->getId());
					parametro_inventario_data::save($parametroinventario,$this->connexion);
				}

				continue;
			}

			if($clas->clas==kardex::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_kardex->getkardexs() as $kardex) {
					$kardex->setid_tipo_kardex($tipo_kardex->getId());
					kardex_data::save($kardex,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_inventario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_inventario::$class);

			foreach($tipo_kardex->getparametro_inventarios() as $parametroinventario) {
				$parametroinventario->setid_tipo_kardex($tipo_kardex->getId());
				parametro_inventario_data::save($parametroinventario,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==kardex::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(kardex::$class);

			foreach($tipo_kardex->getkardexs() as $kardex) {
				$kardex->setid_tipo_kardex($tipo_kardex->getId());
				kardex_data::save($kardex,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($tipo_kardex->getparametro_inventarios() as $parametroinventario) {
			$parametroinventarioLogic= new parametro_inventario_logic($this->connexion);
			$parametroinventario->setid_tipo_kardex($tipo_kardex->getId());
			parametro_inventario_data::save($parametroinventario,$this->connexion);
			$parametroinventarioLogic->deepSave($parametroinventario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($tipo_kardex->getkardexs() as $kardex) {
			$kardexLogic= new kardex_logic($this->connexion);
			$kardex->setid_tipo_kardex($tipo_kardex->getId());
			kardex_data::save($kardex,$this->connexion);
			$kardexLogic->deepSave($kardex,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==parametro_inventario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_kardex->getparametro_inventarios() as $parametroinventario) {
					$parametroinventarioLogic= new parametro_inventario_logic($this->connexion);
					$parametroinventario->setid_tipo_kardex($tipo_kardex->getId());
					parametro_inventario_data::save($parametroinventario,$this->connexion);
					$parametroinventarioLogic->deepSave($parametroinventario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==kardex::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_kardex->getkardexs() as $kardex) {
					$kardexLogic= new kardex_logic($this->connexion);
					$kardex->setid_tipo_kardex($tipo_kardex->getId());
					kardex_data::save($kardex,$this->connexion);
					$kardexLogic->deepSave($kardex,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {



		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_inventario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_inventario::$class);

			foreach($tipo_kardex->getparametro_inventarios() as $parametroinventario) {
				$parametroinventarioLogic= new parametro_inventario_logic($this->connexion);
				$parametroinventario->setid_tipo_kardex($tipo_kardex->getId());
				parametro_inventario_data::save($parametroinventario,$this->connexion);
				$parametroinventarioLogic->deepSave($parametroinventario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==kardex::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(kardex::$class);

			foreach($tipo_kardex->getkardexs() as $kardex) {
				$kardexLogic= new kardex_logic($this->connexion);
				$kardex->setid_tipo_kardex($tipo_kardex->getId());
				kardex_data::save($kardex,$this->connexion);
				$kardexLogic->deepSave($kardex,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				tipo_kardex_data::save($tipo_kardex, $this->connexion);
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
			
			$this->deepLoad($this->tipo_kardex,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->tipo_kardexs as $tipo_kardex) {
				$this->deepLoad($tipo_kardex,$isDeep,$deepLoadType,$clases);
								
				tipo_kardex_util::refrescarFKDescripciones($this->tipo_kardexs);
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
			
			foreach($this->tipo_kardexs as $tipo_kardex) {
				$this->deepLoad($tipo_kardex,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->tipo_kardex,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->tipo_kardexs as $tipo_kardex) {
				$this->deepSave($tipo_kardex,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->tipo_kardexs as $tipo_kardex) {
				$this->deepSave($tipo_kardex,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(parametro_inventario::$class);
				$classes[]=new Classe(kardex::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==parametro_inventario::$class) {
						$classes[]=new Classe(parametro_inventario::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==kardex::$class) {
						$classes[]=new Classe(kardex::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==parametro_inventario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(parametro_inventario::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==kardex::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(kardex::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function gettipo_kardex() : ?tipo_kardex {	
		/*
		tipo_kardex_logic_add::checktipo_kardexToGet($this->tipo_kardex,$this->datosCliente);
		tipo_kardex_logic_add::updatetipo_kardexToGet($this->tipo_kardex);
		*/
			
		return $this->tipo_kardex;
	}
		
	public function settipo_kardex(tipo_kardex $newtipo_kardex) {
		$this->tipo_kardex = $newtipo_kardex;
	}
	
	public function gettipo_kardexs() : array {		
		/*
		tipo_kardex_logic_add::checktipo_kardexToGets($this->tipo_kardexs,$this->datosCliente);
		
		foreach ($this->tipo_kardexs as $tipo_kardexLocal ) {
			tipo_kardex_logic_add::updatetipo_kardexToGet($tipo_kardexLocal);
		}
		*/
		
		return $this->tipo_kardexs;
	}
	
	public function settipo_kardexs(array $newtipo_kardexs) {
		$this->tipo_kardexs = $newtipo_kardexs;
	}
	
	public function gettipo_kardexDataAccess() : tipo_kardex_data {
		return $this->tipo_kardexDataAccess;
	}
	
	public function settipo_kardexDataAccess(tipo_kardex_data $newtipo_kardexDataAccess) {
		$this->tipo_kardexDataAccess = $newtipo_kardexDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        tipo_kardex_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		kardex_detalle_logic::$logger;
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
