
<script id="resumen_usuario_resumen_template" type="text/x-handlebars-template">


<div id="divTablaDatosAuxiliarresumen_usuariosAjaxWebPart" style="width:100%;height:100%;overflow:auto;">

{{#each resumen_usuariosReporte}}

			<table id="tableresumen_usuario{{id}}" {{../strAuxStyleBackgroundTablaPrincipal}} width="{{../strTamanioTablaPrincipal}}" align="center" cellspacing="0" cellpadding="0" border="{{../borderValue}}">
						
				<tr>
					<td align="center" {{../strAuxStyleBackgroundTitulo}} >
						<p class="tituloficha">
							<b>{{strtoupper id}}</b>
						</p>
					</td>
				</tr>
			
				

			{{#if (existeCadenaArrayOrderBy 'Usuario' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Usuario</b>
								</td>
								<td>{{trim id_usuario_Descripcion}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Numero Ingresos' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Numero Ingresos</b>
								</td>
								<td>{{ numero_ingresos}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Numero Error Ingreso' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Numero Error Ingreso</b>
								</td>
								<td>{{ numero_error_ingreso}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Numero Intentos' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Numero Intentos</b>
								</td>
								<td>{{ numero_intentos}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Numero Cierres' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Numero Cierres</b>
								</td>
								<td>{{ numero_cierres}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Numero Reinicios' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Numero Reinicios</b>
								</td>
								<td>{{ numero_reinicios}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Numero Ingreso Actual' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Numero Ingreso Actual</b>
								</td>
								<td>{{ numero_ingreso_actual}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Fecha Ultimo Ingreso' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Fecha Ultimo Ingreso</b>
								</td>
								<td>{{ fecha_ultimo_ingreso}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Fecha Ultimo Error Ingreso' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Fecha Ultimo Error Ingreso</b>
								</td>
								<td>{{ fecha_ultimo_error_ingreso}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Fecha Ultimo Intento' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Fecha Ultimo Intento</b>
								</td>
								<td>{{ fecha_ultimo_intento}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Fecha Ultimo Cierre' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Fecha Ultimo Cierre</b>
								</td>
								<td>{{ fecha_ultimo_cierre}}
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

