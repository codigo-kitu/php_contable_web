
<script id="sucursal_resumen_template" type="text/x-handlebars-template">


<div id="divTablaDatosAuxiliarsucursalsAjaxWebPart" style="width:100%;height:100%;overflow:auto;">

{{#each sucursalsReporte}}

			<table id="tablesucursal{{id}}" {{../strAuxStyleBackgroundTablaPrincipal}} width="{{../strTamanioTablaPrincipal}}" align="center" cellspacing="0" cellpadding="0" border="{{../borderValue}}">
						
				<tr>
					<td align="center" {{../strAuxStyleBackgroundTitulo}} >
						<p class="tituloficha">
							<b>{{strtoupper nombre}}</b>
						</p>
					</td>
				</tr>
			
				

			{{#if (existeCadenaArrayOrderBy 'Empresa' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Empresa</b>
								</td>
								<td>{{trim id_empresa_Descripcion}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Pais' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Pais</b>
								</td>
								<td>{{trim id_pais_Descripcion}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Ciudad' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Ciudad</b>
								</td>
								<td>{{trim id_ciudad_Descripcion}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Nombre' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Nombre</b>
								</td>
								<td>{{trim nombre}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Registro Tributario (RUC)' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Registro Tributario (RUC)</b>
								</td>
								<td>{{trim registro_tributario}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Registro Empresarial' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Registro Empresarial</b>
								</td>
								<td>{{trim registro_sucursalrial}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Direccion1' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Direccion1</b>
								</td>
								<td>{{trim direccion1}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Direccion2' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Direccion2</b>
								</td>
								<td>{{trim direccion2}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Direccion3' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Direccion3</b>
								</td>
								<td>{{trim direccion3}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Telefono1' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Telefono1</b>
								</td>
								<td>{{trim telefono1}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Celular' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Celular</b>
								</td>
								<td>{{trim celular}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Correo Electronico' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Correo Electronico</b>
								</td>
								<td>{{trim correo_electronico}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Sitio Web' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Sitio Web</b>
								</td>
								<td>{{trim sitio_web}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Codigo Postal' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Codigo Postal</b>
								</td>
								<td>{{trim codigo_postal}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Fax' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Fax</b>
								</td>
								<td>{{trim fax}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Barrio Distrito' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Barrio Distrito</b>
								</td>
								<td>{{trim barrio_distrito}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Logo' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Logo</b>
								</td>
								<td>{{trim logo}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Base De Datos' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Base De Datos</b>
								</td>
								<td>{{trim base_de_datos}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Condicion' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Condicion</b>
								</td>
								<td>{{ condicion}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Icono Asociado' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Icono Asociado</b>
								</td>
								<td>{{trim icono_asociado}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Folder' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Folder</b>
								</td>
								<td>{{trim folder_sucursal}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}
				
			</table>
{{/each}}
				
				
	{{#if paraReporte}}			
			
				<table>
					<tr>
						<td>
							<input type="button" onclick="{{proceso_print}}" style="visibility:visible" value="Imprimir" />
						</td>
					</tr>
				</table>
	{{/if}}
	
</div>


</script>

