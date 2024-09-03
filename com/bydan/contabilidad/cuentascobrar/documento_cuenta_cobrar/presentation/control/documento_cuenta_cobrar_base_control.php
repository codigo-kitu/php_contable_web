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

namespace com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\presentation\control;

use Exception;

include_once('com/bydan/framework/contabilidad/util/Constantes.php');
use com\bydan\framework\contabilidad\util\Constantes;

include_once(Constantes::$PATH_REL.'com/bydan/framework/contabilidad/util/Funciones.php');
use com\bydan\framework\contabilidad\util\Funciones;

use com\bydan\framework\contabilidad\util\FuncionesWebArbol;

include_once(Constantes::$PATH_REL.'com/bydan/framework/contabilidad/util/PaqueteTipo.php');
use com\bydan\framework\contabilidad\util\PaqueteTipo;

use com\bydan\framework\contabilidad\util\ControlTipo;
use com\bydan\framework\contabilidad\util\DeepLoadType;
use com\bydan\framework\contabilidad\util\EventoTipo;
use com\bydan\framework\contabilidad\util\EventoSubTipo;
use com\bydan\framework\contabilidad\util\EventoGlobalTipo;
use com\bydan\framework\contabilidad\util\FuncionesObject;
use com\bydan\framework\contabilidad\util\Connexion;

use com\bydan\framework\contabilidad\util\excel\ExcelHelper;
use com\bydan\framework\contabilidad\util\pdf\FpdfHelper;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Mensajes;
use com\bydan\framework\contabilidad\business\entity\SelectItem;

//use com\bydan\framework\contabilidad\business\entity\DatoGeneralMinimo;
//use com\bydan\framework\contabilidad\business\logic\DatosDeep;

use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\ConexionController;

use com\bydan\framework\contabilidad\business\data\ModelBase;

use com\bydan\framework\contabilidad\business\logic\DatosCliente;
use com\bydan\framework\contabilidad\business\logic\Pagination;

use com\bydan\framework\contabilidad\presentation\report\CellReport;
use com\bydan\framework\contabilidad\presentation\templating\Template;

use com\bydan\framework\contabilidad\presentation\web\control\ControllerBase;

use com\bydan\framework\contabilidad\presentation\web\SessionBase;
use com\bydan\framework\contabilidad\presentation\web\PaginationLink;
use com\bydan\framework\contabilidad\presentation\web\HistoryWeb;

use com\bydan\framework\contabilidad\business\entity\MaintenanceType;
use com\bydan\framework\contabilidad\business\entity\ParameterDivSecciones;
//use com\bydan\framework\contabilidad\business\entity\Classe;
//use com\bydan\framework\contabilidad\presentation\web\SessionBase;

use com\bydan\framework\globales\seguridad\logic\GlobalSeguridad;

use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\perfil_opcion\business\entity\perfil_opcion;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_param_return;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_param_return;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\sistema\business\logic\sistema_logic_add;
use com\bydan\contabilidad\seguridad\resumen_usuario\business\logic\resumen_usuario_logic_add;

use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\entity\documento_cuenta_cobrar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/documento_cuenta_cobrar/util/documento_cuenta_cobrar_carga.php');
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_carga;

use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_param_return;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\logic\documento_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\presentation\session\documento_cuenta_cobrar_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\general\sucursal\business\logic\sucursal_logic;
use com\bydan\contabilidad\general\sucursal\util\sucursal_carga;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\business\logic\ejercicio_logic;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_carga;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\business\logic\periodo_logic;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_carga;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;

use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\entity\forma_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\logic\forma_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\util\forma_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\util\forma_pago_cliente_util;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;

//REL


use com\bydan\contabilidad\facturacion\factura\util\factura_carga;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;
use com\bydan\contabilidad\facturacion\factura\presentation\session\factura_session;

use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\util\imagen_documento_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\util\imagen_documento_cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\presentation\session\imagen_documento_cuenta_cobrar_session;

use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_carga;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_util;
use com\bydan\contabilidad\facturacion\factura_lote\presentation\session\factura_lote_session;

use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_util;
use com\bydan\contabilidad\facturacion\devolucion_factura\presentation\session\devolucion_factura_session;


/*CARGA ARCHIVOS FRAMEWORK*/
documento_cuenta_cobrar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
documento_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
documento_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class documento_cuenta_cobrar_base_control extends documento_cuenta_cobrar_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->documento_cuenta_cobrarClase==null) {		
				$this->documento_cuenta_cobrarClase=new documento_cuenta_cobrar();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_empresa',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_sucursal')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_sucursal',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ejercicio')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_ejercicio',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_periodo')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_periodo',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_usuario')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_usuario',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cliente')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cliente',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_forma_pago_cliente')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_forma_pago_cliente',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_corriente')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta_corriente',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->documento_cuenta_cobrarClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->documento_cuenta_cobrarClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->documento_cuenta_cobrarClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->documento_cuenta_cobrarClase->setid_sucursal((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_sucursal'));
				
				$this->documento_cuenta_cobrarClase->setid_ejercicio((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ejercicio'));
				
				$this->documento_cuenta_cobrarClase->setid_periodo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_periodo'));
				
				$this->documento_cuenta_cobrarClase->setid_usuario((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_usuario'));
				
				$this->documento_cuenta_cobrarClase->setnumero($this->getDataCampoFormTabla('form'.$this->strSufijo,'numero'));
				
				$this->documento_cuenta_cobrarClase->setid_cliente((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cliente'));
				
				$this->documento_cuenta_cobrarClase->settipo($this->getDataCampoFormTabla('form'.$this->strSufijo,'tipo'));
				
				$this->documento_cuenta_cobrarClase->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_emision')));
				
				$this->documento_cuenta_cobrarClase->setdescripcion($this->getDataCampoFormTabla('form'.$this->strSufijo,'descripcion'));
				
				$this->documento_cuenta_cobrarClase->setmonto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'monto'));
				
				$this->documento_cuenta_cobrarClase->setmonto_parcial((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'monto_parcial'));
				
				$this->documento_cuenta_cobrarClase->setmoneda($this->getDataCampoFormTabla('form'.$this->strSufijo,'moneda'));
				
				$this->documento_cuenta_cobrarClase->setfecha_vence(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_vence')));
				
				$this->documento_cuenta_cobrarClase->setnumero_de_pagos((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'numero_de_pagos'));
				
				$this->documento_cuenta_cobrarClase->setbalance((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'balance'));
				
				$this->documento_cuenta_cobrarClase->setnumero_pagado($this->getDataCampoFormTabla('form'.$this->strSufijo,'numero_pagado'));
				
				$this->documento_cuenta_cobrarClase->setid_pagado((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_pagado'));
				
				$this->documento_cuenta_cobrarClase->setmodulo_origen($this->getDataCampoFormTabla('form'.$this->strSufijo,'modulo_origen'));
				
				$this->documento_cuenta_cobrarClase->setid_origen((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_origen'));
				
				$this->documento_cuenta_cobrarClase->setmodulo_destino($this->getDataCampoFormTabla('form'.$this->strSufijo,'modulo_destino'));
				
				$this->documento_cuenta_cobrarClase->setid_destino((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_destino'));
				
				$this->documento_cuenta_cobrarClase->setnombre_pc($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre_pc'));
				
				$this->documento_cuenta_cobrarClase->sethora(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'hora')));
				
				$this->documento_cuenta_cobrarClase->setmonto_mora((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'monto_mora'));
				
				$this->documento_cuenta_cobrarClase->setinteres_mora((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'interes_mora'));
				
				$this->documento_cuenta_cobrarClase->setdias_gracia_mora((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'dias_gracia_mora'));
				
				$this->documento_cuenta_cobrarClase->setinstrumento_pago($this->getDataCampoFormTabla('form'.$this->strSufijo,'instrumento_pago'));
				
				$this->documento_cuenta_cobrarClase->settipo_cambio((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'tipo_cambio'));
				
				$this->documento_cuenta_cobrarClase->setnumero_cliente($this->getDataCampoFormTabla('form'.$this->strSufijo,'numero_cliente'));
				
				$this->documento_cuenta_cobrarClase->setclase_registro($this->getDataCampoFormTabla('form'.$this->strSufijo,'clase_registro'));
				
				$this->documento_cuenta_cobrarClase->setestado_registro($this->getDataCampoFormTabla('form'.$this->strSufijo,'estado_registro'));
				
				$this->documento_cuenta_cobrarClase->setmotivo_anulacion($this->getDataCampoFormTabla('form'.$this->strSufijo,'motivo_anulacion'));
				
				$this->documento_cuenta_cobrarClase->setimpuesto_1((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'impuesto_1'));
				
				$this->documento_cuenta_cobrarClase->setimpuesto_2((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'impuesto_2'));
				
				$this->documento_cuenta_cobrarClase->setimpuesto_incluido($this->getDataCampoFormTabla('form'.$this->strSufijo,'impuesto_incluido'));
				
				$this->documento_cuenta_cobrarClase->setobservaciones($this->getDataCampoFormTabla('form'.$this->strSufijo,'observaciones'));
				
				$this->documento_cuenta_cobrarClase->setgrupo_pago($this->getDataCampoFormTabla('form'.$this->strSufijo,'grupo_pago'));
				
				$this->documento_cuenta_cobrarClase->settermino_idpv((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'termino_idpv'));
				
				$this->documento_cuenta_cobrarClase->setid_forma_pago_cliente((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_forma_pago_cliente'));
				
				$this->documento_cuenta_cobrarClase->setnro_pago($this->getDataCampoFormTabla('form'.$this->strSufijo,'nro_pago'));
				
				$this->documento_cuenta_cobrarClase->setref_pago($this->getDataCampoFormTabla('form'.$this->strSufijo,'ref_pago'));
				
				$this->documento_cuenta_cobrarClase->setfecha_hora(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_hora')));
				
				$this->documento_cuenta_cobrarClase->setid_base((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_base'));
				
				$this->documento_cuenta_cobrarClase->setid_cuenta_corriente((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_corriente'));
				
				$this->documento_cuenta_cobrarClase->setncf($this->getDataCampoFormTabla('form'.$this->strSufijo,'ncf'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->documento_cuenta_cobrarModel->set($this->documento_cuenta_cobrarClase);
				
				/*$this->documento_cuenta_cobrarModel->set($this->migrarModeldocumento_cuenta_cobrar($this->documento_cuenta_cobrarClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setId($this->documento_cuenta_cobrarClase->getId());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setVersionRow($this->documento_cuenta_cobrarClase->getVersionRow());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setVersionRow($this->documento_cuenta_cobrarClase->getVersionRow());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setid_empresa($this->documento_cuenta_cobrarClase->getid_empresa());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setid_sucursal($this->documento_cuenta_cobrarClase->getid_sucursal());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setid_ejercicio($this->documento_cuenta_cobrarClase->getid_ejercicio());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setid_periodo($this->documento_cuenta_cobrarClase->getid_periodo());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setid_usuario($this->documento_cuenta_cobrarClase->getid_usuario());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setnumero($this->documento_cuenta_cobrarClase->getnumero());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setid_cliente($this->documento_cuenta_cobrarClase->getid_cliente());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->settipo($this->documento_cuenta_cobrarClase->gettipo());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setfecha_emision($this->documento_cuenta_cobrarClase->getfecha_emision());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setdescripcion($this->documento_cuenta_cobrarClase->getdescripcion());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setmonto($this->documento_cuenta_cobrarClase->getmonto());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setmonto_parcial($this->documento_cuenta_cobrarClase->getmonto_parcial());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setmoneda($this->documento_cuenta_cobrarClase->getmoneda());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setfecha_vence($this->documento_cuenta_cobrarClase->getfecha_vence());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setnumero_de_pagos($this->documento_cuenta_cobrarClase->getnumero_de_pagos());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setbalance($this->documento_cuenta_cobrarClase->getbalance());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setnumero_pagado($this->documento_cuenta_cobrarClase->getnumero_pagado());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setid_pagado($this->documento_cuenta_cobrarClase->getid_pagado());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setmodulo_origen($this->documento_cuenta_cobrarClase->getmodulo_origen());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setid_origen($this->documento_cuenta_cobrarClase->getid_origen());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setmodulo_destino($this->documento_cuenta_cobrarClase->getmodulo_destino());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setid_destino($this->documento_cuenta_cobrarClase->getid_destino());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setnombre_pc($this->documento_cuenta_cobrarClase->getnombre_pc());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->sethora($this->documento_cuenta_cobrarClase->gethora());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setmonto_mora($this->documento_cuenta_cobrarClase->getmonto_mora());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setinteres_mora($this->documento_cuenta_cobrarClase->getinteres_mora());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setdias_gracia_mora($this->documento_cuenta_cobrarClase->getdias_gracia_mora());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setinstrumento_pago($this->documento_cuenta_cobrarClase->getinstrumento_pago());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->settipo_cambio($this->documento_cuenta_cobrarClase->gettipo_cambio());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setnumero_cliente($this->documento_cuenta_cobrarClase->getnumero_cliente());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setclase_registro($this->documento_cuenta_cobrarClase->getclase_registro());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setestado_registro($this->documento_cuenta_cobrarClase->getestado_registro());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setmotivo_anulacion($this->documento_cuenta_cobrarClase->getmotivo_anulacion());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setimpuesto_1($this->documento_cuenta_cobrarClase->getimpuesto_1());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setimpuesto_2($this->documento_cuenta_cobrarClase->getimpuesto_2());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setimpuesto_incluido($this->documento_cuenta_cobrarClase->getimpuesto_incluido());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setobservaciones($this->documento_cuenta_cobrarClase->getobservaciones());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setgrupo_pago($this->documento_cuenta_cobrarClase->getgrupo_pago());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->settermino_idpv($this->documento_cuenta_cobrarClase->gettermino_idpv());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setid_forma_pago_cliente($this->documento_cuenta_cobrarClase->getid_forma_pago_cliente());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setnro_pago($this->documento_cuenta_cobrarClase->getnro_pago());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setref_pago($this->documento_cuenta_cobrarClase->getref_pago());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setfecha_hora($this->documento_cuenta_cobrarClase->getfecha_hora());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setid_base($this->documento_cuenta_cobrarClase->getid_base());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setid_cuenta_corriente($this->documento_cuenta_cobrarClase->getid_cuenta_corriente());	
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setncf($this->documento_cuenta_cobrarClase->getncf());	
		} else {
			$this->documento_cuenta_cobrarClase->setId($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getId());	
			$this->documento_cuenta_cobrarClase->setVersionRow($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getVersionRow());	
			$this->documento_cuenta_cobrarClase->setVersionRow($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getVersionRow());	
			$this->documento_cuenta_cobrarClase->setid_empresa($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getid_empresa());	
			$this->documento_cuenta_cobrarClase->setid_sucursal($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getid_sucursal());	
			$this->documento_cuenta_cobrarClase->setid_ejercicio($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getid_ejercicio());	
			$this->documento_cuenta_cobrarClase->setid_periodo($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getid_periodo());	
			$this->documento_cuenta_cobrarClase->setid_usuario($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getid_usuario());	
			$this->documento_cuenta_cobrarClase->setnumero($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getnumero());	
			$this->documento_cuenta_cobrarClase->setid_cliente($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getid_cliente());	
			$this->documento_cuenta_cobrarClase->settipo($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->gettipo());	
			$this->documento_cuenta_cobrarClase->setfecha_emision($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getfecha_emision());	
			$this->documento_cuenta_cobrarClase->setdescripcion($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getdescripcion());	
			$this->documento_cuenta_cobrarClase->setmonto($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getmonto());	
			$this->documento_cuenta_cobrarClase->setmonto_parcial($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getmonto_parcial());	
			$this->documento_cuenta_cobrarClase->setmoneda($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getmoneda());	
			$this->documento_cuenta_cobrarClase->setfecha_vence($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getfecha_vence());	
			$this->documento_cuenta_cobrarClase->setnumero_de_pagos($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getnumero_de_pagos());	
			$this->documento_cuenta_cobrarClase->setbalance($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getbalance());	
			$this->documento_cuenta_cobrarClase->setnumero_pagado($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getnumero_pagado());	
			$this->documento_cuenta_cobrarClase->setid_pagado($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getid_pagado());	
			$this->documento_cuenta_cobrarClase->setmodulo_origen($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getmodulo_origen());	
			$this->documento_cuenta_cobrarClase->setid_origen($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getid_origen());	
			$this->documento_cuenta_cobrarClase->setmodulo_destino($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getmodulo_destino());	
			$this->documento_cuenta_cobrarClase->setid_destino($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getid_destino());	
			$this->documento_cuenta_cobrarClase->setnombre_pc($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getnombre_pc());	
			$this->documento_cuenta_cobrarClase->sethora($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->gethora());	
			$this->documento_cuenta_cobrarClase->setmonto_mora($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getmonto_mora());	
			$this->documento_cuenta_cobrarClase->setinteres_mora($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getinteres_mora());	
			$this->documento_cuenta_cobrarClase->setdias_gracia_mora($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getdias_gracia_mora());	
			$this->documento_cuenta_cobrarClase->setinstrumento_pago($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getinstrumento_pago());	
			$this->documento_cuenta_cobrarClase->settipo_cambio($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->gettipo_cambio());	
			$this->documento_cuenta_cobrarClase->setnumero_cliente($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getnumero_cliente());	
			$this->documento_cuenta_cobrarClase->setclase_registro($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getclase_registro());	
			$this->documento_cuenta_cobrarClase->setestado_registro($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getestado_registro());	
			$this->documento_cuenta_cobrarClase->setmotivo_anulacion($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getmotivo_anulacion());	
			$this->documento_cuenta_cobrarClase->setimpuesto_1($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getimpuesto_1());	
			$this->documento_cuenta_cobrarClase->setimpuesto_2($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getimpuesto_2());	
			$this->documento_cuenta_cobrarClase->setimpuesto_incluido($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getimpuesto_incluido());	
			$this->documento_cuenta_cobrarClase->setobservaciones($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getobservaciones());	
			$this->documento_cuenta_cobrarClase->setgrupo_pago($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getgrupo_pago());	
			$this->documento_cuenta_cobrarClase->settermino_idpv($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->gettermino_idpv());	
			$this->documento_cuenta_cobrarClase->setid_forma_pago_cliente($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getid_forma_pago_cliente());	
			$this->documento_cuenta_cobrarClase->setnro_pago($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getnro_pago());	
			$this->documento_cuenta_cobrarClase->setref_pago($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getref_pago());	
			$this->documento_cuenta_cobrarClase->setfecha_hora($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getfecha_hora());	
			$this->documento_cuenta_cobrarClase->setid_base($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getid_base());	
			$this->documento_cuenta_cobrarClase->setid_cuenta_corriente($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getid_cuenta_corriente());	
			$this->documento_cuenta_cobrarClase->setncf($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getncf());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->documento_cuenta_cobrarModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_empresa') {$this->strMensajeid_empresa=$strMensajeCampo;}
		if($strNombreCampo=='id_sucursal') {$this->strMensajeid_sucursal=$strMensajeCampo;}
		if($strNombreCampo=='id_ejercicio') {$this->strMensajeid_ejercicio=$strMensajeCampo;}
		if($strNombreCampo=='id_periodo') {$this->strMensajeid_periodo=$strMensajeCampo;}
		if($strNombreCampo=='id_usuario') {$this->strMensajeid_usuario=$strMensajeCampo;}
		if($strNombreCampo=='numero') {$this->strMensajenumero=$strMensajeCampo;}
		if($strNombreCampo=='id_cliente') {$this->strMensajeid_cliente=$strMensajeCampo;}
		if($strNombreCampo=='tipo') {$this->strMensajetipo=$strMensajeCampo;}
		if($strNombreCampo=='fecha_emision') {$this->strMensajefecha_emision=$strMensajeCampo;}
		if($strNombreCampo=='descripcion') {$this->strMensajedescripcion=$strMensajeCampo;}
		if($strNombreCampo=='monto') {$this->strMensajemonto=$strMensajeCampo;}
		if($strNombreCampo=='monto_parcial') {$this->strMensajemonto_parcial=$strMensajeCampo;}
		if($strNombreCampo=='moneda') {$this->strMensajemoneda=$strMensajeCampo;}
		if($strNombreCampo=='fecha_vence') {$this->strMensajefecha_vence=$strMensajeCampo;}
		if($strNombreCampo=='numero_de_pagos') {$this->strMensajenumero_de_pagos=$strMensajeCampo;}
		if($strNombreCampo=='balance') {$this->strMensajebalance=$strMensajeCampo;}
		if($strNombreCampo=='numero_pagado') {$this->strMensajenumero_pagado=$strMensajeCampo;}
		if($strNombreCampo=='id_pagado') {$this->strMensajeid_pagado=$strMensajeCampo;}
		if($strNombreCampo=='modulo_origen') {$this->strMensajemodulo_origen=$strMensajeCampo;}
		if($strNombreCampo=='id_origen') {$this->strMensajeid_origen=$strMensajeCampo;}
		if($strNombreCampo=='modulo_destino') {$this->strMensajemodulo_destino=$strMensajeCampo;}
		if($strNombreCampo=='id_destino') {$this->strMensajeid_destino=$strMensajeCampo;}
		if($strNombreCampo=='nombre_pc') {$this->strMensajenombre_pc=$strMensajeCampo;}
		if($strNombreCampo=='hora') {$this->strMensajehora=$strMensajeCampo;}
		if($strNombreCampo=='monto_mora') {$this->strMensajemonto_mora=$strMensajeCampo;}
		if($strNombreCampo=='interes_mora') {$this->strMensajeinteres_mora=$strMensajeCampo;}
		if($strNombreCampo=='dias_gracia_mora') {$this->strMensajedias_gracia_mora=$strMensajeCampo;}
		if($strNombreCampo=='instrumento_pago') {$this->strMensajeinstrumento_pago=$strMensajeCampo;}
		if($strNombreCampo=='tipo_cambio') {$this->strMensajetipo_cambio=$strMensajeCampo;}
		if($strNombreCampo=='numero_cliente') {$this->strMensajenumero_cliente=$strMensajeCampo;}
		if($strNombreCampo=='clase_registro') {$this->strMensajeclase_registro=$strMensajeCampo;}
		if($strNombreCampo=='estado_registro') {$this->strMensajeestado_registro=$strMensajeCampo;}
		if($strNombreCampo=='motivo_anulacion') {$this->strMensajemotivo_anulacion=$strMensajeCampo;}
		if($strNombreCampo=='impuesto_1') {$this->strMensajeimpuesto_1=$strMensajeCampo;}
		if($strNombreCampo=='impuesto_2') {$this->strMensajeimpuesto_2=$strMensajeCampo;}
		if($strNombreCampo=='impuesto_incluido') {$this->strMensajeimpuesto_incluido=$strMensajeCampo;}
		if($strNombreCampo=='observaciones') {$this->strMensajeobservaciones=$strMensajeCampo;}
		if($strNombreCampo=='grupo_pago') {$this->strMensajegrupo_pago=$strMensajeCampo;}
		if($strNombreCampo=='termino_idpv') {$this->strMensajetermino_idpv=$strMensajeCampo;}
		if($strNombreCampo=='id_forma_pago_cliente') {$this->strMensajeid_forma_pago_cliente=$strMensajeCampo;}
		if($strNombreCampo=='nro_pago') {$this->strMensajenro_pago=$strMensajeCampo;}
		if($strNombreCampo=='ref_pago') {$this->strMensajeref_pago=$strMensajeCampo;}
		if($strNombreCampo=='fecha_hora') {$this->strMensajefecha_hora=$strMensajeCampo;}
		if($strNombreCampo=='id_base') {$this->strMensajeid_base=$strMensajeCampo;}
		if($strNombreCampo=='id_cuenta_corriente') {$this->strMensajeid_cuenta_corriente=$strMensajeCampo;}
		if($strNombreCampo=='ncf') {$this->strMensajencf=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajeid_sucursal='';
		$this->strMensajeid_ejercicio='';
		$this->strMensajeid_periodo='';
		$this->strMensajeid_usuario='';
		$this->strMensajenumero='';
		$this->strMensajeid_cliente='';
		$this->strMensajetipo='';
		$this->strMensajefecha_emision='';
		$this->strMensajedescripcion='';
		$this->strMensajemonto='';
		$this->strMensajemonto_parcial='';
		$this->strMensajemoneda='';
		$this->strMensajefecha_vence='';
		$this->strMensajenumero_de_pagos='';
		$this->strMensajebalance='';
		$this->strMensajenumero_pagado='';
		$this->strMensajeid_pagado='';
		$this->strMensajemodulo_origen='';
		$this->strMensajeid_origen='';
		$this->strMensajemodulo_destino='';
		$this->strMensajeid_destino='';
		$this->strMensajenombre_pc='';
		$this->strMensajehora='';
		$this->strMensajemonto_mora='';
		$this->strMensajeinteres_mora='';
		$this->strMensajedias_gracia_mora='';
		$this->strMensajeinstrumento_pago='';
		$this->strMensajetipo_cambio='';
		$this->strMensajenumero_cliente='';
		$this->strMensajeclase_registro='';
		$this->strMensajeestado_registro='';
		$this->strMensajemotivo_anulacion='';
		$this->strMensajeimpuesto_1='';
		$this->strMensajeimpuesto_2='';
		$this->strMensajeimpuesto_incluido='';
		$this->strMensajeobservaciones='';
		$this->strMensajegrupo_pago='';
		$this->strMensajetermino_idpv='';
		$this->strMensajeid_forma_pago_cliente='';
		$this->strMensajenro_pago='';
		$this->strMensajeref_pago='';
		$this->strMensajefecha_hora='';
		$this->strMensajeid_base='';
		$this->strMensajeid_cuenta_corriente='';
		$this->strMensajencf='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			*/
			
			$this->manejarRetornarExcepcion($e);
			throw $e;
		}
	}
	
	public function actualizar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));
						
			if($documento_cuenta_cobrar_session==null) {
				$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
			}
			
			if(!$this->bitEsnuevo){ 
				$this->ejecutarMantenimiento(MaintenanceType::$ACTUALIZAR);
				
				if($this->bitPostAccionSinCerrar || $this->bitPostAccionNuevo) {
					$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);					
					
				} else {
					$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
				}
				
			} else { 
				$this->nuevo();
				
				if($this->bitPostAccionSinCerrar || $this->bitPostAccionNuevo) {
					$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);					
					
					if($this->bitPostAccionNuevo) {
						$this->bitEsnuevo=true;
					}
				} else {
					$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
				}
			}						
					
			
			
			if($this->bitPostAccionSinCerrar || $this->bitPostAccionNuevo) {				
				$this->strVisibleTablaElementos='table-row';
				$this->strVisibleTablaAcciones='table-row';	
				
			} else {
				/*OCULTA CAMPOS Y ACCIONES*/
				$this->cancelarControles();
			}
			
			
			if($this->bitPostAccionSinCerrar) {
				$id=$this->getDataFormId();
					
				if($id!=null && $id>0) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->documento_cuenta_cobrarLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->documento_cuenta_cobrarActual =$this->documento_cuenta_cobrarClase;
			
			/*$this->documento_cuenta_cobrarActual =$this->migrarModeldocumento_cuenta_cobrar($this->documento_cuenta_cobrarClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars(),$this->documento_cuenta_cobrarActual);
			
			$this->actualizarControllerConReturnGeneral($this->documento_cuenta_cobrarReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}


			if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
				$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR);
			
			} else {
				$this->eliminarTabla($idActual);
			}
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR',null);			
		
			$this->procesarPostAccion("form",MaintenanceType::$ELIMINAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$documento_cuenta_cobrarsLocal=$this->getListaActual();
		
		$iIndice=documento_cuenta_cobrar_util::getIndiceNuevo($documento_cuenta_cobrarsLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(documento_cuenta_cobrar $documento_cuenta_cobrar,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$documento_cuenta_cobrarsLocal=$this->getListaActual();
		
		$iIndice=documento_cuenta_cobrar_util::getIndiceActual($documento_cuenta_cobrarsLocal,$documento_cuenta_cobrar,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevodocumento_cuenta_cobrar')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->documento_cuenta_cobrarActual =$this->documento_cuenta_cobrarClase;
			
			/*$this->documento_cuenta_cobrarActual =$this->migrarModeldocumento_cuenta_cobrar($this->documento_cuenta_cobrarClase);*/
			
			$this->cancelarControles();
			
			$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_INFO;
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function ejecutarMantenimiento(string $maintenanceType){
		
		try {
			
			$this->cargarDatosCliente();		
			
			$this->documento_cuenta_cobrarLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('sucursal');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('cliente');$classes[]=$class;
				$class=new Classe('forma_pago_cliente');$classes[]=$class;
				$class=new Classe('cuenta_corriente');$classes[]=$class;
			
			$this->documento_cuenta_cobrarLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->documento_cuenta_cobrarLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrar(new documento_cuenta_cobrar());
				
				$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setIsNew(true);
				$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setIsChanged(true);
				$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->documento_cuenta_cobrarModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->documento_cuenta_cobrarLogic->documento_cuenta_cobrars[]=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->documento_cuenta_cobrarLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturas=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'Lista'));
							$facturasEliminados=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturas=array_merge($facturas,$facturasEliminados);
							documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							imagen_documento_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$imagendocumentocuentacobrars=unserialize($this->Session->read(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$imagendocumentocuentacobrarsEliminados=unserialize($this->Session->read(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$imagendocumentocuentacobrars=array_merge($imagendocumentocuentacobrars,$imagendocumentocuentacobrarsEliminados);
							documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_lote_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturalotes=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME.'Lista'));
							$facturalotesEliminados=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturalotes=array_merge($facturalotes,$facturalotesEliminados);
							documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucionfacturas=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'Lista'));
							$devolucionfacturasEliminados=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucionfacturas=array_merge($devolucionfacturas,$devolucionfacturasEliminados);
							
							$this->documento_cuenta_cobrarLogic->saveRelaciones($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar(),$facturas,$imagendocumentocuentacobrars,$facturalotes,$devolucionfacturas);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setIsChanged(true);
				$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setIsNew(false);
				$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->documento_cuenta_cobrarModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar(),$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->documento_cuenta_cobrarLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturas=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'Lista'));
							$facturasEliminados=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturas=array_merge($facturas,$facturasEliminados);
							documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							imagen_documento_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$imagendocumentocuentacobrars=unserialize($this->Session->read(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$imagendocumentocuentacobrarsEliminados=unserialize($this->Session->read(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$imagendocumentocuentacobrars=array_merge($imagendocumentocuentacobrars,$imagendocumentocuentacobrarsEliminados);
							documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_lote_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturalotes=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME.'Lista'));
							$facturalotesEliminados=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturalotes=array_merge($facturalotes,$facturalotesEliminados);
							documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucionfacturas=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'Lista'));
							$devolucionfacturasEliminados=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucionfacturas=array_merge($devolucionfacturas,$devolucionfacturasEliminados);
							
							$this->documento_cuenta_cobrarLogic->saveRelaciones($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar(),$facturas,$imagendocumentocuentacobrars,$facturalotes,$devolucionfacturas);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setIsDeleted(true);
				$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setIsNew(false);
				$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setIsChanged(false);				
				
				$this->actualizarLista($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar(),$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->documento_cuenta_cobrarLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturas=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'Lista'));
							$facturasEliminados=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturas=array_merge($facturas,$facturasEliminados);

							foreach($facturas as $factura1) {
								$factura1->setIsDeleted(true);
							}
							documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							imagen_documento_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$imagendocumentocuentacobrars=unserialize($this->Session->read(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$imagendocumentocuentacobrarsEliminados=unserialize($this->Session->read(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$imagendocumentocuentacobrars=array_merge($imagendocumentocuentacobrars,$imagendocumentocuentacobrarsEliminados);

							foreach($imagendocumentocuentacobrars as $imagendocumentocuentacobrar1) {
								$imagendocumentocuentacobrar1->setIsDeleted(true);
							}
							documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_lote_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturalotes=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME.'Lista'));
							$facturalotesEliminados=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturalotes=array_merge($facturalotes,$facturalotesEliminados);

							foreach($facturalotes as $facturalote1) {
								$facturalote1->setIsDeleted(true);
							}
							documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucionfacturas=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'Lista'));
							$devolucionfacturasEliminados=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucionfacturas=array_merge($devolucionfacturas,$devolucionfacturasEliminados);

							foreach($devolucionfacturas as $devolucionfactura1) {
								$devolucionfactura1->setIsDeleted(true);
							}
							
						$this->documento_cuenta_cobrarLogic->saveRelaciones($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar(),$facturas,$imagendocumentocuentacobrars,$facturalotes,$devolucionfacturas);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->documento_cuenta_cobrarsEliminados[]=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->documento_cuenta_cobrarLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturas=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'Lista'));
							$facturasEliminados=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturas=array_merge($facturas,$facturasEliminados);
							documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							imagen_documento_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$imagendocumentocuentacobrars=unserialize($this->Session->read(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$imagendocumentocuentacobrarsEliminados=unserialize($this->Session->read(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$imagendocumentocuentacobrars=array_merge($imagendocumentocuentacobrars,$imagendocumentocuentacobrarsEliminados);
							documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_lote_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturalotes=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME.'Lista'));
							$facturalotesEliminados=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturalotes=array_merge($facturalotes,$facturalotesEliminados);
							documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucionfacturas=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'Lista'));
							$devolucionfacturasEliminados=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucionfacturas=array_merge($devolucionfacturas,$devolucionfacturasEliminados);
							
						$this->documento_cuenta_cobrarLogic->saveRelaciones($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar(),$facturas,$imagendocumentocuentacobrars,$facturalotes,$devolucionfacturas);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->documento_cuenta_cobrarsEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->documento_cuenta_cobrarLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->documento_cuenta_cobrarLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->documento_cuenta_cobrarsEliminados=array();
				}	 					
			}
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('sucursal');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('cliente');$classes[]=$class;
				$class=new Classe('forma_pago_cliente');$classes[]=$class;
				$class=new Classe('cuenta_corriente');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrars();*/
					
					$this->documento_cuenta_cobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->documento_cuenta_cobrarLogic->setIsConDeepLoad(false);
			
			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(documento_cuenta_cobrar_util::$STR_SESSION_NAME.'Lista',serialize($this->documento_cuenta_cobrars));
				$this->Session->write(documento_cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->documento_cuenta_cobrarsEliminados));
			}
			
			if($class!=null);
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function eliminarTabla(int $id = null) {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);			
		}
	}
	
	public function eliminarTablaBase(int $id = null) {		
		try {
			/*SOLO SI ES NECESARIO*/
			/*
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginaldocumento_cuenta_cobrar;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->documento_cuenta_cobrarLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->documento_cuenta_cobrars as $documento_cuenta_cobrarLocal) {
				if($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getId()==$documento_cuenta_cobrarLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->setIsDeleted(true);
			$this->documento_cuenta_cobrarsEliminados[]=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->documento_cuenta_cobrars[$indice]);
				
				$this->documento_cuenta_cobrars = array_values($this->documento_cuenta_cobrars);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModeldocumento_cuenta_cobrar($this->documento_cuenta_cobrarClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(documento_cuenta_cobrar $documento_cuenta_cobrar,array $documento_cuenta_cobrars) {
		try {
			foreach($documento_cuenta_cobrars as $documento_cuenta_cobrarLocal){ 
				if($documento_cuenta_cobrarLocal->getId()==$documento_cuenta_cobrar->getId()) {
					$documento_cuenta_cobrarLocal->setIsChanged($documento_cuenta_cobrar->getIsChanged());
					$documento_cuenta_cobrarLocal->setIsNew($documento_cuenta_cobrar->getIsNew());
					$documento_cuenta_cobrarLocal->setIsDeleted($documento_cuenta_cobrar->getIsDeleted());
					//$documento_cuenta_cobrarLocal->setbitExpired($documento_cuenta_cobrar->getbitExpired());
					
					$documento_cuenta_cobrarLocal->setId($documento_cuenta_cobrar->getId());	
					$documento_cuenta_cobrarLocal->setVersionRow($documento_cuenta_cobrar->getVersionRow());	
					$documento_cuenta_cobrarLocal->setVersionRow($documento_cuenta_cobrar->getVersionRow());	
					$documento_cuenta_cobrarLocal->setid_empresa($documento_cuenta_cobrar->getid_empresa());	
					$documento_cuenta_cobrarLocal->setid_sucursal($documento_cuenta_cobrar->getid_sucursal());	
					$documento_cuenta_cobrarLocal->setid_ejercicio($documento_cuenta_cobrar->getid_ejercicio());	
					$documento_cuenta_cobrarLocal->setid_periodo($documento_cuenta_cobrar->getid_periodo());	
					$documento_cuenta_cobrarLocal->setid_usuario($documento_cuenta_cobrar->getid_usuario());	
					$documento_cuenta_cobrarLocal->setnumero($documento_cuenta_cobrar->getnumero());	
					$documento_cuenta_cobrarLocal->setid_cliente($documento_cuenta_cobrar->getid_cliente());	
					$documento_cuenta_cobrarLocal->settipo($documento_cuenta_cobrar->gettipo());	
					$documento_cuenta_cobrarLocal->setfecha_emision($documento_cuenta_cobrar->getfecha_emision());	
					$documento_cuenta_cobrarLocal->setdescripcion($documento_cuenta_cobrar->getdescripcion());	
					$documento_cuenta_cobrarLocal->setmonto($documento_cuenta_cobrar->getmonto());	
					$documento_cuenta_cobrarLocal->setmonto_parcial($documento_cuenta_cobrar->getmonto_parcial());	
					$documento_cuenta_cobrarLocal->setmoneda($documento_cuenta_cobrar->getmoneda());	
					$documento_cuenta_cobrarLocal->setfecha_vence($documento_cuenta_cobrar->getfecha_vence());	
					$documento_cuenta_cobrarLocal->setnumero_de_pagos($documento_cuenta_cobrar->getnumero_de_pagos());	
					$documento_cuenta_cobrarLocal->setbalance($documento_cuenta_cobrar->getbalance());	
					$documento_cuenta_cobrarLocal->setnumero_pagado($documento_cuenta_cobrar->getnumero_pagado());	
					$documento_cuenta_cobrarLocal->setid_pagado($documento_cuenta_cobrar->getid_pagado());	
					$documento_cuenta_cobrarLocal->setmodulo_origen($documento_cuenta_cobrar->getmodulo_origen());	
					$documento_cuenta_cobrarLocal->setid_origen($documento_cuenta_cobrar->getid_origen());	
					$documento_cuenta_cobrarLocal->setmodulo_destino($documento_cuenta_cobrar->getmodulo_destino());	
					$documento_cuenta_cobrarLocal->setid_destino($documento_cuenta_cobrar->getid_destino());	
					$documento_cuenta_cobrarLocal->setnombre_pc($documento_cuenta_cobrar->getnombre_pc());	
					$documento_cuenta_cobrarLocal->sethora($documento_cuenta_cobrar->gethora());	
					$documento_cuenta_cobrarLocal->setmonto_mora($documento_cuenta_cobrar->getmonto_mora());	
					$documento_cuenta_cobrarLocal->setinteres_mora($documento_cuenta_cobrar->getinteres_mora());	
					$documento_cuenta_cobrarLocal->setdias_gracia_mora($documento_cuenta_cobrar->getdias_gracia_mora());	
					$documento_cuenta_cobrarLocal->setinstrumento_pago($documento_cuenta_cobrar->getinstrumento_pago());	
					$documento_cuenta_cobrarLocal->settipo_cambio($documento_cuenta_cobrar->gettipo_cambio());	
					$documento_cuenta_cobrarLocal->setnumero_cliente($documento_cuenta_cobrar->getnumero_cliente());	
					$documento_cuenta_cobrarLocal->setclase_registro($documento_cuenta_cobrar->getclase_registro());	
					$documento_cuenta_cobrarLocal->setestado_registro($documento_cuenta_cobrar->getestado_registro());	
					$documento_cuenta_cobrarLocal->setmotivo_anulacion($documento_cuenta_cobrar->getmotivo_anulacion());	
					$documento_cuenta_cobrarLocal->setimpuesto_1($documento_cuenta_cobrar->getimpuesto_1());	
					$documento_cuenta_cobrarLocal->setimpuesto_2($documento_cuenta_cobrar->getimpuesto_2());	
					$documento_cuenta_cobrarLocal->setimpuesto_incluido($documento_cuenta_cobrar->getimpuesto_incluido());	
					$documento_cuenta_cobrarLocal->setobservaciones($documento_cuenta_cobrar->getobservaciones());	
					$documento_cuenta_cobrarLocal->setgrupo_pago($documento_cuenta_cobrar->getgrupo_pago());	
					$documento_cuenta_cobrarLocal->settermino_idpv($documento_cuenta_cobrar->gettermino_idpv());	
					$documento_cuenta_cobrarLocal->setid_forma_pago_cliente($documento_cuenta_cobrar->getid_forma_pago_cliente());	
					$documento_cuenta_cobrarLocal->setnro_pago($documento_cuenta_cobrar->getnro_pago());	
					$documento_cuenta_cobrarLocal->setref_pago($documento_cuenta_cobrar->getref_pago());	
					$documento_cuenta_cobrarLocal->setfecha_hora($documento_cuenta_cobrar->getfecha_hora());	
					$documento_cuenta_cobrarLocal->setid_base($documento_cuenta_cobrar->getid_base());	
					$documento_cuenta_cobrarLocal->setid_cuenta_corriente($documento_cuenta_cobrar->getid_cuenta_corriente());	
					$documento_cuenta_cobrarLocal->setncf($documento_cuenta_cobrar->getncf());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$documento_cuenta_cobrarsLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$documento_cuenta_cobrarsLocal=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$documento_cuenta_cobrarsLocal=$this->documento_cuenta_cobrars;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $documento_cuenta_cobrarsLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars() as $documento_cuenta_cobrar) {
				if($documento_cuenta_cobrar->getId()==$id) {
					$this->documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrar($documento_cuenta_cobrar);
					
					break;
				}
			}				
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
		}
	}
	
	public function seleccionarActualAuxiliar(int $id = null) {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*NO FUNCIONA AQUI, SINO EN search.php
			$this->strFuncionBusquedaRapida=str_replace('TO_REPLACE',$id,$this->strFuncionBusquedaRapida);*/
			
					
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setSeleccionars(int $maxima_fila) {
		/*$documento_cuenta_cobrarsSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->documento_cuenta_cobrars as $documento_cuenta_cobrar) {
			$documento_cuenta_cobrar->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->documento_cuenta_cobrars[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : documento_cuenta_cobrar_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));
						
		if($documento_cuenta_cobrar_session==null) {
			$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
		}
		
		
		$this->documento_cuenta_cobrarReturnGeneral=new documento_cuenta_cobrar_param_return();
		$this->documento_cuenta_cobrarParameterGeneral=new documento_cuenta_cobrar_param_return();
			
		$this->documento_cuenta_cobrarParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualdocumento_cuenta_cobrar(this.documento_cuenta_cobrar,true);
			this.setVariablesFormularioToObjetoActualForeignKeysdocumento_cuenta_cobrar(this.documento_cuenta_cobrar);*/
			
			if($documento_cuenta_cobrar_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualdocumento_cuenta_cobrar(this.documento_cuenta_cobrar,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->documento_cuenta_cobrarActual=$this->documento_cuenta_cobrarClase;
				
				$this->setCopiarVariablesObjetos($this->documento_cuenta_cobrarActual,$this->documento_cuenta_cobrar,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->documento_cuenta_cobrarReturnGeneral=$this->documento_cuenta_cobrarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars(),$this->documento_cuenta_cobrar,$this->documento_cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($documento_cuenta_cobrar_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeandocumento_cuenta_cobrar($classes,$this->documento_cuenta_cobrarReturnGeneral,$this->documento_cuenta_cobrarBean,false);*/
				}
					
				if($this->documento_cuenta_cobrarReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->documento_cuenta_cobrarReturnGeneral->getdocumento_cuenta_cobrar(),$this->documento_cuenta_cobrarActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeydocumento_cuenta_cobrar($this->documento_cuenta_cobrarReturnGeneral->getdocumento_cuenta_cobrar());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariodocumento_cuenta_cobrar($this->documento_cuenta_cobrarReturnGeneral->getdocumento_cuenta_cobrar());*/
				}
					
				if($this->documento_cuenta_cobrarReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->documento_cuenta_cobrarReturnGeneral->getdocumento_cuenta_cobrar(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->documento_cuenta_cobrar,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(documento_cuenta_cobrarJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualdocumento_cuenta_cobrar(this.documento_cuenta_cobrar,true);
				this.setVariablesFormularioToObjetoActualForeignKeysdocumento_cuenta_cobrar(this.documento_cuenta_cobrar);				
			}
			*/
		} else {
			/*
			//AUN_NO
			//MANEJAR EN TABLA
			
			if((($controlTipo==ControlTipo::$TEXTBOX || $controlTipo==ControlTipo::$DATE
				|| $controlTipo==ControlTipo::$TEXTAREA || $controlTipo==ControlTipo::$COMBOBOX
				)				
				&& $eventoTipo==EventoTipo::$CHANGE
				)
				
				|| ($controlTipo==ControlTipo::$CHECKBOX && $eventoTipo==EventoTipo::$CLIC)
				
			) { // && sTipoGeneral.equals("TEXTBOX")
				
				if($this->documento_cuenta_cobrarAnterior!=null) {
					$this->documento_cuenta_cobrar=$this->documento_cuenta_cobrarAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->documento_cuenta_cobrarReturnGeneral=$this->documento_cuenta_cobrarLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars(),$this->documento_cuenta_cobrar,$this->documento_cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->documento_cuenta_cobrarReturnGeneral->getdocumento_cuenta_cobrar(),$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars());
			*/
		}
		
		return $this->documento_cuenta_cobrarReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			$this->documento_cuenta_cobrarReturnGeneral=new documento_cuenta_cobrar_param_return();			
			$this->documento_cuenta_cobrarParameterGeneral=new documento_cuenta_cobrar_param_return();
			
			$this->documento_cuenta_cobrarParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->documento_cuenta_cobrarReturnGeneral=$this->documento_cuenta_cobrarLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->documento_cuenta_cobrars,$this->documento_cuenta_cobrarParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->documento_cuenta_cobrarReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->documento_cuenta_cobrarReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->documento_cuenta_cobrarReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
			
			/*throw $e;*/
      	}
		
		return $return_json;
	}
	
	public function manejarEventos(string $sTipoControl,string $sTipoEvento) {		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		$this->documento_cuenta_cobrarReturnGeneral=new documento_cuenta_cobrar_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_documento_cuenta_cobrar') {
		    $sDominio='documento_cuenta_cobrar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->documento_cuenta_cobrarReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->documento_cuenta_cobrarReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='documento_cuenta_cobrar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='documento_cuenta_cobrar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='documento_cuenta_cobrar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->documento_cuenta_cobrarReturnGeneral=new documento_cuenta_cobrar_param_return();
		$this->documento_cuenta_cobrarParameterGeneral=new documento_cuenta_cobrar_param_return();
			
		$this->documento_cuenta_cobrarParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->documento_cuenta_cobrarReturnGeneral=$this->documento_cuenta_cobrarLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars(),$this->documento_cuenta_cobrar,$this->documento_cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->documento_cuenta_cobrarReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->documento_cuenta_cobrarReturnGeneral->getdocumento_cuenta_cobrar(),$classes);*/
		}									
	
		if($this->documento_cuenta_cobrarReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->documento_cuenta_cobrarReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->documento_cuenta_cobrarReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $documento_cuenta_cobrars,documento_cuenta_cobrar $documento_cuenta_cobrar) {
		
		$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));
						
		if($documento_cuenta_cobrar_session==null) {
			$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(documento_cuenta_cobrar_util::$CLASSNAME);
			}	
			*/
			
			$this->documento_cuenta_cobrarReturnGeneral=new documento_cuenta_cobrar_param_return();
			$this->documento_cuenta_cobrarParameterGeneral=new documento_cuenta_cobrar_param_return();
			
			$this->documento_cuenta_cobrarParameterGeneral->setdata($this->data);
		
		
			
		if($documento_cuenta_cobrar_session->conGuardarRelaciones) {
			$classes=documento_cuenta_cobrar_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->documento_cuenta_cobrarActual,$this->documento_cuenta_cobrar,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->documento_cuenta_cobrarReturnGeneral=$this->documento_cuenta_cobrarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars(),$this->documento_cuenta_cobrarActual,$this->documento_cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->documento_cuenta_cobrarReturnGeneral=$this->documento_cuenta_cobrarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$documento_cuenta_cobrars,$documento_cuenta_cobrar,$this->documento_cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModeldocumento_cuenta_cobrar($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar());*/
			
			$this->documento_cuenta_cobrar=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->documento_cuenta_cobrar);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$documento_cuenta_cobrarActual=new documento_cuenta_cobrar();
			
			if($this->documento_cuenta_cobrarClase==null) {		
				$this->documento_cuenta_cobrarClase=new documento_cuenta_cobrar();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$documento_cuenta_cobrarActual=$this->documento_cuenta_cobrars[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setid_sucursal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setnumero($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setid_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->settipo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setmonto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setmonto_parcial((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setmoneda($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setfecha_vence(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setnumero_de_pagos((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setbalance((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setnumero_pagado($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setid_pagado((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setmodulo_origen($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_21'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setid_origen((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_22'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_23','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setmodulo_destino($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_23'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_24','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setid_destino((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_24'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_25','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setnombre_pc($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_25'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_26','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->sethora(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_26')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_27','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setmonto_mora((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_27'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_28','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setinteres_mora((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_28'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_29','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setdias_gracia_mora((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_29'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_30','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setinstrumento_pago($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_30'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_31','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->settipo_cambio((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_31'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_32','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setnumero_cliente($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_32'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_33','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setclase_registro($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_33'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_34','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setestado_registro($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_34'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_35','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setmotivo_anulacion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_35'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_36','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setimpuesto_1((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_36'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_37','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setimpuesto_2((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_37'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_38','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setimpuesto_incluido($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_38'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_39','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setobservaciones($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_39'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_40','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setgrupo_pago($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_40'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_41','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->settermino_idpv((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_41'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_42','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setid_forma_pago_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_42'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_43','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setnro_pago($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_43'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_44','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setref_pago($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_44'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_45','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setfecha_hora(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_45')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_46','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setid_base((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_46'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_47','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setid_cuenta_corriente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_47'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_48','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setncf($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_48'));  }

				$this->documento_cuenta_cobrarClase=$documento_cuenta_cobrarActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->documento_cuenta_cobrarModel->set($this->documento_cuenta_cobrarClase);
				
				/*$this->documento_cuenta_cobrarModel->set($this->migrarModeldocumento_cuenta_cobrar($this->documento_cuenta_cobrarClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->documento_cuenta_cobrars=$this->migrarModeldocumento_cuenta_cobrar($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars());							
		$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();*/
		
			if(!$this->bitEsBusqueda) {
				$this->htmlTabla=$this->setHtmlTablaDatos();
			} else {
				$this->htmlTabla=$this->setHtmlTablaDatosParaBusqueda();
			}
		
		if($bitConRetrurnAjax==true) {			
			//$this->returnAjax();
		}		
	}
	
	public function returnAjax() {
		$this->returnAjaxBase();
	}
	
	public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession) {								
		/*$this->activarSession();*/
		
		if($bitSaveSession==true) {			
			$this->Session->write(documento_cuenta_cobrar_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$documento_cuenta_cobrar_control_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($documento_cuenta_cobrar_control_session==null) {
				$documento_cuenta_cobrar_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($documento_cuenta_cobrar_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(documento_cuenta_cobrar_util::$STR_SESSION_NAME,$this);*/
		} else {
			$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));
			
			if($documento_cuenta_cobrar_session==null) {
				$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
			}
			
			$this->set(documento_cuenta_cobrar_util::$STR_SESSION_NAME, $documento_cuenta_cobrar_session);
		}
	}
	
	public function setCopiarVariablesObjetos(documento_cuenta_cobrar $documento_cuenta_cobrarOrigen,documento_cuenta_cobrar $documento_cuenta_cobrar,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($documento_cuenta_cobrar==null) {
				$documento_cuenta_cobrar=new documento_cuenta_cobrar();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getId()!=null && $documento_cuenta_cobrarOrigen->getId()!=0)) {$documento_cuenta_cobrar->setId($documento_cuenta_cobrarOrigen->getId());}}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getnumero()!=null && $documento_cuenta_cobrarOrigen->getnumero()!='')) {$documento_cuenta_cobrar->setnumero($documento_cuenta_cobrarOrigen->getnumero());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getid_cliente()!=null && $documento_cuenta_cobrarOrigen->getid_cliente()!=-1)) {$documento_cuenta_cobrar->setid_cliente($documento_cuenta_cobrarOrigen->getid_cliente());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->gettipo()!=null && $documento_cuenta_cobrarOrigen->gettipo()!='')) {$documento_cuenta_cobrar->settipo($documento_cuenta_cobrarOrigen->gettipo());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getfecha_emision()!=null && $documento_cuenta_cobrarOrigen->getfecha_emision()!=date('Y-m-d'))) {$documento_cuenta_cobrar->setfecha_emision($documento_cuenta_cobrarOrigen->getfecha_emision());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getdescripcion()!=null && $documento_cuenta_cobrarOrigen->getdescripcion()!='')) {$documento_cuenta_cobrar->setdescripcion($documento_cuenta_cobrarOrigen->getdescripcion());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getmonto()!=null && $documento_cuenta_cobrarOrigen->getmonto()!=0.0)) {$documento_cuenta_cobrar->setmonto($documento_cuenta_cobrarOrigen->getmonto());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getmonto_parcial()!=null && $documento_cuenta_cobrarOrigen->getmonto_parcial()!=0.0)) {$documento_cuenta_cobrar->setmonto_parcial($documento_cuenta_cobrarOrigen->getmonto_parcial());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getmoneda()!=null && $documento_cuenta_cobrarOrigen->getmoneda()!='')) {$documento_cuenta_cobrar->setmoneda($documento_cuenta_cobrarOrigen->getmoneda());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getfecha_vence()!=null && $documento_cuenta_cobrarOrigen->getfecha_vence()!=date('Y-m-d'))) {$documento_cuenta_cobrar->setfecha_vence($documento_cuenta_cobrarOrigen->getfecha_vence());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getnumero_de_pagos()!=null && $documento_cuenta_cobrarOrigen->getnumero_de_pagos()!=0)) {$documento_cuenta_cobrar->setnumero_de_pagos($documento_cuenta_cobrarOrigen->getnumero_de_pagos());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getbalance()!=null && $documento_cuenta_cobrarOrigen->getbalance()!=0.0)) {$documento_cuenta_cobrar->setbalance($documento_cuenta_cobrarOrigen->getbalance());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getnumero_pagado()!=null && $documento_cuenta_cobrarOrigen->getnumero_pagado()!='')) {$documento_cuenta_cobrar->setnumero_pagado($documento_cuenta_cobrarOrigen->getnumero_pagado());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getid_pagado()!=null && $documento_cuenta_cobrarOrigen->getid_pagado()!=0)) {$documento_cuenta_cobrar->setid_pagado($documento_cuenta_cobrarOrigen->getid_pagado());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getmodulo_origen()!=null && $documento_cuenta_cobrarOrigen->getmodulo_origen()!='')) {$documento_cuenta_cobrar->setmodulo_origen($documento_cuenta_cobrarOrigen->getmodulo_origen());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getid_origen()!=null && $documento_cuenta_cobrarOrigen->getid_origen()!=0)) {$documento_cuenta_cobrar->setid_origen($documento_cuenta_cobrarOrigen->getid_origen());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getmodulo_destino()!=null && $documento_cuenta_cobrarOrigen->getmodulo_destino()!='')) {$documento_cuenta_cobrar->setmodulo_destino($documento_cuenta_cobrarOrigen->getmodulo_destino());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getid_destino()!=null && $documento_cuenta_cobrarOrigen->getid_destino()!=0)) {$documento_cuenta_cobrar->setid_destino($documento_cuenta_cobrarOrigen->getid_destino());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getnombre_pc()!=null && $documento_cuenta_cobrarOrigen->getnombre_pc()!='')) {$documento_cuenta_cobrar->setnombre_pc($documento_cuenta_cobrarOrigen->getnombre_pc());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->gethora()!=null && $documento_cuenta_cobrarOrigen->gethora()!=date('Y-m-d'))) {$documento_cuenta_cobrar->sethora($documento_cuenta_cobrarOrigen->gethora());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getmonto_mora()!=null && $documento_cuenta_cobrarOrigen->getmonto_mora()!=0.0)) {$documento_cuenta_cobrar->setmonto_mora($documento_cuenta_cobrarOrigen->getmonto_mora());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getinteres_mora()!=null && $documento_cuenta_cobrarOrigen->getinteres_mora()!=0.0)) {$documento_cuenta_cobrar->setinteres_mora($documento_cuenta_cobrarOrigen->getinteres_mora());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getdias_gracia_mora()!=null && $documento_cuenta_cobrarOrigen->getdias_gracia_mora()!=0)) {$documento_cuenta_cobrar->setdias_gracia_mora($documento_cuenta_cobrarOrigen->getdias_gracia_mora());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getinstrumento_pago()!=null && $documento_cuenta_cobrarOrigen->getinstrumento_pago()!='')) {$documento_cuenta_cobrar->setinstrumento_pago($documento_cuenta_cobrarOrigen->getinstrumento_pago());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->gettipo_cambio()!=null && $documento_cuenta_cobrarOrigen->gettipo_cambio()!=0.0)) {$documento_cuenta_cobrar->settipo_cambio($documento_cuenta_cobrarOrigen->gettipo_cambio());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getnumero_cliente()!=null && $documento_cuenta_cobrarOrigen->getnumero_cliente()!='')) {$documento_cuenta_cobrar->setnumero_cliente($documento_cuenta_cobrarOrigen->getnumero_cliente());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getclase_registro()!=null && $documento_cuenta_cobrarOrigen->getclase_registro()!='')) {$documento_cuenta_cobrar->setclase_registro($documento_cuenta_cobrarOrigen->getclase_registro());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getestado_registro()!=null && $documento_cuenta_cobrarOrigen->getestado_registro()!='')) {$documento_cuenta_cobrar->setestado_registro($documento_cuenta_cobrarOrigen->getestado_registro());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getmotivo_anulacion()!=null && $documento_cuenta_cobrarOrigen->getmotivo_anulacion()!='')) {$documento_cuenta_cobrar->setmotivo_anulacion($documento_cuenta_cobrarOrigen->getmotivo_anulacion());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getimpuesto_1()!=null && $documento_cuenta_cobrarOrigen->getimpuesto_1()!=0.0)) {$documento_cuenta_cobrar->setimpuesto_1($documento_cuenta_cobrarOrigen->getimpuesto_1());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getimpuesto_2()!=null && $documento_cuenta_cobrarOrigen->getimpuesto_2()!=0.0)) {$documento_cuenta_cobrar->setimpuesto_2($documento_cuenta_cobrarOrigen->getimpuesto_2());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getimpuesto_incluido()!=null && $documento_cuenta_cobrarOrigen->getimpuesto_incluido()!='')) {$documento_cuenta_cobrar->setimpuesto_incluido($documento_cuenta_cobrarOrigen->getimpuesto_incluido());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getobservaciones()!=null && $documento_cuenta_cobrarOrigen->getobservaciones()!='')) {$documento_cuenta_cobrar->setobservaciones($documento_cuenta_cobrarOrigen->getobservaciones());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getgrupo_pago()!=null && $documento_cuenta_cobrarOrigen->getgrupo_pago()!='')) {$documento_cuenta_cobrar->setgrupo_pago($documento_cuenta_cobrarOrigen->getgrupo_pago());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->gettermino_idpv()!=null && $documento_cuenta_cobrarOrigen->gettermino_idpv()!=0)) {$documento_cuenta_cobrar->settermino_idpv($documento_cuenta_cobrarOrigen->gettermino_idpv());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getid_forma_pago_cliente()!=null && $documento_cuenta_cobrarOrigen->getid_forma_pago_cliente()!=-1)) {$documento_cuenta_cobrar->setid_forma_pago_cliente($documento_cuenta_cobrarOrigen->getid_forma_pago_cliente());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getnro_pago()!=null && $documento_cuenta_cobrarOrigen->getnro_pago()!='')) {$documento_cuenta_cobrar->setnro_pago($documento_cuenta_cobrarOrigen->getnro_pago());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getref_pago()!=null && $documento_cuenta_cobrarOrigen->getref_pago()!='')) {$documento_cuenta_cobrar->setref_pago($documento_cuenta_cobrarOrigen->getref_pago());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getfecha_hora()!=null && $documento_cuenta_cobrarOrigen->getfecha_hora()!=date('Y-m-d'))) {$documento_cuenta_cobrar->setfecha_hora($documento_cuenta_cobrarOrigen->getfecha_hora());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getid_base()!=null && $documento_cuenta_cobrarOrigen->getid_base()!=0)) {$documento_cuenta_cobrar->setid_base($documento_cuenta_cobrarOrigen->getid_base());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getid_cuenta_corriente()!=null && $documento_cuenta_cobrarOrigen->getid_cuenta_corriente()!=-1)) {$documento_cuenta_cobrar->setid_cuenta_corriente($documento_cuenta_cobrarOrigen->getid_cuenta_corriente());}
			if($conDefault || ($conDefault==false && $documento_cuenta_cobrarOrigen->getncf()!=null && $documento_cuenta_cobrarOrigen->getncf()!='')) {$documento_cuenta_cobrar->setncf($documento_cuenta_cobrarOrigen->getncf());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$documento_cuenta_cobrarsSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$documento_cuenta_cobrarsSeleccionados[]=$this->documento_cuenta_cobrars[$indice];
			}
		}
		
		return $documento_cuenta_cobrarsSeleccionados;
	}
	
	public function getIdsFksSeleccionados(int $maxima_fila) : array {
		$IdsFksSeleccionados=array();
		$checkbox_id=0;
		//$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			//$indice=$i-1;
			
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$IdsFksSeleccionados[]=$checkbox_id;
			}
		}
		
		return $IdsFksSeleccionados;
	}
	
	public function quitarRelaciones() {	
		$documento_cuenta_cobrar= new documento_cuenta_cobrar();
		
		foreach($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars() as $documento_cuenta_cobrar) {
			
		$documento_cuenta_cobrar->facturas=array();
		$documento_cuenta_cobrar->imagendocumentocuentacobrars=array();
		$documento_cuenta_cobrar->facturalotes=array();
		$documento_cuenta_cobrar->devolucionfacturas=array();
		}		
		
		if($documento_cuenta_cobrar!=null);
	}
	
	public function cargarRelaciones(array $documento_cuenta_cobrars=array()) : array {	
		
		$documento_cuenta_cobrarsRespaldo = array();
		$documento_cuenta_cobrarsLocal = array();
		
		documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			imagen_documento_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			factura_lote_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			devolucion_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$documento_cuenta_cobrarsResp=array();
		$classes=array();
			
		
				$class=new Classe('factura'); 	$classes[]=$class;
				$class=new Classe('imagen_documento_cuenta_cobrar'); 	$classes[]=$class;
				$class=new Classe('factura_lote'); 	$classes[]=$class;
				$class=new Classe('devolucion_factura'); 	$classes[]=$class;
			
			
		$documento_cuenta_cobrarsRespaldo=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();
			
		$this->documento_cuenta_cobrarLogic->setIsConDeep(true);
		
		$this->documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrars($documento_cuenta_cobrars);
			
		$this->documento_cuenta_cobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$documento_cuenta_cobrarsLocal=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();
			
		/*RESPALDO*/
		$this->documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrars($documento_cuenta_cobrarsRespaldo);
			
		$this->documento_cuenta_cobrarLogic->setIsConDeep(false);
		
		if($documento_cuenta_cobrarsResp!=null);
		
		return $documento_cuenta_cobrarsLocal;
	}
	
	public function quitarRelacionesReporte() {
		try {			
			
			//PARA QUE NO GENERE ERROR EN SESSION
			$this->cargarRelaciones(array());
			
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			$this->quitarRelaciones();
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(documento_cuenta_cobrar_session $documento_cuenta_cobrar_session) {
		$documento_cuenta_cobrar_session->strTypeOnLoad=$this->strTypeOnLoaddocumento_cuenta_cobrar;
		$documento_cuenta_cobrar_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliardocumento_cuenta_cobrar;
		$documento_cuenta_cobrar_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliardocumento_cuenta_cobrar;
		$documento_cuenta_cobrar_session->bitEsPopup=$this->bitEsPopup;
		$documento_cuenta_cobrar_session->bitEsBusqueda=$this->bitEsBusqueda;
		$documento_cuenta_cobrar_session->strFuncionJs=$this->strFuncionJs;
		/*$documento_cuenta_cobrar_session->strSufijo=$this->strSufijo;*/
		$documento_cuenta_cobrar_session->bitEsRelaciones=$this->bitEsRelaciones;
		$documento_cuenta_cobrar_session->bitEsRelacionado=$this->bitEsRelacionado;
	}
	
	public function setPermisosUsuarioConPermiso(string $strPermiso) {
		$this->setPermisosUsuarioConPermisoBase($strPermiso);
	}
	
	public function setPermisosMantenimientoUsuarioConPermiso(string $strPermiso) {
		$this->setPermisosMantenimientoUsuarioConPermisoBase($strPermiso);
	}
	
	public function setPermisosUsuario() {
		$perfilOpcionUsuario=null;
		$perfilOpcionUsuario=new perfil_opcion();		
					
		if(Constantes::$CON_LLAMADA_SIMPLE) {
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, documento_cuenta_cobrar_util::$STR_NOMBRE_CLASE,0,false,false);				
		} else {
			$perfilOpcionUsuario=$this->sistemaReturnGeneral->getPerfilOpcionUsuario();
		}
		
		if($perfilOpcionUsuario!=null && $perfilOpcionUsuario->getId()>0) {
			$this->strPermisoNuevo=(($perfilOpcionUsuario->getingreso() || $perfilOpcionUsuario->gettodo()) ? 'table-row':'none'  ); 
			$this->strPermisoActualizar=(($perfilOpcionUsuario->getmodificacion() || $perfilOpcionUsuario->gettodo()) ? 'table-row':'none'  ); 
			$this->strPermisoActualizarOriginal=$this->strPermisoActualizar;
			$this->strPermisoEliminar=(($perfilOpcionUsuario->geteliminacion() || $perfilOpcionUsuario->gettodo()) ? 'table-cell':'none'  );//con table-row en tabla se descuadra
			$this->strPermisoConsulta=(($perfilOpcionUsuario->getconsulta() || $perfilOpcionUsuario->gettodo()) ? 'table-row':'none'  ); 			
			$this->strPermisoTodo=(($perfilOpcionUsuario->gettodo() || $perfilOpcionUsuario->gettodo()) ? 'table-row':'none'  ); 
			$this->strPermisoReporte=(($perfilOpcionUsuario->getreporte() || $perfilOpcionUsuario->gettodo()) ? 'table-row':'none'  ); 
			
			if($perfilOpcionUsuario->getingreso() || $perfilOpcionUsuario->getmodificacion() || $perfilOpcionUsuario->geteliminacion() || $perfilOpcionUsuario->gettodo()) {
				$this->strPermisoGuardar='table-row';
			} else {
				$this->strPermisoGuardar='none';
			}
			
			if(!$this->bitEsRelacionado) {
				$this->strPermisoBusqueda=(($perfilOpcionUsuario->getbusqueda() || $perfilOpcionUsuario->gettodo()) ? 'table-row':'none'  ); 
			} else {
				$this->strPermisoBusqueda='none';
			}
			
		} else {
			$this->setPermisosUsuarioConPermiso('none');
		}
		
		/*SI SE NECESITA PONER TODOS LOS PERMISOS POR DEFECTO*/
		//$this->setPermisosUsuarioConPermiso('table-row');		
	}
	
	public function setAccionesUsuario() {
		//$accionUsuario=null;
		$accionesUsuario=array();		
					
		if(Constantes::$CON_LLAMADA_SIMPLE) {
			$accionesUsuario=$this->sistemaLogicAdditional->traerAccionesPaginaWebPerfilOpcion($this->usuarioActual, 0 ,false);				
		} else {
			$accionesUsuario=$this->sistemaReturnGeneral->getAccionesUsuario();
		}
		
		if($accionesUsuario!=null) {
			foreach($accionesUsuario as $accion)	{
				$this->tiposAcciones[]=$accion->getnombre();
			}
		}				
	}
	
	/*Todo,ActualizarOriginal,Consulta,Busqueda,Reporte*/
	public function inicializarPermisos() {
		$this->inicializarPermisosBase();
	}
	
	public function inicializarSetPermisosUsuarioClasesRelacionadas() {
		if(!Constantes::$CON_LLAMADA_SIMPLE) {
			

			$this->strTienePermisosfactura='none';
			$this->strTienePermisosfactura=((Funciones::existeCadenaArray(factura_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosfactura='table-cell';

			$this->strTienePermisosimagen_documento_cuenta_cobrar='none';
			$this->strTienePermisosimagen_documento_cuenta_cobrar=((Funciones::existeCadenaArray(imagen_documento_cuenta_cobrar_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosimagen_documento_cuenta_cobrar='table-cell';

			$this->strTienePermisosfactura_lote='none';
			$this->strTienePermisosfactura_lote=((Funciones::existeCadenaArray(factura_lote_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosfactura_lote='table-cell';

			$this->strTienePermisosdevolucion_factura='none';
			$this->strTienePermisosdevolucion_factura=((Funciones::existeCadenaArray(devolucion_factura_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosdevolucion_factura='table-cell';
		} else {
			

			$this->strTienePermisosfactura='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosfactura=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, factura_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosfactura='table-cell';

			$this->strTienePermisosimagen_documento_cuenta_cobrar='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosimagen_documento_cuenta_cobrar=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, imagen_documento_cuenta_cobrar_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosimagen_documento_cuenta_cobrar='table-cell';

			$this->strTienePermisosfactura_lote='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosfactura_lote=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, factura_lote_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosfactura_lote='table-cell';

			$this->strTienePermisosdevolucion_factura='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosdevolucion_factura=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, devolucion_factura_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosdevolucion_factura='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$documento_cuenta_cobrarViewAdditional=new documento_cuenta_cobrarView_add();
		$documento_cuenta_cobrarViewAdditional->documento_cuenta_cobrars=$this->documento_cuenta_cobrars;
		$documento_cuenta_cobrarViewAdditional->Session=$this->Session;
		
		return $documento_cuenta_cobrarViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$documento_cuenta_cobrarsLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$documento_cuenta_cobrarsLocal=$this->documento_cuenta_cobrars;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$documento_cuenta_cobrarsLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($documento_cuenta_cobrarsLocal)<=0) {
					$documento_cuenta_cobrarsLocal=$this->documento_cuenta_cobrars;
				}
			} else {
				$documento_cuenta_cobrarsLocal=$this->documento_cuenta_cobrars;
			}
		}
						
		
		$classes=array();
		$style_tabla='width:100%;margin: 0 0 0 0px;';//height: 100%;
		/*overflow:auto;*/
		$style_div='width:100%;height: 300px; overflow:auto; margin: 0 0 0 0px;';//background-color: #b0c4de;
		
		$class_cabecera='';
		$class_table=Constantes::$CSS_CLASS_TABLE;
		//$class_table=' class="'.Constantes::$CSS_CLASS_TABLE.'" ';
		
		
		if(!$paraReporte) {
			
			if(Constantes::$STR_TIPO_TABLA=='normal') {
				$class_cabecera='cabeceratabla';
				$class_table='';
			}
			
			if($this->bitConAltoMaximoTabla==true) {
				$style_div='width:100%;height: 100%; overflow:auto; margin: 0 0 0 0px;';//background-color: #b0c4de;			
			}
			
		} else {			
			$class_cabecera='cabeceratabla';
			$class_table='reporte';
			$style_tabla='';
			$style_div='width:100%;height: 100%; overflow:auto; margin: 0 0 0 0px;';//background-color: #b0c4de;	
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliardocumento_cuenta_cobrarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliardocumento_cuenta_cobrarsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$documento_cuenta_cobrarLogic=new documento_cuenta_cobrar_logic();
		$documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrars($this->documento_cuenta_cobrars);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$factura_session=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME));

		if($factura_session==null) {
			$factura_session=new factura_session();
		}

		$imagen_documento_cuenta_cobrar_session=unserialize($this->Session->read(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME));

		if($imagen_documento_cuenta_cobrar_session==null) {
			$imagen_documento_cuenta_cobrar_session=new imagen_documento_cuenta_cobrar_session();
		}

		$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}

		$devolucion_factura_session=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME));

		if($devolucion_factura_session==null) {
			$devolucion_factura_session=new devolucion_factura_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('cliente');$classes[]=$class;
			$class=new Classe('forma_pago_cliente');$classes[]=$class;
			$class=new Classe('cuenta_corriente');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$documento_cuenta_cobrarLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->documento_cuenta_cobrars=$documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->documento_cuenta_cobrarsLocal=$this->documento_cuenta_cobrars;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=documento_cuenta_cobrar_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=documento_cuenta_cobrar_util::$STR_TABLE_NAME;		
			
		$this->classes=$classes;
		$this->style_tabla=$style_tabla;
		$this->style_div=$style_div;
		$this->class_cabecera=$class_cabecera;
		$this->class_table=$class_table;		
		$this->proceso_print=$proceso_print;
		
		//PARA TEMPLATE JS
		

		if($this->bitConEditar==false || $paraReporte) {
			/*|| $this->bitConEditar==true*/


		} else {
			
		
			//TEMPLATING
			$funciones = new FuncionesObject();
			
			$funciones->arrOrderBy = $this->arrOrderBy;
			$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
			
			$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
			$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
			$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
			$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
			
			$documento_cuenta_cobrars = $this->documento_cuenta_cobrars;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = documento_cuenta_cobrar_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = documento_cuenta_cobrar_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/cuentascobrar/presentation/templating/documento_cuenta_cobrar_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->documento_cuenta_cobrars=$documento_cuenta_cobrars;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->documento_cuenta_cobrarsLocal=$documento_cuenta_cobrarsLocal;
			$template->classes=$classes;
			$template->style_tabla=$style_tabla;
			$template->style_div=$style_div;
			$template->class_cabecera=$class_cabecera;
			$template->class_table=$class_table;		
			$template->proceso_print=$proceso_print;
			
			$htmlTablaLocal=$template->render_html();
			
			//TEMPLATING
		
		
		
			
			if($this->strSufijo!='') {
				$htmlTablaLocal=str_replace('id="t-','id="t'.$this->strSufijo.'-',$htmlTablaLocal);
				$htmlTablaLocal=str_replace('name="t-','name="t'.$this->strSufijo.'-',$htmlTablaLocal);
				
				$htmlTablaLocal=str_replace('id="chb_t-cel','id="chb_t'.$this->strSufijo.'-cel',$htmlTablaLocal);
				$htmlTablaLocal=str_replace('name="chb_t-cel','name="chb_t'.$this->strSufijo.'-cel',$htmlTablaLocal);
			}
		}
		
		if(!$paraReporte) {
			$this->htmlTabla=$htmlTablaLocal;
		
		} else {
			
			/*
			$this->htmlTablaReporteAuxiliars=$htmlTablaLocal;
			*/
			
			/*
			$this->htmlTablaReporteAuxiliars.='<!DOCTYPE html>';
			$this->htmlTablaReporteAuxiliars.='<html>';
			$this->htmlTablaReporteAuxiliars.='<head>';
			$this->htmlTablaReporteAuxiliars.='<meta http-equiv="Content-Type" content="text/html;charset=utf-8">';
			$this->htmlTablaReporteAuxiliars.='</head>';
			$this->htmlTablaReporteAuxiliars.='<body>';
			*/
			
			$this->htmlTablaReporteAuxiliars.=$htmlTablaLocal;
			
			/*
			$this->htmlTablaReporteAuxiliars.='</body>';
			$this->htmlTablaReporteAuxiliars.='</html>';
			*/
		}

		return $htmlTablaLocal;
	}	
	
	public function setHtmlTablaDatosParaBusqueda() : string {
		return $this->getHtmlTablaDatosParaBusqueda(false);
	}
	
	public function getHtmlTablaDatosParaBusqueda(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		$documento_cuenta_cobrarsLocal=array();
		
		$documento_cuenta_cobrarsLocal=$this->documento_cuenta_cobrars;
				
		$classes=array();		
		
		$style_tabla=' style=" width:100%;height: 100%; margin: 0 0 0 0px;" ';
		/*overflow:auto;*/
		$style_div=' style=" width:100%;height: 300px; overflow:auto; margin: 0 0 0 0px;" ';
		
		$class_cabecera='';
		$class_table=' class="'.Constantes::$CSS_CLASS_TABLE.'" ';
		

		if(!$paraReporte) {
			
			if(Constantes::$STR_TIPO_TABLA=='normal') {
				$class_cabecera=' class="cabeceratabla" ';
				$class_table='';
			}
			
			if($this->bitConAltoMaximoTabla==true) {
				$style_div=' style=" width:100%;height: 100%; overflow:auto; margin: 0 0 0 0px;" ';			
			}
		} else {			
			$class_cabecera=' class="cabeceratabla" ';
			$class_table='';
			$style_div=' style=" width:100%;height: 100%; overflow:auto; margin: 0 0 0 0px;" ';	
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliardocumento_cuenta_cobrarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliardocumento_cuenta_cobrarsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$documento_cuenta_cobrarLogic=new documento_cuenta_cobrar_logic();
		$documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrars($this->documento_cuenta_cobrars);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$factura_session=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME));

		if($factura_session==null) {
			$factura_session=new factura_session();
		}

		$imagen_documento_cuenta_cobrar_session=unserialize($this->Session->read(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME));

		if($imagen_documento_cuenta_cobrar_session==null) {
			$imagen_documento_cuenta_cobrar_session=new imagen_documento_cuenta_cobrar_session();
		}

		$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}

		$devolucion_factura_session=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME));

		if($devolucion_factura_session==null) {
			$devolucion_factura_session=new devolucion_factura_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('cliente');$classes[]=$class;
			$class=new Classe('forma_pago_cliente');$classes[]=$class;
			$class=new Classe('cuenta_corriente');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$documento_cuenta_cobrarLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->documento_cuenta_cobrars=$documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$documento_cuenta_cobrars = $this->documento_cuenta_cobrars;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = documento_cuenta_cobrar_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = documento_cuenta_cobrar_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/cuentascobrar/presentation/templating/documento_cuenta_cobrar_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->documento_cuenta_cobrars=$documento_cuenta_cobrars;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->documento_cuenta_cobrarsLocal=$documento_cuenta_cobrarsLocal;
		$template->classes=$classes;
		$template->style_tabla=$style_tabla;
		$template->style_div=$style_div;
		$template->class_cabecera=$class_cabecera;
		$template->class_table=$class_table;		
		$template->proceso_print=$proceso_print;
		
		$htmlTablaLocal=$template->render_html();
		
		//TEMPLATING
		
		
		
		
		
		$this->htmlTabla=$htmlTablaLocal;
			
		return $htmlTablaLocal;
	}	
	
	public function getHtmlTablaDatosResumen(array $documento_cuenta_cobrars=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->documento_cuenta_cobrarsReporte = $documento_cuenta_cobrars;		
		$bitParaReporteOrderBy = $paraReporte; //$this->bitParaReporteOrderBy;
		
		$strAuxStyleBackgroundTablaPrincipal='';
		$strAuxStyleBackgroundTitulo='';
		$strAuxStyleBackgroundContenido='';
			$strAuxStyleBackgroundContenidoCabecera='';
			$strAuxStyleBackgroundContenidoDetalle='';		
		$strAuxStyleBackgroundIzquierda='';
		$strAuxStyleBackgroundDerecha='';
		
		
		
		if(!$paraReporte) {
			$strAuxStyleBackgroundTablaPrincipal=' class="tablaficha" ';
			$strAuxStyleBackgroundContenido=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-contenido-resumen.jpg);background-repeat:repeat;"';
				$strAuxStyleBackgroundContenidoCabecera='';
				$strAuxStyleBackgroundContenidoDetalle='';				
			$strAuxStyleBackgroundTitulo=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-titulo-resumen.gif);background-repeat:repeat;"';
			$strAuxStyleBackgroundIzquierda=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-izquierda-resumen.gif);background-repeat:repeat;"';
			$strAuxStyleBackgroundDerecha=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-derecha-resumen.gif);background-repeat:repeat;"';
			
			
		} else {
			$strAuxStyleBackgroundTablaPrincipal='';
			$strAuxStyleBackgroundTitulo=' class="cabeceraformulario" ';
			$strAuxStyleBackgroundContenido='';			
				$strAuxStyleBackgroundContenidoCabecera=' class="filazebra" ';
				$strAuxStyleBackgroundContenidoDetalle='';				
			$strAuxStyleBackgroundIzquierda='';
			$strAuxStyleBackgroundDerecha='';						
		}
		
		$strAuxColumnRowSpan='
			<td rowspan="#rowspan" '.$strAuxStyleBackgroundIzquierda.'>
				<pre> 
				</pre>
			</td>';
						
		$strTamanioTablaPrincipal="500px";
		
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliardocumento_cuenta_cobrarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliardocumento_cuenta_cobrarsAjaxWebPart\').style.overflow=\'auto\';';
		}
	
		//TEMPLATING CONTROLLER BASE
		
		$this->paraReporte=$paraReporte;
		$this->proceso_print=$proceso_print;
		$this->strAuxStyleBackgroundTablaPrincipal=$strAuxStyleBackgroundTablaPrincipal;
		$this->borderValue=$borderValue;
		$this->strTamanioTablaPrincipal=$strTamanioTablaPrincipal;
		$this->strAuxStyleBackgroundTitulo=$strAuxStyleBackgroundTitulo;
		
		$this->strAuxStyleBackgroundContenido=$strAuxStyleBackgroundContenido;
		$this->strAuxStyleBackgroundContenidoCabecera=$strAuxStyleBackgroundContenidoCabecera;
		$this->bitParaReporteOrderBy=$bitParaReporteOrderBy;
		
		
		if($rowSpanValue!=null);
		if($blnTieneCampo!=null);
		
		return $htmlTablaLocal;
	}	
	
	public function getHtmlTablaDatosRelaciones(array $documento_cuenta_cobrars=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->documento_cuenta_cobrarsReporte = $documento_cuenta_cobrars;		
		$bitParaReporteOrderBy = $paraReporte; //$this->bitParaReporteOrderBy;
		
		$strAuxStyleBackgroundTablaPrincipal='';
		$strAuxStyleBackgroundTitulo='';
		$strAuxStyleBackgroundContenido='';
			$strAuxStyleBackgroundContenidoCabecera='';
			$strAuxStyleBackgroundContenidoDetalle='';		
		$strAuxStyleBackgroundIzquierda='';
		$strAuxStyleBackgroundDerecha='';
		
		
		
		if(!$paraReporte) {
			$strAuxStyleBackgroundTablaPrincipal=' class="tablaficha" ';
			$strAuxStyleBackgroundContenido=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-contenido-resumen.jpg);background-repeat:repeat;"';
				$strAuxStyleBackgroundContenidoCabecera='';
				$strAuxStyleBackgroundContenidoDetalle='';				
			$strAuxStyleBackgroundTitulo=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-titulo-resumen.gif);background-repeat:repeat;"';
			$strAuxStyleBackgroundIzquierda=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-izquierda-resumen.gif);background-repeat:repeat;"';
			$strAuxStyleBackgroundDerecha=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-derecha-resumen.gif);background-repeat:repeat;"';
			
			
		} else {
			$strAuxStyleBackgroundTablaPrincipal='';
			$strAuxStyleBackgroundTitulo=' class="cabeceraformulario" ';
			$strAuxStyleBackgroundContenido='';			
				$strAuxStyleBackgroundContenidoCabecera=' class="filazebra" ';
				$strAuxStyleBackgroundContenidoDetalle='';				
			$strAuxStyleBackgroundIzquierda='';
			$strAuxStyleBackgroundDerecha='';	
		}
		
		$strAuxColumnRowSpan='
			<td rowspan="#rowspan" '.$strAuxStyleBackgroundIzquierda.'>
				<pre> 
				</pre>
			</td>';
						
		$strTamanioTablaPrincipal="500px";
		
		
		$this->documento_cuenta_cobrarsReporte=$this->cargarRelaciones($documento_cuenta_cobrars);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliardocumento_cuenta_cobrarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliardocumento_cuenta_cobrarsAjaxWebPart\').style.overflow=\'auto\';';			
		}
		
	
		//TEMPLATING CONTROLLER BASE
		
		$this->paraReporte=$paraReporte;
		$this->proceso_print=$proceso_print;
		$this->strAuxStyleBackgroundTablaPrincipal=$strAuxStyleBackgroundTablaPrincipal;
		$this->borderValue=$borderValue;
		$this->strTamanioTablaPrincipal=$strTamanioTablaPrincipal;
		$this->strAuxStyleBackgroundTitulo=$strAuxStyleBackgroundTitulo;
		
		$this->strAuxStyleBackgroundContenido=$strAuxStyleBackgroundContenido;
		$this->strAuxStyleBackgroundContenidoCabecera=$strAuxStyleBackgroundContenidoCabecera;
		$this->bitParaReporteOrderBy=$bitParaReporteOrderBy;
		
		if($rowSpanValue!=null);
		if($blnTieneCampo!=null);
		
		return $htmlTablaLocal;
	}
	
	public function getHtmlTablaAccionesRelaciones(documento_cuenta_cobrar $documento_cuenta_cobrar=null) : string {	
		$htmlTablaLocal='';
		$PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		
	
		if($PATH_IMAGEN!=null);
		
		return $htmlTablaLocal;
	}
	
	public function generarHtmlReporte() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*
			if($this->bitConEditar) {
				$this->bitConAltoMaximoTabla=true;
			}
			*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			/*$checkbox_parareporte=null;*/
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
			
			
			
			$this->getHtmlTablaDatos(true);
			
									
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS, SE REPITE
			//$this->returnHtml(true);			
		
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function generarHtmlFormReporte() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			$documento_cuenta_cobrarsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$documento_cuenta_cobrarsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($documento_cuenta_cobrarsLocal)<=0) {
					/*//DEBE ESCOGER
					$documento_cuenta_cobrarsLocal=$this->documento_cuenta_cobrars;*/
				}
			} else {
				/*//DEBE ESCOGER
				$documento_cuenta_cobrarsLocal=$this->documento_cuenta_cobrars;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($documento_cuenta_cobrarsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($documento_cuenta_cobrarsLocal,true);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
		
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function generarHtmlRelacionesReporte() {
		
		try {			
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}
					
			$documento_cuenta_cobrarsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$documento_cuenta_cobrarsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($documento_cuenta_cobrarsLocal)<=0) {
					/*//DEBE ESCOGER
					$documento_cuenta_cobrarsLocal=$this->documento_cuenta_cobrars;*/
				}
			} else {
				/*//DEBE ESCOGER
				$documento_cuenta_cobrarsLocal=$this->documento_cuenta_cobrars;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($documento_cuenta_cobrarsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($documento_cuenta_cobrarsLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function generarReporteAuxiliar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function generarFpdf() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			$this->layout = 'fpdf';
			
			$titulo=Constantes::getstrAreaDepartamento();
			$subtitulo='Reporte de  Documentos Cuentas por Cobrares';
			
			$header=array();
			$data=array();
			//$row=array();
			//$cellReport=new CellReport();
					
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderByFromData();
			
			/*PARA COLUMNAS DINAMICAS*/
			
			
			$header=$this->getHeadersReport('NORMAL');
			
			$data=$this->getDataReport(false,'NORMAL');						
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			$fpdf_helper=new FpdfHelper();
			
			$font='Arial';
			$sizefont=12;
			$fileName='documento_cuenta_cobrar';
			
			header("Content-type: application/pdf"); 
			header('Content-Disposition: attachment;filename="'.$fileName.'.pdf"'); 
			header('Cache-Control: max-age=0'); 
		
			$fpdf_helper->SetFont($font,'',$sizefont);
			$fpdf_helper->title=$titulo; 
			$fpdf_helper->subtitle=$subtitulo;
			$fpdf_helper->AddPage();
			$fpdf_helper->basicTable($header,$data);
			
						
			echo $fpdf_helper->fpdfOutput();  
			
		} catch(Exception $e) {
			
			throw $e;
		}
	}
	
	public function generarReporteConPhpExcel(string $strTipoReporte='PDF') {
		try {
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
			
						
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
		
		
			/*NO UTILIZA LAYOUT*/
			$this->layout ='';
									
			$header=array();
			$data=array();
						
			$header=$this->getHeadersReport('NORMAL');
			
			$data=$this->getDataReport(false,'NORMAL');
					
			
			$excel_helper=new ExcelHelper();
			
			$title='Reporte de  Documentos Cuentas por Cobrares';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
		} catch(Exception $e) {
			throw $e;
		}
    } 
	
	public function generarReporteConPhpExcelVertical(string $strTipoReporte='PDF') {
		try {
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderByFromData();
			
			/*PARA COLUMNAS DINAMICAS*/
			
			/*NO UTILIZA LAYOUT*/
			$this->layout ='';
	
			$header=array();
			$data=array();
						
			/*$header=$this->getHeadersReportVertical();*/
			
			$data=$this->getDataReportVertical();
					
			
			$excel_helper=new ExcelHelper();
			
			$title='Reporte de  Documentos Cuentas por Cobrares';
			$tipo=$strTipoReporte;
			
			$excel_helper->generateVertical($header,$data, $title,$tipo,'webroot');
			
		} catch(Exception $e) {
			throw $e;
		}
    } 
	
	public function generarReporteConPhpExcelRelaciones(string $strTipoReporte='PDF') {
		try {
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}
					
			/*$this->inicializarVariables('NORMAL');
			
			//PARA COLUMNAS DINAMICAS*/
			
			$orderByQueryRelAux=Funciones::getCargarOrderByQueryRel($this->arrOrderByRel,$this->data,'REPORTE');
			$orderByQueryRelAux=trim($orderByQueryRelAux);
			
			$this->bitParaReporteOrderByRel=false;
			$checkbox_parareporte_rel=null;
				
			$this->getDataParaReporteOrderByRelFromData();
			
			/*PARA COLUMNAS DINAMICAS*/
		
		
			/*NO UTILIZA LAYOUT*/
			$this->layout ='';
									
			$header=array();
			$data=array();
						
			$header=$this->getHeadersReport('NORMAL');
			
			$data=$this->getDataReport(true,'NORMAL');
					
			
			$excel_helper=new ExcelHelper();
			
			$title='Reporte de  Documentos Cuentas por Cobrares';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=documento_cuenta_cobrar_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
		return $header;
	}
	
	public function ValCol(string $sColName,bool $paraReporte) {
		$valido=true;
		
		if($paraReporte) {
			$valido=Funciones::existeCadenaArrayOrderBy($sColName,$this->arrOrderBy,$this->bitParaReporteOrderBy);
		}
		
		return $valido;
	}
	
	
	
	public function getDataReport(bool $paraRelaciones=false,string $tipo='NORMAL') : array {	
		$data=array();
		$row=array();
		$cellReport=new CellReport();
		$this->documento_cuenta_cobrarsAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->documento_cuenta_cobrarsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->documento_cuenta_cobrarsAuxiliar)<=0) {
					$this->documento_cuenta_cobrarsAuxiliar=$this->documento_cuenta_cobrars;
				}
			} else {
				$this->documento_cuenta_cobrarsAuxiliar=$this->documento_cuenta_cobrars;
			}
		/*} else {
			$this->documento_cuenta_cobrarsAuxiliar=$this->documento_cuenta_cobrarsReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->documento_cuenta_cobrarsAuxiliar as $documento_cuenta_cobrar) {
				$row=array();
				
				$row=documento_cuenta_cobrar_util::getDataReportRow($tipo,$documento_cuenta_cobrar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			imagen_documento_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			factura_lote_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			devolucion_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$documento_cuenta_cobrarsResp=array();
			$classes=array();
			
			
				$class=new Classe('factura'); 	$classes[]=$class;
				$class=new Classe('imagen_documento_cuenta_cobrar'); 	$classes[]=$class;
				$class=new Classe('factura_lote'); 	$classes[]=$class;
				$class=new Classe('devolucion_factura'); 	$classes[]=$class;
			
			
			$documento_cuenta_cobrarsResp=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();
			
			$this->documento_cuenta_cobrarLogic->setIsConDeep(true);
			
			$this->documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrars($this->documento_cuenta_cobrarsAuxiliar);
			
			$this->documento_cuenta_cobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->documento_cuenta_cobrarsAuxiliar=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();
			
			//RESPALDO
			$this->documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrars($documento_cuenta_cobrarsResp);
			
			$this->documento_cuenta_cobrarLogic->setIsConDeep(false);
			*/
			
			$this->documento_cuenta_cobrarsAuxiliar=$this->cargarRelaciones($this->documento_cuenta_cobrarsAuxiliar);
			
			$i=0;
			
			foreach ($this->documento_cuenta_cobrarsAuxiliar as $documento_cuenta_cobrar) {
				$row=array();
				
				if($i!=0) {
					$row=documento_cuenta_cobrar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=documento_cuenta_cobrar_util::getDataReportRow($tipo,$documento_cuenta_cobrar,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//factura
				if(Funciones::existeCadenaArrayOrderBy(factura_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($documento_cuenta_cobrar->getfacturas())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(factura_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=factura_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($documento_cuenta_cobrar->getfacturas() as $factura) {
						$row=factura_util::getDataReportRow('RELACIONADO',$factura,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//imagen_documento_cuenta_cobrar
				if(Funciones::existeCadenaArrayOrderBy(imagen_documento_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($documento_cuenta_cobrar->getimagen_documento_cuenta_cobrars())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(imagen_documento_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=imagen_documento_cuenta_cobrar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($documento_cuenta_cobrar->getimagen_documento_cuenta_cobrars() as $imagen_documento_cuenta_cobrar) {
						$row=imagen_documento_cuenta_cobrar_util::getDataReportRow('RELACIONADO',$imagen_documento_cuenta_cobrar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//factura_lote
				if(Funciones::existeCadenaArrayOrderBy(factura_lote_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($documento_cuenta_cobrar->getfactura_lotes())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(factura_lote_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=factura_lote_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($documento_cuenta_cobrar->getfactura_lotes() as $factura_lote) {
						$row=factura_lote_util::getDataReportRow('RELACIONADO',$factura_lote,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//devolucion_factura
				if(Funciones::existeCadenaArrayOrderBy(devolucion_factura_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($documento_cuenta_cobrar->getdevolucion_facturas())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(devolucion_factura_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=devolucion_factura_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($documento_cuenta_cobrar->getdevolucion_facturas() as $devolucion_factura) {
						$row=devolucion_factura_util::getDataReportRow('RELACIONADO',$devolucion_factura,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}
				
				$i++;
			}
		}
		
		if($cellReport!=null);
		
		return $data;
	}
	
	public function getDataReportVertical() : array {	
		$data=array();
		$row=array();
		$cellReport=new CellReport();
		$this->documento_cuenta_cobrarsAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->documento_cuenta_cobrarsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->documento_cuenta_cobrarsAuxiliar)<=0) {
					$this->documento_cuenta_cobrarsAuxiliar=$this->documento_cuenta_cobrars;
				}
			} else {
				$this->documento_cuenta_cobrarsAuxiliar=$this->documento_cuenta_cobrars;
			}
		/*} else {
			$this->documento_cuenta_cobrarsAuxiliar=$this->documento_cuenta_cobrarsReporte;	
		}*/
		
		foreach ($this->documento_cuenta_cobrarsAuxiliar as $documento_cuenta_cobrar) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(documento_cuenta_cobrar_util::getdocumento_cuenta_cobrarDescripcion($documento_cuenta_cobrar),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Sucursal',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sucursal',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getid_sucursalDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ejercicio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ejercicio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getid_ejercicioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Periodo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Periodo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getid_periodoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Usuario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Usuario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getid_usuarioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Numero',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getnumero(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cliente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cliente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getid_clienteDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Tipo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->gettipo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Emision',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Emision',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getfecha_emision(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descripcion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getdescripcion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getmonto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Monto Parcial',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto Parcial',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getmonto_parcial(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Moneda',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Moneda',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getmoneda(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Vencimiento',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Vencimiento',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getfecha_vence(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nro De Pagos',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nro De Pagos',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getnumero_de_pagos(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Balance',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Balance',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getbalance(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nro Documento Pagado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nro Documento Pagado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getnumero_pagado(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Id Pagado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Id Pagado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getid_pagado(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Modulo Origen',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Modulo Origen',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getmodulo_origen(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Id Origen',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Id Origen',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getid_origen(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Modulo Destino',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Modulo Destino',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getmodulo_destino(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Id Destino',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Id Destino',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getid_destino(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre Pc',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Pc',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getnombre_pc(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Hora',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Hora',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->gethora(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Monto Mora',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto Mora',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getmonto_mora(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Interes Mora',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Interes Mora',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getinteres_mora(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Dias Gracia Mora',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Dias Gracia Mora',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getdias_gracia_mora(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Instrumento Pago',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Instrumento Pago',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getinstrumento_pago(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Tipo Cambio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo Cambio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->gettipo_cambio(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nro Documento Cliente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nro Documento Cliente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getnumero_cliente(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Clase Registro',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Clase Registro',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getclase_registro(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Estado Registro',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Estado Registro',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getestado_registro(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Motivo Anulacion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Motivo Anulacion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getmotivo_anulacion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Impuesto 1',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto 1',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getimpuesto_1(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Impuesto 2',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto 2',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getimpuesto_2(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Impuesto Incluido',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto Incluido',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getimpuesto_incluido(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Observaciones',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Observaciones',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getobservaciones(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Grupo Pago',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Grupo Pago',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getgrupo_pago(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Termino Idpv',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Termino Idpv',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->gettermino_idpv(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Forma Pago Cliente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Forma Pago Cliente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getid_forma_pago_clienteDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nro Pago',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nro Pago',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getnro_pago(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Referencia Pago',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Referencia Pago',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getref_pago(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Hora',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Hora',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getfecha_hora(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Id Base',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Id Base',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getid_base(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cuenta Cliente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Cliente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getid_cuenta_corrienteDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ncf',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ncf',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_cobrar->getncf(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface documento_cuenta_cobrar_base_controlI {			
		
		public function inicializarVariables(string $strType);		
		public function inicializar();
		
		public function cargarParametros();		
		public function cargarDatosLogicClaseBean(bool $esParaLogic=true);		
		public function inicializarMensajesDatosInvalidos();		
		public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo);		
		public function inicializarMensajesDefectoDatosInvalidos();
		
		public function nuevo();		
		public function actualizar();		
		public function eliminar(?int $idActual=0);		
		public function getIndiceNuevo() : int;		
		public function getIndiceActual(documento_cuenta_cobrar $documento_cuenta_cobrar,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(documento_cuenta_cobrar $documento_cuenta_cobrar,array $documento_cuenta_cobrars);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : documento_cuenta_cobrar_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $documento_cuenta_cobrars,documento_cuenta_cobrar $documento_cuenta_cobrar);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(documento_cuenta_cobrar_param_return $documento_cuenta_cobrarReturnGeneral);		
		public function actualizarEstadoCeldasBotones(string $strAccion,bool $bitGuardarCambiosEnLote=false,bool $bitEsMantenimientoRelacionado=false);		
		public function manejarRetornarExcepcion(Exception $e);		
		public function cancelarControles();		
		public function inicializarAuxiliares();		
		public function inicializarMensajesTipo(string $tipo,$e=null);		
		public function prepararEjecutarMantenimiento();		
		public function setTipoAction(string $action='INDEX');		
		public function cargarDatosCliente();		
		public function cargarParametrosPagina();		
		public function cargarParametrosEventosTabla();		
		public function cargarParametrosReporte();		
		public function cargarParamsPostAccion();		
		public function cargarParamsPaginar();
		
		public function returnHtml(bool $bitConRetrurnAjax);		
		public function returnAjax();
		
		public function actualizarDesdeSessionDivStyleVariables(documento_cuenta_cobrar_session $documento_cuenta_cobrar_session);		
		public function actualizarInvitadoSessionDivStyleVariables(documento_cuenta_cobrar_session $documento_cuenta_cobrar_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(documento_cuenta_cobrar $documento_cuenta_cobrarOrigen,documento_cuenta_cobrar $documento_cuenta_cobrar,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(documento_cuenta_cobrar_control $documento_cuenta_cobrar_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $documento_cuenta_cobrars=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(documento_cuenta_cobrar_session $documento_cuenta_cobrar_session);		
		public function setPermisosUsuarioConPermiso(string $strPermiso);		
		public function setPermisosMantenimientoUsuarioConPermiso(string $strPermiso);
		
		public function setPermisosUsuario();		
		public function setAccionesUsuario();		
		
		//Todo,ActualizarOriginal,Consulta,Busqueda,Reporte
		public function inicializarPermisos();		
		public function inicializarSetPermisosUsuarioClasesRelacionadas();
		
		
		//VIEW_LAYER
		public function setHtmlTablaDatos() : string;		
		public function getHtmlTablaDatos(bool $paraReporte=false) : string;		
		public function setHtmlTablaDatosParaBusqueda() : string;		
		public function getHtmlTablaDatosParaBusqueda(bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosResumen(array $documento_cuenta_cobrars=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $documento_cuenta_cobrars=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(documento_cuenta_cobrar $documento_cuenta_cobrar=null) : string;
		
		public function generarHtmlReporte();		
		public function generarHtmlFormReporte();		
		public function generarHtmlRelacionesReporte();
		
		public function generarReporteAuxiliar();		
		public function generarFpdf();		
		public function generarReporteConPhpExcel(string $strTipoReporte='PDF');		
		public function generarReporteConPhpExcelVertical(string $strTipoReporte='PDF');		
		public function generarReporteConPhpExcelRelaciones(string $strTipoReporte='PDF');		
		public function getHeadersReport(string $tipo='NORMAL');
		
		public function ValCol(string $sColName,bool $paraReporte);				
		public function getDataReport(bool $paraRelaciones=false,string $tipo='NORMAL') : array;		
		public function getDataReportVertical() : array;
	}

	*/
}

?>
