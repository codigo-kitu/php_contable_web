<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentaspagar\proveedor\business\data;

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

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\general\tipo_persona\business\data\tipo_persona_data;
use com\bydan\contabilidad\general\tipo_persona\business\entity\tipo_persona;

use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\business\data\categoria_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\business\entity\categoria_proveedor;

use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\business\data\giro_negocio_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\business\entity\giro_negocio_proveedor;

use com\bydan\contabilidad\seguridad\pais\business\data\pais_data;
use com\bydan\contabilidad\seguridad\pais\business\entity\pais;

use com\bydan\contabilidad\seguridad\provincia\business\data\provincia_data;
use com\bydan\contabilidad\seguridad\provincia\business\entity\provincia;

use com\bydan\contabilidad\seguridad\ciudad\business\data\ciudad_data;
use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;

use com\bydan\contabilidad\facturacion\vendedor\business\data\vendedor_data;
use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\data\termino_pago_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;

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

use com\bydan\contabilidad\inventario\lista_precio\business\data\lista_precio_data;
use com\bydan\contabilidad\inventario\orden_compra\business\data\orden_compra_data;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\data\cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\business\data\imagen_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\business\data\documento_proveedor_data;
use com\bydan\contabilidad\inventario\otro_suplidor\business\data\otro_suplidor_data;


interface proveedor_dataI {	
	
	/*MANTENIMIENTO*/
	public static function save(proveedor $proveedor,Connexion $connexion);	
	public static function savePrepared(proveedor $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function insert(proveedor $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function update(proveedor $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function delete(proveedor $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);
	
	/*EJECUTAR QUERY*/
	public function executeQuery(Connexion $connexion, string $sQueryExecute);	
	public function executeQueryValor(Connexion $connexion, string $sQueryExecuteValor,string $sNombreCampo);
	
	/*TRAER ENTITY*/
	public function getEntity(Connexion $connexion, ?int $id) : ?proveedor;	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?proveedor;
	 
	/*TRAER ENTITIES*/
	public function getEntities(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : array;	
	public function getEntitiesConnexionQuerySelectQueryWhere(Connexion $connexion,string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) : array;	
	public function getEntitiesSimpleQueryBuild(Connexion $connexion,string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) : array;
	
	/*----------------------- SELECT COUNT ------------------------*/	
	public function getCountSelect(Connexion $connexion) : int;	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,proveedor $entity,Connexion $connexion);
		
	/*-------------------------------- AUXILIARES --------------------------------*/	
	public function getEntityBaseResult(string $strPrefijo,proveedor $entity,$resultSet) : proveedor;	
	public static function addPrepareStatementParams(string $type,proveedor $proveedor,$prepare_statement,Connexion $connexion);	
	public static function getPrepareStatementParamsArray(string $type,proveedor $proveedor,$prepare_statement,Connexion $connexion) : array;	
	public static function preparedQuery(string $sql,array $params) : string;
	
}
?>
