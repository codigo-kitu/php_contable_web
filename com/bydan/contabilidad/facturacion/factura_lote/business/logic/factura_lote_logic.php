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

namespace com\bydan\contabilidad\facturacion\factura_lote\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_carga;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_param_return;

use com\bydan\contabilidad\facturacion\factura_lote\presentation\session\factura_lote_session;

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

use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_util;
use com\bydan\contabilidad\facturacion\factura_lote\business\entity\factura_lote;
use com\bydan\contabilidad\facturacion\factura_lote\business\data\factura_lote_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\general\sucursal\business\data\sucursal_data;
use com\bydan\contabilidad\general\sucursal\business\logic\sucursal_logic;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\business\data\ejercicio_data;
use com\bydan\contabilidad\contabilidad\ejercicio\business\logic\ejercicio_logic;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\business\data\periodo_data;
use com\bydan\contabilidad\contabilidad\periodo\business\logic\periodo_logic;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;

use com\bydan\contabilidad\seguridad\usuario\business\data\usuario_data;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;
use com\bydan\contabilidad\facturacion\vendedor\business\data\vendedor_data;
use com\bydan\contabilidad\facturacion\vendedor\business\logic\vendedor_logic;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_util;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\data\termino_pago_cliente_data;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\logic\termino_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;

use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;
use com\bydan\contabilidad\contabilidad\moneda\business\data\moneda_data;
use com\bydan\contabilidad\contabilidad\moneda\business\logic\moneda_logic;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\data\estado_data;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_util;

use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\business\data\asiento_data;
use com\bydan\contabilidad\contabilidad\asiento\business\logic\asiento_logic;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\entity\documento_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\data\documento_cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\logic\documento_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_util;

use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;
use com\bydan\contabilidad\inventario\kardex\business\data\kardex_data;
use com\bydan\contabilidad\inventario\kardex\business\logic\kardex_logic;
use com\bydan\contabilidad\inventario\kardex\util\kardex_util;

//REL


use com\bydan\contabilidad\facturacion\factura_lote_detalle\business\entity\factura_lote_detalle;
use com\bydan\contabilidad\facturacion\factura_lote_detalle\business\data\factura_lote_detalle_data;
use com\bydan\contabilidad\facturacion\factura_lote_detalle\business\logic\factura_lote_detalle_logic;
use com\bydan\contabilidad\facturacion\factura_lote_detalle\util\factura_lote_detalle_carga;
use com\bydan\contabilidad\facturacion\factura_lote_detalle\util\factura_lote_detalle_util;

use com\bydan\contabilidad\facturacion\factura_modelo\business\entity\factura_modelo;
use com\bydan\contabilidad\facturacion\factura_modelo\business\data\factura_modelo_data;
use com\bydan\contabilidad\facturacion\factura_modelo\business\logic\factura_modelo_logic;
use com\bydan\contabilidad\facturacion\factura_modelo\util\factura_modelo_carga;
use com\bydan\contabilidad\facturacion\factura_modelo\util\factura_modelo_util;

//REL DETALLES




class factura_lote_logic  extends GeneralEntityLogic implements factura_lote_logicI {	
	/*GENERAL*/
	public factura_lote_data $factura_loteDataAccess;
	//public ?factura_lote_logic_add $factura_loteLogicAdditional=null;
	public ?factura_lote $factura_lote;
	public array $factura_lotes;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->factura_loteDataAccess = new factura_lote_data();			
			$this->factura_lotes = array();
			$this->factura_lote = new factura_lote();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->factura_loteLogicAdditional = new factura_lote_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->factura_loteLogicAdditional==null) {
		//	$this->factura_loteLogicAdditional=new factura_lote_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->factura_loteDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->factura_loteDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->factura_loteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->factura_loteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->factura_lotes = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_lotes);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->factura_lotes = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_lotes);
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
		$this->factura_lote = new factura_lote();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->factura_lote=$this->factura_loteDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->factura_lote,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				factura_lote_util::refrescarFKDescripcion($this->factura_lote);
			}
						
			//factura_lote_logic_add::checkfactura_loteToGet($this->factura_lote,$this->datosCliente);
			//factura_lote_logic_add::updatefactura_loteToGet($this->factura_lote);
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
		$this->factura_lote = new  factura_lote();
		  		  
        try {		
			$this->factura_lote=$this->factura_loteDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->factura_lote,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				factura_lote_util::refrescarFKDescripcion($this->factura_lote);
			}
			
			//factura_lote_logic_add::checkfactura_loteToGet($this->factura_lote,$this->datosCliente);
			//factura_lote_logic_add::updatefactura_loteToGet($this->factura_lote);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?factura_lote {
		$factura_loteLogic = new  factura_lote_logic();
		  		  
        try {		
			$factura_loteLogic->setConnexion($connexion);			
			$factura_loteLogic->getEntity($id);			
			return $factura_loteLogic->getfactura_lote();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->factura_lote = new  factura_lote();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->factura_lote=$this->factura_loteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->factura_lote,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				factura_lote_util::refrescarFKDescripcion($this->factura_lote);
			}
			
			//factura_lote_logic_add::checkfactura_loteToGet($this->factura_lote,$this->datosCliente);
			//factura_lote_logic_add::updatefactura_loteToGet($this->factura_lote);
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
		$this->factura_lote = new  factura_lote();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->factura_lote=$this->factura_loteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->factura_lote,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				factura_lote_util::refrescarFKDescripcion($this->factura_lote);
			}
			
			//factura_lote_logic_add::checkfactura_loteToGet($this->factura_lote,$this->datosCliente);
			//factura_lote_logic_add::updatefactura_loteToGet($this->factura_lote);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?factura_lote {
		$factura_loteLogic = new  factura_lote_logic();
		  		  
        try {		
			$factura_loteLogic->setConnexion($connexion);			
			$factura_loteLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $factura_loteLogic->getfactura_lote();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->factura_lotes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_lotes);			
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
		$this->factura_lotes = array();
		  		  
        try {			
			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_lotes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->factura_lotes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_lotes);
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
		$this->factura_lotes = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_lotes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$factura_loteLogic = new  factura_lote_logic();
		  		  
        try {		
			$factura_loteLogic->setConnexion($connexion);			
			$factura_loteLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $factura_loteLogic->getfactura_lotes();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->factura_lotes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->factura_lotes=$this->factura_loteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_lotes);
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
		$this->factura_lotes = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->factura_lotes=$this->factura_loteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_lotes);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->factura_lotes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->factura_lotes=$this->factura_loteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_lotes);
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
		$this->factura_lotes = array();
		  		  
        try {			
			$this->factura_lotes=$this->factura_loteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}	
			
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_lotes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->factura_lotes = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->factura_lotes=$this->factura_loteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_lotes);
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
		$this->factura_lotes = array();
		  		  
        try {		
			$this->factura_lotes=$this->factura_loteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_lotes);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdasientoWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_asiento) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_asiento= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_asiento->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_asiento,factura_lote_util::$ID_ASIENTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_asiento);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idasiento(string $strFinalQuery,Pagination $pagination,?int $id_asiento) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_asiento= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_asiento->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_asiento,factura_lote_util::$ID_ASIENTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_asiento);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdclienteWithConnection(string $strFinalQuery,Pagination $pagination,int $id_cliente) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,factura_lote_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcliente(string $strFinalQuery,Pagination $pagination,int $id_cliente) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,factura_lote_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Iddocumento_cuenta_cobrarWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_documento_cuenta_cobrar) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_documento_cuenta_cobrar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_documento_cuenta_cobrar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_documento_cuenta_cobrar,factura_lote_util::$ID_DOCUMENTO_CUENTA_COBRAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_documento_cuenta_cobrar);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Iddocumento_cuenta_cobrar(string $strFinalQuery,Pagination $pagination,?int $id_documento_cuenta_cobrar) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_documento_cuenta_cobrar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_documento_cuenta_cobrar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_documento_cuenta_cobrar,factura_lote_util::$ID_DOCUMENTO_CUENTA_COBRAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_documento_cuenta_cobrar);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdejercicioWithConnection(string $strFinalQuery,Pagination $pagination,int $id_ejercicio) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_ejercicio= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,factura_lote_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idejercicio(string $strFinalQuery,Pagination $pagination,int $id_ejercicio) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_ejercicio= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,factura_lote_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,factura_lote_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,factura_lote_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdestadoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_estado) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_estado= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,factura_lote_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idestado(string $strFinalQuery,Pagination $pagination,int $id_estado) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_estado= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,factura_lote_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdkardexWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_kardex) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_kardex= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_kardex->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_kardex,factura_lote_util::$ID_KARDEX,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_kardex);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idkardex(string $strFinalQuery,Pagination $pagination,?int $id_kardex) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_kardex= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_kardex->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_kardex,factura_lote_util::$ID_KARDEX,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_kardex);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdmonedaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_moneda) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_moneda= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_moneda->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_moneda,factura_lote_util::$ID_MONEDA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_moneda);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idmoneda(string $strFinalQuery,Pagination $pagination,int $id_moneda) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_moneda= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_moneda->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_moneda,factura_lote_util::$ID_MONEDA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_moneda);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdperiodoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_periodo) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_periodo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,factura_lote_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idperiodo(string $strFinalQuery,Pagination $pagination,int $id_periodo) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_periodo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,factura_lote_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdsucursalWithConnection(string $strFinalQuery,Pagination $pagination,int $id_sucursal) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sucursal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,factura_lote_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idsucursal(string $strFinalQuery,Pagination $pagination,int $id_sucursal) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sucursal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,factura_lote_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idtermino_pagoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_termino_pago) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_termino_pago= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_termino_pago->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago,factura_lote_util::$ID_TERMINO_PAGO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtermino_pago(string $strFinalQuery,Pagination $pagination,int $id_termino_pago) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_termino_pago= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_termino_pago->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago,factura_lote_util::$ID_TERMINO_PAGO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);
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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,factura_lote_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);

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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,factura_lote_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdvendedorWithConnection(string $strFinalQuery,Pagination $pagination,int $id_vendedor) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_vendedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_vendedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_vendedor,factura_lote_util::$ID_VENDEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_vendedor);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idvendedor(string $strFinalQuery,Pagination $pagination,int $id_vendedor) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_vendedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_vendedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_vendedor,factura_lote_util::$ID_VENDEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_vendedor);

			$this->factura_lotes=$this->factura_loteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			//factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_lotes);
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
						
			//factura_lote_logic_add::checkfactura_loteToSave($this->factura_lote,$this->datosCliente,$this->connexion);	       
			//factura_lote_logic_add::updatefactura_loteToSave($this->factura_lote);			
			factura_lote_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->factura_lote,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->factura_loteLogicAdditional->checkGeneralEntityToSave($this,$this->factura_lote,$this->datosCliente,$this->connexion);
			
			
			factura_lote_data::save($this->factura_lote, $this->connexion);	    	       	 				
			//factura_lote_logic_add::checkfactura_loteToSaveAfter($this->factura_lote,$this->datosCliente,$this->connexion);			
			//$this->factura_loteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->factura_lote,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->factura_lote,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->factura_lote,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				factura_lote_util::refrescarFKDescripcion($this->factura_lote);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->factura_lote->getIsDeleted()) {
				$this->factura_lote=null;
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
						
			/*factura_lote_logic_add::checkfactura_loteToSave($this->factura_lote,$this->datosCliente,$this->connexion);*/	        
			//factura_lote_logic_add::updatefactura_loteToSave($this->factura_lote);			
			//$this->factura_loteLogicAdditional->checkGeneralEntityToSave($this,$this->factura_lote,$this->datosCliente,$this->connexion);			
			factura_lote_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->factura_lote,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			factura_lote_data::save($this->factura_lote, $this->connexion);	    	       	 						
			/*factura_lote_logic_add::checkfactura_loteToSaveAfter($this->factura_lote,$this->datosCliente,$this->connexion);*/			
			//$this->factura_loteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->factura_lote,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->factura_lote,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->factura_lote,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				factura_lote_util::refrescarFKDescripcion($this->factura_lote);				
			}
			
			if($this->factura_lote->getIsDeleted()) {
				$this->factura_lote=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(factura_lote $factura_lote,Connexion $connexion)  {
		$factura_loteLogic = new  factura_lote_logic();		  		  
        try {		
			$factura_loteLogic->setConnexion($connexion);			
			$factura_loteLogic->setfactura_lote($factura_lote);			
			$factura_loteLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*factura_lote_logic_add::checkfactura_loteToSaves($this->factura_lotes,$this->datosCliente,$this->connexion);*/	        	
			//$this->factura_loteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->factura_lotes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->factura_lotes as $factura_loteLocal) {				
								
				//factura_lote_logic_add::updatefactura_loteToSave($factura_loteLocal);	        	
				factura_lote_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$factura_loteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				factura_lote_data::save($factura_loteLocal, $this->connexion);				
			}
			
			/*factura_lote_logic_add::checkfactura_loteToSavesAfter($this->factura_lotes,$this->datosCliente,$this->connexion);*/			
			//$this->factura_loteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->factura_lotes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
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
			/*factura_lote_logic_add::checkfactura_loteToSaves($this->factura_lotes,$this->datosCliente,$this->connexion);*/			
			//$this->factura_loteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->factura_lotes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->factura_lotes as $factura_loteLocal) {				
								
				//factura_lote_logic_add::updatefactura_loteToSave($factura_loteLocal);	        	
				factura_lote_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$factura_loteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				factura_lote_data::save($factura_loteLocal, $this->connexion);				
			}			
			
			/*factura_lote_logic_add::checkfactura_loteToSavesAfter($this->factura_lotes,$this->datosCliente,$this->connexion);*/			
			//$this->factura_loteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->factura_lotes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $factura_lotes,Connexion $connexion)  {
		$factura_loteLogic = new  factura_lote_logic();
		  		  
        try {		
			$factura_loteLogic->setConnexion($connexion);			
			$factura_loteLogic->setfactura_lotes($factura_lotes);			
			$factura_loteLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$factura_lotesAux=array();
		
		foreach($this->factura_lotes as $factura_lote) {
			if($factura_lote->getIsDeleted()==false) {
				$factura_lotesAux[]=$factura_lote;
			}
		}
		
		$this->factura_lotes=$factura_lotesAux;
	}
	
	public function updateToGetsAuxiliar(array &$factura_lotes) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->factura_lotes as $factura_lote) {
				
				$factura_lote->setid_empresa_Descripcion(factura_lote_util::getempresaDescripcion($factura_lote->getempresa()));
				$factura_lote->setid_sucursal_Descripcion(factura_lote_util::getsucursalDescripcion($factura_lote->getsucursal()));
				$factura_lote->setid_ejercicio_Descripcion(factura_lote_util::getejercicioDescripcion($factura_lote->getejercicio()));
				$factura_lote->setid_periodo_Descripcion(factura_lote_util::getperiodoDescripcion($factura_lote->getperiodo()));
				$factura_lote->setid_usuario_Descripcion(factura_lote_util::getusuarioDescripcion($factura_lote->getusuario()));
				$factura_lote->setid_cliente_Descripcion(factura_lote_util::getclienteDescripcion($factura_lote->getcliente()));
				$factura_lote->setid_vendedor_Descripcion(factura_lote_util::getvendedorDescripcion($factura_lote->getvendedor()));
				$factura_lote->setid_termino_pago_Descripcion(factura_lote_util::gettermino_pagoDescripcion($factura_lote->gettermino_pago()));
				$factura_lote->setid_moneda_Descripcion(factura_lote_util::getmonedaDescripcion($factura_lote->getmoneda()));
				$factura_lote->setid_estado_Descripcion(factura_lote_util::getestadoDescripcion($factura_lote->getestado()));
				$factura_lote->setid_asiento_Descripcion(factura_lote_util::getasientoDescripcion($factura_lote->getasiento()));
				$factura_lote->setid_documento_cuenta_cobrar_Descripcion(factura_lote_util::getdocumento_cuenta_cobrarDescripcion($factura_lote->getdocumento_cuenta_cobrar()));
				$factura_lote->setid_kardex_Descripcion(factura_lote_util::getkardexDescripcion($factura_lote->getkardex()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$factura_lote_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$factura_lote_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$factura_lote_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$factura_loteForeignKey=new factura_lote_param_return();//factura_loteForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTipos,',')) {
				$this->cargarCombossucursalsFK($this->connexion,$strRecargarFkQuery,$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTipos,',')) {
				$this->cargarCombosclientesFK($this->connexion,$strRecargarFkQuery,$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_vendedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosvendedorsFK($this->connexion,$strRecargarFkQuery,$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_termino_pago',$strRecargarFkTipos,',')) {
				$this->cargarCombostermino_pagosFK($this->connexion,$strRecargarFkQuery,$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_moneda',$strRecargarFkTipos,',')) {
				$this->cargarCombosmonedasFK($this->connexion,$strRecargarFkQuery,$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado',$strRecargarFkTipos,',')) {
				$this->cargarCombosestadosFK($this->connexion,$strRecargarFkQuery,$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_asiento',$strRecargarFkTipos,',')) {
				$this->cargarCombosasientosFK($this->connexion,$strRecargarFkQuery,$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_documento_cuenta_cobrar',$strRecargarFkTipos,',')) {
				$this->cargarCombosdocumento_cuenta_cobrarsFK($this->connexion,$strRecargarFkQuery,$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_kardex',$strRecargarFkTipos,',')) {
				$this->cargarComboskardexsFK($this->connexion,$strRecargarFkQuery,$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossucursalsFK($this->connexion,' where id=-1 ',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosclientesFK($this->connexion,' where id=-1 ',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_vendedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosvendedorsFK($this->connexion,' where id=-1 ',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_termino_pago',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostermino_pagosFK($this->connexion,' where id=-1 ',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_moneda',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosmonedasFK($this->connexion,' where id=-1 ',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_estado',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosestadosFK($this->connexion,' where id=-1 ',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_asiento',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosasientosFK($this->connexion,' where id=-1 ',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_documento_cuenta_cobrar',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosdocumento_cuenta_cobrarsFK($this->connexion,' where id=-1 ',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_kardex',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboskardexsFK($this->connexion,' where id=-1 ',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $factura_loteForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$factura_loteForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($factura_loteForeignKey->idempresaDefaultFK==0) {
					$factura_loteForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$factura_loteForeignKey->empresasFK[$empresaLocal->getId()]=factura_lote_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($factura_lote_session->bigidempresaActual!=null && $factura_lote_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($factura_lote_session->bigidempresaActual);//WithConnection

				$factura_loteForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=factura_lote_util::getempresaDescripcion($empresaLogic->getempresa());
				$factura_loteForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery='',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$factura_loteForeignKey->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesionsucursal!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=sucursal_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalsucursal=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalsucursal=Funciones::GetFinalQueryAppend($finalQueryGlobalsucursal, '');
				$finalQueryGlobalsucursal.=sucursal_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalsucursal.$strRecargarFkQuery;		

				$sucursalLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($sucursalLogic->getsucursals() as $sucursalLocal ) {
				if($factura_loteForeignKey->idsucursalDefaultFK==0) {
					$factura_loteForeignKey->idsucursalDefaultFK=$sucursalLocal->getId();
				}

				$factura_loteForeignKey->sucursalsFK[$sucursalLocal->getId()]=factura_lote_util::getsucursalDescripcion($sucursalLocal);
			}

		} else {

			if($factura_lote_session->bigidsucursalActual!=null && $factura_lote_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($factura_lote_session->bigidsucursalActual);//WithConnection

				$factura_loteForeignKey->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=factura_lote_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$factura_loteForeignKey->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$factura_loteForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesionejercicio!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=ejercicio_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalejercicio=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalejercicio=Funciones::GetFinalQueryAppend($finalQueryGlobalejercicio, '');
				$finalQueryGlobalejercicio.=ejercicio_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalejercicio.$strRecargarFkQuery;		

				$ejercicioLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($ejercicioLogic->getejercicios() as $ejercicioLocal ) {
				if($factura_loteForeignKey->idejercicioDefaultFK==0) {
					$factura_loteForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$factura_loteForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=factura_lote_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($factura_lote_session->bigidejercicioActual!=null && $factura_lote_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($factura_lote_session->bigidejercicioActual);//WithConnection

				$factura_loteForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=factura_lote_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$factura_loteForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$factura_loteForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesionperiodo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=periodo_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalperiodo=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalperiodo=Funciones::GetFinalQueryAppend($finalQueryGlobalperiodo, '');
				$finalQueryGlobalperiodo.=periodo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalperiodo.$strRecargarFkQuery;		

				$periodoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($periodoLogic->getperiodos() as $periodoLocal ) {
				if($factura_loteForeignKey->idperiodoDefaultFK==0) {
					$factura_loteForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$factura_loteForeignKey->periodosFK[$periodoLocal->getId()]=factura_lote_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($factura_lote_session->bigidperiodoActual!=null && $factura_lote_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($factura_lote_session->bigidperiodoActual);//WithConnection

				$factura_loteForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=factura_lote_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$factura_loteForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$factura_loteForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesionusuario!=true) {
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
				if($factura_loteForeignKey->idusuarioDefaultFK==0) {
					$factura_loteForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$factura_loteForeignKey->usuariosFK[$usuarioLocal->getId()]=factura_lote_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($factura_lote_session->bigidusuarioActual!=null && $factura_lote_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($factura_lote_session->bigidusuarioActual);//WithConnection

				$factura_loteForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=factura_lote_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$factura_loteForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombosclientesFK($connexion=null,$strRecargarFkQuery='',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$clienteLogic= new cliente_logic();
		$pagination= new Pagination();
		$factura_loteForeignKey->clientesFK=array();

		$clienteLogic->setConnexion($connexion);
		$clienteLogic->getclienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesioncliente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=cliente_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcliente=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcliente=Funciones::GetFinalQueryAppend($finalQueryGlobalcliente, '');
				$finalQueryGlobalcliente.=cliente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcliente.$strRecargarFkQuery;		

				$clienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($clienteLogic->getclientes() as $clienteLocal ) {
				if($factura_loteForeignKey->idclienteDefaultFK==0) {
					$factura_loteForeignKey->idclienteDefaultFK=$clienteLocal->getId();
				}

				$factura_loteForeignKey->clientesFK[$clienteLocal->getId()]=factura_lote_util::getclienteDescripcion($clienteLocal);
			}

		} else {

			if($factura_lote_session->bigidclienteActual!=null && $factura_lote_session->bigidclienteActual > 0) {
				$clienteLogic->getEntity($factura_lote_session->bigidclienteActual);//WithConnection

				$factura_loteForeignKey->clientesFK[$clienteLogic->getcliente()->getId()]=factura_lote_util::getclienteDescripcion($clienteLogic->getcliente());
				$factura_loteForeignKey->idclienteDefaultFK=$clienteLogic->getcliente()->getId();
			}
		}
	}

	public function cargarCombosvendedorsFK($connexion=null,$strRecargarFkQuery='',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$vendedorLogic= new vendedor_logic();
		$pagination= new Pagination();
		$factura_loteForeignKey->vendedorsFK=array();

		$vendedorLogic->setConnexion($connexion);
		$vendedorLogic->getvendedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesionvendedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=vendedor_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalvendedor=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalvendedor=Funciones::GetFinalQueryAppend($finalQueryGlobalvendedor, '');
				$finalQueryGlobalvendedor.=vendedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalvendedor.$strRecargarFkQuery;		

				$vendedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($vendedorLogic->getvendedors() as $vendedorLocal ) {
				if($factura_loteForeignKey->idvendedorDefaultFK==0) {
					$factura_loteForeignKey->idvendedorDefaultFK=$vendedorLocal->getId();
				}

				$factura_loteForeignKey->vendedorsFK[$vendedorLocal->getId()]=factura_lote_util::getvendedorDescripcion($vendedorLocal);
			}

		} else {

			if($factura_lote_session->bigidvendedorActual!=null && $factura_lote_session->bigidvendedorActual > 0) {
				$vendedorLogic->getEntity($factura_lote_session->bigidvendedorActual);//WithConnection

				$factura_loteForeignKey->vendedorsFK[$vendedorLogic->getvendedor()->getId()]=factura_lote_util::getvendedorDescripcion($vendedorLogic->getvendedor());
				$factura_loteForeignKey->idvendedorDefaultFK=$vendedorLogic->getvendedor()->getId();
			}
		}
	}

	public function cargarCombostermino_pagosFK($connexion=null,$strRecargarFkQuery='',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$termino_pago_clienteLogic= new termino_pago_cliente_logic();
		$pagination= new Pagination();
		$factura_loteForeignKey->termino_pagosFK=array();

		$termino_pago_clienteLogic->setConnexion($connexion);
		$termino_pago_clienteLogic->gettermino_pago_clienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesiontermino_pago!=true) {
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
				if($factura_loteForeignKey->idtermino_pagoDefaultFK==0) {
					$factura_loteForeignKey->idtermino_pagoDefaultFK=$termino_pago_clienteLocal->getId();
				}

				$factura_loteForeignKey->termino_pagosFK[$termino_pago_clienteLocal->getId()]=factura_lote_util::gettermino_pagoDescripcion($termino_pago_clienteLocal);
			}

		} else {

			if($factura_lote_session->bigidtermino_pago_clienteid_termino_pagoActual!=null && $factura_lote_session->bigidtermino_pago_clienteid_termino_pagoActual > 0) {
				$termino_pago_clienteLogic->getEntity($factura_lote_session->bigidtermino_pago_clienteid_termino_pagoActual);//WithConnection

				$factura_loteForeignKey->termino_pagosFK[$termino_pago_clienteLogic->gettermino_pago_cliente()->getId()]=factura_lote_util::gettermino_pagoDescripcion($termino_pago_clienteLogic->gettermino_pago_cliente());
				$factura_loteForeignKey->idtermino_pagoDefaultFK=$termino_pago_clienteLogic->gettermino_pago_cliente()->getId();
			}
		}
	}

	public function cargarCombosmonedasFK($connexion=null,$strRecargarFkQuery='',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$monedaLogic= new moneda_logic();
		$pagination= new Pagination();
		$factura_loteForeignKey->monedasFK=array();

		$monedaLogic->setConnexion($connexion);
		$monedaLogic->getmonedaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesionmoneda!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=moneda_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalmoneda=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalmoneda=Funciones::GetFinalQueryAppend($finalQueryGlobalmoneda, '');
				$finalQueryGlobalmoneda.=moneda_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalmoneda.$strRecargarFkQuery;		

				$monedaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($monedaLogic->getmonedas() as $monedaLocal ) {
				if($factura_loteForeignKey->idmonedaDefaultFK==0) {
					$factura_loteForeignKey->idmonedaDefaultFK=$monedaLocal->getId();
				}

				$factura_loteForeignKey->monedasFK[$monedaLocal->getId()]=factura_lote_util::getmonedaDescripcion($monedaLocal);
			}

		} else {

			if($factura_lote_session->bigidmonedaActual!=null && $factura_lote_session->bigidmonedaActual > 0) {
				$monedaLogic->getEntity($factura_lote_session->bigidmonedaActual);//WithConnection

				$factura_loteForeignKey->monedasFK[$monedaLogic->getmoneda()->getId()]=factura_lote_util::getmonedaDescripcion($monedaLogic->getmoneda());
				$factura_loteForeignKey->idmonedaDefaultFK=$monedaLogic->getmoneda()->getId();
			}
		}
	}

	public function cargarCombosestadosFK($connexion=null,$strRecargarFkQuery='',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$estadoLogic= new estado_logic();
		$pagination= new Pagination();
		$factura_loteForeignKey->estadosFK=array();

		$estadoLogic->setConnexion($connexion);
		$estadoLogic->getestadoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesionestado!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=estado_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalestado=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalestado=Funciones::GetFinalQueryAppend($finalQueryGlobalestado, '');
				$finalQueryGlobalestado.=estado_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalestado.$strRecargarFkQuery;		

				$estadoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($estadoLogic->getestados() as $estadoLocal ) {
				if($factura_loteForeignKey->idestadoDefaultFK==0) {
					$factura_loteForeignKey->idestadoDefaultFK=$estadoLocal->getId();
				}

				$factura_loteForeignKey->estadosFK[$estadoLocal->getId()]=factura_lote_util::getestadoDescripcion($estadoLocal);
			}

		} else {

			if($factura_lote_session->bigidestadoActual!=null && $factura_lote_session->bigidestadoActual > 0) {
				$estadoLogic->getEntity($factura_lote_session->bigidestadoActual);//WithConnection

				$factura_loteForeignKey->estadosFK[$estadoLogic->getestado()->getId()]=factura_lote_util::getestadoDescripcion($estadoLogic->getestado());
				$factura_loteForeignKey->idestadoDefaultFK=$estadoLogic->getestado()->getId();
			}
		}
	}

	public function cargarCombosasientosFK($connexion=null,$strRecargarFkQuery='',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$asientoLogic= new asiento_logic();
		$pagination= new Pagination();
		$factura_loteForeignKey->asientosFK=array();

		$asientoLogic->setConnexion($connexion);
		$asientoLogic->getasientoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesionasiento!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=asiento_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalasiento=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalasiento=Funciones::GetFinalQueryAppend($finalQueryGlobalasiento, '');
				$finalQueryGlobalasiento.=asiento_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalasiento.$strRecargarFkQuery;		

				$asientoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($asientoLogic->getasientos() as $asientoLocal ) {
				if($factura_loteForeignKey->idasientoDefaultFK==0) {
					$factura_loteForeignKey->idasientoDefaultFK=$asientoLocal->getId();
				}

				$factura_loteForeignKey->asientosFK[$asientoLocal->getId()]=factura_lote_util::getasientoDescripcion($asientoLocal);
			}

		} else {

			if($factura_lote_session->bigidasientoActual!=null && $factura_lote_session->bigidasientoActual > 0) {
				$asientoLogic->getEntity($factura_lote_session->bigidasientoActual);//WithConnection

				$factura_loteForeignKey->asientosFK[$asientoLogic->getasiento()->getId()]=factura_lote_util::getasientoDescripcion($asientoLogic->getasiento());
				$factura_loteForeignKey->idasientoDefaultFK=$asientoLogic->getasiento()->getId();
			}
		}
	}

	public function cargarCombosdocumento_cuenta_cobrarsFK($connexion=null,$strRecargarFkQuery='',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic();
		$pagination= new Pagination();
		$factura_loteForeignKey->documento_cuenta_cobrarsFK=array();

		$documento_cuenta_cobrarLogic->setConnexion($connexion);
		$documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesiondocumento_cuenta_cobrar!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=documento_cuenta_cobrar_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaldocumento_cuenta_cobrar=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaldocumento_cuenta_cobrar=Funciones::GetFinalQueryAppend($finalQueryGlobaldocumento_cuenta_cobrar, '');
				$finalQueryGlobaldocumento_cuenta_cobrar.=documento_cuenta_cobrar_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaldocumento_cuenta_cobrar.$strRecargarFkQuery;		

				$documento_cuenta_cobrarLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars() as $documento_cuenta_cobrarLocal ) {
				if($factura_loteForeignKey->iddocumento_cuenta_cobrarDefaultFK==0) {
					$factura_loteForeignKey->iddocumento_cuenta_cobrarDefaultFK=$documento_cuenta_cobrarLocal->getId();
				}

				$factura_loteForeignKey->documento_cuenta_cobrarsFK[$documento_cuenta_cobrarLocal->getId()]=factura_lote_util::getdocumento_cuenta_cobrarDescripcion($documento_cuenta_cobrarLocal);
			}

		} else {

			if($factura_lote_session->bigiddocumento_cuenta_cobrarActual!=null && $factura_lote_session->bigiddocumento_cuenta_cobrarActual > 0) {
				$documento_cuenta_cobrarLogic->getEntity($factura_lote_session->bigiddocumento_cuenta_cobrarActual);//WithConnection

				$factura_loteForeignKey->documento_cuenta_cobrarsFK[$documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getId()]=factura_lote_util::getdocumento_cuenta_cobrarDescripcion($documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar());
				$factura_loteForeignKey->iddocumento_cuenta_cobrarDefaultFK=$documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getId();
			}
		}
	}

	public function cargarComboskardexsFK($connexion=null,$strRecargarFkQuery='',$factura_loteForeignKey,$factura_lote_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$kardexLogic= new kardex_logic();
		$pagination= new Pagination();
		$factura_loteForeignKey->kardexsFK=array();

		$kardexLogic->setConnexion($connexion);
		$kardexLogic->getkardexDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesionkardex!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=kardex_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalkardex=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalkardex=Funciones::GetFinalQueryAppend($finalQueryGlobalkardex, '');
				$finalQueryGlobalkardex.=kardex_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalkardex.$strRecargarFkQuery;		

				$kardexLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($kardexLogic->getkardexs() as $kardexLocal ) {
				if($factura_loteForeignKey->idkardexDefaultFK==0) {
					$factura_loteForeignKey->idkardexDefaultFK=$kardexLocal->getId();
				}

				$factura_loteForeignKey->kardexsFK[$kardexLocal->getId()]=factura_lote_util::getkardexDescripcion($kardexLocal);
			}

		} else {

			if($factura_lote_session->bigidkardexActual!=null && $factura_lote_session->bigidkardexActual > 0) {
				$kardexLogic->getEntity($factura_lote_session->bigidkardexActual);//WithConnection

				$factura_loteForeignKey->kardexsFK[$kardexLogic->getkardex()->getId()]=factura_lote_util::getkardexDescripcion($kardexLogic->getkardex());
				$factura_loteForeignKey->idkardexDefaultFK=$kardexLogic->getkardex()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($factura_lote,$facturalotedetalles,$facturamodelos) {
		$this->saveRelacionesBase($factura_lote,$facturalotedetalles,$facturamodelos,true);
	}

	public function saveRelaciones($factura_lote,$facturalotedetalles,$facturamodelos) {
		$this->saveRelacionesBase($factura_lote,$facturalotedetalles,$facturamodelos,false);
	}

	public function saveRelacionesBase($factura_lote,$facturalotedetalles=array(),$facturamodelos=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$factura_lote->setfactura_lote_detalles($facturalotedetalles);
			$factura_lote->setfactura_modelos($facturamodelos);
			$this->setfactura_lote($factura_lote);

			if(true) {

				//factura_lote_logic_add::updateRelacionesToSave($factura_lote,$this);

				if(($this->factura_lote->getIsNew() || $this->factura_lote->getIsChanged()) && !$this->factura_lote->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($facturalotedetalles,$facturamodelos);

				} else if($this->factura_lote->getIsDeleted()) {
					$this->saveRelacionesDetalles($facturalotedetalles,$facturamodelos);
					$this->save();
				}

				//factura_lote_logic_add::updateRelacionesToSaveAfter($factura_lote,$this);

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
	
	
	public function saveRelacionesDetalles($facturalotedetalles=array(),$facturamodelos=array()) {
		try {
	

			$idfactura_loteActual=$this->getfactura_lote()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_lote_detalle_carga.php');
			factura_lote_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$facturalotedetalleLogic_Desde_factura_lote=new factura_lote_detalle_logic();
			$facturalotedetalleLogic_Desde_factura_lote->setfactura_lote_detalles($facturalotedetalles);

			$facturalotedetalleLogic_Desde_factura_lote->setConnexion($this->getConnexion());
			$facturalotedetalleLogic_Desde_factura_lote->setDatosCliente($this->datosCliente);

			foreach($facturalotedetalleLogic_Desde_factura_lote->getfactura_lote_detalles() as $facturalotedetalle_Desde_factura_lote) {
				$facturalotedetalle_Desde_factura_lote->setid_factura_lote($idfactura_loteActual);
			}

			$facturalotedetalleLogic_Desde_factura_lote->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_modelo_carga.php');
			factura_modelo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$facturamodeloLogic_Desde_factura_lote=new factura_modelo_logic();
			$facturamodeloLogic_Desde_factura_lote->setfactura_modelos($facturamodelos);

			$facturamodeloLogic_Desde_factura_lote->setConnexion($this->getConnexion());
			$facturamodeloLogic_Desde_factura_lote->setDatosCliente($this->datosCliente);

			foreach($facturamodeloLogic_Desde_factura_lote->getfactura_modelos() as $facturamodelo_Desde_factura_lote) {
				$facturamodelo_Desde_factura_lote->setid_factura_lote($idfactura_loteActual);
			}

			$facturamodeloLogic_Desde_factura_lote->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $factura_lotes,factura_lote_param_return $factura_loteParameterGeneral) : factura_lote_param_return {
		$factura_loteReturnGeneral=new factura_lote_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $factura_loteReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $factura_lotes,factura_lote_param_return $factura_loteParameterGeneral) : factura_lote_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$factura_loteReturnGeneral=new factura_lote_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $factura_loteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $factura_lotes,factura_lote $factura_lote,factura_lote_param_return $factura_loteParameterGeneral,bool $isEsNuevofactura_lote,array $clases) : factura_lote_param_return {
		 try {	
			$factura_loteReturnGeneral=new factura_lote_param_return();
	
			$factura_loteReturnGeneral->setfactura_lote($factura_lote);
			$factura_loteReturnGeneral->setfactura_lotes($factura_lotes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$factura_loteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $factura_loteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $factura_lotes,factura_lote $factura_lote,factura_lote_param_return $factura_loteParameterGeneral,bool $isEsNuevofactura_lote,array $clases) : factura_lote_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$factura_loteReturnGeneral=new factura_lote_param_return();
	
			$factura_loteReturnGeneral->setfactura_lote($factura_lote);
			$factura_loteReturnGeneral->setfactura_lotes($factura_lotes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$factura_loteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $factura_loteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $factura_lotes,factura_lote $factura_lote,factura_lote_param_return $factura_loteParameterGeneral,bool $isEsNuevofactura_lote,array $clases) : factura_lote_param_return {
		 try {	
			$factura_loteReturnGeneral=new factura_lote_param_return();
	
			$factura_loteReturnGeneral->setfactura_lote($factura_lote);
			$factura_loteReturnGeneral->setfactura_lotes($factura_lotes);
			
			
			
			return $factura_loteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $factura_lotes,factura_lote $factura_lote,factura_lote_param_return $factura_loteParameterGeneral,bool $isEsNuevofactura_lote,array $clases) : factura_lote_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$factura_loteReturnGeneral=new factura_lote_param_return();
	
			$factura_loteReturnGeneral->setfactura_lote($factura_lote);
			$factura_loteReturnGeneral->setfactura_lotes($factura_lotes);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $factura_loteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,factura_lote $factura_lote,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,factura_lote $factura_lote,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		factura_lote_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		factura_lote_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(factura_lote $factura_lote,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//factura_lote_logic_add::updatefactura_loteToGet($this->factura_lote);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$factura_lote->setempresa($this->factura_loteDataAccess->getempresa($this->connexion,$factura_lote));
		$factura_lote->setsucursal($this->factura_loteDataAccess->getsucursal($this->connexion,$factura_lote));
		$factura_lote->setejercicio($this->factura_loteDataAccess->getejercicio($this->connexion,$factura_lote));
		$factura_lote->setperiodo($this->factura_loteDataAccess->getperiodo($this->connexion,$factura_lote));
		$factura_lote->setusuario($this->factura_loteDataAccess->getusuario($this->connexion,$factura_lote));
		$factura_lote->setcliente($this->factura_loteDataAccess->getcliente($this->connexion,$factura_lote));
		$factura_lote->setvendedor($this->factura_loteDataAccess->getvendedor($this->connexion,$factura_lote));
		$factura_lote->settermino_pago($this->factura_loteDataAccess->gettermino_pago($this->connexion,$factura_lote));
		$factura_lote->setmoneda($this->factura_loteDataAccess->getmoneda($this->connexion,$factura_lote));
		$factura_lote->setestado($this->factura_loteDataAccess->getestado($this->connexion,$factura_lote));
		$factura_lote->setasiento($this->factura_loteDataAccess->getasiento($this->connexion,$factura_lote));
		$factura_lote->setdocumento_cuenta_cobrar($this->factura_loteDataAccess->getdocumento_cuenta_cobrar($this->connexion,$factura_lote));
		$factura_lote->setkardex($this->factura_loteDataAccess->getkardex($this->connexion,$factura_lote));
		$factura_lote->setfactura_lote_detalles($this->factura_loteDataAccess->getfactura_lote_detalles($this->connexion,$factura_lote));
		$factura_lote->setfactura_modelos($this->factura_loteDataAccess->getfactura_modelos($this->connexion,$factura_lote));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$factura_lote->setempresa($this->factura_loteDataAccess->getempresa($this->connexion,$factura_lote));
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$factura_lote->setsucursal($this->factura_loteDataAccess->getsucursal($this->connexion,$factura_lote));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$factura_lote->setejercicio($this->factura_loteDataAccess->getejercicio($this->connexion,$factura_lote));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$factura_lote->setperiodo($this->factura_loteDataAccess->getperiodo($this->connexion,$factura_lote));
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$factura_lote->setusuario($this->factura_loteDataAccess->getusuario($this->connexion,$factura_lote));
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				$factura_lote->setcliente($this->factura_loteDataAccess->getcliente($this->connexion,$factura_lote));
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				$factura_lote->setvendedor($this->factura_loteDataAccess->getvendedor($this->connexion,$factura_lote));
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'termino_pago') {
				$factura_lote->settermino_pago($this->factura_loteDataAccess->gettermino_pago($this->connexion,$factura_lote));
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				$factura_lote->setmoneda($this->factura_loteDataAccess->getmoneda($this->connexion,$factura_lote));
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$factura_lote->setestado($this->factura_loteDataAccess->getestado($this->connexion,$factura_lote));
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				$factura_lote->setasiento($this->factura_loteDataAccess->getasiento($this->connexion,$factura_lote));
				continue;
			}

			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				$factura_lote->setdocumento_cuenta_cobrar($this->factura_loteDataAccess->getdocumento_cuenta_cobrar($this->connexion,$factura_lote));
				continue;
			}

			if($clas->clas==kardex::$class.'') {
				$factura_lote->setkardex($this->factura_loteDataAccess->getkardex($this->connexion,$factura_lote));
				continue;
			}

			if($clas->clas==factura_lote_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$factura_lote->setfactura_lote_detalles($this->factura_loteDataAccess->getfactura_lote_detalles($this->connexion,$factura_lote));

				if($this->isConDeep) {
					$facturalotedetalleLogic= new factura_lote_detalle_logic($this->connexion);
					$facturalotedetalleLogic->setfactura_lote_detalles($factura_lote->getfactura_lote_detalles());
					$classesLocal=factura_lote_detalle_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$facturalotedetalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					factura_lote_detalle_util::refrescarFKDescripciones($facturalotedetalleLogic->getfactura_lote_detalles());
					$factura_lote->setfactura_lote_detalles($facturalotedetalleLogic->getfactura_lote_detalles());
				}

				continue;
			}

			if($clas->clas==factura_modelo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$factura_lote->setfactura_modelos($this->factura_loteDataAccess->getfactura_modelos($this->connexion,$factura_lote));

				if($this->isConDeep) {
					$facturamodeloLogic= new factura_modelo_logic($this->connexion);
					$facturamodeloLogic->setfactura_modelos($factura_lote->getfactura_modelos());
					$classesLocal=factura_modelo_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$facturamodeloLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					factura_modelo_util::refrescarFKDescripciones($facturamodeloLogic->getfactura_modelos());
					$factura_lote->setfactura_modelos($facturamodeloLogic->getfactura_modelos());
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
			$factura_lote->setempresa($this->factura_loteDataAccess->getempresa($this->connexion,$factura_lote));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_lote->setsucursal($this->factura_loteDataAccess->getsucursal($this->connexion,$factura_lote));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_lote->setejercicio($this->factura_loteDataAccess->getejercicio($this->connexion,$factura_lote));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_lote->setperiodo($this->factura_loteDataAccess->getperiodo($this->connexion,$factura_lote));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_lote->setusuario($this->factura_loteDataAccess->getusuario($this->connexion,$factura_lote));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_lote->setcliente($this->factura_loteDataAccess->getcliente($this->connexion,$factura_lote));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_lote->setvendedor($this->factura_loteDataAccess->getvendedor($this->connexion,$factura_lote));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'termino_pago') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_lote->settermino_pago($this->factura_loteDataAccess->gettermino_pago($this->connexion,$factura_lote));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_lote->setmoneda($this->factura_loteDataAccess->getmoneda($this->connexion,$factura_lote));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_lote->setestado($this->factura_loteDataAccess->getestado($this->connexion,$factura_lote));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_lote->setasiento($this->factura_loteDataAccess->getasiento($this->connexion,$factura_lote));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_lote->setdocumento_cuenta_cobrar($this->factura_loteDataAccess->getdocumento_cuenta_cobrar($this->connexion,$factura_lote));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_lote->setkardex($this->factura_loteDataAccess->getkardex($this->connexion,$factura_lote));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura_lote_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura_lote_detalle::$class);
			$factura_lote->setfactura_lote_detalles($this->factura_loteDataAccess->getfactura_lote_detalles($this->connexion,$factura_lote));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura_modelo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura_modelo::$class);
			$factura_lote->setfactura_modelos($this->factura_loteDataAccess->getfactura_modelos($this->connexion,$factura_lote));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$factura_lote->setempresa($this->factura_loteDataAccess->getempresa($this->connexion,$factura_lote));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($factura_lote->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$factura_lote->setsucursal($this->factura_loteDataAccess->getsucursal($this->connexion,$factura_lote));
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepLoad($factura_lote->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		$factura_lote->setejercicio($this->factura_loteDataAccess->getejercicio($this->connexion,$factura_lote));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($factura_lote->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$factura_lote->setperiodo($this->factura_loteDataAccess->getperiodo($this->connexion,$factura_lote));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($factura_lote->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		$factura_lote->setusuario($this->factura_loteDataAccess->getusuario($this->connexion,$factura_lote));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($factura_lote->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$factura_lote->setcliente($this->factura_loteDataAccess->getcliente($this->connexion,$factura_lote));
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepLoad($factura_lote->getcliente(),$isDeep,$deepLoadType,$clases);
				
		$factura_lote->setvendedor($this->factura_loteDataAccess->getvendedor($this->connexion,$factura_lote));
		$vendedorLogic= new vendedor_logic($this->connexion);
		$vendedorLogic->deepLoad($factura_lote->getvendedor(),$isDeep,$deepLoadType,$clases);
				
		$factura_lote->settermino_pago($this->factura_loteDataAccess->gettermino_pago($this->connexion,$factura_lote));
		$termino_pagoLogic= new termino_pago_cliente_logic($this->connexion);
		$termino_pagoLogic->deepLoad($factura_lote->gettermino_pago(),$isDeep,$deepLoadType,$clases);
				
		$factura_lote->setmoneda($this->factura_loteDataAccess->getmoneda($this->connexion,$factura_lote));
		$monedaLogic= new moneda_logic($this->connexion);
		$monedaLogic->deepLoad($factura_lote->getmoneda(),$isDeep,$deepLoadType,$clases);
				
		$factura_lote->setestado($this->factura_loteDataAccess->getestado($this->connexion,$factura_lote));
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepLoad($factura_lote->getestado(),$isDeep,$deepLoadType,$clases);
				
		$factura_lote->setasiento($this->factura_loteDataAccess->getasiento($this->connexion,$factura_lote));
		$asientoLogic= new asiento_logic($this->connexion);
		$asientoLogic->deepLoad($factura_lote->getasiento(),$isDeep,$deepLoadType,$clases);
				
		$factura_lote->setdocumento_cuenta_cobrar($this->factura_loteDataAccess->getdocumento_cuenta_cobrar($this->connexion,$factura_lote));
		$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
		$documento_cuenta_cobrarLogic->deepLoad($factura_lote->getdocumento_cuenta_cobrar(),$isDeep,$deepLoadType,$clases);
				
		$factura_lote->setkardex($this->factura_loteDataAccess->getkardex($this->connexion,$factura_lote));
		$kardexLogic= new kardex_logic($this->connexion);
		$kardexLogic->deepLoad($factura_lote->getkardex(),$isDeep,$deepLoadType,$clases);
				

		$factura_lote->setfactura_lote_detalles($this->factura_loteDataAccess->getfactura_lote_detalles($this->connexion,$factura_lote));

		foreach($factura_lote->getfactura_lote_detalles() as $facturalotedetalle) {
			$facturalotedetalleLogic= new factura_lote_detalle_logic($this->connexion);
			$facturalotedetalleLogic->deepLoad($facturalotedetalle,$isDeep,$deepLoadType,$clases);
		}

		$factura_lote->setfactura_modelos($this->factura_loteDataAccess->getfactura_modelos($this->connexion,$factura_lote));

		foreach($factura_lote->getfactura_modelos() as $facturamodelo) {
			$facturamodeloLogic= new factura_modelo_logic($this->connexion);
			$facturamodeloLogic->deepLoad($facturamodelo,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$factura_lote->setempresa($this->factura_loteDataAccess->getempresa($this->connexion,$factura_lote));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($factura_lote->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$factura_lote->setsucursal($this->factura_loteDataAccess->getsucursal($this->connexion,$factura_lote));
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($factura_lote->getsucursal(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$factura_lote->setejercicio($this->factura_loteDataAccess->getejercicio($this->connexion,$factura_lote));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($factura_lote->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$factura_lote->setperiodo($this->factura_loteDataAccess->getperiodo($this->connexion,$factura_lote));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($factura_lote->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$factura_lote->setusuario($this->factura_loteDataAccess->getusuario($this->connexion,$factura_lote));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($factura_lote->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				$factura_lote->setcliente($this->factura_loteDataAccess->getcliente($this->connexion,$factura_lote));
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($factura_lote->getcliente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				$factura_lote->setvendedor($this->factura_loteDataAccess->getvendedor($this->connexion,$factura_lote));
				$vendedorLogic= new vendedor_logic($this->connexion);
				$vendedorLogic->deepLoad($factura_lote->getvendedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'termino_pago') {
				$factura_lote->settermino_pago($this->factura_loteDataAccess->gettermino_pago($this->connexion,$factura_lote));
				$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
				$termino_pago_clienteLogic->deepLoad($factura_lote->gettermino_pago(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				$factura_lote->setmoneda($this->factura_loteDataAccess->getmoneda($this->connexion,$factura_lote));
				$monedaLogic= new moneda_logic($this->connexion);
				$monedaLogic->deepLoad($factura_lote->getmoneda(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$factura_lote->setestado($this->factura_loteDataAccess->getestado($this->connexion,$factura_lote));
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepLoad($factura_lote->getestado(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				$factura_lote->setasiento($this->factura_loteDataAccess->getasiento($this->connexion,$factura_lote));
				$asientoLogic= new asiento_logic($this->connexion);
				$asientoLogic->deepLoad($factura_lote->getasiento(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				$factura_lote->setdocumento_cuenta_cobrar($this->factura_loteDataAccess->getdocumento_cuenta_cobrar($this->connexion,$factura_lote));
				$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
				$documento_cuenta_cobrarLogic->deepLoad($factura_lote->getdocumento_cuenta_cobrar(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==kardex::$class.'') {
				$factura_lote->setkardex($this->factura_loteDataAccess->getkardex($this->connexion,$factura_lote));
				$kardexLogic= new kardex_logic($this->connexion);
				$kardexLogic->deepLoad($factura_lote->getkardex(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==factura_lote_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$factura_lote->setfactura_lote_detalles($this->factura_loteDataAccess->getfactura_lote_detalles($this->connexion,$factura_lote));

				foreach($factura_lote->getfactura_lote_detalles() as $facturalotedetalle) {
					$facturalotedetalleLogic= new factura_lote_detalle_logic($this->connexion);
					$facturalotedetalleLogic->deepLoad($facturalotedetalle,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==factura_modelo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$factura_lote->setfactura_modelos($this->factura_loteDataAccess->getfactura_modelos($this->connexion,$factura_lote));

				foreach($factura_lote->getfactura_modelos() as $facturamodelo) {
					$facturamodeloLogic= new factura_modelo_logic($this->connexion);
					$facturamodeloLogic->deepLoad($facturamodelo,$isDeep,$deepLoadType,$clases);
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
			$factura_lote->setempresa($this->factura_loteDataAccess->getempresa($this->connexion,$factura_lote));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($factura_lote->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_lote->setsucursal($this->factura_loteDataAccess->getsucursal($this->connexion,$factura_lote));
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($factura_lote->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_lote->setejercicio($this->factura_loteDataAccess->getejercicio($this->connexion,$factura_lote));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($factura_lote->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_lote->setperiodo($this->factura_loteDataAccess->getperiodo($this->connexion,$factura_lote));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($factura_lote->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_lote->setusuario($this->factura_loteDataAccess->getusuario($this->connexion,$factura_lote));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($factura_lote->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_lote->setcliente($this->factura_loteDataAccess->getcliente($this->connexion,$factura_lote));
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($factura_lote->getcliente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_lote->setvendedor($this->factura_loteDataAccess->getvendedor($this->connexion,$factura_lote));
			$vendedorLogic= new vendedor_logic($this->connexion);
			$vendedorLogic->deepLoad($factura_lote->getvendedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'termino_pago') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_lote->settermino_pago($this->factura_loteDataAccess->gettermino_pago($this->connexion,$factura_lote));
			$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
			$termino_pago_clienteLogic->deepLoad($factura_lote->gettermino_pago(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_lote->setmoneda($this->factura_loteDataAccess->getmoneda($this->connexion,$factura_lote));
			$monedaLogic= new moneda_logic($this->connexion);
			$monedaLogic->deepLoad($factura_lote->getmoneda(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_lote->setestado($this->factura_loteDataAccess->getestado($this->connexion,$factura_lote));
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepLoad($factura_lote->getestado(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_lote->setasiento($this->factura_loteDataAccess->getasiento($this->connexion,$factura_lote));
			$asientoLogic= new asiento_logic($this->connexion);
			$asientoLogic->deepLoad($factura_lote->getasiento(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_lote->setdocumento_cuenta_cobrar($this->factura_loteDataAccess->getdocumento_cuenta_cobrar($this->connexion,$factura_lote));
			$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
			$documento_cuenta_cobrarLogic->deepLoad($factura_lote->getdocumento_cuenta_cobrar(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_lote->setkardex($this->factura_loteDataAccess->getkardex($this->connexion,$factura_lote));
			$kardexLogic= new kardex_logic($this->connexion);
			$kardexLogic->deepLoad($factura_lote->getkardex(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura_lote_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura_lote_detalle::$class);
			$factura_lote->setfactura_lote_detalles($this->factura_loteDataAccess->getfactura_lote_detalles($this->connexion,$factura_lote));

			foreach($factura_lote->getfactura_lote_detalles() as $facturalotedetalle) {
				$facturalotedetalleLogic= new factura_lote_detalle_logic($this->connexion);
				$facturalotedetalleLogic->deepLoad($facturalotedetalle,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura_modelo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura_modelo::$class);
			$factura_lote->setfactura_modelos($this->factura_loteDataAccess->getfactura_modelos($this->connexion,$factura_lote));

			foreach($factura_lote->getfactura_modelos() as $facturamodelo) {
				$facturamodeloLogic= new factura_modelo_logic($this->connexion);
				$facturamodeloLogic->deepLoad($facturamodelo,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(factura_lote $factura_lote,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//factura_lote_logic_add::updatefactura_loteToSave($this->factura_lote);			
			
			if(!$paraDeleteCascade) {				
				factura_lote_data::save($factura_lote, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($factura_lote->getempresa(),$this->connexion);
		sucursal_data::save($factura_lote->getsucursal(),$this->connexion);
		ejercicio_data::save($factura_lote->getejercicio(),$this->connexion);
		periodo_data::save($factura_lote->getperiodo(),$this->connexion);
		usuario_data::save($factura_lote->getusuario(),$this->connexion);
		cliente_data::save($factura_lote->getcliente(),$this->connexion);
		vendedor_data::save($factura_lote->getvendedor(),$this->connexion);
		termino_pago_cliente_data::save($factura_lote->gettermino_pago(),$this->connexion);
		moneda_data::save($factura_lote->getmoneda(),$this->connexion);
		estado_data::save($factura_lote->getestado(),$this->connexion);
		asiento_data::save($factura_lote->getasiento(),$this->connexion);
		documento_cuenta_cobrar_data::save($factura_lote->getdocumento_cuenta_cobrar(),$this->connexion);
		kardex_data::save($factura_lote->getkardex(),$this->connexion);

		foreach($factura_lote->getfactura_lote_detalles() as $facturalotedetalle) {
			$facturalotedetalle->setid_factura_lote($factura_lote->getId());
			factura_lote_detalle_data::save($facturalotedetalle,$this->connexion);
		}


		foreach($factura_lote->getfactura_modelos() as $facturamodelo) {
			$facturamodelo->setid_factura_lote($factura_lote->getId());
			factura_modelo_data::save($facturamodelo,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($factura_lote->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($factura_lote->getsucursal(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($factura_lote->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($factura_lote->getperiodo(),$this->connexion);
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($factura_lote->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				cliente_data::save($factura_lote->getcliente(),$this->connexion);
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				vendedor_data::save($factura_lote->getvendedor(),$this->connexion);
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'termino_pago') {
				termino_pago_cliente_data::save($factura_lote->gettermino_pago(),$this->connexion);
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				moneda_data::save($factura_lote->getmoneda(),$this->connexion);
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($factura_lote->getestado(),$this->connexion);
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				asiento_data::save($factura_lote->getasiento(),$this->connexion);
				continue;
			}

			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				documento_cuenta_cobrar_data::save($factura_lote->getdocumento_cuenta_cobrar(),$this->connexion);
				continue;
			}

			if($clas->clas==kardex::$class.'') {
				kardex_data::save($factura_lote->getkardex(),$this->connexion);
				continue;
			}


			if($clas->clas==factura_lote_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($factura_lote->getfactura_lote_detalles() as $facturalotedetalle) {
					$facturalotedetalle->setid_factura_lote($factura_lote->getId());
					factura_lote_detalle_data::save($facturalotedetalle,$this->connexion);
				}

				continue;
			}

			if($clas->clas==factura_modelo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($factura_lote->getfactura_modelos() as $facturamodelo) {
					$facturamodelo->setid_factura_lote($factura_lote->getId());
					factura_modelo_data::save($facturamodelo,$this->connexion);
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
			empresa_data::save($factura_lote->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($factura_lote->getsucursal(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($factura_lote->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($factura_lote->getperiodo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($factura_lote->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($factura_lote->getcliente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			vendedor_data::save($factura_lote->getvendedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'termino_pago') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_cliente_data::save($factura_lote->gettermino_pago(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			moneda_data::save($factura_lote->getmoneda(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($factura_lote->getestado(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			asiento_data::save($factura_lote->getasiento(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			documento_cuenta_cobrar_data::save($factura_lote->getdocumento_cuenta_cobrar(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			kardex_data::save($factura_lote->getkardex(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura_lote_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura_lote_detalle::$class);

			foreach($factura_lote->getfactura_lote_detalles() as $facturalotedetalle) {
				$facturalotedetalle->setid_factura_lote($factura_lote->getId());
				factura_lote_detalle_data::save($facturalotedetalle,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura_modelo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura_modelo::$class);

			foreach($factura_lote->getfactura_modelos() as $facturamodelo) {
				$facturamodelo->setid_factura_lote($factura_lote->getId());
				factura_modelo_data::save($facturamodelo,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($factura_lote->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($factura_lote->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sucursal_data::save($factura_lote->getsucursal(),$this->connexion);
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepSave($factura_lote->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($factura_lote->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($factura_lote->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($factura_lote->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($factura_lote->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		usuario_data::save($factura_lote->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($factura_lote->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cliente_data::save($factura_lote->getcliente(),$this->connexion);
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepSave($factura_lote->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		vendedor_data::save($factura_lote->getvendedor(),$this->connexion);
		$vendedorLogic= new vendedor_logic($this->connexion);
		$vendedorLogic->deepSave($factura_lote->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		termino_pago_cliente_data::save($factura_lote->gettermino_pago(),$this->connexion);
		$termino_pagoLogic= new termino_pago_cliente_logic($this->connexion);
		$termino_pagoLogic->deepSave($factura_lote->gettermino_pago(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		moneda_data::save($factura_lote->getmoneda(),$this->connexion);
		$monedaLogic= new moneda_logic($this->connexion);
		$monedaLogic->deepSave($factura_lote->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		estado_data::save($factura_lote->getestado(),$this->connexion);
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepSave($factura_lote->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		asiento_data::save($factura_lote->getasiento(),$this->connexion);
		$asientoLogic= new asiento_logic($this->connexion);
		$asientoLogic->deepSave($factura_lote->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		documento_cuenta_cobrar_data::save($factura_lote->getdocumento_cuenta_cobrar(),$this->connexion);
		$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
		$documento_cuenta_cobrarLogic->deepSave($factura_lote->getdocumento_cuenta_cobrar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		kardex_data::save($factura_lote->getkardex(),$this->connexion);
		$kardexLogic= new kardex_logic($this->connexion);
		$kardexLogic->deepSave($factura_lote->getkardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($factura_lote->getfactura_lote_detalles() as $facturalotedetalle) {
			$facturalotedetalleLogic= new factura_lote_detalle_logic($this->connexion);
			$facturalotedetalle->setid_factura_lote($factura_lote->getId());
			factura_lote_detalle_data::save($facturalotedetalle,$this->connexion);
			$facturalotedetalleLogic->deepSave($facturalotedetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($factura_lote->getfactura_modelos() as $facturamodelo) {
			$facturamodeloLogic= new factura_modelo_logic($this->connexion);
			$facturamodelo->setid_factura_lote($factura_lote->getId());
			factura_modelo_data::save($facturamodelo,$this->connexion);
			$facturamodeloLogic->deepSave($facturamodelo,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($factura_lote->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($factura_lote->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($factura_lote->getsucursal(),$this->connexion);
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepSave($factura_lote->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($factura_lote->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($factura_lote->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($factura_lote->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($factura_lote->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($factura_lote->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($factura_lote->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				cliente_data::save($factura_lote->getcliente(),$this->connexion);
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepSave($factura_lote->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				vendedor_data::save($factura_lote->getvendedor(),$this->connexion);
				$vendedorLogic= new vendedor_logic($this->connexion);
				$vendedorLogic->deepSave($factura_lote->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'termino_pago') {
				termino_pago_cliente_data::save($factura_lote->gettermino_pago(),$this->connexion);
				$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
				$termino_pago_clienteLogic->deepSave($factura_lote->gettermino_pago(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				moneda_data::save($factura_lote->getmoneda(),$this->connexion);
				$monedaLogic= new moneda_logic($this->connexion);
				$monedaLogic->deepSave($factura_lote->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($factura_lote->getestado(),$this->connexion);
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepSave($factura_lote->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				asiento_data::save($factura_lote->getasiento(),$this->connexion);
				$asientoLogic= new asiento_logic($this->connexion);
				$asientoLogic->deepSave($factura_lote->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				documento_cuenta_cobrar_data::save($factura_lote->getdocumento_cuenta_cobrar(),$this->connexion);
				$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
				$documento_cuenta_cobrarLogic->deepSave($factura_lote->getdocumento_cuenta_cobrar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==kardex::$class.'') {
				kardex_data::save($factura_lote->getkardex(),$this->connexion);
				$kardexLogic= new kardex_logic($this->connexion);
				$kardexLogic->deepSave($factura_lote->getkardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==factura_lote_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($factura_lote->getfactura_lote_detalles() as $facturalotedetalle) {
					$facturalotedetalleLogic= new factura_lote_detalle_logic($this->connexion);
					$facturalotedetalle->setid_factura_lote($factura_lote->getId());
					factura_lote_detalle_data::save($facturalotedetalle,$this->connexion);
					$facturalotedetalleLogic->deepSave($facturalotedetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==factura_modelo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($factura_lote->getfactura_modelos() as $facturamodelo) {
					$facturamodeloLogic= new factura_modelo_logic($this->connexion);
					$facturamodelo->setid_factura_lote($factura_lote->getId());
					factura_modelo_data::save($facturamodelo,$this->connexion);
					$facturamodeloLogic->deepSave($facturamodelo,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($factura_lote->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($factura_lote->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($factura_lote->getsucursal(),$this->connexion);
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepSave($factura_lote->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($factura_lote->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($factura_lote->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($factura_lote->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($factura_lote->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($factura_lote->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($factura_lote->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($factura_lote->getcliente(),$this->connexion);
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepSave($factura_lote->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			vendedor_data::save($factura_lote->getvendedor(),$this->connexion);
			$vendedorLogic= new vendedor_logic($this->connexion);
			$vendedorLogic->deepSave($factura_lote->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'termino_pago') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_cliente_data::save($factura_lote->gettermino_pago_cliente(),$this->connexion);
			$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
			$termino_pago_clienteLogic->deepSave($factura_lote->gettermino_pago(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			moneda_data::save($factura_lote->getmoneda(),$this->connexion);
			$monedaLogic= new moneda_logic($this->connexion);
			$monedaLogic->deepSave($factura_lote->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($factura_lote->getestado(),$this->connexion);
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepSave($factura_lote->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			asiento_data::save($factura_lote->getasiento(),$this->connexion);
			$asientoLogic= new asiento_logic($this->connexion);
			$asientoLogic->deepSave($factura_lote->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			documento_cuenta_cobrar_data::save($factura_lote->getdocumento_cuenta_cobrar(),$this->connexion);
			$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
			$documento_cuenta_cobrarLogic->deepSave($factura_lote->getdocumento_cuenta_cobrar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			kardex_data::save($factura_lote->getkardex(),$this->connexion);
			$kardexLogic= new kardex_logic($this->connexion);
			$kardexLogic->deepSave($factura_lote->getkardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura_lote_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura_lote_detalle::$class);

			foreach($factura_lote->getfactura_lote_detalles() as $facturalotedetalle) {
				$facturalotedetalleLogic= new factura_lote_detalle_logic($this->connexion);
				$facturalotedetalle->setid_factura_lote($factura_lote->getId());
				factura_lote_detalle_data::save($facturalotedetalle,$this->connexion);
				$facturalotedetalleLogic->deepSave($facturalotedetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura_modelo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura_modelo::$class);

			foreach($factura_lote->getfactura_modelos() as $facturamodelo) {
				$facturamodeloLogic= new factura_modelo_logic($this->connexion);
				$facturamodelo->setid_factura_lote($factura_lote->getId());
				factura_modelo_data::save($facturamodelo,$this->connexion);
				$facturamodeloLogic->deepSave($facturamodelo,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				factura_lote_data::save($factura_lote, $this->connexion);
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
			
			$this->deepLoad($this->factura_lote,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->factura_lotes as $factura_lote) {
				$this->deepLoad($factura_lote,$isDeep,$deepLoadType,$clases);
								
				factura_lote_util::refrescarFKDescripciones($this->factura_lotes);
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
			
			foreach($this->factura_lotes as $factura_lote) {
				$this->deepLoad($factura_lote,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->factura_lote,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->factura_lotes as $factura_lote) {
				$this->deepSave($factura_lote,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->factura_lotes as $factura_lote) {
				$this->deepSave($factura_lote,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(sucursal::$class);
				$classes[]=new Classe(ejercicio::$class);
				$classes[]=new Classe(periodo::$class);
				$classes[]=new Classe(usuario::$class);
				$classes[]=new Classe(cliente::$class);
				$classes[]=new Classe(vendedor::$class);
				$classes[]=new Classe(termino_pago_cliente::$class);
				$classes[]=new Classe(moneda::$class);
				$classes[]=new Classe(estado::$class);
				$classes[]=new Classe(asiento::$class);
				$classes[]=new Classe(documento_cuenta_cobrar::$class);
				$classes[]=new Classe(kardex::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==sucursal::$class) {
						$classes[]=new Classe(sucursal::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==ejercicio::$class) {
						$classes[]=new Classe(ejercicio::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==periodo::$class) {
						$classes[]=new Classe(periodo::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==usuario::$class) {
						$classes[]=new Classe(usuario::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==cliente::$class) {
						$classes[]=new Classe(cliente::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==vendedor::$class) {
						$classes[]=new Classe(vendedor::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==termino_pago_cliente::$class) {
						$classes[]=new Classe(termino_pago_cliente::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==moneda::$class) {
						$classes[]=new Classe(moneda::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==estado::$class) {
						$classes[]=new Classe(estado::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==asiento::$class) {
						$classes[]=new Classe(asiento::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==documento_cuenta_cobrar::$class) {
						$classes[]=new Classe(documento_cuenta_cobrar::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==kardex::$class) {
						$classes[]=new Classe(kardex::$class);
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
					if($clas->clas==sucursal::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(sucursal::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==ejercicio::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(ejercicio::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==periodo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(periodo::$class);
				}

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

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cliente::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==vendedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(vendedor::$class);
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

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==moneda::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(moneda::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==estado::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(estado::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==asiento::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==documento_cuenta_cobrar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(documento_cuenta_cobrar::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
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
	
	public static function getClassesRelsOf(array $classesP,string $deepLoadType) : array {
		try {
			 $classes=array();			
			
			if($deepLoadType==DeepLoadType::$NONE) {
				
				$classes[]=new Classe(factura_lote_detalle::$class);
				$classes[]=new Classe(factura_modelo::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==factura_lote_detalle::$class) {
						$classes[]=new Classe(factura_lote_detalle::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==factura_modelo::$class) {
						$classes[]=new Classe(factura_modelo::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==factura_lote_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(factura_lote_detalle::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==factura_modelo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(factura_modelo::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getfactura_lote() : ?factura_lote {	
		/*
		factura_lote_logic_add::checkfactura_loteToGet($this->factura_lote,$this->datosCliente);
		factura_lote_logic_add::updatefactura_loteToGet($this->factura_lote);
		*/
			
		return $this->factura_lote;
	}
		
	public function setfactura_lote(factura_lote $newfactura_lote) {
		$this->factura_lote = $newfactura_lote;
	}
	
	public function getfactura_lotes() : array {		
		/*
		factura_lote_logic_add::checkfactura_loteToGets($this->factura_lotes,$this->datosCliente);
		
		foreach ($this->factura_lotes as $factura_loteLocal ) {
			factura_lote_logic_add::updatefactura_loteToGet($factura_loteLocal);
		}
		*/
		
		return $this->factura_lotes;
	}
	
	public function setfactura_lotes(array $newfactura_lotes) {
		$this->factura_lotes = $newfactura_lotes;
	}
	
	public function getfactura_loteDataAccess() : factura_lote_data {
		return $this->factura_loteDataAccess;
	}
	
	public function setfactura_loteDataAccess(factura_lote_data $newfactura_loteDataAccess) {
		$this->factura_loteDataAccess = $newfactura_loteDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        factura_lote_carga::$CONTROLLER;;        
		
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
