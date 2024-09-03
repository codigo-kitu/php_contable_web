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

namespace com\bydan\contabilidad\cuentascobrar\categoria_cliente\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentascobrar\categoria_cliente\util\categoria_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\categoria_cliente\util\categoria_cliente_param_return;


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

use com\bydan\contabilidad\cuentascobrar\categoria_cliente\util\categoria_cliente_util;
use com\bydan\contabilidad\cuentascobrar\categoria_cliente\business\entity\categoria_cliente;
use com\bydan\contabilidad\cuentascobrar\categoria_cliente\business\data\categoria_cliente_data;

//FK


//REL


use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

//REL DETALLES




class categoria_cliente_logic  extends GeneralEntityLogic implements categoria_cliente_logicI {	
	/*GENERAL*/
	public categoria_cliente_data $categoria_clienteDataAccess;
	//public ?categoria_cliente_logic_add $categoria_clienteLogicAdditional=null;
	public ?categoria_cliente $categoria_cliente;
	public array $categoria_clientes;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->categoria_clienteDataAccess = new categoria_cliente_data();			
			$this->categoria_clientes = array();
			$this->categoria_cliente = new categoria_cliente();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->categoria_clienteLogicAdditional = new categoria_cliente_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->categoria_clienteLogicAdditional==null) {
		//	$this->categoria_clienteLogicAdditional=new categoria_cliente_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->categoria_clienteDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->categoria_clienteDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->categoria_clienteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->categoria_clienteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->categoria_clientes = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_clientes=$this->categoria_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cliente_util::refrescarFKDescripciones($this->categoria_clientes);
			}
			
			//categoria_cliente_logic_add::checkcategoria_clienteToGets($this->categoria_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_clientes);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->categoria_clientes = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_clientes=$this->categoria_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cliente_util::refrescarFKDescripciones($this->categoria_clientes);
			}
			
			//categoria_cliente_logic_add::checkcategoria_clienteToGets($this->categoria_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_clientes);
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
		$this->categoria_cliente = new categoria_cliente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->categoria_cliente=$this->categoria_clienteDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->categoria_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				categoria_cliente_util::refrescarFKDescripcion($this->categoria_cliente);
			}
						
			//categoria_cliente_logic_add::checkcategoria_clienteToGet($this->categoria_cliente,$this->datosCliente);
			//categoria_cliente_logic_add::updatecategoria_clienteToGet($this->categoria_cliente);
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
		$this->categoria_cliente = new  categoria_cliente();
		  		  
        try {		
			$this->categoria_cliente=$this->categoria_clienteDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->categoria_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				categoria_cliente_util::refrescarFKDescripcion($this->categoria_cliente);
			}
			
			//categoria_cliente_logic_add::checkcategoria_clienteToGet($this->categoria_cliente,$this->datosCliente);
			//categoria_cliente_logic_add::updatecategoria_clienteToGet($this->categoria_cliente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?categoria_cliente {
		$categoria_clienteLogic = new  categoria_cliente_logic();
		  		  
        try {		
			$categoria_clienteLogic->setConnexion($connexion);			
			$categoria_clienteLogic->getEntity($id);			
			return $categoria_clienteLogic->getcategoria_cliente();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->categoria_cliente = new  categoria_cliente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->categoria_cliente=$this->categoria_clienteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->categoria_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				categoria_cliente_util::refrescarFKDescripcion($this->categoria_cliente);
			}
			
			//categoria_cliente_logic_add::checkcategoria_clienteToGet($this->categoria_cliente,$this->datosCliente);
			//categoria_cliente_logic_add::updatecategoria_clienteToGet($this->categoria_cliente);
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
		$this->categoria_cliente = new  categoria_cliente();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_cliente=$this->categoria_clienteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->categoria_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				categoria_cliente_util::refrescarFKDescripcion($this->categoria_cliente);
			}
			
			//categoria_cliente_logic_add::checkcategoria_clienteToGet($this->categoria_cliente,$this->datosCliente);
			//categoria_cliente_logic_add::updatecategoria_clienteToGet($this->categoria_cliente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?categoria_cliente {
		$categoria_clienteLogic = new  categoria_cliente_logic();
		  		  
        try {		
			$categoria_clienteLogic->setConnexion($connexion);			
			$categoria_clienteLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $categoria_clienteLogic->getcategoria_cliente();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->categoria_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->categoria_clientes=$this->categoria_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cliente_util::refrescarFKDescripciones($this->categoria_clientes);
			}
			
			//categoria_cliente_logic_add::checkcategoria_clienteToGets($this->categoria_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_clientes);			
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
		$this->categoria_clientes = array();
		  		  
        try {			
			$this->categoria_clientes=$this->categoria_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cliente_util::refrescarFKDescripciones($this->categoria_clientes);
			}
			
			//categoria_cliente_logic_add::checkcategoria_clienteToGets($this->categoria_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->categoria_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_clientes=$this->categoria_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cliente_util::refrescarFKDescripciones($this->categoria_clientes);
			}
			
			//categoria_cliente_logic_add::checkcategoria_clienteToGets($this->categoria_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_clientes);
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
		$this->categoria_clientes = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_clientes=$this->categoria_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cliente_util::refrescarFKDescripciones($this->categoria_clientes);
			}
			
			//categoria_cliente_logic_add::checkcategoria_clienteToGets($this->categoria_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$categoria_clienteLogic = new  categoria_cliente_logic();
		  		  
        try {		
			$categoria_clienteLogic->setConnexion($connexion);			
			$categoria_clienteLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $categoria_clienteLogic->getcategoria_clientes();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->categoria_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->categoria_clientes=$this->categoria_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cliente_util::refrescarFKDescripciones($this->categoria_clientes);
			}
			
			//categoria_cliente_logic_add::checkcategoria_clienteToGets($this->categoria_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_clientes);
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
		$this->categoria_clientes = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_clientes=$this->categoria_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cliente_util::refrescarFKDescripciones($this->categoria_clientes);
			}
			
			//categoria_cliente_logic_add::checkcategoria_clienteToGets($this->categoria_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_clientes);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->categoria_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->categoria_clientes=$this->categoria_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cliente_util::refrescarFKDescripciones($this->categoria_clientes);
			}
			
			//categoria_cliente_logic_add::checkcategoria_clienteToGets($this->categoria_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_clientes);
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
		$this->categoria_clientes = array();
		  		  
        try {			
			$this->categoria_clientes=$this->categoria_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cliente_util::refrescarFKDescripciones($this->categoria_clientes);
			}	
			
			//categoria_cliente_logic_add::checkcategoria_clienteToGets($this->categoria_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->categoria_clientes = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->categoria_clientes=$this->categoria_clienteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cliente_util::refrescarFKDescripciones($this->categoria_clientes);
			}
			
			//categoria_cliente_logic_add::checkcategoria_clienteToGets($this->categoria_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_clientes);
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
		$this->categoria_clientes = array();
		  		  
        try {		
			$this->categoria_clientes=$this->categoria_clienteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cliente_util::refrescarFKDescripciones($this->categoria_clientes);
			}
			
			//categoria_cliente_logic_add::checkcategoria_clienteToGets($this->categoria_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->categoria_clientes);

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
						
			//categoria_cliente_logic_add::checkcategoria_clienteToSave($this->categoria_cliente,$this->datosCliente,$this->connexion);	       
			//categoria_cliente_logic_add::updatecategoria_clienteToSave($this->categoria_cliente);			
			categoria_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->categoria_cliente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->categoria_clienteLogicAdditional->checkGeneralEntityToSave($this,$this->categoria_cliente,$this->datosCliente,$this->connexion);
			
			
			categoria_cliente_data::save($this->categoria_cliente, $this->connexion);	    	       	 				
			//categoria_cliente_logic_add::checkcategoria_clienteToSaveAfter($this->categoria_cliente,$this->datosCliente,$this->connexion);			
			//$this->categoria_clienteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->categoria_cliente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->categoria_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->categoria_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				categoria_cliente_util::refrescarFKDescripcion($this->categoria_cliente);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->categoria_cliente->getIsDeleted()) {
				$this->categoria_cliente=null;
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
						
			/*categoria_cliente_logic_add::checkcategoria_clienteToSave($this->categoria_cliente,$this->datosCliente,$this->connexion);*/	        
			//categoria_cliente_logic_add::updatecategoria_clienteToSave($this->categoria_cliente);			
			//$this->categoria_clienteLogicAdditional->checkGeneralEntityToSave($this,$this->categoria_cliente,$this->datosCliente,$this->connexion);			
			categoria_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->categoria_cliente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			categoria_cliente_data::save($this->categoria_cliente, $this->connexion);	    	       	 						
			/*categoria_cliente_logic_add::checkcategoria_clienteToSaveAfter($this->categoria_cliente,$this->datosCliente,$this->connexion);*/			
			//$this->categoria_clienteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->categoria_cliente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->categoria_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->categoria_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				categoria_cliente_util::refrescarFKDescripcion($this->categoria_cliente);				
			}
			
			if($this->categoria_cliente->getIsDeleted()) {
				$this->categoria_cliente=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(categoria_cliente $categoria_cliente,Connexion $connexion)  {
		$categoria_clienteLogic = new  categoria_cliente_logic();		  		  
        try {		
			$categoria_clienteLogic->setConnexion($connexion);			
			$categoria_clienteLogic->setcategoria_cliente($categoria_cliente);			
			$categoria_clienteLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*categoria_cliente_logic_add::checkcategoria_clienteToSaves($this->categoria_clientes,$this->datosCliente,$this->connexion);*/	        	
			//$this->categoria_clienteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->categoria_clientes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->categoria_clientes as $categoria_clienteLocal) {				
								
				//categoria_cliente_logic_add::updatecategoria_clienteToSave($categoria_clienteLocal);	        	
				categoria_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$categoria_clienteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				categoria_cliente_data::save($categoria_clienteLocal, $this->connexion);				
			}
			
			/*categoria_cliente_logic_add::checkcategoria_clienteToSavesAfter($this->categoria_clientes,$this->datosCliente,$this->connexion);*/			
			//$this->categoria_clienteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->categoria_clientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cliente_util::refrescarFKDescripciones($this->categoria_clientes);
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
			/*categoria_cliente_logic_add::checkcategoria_clienteToSaves($this->categoria_clientes,$this->datosCliente,$this->connexion);*/			
			//$this->categoria_clienteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->categoria_clientes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->categoria_clientes as $categoria_clienteLocal) {				
								
				//categoria_cliente_logic_add::updatecategoria_clienteToSave($categoria_clienteLocal);	        	
				categoria_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$categoria_clienteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				categoria_cliente_data::save($categoria_clienteLocal, $this->connexion);				
			}			
			
			/*categoria_cliente_logic_add::checkcategoria_clienteToSavesAfter($this->categoria_clientes,$this->datosCliente,$this->connexion);*/			
			//$this->categoria_clienteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->categoria_clientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				categoria_cliente_util::refrescarFKDescripciones($this->categoria_clientes);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $categoria_clientes,Connexion $connexion)  {
		$categoria_clienteLogic = new  categoria_cliente_logic();
		  		  
        try {		
			$categoria_clienteLogic->setConnexion($connexion);			
			$categoria_clienteLogic->setcategoria_clientes($categoria_clientes);			
			$categoria_clienteLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$categoria_clientesAux=array();
		
		foreach($this->categoria_clientes as $categoria_cliente) {
			if($categoria_cliente->getIsDeleted()==false) {
				$categoria_clientesAux[]=$categoria_cliente;
			}
		}
		
		$this->categoria_clientes=$categoria_clientesAux;
	}
	
	public function updateToGetsAuxiliar(array &$categoria_clientes) {
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
	
	
	
	public function saveRelacionesWithConnection($categoria_cliente,$clientes) {
		$this->saveRelacionesBase($categoria_cliente,$clientes,true);
	}

	public function saveRelaciones($categoria_cliente,$clientes) {
		$this->saveRelacionesBase($categoria_cliente,$clientes,false);
	}

	public function saveRelacionesBase($categoria_cliente,$clientes=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$categoria_cliente->setclientes($clientes);
			$this->setcategoria_cliente($categoria_cliente);

			if(true) {

				//categoria_cliente_logic_add::updateRelacionesToSave($categoria_cliente,$this);

				if(($this->categoria_cliente->getIsNew() || $this->categoria_cliente->getIsChanged()) && !$this->categoria_cliente->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($clientes);

				} else if($this->categoria_cliente->getIsDeleted()) {
					$this->saveRelacionesDetalles($clientes);
					$this->save();
				}

				//categoria_cliente_logic_add::updateRelacionesToSaveAfter($categoria_cliente,$this);

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
	
	
	public function saveRelacionesDetalles($clientes=array()) {
		try {
	

			$idcategoria_clienteActual=$this->getcategoria_cliente()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/cliente_carga.php');
			cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$clienteLogic_Desde_categoria_cliente=new cliente_logic();
			$clienteLogic_Desde_categoria_cliente->setclientes($clientes);

			$clienteLogic_Desde_categoria_cliente->setConnexion($this->getConnexion());
			$clienteLogic_Desde_categoria_cliente->setDatosCliente($this->datosCliente);

			foreach($clienteLogic_Desde_categoria_cliente->getclientes() as $cliente_Desde_categoria_cliente) {
				$cliente_Desde_categoria_cliente->setid_categoria_cliente($idcategoria_clienteActual);

				$clienteLogic_Desde_categoria_cliente->setcliente($cliente_Desde_categoria_cliente);
				$clienteLogic_Desde_categoria_cliente->save();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $categoria_clientes,categoria_cliente_param_return $categoria_clienteParameterGeneral) : categoria_cliente_param_return {
		$categoria_clienteReturnGeneral=new categoria_cliente_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $categoria_clienteReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $categoria_clientes,categoria_cliente_param_return $categoria_clienteParameterGeneral) : categoria_cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$categoria_clienteReturnGeneral=new categoria_cliente_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $categoria_clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $categoria_clientes,categoria_cliente $categoria_cliente,categoria_cliente_param_return $categoria_clienteParameterGeneral,bool $isEsNuevocategoria_cliente,array $clases) : categoria_cliente_param_return {
		 try {	
			$categoria_clienteReturnGeneral=new categoria_cliente_param_return();
	
			$categoria_clienteReturnGeneral->setcategoria_cliente($categoria_cliente);
			$categoria_clienteReturnGeneral->setcategoria_clientes($categoria_clientes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$categoria_clienteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $categoria_clienteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $categoria_clientes,categoria_cliente $categoria_cliente,categoria_cliente_param_return $categoria_clienteParameterGeneral,bool $isEsNuevocategoria_cliente,array $clases) : categoria_cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$categoria_clienteReturnGeneral=new categoria_cliente_param_return();
	
			$categoria_clienteReturnGeneral->setcategoria_cliente($categoria_cliente);
			$categoria_clienteReturnGeneral->setcategoria_clientes($categoria_clientes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$categoria_clienteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $categoria_clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $categoria_clientes,categoria_cliente $categoria_cliente,categoria_cliente_param_return $categoria_clienteParameterGeneral,bool $isEsNuevocategoria_cliente,array $clases) : categoria_cliente_param_return {
		 try {	
			$categoria_clienteReturnGeneral=new categoria_cliente_param_return();
	
			$categoria_clienteReturnGeneral->setcategoria_cliente($categoria_cliente);
			$categoria_clienteReturnGeneral->setcategoria_clientes($categoria_clientes);
			
			
			
			return $categoria_clienteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $categoria_clientes,categoria_cliente $categoria_cliente,categoria_cliente_param_return $categoria_clienteParameterGeneral,bool $isEsNuevocategoria_cliente,array $clases) : categoria_cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$categoria_clienteReturnGeneral=new categoria_cliente_param_return();
	
			$categoria_clienteReturnGeneral->setcategoria_cliente($categoria_cliente);
			$categoria_clienteReturnGeneral->setcategoria_clientes($categoria_clientes);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $categoria_clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,categoria_cliente $categoria_cliente,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,categoria_cliente $categoria_cliente,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		categoria_cliente_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(categoria_cliente $categoria_cliente,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//categoria_cliente_logic_add::updatecategoria_clienteToGet($this->categoria_cliente);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$categoria_cliente->setclientes($this->categoria_clienteDataAccess->getclientes($this->connexion,$categoria_cliente));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$categoria_cliente->setclientes($this->categoria_clienteDataAccess->getclientes($this->connexion,$categoria_cliente));

				if($this->isConDeep) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->setclientes($categoria_cliente->getclientes());
					$classesLocal=cliente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$clienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cliente_util::refrescarFKDescripciones($clienteLogic->getclientes());
					$categoria_cliente->setclientes($clienteLogic->getclientes());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cliente::$class);
			$categoria_cliente->setclientes($this->categoria_clienteDataAccess->getclientes($this->connexion,$categoria_cliente));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {


		$categoria_cliente->setclientes($this->categoria_clienteDataAccess->getclientes($this->connexion,$categoria_cliente));

		foreach($categoria_cliente->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$categoria_cliente->setclientes($this->categoria_clienteDataAccess->getclientes($this->connexion,$categoria_cliente));

				foreach($categoria_cliente->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cliente::$class);
			$categoria_cliente->setclientes($this->categoria_clienteDataAccess->getclientes($this->connexion,$categoria_cliente));

			foreach($categoria_cliente->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(categoria_cliente $categoria_cliente,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//categoria_cliente_logic_add::updatecategoria_clienteToSave($this->categoria_cliente);			
			
			if(!$paraDeleteCascade) {				
				categoria_cliente_data::save($categoria_cliente, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($categoria_cliente->getclientes() as $cliente) {
			$cliente->setid_categoria_cliente($categoria_cliente->getId());
			cliente_data::save($cliente,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($categoria_cliente->getclientes() as $cliente) {
					$cliente->setid_categoria_cliente($categoria_cliente->getId());
					cliente_data::save($cliente,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cliente::$class);

			foreach($categoria_cliente->getclientes() as $cliente) {
				$cliente->setid_categoria_cliente($categoria_cliente->getId());
				cliente_data::save($cliente,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($categoria_cliente->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$cliente->setid_categoria_cliente($categoria_cliente->getId());
			cliente_data::save($cliente,$this->connexion);
			$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($categoria_cliente->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$cliente->setid_categoria_cliente($categoria_cliente->getId());
					cliente_data::save($cliente,$this->connexion);
					$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {



		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cliente::$class);

			foreach($categoria_cliente->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$cliente->setid_categoria_cliente($categoria_cliente->getId());
				cliente_data::save($cliente,$this->connexion);
				$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				categoria_cliente_data::save($categoria_cliente, $this->connexion);
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
			
			$this->deepLoad($this->categoria_cliente,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->categoria_clientes as $categoria_cliente) {
				$this->deepLoad($categoria_cliente,$isDeep,$deepLoadType,$clases);
								
				categoria_cliente_util::refrescarFKDescripciones($this->categoria_clientes);
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
			
			foreach($this->categoria_clientes as $categoria_cliente) {
				$this->deepLoad($categoria_cliente,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->categoria_cliente,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->categoria_clientes as $categoria_cliente) {
				$this->deepSave($categoria_cliente,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->categoria_clientes as $categoria_cliente) {
				$this->deepSave($categoria_cliente,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(cliente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==cliente::$class) {
						$classes[]=new Classe(cliente::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cliente::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getcategoria_cliente() : ?categoria_cliente {	
		/*
		categoria_cliente_logic_add::checkcategoria_clienteToGet($this->categoria_cliente,$this->datosCliente);
		categoria_cliente_logic_add::updatecategoria_clienteToGet($this->categoria_cliente);
		*/
			
		return $this->categoria_cliente;
	}
		
	public function setcategoria_cliente(categoria_cliente $newcategoria_cliente) {
		$this->categoria_cliente = $newcategoria_cliente;
	}
	
	public function getcategoria_clientes() : array {		
		/*
		categoria_cliente_logic_add::checkcategoria_clienteToGets($this->categoria_clientes,$this->datosCliente);
		
		foreach ($this->categoria_clientes as $categoria_clienteLocal ) {
			categoria_cliente_logic_add::updatecategoria_clienteToGet($categoria_clienteLocal);
		}
		*/
		
		return $this->categoria_clientes;
	}
	
	public function setcategoria_clientes(array $newcategoria_clientes) {
		$this->categoria_clientes = $newcategoria_clientes;
	}
	
	public function getcategoria_clienteDataAccess() : categoria_cliente_data {
		return $this->categoria_clienteDataAccess;
	}
	
	public function setcategoria_clienteDataAccess(categoria_cliente_data $newcategoria_clienteDataAccess) {
		$this->categoria_clienteDataAccess = $newcategoria_clienteDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        categoria_cliente_carga::$CONTROLLER;;        
		
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
