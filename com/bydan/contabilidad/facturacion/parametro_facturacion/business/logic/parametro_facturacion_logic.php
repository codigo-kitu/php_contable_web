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

namespace com\bydan\contabilidad\facturacion\parametro_facturacion\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\facturacion\parametro_facturacion\util\parametro_facturacion_carga;
use com\bydan\contabilidad\facturacion\parametro_facturacion\util\parametro_facturacion_param_return;

use com\bydan\contabilidad\facturacion\parametro_facturacion\presentation\session\parametro_facturacion_session;

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

use com\bydan\contabilidad\facturacion\parametro_facturacion\util\parametro_facturacion_util;
use com\bydan\contabilidad\facturacion\parametro_facturacion\business\entity\parametro_facturacion;
use com\bydan\contabilidad\facturacion\parametro_facturacion\business\data\parametro_facturacion_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\data\termino_pago_cliente_data;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\logic\termino_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;

//REL


//REL DETALLES




class parametro_facturacion_logic  extends GeneralEntityLogic implements parametro_facturacion_logicI {	
	/*GENERAL*/
	public parametro_facturacion_data $parametro_facturacionDataAccess;
	//public ?parametro_facturacion_logic_add $parametro_facturacionLogicAdditional=null;
	public ?parametro_facturacion $parametro_facturacion;
	public array $parametro_facturacions;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->parametro_facturacionDataAccess = new parametro_facturacion_data();			
			$this->parametro_facturacions = array();
			$this->parametro_facturacion = new parametro_facturacion();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->parametro_facturacionLogicAdditional = new parametro_facturacion_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->parametro_facturacionLogicAdditional==null) {
		//	$this->parametro_facturacionLogicAdditional=new parametro_facturacion_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->parametro_facturacionDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->parametro_facturacionDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->parametro_facturacionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->parametro_facturacionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->parametro_facturacions = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_facturacions=$this->parametro_facturacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_facturacion_util::refrescarFKDescripciones($this->parametro_facturacions);
			}
			
			//parametro_facturacion_logic_add::checkparametro_facturacionToGets($this->parametro_facturacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_facturacions);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->parametro_facturacions = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_facturacions=$this->parametro_facturacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_facturacion_util::refrescarFKDescripciones($this->parametro_facturacions);
			}
			
			//parametro_facturacion_logic_add::checkparametro_facturacionToGets($this->parametro_facturacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_facturacions);
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
		$this->parametro_facturacion = new parametro_facturacion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->parametro_facturacion=$this->parametro_facturacionDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_facturacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_facturacion_util::refrescarFKDescripcion($this->parametro_facturacion);
			}
						
			//parametro_facturacion_logic_add::checkparametro_facturacionToGet($this->parametro_facturacion,$this->datosCliente);
			//parametro_facturacion_logic_add::updateparametro_facturacionToGet($this->parametro_facturacion);
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
		$this->parametro_facturacion = new  parametro_facturacion();
		  		  
        try {		
			$this->parametro_facturacion=$this->parametro_facturacionDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_facturacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_facturacion_util::refrescarFKDescripcion($this->parametro_facturacion);
			}
			
			//parametro_facturacion_logic_add::checkparametro_facturacionToGet($this->parametro_facturacion,$this->datosCliente);
			//parametro_facturacion_logic_add::updateparametro_facturacionToGet($this->parametro_facturacion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?parametro_facturacion {
		$parametro_facturacionLogic = new  parametro_facturacion_logic();
		  		  
        try {		
			$parametro_facturacionLogic->setConnexion($connexion);			
			$parametro_facturacionLogic->getEntity($id);			
			return $parametro_facturacionLogic->getparametro_facturacion();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->parametro_facturacion = new  parametro_facturacion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->parametro_facturacion=$this->parametro_facturacionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_facturacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_facturacion_util::refrescarFKDescripcion($this->parametro_facturacion);
			}
			
			//parametro_facturacion_logic_add::checkparametro_facturacionToGet($this->parametro_facturacion,$this->datosCliente);
			//parametro_facturacion_logic_add::updateparametro_facturacionToGet($this->parametro_facturacion);
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
		$this->parametro_facturacion = new  parametro_facturacion();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_facturacion=$this->parametro_facturacionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->parametro_facturacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				parametro_facturacion_util::refrescarFKDescripcion($this->parametro_facturacion);
			}
			
			//parametro_facturacion_logic_add::checkparametro_facturacionToGet($this->parametro_facturacion,$this->datosCliente);
			//parametro_facturacion_logic_add::updateparametro_facturacionToGet($this->parametro_facturacion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?parametro_facturacion {
		$parametro_facturacionLogic = new  parametro_facturacion_logic();
		  		  
        try {		
			$parametro_facturacionLogic->setConnexion($connexion);			
			$parametro_facturacionLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $parametro_facturacionLogic->getparametro_facturacion();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->parametro_facturacions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_facturacions=$this->parametro_facturacionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_facturacion_util::refrescarFKDescripciones($this->parametro_facturacions);
			}
			
			//parametro_facturacion_logic_add::checkparametro_facturacionToGets($this->parametro_facturacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_facturacions);			
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
		$this->parametro_facturacions = array();
		  		  
        try {			
			$this->parametro_facturacions=$this->parametro_facturacionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_facturacion_util::refrescarFKDescripciones($this->parametro_facturacions);
			}
			
			//parametro_facturacion_logic_add::checkparametro_facturacionToGets($this->parametro_facturacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_facturacions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->parametro_facturacions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_facturacions=$this->parametro_facturacionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_facturacion_util::refrescarFKDescripciones($this->parametro_facturacions);
			}
			
			//parametro_facturacion_logic_add::checkparametro_facturacionToGets($this->parametro_facturacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_facturacions);
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
		$this->parametro_facturacions = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_facturacions=$this->parametro_facturacionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_facturacion_util::refrescarFKDescripciones($this->parametro_facturacions);
			}
			
			//parametro_facturacion_logic_add::checkparametro_facturacionToGets($this->parametro_facturacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_facturacions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$parametro_facturacionLogic = new  parametro_facturacion_logic();
		  		  
        try {		
			$parametro_facturacionLogic->setConnexion($connexion);			
			$parametro_facturacionLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $parametro_facturacionLogic->getparametro_facturacions();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->parametro_facturacions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_facturacions=$this->parametro_facturacionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_facturacion_util::refrescarFKDescripciones($this->parametro_facturacions);
			}
			
			//parametro_facturacion_logic_add::checkparametro_facturacionToGets($this->parametro_facturacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_facturacions);
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
		$this->parametro_facturacions = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_facturacions=$this->parametro_facturacionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_facturacion_util::refrescarFKDescripciones($this->parametro_facturacions);
			}
			
			//parametro_facturacion_logic_add::checkparametro_facturacionToGets($this->parametro_facturacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_facturacions);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->parametro_facturacions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->parametro_facturacions=$this->parametro_facturacionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_facturacion_util::refrescarFKDescripciones($this->parametro_facturacions);
			}
			
			//parametro_facturacion_logic_add::checkparametro_facturacionToGets($this->parametro_facturacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_facturacions);
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
		$this->parametro_facturacions = array();
		  		  
        try {			
			$this->parametro_facturacions=$this->parametro_facturacionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_facturacion_util::refrescarFKDescripciones($this->parametro_facturacions);
			}	
			
			//parametro_facturacion_logic_add::checkparametro_facturacionToGets($this->parametro_facturacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_facturacions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->parametro_facturacions = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->parametro_facturacions=$this->parametro_facturacionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_facturacion_util::refrescarFKDescripciones($this->parametro_facturacions);
			}
			
			//parametro_facturacion_logic_add::checkparametro_facturacionToGets($this->parametro_facturacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_facturacions);
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
		$this->parametro_facturacions = array();
		  		  
        try {		
			$this->parametro_facturacions=$this->parametro_facturacionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_facturacion_util::refrescarFKDescripciones($this->parametro_facturacions);
			}
			
			//parametro_facturacion_logic_add::checkparametro_facturacionToGets($this->parametro_facturacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->parametro_facturacions);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,parametro_facturacion_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->parametro_facturacions=$this->parametro_facturacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_facturacion_util::refrescarFKDescripciones($this->parametro_facturacions);
			}
			//parametro_facturacion_logic_add::checkparametro_facturacionToGets($this->parametro_facturacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_facturacions);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,parametro_facturacion_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->parametro_facturacions=$this->parametro_facturacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_facturacion_util::refrescarFKDescripciones($this->parametro_facturacions);
			}
			//parametro_facturacion_logic_add::checkparametro_facturacionToGets($this->parametro_facturacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_facturacions);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idtermino_pagoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_termino_pago_cliente) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_termino_pago_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_termino_pago_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_cliente,parametro_facturacion_util::$ID_TERMINO_PAGO_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_cliente);

			$this->parametro_facturacions=$this->parametro_facturacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_facturacion_util::refrescarFKDescripciones($this->parametro_facturacions);
			}
			//parametro_facturacion_logic_add::checkparametro_facturacionToGets($this->parametro_facturacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_facturacions);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtermino_pago(string $strFinalQuery,Pagination $pagination,int $id_termino_pago_cliente) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_termino_pago_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_termino_pago_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_cliente,parametro_facturacion_util::$ID_TERMINO_PAGO_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_cliente);

			$this->parametro_facturacions=$this->parametro_facturacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				parametro_facturacion_util::refrescarFKDescripciones($this->parametro_facturacions);
			}
			//parametro_facturacion_logic_add::checkparametro_facturacionToGets($this->parametro_facturacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->parametro_facturacions);
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
						
			//parametro_facturacion_logic_add::checkparametro_facturacionToSave($this->parametro_facturacion,$this->datosCliente,$this->connexion);	       
			//parametro_facturacion_logic_add::updateparametro_facturacionToSave($this->parametro_facturacion);			
			parametro_facturacion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->parametro_facturacion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->parametro_facturacionLogicAdditional->checkGeneralEntityToSave($this,$this->parametro_facturacion,$this->datosCliente,$this->connexion);
			
			
			parametro_facturacion_data::save($this->parametro_facturacion, $this->connexion);	    	       	 				
			//parametro_facturacion_logic_add::checkparametro_facturacionToSaveAfter($this->parametro_facturacion,$this->datosCliente,$this->connexion);			
			//$this->parametro_facturacionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->parametro_facturacion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->parametro_facturacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->parametro_facturacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				parametro_facturacion_util::refrescarFKDescripcion($this->parametro_facturacion);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->parametro_facturacion->getIsDeleted()) {
				$this->parametro_facturacion=null;
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
						
			/*parametro_facturacion_logic_add::checkparametro_facturacionToSave($this->parametro_facturacion,$this->datosCliente,$this->connexion);*/	        
			//parametro_facturacion_logic_add::updateparametro_facturacionToSave($this->parametro_facturacion);			
			//$this->parametro_facturacionLogicAdditional->checkGeneralEntityToSave($this,$this->parametro_facturacion,$this->datosCliente,$this->connexion);			
			parametro_facturacion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->parametro_facturacion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			parametro_facturacion_data::save($this->parametro_facturacion, $this->connexion);	    	       	 						
			/*parametro_facturacion_logic_add::checkparametro_facturacionToSaveAfter($this->parametro_facturacion,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_facturacionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->parametro_facturacion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->parametro_facturacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->parametro_facturacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				parametro_facturacion_util::refrescarFKDescripcion($this->parametro_facturacion);				
			}
			
			if($this->parametro_facturacion->getIsDeleted()) {
				$this->parametro_facturacion=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(parametro_facturacion $parametro_facturacion,Connexion $connexion)  {
		$parametro_facturacionLogic = new  parametro_facturacion_logic();		  		  
        try {		
			$parametro_facturacionLogic->setConnexion($connexion);			
			$parametro_facturacionLogic->setparametro_facturacion($parametro_facturacion);			
			$parametro_facturacionLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*parametro_facturacion_logic_add::checkparametro_facturacionToSaves($this->parametro_facturacions,$this->datosCliente,$this->connexion);*/	        	
			//$this->parametro_facturacionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->parametro_facturacions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->parametro_facturacions as $parametro_facturacionLocal) {				
								
				//parametro_facturacion_logic_add::updateparametro_facturacionToSave($parametro_facturacionLocal);	        	
				parametro_facturacion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$parametro_facturacionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				parametro_facturacion_data::save($parametro_facturacionLocal, $this->connexion);				
			}
			
			/*parametro_facturacion_logic_add::checkparametro_facturacionToSavesAfter($this->parametro_facturacions,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_facturacionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->parametro_facturacions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_facturacion_util::refrescarFKDescripciones($this->parametro_facturacions);
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
			/*parametro_facturacion_logic_add::checkparametro_facturacionToSaves($this->parametro_facturacions,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_facturacionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->parametro_facturacions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->parametro_facturacions as $parametro_facturacionLocal) {				
								
				//parametro_facturacion_logic_add::updateparametro_facturacionToSave($parametro_facturacionLocal);	        	
				parametro_facturacion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$parametro_facturacionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				parametro_facturacion_data::save($parametro_facturacionLocal, $this->connexion);				
			}			
			
			/*parametro_facturacion_logic_add::checkparametro_facturacionToSavesAfter($this->parametro_facturacions,$this->datosCliente,$this->connexion);*/			
			//$this->parametro_facturacionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->parametro_facturacions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				parametro_facturacion_util::refrescarFKDescripciones($this->parametro_facturacions);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $parametro_facturacions,Connexion $connexion)  {
		$parametro_facturacionLogic = new  parametro_facturacion_logic();
		  		  
        try {		
			$parametro_facturacionLogic->setConnexion($connexion);			
			$parametro_facturacionLogic->setparametro_facturacions($parametro_facturacions);			
			$parametro_facturacionLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$parametro_facturacionsAux=array();
		
		foreach($this->parametro_facturacions as $parametro_facturacion) {
			if($parametro_facturacion->getIsDeleted()==false) {
				$parametro_facturacionsAux[]=$parametro_facturacion;
			}
		}
		
		$this->parametro_facturacions=$parametro_facturacionsAux;
	}
	
	public function updateToGetsAuxiliar(array &$parametro_facturacions) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->parametro_facturacions as $parametro_facturacion) {
				
				$parametro_facturacion->setid_empresa_Descripcion(parametro_facturacion_util::getempresaDescripcion($parametro_facturacion->getempresa()));
				$parametro_facturacion->setid_termino_pago_cliente_Descripcion(parametro_facturacion_util::gettermino_pago_clienteDescripcion($parametro_facturacion->gettermino_pago_cliente()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$parametro_facturacion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$parametro_facturacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$parametro_facturacion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$parametro_facturacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$parametro_facturacion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$parametro_facturacionForeignKey=new parametro_facturacion_param_return();//parametro_facturacionForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$parametro_facturacionForeignKey,$parametro_facturacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_termino_pago_cliente',$strRecargarFkTipos,',')) {
				$this->cargarCombostermino_pago_clientesFK($this->connexion,$strRecargarFkQuery,$parametro_facturacionForeignKey,$parametro_facturacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$parametro_facturacionForeignKey,$parametro_facturacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_termino_pago_cliente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostermino_pago_clientesFK($this->connexion,' where id=-1 ',$parametro_facturacionForeignKey,$parametro_facturacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $parametro_facturacionForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$parametro_facturacionForeignKey,$parametro_facturacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$parametro_facturacionForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($parametro_facturacion_session==null) {
			$parametro_facturacion_session=new parametro_facturacion_session();
		}
		
		if($parametro_facturacion_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($parametro_facturacionForeignKey->idempresaDefaultFK==0) {
					$parametro_facturacionForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$parametro_facturacionForeignKey->empresasFK[$empresaLocal->getId()]=parametro_facturacion_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($parametro_facturacion_session->bigidempresaActual!=null && $parametro_facturacion_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($parametro_facturacion_session->bigidempresaActual);//WithConnection

				$parametro_facturacionForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=parametro_facturacion_util::getempresaDescripcion($empresaLogic->getempresa());
				$parametro_facturacionForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombostermino_pago_clientesFK($connexion=null,$strRecargarFkQuery='',$parametro_facturacionForeignKey,$parametro_facturacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$termino_pago_clienteLogic= new termino_pago_cliente_logic();
		$pagination= new Pagination();
		$parametro_facturacionForeignKey->termino_pago_clientesFK=array();

		$termino_pago_clienteLogic->setConnexion($connexion);
		$termino_pago_clienteLogic->gettermino_pago_clienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($parametro_facturacion_session==null) {
			$parametro_facturacion_session=new parametro_facturacion_session();
		}
		
		if($parametro_facturacion_session->bitBusquedaDesdeFKSesiontermino_pago_cliente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=termino_pago_cliente_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaltermino_pago_cliente=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltermino_pago_cliente=Funciones::GetFinalQueryAppend($finalQueryGlobaltermino_pago_cliente, '');
				$finalQueryGlobaltermino_pago_cliente.=termino_pago_cliente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltermino_pago_cliente.$strRecargarFkQuery;		

				$termino_pago_clienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($termino_pago_clienteLogic->gettermino_pago_clientes() as $termino_pago_clienteLocal ) {
				if($parametro_facturacionForeignKey->idtermino_pago_clienteDefaultFK==0) {
					$parametro_facturacionForeignKey->idtermino_pago_clienteDefaultFK=$termino_pago_clienteLocal->getId();
				}

				$parametro_facturacionForeignKey->termino_pago_clientesFK[$termino_pago_clienteLocal->getId()]=parametro_facturacion_util::gettermino_pago_clienteDescripcion($termino_pago_clienteLocal);
			}

		} else {

			if($parametro_facturacion_session->bigidtermino_pago_clienteActual!=null && $parametro_facturacion_session->bigidtermino_pago_clienteActual > 0) {
				$termino_pago_clienteLogic->getEntity($parametro_facturacion_session->bigidtermino_pago_clienteActual);//WithConnection

				$parametro_facturacionForeignKey->termino_pago_clientesFK[$termino_pago_clienteLogic->gettermino_pago_cliente()->getId()]=parametro_facturacion_util::gettermino_pago_clienteDescripcion($termino_pago_clienteLogic->gettermino_pago_cliente());
				$parametro_facturacionForeignKey->idtermino_pago_clienteDefaultFK=$termino_pago_clienteLogic->gettermino_pago_cliente()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($parametro_facturacion) {
		$this->saveRelacionesBase($parametro_facturacion,true);
	}

	public function saveRelaciones($parametro_facturacion) {
		$this->saveRelacionesBase($parametro_facturacion,false);
	}

	public function saveRelacionesBase($parametro_facturacion,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setparametro_facturacion($parametro_facturacion);

			if(true) {

				//parametro_facturacion_logic_add::updateRelacionesToSave($parametro_facturacion,$this);

				if(($this->parametro_facturacion->getIsNew() || $this->parametro_facturacion->getIsChanged()) && !$this->parametro_facturacion->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->parametro_facturacion->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//parametro_facturacion_logic_add::updateRelacionesToSaveAfter($parametro_facturacion,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $parametro_facturacions,parametro_facturacion_param_return $parametro_facturacionParameterGeneral) : parametro_facturacion_param_return {
		$parametro_facturacionReturnGeneral=new parametro_facturacion_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $parametro_facturacionReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $parametro_facturacions,parametro_facturacion_param_return $parametro_facturacionParameterGeneral) : parametro_facturacion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_facturacionReturnGeneral=new parametro_facturacion_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_facturacionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_facturacions,parametro_facturacion $parametro_facturacion,parametro_facturacion_param_return $parametro_facturacionParameterGeneral,bool $isEsNuevoparametro_facturacion,array $clases) : parametro_facturacion_param_return {
		 try {	
			$parametro_facturacionReturnGeneral=new parametro_facturacion_param_return();
	
			$parametro_facturacionReturnGeneral->setparametro_facturacion($parametro_facturacion);
			$parametro_facturacionReturnGeneral->setparametro_facturacions($parametro_facturacions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$parametro_facturacionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $parametro_facturacionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_facturacions,parametro_facturacion $parametro_facturacion,parametro_facturacion_param_return $parametro_facturacionParameterGeneral,bool $isEsNuevoparametro_facturacion,array $clases) : parametro_facturacion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_facturacionReturnGeneral=new parametro_facturacion_param_return();
	
			$parametro_facturacionReturnGeneral->setparametro_facturacion($parametro_facturacion);
			$parametro_facturacionReturnGeneral->setparametro_facturacions($parametro_facturacions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$parametro_facturacionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_facturacionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_facturacions,parametro_facturacion $parametro_facturacion,parametro_facturacion_param_return $parametro_facturacionParameterGeneral,bool $isEsNuevoparametro_facturacion,array $clases) : parametro_facturacion_param_return {
		 try {	
			$parametro_facturacionReturnGeneral=new parametro_facturacion_param_return();
	
			$parametro_facturacionReturnGeneral->setparametro_facturacion($parametro_facturacion);
			$parametro_facturacionReturnGeneral->setparametro_facturacions($parametro_facturacions);
			
			
			
			return $parametro_facturacionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_facturacions,parametro_facturacion $parametro_facturacion,parametro_facturacion_param_return $parametro_facturacionParameterGeneral,bool $isEsNuevoparametro_facturacion,array $clases) : parametro_facturacion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$parametro_facturacionReturnGeneral=new parametro_facturacion_param_return();
	
			$parametro_facturacionReturnGeneral->setparametro_facturacion($parametro_facturacion);
			$parametro_facturacionReturnGeneral->setparametro_facturacions($parametro_facturacions);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $parametro_facturacionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,parametro_facturacion $parametro_facturacion,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,parametro_facturacion $parametro_facturacion,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		parametro_facturacion_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(parametro_facturacion $parametro_facturacion,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//parametro_facturacion_logic_add::updateparametro_facturacionToGet($this->parametro_facturacion);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$parametro_facturacion->setempresa($this->parametro_facturacionDataAccess->getempresa($this->connexion,$parametro_facturacion));
		$parametro_facturacion->settermino_pago_cliente($this->parametro_facturacionDataAccess->gettermino_pago_cliente($this->connexion,$parametro_facturacion));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$parametro_facturacion->setempresa($this->parametro_facturacionDataAccess->getempresa($this->connexion,$parametro_facturacion));
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				$parametro_facturacion->settermino_pago_cliente($this->parametro_facturacionDataAccess->gettermino_pago_cliente($this->connexion,$parametro_facturacion));
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
			$parametro_facturacion->setempresa($this->parametro_facturacionDataAccess->getempresa($this->connexion,$parametro_facturacion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_facturacion->settermino_pago_cliente($this->parametro_facturacionDataAccess->gettermino_pago_cliente($this->connexion,$parametro_facturacion));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$parametro_facturacion->setempresa($this->parametro_facturacionDataAccess->getempresa($this->connexion,$parametro_facturacion));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($parametro_facturacion->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$parametro_facturacion->settermino_pago_cliente($this->parametro_facturacionDataAccess->gettermino_pago_cliente($this->connexion,$parametro_facturacion));
		$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
		$termino_pago_clienteLogic->deepLoad($parametro_facturacion->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$parametro_facturacion->setempresa($this->parametro_facturacionDataAccess->getempresa($this->connexion,$parametro_facturacion));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($parametro_facturacion->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				$parametro_facturacion->settermino_pago_cliente($this->parametro_facturacionDataAccess->gettermino_pago_cliente($this->connexion,$parametro_facturacion));
				$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
				$termino_pago_clienteLogic->deepLoad($parametro_facturacion->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases);				
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
			$parametro_facturacion->setempresa($this->parametro_facturacionDataAccess->getempresa($this->connexion,$parametro_facturacion));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($parametro_facturacion->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$parametro_facturacion->settermino_pago_cliente($this->parametro_facturacionDataAccess->gettermino_pago_cliente($this->connexion,$parametro_facturacion));
			$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
			$termino_pago_clienteLogic->deepLoad($parametro_facturacion->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(parametro_facturacion $parametro_facturacion,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//parametro_facturacion_logic_add::updateparametro_facturacionToSave($this->parametro_facturacion);			
			
			if(!$paraDeleteCascade) {				
				parametro_facturacion_data::save($parametro_facturacion, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($parametro_facturacion->getempresa(),$this->connexion);
		termino_pago_cliente_data::save($parametro_facturacion->gettermino_pago_cliente(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($parametro_facturacion->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				termino_pago_cliente_data::save($parametro_facturacion->gettermino_pago_cliente(),$this->connexion);
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
			empresa_data::save($parametro_facturacion->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_cliente_data::save($parametro_facturacion->gettermino_pago_cliente(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($parametro_facturacion->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($parametro_facturacion->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		termino_pago_cliente_data::save($parametro_facturacion->gettermino_pago_cliente(),$this->connexion);
		$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
		$termino_pago_clienteLogic->deepSave($parametro_facturacion->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($parametro_facturacion->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($parametro_facturacion->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				termino_pago_cliente_data::save($parametro_facturacion->gettermino_pago_cliente(),$this->connexion);
				$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
				$termino_pago_clienteLogic->deepSave($parametro_facturacion->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
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
			empresa_data::save($parametro_facturacion->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($parametro_facturacion->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_cliente_data::save($parametro_facturacion->gettermino_pago_cliente(),$this->connexion);
			$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
			$termino_pago_clienteLogic->deepSave($parametro_facturacion->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				parametro_facturacion_data::save($parametro_facturacion, $this->connexion);
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
			
			$this->deepLoad($this->parametro_facturacion,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->parametro_facturacions as $parametro_facturacion) {
				$this->deepLoad($parametro_facturacion,$isDeep,$deepLoadType,$clases);
								
				parametro_facturacion_util::refrescarFKDescripciones($this->parametro_facturacions);
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
			
			foreach($this->parametro_facturacions as $parametro_facturacion) {
				$this->deepLoad($parametro_facturacion,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->parametro_facturacion,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->parametro_facturacions as $parametro_facturacion) {
				$this->deepSave($parametro_facturacion,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->parametro_facturacions as $parametro_facturacion) {
				$this->deepSave($parametro_facturacion,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(termino_pago_cliente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==termino_pago_cliente::$class) {
						$classes[]=new Classe(termino_pago_cliente::$class);
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
					if($clas->clas==termino_pago_cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(termino_pago_cliente::$class);
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
	
	
	
	
	
	
	
	public function getparametro_facturacion() : ?parametro_facturacion {	
		/*
		parametro_facturacion_logic_add::checkparametro_facturacionToGet($this->parametro_facturacion,$this->datosCliente);
		parametro_facturacion_logic_add::updateparametro_facturacionToGet($this->parametro_facturacion);
		*/
			
		return $this->parametro_facturacion;
	}
		
	public function setparametro_facturacion(parametro_facturacion $newparametro_facturacion) {
		$this->parametro_facturacion = $newparametro_facturacion;
	}
	
	public function getparametro_facturacions() : array {		
		/*
		parametro_facturacion_logic_add::checkparametro_facturacionToGets($this->parametro_facturacions,$this->datosCliente);
		
		foreach ($this->parametro_facturacions as $parametro_facturacionLocal ) {
			parametro_facturacion_logic_add::updateparametro_facturacionToGet($parametro_facturacionLocal);
		}
		*/
		
		return $this->parametro_facturacions;
	}
	
	public function setparametro_facturacions(array $newparametro_facturacions) {
		$this->parametro_facturacions = $newparametro_facturacions;
	}
	
	public function getparametro_facturacionDataAccess() : parametro_facturacion_data {
		return $this->parametro_facturacionDataAccess;
	}
	
	public function setparametro_facturacionDataAccess(parametro_facturacion_data $newparametro_facturacionDataAccess) {
		$this->parametro_facturacionDataAccess = $newparametro_facturacionDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        parametro_facturacion_carga::$CONTROLLER;;        
		
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
