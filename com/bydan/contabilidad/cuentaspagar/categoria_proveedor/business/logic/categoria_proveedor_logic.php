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

namespace com\bydan\contabilidad\cuentaspagar\categoria_proveedor\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\util\categoria_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\util\categoria_proveedor_param_return;


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

use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\util\categoria_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\business\entity\categoria_proveedor;
use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\business\data\categoria_proveedor_data;

//FK


//REL


use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

//REL DETALLES




class categoria_proveedor_logic  extends GeneralEntityLogic implements categoria_proveedor_logicI {	
	/*GENERAL*/
	public categoria_proveedor_data $categoria_proveedorDataAccess;
	//public ?categoria_proveedor_logic_add $categoria_proveedorLogicAdditional=null;
	public ?categoria_proveedor $categoria_proveedor;
	public array $categoria_proveedors;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->categoria_proveedorDataAccess = new categoria_proveedor_data();			
			$this->categoria_proveedors = array();
			$this->categoria_proveedor = new categoria_proveedor();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->categoria_proveedorLogicAdditional = new categoria_proveedor_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->categoria_proveedorLogicAdditional==null) {
		//	$this->categoria_proveedorLogicAdditional=new categoria_proveedor_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->categoria_proveedorDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->categoria_proveedorDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->categoria_proveedorDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->categoria_proveedorDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->categoria_proveedors = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_proveedors=$this->categoria_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_proveedor_util::refrescarFKDescripciones($this->categoria_proveedors);
			}
			
			//categoria_proveedor_logic_add::checkcategoria_proveedorToGets($this->categoria_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_proveedors);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->categoria_proveedors = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_proveedors=$this->categoria_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_proveedor_util::refrescarFKDescripciones($this->categoria_proveedors);
			}
			
			//categoria_proveedor_logic_add::checkcategoria_proveedorToGets($this->categoria_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_proveedors);
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
		$this->categoria_proveedor = new categoria_proveedor();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->categoria_proveedor=$this->categoria_proveedorDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->categoria_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				categoria_proveedor_util::refrescarFKDescripcion($this->categoria_proveedor);
			}
						
			//categoria_proveedor_logic_add::checkcategoria_proveedorToGet($this->categoria_proveedor,$this->datosCliente);
			//categoria_proveedor_logic_add::updatecategoria_proveedorToGet($this->categoria_proveedor);
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
		$this->categoria_proveedor = new  categoria_proveedor();
		  		  
        try {		
			$this->categoria_proveedor=$this->categoria_proveedorDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->categoria_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				categoria_proveedor_util::refrescarFKDescripcion($this->categoria_proveedor);
			}
			
			//categoria_proveedor_logic_add::checkcategoria_proveedorToGet($this->categoria_proveedor,$this->datosCliente);
			//categoria_proveedor_logic_add::updatecategoria_proveedorToGet($this->categoria_proveedor);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?categoria_proveedor {
		$categoria_proveedorLogic = new  categoria_proveedor_logic();
		  		  
        try {		
			$categoria_proveedorLogic->setConnexion($connexion);			
			$categoria_proveedorLogic->getEntity($id);			
			return $categoria_proveedorLogic->getcategoria_proveedor();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->categoria_proveedor = new  categoria_proveedor();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->categoria_proveedor=$this->categoria_proveedorDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->categoria_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				categoria_proveedor_util::refrescarFKDescripcion($this->categoria_proveedor);
			}
			
			//categoria_proveedor_logic_add::checkcategoria_proveedorToGet($this->categoria_proveedor,$this->datosCliente);
			//categoria_proveedor_logic_add::updatecategoria_proveedorToGet($this->categoria_proveedor);
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
		$this->categoria_proveedor = new  categoria_proveedor();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_proveedor=$this->categoria_proveedorDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->categoria_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				categoria_proveedor_util::refrescarFKDescripcion($this->categoria_proveedor);
			}
			
			//categoria_proveedor_logic_add::checkcategoria_proveedorToGet($this->categoria_proveedor,$this->datosCliente);
			//categoria_proveedor_logic_add::updatecategoria_proveedorToGet($this->categoria_proveedor);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?categoria_proveedor {
		$categoria_proveedorLogic = new  categoria_proveedor_logic();
		  		  
        try {		
			$categoria_proveedorLogic->setConnexion($connexion);			
			$categoria_proveedorLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $categoria_proveedorLogic->getcategoria_proveedor();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->categoria_proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->categoria_proveedors=$this->categoria_proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_proveedor_util::refrescarFKDescripciones($this->categoria_proveedors);
			}
			
			//categoria_proveedor_logic_add::checkcategoria_proveedorToGets($this->categoria_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_proveedors);			
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
		$this->categoria_proveedors = array();
		  		  
        try {			
			$this->categoria_proveedors=$this->categoria_proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_proveedor_util::refrescarFKDescripciones($this->categoria_proveedors);
			}
			
			//categoria_proveedor_logic_add::checkcategoria_proveedorToGets($this->categoria_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_proveedors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->categoria_proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_proveedors=$this->categoria_proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_proveedor_util::refrescarFKDescripciones($this->categoria_proveedors);
			}
			
			//categoria_proveedor_logic_add::checkcategoria_proveedorToGets($this->categoria_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_proveedors);
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
		$this->categoria_proveedors = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_proveedors=$this->categoria_proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_proveedor_util::refrescarFKDescripciones($this->categoria_proveedors);
			}
			
			//categoria_proveedor_logic_add::checkcategoria_proveedorToGets($this->categoria_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_proveedors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$categoria_proveedorLogic = new  categoria_proveedor_logic();
		  		  
        try {		
			$categoria_proveedorLogic->setConnexion($connexion);			
			$categoria_proveedorLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $categoria_proveedorLogic->getcategoria_proveedors();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->categoria_proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->categoria_proveedors=$this->categoria_proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_proveedor_util::refrescarFKDescripciones($this->categoria_proveedors);
			}
			
			//categoria_proveedor_logic_add::checkcategoria_proveedorToGets($this->categoria_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_proveedors);
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
		$this->categoria_proveedors = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_proveedors=$this->categoria_proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_proveedor_util::refrescarFKDescripciones($this->categoria_proveedors);
			}
			
			//categoria_proveedor_logic_add::checkcategoria_proveedorToGets($this->categoria_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_proveedors);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->categoria_proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_proveedors=$this->categoria_proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_proveedor_util::refrescarFKDescripciones($this->categoria_proveedors);
			}
			
			//categoria_proveedor_logic_add::checkcategoria_proveedorToGets($this->categoria_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_proveedors);
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
		$this->categoria_proveedors = array();
		  		  
        try {			
			$this->categoria_proveedors=$this->categoria_proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_proveedor_util::refrescarFKDescripciones($this->categoria_proveedors);
			}	
			
			//categoria_proveedor_logic_add::checkcategoria_proveedorToGets($this->categoria_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_proveedors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->categoria_proveedors = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->categoria_proveedors=$this->categoria_proveedorDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_proveedor_util::refrescarFKDescripciones($this->categoria_proveedors);
			}
			
			//categoria_proveedor_logic_add::checkcategoria_proveedorToGets($this->categoria_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_proveedors);
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
		$this->categoria_proveedors = array();
		  		  
        try {		
			$this->categoria_proveedors=$this->categoria_proveedorDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_proveedor_util::refrescarFKDescripciones($this->categoria_proveedors);
			}
			
			//categoria_proveedor_logic_add::checkcategoria_proveedorToGets($this->categoria_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_proveedors);

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
						
			//categoria_proveedor_logic_add::checkcategoria_proveedorToSave($this->categoria_proveedor,$this->datosCliente,$this->connexion);	       
			//categoria_proveedor_logic_add::updatecategoria_proveedorToSave($this->categoria_proveedor);			
			categoria_proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->categoria_proveedor,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->categoria_proveedorLogicAdditional->checkGeneralEntityToSave($this,$this->categoria_proveedor,$this->datosCliente,$this->connexion);
			
			
			categoria_proveedor_data::save($this->categoria_proveedor, $this->connexion);	    	       	 				
			//categoria_proveedor_logic_add::checkcategoria_proveedorToSaveAfter($this->categoria_proveedor,$this->datosCliente,$this->connexion);			
			//$this->categoria_proveedorLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->categoria_proveedor,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->categoria_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->categoria_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				categoria_proveedor_util::refrescarFKDescripcion($this->categoria_proveedor);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->categoria_proveedor->getIsDeleted()) {
				$this->categoria_proveedor=null;
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
						
			/*categoria_proveedor_logic_add::checkcategoria_proveedorToSave($this->categoria_proveedor,$this->datosCliente,$this->connexion);*/	        
			//categoria_proveedor_logic_add::updatecategoria_proveedorToSave($this->categoria_proveedor);			
			//$this->categoria_proveedorLogicAdditional->checkGeneralEntityToSave($this,$this->categoria_proveedor,$this->datosCliente,$this->connexion);			
			categoria_proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->categoria_proveedor,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			categoria_proveedor_data::save($this->categoria_proveedor, $this->connexion);	    	       	 						
			/*categoria_proveedor_logic_add::checkcategoria_proveedorToSaveAfter($this->categoria_proveedor,$this->datosCliente,$this->connexion);*/			
			//$this->categoria_proveedorLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->categoria_proveedor,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->categoria_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->categoria_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				categoria_proveedor_util::refrescarFKDescripcion($this->categoria_proveedor);				
			}
			
			if($this->categoria_proveedor->getIsDeleted()) {
				$this->categoria_proveedor=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(categoria_proveedor $categoria_proveedor,Connexion $connexion)  {
		$categoria_proveedorLogic = new  categoria_proveedor_logic();		  		  
        try {		
			$categoria_proveedorLogic->setConnexion($connexion);			
			$categoria_proveedorLogic->setcategoria_proveedor($categoria_proveedor);			
			$categoria_proveedorLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*categoria_proveedor_logic_add::checkcategoria_proveedorToSaves($this->categoria_proveedors,$this->datosCliente,$this->connexion);*/	        	
			//$this->categoria_proveedorLogicAdditional->checkGeneralEntitiesToSaves($this,$this->categoria_proveedors,$this->datosCliente,$this->connexion);
			
	   		foreach($this->categoria_proveedors as $categoria_proveedorLocal) {				
								
				//categoria_proveedor_logic_add::updatecategoria_proveedorToSave($categoria_proveedorLocal);	        	
				categoria_proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$categoria_proveedorLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				categoria_proveedor_data::save($categoria_proveedorLocal, $this->connexion);				
			}
			
			/*categoria_proveedor_logic_add::checkcategoria_proveedorToSavesAfter($this->categoria_proveedors,$this->datosCliente,$this->connexion);*/			
			//$this->categoria_proveedorLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->categoria_proveedors,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_proveedor_util::refrescarFKDescripciones($this->categoria_proveedors);
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
			/*categoria_proveedor_logic_add::checkcategoria_proveedorToSaves($this->categoria_proveedors,$this->datosCliente,$this->connexion);*/			
			//$this->categoria_proveedorLogicAdditional->checkGeneralEntitiesToSaves($this,$this->categoria_proveedors,$this->datosCliente,$this->connexion);
			
	   		foreach($this->categoria_proveedors as $categoria_proveedorLocal) {				
								
				//categoria_proveedor_logic_add::updatecategoria_proveedorToSave($categoria_proveedorLocal);	        	
				categoria_proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$categoria_proveedorLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				categoria_proveedor_data::save($categoria_proveedorLocal, $this->connexion);				
			}			
			
			/*categoria_proveedor_logic_add::checkcategoria_proveedorToSavesAfter($this->categoria_proveedors,$this->datosCliente,$this->connexion);*/			
			//$this->categoria_proveedorLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->categoria_proveedors,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_proveedor_util::refrescarFKDescripciones($this->categoria_proveedors);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $categoria_proveedors,Connexion $connexion)  {
		$categoria_proveedorLogic = new  categoria_proveedor_logic();
		  		  
        try {		
			$categoria_proveedorLogic->setConnexion($connexion);			
			$categoria_proveedorLogic->setcategoria_proveedors($categoria_proveedors);			
			$categoria_proveedorLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$categoria_proveedorsAux=array();
		
		foreach($this->categoria_proveedors as $categoria_proveedor) {
			if($categoria_proveedor->getIsDeleted()==false) {
				$categoria_proveedorsAux[]=$categoria_proveedor;
			}
		}
		
		$this->categoria_proveedors=$categoria_proveedorsAux;
	}
	
	public function updateToGetsAuxiliar(array &$categoria_proveedors) {
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
	
	
	
	public function saveRelacionesWithConnection($categoria_proveedor,$proveedors) {
		$this->saveRelacionesBase($categoria_proveedor,$proveedors,true);
	}

	public function saveRelaciones($categoria_proveedor,$proveedors) {
		$this->saveRelacionesBase($categoria_proveedor,$proveedors,false);
	}

	public function saveRelacionesBase($categoria_proveedor,$proveedors=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$categoria_proveedor->setproveedors($proveedors);
			$this->setcategoria_proveedor($categoria_proveedor);

			if(true) {

				//categoria_proveedor_logic_add::updateRelacionesToSave($categoria_proveedor,$this);

				if(($this->categoria_proveedor->getIsNew() || $this->categoria_proveedor->getIsChanged()) && !$this->categoria_proveedor->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($proveedors);

				} else if($this->categoria_proveedor->getIsDeleted()) {
					$this->saveRelacionesDetalles($proveedors);
					$this->save();
				}

				//categoria_proveedor_logic_add::updateRelacionesToSaveAfter($categoria_proveedor,$this);

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
	
	
	public function saveRelacionesDetalles($proveedors=array()) {
		try {
	

			$idcategoria_proveedorActual=$this->getcategoria_proveedor()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/proveedor_carga.php');
			proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$proveedorLogic_Desde_categoria_proveedor=new proveedor_logic();
			$proveedorLogic_Desde_categoria_proveedor->setproveedors($proveedors);

			$proveedorLogic_Desde_categoria_proveedor->setConnexion($this->getConnexion());
			$proveedorLogic_Desde_categoria_proveedor->setDatosCliente($this->datosCliente);

			foreach($proveedorLogic_Desde_categoria_proveedor->getproveedors() as $proveedor_Desde_categoria_proveedor) {
				$proveedor_Desde_categoria_proveedor->setid_categoria_proveedor($idcategoria_proveedorActual);

				$proveedorLogic_Desde_categoria_proveedor->setproveedor($proveedor_Desde_categoria_proveedor);
				$proveedorLogic_Desde_categoria_proveedor->save();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $categoria_proveedors,categoria_proveedor_param_return $categoria_proveedorParameterGeneral) : categoria_proveedor_param_return {
		$categoria_proveedorReturnGeneral=new categoria_proveedor_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $categoria_proveedorReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $categoria_proveedors,categoria_proveedor_param_return $categoria_proveedorParameterGeneral) : categoria_proveedor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$categoria_proveedorReturnGeneral=new categoria_proveedor_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $categoria_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $categoria_proveedors,categoria_proveedor $categoria_proveedor,categoria_proveedor_param_return $categoria_proveedorParameterGeneral,bool $isEsNuevocategoria_proveedor,array $clases) : categoria_proveedor_param_return {
		 try {	
			$categoria_proveedorReturnGeneral=new categoria_proveedor_param_return();
	
			$categoria_proveedorReturnGeneral->setcategoria_proveedor($categoria_proveedor);
			$categoria_proveedorReturnGeneral->setcategoria_proveedors($categoria_proveedors);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$categoria_proveedorReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $categoria_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $categoria_proveedors,categoria_proveedor $categoria_proveedor,categoria_proveedor_param_return $categoria_proveedorParameterGeneral,bool $isEsNuevocategoria_proveedor,array $clases) : categoria_proveedor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$categoria_proveedorReturnGeneral=new categoria_proveedor_param_return();
	
			$categoria_proveedorReturnGeneral->setcategoria_proveedor($categoria_proveedor);
			$categoria_proveedorReturnGeneral->setcategoria_proveedors($categoria_proveedors);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$categoria_proveedorReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $categoria_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $categoria_proveedors,categoria_proveedor $categoria_proveedor,categoria_proveedor_param_return $categoria_proveedorParameterGeneral,bool $isEsNuevocategoria_proveedor,array $clases) : categoria_proveedor_param_return {
		 try {	
			$categoria_proveedorReturnGeneral=new categoria_proveedor_param_return();
	
			$categoria_proveedorReturnGeneral->setcategoria_proveedor($categoria_proveedor);
			$categoria_proveedorReturnGeneral->setcategoria_proveedors($categoria_proveedors);
			
			
			
			return $categoria_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $categoria_proveedors,categoria_proveedor $categoria_proveedor,categoria_proveedor_param_return $categoria_proveedorParameterGeneral,bool $isEsNuevocategoria_proveedor,array $clases) : categoria_proveedor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$categoria_proveedorReturnGeneral=new categoria_proveedor_param_return();
	
			$categoria_proveedorReturnGeneral->setcategoria_proveedor($categoria_proveedor);
			$categoria_proveedorReturnGeneral->setcategoria_proveedors($categoria_proveedors);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $categoria_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,categoria_proveedor $categoria_proveedor,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,categoria_proveedor $categoria_proveedor,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		categoria_proveedor_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(categoria_proveedor $categoria_proveedor,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//categoria_proveedor_logic_add::updatecategoria_proveedorToGet($this->categoria_proveedor);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$categoria_proveedor->setproveedors($this->categoria_proveedorDataAccess->getproveedors($this->connexion,$categoria_proveedor));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$categoria_proveedor->setproveedors($this->categoria_proveedorDataAccess->getproveedors($this->connexion,$categoria_proveedor));

				if($this->isConDeep) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedorLogic->setproveedors($categoria_proveedor->getproveedors());
					$classesLocal=proveedor_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					proveedor_util::refrescarFKDescripciones($proveedorLogic->getproveedors());
					$categoria_proveedor->setproveedors($proveedorLogic->getproveedors());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(proveedor::$class);
			$categoria_proveedor->setproveedors($this->categoria_proveedorDataAccess->getproveedors($this->connexion,$categoria_proveedor));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {


		$categoria_proveedor->setproveedors($this->categoria_proveedorDataAccess->getproveedors($this->connexion,$categoria_proveedor));

		foreach($categoria_proveedor->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$categoria_proveedor->setproveedors($this->categoria_proveedorDataAccess->getproveedors($this->connexion,$categoria_proveedor));

				foreach($categoria_proveedor->getproveedors() as $proveedor) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(proveedor::$class);
			$categoria_proveedor->setproveedors($this->categoria_proveedorDataAccess->getproveedors($this->connexion,$categoria_proveedor));

			foreach($categoria_proveedor->getproveedors() as $proveedor) {
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(categoria_proveedor $categoria_proveedor,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//categoria_proveedor_logic_add::updatecategoria_proveedorToSave($this->categoria_proveedor);			
			
			if(!$paraDeleteCascade) {				
				categoria_proveedor_data::save($categoria_proveedor, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($categoria_proveedor->getproveedors() as $proveedor) {
			$proveedor->setid_categoria_proveedor($categoria_proveedor->getId());
			proveedor_data::save($proveedor,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($categoria_proveedor->getproveedors() as $proveedor) {
					$proveedor->setid_categoria_proveedor($categoria_proveedor->getId());
					proveedor_data::save($proveedor,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(proveedor::$class);

			foreach($categoria_proveedor->getproveedors() as $proveedor) {
				$proveedor->setid_categoria_proveedor($categoria_proveedor->getId());
				proveedor_data::save($proveedor,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($categoria_proveedor->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedor->setid_categoria_proveedor($categoria_proveedor->getId());
			proveedor_data::save($proveedor,$this->connexion);
			$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($categoria_proveedor->getproveedors() as $proveedor) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedor->setid_categoria_proveedor($categoria_proveedor->getId());
					proveedor_data::save($proveedor,$this->connexion);
					$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {



		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(proveedor::$class);

			foreach($categoria_proveedor->getproveedors() as $proveedor) {
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedor->setid_categoria_proveedor($categoria_proveedor->getId());
				proveedor_data::save($proveedor,$this->connexion);
				$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				categoria_proveedor_data::save($categoria_proveedor, $this->connexion);
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
			
			$this->deepLoad($this->categoria_proveedor,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->categoria_proveedors as $categoria_proveedor) {
				$this->deepLoad($categoria_proveedor,$isDeep,$deepLoadType,$clases);
								
				categoria_proveedor_util::refrescarFKDescripciones($this->categoria_proveedors);
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
			
			foreach($this->categoria_proveedors as $categoria_proveedor) {
				$this->deepLoad($categoria_proveedor,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->categoria_proveedor,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->categoria_proveedors as $categoria_proveedor) {
				$this->deepSave($categoria_proveedor,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->categoria_proveedors as $categoria_proveedor) {
				$this->deepSave($categoria_proveedor,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(proveedor::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==proveedor::$class) {
						$classes[]=new Classe(proveedor::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(proveedor::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getcategoria_proveedor() : ?categoria_proveedor {	
		/*
		categoria_proveedor_logic_add::checkcategoria_proveedorToGet($this->categoria_proveedor,$this->datosCliente);
		categoria_proveedor_logic_add::updatecategoria_proveedorToGet($this->categoria_proveedor);
		*/
			
		return $this->categoria_proveedor;
	}
		
	public function setcategoria_proveedor(categoria_proveedor $newcategoria_proveedor) {
		$this->categoria_proveedor = $newcategoria_proveedor;
	}
	
	public function getcategoria_proveedors() : array {		
		/*
		categoria_proveedor_logic_add::checkcategoria_proveedorToGets($this->categoria_proveedors,$this->datosCliente);
		
		foreach ($this->categoria_proveedors as $categoria_proveedorLocal ) {
			categoria_proveedor_logic_add::updatecategoria_proveedorToGet($categoria_proveedorLocal);
		}
		*/
		
		return $this->categoria_proveedors;
	}
	
	public function setcategoria_proveedors(array $newcategoria_proveedors) {
		$this->categoria_proveedors = $newcategoria_proveedors;
	}
	
	public function getcategoria_proveedorDataAccess() : categoria_proveedor_data {
		return $this->categoria_proveedorDataAccess;
	}
	
	public function setcategoria_proveedorDataAccess(categoria_proveedor_data $newcategoria_proveedorDataAccess) {
		$this->categoria_proveedorDataAccess = $newcategoria_proveedorDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        categoria_proveedor_carga::$CONTROLLER;;        
		
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
