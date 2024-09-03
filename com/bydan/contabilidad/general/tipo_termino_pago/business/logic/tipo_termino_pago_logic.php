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

namespace com\bydan\contabilidad\general\tipo_termino_pago\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\general\tipo_termino_pago\util\tipo_termino_pago_carga;
use com\bydan\contabilidad\general\tipo_termino_pago\util\tipo_termino_pago_param_return;


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

use com\bydan\contabilidad\general\tipo_termino_pago\util\tipo_termino_pago_util;
use com\bydan\contabilidad\general\tipo_termino_pago\business\entity\tipo_termino_pago;
use com\bydan\contabilidad\general\tipo_termino_pago\business\data\tipo_termino_pago_data;

//FK


//REL


use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\data\termino_pago_cliente_data;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\logic\termino_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\data\termino_pago_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\logic\termino_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;

//REL DETALLES




class tipo_termino_pago_logic  extends GeneralEntityLogic implements tipo_termino_pago_logicI {	
	/*GENERAL*/
	public tipo_termino_pago_data $tipo_termino_pagoDataAccess;
	//public ?tipo_termino_pago_logic_add $tipo_termino_pagoLogicAdditional=null;
	public ?tipo_termino_pago $tipo_termino_pago;
	public array $tipo_termino_pagos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->tipo_termino_pagoDataAccess = new tipo_termino_pago_data();			
			$this->tipo_termino_pagos = array();
			$this->tipo_termino_pago = new tipo_termino_pago();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->tipo_termino_pagoLogicAdditional = new tipo_termino_pago_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->tipo_termino_pagoLogicAdditional==null) {
		//	$this->tipo_termino_pagoLogicAdditional=new tipo_termino_pago_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->tipo_termino_pagoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->tipo_termino_pagoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->tipo_termino_pagoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->tipo_termino_pagoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->tipo_termino_pagos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_termino_pagos=$this->tipo_termino_pagoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_termino_pago_util::refrescarFKDescripciones($this->tipo_termino_pagos);
			}
			
			//tipo_termino_pago_logic_add::checktipo_termino_pagoToGets($this->tipo_termino_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_termino_pagos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->tipo_termino_pagos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_termino_pagos=$this->tipo_termino_pagoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_termino_pago_util::refrescarFKDescripciones($this->tipo_termino_pagos);
			}
			
			//tipo_termino_pago_logic_add::checktipo_termino_pagoToGets($this->tipo_termino_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_termino_pagos);
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
		$this->tipo_termino_pago = new tipo_termino_pago();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->tipo_termino_pago=$this->tipo_termino_pagoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_termino_pago,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_termino_pago_util::refrescarFKDescripcion($this->tipo_termino_pago);
			}
						
			//tipo_termino_pago_logic_add::checktipo_termino_pagoToGet($this->tipo_termino_pago,$this->datosCliente);
			//tipo_termino_pago_logic_add::updatetipo_termino_pagoToGet($this->tipo_termino_pago);
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
		$this->tipo_termino_pago = new  tipo_termino_pago();
		  		  
        try {		
			$this->tipo_termino_pago=$this->tipo_termino_pagoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_termino_pago,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_termino_pago_util::refrescarFKDescripcion($this->tipo_termino_pago);
			}
			
			//tipo_termino_pago_logic_add::checktipo_termino_pagoToGet($this->tipo_termino_pago,$this->datosCliente);
			//tipo_termino_pago_logic_add::updatetipo_termino_pagoToGet($this->tipo_termino_pago);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?tipo_termino_pago {
		$tipo_termino_pagoLogic = new  tipo_termino_pago_logic();
		  		  
        try {		
			$tipo_termino_pagoLogic->setConnexion($connexion);			
			$tipo_termino_pagoLogic->getEntity($id);			
			return $tipo_termino_pagoLogic->gettipo_termino_pago();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->tipo_termino_pago = new  tipo_termino_pago();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->tipo_termino_pago=$this->tipo_termino_pagoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_termino_pago,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_termino_pago_util::refrescarFKDescripcion($this->tipo_termino_pago);
			}
			
			//tipo_termino_pago_logic_add::checktipo_termino_pagoToGet($this->tipo_termino_pago,$this->datosCliente);
			//tipo_termino_pago_logic_add::updatetipo_termino_pagoToGet($this->tipo_termino_pago);
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
		$this->tipo_termino_pago = new  tipo_termino_pago();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_termino_pago=$this->tipo_termino_pagoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_termino_pago,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_termino_pago_util::refrescarFKDescripcion($this->tipo_termino_pago);
			}
			
			//tipo_termino_pago_logic_add::checktipo_termino_pagoToGet($this->tipo_termino_pago,$this->datosCliente);
			//tipo_termino_pago_logic_add::updatetipo_termino_pagoToGet($this->tipo_termino_pago);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?tipo_termino_pago {
		$tipo_termino_pagoLogic = new  tipo_termino_pago_logic();
		  		  
        try {		
			$tipo_termino_pagoLogic->setConnexion($connexion);			
			$tipo_termino_pagoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $tipo_termino_pagoLogic->gettipo_termino_pago();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tipo_termino_pagos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_termino_pagos=$this->tipo_termino_pagoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_termino_pago_util::refrescarFKDescripciones($this->tipo_termino_pagos);
			}
			
			//tipo_termino_pago_logic_add::checktipo_termino_pagoToGets($this->tipo_termino_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_termino_pagos);			
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
		$this->tipo_termino_pagos = array();
		  		  
        try {			
			$this->tipo_termino_pagos=$this->tipo_termino_pagoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_termino_pago_util::refrescarFKDescripciones($this->tipo_termino_pagos);
			}
			
			//tipo_termino_pago_logic_add::checktipo_termino_pagoToGets($this->tipo_termino_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_termino_pagos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->tipo_termino_pagos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_termino_pagos=$this->tipo_termino_pagoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_termino_pago_util::refrescarFKDescripciones($this->tipo_termino_pagos);
			}
			
			//tipo_termino_pago_logic_add::checktipo_termino_pagoToGets($this->tipo_termino_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_termino_pagos);
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
		$this->tipo_termino_pagos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_termino_pagos=$this->tipo_termino_pagoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_termino_pago_util::refrescarFKDescripciones($this->tipo_termino_pagos);
			}
			
			//tipo_termino_pago_logic_add::checktipo_termino_pagoToGets($this->tipo_termino_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_termino_pagos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$tipo_termino_pagoLogic = new  tipo_termino_pago_logic();
		  		  
        try {		
			$tipo_termino_pagoLogic->setConnexion($connexion);			
			$tipo_termino_pagoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $tipo_termino_pagoLogic->gettipo_termino_pagos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->tipo_termino_pagos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_termino_pagos=$this->tipo_termino_pagoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_termino_pago_util::refrescarFKDescripciones($this->tipo_termino_pagos);
			}
			
			//tipo_termino_pago_logic_add::checktipo_termino_pagoToGets($this->tipo_termino_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_termino_pagos);
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
		$this->tipo_termino_pagos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_termino_pagos=$this->tipo_termino_pagoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_termino_pago_util::refrescarFKDescripciones($this->tipo_termino_pagos);
			}
			
			//tipo_termino_pago_logic_add::checktipo_termino_pagoToGets($this->tipo_termino_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_termino_pagos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->tipo_termino_pagos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_termino_pagos=$this->tipo_termino_pagoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_termino_pago_util::refrescarFKDescripciones($this->tipo_termino_pagos);
			}
			
			//tipo_termino_pago_logic_add::checktipo_termino_pagoToGets($this->tipo_termino_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_termino_pagos);
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
		$this->tipo_termino_pagos = array();
		  		  
        try {			
			$this->tipo_termino_pagos=$this->tipo_termino_pagoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_termino_pago_util::refrescarFKDescripciones($this->tipo_termino_pagos);
			}	
			
			//tipo_termino_pago_logic_add::checktipo_termino_pagoToGets($this->tipo_termino_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_termino_pagos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tipo_termino_pagos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_termino_pagos=$this->tipo_termino_pagoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_termino_pago_util::refrescarFKDescripciones($this->tipo_termino_pagos);
			}
			
			//tipo_termino_pago_logic_add::checktipo_termino_pagoToGets($this->tipo_termino_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_termino_pagos);
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
		$this->tipo_termino_pagos = array();
		  		  
        try {		
			$this->tipo_termino_pagos=$this->tipo_termino_pagoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_termino_pago_util::refrescarFKDescripciones($this->tipo_termino_pagos);
			}
			
			//tipo_termino_pago_logic_add::checktipo_termino_pagoToGets($this->tipo_termino_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_termino_pagos);

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
						
			//tipo_termino_pago_logic_add::checktipo_termino_pagoToSave($this->tipo_termino_pago,$this->datosCliente,$this->connexion);	       
			//tipo_termino_pago_logic_add::updatetipo_termino_pagoToSave($this->tipo_termino_pago);			
			tipo_termino_pago_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tipo_termino_pago,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->tipo_termino_pagoLogicAdditional->checkGeneralEntityToSave($this,$this->tipo_termino_pago,$this->datosCliente,$this->connexion);
			
			
			tipo_termino_pago_data::save($this->tipo_termino_pago, $this->connexion);	    	       	 				
			//tipo_termino_pago_logic_add::checktipo_termino_pagoToSaveAfter($this->tipo_termino_pago,$this->datosCliente,$this->connexion);			
			//$this->tipo_termino_pagoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tipo_termino_pago,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tipo_termino_pago,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tipo_termino_pago,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tipo_termino_pago_util::refrescarFKDescripcion($this->tipo_termino_pago);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->tipo_termino_pago->getIsDeleted()) {
				$this->tipo_termino_pago=null;
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
						
			/*tipo_termino_pago_logic_add::checktipo_termino_pagoToSave($this->tipo_termino_pago,$this->datosCliente,$this->connexion);*/	        
			//tipo_termino_pago_logic_add::updatetipo_termino_pagoToSave($this->tipo_termino_pago);			
			//$this->tipo_termino_pagoLogicAdditional->checkGeneralEntityToSave($this,$this->tipo_termino_pago,$this->datosCliente,$this->connexion);			
			tipo_termino_pago_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tipo_termino_pago,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			tipo_termino_pago_data::save($this->tipo_termino_pago, $this->connexion);	    	       	 						
			/*tipo_termino_pago_logic_add::checktipo_termino_pagoToSaveAfter($this->tipo_termino_pago,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_termino_pagoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tipo_termino_pago,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tipo_termino_pago,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tipo_termino_pago,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tipo_termino_pago_util::refrescarFKDescripcion($this->tipo_termino_pago);				
			}
			
			if($this->tipo_termino_pago->getIsDeleted()) {
				$this->tipo_termino_pago=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(tipo_termino_pago $tipo_termino_pago,Connexion $connexion)  {
		$tipo_termino_pagoLogic = new  tipo_termino_pago_logic();		  		  
        try {		
			$tipo_termino_pagoLogic->setConnexion($connexion);			
			$tipo_termino_pagoLogic->settipo_termino_pago($tipo_termino_pago);			
			$tipo_termino_pagoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*tipo_termino_pago_logic_add::checktipo_termino_pagoToSaves($this->tipo_termino_pagos,$this->datosCliente,$this->connexion);*/	        	
			//$this->tipo_termino_pagoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tipo_termino_pagos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tipo_termino_pagos as $tipo_termino_pagoLocal) {				
								
				//tipo_termino_pago_logic_add::updatetipo_termino_pagoToSave($tipo_termino_pagoLocal);	        	
				tipo_termino_pago_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tipo_termino_pagoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				tipo_termino_pago_data::save($tipo_termino_pagoLocal, $this->connexion);				
			}
			
			/*tipo_termino_pago_logic_add::checktipo_termino_pagoToSavesAfter($this->tipo_termino_pagos,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_termino_pagoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tipo_termino_pagos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_termino_pago_util::refrescarFKDescripciones($this->tipo_termino_pagos);
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
			/*tipo_termino_pago_logic_add::checktipo_termino_pagoToSaves($this->tipo_termino_pagos,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_termino_pagoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tipo_termino_pagos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tipo_termino_pagos as $tipo_termino_pagoLocal) {				
								
				//tipo_termino_pago_logic_add::updatetipo_termino_pagoToSave($tipo_termino_pagoLocal);	        	
				tipo_termino_pago_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tipo_termino_pagoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				tipo_termino_pago_data::save($tipo_termino_pagoLocal, $this->connexion);				
			}			
			
			/*tipo_termino_pago_logic_add::checktipo_termino_pagoToSavesAfter($this->tipo_termino_pagos,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_termino_pagoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tipo_termino_pagos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_termino_pago_util::refrescarFKDescripciones($this->tipo_termino_pagos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $tipo_termino_pagos,Connexion $connexion)  {
		$tipo_termino_pagoLogic = new  tipo_termino_pago_logic();
		  		  
        try {		
			$tipo_termino_pagoLogic->setConnexion($connexion);			
			$tipo_termino_pagoLogic->settipo_termino_pagos($tipo_termino_pagos);			
			$tipo_termino_pagoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$tipo_termino_pagosAux=array();
		
		foreach($this->tipo_termino_pagos as $tipo_termino_pago) {
			if($tipo_termino_pago->getIsDeleted()==false) {
				$tipo_termino_pagosAux[]=$tipo_termino_pago;
			}
		}
		
		$this->tipo_termino_pagos=$tipo_termino_pagosAux;
	}
	
	public function updateToGetsAuxiliar(array &$tipo_termino_pagos) {
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
	
	
	
	public function saveRelacionesWithConnection($tipo_termino_pago,$terminopagoclientes,$terminopagoproveedors) {
		$this->saveRelacionesBase($tipo_termino_pago,$terminopagoclientes,$terminopagoproveedors,true);
	}

	public function saveRelaciones($tipo_termino_pago,$terminopagoclientes,$terminopagoproveedors) {
		$this->saveRelacionesBase($tipo_termino_pago,$terminopagoclientes,$terminopagoproveedors,false);
	}

	public function saveRelacionesBase($tipo_termino_pago,$terminopagoclientes=array(),$terminopagoproveedors=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$tipo_termino_pago->settermino_pago_clientes($terminopagoclientes);
			$tipo_termino_pago->settermino_pago_proveedors($terminopagoproveedors);
			$this->settipo_termino_pago($tipo_termino_pago);

				if(($this->tipo_termino_pago->getIsNew() || $this->tipo_termino_pago->getIsChanged()) && !$this->tipo_termino_pago->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($terminopagoclientes,$terminopagoproveedors);

				} else if($this->tipo_termino_pago->getIsDeleted()) {
					$this->saveRelacionesDetalles($terminopagoclientes,$terminopagoproveedors);
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
	
	
	public function saveRelacionesDetalles($terminopagoclientes=array(),$terminopagoproveedors=array()) {
		try {
	

			$idtipo_termino_pagoActual=$this->gettipo_termino_pago()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/termino_pago_cliente_carga.php');
			termino_pago_cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$terminopagoclienteLogic_Desde_tipo_termino_pago=new termino_pago_cliente_logic();
			$terminopagoclienteLogic_Desde_tipo_termino_pago->settermino_pago_clientes($terminopagoclientes);

			$terminopagoclienteLogic_Desde_tipo_termino_pago->setConnexion($this->getConnexion());
			$terminopagoclienteLogic_Desde_tipo_termino_pago->setDatosCliente($this->datosCliente);

			foreach($terminopagoclienteLogic_Desde_tipo_termino_pago->gettermino_pago_clientes() as $terminopagocliente_Desde_tipo_termino_pago) {
				$terminopagocliente_Desde_tipo_termino_pago->setid_tipo_termino_pago($idtipo_termino_pagoActual);

				$terminopagoclienteLogic_Desde_tipo_termino_pago->settermino_pago_cliente($terminopagocliente_Desde_tipo_termino_pago);
				$terminopagoclienteLogic_Desde_tipo_termino_pago->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/termino_pago_proveedor_carga.php');
			termino_pago_proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$terminopagoproveedorLogic_Desde_tipo_termino_pago=new termino_pago_proveedor_logic();
			$terminopagoproveedorLogic_Desde_tipo_termino_pago->settermino_pago_proveedors($terminopagoproveedors);

			$terminopagoproveedorLogic_Desde_tipo_termino_pago->setConnexion($this->getConnexion());
			$terminopagoproveedorLogic_Desde_tipo_termino_pago->setDatosCliente($this->datosCliente);

			foreach($terminopagoproveedorLogic_Desde_tipo_termino_pago->gettermino_pago_proveedors() as $terminopagoproveedor_Desde_tipo_termino_pago) {
				$terminopagoproveedor_Desde_tipo_termino_pago->setid_tipo_termino_pago($idtipo_termino_pagoActual);

				$terminopagoproveedorLogic_Desde_tipo_termino_pago->settermino_pago_proveedor($terminopagoproveedor_Desde_tipo_termino_pago);
				$terminopagoproveedorLogic_Desde_tipo_termino_pago->save();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $tipo_termino_pagos,tipo_termino_pago_param_return $tipo_termino_pagoParameterGeneral) : tipo_termino_pago_param_return {
		$tipo_termino_pagoReturnGeneral=new tipo_termino_pago_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $tipo_termino_pagoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $tipo_termino_pagos,tipo_termino_pago_param_return $tipo_termino_pagoParameterGeneral) : tipo_termino_pago_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_termino_pagoReturnGeneral=new tipo_termino_pago_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_termino_pagoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_termino_pagos,tipo_termino_pago $tipo_termino_pago,tipo_termino_pago_param_return $tipo_termino_pagoParameterGeneral,bool $isEsNuevotipo_termino_pago,array $clases) : tipo_termino_pago_param_return {
		 try {	
			$tipo_termino_pagoReturnGeneral=new tipo_termino_pago_param_return();
	
			$tipo_termino_pagoReturnGeneral->settipo_termino_pago($tipo_termino_pago);
			$tipo_termino_pagoReturnGeneral->settipo_termino_pagos($tipo_termino_pagos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tipo_termino_pagoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $tipo_termino_pagoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_termino_pagos,tipo_termino_pago $tipo_termino_pago,tipo_termino_pago_param_return $tipo_termino_pagoParameterGeneral,bool $isEsNuevotipo_termino_pago,array $clases) : tipo_termino_pago_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_termino_pagoReturnGeneral=new tipo_termino_pago_param_return();
	
			$tipo_termino_pagoReturnGeneral->settipo_termino_pago($tipo_termino_pago);
			$tipo_termino_pagoReturnGeneral->settipo_termino_pagos($tipo_termino_pagos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tipo_termino_pagoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_termino_pagoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_termino_pagos,tipo_termino_pago $tipo_termino_pago,tipo_termino_pago_param_return $tipo_termino_pagoParameterGeneral,bool $isEsNuevotipo_termino_pago,array $clases) : tipo_termino_pago_param_return {
		 try {	
			$tipo_termino_pagoReturnGeneral=new tipo_termino_pago_param_return();
	
			$tipo_termino_pagoReturnGeneral->settipo_termino_pago($tipo_termino_pago);
			$tipo_termino_pagoReturnGeneral->settipo_termino_pagos($tipo_termino_pagos);
			
			
			
			return $tipo_termino_pagoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_termino_pagos,tipo_termino_pago $tipo_termino_pago,tipo_termino_pago_param_return $tipo_termino_pagoParameterGeneral,bool $isEsNuevotipo_termino_pago,array $clases) : tipo_termino_pago_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_termino_pagoReturnGeneral=new tipo_termino_pago_param_return();
	
			$tipo_termino_pagoReturnGeneral->settipo_termino_pago($tipo_termino_pago);
			$tipo_termino_pagoReturnGeneral->settipo_termino_pagos($tipo_termino_pagos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_termino_pagoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,tipo_termino_pago $tipo_termino_pago,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,tipo_termino_pago $tipo_termino_pago,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		tipo_termino_pago_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(tipo_termino_pago $tipo_termino_pago,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//tipo_termino_pago_logic_add::updatetipo_termino_pagoToGet($this->tipo_termino_pago);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$tipo_termino_pago->settermino_pago_clientes($this->tipo_termino_pagoDataAccess->gettermino_pago_clientes($this->connexion,$tipo_termino_pago));
		$tipo_termino_pago->settermino_pago_proveedors($this->tipo_termino_pagoDataAccess->gettermino_pago_proveedors($this->connexion,$tipo_termino_pago));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_termino_pago->settermino_pago_clientes($this->tipo_termino_pagoDataAccess->gettermino_pago_clientes($this->connexion,$tipo_termino_pago));

				if($this->isConDeep) {
					$terminopagoclienteLogic= new termino_pago_cliente_logic($this->connexion);
					$terminopagoclienteLogic->settermino_pago_clientes($tipo_termino_pago->gettermino_pago_clientes());
					$classesLocal=termino_pago_cliente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$terminopagoclienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					termino_pago_cliente_util::refrescarFKDescripciones($terminopagoclienteLogic->gettermino_pago_clientes());
					$tipo_termino_pago->settermino_pago_clientes($terminopagoclienteLogic->gettermino_pago_clientes());
				}

				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_termino_pago->settermino_pago_proveedors($this->tipo_termino_pagoDataAccess->gettermino_pago_proveedors($this->connexion,$tipo_termino_pago));

				if($this->isConDeep) {
					$terminopagoproveedorLogic= new termino_pago_proveedor_logic($this->connexion);
					$terminopagoproveedorLogic->settermino_pago_proveedors($tipo_termino_pago->gettermino_pago_proveedors());
					$classesLocal=termino_pago_proveedor_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$terminopagoproveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					termino_pago_proveedor_util::refrescarFKDescripciones($terminopagoproveedorLogic->gettermino_pago_proveedors());
					$tipo_termino_pago->settermino_pago_proveedors($terminopagoproveedorLogic->gettermino_pago_proveedors());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(termino_pago_cliente::$class);
			$tipo_termino_pago->settermino_pago_clientes($this->tipo_termino_pagoDataAccess->gettermino_pago_clientes($this->connexion,$tipo_termino_pago));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(termino_pago_proveedor::$class);
			$tipo_termino_pago->settermino_pago_proveedors($this->tipo_termino_pagoDataAccess->gettermino_pago_proveedors($this->connexion,$tipo_termino_pago));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {


		$tipo_termino_pago->settermino_pago_clientes($this->tipo_termino_pagoDataAccess->gettermino_pago_clientes($this->connexion,$tipo_termino_pago));

		foreach($tipo_termino_pago->gettermino_pago_clientes() as $terminopagocliente) {
			$terminopagoclienteLogic= new termino_pago_cliente_logic($this->connexion);
			$terminopagoclienteLogic->deepLoad($terminopagocliente,$isDeep,$deepLoadType,$clases);
		}

		$tipo_termino_pago->settermino_pago_proveedors($this->tipo_termino_pagoDataAccess->gettermino_pago_proveedors($this->connexion,$tipo_termino_pago));

		foreach($tipo_termino_pago->gettermino_pago_proveedors() as $terminopagoproveedor) {
			$terminopagoproveedorLogic= new termino_pago_proveedor_logic($this->connexion);
			$terminopagoproveedorLogic->deepLoad($terminopagoproveedor,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_termino_pago->settermino_pago_clientes($this->tipo_termino_pagoDataAccess->gettermino_pago_clientes($this->connexion,$tipo_termino_pago));

				foreach($tipo_termino_pago->gettermino_pago_clientes() as $terminopagocliente) {
					$terminopagoclienteLogic= new termino_pago_cliente_logic($this->connexion);
					$terminopagoclienteLogic->deepLoad($terminopagocliente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_termino_pago->settermino_pago_proveedors($this->tipo_termino_pagoDataAccess->gettermino_pago_proveedors($this->connexion,$tipo_termino_pago));

				foreach($tipo_termino_pago->gettermino_pago_proveedors() as $terminopagoproveedor) {
					$terminopagoproveedorLogic= new termino_pago_proveedor_logic($this->connexion);
					$terminopagoproveedorLogic->deepLoad($terminopagoproveedor,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(termino_pago_cliente::$class);
			$tipo_termino_pago->settermino_pago_clientes($this->tipo_termino_pagoDataAccess->gettermino_pago_clientes($this->connexion,$tipo_termino_pago));

			foreach($tipo_termino_pago->gettermino_pago_clientes() as $terminopagocliente) {
				$terminopagoclienteLogic= new termino_pago_cliente_logic($this->connexion);
				$terminopagoclienteLogic->deepLoad($terminopagocliente,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(termino_pago_proveedor::$class);
			$tipo_termino_pago->settermino_pago_proveedors($this->tipo_termino_pagoDataAccess->gettermino_pago_proveedors($this->connexion,$tipo_termino_pago));

			foreach($tipo_termino_pago->gettermino_pago_proveedors() as $terminopagoproveedor) {
				$terminopagoproveedorLogic= new termino_pago_proveedor_logic($this->connexion);
				$terminopagoproveedorLogic->deepLoad($terminopagoproveedor,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(tipo_termino_pago $tipo_termino_pago,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//tipo_termino_pago_logic_add::updatetipo_termino_pagoToSave($this->tipo_termino_pago);			
			
			if(!$paraDeleteCascade) {				
				tipo_termino_pago_data::save($tipo_termino_pago, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($tipo_termino_pago->gettermino_pago_clientes() as $terminopagocliente) {
			$terminopagocliente->setid_tipo_termino_pago($tipo_termino_pago->getId());
			termino_pago_cliente_data::save($terminopagocliente,$this->connexion);
		}


		foreach($tipo_termino_pago->gettermino_pago_proveedors() as $terminopagoproveedor) {
			$terminopagoproveedor->setid_tipo_termino_pago($tipo_termino_pago->getId());
			termino_pago_proveedor_data::save($terminopagoproveedor,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==termino_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_termino_pago->gettermino_pago_clientes() as $terminopagocliente) {
					$terminopagocliente->setid_tipo_termino_pago($tipo_termino_pago->getId());
					termino_pago_cliente_data::save($terminopagocliente,$this->connexion);
				}

				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_termino_pago->gettermino_pago_proveedors() as $terminopagoproveedor) {
					$terminopagoproveedor->setid_tipo_termino_pago($tipo_termino_pago->getId());
					termino_pago_proveedor_data::save($terminopagoproveedor,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(termino_pago_cliente::$class);

			foreach($tipo_termino_pago->gettermino_pago_clientes() as $terminopagocliente) {
				$terminopagocliente->setid_tipo_termino_pago($tipo_termino_pago->getId());
				termino_pago_cliente_data::save($terminopagocliente,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(termino_pago_proveedor::$class);

			foreach($tipo_termino_pago->gettermino_pago_proveedors() as $terminopagoproveedor) {
				$terminopagoproveedor->setid_tipo_termino_pago($tipo_termino_pago->getId());
				termino_pago_proveedor_data::save($terminopagoproveedor,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($tipo_termino_pago->gettermino_pago_clientes() as $terminopagocliente) {
			$terminopagoclienteLogic= new termino_pago_cliente_logic($this->connexion);
			$terminopagocliente->setid_tipo_termino_pago($tipo_termino_pago->getId());
			termino_pago_cliente_data::save($terminopagocliente,$this->connexion);
			$terminopagoclienteLogic->deepSave($terminopagocliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($tipo_termino_pago->gettermino_pago_proveedors() as $terminopagoproveedor) {
			$terminopagoproveedorLogic= new termino_pago_proveedor_logic($this->connexion);
			$terminopagoproveedor->setid_tipo_termino_pago($tipo_termino_pago->getId());
			termino_pago_proveedor_data::save($terminopagoproveedor,$this->connexion);
			$terminopagoproveedorLogic->deepSave($terminopagoproveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==termino_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_termino_pago->gettermino_pago_clientes() as $terminopagocliente) {
					$terminopagoclienteLogic= new termino_pago_cliente_logic($this->connexion);
					$terminopagocliente->setid_tipo_termino_pago($tipo_termino_pago->getId());
					termino_pago_cliente_data::save($terminopagocliente,$this->connexion);
					$terminopagoclienteLogic->deepSave($terminopagocliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_termino_pago->gettermino_pago_proveedors() as $terminopagoproveedor) {
					$terminopagoproveedorLogic= new termino_pago_proveedor_logic($this->connexion);
					$terminopagoproveedor->setid_tipo_termino_pago($tipo_termino_pago->getId());
					termino_pago_proveedor_data::save($terminopagoproveedor,$this->connexion);
					$terminopagoproveedorLogic->deepSave($terminopagoproveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {



		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(termino_pago_cliente::$class);

			foreach($tipo_termino_pago->gettermino_pago_clientes() as $terminopagocliente) {
				$terminopagoclienteLogic= new termino_pago_cliente_logic($this->connexion);
				$terminopagocliente->setid_tipo_termino_pago($tipo_termino_pago->getId());
				termino_pago_cliente_data::save($terminopagocliente,$this->connexion);
				$terminopagoclienteLogic->deepSave($terminopagocliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(termino_pago_proveedor::$class);

			foreach($tipo_termino_pago->gettermino_pago_proveedors() as $terminopagoproveedor) {
				$terminopagoproveedorLogic= new termino_pago_proveedor_logic($this->connexion);
				$terminopagoproveedor->setid_tipo_termino_pago($tipo_termino_pago->getId());
				termino_pago_proveedor_data::save($terminopagoproveedor,$this->connexion);
				$terminopagoproveedorLogic->deepSave($terminopagoproveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				tipo_termino_pago_data::save($tipo_termino_pago, $this->connexion);
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
			
			$this->deepLoad($this->tipo_termino_pago,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->tipo_termino_pagos as $tipo_termino_pago) {
				$this->deepLoad($tipo_termino_pago,$isDeep,$deepLoadType,$clases);
								
				tipo_termino_pago_util::refrescarFKDescripciones($this->tipo_termino_pagos);
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
			
			foreach($this->tipo_termino_pagos as $tipo_termino_pago) {
				$this->deepLoad($tipo_termino_pago,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->tipo_termino_pago,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->tipo_termino_pagos as $tipo_termino_pago) {
				$this->deepSave($tipo_termino_pago,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->tipo_termino_pagos as $tipo_termino_pago) {
				$this->deepSave($tipo_termino_pago,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(termino_pago_cliente::$class);
				$classes[]=new Classe(termino_pago_proveedor::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==termino_pago_cliente::$class) {
						$classes[]=new Classe(termino_pago_cliente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==termino_pago_proveedor::$class) {
						$classes[]=new Classe(termino_pago_proveedor::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==termino_pago_cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(termino_pago_cliente::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==termino_pago_proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(termino_pago_proveedor::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function gettipo_termino_pago() : ?tipo_termino_pago {	
		/*
		tipo_termino_pago_logic_add::checktipo_termino_pagoToGet($this->tipo_termino_pago,$this->datosCliente);
		tipo_termino_pago_logic_add::updatetipo_termino_pagoToGet($this->tipo_termino_pago);
		*/
			
		return $this->tipo_termino_pago;
	}
		
	public function settipo_termino_pago(tipo_termino_pago $newtipo_termino_pago) {
		$this->tipo_termino_pago = $newtipo_termino_pago;
	}
	
	public function gettipo_termino_pagos() : array {		
		/*
		tipo_termino_pago_logic_add::checktipo_termino_pagoToGets($this->tipo_termino_pagos,$this->datosCliente);
		
		foreach ($this->tipo_termino_pagos as $tipo_termino_pagoLocal ) {
			tipo_termino_pago_logic_add::updatetipo_termino_pagoToGet($tipo_termino_pagoLocal);
		}
		*/
		
		return $this->tipo_termino_pagos;
	}
	
	public function settipo_termino_pagos(array $newtipo_termino_pagos) {
		$this->tipo_termino_pagos = $newtipo_termino_pagos;
	}
	
	public function gettipo_termino_pagoDataAccess() : tipo_termino_pago_data {
		return $this->tipo_termino_pagoDataAccess;
	}
	
	public function settipo_termino_pagoDataAccess(tipo_termino_pago_data $newtipo_termino_pagoDataAccess) {
		$this->tipo_termino_pagoDataAccess = $newtipo_termino_pagoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        tipo_termino_pago_carga::$CONTROLLER;;        
		
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
