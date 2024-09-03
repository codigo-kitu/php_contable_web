<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\facturacion\devolucion_factura\business\data;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\FuncionesSql;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\data\GetEntitiesDataAccessHelper;

/*use com\bydan\framework\contabilidad\business\entity\GeneralEntity;*/
use com\bydan\framework\contabilidad\business\entity\DatoGeneral;
use com\bydan\framework\contabilidad\business\entity\DatoGeneralMinimo;
use com\bydan\framework\contabilidad\business\entity\DatoGeneralMaximo;
use com\bydan\framework\contabilidad\business\logic\QueryWhereSelectParameters;
use com\bydan\framework\contabilidad\business\logic\Pagination;
use com\bydan\framework\contabilidad\business\data\DataAccessHelper;
use com\bydan\framework\contabilidad\util\Connexion;
use com\bydan\framework\contabilidad\util\ParametersType;

use com\bydan\contabilidad\facturacion\devolucion_factura\business\entity\devolucion_factura;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\general\sucursal\business\data\sucursal_data;
use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;

use com\bydan\contabilidad\contabilidad\ejercicio\business\data\ejercicio_data;
use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;

use com\bydan\contabilidad\contabilidad\periodo\business\data\periodo_data;
use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;

use com\bydan\contabilidad\seguridad\usuario\business\data\usuario_data;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;

use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;

use com\bydan\contabilidad\facturacion\vendedor\business\data\vendedor_data;
use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\data\termino_pago_cliente_data;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;

use com\bydan\contabilidad\contabilidad\moneda\business\data\moneda_data;
use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;

use com\bydan\contabilidad\general\estado\business\data\estado_data;
use com\bydan\contabilidad\general\estado\business\entity\estado;

use com\bydan\contabilidad\contabilidad\asiento\business\data\asiento_data;
use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;

use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\data\documento_cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\entity\documento_cuenta_cobrar;

use com\bydan\contabilidad\inventario\kardex\business\data\kardex_data;
use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;

//REL

use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\business\data\devolucion_factura_detalle_data;


interface devolucion_factura_dataI {	
	
	/*MANTENIMIENTO*/
	public static function save(devolucion_factura $devolucion_factura,Connexion $connexion);	
	public static function savePrepared(devolucion_factura $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function insert(devolucion_factura $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function update(devolucion_factura $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function delete(devolucion_factura $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);
	
	/*EJECUTAR QUERY*/
	public function executeQuery(Connexion $connexion, string $sQueryExecute);	
	public function executeQueryValor(Connexion $connexion, string $sQueryExecuteValor,string $sNombreCampo);
	
	/*TRAER ENTITY*/
	public function getEntity(Connexion $connexion, ?int $id) : ?devolucion_factura;	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?devolucion_factura;
	 
	/*TRAER ENTITIES*/
	public function getEntities(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : array;	
	public function getEntitiesConnexionQuerySelectQueryWhere(Connexion $connexion,string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) : array;	
	public function getEntitiesSimpleQueryBuild(Connexion $connexion,string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) : array;
	
	/*----------------------- SELECT COUNT ------------------------*/	
	public function getCountSelect(Connexion $connexion) : int;	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,devolucion_factura $entity,Connexion $connexion);
		
	/*-------------------------------- AUXILIARES --------------------------------*/	
	public function getEntityBaseResult(string $strPrefijo,devolucion_factura $entity,$resultSet) : devolucion_factura;	
	public static function addPrepareStatementParams(string $type,devolucion_factura $devolucion_factura,$prepare_statement,Connexion $connexion);	
	public static function getPrepareStatementParamsArray(string $type,devolucion_factura $devolucion_factura,$prepare_statement,Connexion $connexion) : array;	
	public static function preparedQuery(string $sql,array $params) : string;
	
}
?>
