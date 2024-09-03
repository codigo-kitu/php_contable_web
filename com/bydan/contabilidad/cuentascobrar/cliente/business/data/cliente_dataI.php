<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascobrar\cliente\business\data;

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

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\general\tipo_persona\business\data\tipo_persona_data;
use com\bydan\contabilidad\general\tipo_persona\business\entity\tipo_persona;

use com\bydan\contabilidad\cuentascobrar\categoria_cliente\business\data\categoria_cliente_data;
use com\bydan\contabilidad\cuentascobrar\categoria_cliente\business\entity\categoria_cliente;

use com\bydan\contabilidad\inventario\tipo_precio\business\data\tipo_precio_data;
use com\bydan\contabilidad\inventario\tipo_precio\business\entity\tipo_precio;

use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\business\data\giro_negocio_cliente_data;
use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\business\entity\giro_negocio_cliente;

use com\bydan\contabilidad\seguridad\pais\business\data\pais_data;
use com\bydan\contabilidad\seguridad\pais\business\entity\pais;

use com\bydan\contabilidad\seguridad\provincia\business\data\provincia_data;
use com\bydan\contabilidad\seguridad\provincia\business\entity\provincia;

use com\bydan\contabilidad\seguridad\ciudad\business\data\ciudad_data;
use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;

use com\bydan\contabilidad\facturacion\vendedor\business\data\vendedor_data;
use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\data\termino_pago_cliente_data;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;

use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;

use com\bydan\contabilidad\facturacion\impuesto\business\data\impuesto_data;
use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;

use com\bydan\contabilidad\facturacion\retencion\business\data\retencion_data;
use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;

use com\bydan\contabilidad\facturacion\retencion_fuente\business\data\retencion_fuente_data;
use com\bydan\contabilidad\facturacion\retencion_fuente\business\entity\retencion_fuente;

use com\bydan\contabilidad\facturacion\retencion_ica\business\data\retencion_ica_data;
use com\bydan\contabilidad\facturacion\retencion_ica\business\entity\retencion_ica;

use com\bydan\contabilidad\facturacion\otro_impuesto\business\data\otro_impuesto_data;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;

//REL

use com\bydan\contabilidad\facturacion\devolucion_factura\business\data\devolucion_factura_data;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\data\cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\business\data\documento_cliente_data;
use com\bydan\contabilidad\estimados\estimado\business\data\estimado_data;
use com\bydan\contabilidad\cuentascobrar\imagen_cliente\business\data\imagen_cliente_data;
use com\bydan\contabilidad\facturacion\factura\business\data\factura_data;
use com\bydan\contabilidad\estimados\consignacion\business\data\consignacion_data;
use com\bydan\contabilidad\inventario\lista_cliente\business\data\lista_cliente_data;


interface cliente_dataI {	
	
	/*MANTENIMIENTO*/
	public static function save(cliente $cliente,Connexion $connexion);	
	public static function savePrepared(cliente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function insert(cliente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function update(cliente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function delete(cliente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);
	
	/*EJECUTAR QUERY*/
	public function executeQuery(Connexion $connexion, string $sQueryExecute);	
	public function executeQueryValor(Connexion $connexion, string $sQueryExecuteValor,string $sNombreCampo);
	
	/*TRAER ENTITY*/
	public function getEntity(Connexion $connexion, ?int $id) : ?cliente;	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?cliente;
	 
	/*TRAER ENTITIES*/
	public function getEntities(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : array;	
	public function getEntitiesConnexionQuerySelectQueryWhere(Connexion $connexion,string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) : array;	
	public function getEntitiesSimpleQueryBuild(Connexion $connexion,string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) : array;
	
	/*----------------------- SELECT COUNT ------------------------*/	
	public function getCountSelect(Connexion $connexion) : int;	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,cliente $entity,Connexion $connexion);
		
	/*-------------------------------- AUXILIARES --------------------------------*/	
	public function getEntityBaseResult(string $strPrefijo,cliente $entity,$resultSet) : cliente;	
	public static function addPrepareStatementParams(string $type,cliente $cliente,$prepare_statement,Connexion $connexion);	
	public static function getPrepareStatementParamsArray(string $type,cliente $cliente,$prepare_statement,Connexion $connexion) : array;	
	public static function preparedQuery(string $sql,array $params) : string;
	
}
?>
