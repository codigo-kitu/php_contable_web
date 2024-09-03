<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\util;

//PHP5.3-use com\bydan\framework\medical\business\entity\Classe;
//PHP5.3-use com\bydan\framework\medical\business\entity\LogHtmlFormatter;

use reportico;

use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\presentation\templating\Template;

use com\bydan\contabilidad\seguridad\grupo_opcion\business\entity\grupo_opcion;
use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;

class Funciones {

	public static function getIdUsuarioAutomatico(string $strNombreUsuarioAutomatico):int {
		$idUsuarioAutomatico=0;
		
		if($strNombreUsuarioAutomatico=='invitado') {
			$idUsuarioAutomatico=36;
		} else if($strNombreUsuarioAutomatico=='invitado2') {
			$idUsuarioAutomatico=0;
		} else if($strNombreUsuarioAutomatico=='invitado3') {
			$idUsuarioAutomatico=0;
		}
		
		return $idUsuarioAutomatico;
	}
	
	public static function getSha1Encryption(string $strText) :string {
		$strReturnText='';
		
		$strReturnText=sha1($strText);
		
		return $strReturnText;
	}
	
	public static function getYear():string {
	    $year='';
	    
	    $year=date('Y');
	    
	    return $year;
	}
	
	public static function getMonth():string {
	    $month='';
	    
	    $month=date('m');
	    
	    return $month;
	}
	
	public static function getFechaHoraActual():string {
		$strReturnFechaHora='';
		//$dtToday= getdate();
		
		//$strReturnFechaHora=$dtToday['year'].'-'.$dtToday['mon'].'-'.$dtToday['mday'].' '.$dtToday['hours'].':'.$dtToday['minutes'].':'.$dtToday['seconds'];
		
		$strReturnFechaHora=date('Y-m-d H:i:s');
		
		return $strReturnFechaHora;
	}
	
	public static function getFechaActual() :string{
		$strReturnFechaHora='';
		//$dtToday= getdate();
		
		//$strReturnFechaHora=$dtToday['year'].'-'.$dtToday['mon'].'-'.$dtToday['mday'].' '.$dtToday['hours'].':'.$dtToday['minutes'].':'.$dtToday['seconds'];
		
		$strReturnFechaHora=date('Y-m-d');
		
		return $strReturnFechaHora;
	}

	public static function getFechaHoraDefecto():string {
		$strReturnFechaHora='0000-00-00 00:00:00';
		
		return $strReturnFechaHora;
	}
	
	public static function getBooleanFromDataValue($data_value):bool {
		$blnBoolean=false;
		
		if($data_value!=null && $data_value!='') {
			if($data_value===1 || $data_value==='1' || $data_value==='on' || $data_value===true || $data_value==='true') {
				$blnBoolean=true;	
			}
		}
		
		return $blnBoolean;
	}
	
	public static function getBooleanFromDataValueBusqueda($data_value): string {
		$blnBoolean='false';
		
		if($data_value==1 || $data_value=='1' || $data_value=='on' || $data_value==true || $data_value=='true') {
			$blnBoolean='true';	
		}
		
		return $blnBoolean;
	}
	
	public static function getBooleanFromDataValueArray3(mixed $data,string $nombre1,string $nombre2):bool {
		$blnBoolean=false;

		if(is_array($data)) {

			if(array_key_exists($nombre1,$data) && array_key_exists($nombre2,$data[$nombre1])) {
				$data_value=$data[$nombre1][$nombre2];
				
				if($data_value!=null && $data_value!='') {
					if($data_value==1 || $data_value=='1' || $data_value=='on' || $data_value==true || $data_value=='true') {
						$blnBoolean=true;
					}
				}
			}

		} else {

			if(property_exists($data,$nombre1) && property_exists($data->{$nombre1},$nombre2)) {
				$data_value=$data->{$nombre1}->{$nombre2};
				
				if($data_value!=null && $data_value!='') {
					if($data_value==1 || $data_value=='1' || $data_value=='on' || $data_value==true || $data_value=='true') {
						$blnBoolean=true;
					}
				}
			}
		}

		return $blnBoolean;
	}
	
	public static function getBooleanFromDataValueArray2(mixed $data,string $nombre1,string $nombre2):bool {
		$blnBoolean=false;
	
		/*xdebug_break();*/
		
		if(is_array($data)) {

			if(array_key_exists($nombre1,$data) && array_key_exists($nombre2,$data[$nombre1])) {
				$data_value = $data[$nombre1][$nombre2];
		
				if($data_value!=null && $data_value!='') {
					if($data_value==1 || $data_value=='1' || $data_value=='on' || $data_value==true || $data_value=='true') {
						$blnBoolean=true;
					}
				}
			}
		} else {
			if(property_exists($data,$nombre1) && property_exists($data->{$nombre1},$nombre2)) {
				$data_value = $data->{$nombre1}->{$nombre2};
		
				if($data_value!=null && $data_value!='') {
					if($data_value==1 || $data_value=='1' || $data_value=='on' || $data_value==true || $data_value=='true') {
						$blnBoolean=true;
					}
				}
			}
		}

		return $blnBoolean;
	}
	
	public static function getBooleanFromDataValueArray4(mixed $data_value):bool {
		$blnBoolean=false;
	
		/*xdebug_break();*/
						
		if($data_value!=null && $data_value!='') {
			if($data_value==1 || $data_value=='1' || $data_value=='on' || $data_value==true || $data_value=='true') {
				$blnBoolean=true;
			}
		}			

		return $blnBoolean;
	}

	/*
	public static function getBooleanFromDataValueArray2($data,$nombre1) {
		$blnBoolean=false;
	
		//xdebug_break();
		
		if(is_array($data)) {
			if(array_key_exists($nombre1,$data)) {
				$data_value=$data[$nombre1];
					
				if($data_value!=null && $data_value!='') {
					if($data_value==1 || $data_value=='1' || $data_value=='on' || $data_value==true || $data_value=='true') {
						$blnBoolean=true;
					}
				}
			}
		} else {
			
		}

		return $blnBoolean;
	}
	*/
	
	public static function getFechaHoraFromData(string $strTipo, $data,string $strNombreCampo):string {
		$strReturnFechaHora='';
		
		$countArrayFecha=count((array)$data[$strNombreCampo]);
		
		if($countArrayFecha>1) {
			if($strTipo=='date') {
				$strReturnFechaHora=$data[$strNombreCampo]['year'].'-'.$data[$strNombreCampo]['month'].'-'.$data[$strNombreCampo]['day'];
			
			} else if($strTipo=='time') {
				$strReturnFechaHora=$data[$strNombreCampo]['hour'].':'.$data[$strNombreCampo]['min'];
			
			} else if($strTipo=='datetime') {
				$strReturnFechaHora=$data[$strNombreCampo]['year'].'-'.$data[$strNombreCampo]['month'].'-'.$data[$strNombreCampo]['day'].' '.$data[$strNombreCampo]['hour'].':'.$data[$strNombreCampo]['min'];
			}
		} else {
			$strReturnFechaHora=$data[$strNombreCampo];
		}
		
		return $strReturnFechaHora;
	}
	
	public static function getFechaHoraFromData2(string $strTipo, mixed $countArrayFecha):string {
		$strReturnFechaHora='';
		
		$countArrayFecha=count((array)$countArrayFecha);
		
		if($countArrayFecha>1) {
			if($strTipo=='date') {
				$strReturnFechaHora=$countArrayFecha['year'].'-'.$countArrayFecha['month'].'-'.$countArrayFecha['day'];
			
			} else if($strTipo=='time') {
				$strReturnFechaHora=$countArrayFecha['hour'].':'.$countArrayFecha['min'];
			
			} else if($strTipo=='datetime') {
				$strReturnFechaHora=$countArrayFecha['year'].'-'.$countArrayFecha['month'].'-'.$countArrayFecha['day'].' '.$countArrayFecha['hour'].':'.$countArrayFecha['min'];
			}
		} else {
			$strReturnFechaHora=$countArrayFecha;
		}
		
		return $strReturnFechaHora;
	}

	public static function getFechaHoraFromDataBusqueda(string $strTipo,mixed $data,string $strNombreBusqueda,string $strNombreCampo):string {
		$strReturnFechaHora='';
		
		/*
		$existe=false;
		$existe2=false;
		
		if (is_array($data[$strNombreBusqueda][$strNombreCampo]) && array_key_exists('year', $data[$strNombreBusqueda][$strNombreCampo])) {
		    $existe=true;
		}
		
		if (is_array($data[$strNombreBusqueda]) && array_key_exists($strNombreCampo, $data[$strNombreBusqueda])) {
		    $existe2=true;
		}
		*/
		
		//$countArrayFecha=count($data[$strNombreBusqueda][$strNombreCampo]);
		
		//if($countArrayFecha>1) {
		
		if(is_array($data)) {
			if (is_array($data[$strNombreBusqueda][$strNombreCampo]) && array_key_exists('year', $data[$strNombreBusqueda][$strNombreCampo])) {
				
				if($strTipo=='date') {
					$strReturnFechaHora=$data[$strNombreBusqueda][$strNombreCampo]['year'].'-'.$data[$strNombreBusqueda][$strNombreCampo]['month'].'-'.$data[$strNombreBusqueda][$strNombreCampo]['day'];
				
				} else if($strTipo=='time') {
					$strReturnFechaHora=$data[$strNombreBusqueda][$strNombreCampo]['hour'].':'.$data[$strNombreBusqueda][$strNombreCampo]['min'];
				
				} else if($strTipo=='datetime') {
					$strReturnFechaHora=$data[$strNombreBusqueda][$strNombreCampo]['year'].'-'.$data[$strNombreBusqueda][$strNombreCampo]['month'].'-'.$data[$strNombreBusqueda][$strNombreCampo]['day'].' '.$data[$strNombreBusqueda][$strNombreCampo]['hour'].':'.$data[$strNombreBusqueda][$strNombreCampo]['min'];
				}
			} else {
				$strReturnFechaHora=$data[$strNombreBusqueda][$strNombreCampo];
			}

		} else {

			if (isset($data->{$strNombreBusqueda}->{$strNombreCampo}) && property_exists($data->{$strNombreBusqueda}->{$strNombreCampo},'year')) {
				
				if($strTipo=='date') {
					$strReturnFechaHora=$data->{$strNombreBusqueda}->{$strNombreCampo}->{'year'}.'-'.$data->{$strNombreBusqueda}->{$strNombreCampo}->{'month'}.'-'.$data->{$strNombreBusqueda}->{$strNombreCampo}->{'day'};
				
				} else if($strTipo=='time') {
					$strReturnFechaHora=$data->{$strNombreBusqueda}->{$strNombreCampo}->{'hour'}.':'.$data->{$strNombreBusqueda}->{$strNombreCampo}->{'min'};
				
				} else if($strTipo=='datetime') {
					$strReturnFechaHora=$data->{$strNombreBusqueda}->{$strNombreCampo}->{'year'}.'-'.$data->{$strNombreBusqueda}->{$strNombreCampo}->{'month'}.'-'.$data->{$strNombreBusqueda}->{$strNombreCampo}->{'day'}.' '.$data->{$strNombreBusqueda}->{$strNombreCampo}->{'hour'}.':'.$data->{$strNombreBusqueda}->{$strNombreCampo}->{'min'};
				}
			} else {
				$strReturnFechaHora=$data->{$strNombreBusqueda}->{$strNombreCampo};
			}
		}

		return $strReturnFechaHora;
	}
	
	public static function getFechaHoraCakeFromEntity(string $strTipo,$valueEntity):array {
		$strReturnFechaHoraCake=array();
		$valuesEntity=array();
		
		if($strTipo=='date') {
			$valuesEntity=explode('-',$valueEntity);
			
			//[$strNombreCampo]
			/*
			$strReturnFechaHoraCake['year']=$valuesEntity[0];
			$strReturnFechaHoraCake['month']=$valuesEntity[1];
			$strReturnFechaHoraCake['day']=$valuesEntity[2];
			*/
			
			$strReturnFechaHoraCake=array('year'=>$valuesEntity[0],'month'=>$valuesEntity[1],'day'=>$valuesEntity[2]);
		
		} else if($strTipo=='time') {
			$valuesEntity=explode(':',$valueEntity);
			
			//[$strNombreCampo]
			$strReturnFechaHoraCake['hour']=$valuesEntity[0];
			$strReturnFechaHoraCake['min']=$valuesEntity[1];
		
		} else if($strTipo=='datetime') {
			$valuesEntity=explode(' ',$valueEntity);
			
			$valuesEntityDate=array();
			$valuesEntityTime=array();
			
			$valuesEntityDate=explode('-',$valuesEntity[0]);
			$valuesEntityTime=explode('-',$valuesEntity[1]);
			
			//[$strNombreCampo]
			$strReturnFechaHoraCake['year']=$valuesEntityDate[0];
			$strReturnFechaHoraCake['month']=$valuesEntityDate[1];
			$strReturnFechaHoraCake['day']=$valuesEntityDate[2];
			
			$strReturnFechaHoraCake['hour']=$valuesEntityTime[0];
			$strReturnFechaHoraCake['min']=$valuesEntityTime[1];
		}
		
		return $strReturnFechaHoraCake;
	}
	
    public static function getMenuUsuario(array $opcionesUsuario,$tree,string $webroot) {
		$webrootImagenes=$webroot;	
		$webroot=str_replace('/webroot','',$webroot);
		
		//echo count($opcionesUsuario);
		
		if($opcionesUsuario!=null && count($opcionesUsuario)>0) {		
			$opcionesPrimerNivel=array();
			$opcionesHijos=array();
			
			/*
			$menuItems=array();
			$menuItem=array();
			$menuItemHijo=array();
			*/
			
			$opcionesPrimerNivel=Funciones::getMenuOpcionesPrimerNivel($opcionesUsuario);
			
			//CUANDO UN ELEMENTO ES SELECCIONADO, DINAMICAMENTE SE A�ADE UN SPAN, ESTO SE PREGUNTA PARA RECARGAR ANI PROCESANDO
			
			/*
			foreach ($opcionesPrimerNivel as $opcion) {
				$opcionesHijos=Funciones::getMenuOpcionesHijos($opcionesUsuario,$opcion);
				
				if(count($opcionesHijos)>0) {
					Funciones::getMenuUsuarioOpcionesHijos($opcion,$opcionesHijos,$opcionesUsuario,$tree);															
				} else {					
					//$menuItem[$opcion->getnombre()]=$opcion->getnombreClase();
					$tree->addToArray($opcion->getId(),$opcion->getnombre(),0,"","",$opcion->getnombreClase());					
				}		        			
			}
			*/
			
			//$idPadre=0;
			$url='';
			$pathImagen='';
			
			foreach ($opcionesPrimerNivel as $opcion) {
				$opcionesHijos=Funciones::getMenuOpcionesHijos($opcionesUsuario,$opcion);								
			
				if(count($opcionesHijos)>0) {
					$pathImagen=$webrootImagenes.'/img/menu/dhtmlgoodies_folder.gif';
					$url='';
					
					$tree->addToArray($opcion->getId(),$opcion->getnombre(),0,$url,'',$pathImagen);
						
					Funciones::getMenuUsuarioOpcionesHijos($opcion,$opcionesHijos,$opcionesUsuario,$tree,$webroot,$webrootImagenes);
				
				} else {
					$pathImagen=$webrootImagenes.'/img/menu/dhtmlgoodies_sheet.gif';
					$url=$webroot.'index.php/'.$opcion->getnombreClase().'/index/onload/none/none/index/false/false/none/none';
						
					$tree->addToArray($opcion->getId(),$opcion->getnombre(),0,$url,'',$pathImagen);
				}
					
				/*
				if($opcion->getid_opcion()!=null && $opcion->getid_opcion()!='' && $opcion->getid_opcion()>0) {
					$idPadre=$opcion->getid_opcion();
					$url=$opcion->getnombreClase();
					$webroot.'/img/menu/dhtmlgoodies_sheet.gif';
				} else {
					$idPadre=0;
					$url='';
					
					
					if(count($opcionesHijos)>0) {
						$pathImagen=$webroot.'/img/menu/dhtmlgoodies_folder.gif';
						$url='';
					} else {
						$pathImagen=$webroot.'/img/menu/dhtmlgoodies_sheet.gif';
						$url=$webroot.'index/'.$opcion->getnombreClase().'/onload';
					}
					
					
				}
				*/											        			
			}														
		}		
	}
	
	public static function getMenuUsuarioOpcionesHijos(?opcion $opcionPadre,?array $opcionesHijosUsuario,?array $opcionesUsuario,$tree,string $webroot,string $webrootImagenes) {
		
	    /*
	    $menuItems=array();
		$menuItemHijo=null;
		$menuItem=null;		
		$idPadre=0;
		*/
		
		$url='';
		$pathImagen='';
			
		foreach ($opcionesHijosUsuario as $opcionHijo) {
		       //	$menu->add(array('Opciones_Usuario',$opcionPadre->getnombre()), array( $opcionHijo->getnombre(), array('controller'=> $opcionHijo->getnombreClase(),'action' => 'index','onload')),array('li'=>array('style'=>'background:white','onclick'=>'if(this.getElementsByTagName("span").length<1){funcionGeneral.procesarInicioProceso();}')));
		       	//,array('active' =>array('tag' => 'span','attributes' => array('style' => 'color:red;','id'=>'current')))
		       	
		       	$opcionesHijos=Funciones::getMenuOpcionesHijos($opcionesUsuario,$opcionHijo);
				
		       	if(count($opcionesHijos)>0) {
		       		$pathImagen=$webrootImagenes.'/img/menu/dhtmlgoodies_folder.gif';
					$url='';
					$tree->addToArray($opcionHijo->getId(),$opcionHijo->getnombre(),$opcionHijo->getid_opcion(),$url,'',$pathImagen);
						
		       		Funciones::getMenuUsuarioOpcionesHijos($opcionHijo,$opcionesHijos,$opcionesUsuario,$tree,$webroot,$webrootImagenes);		       				       	  		
		       	
		       	} else {
		       		$pathImagen=$webrootImagenes.'/img/menu/dhtmlgoodies_sheet.gif';
					$url=$webroot.'index.php/'.$opcionHijo->getnombre_clase().'/index/onload/none/none/index/false/false/none/none';
						
					$tree->addToArray($opcionHijo->getId(),$opcionHijo->getnombre(),$opcionHijo->getid_opcion(),$url,'',$pathImagen);					
		       	}
		}		
	}
	
	public static function getMenuOpcionesPrimerNivel(array $opcionesUsuario):array {
		$opcionesPrimerNivel=array();
		
		foreach ($opcionesUsuario as $opcion) {
			if($opcion->getid_opcion()==null || $opcion->getid_opcion()==0) {
				$opcionesPrimerNivel[]=$opcion;
			}
		}
		
		return $opcionesPrimerNivel;
	}
	
	public static function getMenuOpcionesHijos(array $opcionesUsuario,opcion $opcionPadre):array {
		$opcionesHijos=array();
		
		foreach ($opcionesUsuario as $opcion) {
			if($opcion->getid_opcion()==$opcionPadre->getId()) {
				$opcionesHijos[]=$opcion;
			}
		}
		
		return $opcionesHijos;
	}
	
    /*MENU*/
    /*MENU_ARBOL_2_JQUERY*/
	public static function getMenuUsuarioJQuery2(array $opcionesUsuario,$tree,string $webroot):string {
		$webrootImagenes=$webroot;	
		$webroot=str_replace('/webroot','',$webroot);
		$menu_jquery='<ul id="menu_principal" style="background-color: yellow;">';
		$id_menu='';
		//echo count($opcionesUsuario);
		
		if($opcionesUsuario!=null && count($opcionesUsuario)>0) {		
			$opcionesPrimerNivel=array();
			$opcionesHijos=array();
			
			/*
			$menuItems=array();
			$menuItem=array();
			$menuItemHijo=array();
			*/
			
			$idModuloActual=null;
			
			if(array_key_exists('idModuloActual',$_SESSION)) {
				$idModuloActual=$_SESSION['idModuloActual'];
			}
			
			if($idModuloActual==null || $idModuloActual<=0) {
						
				$opcionesPrimerNivel=Funciones::getMenuOpcionesPrimerNivel($opcionesUsuario);
				
				//CUANDO UN ELEMENTO ES SELECCIONADO, DINAMICAMENTE SE A�ADE UN SPAN, ESTO SE PREGUNTA PARA RECARGAR ANI PROCESANDO
				
				
				//$idPadre=0;
				$url='';
				$pathImagen='';
				
				foreach ($opcionesPrimerNivel as $opcion) {
					$opcionesHijos=Funciones::getMenuOpcionesHijos($opcionesUsuario,$opcion);								
				
					if(count($opcionesHijos)>0) {
						$pathImagen=$webrootImagenes.'/img/menu/dhtmlgoodies_folder.gif';
						$url='';
						
						//$tree->addToArray($opcion->getId(),$opcion->getnombre(),0,$url,'',$pathImagen);
	
						if(Constantes::$IS_DEVELOPING) $id_menu='->'.$opcion->getId(); else $id_menu='';
						
						$menu_jquery.='<li><a href="#">'.$opcion->getnombre().$id_menu.'</a><ul>';		       								
						$menu_jquery.=Funciones::getMenuUsuarioOpcionesHijosJQuery2($opcion,$opcionesHijos,$opcionesUsuario,$tree,$webroot,$webrootImagenes);
						$menu_jquery.='</ul></li>';
						
					} else {
						$pathImagen=$webrootImagenes.'/img/menu/dhtmlgoodies_sheet.gif';
						//$url=$webroot.'index.php/'.$opcion->getnombreClase().'/index/onload/none/none';
						$url='GlobalController.php?view='.$opcion->getnombre_clase().'&modulo='.Funciones::getModuloFinal($opcion->getmodulo()).'&sub_modulo='.$opcion->getsub_modulo().'&strTypeOnLoad'.$opcion->getnombre_clase().'='.Constantes::$STR_ONLOAD.'&strTipoPaginaAuxiliar'.$opcion->getnombre_clase().'=none&strTipoUsuarioAuxiliar'.$opcion->getnombre_clase().'=none';
						$url.=Funciones::getUrlParametrosExtra($opcion);
											
						//$tree->addToArray($opcion->getId(),$opcion->getnombre(),0,$url,'',$pathImagen);
						
						if(Constantes::$IS_DEVELOPING) $id_menu='->'.$opcion->getId(); else $id_menu='';
						
						$menu_jquery.=Funciones::getMenuOpcionUsuarioJQuery2($opcion->getId(),$opcion->getnombre().$id_menu,0,$url,'',$pathImagen);
					}										        			
				}	
			} else {
				
			$grupoOpcionesUsuario=unserialize($_SESSION['grupoOpcionesUsuario']);
				$opcionesHijos=array();
				$opcion=null;
				
				foreach ($grupoOpcionesUsuario as $grupoOpcion) {
					$opcionesHijos=Funciones::getMenuOpcionesHijosFromGrupoOpcion($opcionesUsuario,$grupoOpcion);								
				
					if(count($opcionesHijos)>0) {
						$pathImagen=$webrootImagenes.'/img/menu/dhtmlgoodies_folder.gif';
						$url='';
						
						//$tree->addToArray($opcion->getId(),$opcion->getnombre(),0,$url,'',$pathImagen);
	
						$id_text='';
						
						if(Constantes::$IS_DEVELOPING) {
							$id_text='->'.$grupoOpcion->getId();
						
						} else {
							$id_text='';
						}
						
						$menu_jquery.='<li><a href="#">'.$grupoOpcion->getnombre_principal().$id_text.'</a><ul>';		       								
						$menu_jquery.=Funciones::getMenuUsuarioOpcionesHijosJQuery2(null,$opcionesHijos,$opcionesUsuario,$tree,$webroot,$webrootImagenes);
						$menu_jquery.='</ul></li>';
						
					} else {
						$pathImagen=$webrootImagenes.'/img/menu/dhtmlgoodies_sheet.gif';
						//$url=$webroot.'index.php/'.$opcion->getnombreClase().'/index/onload/none/none';
						//$url='GlobalController.php?view='.$ocion->getnombre_clase().'&modulo='.$opcion->getmodulo_nombre().'&sub_modulo='.$opcion->getsub_modulo().'&strTypeOnLoad'.$opcion->getnombre_clase().'=onload&strTipoPaginaAuxiliar'.$opcion->getnombre_clase().'=none&strTipoUsuarioAuxiliar'.$opcion->getnombre_clase().'=none';

						$url='#';//GlobalController.php?view=none';
						
						//$tree->addToArray($opcion->getId(),$opcion->getnombre(),0,$url,'',$pathImagen);
						
						$menu_jquery.=Funciones::getMenuOpcionUsuarioJQuery2($grupoOpcion->getId(),$grupoOpcion->getnombre_principal(),0,$url,'',$pathImagen);
					}		
				}
			}															
		}

		$menu_jquery.='</ul>';
		
		return $menu_jquery;
	}
	
	public static function getUrlParametrosExtra(?opcion $opcion=null):string {
		$urlParametrosExtra='';
		
		if($opcion->getes_guardar_relaciones()) {
		    $urlParametrosExtra='&ES_RELACIONES=true&ES_RELACIONADO=false';//&ES_RELACIONADO=false
		}
		
		return $urlParametrosExtra;
	}
	
	public static function getMenuOpcionesHijosFromGrupoOpcion(array $opcionesUsuario,grupo_opcion $grupoOpcion):array {
		$opcionesHijos=array();
		
		foreach ($opcionesUsuario as $opcion) {
			if($opcion->getid_grupo_opcion()==$grupoOpcion->getId() 
				&& ($opcion->getid_opcion()==null || $opcion->getid_opcion()==0 || $opcion->getid_opcion()=='')) {
					
				$opcionesHijos[]=$opcion;
			}
		}
		
		return $opcionesHijos;
	}	
	
	public static function getMenuOpcionUsuarioJQuery2(int $id,string $nombre,?int $id_padre,string $url,string $descripcion,string $path_imagen):string {
		$menu_opcion='';
		$data_extra='';
		$item_text='->';
		
		if(Constantes::$BIT_CON_ARBOL_MENU_JQUERY) {
			$data_extra=' data-jstree={"icon":"webroot/img/sheet.gif"} ';
			$item_text='';
			
			if(Constantes::$IS_DEVELOPING) {
				$item_text='->'.$id;
				
			} else {
				$item_text='';
			}
		}
		//$menu_opcion='<li id="'.$id.'"><a href="'.$url.'"><span class="ui-icon ui-icon-disk"></span>'.$nombre.'</a></li>';
		
		$menu_opcion='<li '.$data_extra.' id="'.$id.'"><a href="'.$url.'">'.$nombre.$item_text.'</a></li>';
		
		return $menu_opcion;
	}
	
	public static function getMenuUsuarioOpcionesHijosJQuery2(?opcion $opcionPadre,array $opcionesHijosUsuario,array $opcionesUsuario,$tree,string $webroot,string $webrootImagenes):string {
		
	    /*
	    $menuItems=array();
		$menuItemHijo=null;
		$menuItem=null;		
		$idPadre=0;
		*/
		
		$url='';
		$pathImagen='';
		$menu_opcion_jquery='';
		$id_menu='';
		
		
		foreach ($opcionesHijosUsuario as $opcionHijo) {
		       //	$menu->add(array('Opciones_Usuario',$opcionPadre->getnombre()), array( $opcionHijo->getnombre(), array('controller'=> $opcionHijo->getnombreClase(),'action' => 'index','onload')),array('li'=>array('style'=>'background:white','onclick'=>'if(this.getElementsByTagName("span").length<1){funcionGeneral.procesarInicioProceso();}')));
		       	//,array('active' =>array('tag' => 'span','attributes' => array('style' => 'color:red;','id'=>'current')))
		       	
		       	$opcionesHijos=Funciones::getMenuOpcionesHijos($opcionesUsuario,$opcionHijo);
				
		       	if(count($opcionesHijos)>0) {
		       		$pathImagen=$webrootImagenes.'/img/menu/dhtmlgoodies_folder.gif';
					$url='';
					//$tree->addToArray($opcionHijo->getId(),$opcionHijo->getnombre(),$opcionHijo->getid_opcion(),$url,'',$pathImagen);
					
					if(Constantes::$IS_DEVELOPING) $id_menu='->'.$opcionHijo->getId(); else $id_menu='';
					
					$menu_opcion_jquery.='<li><a href="#">'.$opcionHijo->getnombre().$id_menu.'</a><ul>';
					$menu_opcion_jquery.=Funciones::getMenuUsuarioOpcionesHijosJQuery2($opcionHijo,$opcionesHijos,$opcionesUsuario,$tree,$webroot,$webrootImagenes);		       				       	  		
		       		$menu_opcion_jquery.='</ul></li>';
		       		
		       	} else {
		       		$pathImagen=$webrootImagenes.'/img/menu/dhtmlgoodies_sheet.gif';
					//$url=$webroot.'index.php/'.$opcionHijo->getnombreClase().'/index/onload/none/none';
					$url='GlobalController.php?view='.$opcionHijo->getnombre_clase().'&id_opcion='.$opcionHijo->getId().'&modulo='.Funciones::getModuloFinal($opcionHijo->getmodulo0()).'&sub_modulo='.$opcionHijo->getsub_modulo().'&strTypeOnLoad'.$opcionHijo->getnombre_clase().'='.Constantes::$STR_ONLOAD.'&strTipoPaginaAuxiliar'.$opcionHijo->getnombre_clase().'=none&strTipoUsuarioAuxiliar'.$opcionHijo->getnombre_clase().'=none';					
					$url.=Funciones::getUrlParametrosExtra($opcionHijo);
					
					if(Constantes::$IS_DEVELOPING) $id_menu='->'.$opcionHijo->getId(); else $id_menu='';
					
					$menu_opcion_jquery.=Funciones::getMenuOpcionUsuarioJQuery2($opcionHijo->getId(),$opcionHijo->getnombre().$id_menu,$opcionHijo->getid_opcion(),$url,'',$pathImagen);
					
					//$tree->addToArray($opcionHijo->getId(),$opcionHijo->getnombre(),$opcionHijo->getid_opcion(),$url,'',$pathImagen);										
		       	}
		}
		
		return $menu_opcion_jquery;
	}
	
    /*MENU_ARBOL_2_JQUERY_FIN*/	
	
	
    /*MENU_ARBOL_1_JQUERY*/
	public static function getMenuUsuarioJQuery(array $opcionesUsuario,$tree,string $webroot) {
		$webrootImagenes=$webroot;	
		$webroot=str_replace('/webroot','',$webroot);
		
		//echo count($opcionesUsuario);
		
		if($opcionesUsuario!=null && count($opcionesUsuario)>0) {		
			$opcionesPrimerNivel=array();
			$opcionesHijos=array();
			
			/*
			$menuItems=array();
			$menuItem=array();
			$menuItemHijo=array();
			*/
			
			$opcionesPrimerNivel=Funciones::getMenuOpcionesPrimerNivel($opcionesUsuario);
			
			//CUANDO UN ELEMENTO ES SELECCIONADO, DINAMICAMENTE SE A�ADE UN SPAN, ESTO SE PREGUNTA PARA RECARGAR ANI PROCESANDO
			
			
			//$idPadre=0;
			$url='';
			$pathImagen='';
			
			foreach ($opcionesPrimerNivel as $opcion) {
				$opcionesHijos=Funciones::getMenuOpcionesHijos($opcionesUsuario,$opcion);								
			
				if(count($opcionesHijos)>0) {
					$pathImagen=$webrootImagenes.'/img/menu/dhtmlgoodies_folder.gif';
					$url='';
					
					$tree->addToArray($opcion->getId(),$opcion->getnombre(),0,$url,'',$pathImagen);
						
					Funciones::getMenuUsuarioOpcionesHijosJQuery($opcion,$opcionesHijos,$opcionesUsuario,$tree,$webroot,$webrootImagenes);
				
				} else {
					$pathImagen=$webrootImagenes.'/img/menu/dhtmlgoodies_sheet.gif';
					//$url=$webroot.'index.php/'.$opcion->getnombreClase().'/index/onload/none/none';
					$url='GlobalController.php?view='.$opcion->getnombreClase().'&modulo='.Funciones::getModuloFinal($opcion->getmodulo()).'&sub_modulo='.$opcion->getsub_modulo().'&strTypeOnLoad'.$opcion->getnombreClase().'='.Constantes::$STR_ONLOAD.'&strTipoPaginaAuxiliar'.$opcion->getnombreClase().'=none&strTipoUsuarioAuxiliar'.$opcion->getnombreClase().'=none';
											
					$tree->addToArray($opcion->getId(),$opcion->getnombre(),0,$url,'',$pathImagen);
				}
										        			
			}										
					
		}		
	}
	
    public static function getMenuUsuarioOpcionesHijosJQuery(?opcion $opcionPadre,?array $opcionesHijosUsuario,?array $opcionesUsuario,$tree,string $webroot,string $webrootImagenes) {
		
        /*
        $menuItems=array();
		$menuItemHijo=null;
		$menuItem=null;		
		$idPadre=0;
		*/
		
		$url='';
		$pathImagen='';
			
		foreach ($opcionesHijosUsuario as $opcionHijo) {
		       //	$menu->add(array('Opciones_Usuario',$opcionPadre->getnombre()), array( $opcionHijo->getnombre(), array('controller'=> $opcionHijo->getnombreClase(),'action' => 'index','onload')),array('li'=>array('style'=>'background:white','onclick'=>'if(this.getElementsByTagName("span").length<1){funcionGeneral.procesarInicioProceso();}')));
		       	//,array('active' =>array('tag' => 'span','attributes' => array('style' => 'color:red;','id'=>'current')))
		       	
		       	$opcionesHijos=Funciones::getMenuOpcionesHijos($opcionesUsuario,$opcionHijo);
				
		       	if(count($opcionesHijos)>0) {
		       		$pathImagen=$webrootImagenes.'/img/menu/dhtmlgoodies_folder.gif';
					$url='';
					$tree->addToArray($opcionHijo->getId(),$opcionHijo->getnombre(),$opcionHijo->getid_opcion(),$url,'',$pathImagen);
						
		       		Funciones::getMenuUsuarioOpcionesHijosJQuery($opcionHijo,$opcionesHijos,$opcionesUsuario,$tree,$webroot,$webrootImagenes);		       				       	  		
		       	
		       	} else {
		       		$pathImagen=$webrootImagenes.'/img/menu/dhtmlgoodies_sheet.gif';
					//$url=$webroot.'index.php/'.$opcionHijo->getnombreClase().'/index/onload/none/none';
					$url='GlobalController.php?view='.$opcionHijo->getnombre_clase().'&modulo='.Funciones::getModuloFinal($opcionHijo->getmodulo()).'&strTypeOnLoad'.$opcionHijo->getnombre_clase().'='.Constantes::$STR_ONLOAD.'&strTipoPaginaAuxiliar'.$opcionHijo->getnombre_clase().'=none&strTipoUsuarioAuxiliar'.$opcionHijo->getnombre_clase().'=none';					
					
					$tree->addToArray($opcionHijo->getId(),$opcionHijo->getnombre(),$opcionHijo->getid_opcion(),$url,'',$pathImagen);					
		       	}
		}		
	}
    /*MENU_ARBOL_1_JQUERY_FIN*/


    /*MENU_ARBOL_0*/
    public static function getMenuUsuario1(?array $opcionesUsuario,$cssMenu) {
		
        if($opcionesUsuario!=null && count($opcionesUsuario)>0) {
            
			$opcionesPrimerNivel=array();
			$opcionesHijos=array();
			//$menuItems=array();
			$menuItem=array();
			$menuItemHijo=array();
			$opcionesPrimerNivel=Funciones::getMenuOpcionesPrimerNivel($opcionesUsuario);
			
			//CUANDO UN ELEMENTO ES SELECCIONADO, DINAMICAMENTE SE A�ADE UN SPAN, ESTO SE PREGUNTA PARA RECARGAR ANI PROCESANDO
			
			foreach ($opcionesPrimerNivel as $opcion) {
				//$menu->add('Opciones_Usuario',array($opcion->getnombre(),array('controller'=> $opcion->getnombreClase(),'action'=>'index','onload')),array('li'=>array('style'=>'background:white','onclick'=>'if(this.getElementsByTagName("span").length<1){funcionGeneral.procesarInicioProceso();}')));
				//,array('active' =>array('tag' => 'span','attributes' => array('style' => 'color:red;','id'=>'current')))
				$opcionesHijos=Funciones::getMenuOpcionesHijos($opcionesUsuario,$opcion);
				
				if(count($opcionesHijos)>0) {
					$menuItemHijo=Funciones::getMenuUsuarioOpcionesHijos($opcion,$opcionesHijos,$opcionesUsuario,null,'','');
					
					//$menuItem=array($opcion->getnombre() => $menuItemHijo);
					$menuItem[$opcion->getnombre()]=$menuItemHijo;
					
				} else {
					//$menuItem=array($opcion->getnombre() => $opcion->getnombreClase());
					$menuItem[$opcion->getnombre()]=$opcion->getnombreClase();
				}
		        
				//$menuItems[]=$menuItem;				
			}
								
			//echo $menu->generate('Opciones_Usuario');
			$menuItemst=array();
			$menuItemt=array();//array('a'=>'b');
			$menuItemt['B']='G';
			$menuItemt['J']='K';
			
			$menuItemst[]=$menuItemt;
			
			count($menuItemst);
			
			echo $cssMenu->menu($menuItem,'down');
			//,'id'=>'current' 
		}
		
		//return $menu;
	}
	
	public static function getMenuUsuarioOpcionesHijos1(?opcion $opcionPadre,array $opcionesHijosUsuario,array $opcionesUsuario):?array {
		//$menuItems=array();
		$menuItemHijo=null;
		$menuItem=null;
		
		foreach ($opcionesHijosUsuario as $opcionHijo) {
		       //	$menu->add(array('Opciones_Usuario',$opcionPadre->getnombre()), array( $opcionHijo->getnombre(), array('controller'=> $opcionHijo->getnombreClase(),'action' => 'index','onload')),array('li'=>array('style'=>'background:white','onclick'=>'if(this.getElementsByTagName("span").length<1){funcionGeneral.procesarInicioProceso();}')));
		       	//,array('active' =>array('tag' => 'span','attributes' => array('style' => 'color:red;','id'=>'current')))
		       	
		       	$opcionesHijos=Funciones::getMenuOpcionesHijos($opcionesUsuario,$opcionHijo);
				
		       	if(count($opcionesHijos)>0) {
		       		$menuItemHijo=Funciones::getMenuUsuarioOpcionesHijos($opcionHijo,$opcionesHijos,$opcionesUsuario,null,'','');
		       		
		       		//$menuItem=array($opcionHijo->getnombre() => $menuItemHijo);
		       		
		       		$menuItem[$opcionHijo->getnombre()]=$menuItemHijo;
		       		
		       	} else {
		       		//$menuItem=array($opcionHijo->getnombre() => $opcionHijo->getnombreClase());
		       		$menuItem[$opcionHijo->getnombre()]=$opcionHijo->getnombreClase();
					
		       	}
		       	
		       	//$menuItems[]=$menuItem;
		}
		
		//return $menuItems;
		return $menuItem;
	}
	
	public static function getMenuUsuario0(?array $opcionesUsuario,$menu) {
		if($opcionesUsuario!=null && count($opcionesUsuario)>0) {		
			$opcionesPrimerNivel=array();
			$opcionesHijos=array();
			
			$opcionesPrimerNivel=Funciones::getMenuOpcionesPrimerNivel($opcionesUsuario);
			
			//CUANDO UN ELEMENTO ES SELECCIONADO, DINAMICAMENTE SE A�ADE UN SPAN, ESTO SE PREGUNTA PARA RECARGAR ANI PROCESANDO
			
			foreach ($opcionesPrimerNivel as $opcion) {
				$menu->add('Opciones_Usuario',array($opcion->getnombre(),array('controller'=> $opcion->getnombreClase(),'action'=>'index','onload')),array('li'=>array('style'=>'background:white','onclick'=>'if(this.getElementsByTagName("span").length<1){funcionGeneral.procesarInicioProceso();}')));
				//,array('active' =>array('tag' => 'span','attributes' => array('style' => 'color:red;','id'=>'current')))
				$opcionesHijos=Funciones::getMenuOpcionesHijos($opcionesUsuario,$opcion);
				
				Funciones::getMenuUsuarioOpcionesHijos($opcion,$opcionesHijos,$opcionesUsuario,$menu,'','');
		        
			}
								
			//echo $menu->generate('Opciones_Usuario');
			echo $menu->generate('Opciones_Usuario', array('active' => array('tag' => 'span','attributes' => array('style' => 'color:red;'))));
			//,'id'=>'current' 
		}
		
		//return $menu;
	}
	
	public static function getMenuUsuarioOpcionesHijos0(?opcion $opcionPadre,array $opcionesHijosUsuario,$menu,?array $opcionesUsuario) {
		foreach ($opcionesHijosUsuario as $opcionHijo) {
		       	$menu->add(array('Opciones_Usuario',$opcionPadre->getnombre()), array( $opcionHijo->getnombre(), array('controller'=> $opcionHijo->getnombreClase(),'action' => 'index','onload')),array('li'=>array('style'=>'background:white','onclick'=>'if(this.getElementsByTagName("span").length<1){funcionGeneral.procesarInicioProceso();}')));
		       	//,array('active' =>array('tag' => 'span','attributes' => array('style' => 'color:red;','id'=>'current')))
		       	
		       	$opcionesHijos=Funciones::getMenuOpcionesHijos($opcionesUsuario,$opcionHijo);
				
		       	Funciones::getMenuUsuarioOpcionesHijos($opcionHijo,$opcionesHijos,$opcionesUsuario,$menu,'','');
		}
	}
	
	public static function getStrMenuController(string $strNombrePaginaMenu):string {
		$strNameReturn='';
		$strMenuController='';
		
		$strNombrePaginaMenu=str_replace('Mantenimiento','',$strNombrePaginaMenu);
		$strNombrePaginaMenu=str_replace('.jsf','',$strNombrePaginaMenu);
		$strNombrePaginaMenu=str_replace('Final','',$strNombrePaginaMenu);
		
		$strMenuController=$strNombrePaginaMenu;
	
		$count=1;
		
		for ($i = 0; $i < strlen($strMenuController); $i++) {
    		//echo $strMenuController[$i].', ';
    		if(Funciones::isUpper($strMenuController[$i])) {
    			if($count!=1) {
    				$strNameReturn.="_";
    			}
    		}
    		
    		$strNameReturn.=strtolower($strMenuController[$i]);
    		
    		$count++;
		}
		/*
		foreach(char c in strName.ToCharArray()) {
			
			if(Char.IsUpper(c)) {
				if(!i.Equals(1)) {
					strNameReturn+="_";
				}
			}
			
			strNameReturn+=c.ToString().ToLower();
			
			$i++;
		}
		*/
		
		$strNameReturn.="s";
		
		return $strNameReturn;
	}
	
//MENU_ARBOL_0_FIN
//MENU_FIN
	
	
	
    public static function crearCarpeta(string $strPathCarpeta = ''){	
        
	    if($strPathCarpeta!='' && is_dir($strPathCarpeta)==false) {
	        mkdir($strPathCarpeta,0777,true);//$blnReturn=
	    }
	} 
	
	public static function borrarArchivo(string $strPathFile = ''){	    
	    if($strPathFile!='' && file_exists($strPathFile)==true) {
		    unlink($strPathFile);
	    }
	} 
	 
	public static function moverUploadedArchivo(string $strPathFolder='',string $strPathUploadedFile = '',string $strPathFile = ''){	    
	    Funciones::crearCarpeta($strPathFolder);
		
		if($strPathUploadedFile != '' && $strPathFile!='') {
	    	if(file_exists($strPathFile)==true) {
	    		Funciones::borrarArchivo($strPathFile);
	    	}
	    	
	    	move_uploaded_file($strPathUploadedFile,$strPathFile);//$blnReturn=
	    }
	} 
	
	public static function getArchivoParametro(string $strPathFile= '',string $strType=''):string {
	    
	    $strReturnParametro='';
	    $arrPath=explode('/',$strPathFile);
	    $countPath=count($arrPath);
	    $strFileName=$arrPath[$countPath-1];
	    
	    $arrFileName=explode('-.-',str_replace('.','-.-',$strFileName));
	    $countFileName=count($arrFileName);
	    $strFileNameOnly=$arrFileName[0];
	    $strFileExtension='';
	    
	    if($countFileName>1) {
	    	$strFileExtension=$arrFileName[$countFileName-1];
	    }
	    
	    //&& file_exists($strPathFile)==true
	    
		if($strPathFile!='') {
		    if($strType=='id') {
		    	$strReturnParametro=$strFileName;
		    } else if($strType=='name') {
		    	$strReturnParametro=$strFileNameOnly;
		    } else if($strType=='extension') {
		    	$strReturnParametro=$strFileExtension;
		    } else if($strType=='path') {
		    	$strPathFile=str_replace('\\','/',$strPathFile);
		    	$strReturnParametro=str_replace($strFileName,'',$strPathFile);
		    }
	    }
	    
	    return $strReturnParametro;
	}
	
	public static function isUpper(string $str):bool {
    	$chr = mb_substr ($str, 0, 1, "UTF-8");
    	
    	return mb_strtolower($chr, "UTF-8") != $chr;
	}
	

	public static function getTiposReportes():array {
		$tiposReportes=array();
		
		$tiposReportes['HTML']='HTML';
		$tiposReportes['HTML2']='HTML2';
		
		if(!Constantes::$IS_DEMO) {
			$tiposReportes['EXCEL']='EXCEL';
			$tiposReportes['EXCEL2007']='EXCEL2007';
			$tiposReportes['CSV']='CSV';
			$tiposReportes['XML']='XML';
		}
		
		$tiposReportes['PDF2']='PDF2';		
		$tiposReportes['PDF']='PDF';
		$tiposReportes['JSON']='JSON';
		
		//$tiposReportes['REPORTICO']='REPORTICO';
		
		//$tiposReportes['HTML_FORM']='HTML FORM';
				
		return $tiposReportes;
	}
	
	public static function getTiposAcciones($tipo):array {
		$tiposReportes=array();

		$tiposReportes[Constantes::$STR_ACCIONES]=Constantes::$STR_ACCIONES;
		$tiposReportes['GENERAR_REPORTE']='GENERAR REPORTE';
		$tiposReportes['SELECCIONAR']='SELECCIONAR';
		$tiposReportes['QUITAR']='QUITAR';
		//$tiposReportes['GENERAR_REPORTE_FORM']='GENERAR REPORTE FORM';
		
		
		return $tiposReportes;
	}
	
	public static function getListTiposReportes(bool $tieneReporteGroup=false,bool $tieneRelaciones=false):array {
		$arrayTiposReportes=array();
			
		$arrayTiposReportes["NORMAL"]="NORMAL";
		$arrayTiposReportes["FORMULARIO"]="FORMULARIO";
		//$arrayTiposReportes["DINAMICO"]="DINAMICO";
		
		if($tieneRelaciones) {
			$arrayTiposReportes["RELACIONES"]="RELACIONES";
		}
		
		if($tieneReporteGroup) {
			$arrayTiposReportes["GRUPO_GENERICO"]="GRUPO";
			$arrayTiposReportes["TOTALES_GRUPO_GENERICO"]="TOTAL GRUPO";								
		}
		
		return $arrayTiposReportes;
	}
	
	public static function getTiposPaginacion(string $tipo):array {
		$tiposReportes=array();

		$tiposReportes['5']='5';
		$tiposReportes['10']='10';
		$tiposReportes['25']='25';
		$tiposReportes['50']='50';
		$tiposReportes['100']='100';
		$tiposReportes['1000']='1000';
		$tiposReportes['TODOS']='TODOS';
		
		return $tiposReportes;
	}
	
	
	public static function getAutoLoad(string $path_class_name) {
	    include $path_class_name . '.php';
	}
	
	public static function getComboBoxEditar(string $descripcion,$value,string $nombre):string {
	    $strComboBox='';
		
	    $strComboBox=Funciones::getComboBoxInterno($descripcion,$value,$nombre,true);
	    
	    return $strComboBox;
	}
	
	public static function getComboBoxInterno(?string $descripcion,$value,?string $nombre,?bool $editar) : string {
		 $strComboBox='';
		 $strCheckBox='';
		 $strIdName=' id="'.$nombre.'" name="'.$nombre.'" ';
		 $strIdNameCheckBox=' id="chb_'.$nombre.'" name="chb_'.$nombre.'"';//class="class_'.$nombre.'"
		 //$strValue='false';
		 
		 $strStyle='';
		 
		 if($value==null || $value<0) {
		 	//$strStyle=' style="width:200%"';
		 }
		 
		 if($editar) {
		 	$strCheckBox='<td><input'.$strIdNameCheckBox.' type="checkbox" value="'.$nombre.'"></input></td>';
		 	
		 	$strComboBox.='<table><tr>';
		 	$strComboBox.=$strCheckBox;
		 	$strComboBox.='<td><select '.$strIdName.$strStyle.'>';
			$strComboBox.='<option value="'.$value.'">'.$descripcion.'</option>';		
			$strComboBox.='</select></td>';
			$strComboBox.='</tr></table>';
		 }
		 		 
		 
			
		 return  $strComboBox;
	}
	
	public static function getCheckBox($value,string $nombre,bool $paraReporte=false):string {
	    $strCheckBox='';
		
	    $strCheckBox=Funciones::getCheckBoxInterno($value, false,$nombre,$paraReporte);
	    
	    return $strCheckBox;
	}
	
	public static function getCheckBoxEditar($value,string $nombre,bool $paraReporte=false):string {
	    $strCheckBox='';
		
	    $strCheckBox=Funciones::getCheckBoxInterno($value, true,$nombre,$paraReporte);
	    
	    return $strCheckBox;
	}
	
	public static function getCheckBoxInterno($value,?bool $editar,?string $nombre,?bool $paraReporte=false) : string {
	    $strCheckBox='';
		$strDisabled='disabled="disabled"';
		$strIdName='';
		$strValue='false';
		
		$strIdName=' id="'.$nombre.'" name="'.$nombre.'" ';
		
		if($editar) {
			$strDisabled='';			
		}
		
		if($value==true || $value=='1' || $value=='on') {
			$strValue='true';
		}
		
		if(!$paraReporte) {
		    if($value==1) {
		    	$strCheckBox='<input'.$strIdName.' type="checkbox" value="'.$strValue.'" '.$strDisabled.' checked="checked">';
		    } else {
		    	$strCheckBox='<input'.$strIdName.' type="checkbox" value="'.$strValue.'" '.$strDisabled.'>';
		    }
		} else {
			if($value==1) {
		    	$strCheckBox=Constantes::$S_MENSAJE_ACTIVO;
		    } else {
		    	$strCheckBox=Constantes::$S_MENSAJE_NOACTIVO;
		    }
		}
	    
	    return $strCheckBox;
	}
	
	public static function getClassRowTableHtml(?int $i) : string {
	    $class='';
	    
	    if ($i++ % 2 == 0) {
	        $class = 'filazebra';
	    } else {
	        $class = 'filazebraanti';
	    }
	    
	    return $class;
	}
	
	public static function getOnMouseOverHtml(?string $STR_TIPO_TABLA,?int $i) : string {
	    $onmouse='';
	    $class='';
	    
	    $class=Funciones::getClassRowTableHtml($i);
	    
	    if($STR_TIPO_TABLA=='normal') {
	        $onmouse = ' onmouseover="funcionGeneral.activarFilaTabla(this);" onmouseout="funcionGeneral.desactivarFilaTabla(this,\''.$class.'\');" ';
	    }
	    
	    return $onmouse;
	}
	
	public static function getOnMouseOverHtmlReporte(?bool $paraReporte,?string $STR_TIPO_TABLA,?int $i) : string {
	    $onmouse='';
	    $class='';
	    
	    $class=Funciones::getClassRowTableHtml($i);
	    
	    if(!$paraReporte && $STR_TIPO_TABLA=='normal') {
	        $onmouse = ' onmouseover="funcionGeneral.activarFilaTabla(this);" onmouseout="funcionGeneral.desactivarFilaTabla(this,\''.$class.'\');" ';
	    }
	    
	    return $onmouse;
	}
	
	public static function getBitDescription($valor):string {
		$descripcion='No';
		
		if($valor==true || $valor==1) {
			$descripcion='Si';
		}
		
		return $descripcion;
	}
	
	public static function resetearActivoClasses(array $classes) {
	    foreach($classes as $classe) {
	    	$classe->blnActivo=true;
	    }
	}
	
	public static function getStringMySqlCurrentDateTime():string {
		$date = null;
        
		$strDateTime="";
		$dateFormat = null;
	        
		/*$strDateTime=$dateFormat->format($date);*/
	     
		return $strDateTime;
	}
	
	public static function getStringMySqlCurrentDate():string {
		$date = null;
        
		$strDateTime="";
		$dateFormat =null;
	        
		/*$strDateTime=$dateFormat->format($date);*/
	     
		return $strDateTime;
	}
	
	public static function getStringMysqlDate(string $date):string {
		//$date = null;
	
		/*
	    $strDateTime="";
		$dateFormat =null;
		*/
		
		//$strDateTime=$dateFormat->format($date);
	
		return $date;//$strDateTime;
	}
	
	public static function getStringAuditoriaAccion(string $auditoriaAccion):string {
		$strAccion="";
		  
		if($auditoriaAccion==AuditoriaAcciones::$ACTUALIZAR)	{
			$strAccion="Actualizar";
		} else if($auditoriaAccion==AuditoriaAcciones::$DEEPSAVE) {
			$strAccion="DeepSave";
		} else if($auditoriaAccion==AuditoriaAcciones::$ELIMINARLOGICAMENTE)	{
			$strAccion="EliminarLogicamente";
		} else if($auditoriaAccion==AuditoriaAcciones::$ELIMINARFISICAMENTE)	{
			$strAccion="EliminarFisicamente";
		} else if($auditoriaAccion==AuditoriaAcciones::$NUEVO) {
			$strAccion="Nuevo";
		} else if($auditoriaAccion==AuditoriaAcciones::$OTRO) {
			$strAccion="Otro";
		}
		
		return $strAccion;
	}
	
	public static function validarXml(string $strXml,string $strTableName): string {
	     $strXmlValidado = "";
	     
	     $strXml = str_replace('&',' ',$strXml);
	     
	     $strXmlValidado=$strXml;
	     
		return $strXmlValidado;
	}
	
	public static function logShowExceptionMessages($ex) {
		/*
		try
		{
			
			FileHandler fileHandler= new FileHandler(Constantes.getStrPathLoggin()+"log"+Funciones.GetStringMySqlCurrentDate()+".log",1000000,10,true);
			fileHandler.setFormatter(new LogHtmlFormatter());
			    
			ConsoleHandler consoleHandler= new ConsoleHandler();
			consoleHandler.setFormatter(new SimpleFormatter());
	  		
			Logger.getLogger(Constantes.getStrLogginPackageFile()).addHandler(fileHandler);
			Logger.getLogger(Constantes.getStrLogginPackageConsole()).addHandler(consoleHandler);
			
			
			Logger loggerFile = Logger.getLogger(Constantes.getStrLogginPackageFile()); 
			
			Logger loggerConsole = Logger.getLogger(Constantes.getStrLogginPackageConsole()); 
			
			String strLineErrorConsole="";
			String strLineErrorFile="";
			
			Integer intLineNumber=1;
			
			StackTraceElement elements[] = ex.getStackTrace();
			
			for (int i = 0, n = elements.length; i < n; i++) 
			{
			    if(!elements[i].isNativeMethod())
			    {
			    	strLineErrorConsole=intLineNumber+". File:"+elements[i].getFileName() + ",No Line:" 
			                      + elements[i].getLineNumber() 
			                      + " ,Method:" 
			                      + elements[i].getMethodName() + "(),Path:"+elements[i].toString();
			    	
			    	strLineErrorFile="<td>"+intLineNumber+"</td>"+"<td>"+elements[i].getFileName() +"</td>"+"<td>" 
                    + elements[i].getLineNumber() +"</td>"
                    + "<td>"
                    + elements[i].getMethodName() +"</td>"+ "<td>"+elements[i].toString()+"</td>";
  	
			         System.err.println(strLineErrorConsole);
			        
			    	 loggerConsole.log(Level.SEVERE,strLineErrorConsole);
			    	 
			    	 loggerFile.log(Level.SEVERE,strLineErrorFile);
			    	 
			    	 intLineNumber++;
			    }
			}
		}
		catch(Exception exc)
		{
			throw exc;
		}
		*/
	}
	
	public static function getSchemaMySqlFromOwner(string $STR_SCHEMA):string {
		$STR_SCHEMAFinal=$STR_SCHEMA;
		
		if( $STR_SCHEMA=='CONTABILIDAD'||$STR_SCHEMA=='INVENTARIO'||$STR_SCHEMA=='FACTURACION'||$STR_SCHEMA=='CUENTASCOBRAR'||$STR_SCHEMA=='CUENTASPAGAR'
		  ) {
			$STR_SCHEMAFinal=Constantes::$STR_SCHEMA;//'2014_cartelera';
			
		} else if($STR_SCHEMA=='GENERAL') {
			$STR_SCHEMAFinal=Constantes::$STR_SCHEMA;//'2014_cartelera';//2013_seguridad_general';
			
		} else if($STR_SCHEMA=='SEGURIDAD') {
			$STR_SCHEMAFinal=Constantes::$STR_SCHEMA_SEGURIDAD;//'2014_cartelera';//2013_seguridad_general';
		
		} else {
			$STR_SCHEMAFinal=Constantes::$STR_SCHEMA;
		}
		
		return $STR_SCHEMAFinal;
	}
	
	public static function getHtmlTablaDatosOrderBy(array $arrOrderBy):string {
    
        $con_templating=true;
        
        $path_html_template='';
		$htmlTablaOrderBy='';
        
		
		if($con_templating) {
		    
    		//$path_html_template = FuncionesModulo::GetNamespaceTemplate('saldos_cuenta_corriente', Modulo::$CUENTAS_CORRIENTES);
    		
    		$path_html_template = 'com/bydan/framework/contabilidad/presentation/templating/OrderByTemplate.php';
    		
    		$template = new Template($path_html_template);
    		
    		$template->arrOrderBy = $arrOrderBy;    		
    		
    		$htmlTablaOrderBy = $template->render_html();
    		
		} else {
    		
		    /*
		    
    		$htmlTablaOrderBy='<form id="frmOrderBy" name="frmOrderBy">';
    		$htmlTablaOrderBy.='<table>';
    		$htmlTablaOrderBy.='<tr>';
    		$htmlTablaOrderBy.='<td><span class="busquedatitulocampo">ORDEN</span><input id="to-paraorden_orderby" name="to-paraorden_orderby" type="checkbox"></input></td>';
    		$htmlTablaOrderBy.='<td><span class="busquedatitulocampo">REPORTE</span><input id="to-parareporte_orderby" name="to-parareporte_orderby" type="checkbox"></input></td>';
    		$htmlTablaOrderBy.='</tr>';
    		$htmlTablaOrderBy.='</table>';
    		
    		$htmlTablaOrderBy.='<input type="hidden" id="to-maxima_fila_orderby" name="to-maxima_fila_orderby" value="'.count($arrOrderBy).'"/>';
    		//$htmlTablaOrderBy.='<span class="titulotabla">ORDEN</span>';
    		$htmlTablaOrderBy.='<table cellpadding="0" cellspacing="3">';
    
    		$htmlTablaOrderBy.='<tr class="cabeceratabla">';
    		$htmlTablaOrderBy.='<th><b><pre>ID</pre></th>';
    		$htmlTablaOrderBy.='<th><b><pre>SEL</pre></th>';
    		$htmlTablaOrderBy.='<th><b><pre>NOMBRE</pre></th>';
    		$htmlTablaOrderBy.='<th><b><pre>ES DESC</pre></th>';
    		$htmlTablaOrderBy.='</tr>';
    
    		$sValue_isSelected='false';
    		$sValue_esDesc='false';
    
    		$i = 0;
    
    		if($arrOrderBy!=null && count($arrOrderBy)>0) {
    			foreach ($arrOrderBy as $orderBy) {
    				$class = null;
    				$sValue_isSelected='false';
    				$sValue_esDesc='false';
    
    				if ($i++ % 2 == 0) {
    					$class = 'filazebra';
    				} else {
    					$class = 'filazebraanti';
    				}
    
    				if($orderBy->isSelected) {
    					$sValue_isSelected='false';
    				}
    
    				if($orderBy->esDesc) {
    					$sValue_esDesc='false';
    				}
    
    
    				$htmlTablaOrderBy.='<tr class="'.$class.'" onmouseover="funcionGeneral.activarFilaTabla(this);" onmouseout="funcionGeneral.desactivarFilaTabla(this,\''.$class.'\');">';
    				$htmlTablaOrderBy.='<td>'.$i.'</td>';
    				$htmlTablaOrderBy.='<td><input id="to-issel_'.$i.'" name="to-issel_'.$i.'" type="checkbox">'.$i.'</input></td>';
    				$htmlTablaOrderBy.='<td> '.$orderBy->nombre .'</td>';
    				$htmlTablaOrderBy.='<td><input id="to-esdesc_'.$i.'" name="to-esdesc_'.$i.'" type="checkbox"></input></td>';//'.$i.'
    				$htmlTablaOrderBy.='</tr>';
    			}
    		}
    
    		
    		//$htmlTablaOrderBy.='<tr>';
    		//$htmlTablaOrderBy.='<td colspan="4" align="center">';
    		//$htmlTablaOrderBy.='<input type="button" id="btnOrderByAceptar" name="btnOrderByAceptar" value="ACEPTAR"/>';
    		//$htmlTablaOrderBy.='</td>';
    		
    
    		
    		//$htmlTablaOrderBy.='<td colspan="2">';
    		//$htmlTablaOrderBy.='<input type="button" id="btnOrderByCancelar" name="btnOrderByCancelar" value="CANCELAR"/>';
    		//$htmlTablaOrderBy.='</td>';
    		
    
    		//$htmlTablaOrderBy.='</tr>';
    
    		$htmlTablaOrderBy.='</table>';		
    		$htmlTablaOrderBy.='</form>';
    		
            */
		}
		
		return $htmlTablaOrderBy;
	}

	public static function getCargarOrderByQuery(array $arrOrderBy,mixed $data,string $strTipo='ORDEN'):string {
		$orderByQuery='';

		$arrOrderBySeleccionados=array();
		$checkbox_id=0;
		$checkbox_esdesc=0;
		$indice=0;
		$existe=false;
		$es_primero=true;
		$orderBy=new OrderBy();
		$ascDesc='';

		$maxima_fila_orderby=0;
		$paraorden_orderby=false;
		$parareporte_orderby=false;
		
		if(is_array($data)){

			if(array_key_exists('to',$data) && $data['to']!=null) {
				if(array_key_exists('maxima_fila_orderby',$data['to']) && $data['to']['maxima_fila_orderby']!=null) {
					$maxima_fila_orderby=$data['to']['maxima_fila_orderby'];
				}
				
				//PARA ORDEN
				if(array_key_exists('paraorden_orderby',$data['to']) && $data['to']['paraorden_orderby']!=null) {
					$checkbox_paraorden=$data['to']['paraorden_orderby'];
					
					if($checkbox_paraorden!=null && ($checkbox_paraorden=='on' || $checkbox_paraorden==true || $checkbox_paraorden==1)) {
						$paraorden_orderby=true;
					}
				}
				
				//PARA REPORTE
				if(array_key_exists('parareporte_orderby',$data['to']) && $data['to']['parareporte_orderby']!=null) {
					$checkbox_parareporte=$data['to']['parareporte_orderby'];
					
					if($checkbox_parareporte!=null && ($checkbox_parareporte=='on' || $checkbox_parareporte==true || $checkbox_parareporte==1)) {
						$parareporte_orderby=true;
					}
				}
			}
		
		} else {

			if(property_exists($data,'to') && $data->{'to'}!=null) {
				if(property_exists($data->{'to'},'maxima_fila_orderby') && $data->{'to'}->{'maxima_fila_orderby'}!=null) {
					$maxima_fila_orderby=$data->{'to'}->{'maxima_fila_orderby'};
				}
				
				//PARA ORDEN
				if(property_exists($data->{'to'},'paraorden_orderby') && $data->{'to'}->{'paraorden_orderby'}!=null) {
					$checkbox_paraorden=$data->{'to'}->{'paraorden_orderby'};
					
					if($checkbox_paraorden!=null && ($checkbox_paraorden=='on' || $checkbox_paraorden==true || $checkbox_paraorden==1)) {
						$paraorden_orderby=true;
					}
				}
				
				//PARA REPORTE
				if(property_exists($data->{'to'},'parareporte_orderby') && $data->{'to'}->{'parareporte_orderby'}!=null) {
					$checkbox_parareporte=$data->{'to'}->{'parareporte_orderby'};
					
					if($checkbox_parareporte!=null && ($checkbox_parareporte=='on' || $checkbox_parareporte==true || $checkbox_parareporte==1)) {
						$parareporte_orderby=true;
					}
				}
			}
		}

		
		if(($paraorden_orderby || $parareporte_orderby) && $maxima_fila_orderby!=null && $maxima_fila_orderby>0) {

			for($i=1;$i<=$maxima_fila_orderby;$i++) {
				$indice=$i-1;
				$checkbox_esdesc=false;

				$checkbox_id=null;//$data['to']['issel_'.$i];
				
				if(is_array($data)) {
					if(array_key_exists('issel_'.$i,$data['to'])) {
						$checkbox_id=$data['to']['issel_'.$i];
					}
				} else {
					if(property_exists($data->{'to'},'issel_'.$i)) {
						$checkbox_id=$data->{'to'}->{'issel_'.$i};
					}
				}
				
				if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
					$orderBy=$arrOrderBy[$indice];
					
					$arrOrderBy[$indice]->setisSelected(true);
						
					//ES DESC

					if(is_array($data)) {
						if(array_key_exists('to',$data) && $data['to']!=null) {
							if(array_key_exists('esdesc_'.$i,$data['to']) && $data['to']['esdesc_'.$i]!=null) {
								$checkbox_esdesc=$data['to']['esdesc_'.$i];
							}
						}
					} else {
						if(property_exists($data,'to') && $data->{'to'}!=null) {
							if(property_exists($data->{'to'},'esdesc_'.$i) && $data->{'to'}->{'esdesc_'.$i}!=null) {
								$checkbox_esdesc=$data->{'to'}->{'esdesc_'.$i};
							}
						}
					}
						
					if($checkbox_esdesc!=null && ($checkbox_esdesc=='on' || $checkbox_esdesc==true || $checkbox_esdesc==1)) {
						$orderBy->setesDesc(true);
						$arrOrderBy[$indice]->setesDesc(true);
					} else {
						$orderBy->setesDesc(false);
						$arrOrderBy[$indice]->setesDesc(false);
					}

					$arrOrderBySeleccionados[]=$orderBy;
				}
			}
				
			if(count($arrOrderBySeleccionados)>0) {
				$existe=true;
			}
				
			//PARA ORDEN
			if($strTipo=='ORDEN' && $paraorden_orderby) {
				$es_primero=true;
					
				foreach($arrOrderBySeleccionados as $orderBySeleccionadoLocal){
					if(!$es_primero) {
						$orderByQuery.=',';
					}
	
					if($orderBySeleccionadoLocal->getesDesc()) {
						$ascDesc='DESC';
					} else {
						$ascDesc='ASC';
					}
	
	
					$orderByQuery.=$orderBySeleccionadoLocal->getnombreDB().' '.$ascDesc.' ';
	
					if($es_primero) {
						$es_primero=false;
					}
				}
					
				if($existe) {
					$orderByQuery=' ORDER BY '.$orderByQuery;
				}
			}
		}
			
		return $orderByQuery;
	}

	public static function existeCadenaArrayOrderBy(?string $cadenaBuscar='',?array $arrCadenasOrderBy=array(),?bool $parareporte_orderby=false) : bool {
		$existe=false;

		if($parareporte_orderby) {
			if($arrCadenasOrderBy!=null && count($arrCadenasOrderBy)>0) {
				foreach($arrCadenasOrderBy as $orderBy) {
					if($orderBy->getisSelected() && $cadenaBuscar==$orderBy->getnombre()) {
						$existe=true;
						break;
					}
				}
			}
		} else {
			$existe=true;
		}
		
		return $existe;
	}

    public static function getHtmlTablaDatosOrderByRel(array $arrOrderBy):string {
		
		$con_templating=true;
		
		$path_html_template='';
		$htmlTablaOrderBy='';
		
		
		if($con_templating) {
		    
		    //$path_html_template = FuncionesModulo::GetNamespaceTemplate('saldos_cuenta_corriente', Modulo::$CUENTAS_CORRIENTES);
		    
		    $path_html_template = 'com/bydan/framework/contabilidad/presentation/templating/OrderByRelTemplate.php';
		    
		    $template = new Template($path_html_template);
		    
		    $template->arrOrderBy = $arrOrderBy;
		    
		    $htmlTablaOrderBy = $template->render_html();
		    
		} else {
		    
		    /*
    		$htmlTablaOrderBy='<form id="frmOrderByRel" name="frmOrderByRel">';
    		$htmlTablaOrderBy.='<table>';
    		$htmlTablaOrderBy.='<tr>';
    		//$htmlTablaOrderBy.='<td><span class="busquedatitulocampo">ORDEN</span><input id="tor-paraorden_orderbyrel" name="tor-paraorden_orderbyrel" type="checkbox"></input></td>';
    		$htmlTablaOrderBy.='<td><span class="busquedatitulocampo">REPORTE</span><input id="tor-parareporte_orderbyrel" name="tor-parareporte_orderbyrel" type="checkbox"></input></td>';
    		$htmlTablaOrderBy.='</tr>';
    		$htmlTablaOrderBy.='</table>';
    		
    		$htmlTablaOrderBy.='<input type="hidden" id="tor-maxima_fila_orderbyrel" name="tor-maxima_fila_orderbyrel" value="'.count($arrOrderBy).'"/>';
    		$htmlTablaOrderBy.='<table cellpadding="0" cellspacing="3">';
    
    		$htmlTablaOrderBy.='<tr class="cabeceratabla">';
    		$htmlTablaOrderBy.='<th><b><pre>ID</pre></th>';
    		$htmlTablaOrderBy.='<th><b><pre>SEL</pre></th>';
    		$htmlTablaOrderBy.='<th><b><pre>NOMBRE</pre></th>';
    		//$htmlTablaOrderBy.='<th><b><pre>ES DESC</pre></th>';
    		$htmlTablaOrderBy.='</tr>';
    
    		$sValue_isSelected='false';
    		$sValue_esDesc='false';
    
    		$i = 0;
    
    		if($arrOrderBy!=null && count($arrOrderBy)>0) {
    			foreach ($arrOrderBy as $orderBy) {
    				$class = null;
    				$sValue_isSelected='false';
    				$sValue_esDesc='false';
    
    				if ($i++ % 2 == 0) {
    					$class = 'filazebra';
    				} else {
    					$class = 'filazebraanti';
    				}
    
    				if($orderBy->isSelected) {
    					$sValue_isSelected='false';
    				}
    
    				if($orderBy->esDesc) {
    					$sValue_esDesc='false';
    				}
    
    
    				$htmlTablaOrderBy.='<tr class="'.$class.'" onmouseover="funcionGeneral.activarFilaTabla(this);" onmouseout="funcionGeneral.desactivarFilaTabla(this,\''.$class.'\');">';
    				$htmlTablaOrderBy.='<td>'.$i.'</td>';
    				$htmlTablaOrderBy.='<td><input id="tor-issel_'.$i.'" name="tor-issel_'.$i.'" type="checkbox">'.$i.'</input></td>';
    				$htmlTablaOrderBy.='<td> '.$orderBy->nombre .'</td>';
    				//$htmlTablaOrderBy.='<td><input id="tor-esdesc_'.$i.'" name="tor-esdesc_'.$i.'" type="checkbox"></input></td>';//'.$i.'
    				$htmlTablaOrderBy.='</tr>';
    			}
    		}		
    
    		$htmlTablaOrderBy.='</table>';		
    		$htmlTablaOrderBy.='</form>';
    		*/
		}
		
		
		return $htmlTablaOrderBy;
	}
	
	public static function getCargarOrderByQueryRel(array $arrOrderByRel,array $data,string $strTipo='ORDEN'):string {
		$orderByQuery='';

		$arrOrderByRelSeleccionados=array();
		$checkbox_id=0;
		
		//$existe=false;
		
		/*
		$checkbox_esdesc=0;
		$es_primero=true;
		$ascDesc='';
		*/
		
		$indice=0;
		
		$orderBy=new OrderBy();
		

		$maxima_fila_orderbyrel=0;
		$parareporte_orderbyrel=false;
		
		if($data['tor']!=null) {
			if($data['tor']['maxima_fila_orderbyrel']!=null) {
				$maxima_fila_orderbyrel=$data['tor']['maxima_fila_orderbyrel'];
			}
			
			//PARA REPORTE
			if($data['tor']['parareporte_orderbyrel']!=null) {
				$checkbox_parareporte_rel=$data['tor']['parareporte_orderbyrel'];
				
				if($checkbox_parareporte_rel!=null && ($checkbox_parareporte_rel=='on' || $checkbox_parareporte_rel==true || $checkbox_parareporte_rel==1)) {
					$parareporte_orderbyrel=true;
				}
			}
		}
			
		
		if($parareporte_orderbyrel && $maxima_fila_orderbyrel!=null && $maxima_fila_orderbyrel>0) {

			for($i=1;$i<=$maxima_fila_orderbyrel;$i++) {
				$indice=$i-1;
				
				$checkbox_id=$data['tor']['issel_'.$i];

				if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
					$orderBy=$arrOrderByRel[$indice];
					
					$arrOrderByRel[$indice]->setisSelected(true);
											
					$arrOrderByRelSeleccionados[]=$orderBy;
				}


			}
				
			if(count($arrOrderByRelSeleccionados)>0) {
				//$existe=true;
			}		
		}
			
		return $orderByQuery;
	}
	
	public static function getUrlParametrosPaginaArbol(string $nombre_clase='',string $modulo='',string $sub_modulo='',string $tipo='POPUP',string $strTipoPaginaAuxiliar='none',string $strTipoUsuarioAuxiliar='none',bool $paraBusqueda=false,string $strFuncionJavaScriptFinal=''):string {
		$strTypeOnLoad='onload';
		$strEsPopup='false';
		$strEsBusqueda='false';
		$strUrlBusqueda='';
		$strUrlFuncionJs='';
		$strUrlObjetoJs='';
		$arrPartes=array();
	
		if($tipo=='POPUP') {
			$strTypeOnLoad='onloadhijos';
			$strEsPopup='true';
		} else {
			$strTypeOnLoad='onloadhijos';
			//'onload';//Ejecuta y trae todos FKs hijos en combo FuncionesWebArbol::inicializarSession(
			$strEsPopup='false';
		}
	
	
		if($paraBusqueda) {
			$strEsBusqueda='true';
	
			$strUrlBusqueda='&ES_BUSQUEDA=';
			$strUrlFuncionJs='&FUNCION_JS=';
			$strUrlObjetoJs='&OBJETOJS=';
	
			$arrPartes = explode(".", $strFuncionJavaScriptFinal);
	
			$strUrlBusqueda=$strUrlBusqueda.$strEsBusqueda;
			$strUrlFuncionJs=$strUrlFuncionJs.$strFuncionJavaScriptFinal;
			$strUrlObjetoJs=$strUrlObjetoJs.$arrPartes[0].'.'.$arrPartes[1].'.'.$arrPartes[2];
		}
	
	
		$url_inicial=Constantes::$STR_HTTP_INIT.Constantes::$STR_DNS_NAME_SERVER.':'.Constantes::$STR_PORT_SERVER.'/'.Constantes::$STR_CONTEXT_SERVER.'/';
	
		//'.$nombre_clase.'
	
		$url_parametros='GlobalController.php?view=ArbolGeneral&clase='.$nombre_clase.'&modulo='.Funciones::getModuloFinal($modulo).'&sub_modulo='.$sub_modulo.'&action=cargarArbol';
		$url_parametros.='&strTypeOnLoad'.$nombre_clase.'='.$strTypeOnLoad.'&strTipoPaginaAuxiliar'.$nombre_clase.'='.$strTipoPaginaAuxiliar.'&strTipoUsuarioAuxiliar'.$nombre_clase.'='.$strTipoUsuarioAuxiliar;
		$url_parametros.='&ES_POPUP='.$strEsPopup.$strUrlBusqueda.$strUrlFuncionJs.$strUrlObjetoJs;
	
		$url_final=$url_inicial.$url_parametros;
	
		return $url_final;
	}
	
	public static function getUrlParametrosPaginaHijo(string $nombre_clase='',string $modulo='',string $sub_modulo='',string $tipo='POPUP',string $strTipoPaginaAuxiliar='none',string $strTipoUsuarioAuxiliar='none',bool $paraBusqueda=false,string $strFuncionJavaScriptFinal='',string $action='index',?opcion $opcionActual=null):string {
		$strTypeOnLoad='onload';
		$strEsPopup='false';
		$strEsBusqueda='false';
		$strUrlBusqueda='';
		$strUrlFuncionJs='';
			
		if($tipo=='POPUP') {
			$strTypeOnLoad='onloadhijos';
			$strEsPopup='true';
		} else {
			$strTypeOnLoad='onloadhijos';
			//'onload';//Ejecuta y trae todos FKs hijos en combo FuncionesWebArbol::inicializarSession(
			$strEsPopup='false';
		}
		
		
		if($paraBusqueda) {
			$strEsBusqueda='true';
			
			$strUrlBusqueda='&ES_BUSQUEDA=';
			$strUrlFuncionJs='&FUNCION_JS=';
		
			$strUrlBusqueda=$strUrlBusqueda.$strEsBusqueda;
			$strUrlFuncionJs=$strUrlFuncionJs.$strFuncionJavaScriptFinal;			
		}
		
		
		$url_inicial=Constantes::$STR_HTTP_INIT.Constantes::$STR_DNS_NAME_SERVER.':'.Constantes::$STR_PORT_SERVER.'/'.Constantes::$STR_CONTEXT_SERVER.'/';
		
		$url_parametros='GlobalController.php?view='.$nombre_clase.'&modulo='.Funciones::getModuloFinal($modulo).'&sub_modulo='.$sub_modulo.'&action='.$action;
		$url_parametros.='&strTypeOnLoad'.$nombre_clase.'='.$strTypeOnLoad.'&strTipoPaginaAuxiliar'.$nombre_clase.'='.$strTipoPaginaAuxiliar.'&strTipoUsuarioAuxiliar'.$nombre_clase.'='.$strTipoUsuarioAuxiliar;
		$url_parametros.='&ES_POPUP='.$strEsPopup;
		
		
		if($opcionActual!=null) {
    		$url_parametros.='&id_opcion='.$opcionActual->getId();
    		$url_parametros.=Funciones::getUrlParametrosExtra($opcionActual);
		}
		
		$url_parametros.=$strUrlBusqueda.$strUrlFuncionJs;		
		
		$url_final=$url_inicial.$url_parametros;
		
		
		return $url_final;
	}
	
	/*
	public static function getUrlParametrosPaginaHijo($nombre_clase='',$modulo='',$sub_modulo='',$tipo='POPUP',$strTipoPaginaAuxiliar='none',$strTipoUsuarioAuxiliar='none') {
		$strTypeOnLoad='onload';
		$strEsPopup='false';
			
		if($tipo=='POPUP') {
			$strTypeOnLoad='onloadhijos';
			$strEsPopup='true';
		} else {
			$strTypeOnLoad='onload';
			$strEsPopup='false';
		}
		
		$url_inicial=Constantes::$STR_HTTP_INIT.Constantes::$STR_DNS_NAME_SERVER.':'.Constantes::$STR_PORT_SERVER.'/'.Constantes::$STR_CONTEXT_SERVER.'/';
		
		$url_parametros='GlobalController.php?view='.$nombre_clase.'&modulo='.$modulo.'&sub_modulo='.$sub_modulo.'&action=index';
		$url_parametros.='&strTypeOnLoad'.$nombre_clase.'='.$strTypeOnLoad.'&strTipoPaginaAuxiliar'.$nombre_clase.'='.$strTipoPaginaAuxiliar.'&strTipoUsuarioAuxiliar'.$nombre_clase.'='.$strTipoUsuarioAuxiliar;	
		$url_parametros.='&ES_POPUP='.$strEsPopup;
	
		$url_final=$url_inicial.$url_parametros;
		
		return $url_final;
	}
	*/
	
	public static function mostrarMemoriaFormato(int $mem_usage=0):string { 
        //$mem_usage = memory_get_usage(true);         
        $mem_usage_formato='';
        
        if ($mem_usage < 1024) { 
            $mem_usage_formato=$mem_usage." bytes"; 
            
        } else if ($mem_usage < 1048576) { 
            $mem_usage_formato=round($mem_usage/1024,2)." kilobytes"; 
            
        } else { 
            $mem_usage_formato=round($mem_usage/1048576,2)." megabytes"; 
        }  

        return $mem_usage_formato;
    } 
    
    public static function mostrarMemoriaActual():string { 
    	$mem_usage_formato=Funciones::mostrarMemoriaFormato(memory_get_usage()).'->'.Funciones::mostrarMemoriaFormato(memory_get_peak_usage());
    	
    	//$this->strAuxiliarMensajeAlert=Funciones::mostrarMemoriaActual();
    	// En function index--->	public function setUrlPaginaVariables
    	
   		return $mem_usage_formato;
    }
    
    public static function Redondear(float $valor,int $precision):float {
        $resultado=0.0;
        
        $resultado=round($valor,$precision);
        
        return $resultado;
    }
    
    public static function cargarArchivosFrameworkBase(string $paqueteTipo='CONTROLLER') { 		
		
		if($paqueteTipo==PaqueteTipo::$CONTROLLER) {
			
			//include_once('com/bydan/framework/contabilidad/util/Constantes.php');
			//include_once('com/bydan/framework/contabilidad/util/Funciones.php');
			//include_once('com/bydan/framework/contabilidad/util/PaqueteTipo.php');
			
		    include_once('com/bydan/framework/contabilidad/util/Clase.php');
			include_once('com/bydan/framework/contabilidad/util/Connexion.php');
			include_once('com/bydan/framework/contabilidad/util/ParameterDbType.php');
			include_once('com/bydan/framework/contabilidad/util/ParametersType.php');
			include_once('com/bydan/framework/contabilidad/util/ParameterType.php');
			include_once('com/bydan/framework/contabilidad/util/ParameterTypeOperator.php');
			include_once('com/bydan/framework/contabilidad/util/ParameterTypeSign.php');
			include_once('com/bydan/framework/contabilidad/util/DeepLoadType.php');
			include_once('com/bydan/framework/contabilidad/util/EventoGlobalTipo.php');
			include_once('com/bydan/framework/contabilidad/util/EventoSubTipo.php');
			include_once('com/bydan/framework/contabilidad/util/EventoTipo.php');
			include_once('com/bydan/framework/contabilidad/util/FuncionesObject.php');
			include_once('com/bydan/framework/contabilidad/util/FuncionesSql.php');
			include_once('com/bydan/framework/contabilidad/util/ControlTipo.php');
			include_once('com/bydan/framework/contabilidad/util/DataType.php');
			include_once('com/bydan/framework/contabilidad/util/FuncionesSql.php');
			include_once('com/bydan/framework/contabilidad/util/FuncionesModulo.php');
			include_once('com/bydan/framework/contabilidad/util/excel/ExcelHelper.php');
			include_once('com/bydan/framework/contabilidad/util/pdf/FpdfHelper.php');
			include_once('com/bydan/framework/contabilidad/util/DeepLoadType.php');
			include_once('com/bydan/framework/contabilidad/util/Modulo.php');
			include_once('com/bydan/framework/contabilidad/business/entity/GeneralEntity.php');
			include_once('com/bydan/framework/contabilidad/business/entity/GeneralEntitySinIdGenerated.php');			
			include_once('com/bydan/framework/contabilidad/business/entity/GeneralEntityParameterGeneral.php');
			include_once('com/bydan/framework/contabilidad/business/entity/GeneralEntityReturnGeneral.php');
			include_once('com/bydan/framework/contabilidad/business/entity/GeneralEntityLogic.php');
			include_once('com/bydan/framework/contabilidad/business/entity/GeneralEntityConstantesFunciones.php');
			include_once('com/bydan/framework/contabilidad/business/entity/GeneralEntitySessionBean.php');																		  
			include_once('com/bydan/framework/contabilidad/business/entity/GeneralEntityView.php');
			include_once('com/bydan/framework/contabilidad/business/entity/Classe.php');			
			include_once('com/bydan/framework/contabilidad/business/entity/OrderBy.php');
			include_once('com/bydan/framework/contabilidad/business/entity/ParameterDivSecciones.php');
			include_once('com/bydan/framework/contabilidad/business/entity/Reporte.php');
			include_once('com/bydan/framework/contabilidad/business/entity/SelectItem.php');
			include_once('com/bydan/framework/contabilidad/business/entity/MaintenanceType.php');
			include_once('com/bydan/framework/contabilidad/business/entity/ConexionController.php');
			include_once('com/bydan/framework/contabilidad/business/entity/DatoGeneral.php');
			include_once('com/bydan/framework/contabilidad/business/entity/DatoGeneralMinimo.php');
			include_once('com/bydan/framework/contabilidad/business/entity/DatoGeneralMaximo.php');			
			include_once('com/bydan/framework/contabilidad/business/entity/Mensajes.php');
			include_once('com/bydan/framework/contabilidad/business/data/ConstantesSql.php');
			include_once('com/bydan/framework/contabilidad/business/data/DataAccessHelper.php');
			include_once('com/bydan/framework/contabilidad/business/data/GetEntitiesDataAccessHelper.php');
			include_once('com/bydan/framework/contabilidad/business/data/GetEntitiesDataAccessHelperSinIdGenerated.php');
			include_once('com/bydan/framework/contabilidad/business/data/ModelBase.php');
			include_once('com/bydan/framework/contabilidad/business/logic/Pagination.php');
			include_once('com/bydan/framework/contabilidad/business/logic/DatosCliente.php');
			include_once('com/bydan/framework/contabilidad/business/logic/DatosDeep.php');
			include_once('com/bydan/framework/contabilidad/business/logic/QueryWhereSelectParameters.php');
			include_once('com/bydan/framework/contabilidad/business/logic/ParameterSelectionGeneral.php');
			include_once('com/bydan/framework/contabilidad/presentation/web/SessionBase.php');
			include_once('com/bydan/framework/contabilidad/presentation/web/control/ControllerBase.php');
			include_once('com/bydan/framework/contabilidad/presentation/web/PaginationLink.php');
			include_once('com/bydan/framework/contabilidad/presentation/web/HistoryWeb.php');
			include_once('com/bydan/framework/contabilidad/presentation/report/CellReport.php');
			include_once('com/bydan/framework/contabilidad/presentation/templating/Template.php');
			include_once('com/bydan/framework/contabilidad/util/FuncionesWebArbol.php');
			include_once('com/bydan/framework/globales/seguridad/logic/FuncionesSeguridad.php');
			include_once('com/bydan/framework/globales/seguridad/logic/GlobalSeguridad.php');
			
		} else if($paqueteTipo=PaqueteTipo::$WEB) {
						
			include_once('com/bydan/framework/contabilidad/business/entity/GeneralEntity.php');
			include_once('com/bydan/framework/contabilidad/business/entity/GeneralEntitySinIdGenerated.php');
			include_once('com/bydan/framework/contabilidad/business/entity/GeneralEntityView.php');
			include_once('com/bydan/framework/contabilidad/util/Funciones.php');
			include_once('com/bydan/framework/contabilidad/util/PaqueteTipo.php');
			include_once('com/bydan/framework/contabilidad/presentation/web/SessionBase.php');
		}
	}
    
	public static function cargarArchivosPaquetesBase(string $paqueteTipo='CONTROLLER') {
	    
	    if($paqueteTipo==PaqueteTipo::$CONTROLLER || $paqueteTipo==PaqueteTipo::$LOGIC) {
	       
	        //AL CARGAR LA PAGINA WEB. VARIABLES DE SESSION
	        //include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/business/entity/empresa_add.php');
	        include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/empresa/business/entity/empresa.php');
	        
	        //include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/business/entity/sucursal_add.php');
	        include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/sucursal/business/entity/sucursal.php');
	        
	        //include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/business/entity/ejercicio_add.php');
	        include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/ejercicio/business/entity/ejercicio.php');
	        
	        //include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/business/entity/periodo_add.php');
	        include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/ejercicio/business/entity/ejercicio.php');
	    }
	    
	    
	    if($paqueteTipo==PaqueteTipo::$CONTROLLER) {
	        
	        
	        
	    } else if($paqueteTipo==PaqueteTipo::$ENTITIES) {
	        
	       
	        
	    } else if($paqueteTipo==PaqueteTipo::$CONSTANTES_FUNCIONES) {
	        
	        
	        
	    } else if($paqueteTipo==PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS) {
	        
	        	       
	        
	    } else if($paqueteTipo==PaqueteTipo::$ENTITIES.PaqueteTipo::$WEB_SESSION) {
	        
	        
	        
	    } else if($paqueteTipo==PaqueteTipo::$WEB) {
	        
	        //AL CARGAR LA PAGINA WEB. VARIABLES DE SESSION
	        //include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/empresa/business/entity/empresa_add.php');
	        include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/empresa/business/entity/empresa.php');
	        
	        //include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/sucursal/business/entity/sucursal_add.php');
	        include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/sucursal/business/entity/sucursal.php');
	        
	        //include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/ejercicio/business/entity/ejercicio_add.php');
	        include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/ejercicio/business/entity/ejercicio.php');
	        
	        //include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/periodo/business/entity/periodo_add.php');
	        include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/periodo/business/entity/periodo.php');
	    }
	}
	
	public static function cargarArchivosPaquetes(array $arrPaquetesTipos=array()) {
	    
	    if(!Constantes::$BIT_CONCARGA_INICIAL) {
	        
	        foreach($arrPaquetesTipos as $sPaqueteTipo) {
	            
	            if($sPaqueteTipo==PaqueteTipo::$ENTITIES) {
	               
	            } else if($sPaqueteTipo==PaqueteTipo::$DATA_ACCESS) {
	                
	            } else if($sPaqueteTipo==PaqueteTipo::$INTERFACE) {
	                
	            } else if($sPaqueteTipo==PaqueteTipo::$LOGIC) {
	                
	            } else if($sPaqueteTipo==PaqueteTipo::$CONSTANTES_FUNCIONES) {
	                
	            } else if($sPaqueteTipo==PaqueteTipo::$CONTROLLER) {	               
	                
	            } else if($sPaqueteTipo==PaqueteTipo::$REPORTE) {
	               
	            } else if($sPaqueteTipo==PaqueteTipo::$WEB) {
	               
	                
	            } else if($sPaqueteTipo==PaqueteTipo::$WEB_SESSION) {
	               
	            }
	        }
	    }
	}
	
	public static function cargarArchivosPaquetesForeignKeys(string $paqueteTipo='LOGIC') {
	  
	    
	}
	
	/*RELACIONES*/
	public static function cargarArchivosPaquetesRelaciones(string $paqueteTipo='LOGIC') {
	    	   
	    
	}
	
    /*
	public static function cargarArchivosFrameworkBase($paqueteTipo='CONTROLLER') { 		
		
		if($paqueteTipo==PaqueteTipo::$CONTROLLER) {
			
			//include_once('com/bydan/framework/contabilidad/util/Constantes.php');
			//include_once('com/bydan/framework/contabilidad/util/Funciones.php');
			//include_once('com/bydan/framework/contabilidad/util/PaqueteTipo.php');
			
			include_once('com/bydan/framework/contabilidad/util/Connexion.php');
			include_once('com/bydan/framework/contabilidad/util/ParameterDbType.php');
			include_once('com/bydan/framework/contabilidad/util/ParametersType.php');
			include_once('com/bydan/framework/contabilidad/util/ParameterType.php');
			include_once('com/bydan/framework/contabilidad/util/ParameterTypeOperator.php');
			include_once('com/bydan/framework/contabilidad/util/DeepLoadType.php');
			include_once('com/bydan/framework/contabilidad/util/DataType.php');
			include_once('com/bydan/framework/contabilidad/util/FuncionesSql.php');
			include_once('com/bydan/framework/contabilidad/util/excel/ExcelHelper.php');
			include_once('com/bydan/framework/contabilidad/util/pdf/FpdfHelper.php');
			include_once('com/bydan/framework/contabilidad/util/DeepLoadType.php');
			include_once('com/bydan/framework/contabilidad/util/FuncionesWebArbol.php');
			include_once('com/bydan/framework/contabilidad/business/entity/GeneralEntity.php');
			include_once('com/bydan/framework/contabilidad/business/entity/GeneralEntitySinIdGenerated.php');
			include_once('com/bydan/framework/contabilidad/business/entity/Classe.php');
			include_once('com/bydan/framework/contabilidad/business/entity/GeneralEntityParameterGeneral.php');
			include_once('com/bydan/framework/contabilidad/business/entity/GeneralEntityReturnGeneral.php');
			include_once('com/bydan/framework/contabilidad/business/entity/OrderBy.php');
			include_once('com/bydan/framework/contabilidad/business/entity/Reporte.php');
			include_once('com/bydan/framework/contabilidad/business/entity/MaintenanceType.php');
			include_once('com/bydan/framework/contabilidad/business/entity/ConexionController.php');
			include_once('com/bydan/framework/contabilidad/business/entity/DatoGeneral.php');
			include_once('com/bydan/framework/contabilidad/business/entity/DatoGeneralMinimo.php');
			include_once('com/bydan/framework/contabilidad/business/entity/DatoGeneralMaximo.php');
			include_once('com/bydan/framework/contabilidad/business/dataaccess/DataAccessHelper.php');
			include_once('com/bydan/framework/contabilidad/business/dataaccess/GetEntitiesDataAccessHelper.php');
			include_once('com/bydan/framework/contabilidad/business/dataaccess/ModelBase.php');
			include_once('com/bydan/framework/contabilidad/business/logic/Pagination.php');
			include_once('com/bydan/framework/contabilidad/business/logic/DatosCliente.php');
			include_once('com/bydan/framework/contabilidad/business/logic/DatosDeep.php');
			include_once('com/bydan/framework/contabilidad/business/logic/QueryWhereSelectParameters.php');
			include_once('com/bydan/framework/contabilidad/business/logic/ParameterSelectionGeneral.php');
			include_once('com/bydan/framework/contabilidad/presentation/web/SessionBase.php');
			include_once('com/bydan/framework/contabilidad/presentation/web/controller/ControllerBase.php');
			include_once('com/bydan/framework/contabilidad/presentation/web/PaginationLink.php');
			include_once('com/bydan/framework/contabilidad/presentation/web/HistoryWeb.php');
			include_once('com/bydan/framework/contabilidad/presentation/report/CellReport.php');

		} else if($paqueteTipo=PaqueteTipo::$WEB) {
			
			include_once('com/bydan/framework/contabilidad/util/Funciones.php');
			include_once('com/bydan/framework/contabilidad/util/PaqueteTipo.php');
			include_once('com/bydan/framework/contabilidad/presentation/web/SessionBase.php');
		}
	}
	*/
	
	public static function existeCadenaSplit(string $cadenaBuscar='',string $cadenaTotal='',string $caracterSplit='.'):bool {
		$existe=false;
		
		$arrCadenaTotal=preg_split('/'.$caracterSplit.'/',$cadenaTotal);
		
		if($arrCadenaTotal!=null && count($arrCadenaTotal)>0) {			
			foreach($arrCadenaTotal as $strCadenaTotalLocal) {
				if($strCadenaTotalLocal==$cadenaBuscar) {
					$existe=true;
					break;
				}
			}
		}
		
		return $existe;
	}
	
	public static function existeCadenaArray(string $cadenaBuscar='',array $arrCadenas=array()):bool {
		$existe=false;

		if($arrCadenas!=null && count($arrCadenas)>0) {
			foreach($arrCadenas as $strCadenaLocal) {
				if($strCadenaLocal==$cadenaBuscar) {
					$existe=true;
					break;
				}
			}
		}

		return $existe;
	}
	
	public static function GetWhereGlobalConstants(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,bool $conWhere,bool $conAnd,array $arrColumnasGlobales):string {//modulo
		$sWhereGlobal='';
		$existeCondicion=false;
		
		if($conWhere) {
			$sWhereGlobal.=' where ';
			
		} else if($conAnd) {
			$sWhereGlobal.=' and ';
		}
		
		
		foreach($arrColumnasGlobales as $sColumnaGlobal) {
			
			if($sColumnaGlobal=='id_empresa') {
			    
			    if($parametroGeneralUsuario!=null && $parametroGeneralUsuario->getid_empresa()!=null) {
    				$sWhereGlobal.=' id_empresa='.$parametroGeneralUsuario->getid_empresa();			
    				$existeCondicion=true;
    				
    				continue;
			    }
				
			} else if($sColumnaGlobal=='id_sucursal') {		
				
			    if($existeCondicion) {
					$sWhereGlobal.=' and ';
				}			
				
				if($parametroGeneralUsuario!=null && $parametroGeneralUsuario->getid_sucursal()!=null) {
				    $sWhereGlobal.=' id_sucursal='.$parametroGeneralUsuario->getid_sucursal();
				    $existeCondicion=true;
				    
				    continue;
				}
				
			} 
			
			/*
			else if($sColumnaGlobal=='id_ejercicio') {
				
			    if($existeCondicion) {
					$sWhereGlobal.=' and ';
				}	
				
				
				if($parametroGeneralUsuario!=null && $parametroGeneralUsuario->getid_ejercicio()!=null) {
    				$sWhereGlobal.=' id_ejercicio='.$parametroGeneralUsuario->getid_ejercicio();
    				$existeCondicion=true;
    				
    				continue;
				}
				
			} else if($sColumnaGlobal=='id_periodo') {
			    
				if($existeCondicion) {
					//$sWhereGlobal.=' and ';
				}
				
				//$sWhereGlobal.=' id_periodo='.parametroGeneralUsuario->getid_periodo();
				//$existeCondicion=true;
				
				continue;
				
			} 
			*/
			
			else if($sColumnaGlobal=='id_modulo') {
			    
				if($existeCondicion) {
					$sWhereGlobal.=' and ';
				}
				
				if($moduloActual!=null && $moduloActual->getId()!=null) {
    				$sWhereGlobal.=' id_modulo='.$moduloActual->getId();
    				$existeCondicion=true;
    				
    				continue;
				}
			}
		}
		
		if(!$existeCondicion) {
			$sWhereGlobal='';
		}
		
		return $sWhereGlobal;
	}
	
	public static function GetFinalQueryAppend(string $sFinalQueryIni,string $sFinalQueryNew):string {
		$sFinalQuery='';
		$sFinalQueryNew=' '.$sFinalQueryNew.' ';
		$iLength=strlen($sFinalQueryNew);
		
		
		
		if(strpos($sFinalQueryIni,'where') !== false || strpos($sFinalQueryIni,'WHERE') !== false) {
						
			if($iLength>2 && !(strpos($sFinalQueryNew,'and') !== false || strpos($sFinalQueryNew,'AND') !== false)) {
				
				$sFinalQueryNew=' and '.$sFinalQueryNew;
			}
			
		} else {
			
			if($iLength>2 && !(strpos($sFinalQueryNew,'where') !== false|| strpos($sFinalQueryNew,'WHERE') !== false)) {
				
				$sFinalQueryNew=' where '.$sFinalQueryNew;
			}
		}
		
		$sFinalQuery=$sFinalQueryIni.$sFinalQueryNew;
		
		return $sFinalQuery;
	}
	
	public static function logShowDegug(string $message) {
		$file = 'webroot/log/log.txt';
		$contenido='';
		
		// Open the file to get existing content
		//$contenido = file_get_contents($file);
		
		// Append a new person to the file
		$contenido.= $message.PHP_EOL;//'\r\n';
		
		// Write the contents back to the file
		file_put_contents($file, $contenido, FILE_APPEND);
	}
	
	public static function getSufijoEstiloUsuario(parametro_general_usuario $parametroGeneralUsuarioActual):string {
		$strSufijoEstilo='defecto';
		
		if($parametroGeneralUsuarioActual!=null) {
			/*
			if($parametroGeneralUsuarioActual->getid_tipo_tamanio_control_normal()==1) {
				$strSufijoEstilo='normal';
				
			} else if($parametroGeneralUsuarioActual->getid_tipo_tamanio_control_normal()==2) {
				$strSufijoEstilo='peque';
				
			} else if($parametroGeneralUsuarioActual->getid_tipo_tamanio_control_normal()==3) {
				$strSufijoEstilo='medio';
				
			} else if($parametroGeneralUsuarioActual->getid_tipo_tamanio_control_normal()==4) {
				$strSufijoEstilo='grande';
				
			}  else if($parametroGeneralUsuarioActual->getid_tipo_tamanio_control_normal()==5) {
				$strSufijoEstilo='mini';
				
			}  else if($parametroGeneralUsuarioActual->getid_tipo_tamanio_control_normal()==6) {
				$strSufijoEstilo='maxi';
			}
			*/
		}
		
		$strSufijoEstilo='_'.$strSufijoEstilo;
		
		return $strSufijoEstilo;
	}
	
	public static function getParametroEstiloTipoLetraUsuario(parametro_general_usuario $parametroGeneralUsuarioActual):string {
		//style_font_XXX.css
		
		$strSufijoEstilo='defecto';//Arial';'Verdana';
		
		if($parametroGeneralUsuarioActual!=null) {
			/*
			if($parametroGeneralUsuarioActual->getid_tipo_fuente()==1) {
				$strSufijoEstilo='normal';
				
			} else if($parametroGeneralUsuarioActual->getid_tipo_fuente()==2) {
				$strSufijoEstilo='peque';
				
			} else if($parametroGeneralUsuarioActual->getid_tipo_fuente()==3) {
				$strSufijoEstilo='medio';
				
			} else if($parametroGeneralUsuarioActual->getid_tipo_fuente()==4) {
				$strSufijoEstilo='grande';
				
			}  else if($parametroGeneralUsuarioActual->getid_tipo_fuente()==5) {
				$strSufijoEstilo='mini';
				
			}  else if($parametroGeneralUsuarioActual->getid_tipo_fuente()==6) {
				$strSufijoEstilo='maxi';
			}
			*/
		}
		
		$strSufijoEstilo='_'.$strSufijoEstilo;
		
		return $strSufijoEstilo;
	}	
	
	public static function getModuloFinal(string $modulo) :string {
		$strModuloFinal=$modulo;
		
		return $strModuloFinal;
		
		
		
		if($modulo=='CuentasPorPagar') {
			$strModuloFinal='Cartera';
			
		} else if($modulo=='CuentasPorCobrar') {
			$strModuloFinal='Cartera';
		
		} else if($modulo=='cuentasporpagar') {
			$strModuloFinal='cartera';	
		
		} else if($modulo=='cuentasporcobrar') {
			$strModuloFinal='cartera';	
		}
		
		return $strModuloFinal;
	}
	
	public static function writeQueryChangeFile(string $sMensaje='') {
	    $file = 'webroot/log/sql_queries_changes.sql';
	    
	    $sMensaje=$sMensaje.PHP_EOL;
	    
	    if(Constantes::$IS_DEVELOPING_SQL) {
	        file_put_contents($file, $sMensaje, FILE_APPEND);
	    }
	}
	
	public static function writeQueryFile(string $sMensaje='') {
		$file = 'webroot/log/sql_queries_changes_export.sql';
				
		$sMensaje=$sMensaje.PHP_EOL;
		
		if(Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
			file_put_contents($file, $sMensaje, FILE_APPEND);							
		}
	}
	
	public static function mostrarMensajeDeveloping(string $sMensaje='') {
		$file = 'webroot/log/sql_queries_selects.sql';

		$sMensaje=$sMensaje.PHP_EOL;
		
		if(Constantes::$IS_DEVELOPING_SQL || Constantes::$IS_DEVELOPING_SQL_REPORT) {
			file_put_contents($file, $sMensaje, FILE_APPEND);							
		}
	}
	
	public static function GetRealScapeString($texto,?Connexion $connexion=null):string {
	    
		if(Constantes::$PHP_VERSION!='7.0') {
			$texto=mysqli_real_escape_string($connexion->getConnection()->getMysqLink(),(string) $texto);
			
		} else {			
			if($connexion!=null) {
				$texto=mysqli_real_escape_string($connexion->getConnection()->getMysqLink(),(string) $texto);
			}
		}
		
		return $texto;
	}
	
	public static function GetNullString($value) {
	    $return_value=$value;
	    
	    if($value==null || $value <= 0 || $value=='0' || $value=='') {
	        $return_value='null';
	    }
	    
	    return $return_value;	    	    
	}
	
	/*Reporte*/	
	public static function GetRepTable($generalEntityParameterGeneralReporte) :string{
		$sHtml='';
		
		return $sHtml;
	}
	
	public static function GetRepTableDetalle($generalEntityParameterGeneralReporte):string  {
		$sHtml='';
	
		return $sHtml;
	}
	
	public static function GetRepTrHead($generalEntityParameterGeneralReporte,$i):string  {
		$sHtml='';
	
		return $sHtml;
	}
	
	public static function GetRepTdHead($generalEntityParameterGeneralReporte):string {
		$sHtml='';
	
		return $sHtml;
	}
	
	public static function GetRepTrData($generalEntityParameterGeneralReporte,$i):string  {
		$sHtml='';
	
		return $sHtml;
	}
	
	public static function GetRepTdData($generalEntityParameterGeneralReporte):string  {
		$sHtml='';
	
		return $sHtml;
	}
	
	public static function GetRepHtmlIni($generalEntityParameterGeneralReporte):string  {
		$sHtml='';
	
		return $sHtml;
	}
	
	public static function GetRepHtmlFin($generalEntityParameterGeneralReporte):string  {
		$sHtml='';
	
		return $sHtml;
	}
	
	public static function GetRepHtmlHead($generalEntityParameterGeneralReporte):string  {
		$sHtml='';
	
		//$sHtml.='<link rel="stylesheet" type="text/css" href="webroot/css/Css/style_layout.css" media="screen" />';
		//$sHtml.='<link rel="stylesheet" type="text/css" href="webroot/css/Css/style_shared.css" media="screen" />';
		
		
		$sHtml.='<link rel="stylesheet" type="text/css" href="webroot/css/Css/style_defecto_reporte.css" media="screen" />';
		
		/*
		$sHtml.='<script type="text/javascript" language="javascript" src="webroot/js/JavaScript/Library/General/FuncionGeneral.js"></script>';
		$sHtml.='<script  type="text/javascript" language="javascript">alert(funcionGeneral);</script>';
		*/
		
		$sJavaScript =file_get_contents('webroot/js/JavaScript/Library/General/Constantes.js');
		$sHtml.=$sJavaScript;
		
		$sJavaScript =file_get_contents('webroot/js/JavaScript/Library/General/FuncionGeneral.js');
		$sHtml.=$sJavaScript;
		
		$sJavaScript =file_get_contents('webroot/js/JavaScript/Library/General/FuncionGeneralEventoJQuery.js');
		$sHtml.=$sJavaScript;
		
		/*
		include_once(Constantes::$PATH_REL.Constantes::$strPathBaseJavaScriptToComplete.'JavaScript/Library/General/Constantes.js' );
		include_once(Constantes::$PATH_REL.Constantes::$strPathBaseJavaScriptToComplete.'JavaScript/Library/General/FuncionGeneral.js' );				
		include_once(Constantes::$PATH_REL.Constantes::$strPathBaseJavaScriptToComplete.'JavaScript/Library/General/FuncionGeneralEventoJQuery.js' );				
		*/		
				
		//$sHtml.='<link rel="stylesheet" type="text/css" href="webroot/css/Css/style_font_defecto.css" media="screen" />';
		
		return $sHtml;
	}
	
	public static function GetRepHtmlTableIni($generalEntityParameterGeneralReporte):string  {
		$sHtml='';
	
		return $sHtml;
	}
	
	public static function GetRepHtmlTableFin($generalEntityParameterGeneralReporte):string  {
		$sHtml='';
	
		return $sHtml;
	}
	
	public static function GetReporte_Reportico(mixed $data): bool {
		$con_reportico = false;

		if(is_array($data)) {
			$con_reportico=array_key_exists('chbConReportico',$data['ParametrosBusqueda'])? Funciones::getBooleanFromDataValue($data['ParametrosBusqueda']['chbConReportico']):false;
		} else {
			$con_reportico=property_exists($data->{'ParametrosBusqueda'},'chbConReportico')? Funciones::getBooleanFromDataValue($data->{'ParametrosBusqueda'}->{'chbConReportico'}) : false;
		}

		return $con_reportico;
	}
	
	public static function AbrirReporte_Reportico(array $data,string $nombre_reporte,string $where_query,string $execute_mode,$generalEntityParameterGeneral,$generalEntityReturnGeneral) {
		$tipo_reporte='';
		$target='';
		
		$tipo_reporte=$data['tipo_reporte'];
		$tipo_reporte=strtoupper($tipo_reporte);
			
		
		if($tipo_reporte=='HTML2') {
			$tipo_reporte=='HTML';
		}
		
		if($tipo_reporte=='EXCEL' || $tipo_reporte=='EXCEL2007') {
			$tipo_reporte=='CSV';
		}
		
		if($tipo_reporte=='PDF2') {
			$tipo_reporte=='PDF';
		}
		
		
		if($tipo_reporte=='HTML' || $tipo_reporte=='PDF' || $tipo_reporte=='CSV' 
				|| $tipo_reporte=='XML' || $tipo_reporte=='JSON') {
					
			$target='&target_format='.$tipo_reporte;
		}
		
			
		header('Location: http://'.Constantes::$STR_DNS_NAME_SERVER.':'.Constantes::$STR_PORT_SERVER.'/'.Constantes::$STR_CONTEXT_SERVER.'/reportico_4_6/run.php?execute_mode='.$execute_mode.'&%20project=contabilidad&project_password=root&xmlin='.$nombre_reporte.''.$target.''.$where_query); /* Redirect browser */
			
		exit();
	}
	
	public static function EjecutarReporte_Reportico(array $data,string $nombre_reporte,string $where_query,string $execute_mode,$initial_execution_parameters,$generalEntityParameterGeneral,$generalEntityReturnGeneral) {
		//No se aplica, el path se pierde
		require_once("reportico_4_6/reportico.php");
		
		
		$reportico1 = new reportico();
		
		$tipo_reporte='';
		//$target='';
		
		$tipo_reporte=$data['tipo_reporte'];
		$tipo_reporte=strtoupper($tipo_reporte);
			
		
		if($tipo_reporte=='HTML2') {
			$tipo_reporte=='HTML';
		}
		
		if($tipo_reporte=='EXCEL' || $tipo_reporte=='EXCEL2007') {
			$tipo_reporte=='CSV';
		}
		
		if($tipo_reporte=='PDF2') {
			$tipo_reporte=='PDF';
		}
		
		
		if($tipo_reporte=='HTML' || $tipo_reporte=='PDF' || $tipo_reporte=='CSV'
				|| $tipo_reporte=='XML' || $tipo_reporte=='JSON') {
						
			//$target='&target_format='.$tipo_reporte;
		}
				
		$reportico1->access_mode = "REPORTOUTPUT";
		$reportico1->initial_execute_mode = $execute_mode;
		$reportico1->initial_project = "contabilidad";
		$reportico1->initial_project_password = "root";
		$reportico1->initial_report = $nombre_reporte;
		$reportico1->initial_output_format = $tipo_reporte;//PDF
		$reportico1->initial_output_style = "TABLE";//FORM
		//$reportico1->bootstrap_styles = "3";
		//$reportico1->force_reportico_mini_maintains = true;
		//$reportico1->bootstrap_preloaded = true;
		$reportico1->clear_reportico_session = true;
		
		
		$reportico1->initial_execution_parameters = $initial_execution_parameters;
		
		/*
		$reportico1->initial_execution_parameters["codigo_desde"] = "aaa";
		$reportico1->initial_execution_parameters["codigo_hasta"] = "zzz";
		*/
		
		$reportico1->execute();
		
	}
	/*Reporte_Fin*/
	
	public static function GetNamespaceUtil(string $table,string $modulo):string {
	    $namespace_util_table='';
	    $text_replace='';
	    
	    switch ($modulo) {	        
	            
	        case 'contabilidad':
	            $text_replace = Constantes::$NAMESPACE_UTIL_CONTABILIDAD;
	            break;
	            
	        case 'cuentascobrar':
	            $text_replace = Constantes::$NAMESPACE_UTIL_CUENTAS_COBRAR;
	            break;
	        
	        case 'cuentascorrientes':
	            $text_replace = Constantes::$NAMESPACE_UTIL_CUENTAS_CORRIENTES;
	            break;
	            
	        case 'cuentaspagar':
	            $text_replace = Constantes::$NAMESPACE_UTIL_CUENTAS_PAGAR;
	            break;
	            
	        case 'estimados':
	            $text_replace = Constantes::$NAMESPACE_UTIL_ESTIMADOS;
	            break;
	            
	        case 'facturacion':
	            $text_replace = Constantes::$NAMESPACE_UTIL_FACTURACION;
	            break;
	            
	        case 'general':
	            $text_replace = Constantes::$NAMESPACE_UTIL_GENERAL;
	            break;
	            
	        case 'inventario':
	            $text_replace = Constantes::$NAMESPACE_UTIL_INVENTARIO;
	            break;
	            
	        case 'seguridad':
	            $text_replace = Constantes::$NAMESPACE_UTIL_SEGURIDAD;
	            break;
	            
	        default:
	            $text_replace = 'ninguno';
	    }	    	    
	    
	    $namespace_util_table=str_replace('_table_', $table.'_carga', $text_replace);
	    
	    return $namespace_util_table;
	}
	
	public static function GetNamespaceLogic(string $table,string $modulo,bool $es_additional):string {
	    $namespace_logic_table='';
	    $text_replace='';
		$text_add='';

		if($es_additional){
			$text_add='_add';
		}

	    switch ($modulo) {	        
	            
	        case 'contabilidad':
	            $text_replace = Constantes::$NAMESPACE_LOGIC_CONTABILIDAD;
	            break;
	            
	        case 'cuentascobrar':
	            $text_replace = Constantes::$NAMESPACE_LOGIC_CUENTAS_COBRAR;
	            break;
	        
	        case 'cuentascorrientes':
	            $text_replace = Constantes::$NAMESPACE_LOGIC_CUENTAS_CORRIENTES;
	            break;
	            
	        case 'cuentaspagar':
	            $text_replace = Constantes::$NAMESPACE_LOGIC_CUENTAS_PAGAR;
	            break;
	            
	        case 'estimados':
	            $text_replace = Constantes::$NAMESPACE_LOGIC_ESTIMADOS;
	            break;
	            
	        case 'facturacion':
	            $text_replace = Constantes::$NAMESPACE_LOGIC_FACTURACION;
	            break;
	            
	        case 'general':
	            $text_replace = Constantes::$NAMESPACE_LOGIC_GENERAL;
	            break;
	            
	        case 'inventario':
	            $text_replace = Constantes::$NAMESPACE_LOGIC_INVENTARIO;
	            break;
	            
	        case 'seguridad':
	            $text_replace = Constantes::$NAMESPACE_LOGIC_SEGURIDAD;
	            break;
	            
	        default:
	            $text_replace = 'ninguno';
	    }	    	    
	    
	    $namespace_logic_table=str_replace('_table_', $table.'_logic'.$text_add, $text_replace);
	    
	    return $namespace_logic_table;
	}
	
	/*
App::import('Vendor','IOFactory',array('file' => 'excel/PHPExcel/IOFactory.php'));
App::import('Vendor','PHPExcel',array('file' => 'excel/PHPExcel.php'));
App::import('Vendor','PHPExcelWriter',array('file' => 'excel/PHPExcel/Writer/Excel5.php'));
App::import('Vendor','PHPHtmlWriter',array('file' => 'excel/PHPExcel/Writer/HTML.php'));
App::import('Vendor','PHPPdfWriter',array('file' => 'excel/PHPExcel/Writer/PDF.php'));
App::import('Vendor','PHPCsvWriter',array('file' => 'excel/PHPExcel/Writer/CSV.php'));
App::import('Vendor','PHPExcel2007Writer',array('file' => 'excel/PHPExcel/Writer/Excel2007.php'));
*/

//include_once('vendor/autoload.php');
/*
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Spreadsheet.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Calculation/Calculation.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Calculation/Category.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Calculation/Engine/CyclicReferenceStack.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Calculation/Engine/Logger.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/ReferenceHelper.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Worksheet/Worksheet.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/IOFactory.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/IWriter.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/BaseWriter.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xls.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Html.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Pdf.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Csv.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xlsx.php');
*/
/*
use PHPExcel;
use PHPExcel_Cell;
use PHPExcel_Style_Fill;
use PHPExcel_Settings;
use PHPExcel_Worksheet_PageSetup;
use PHPExcel_IOFactory;
use PHPExcel_Writer_CSV;
use PHPExcel_Writer_Excel5;
use PHPExcel_Writer_HTML;
use PHPExcel_Writer_PDF;
use PHPExcel_Writer_Excel2007;
*/
}
?>