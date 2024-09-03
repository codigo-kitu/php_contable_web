
<script id="transacciones_cuenta_pagar_resumen_template" type="text/x-handlebars-template">


<div id="divTablaDatosAuxiliartransacciones_cuenta_pagarsAjaxWebPart" style="width:100%;height:100%;overflow:auto;">

{{#each transacciones_cuenta_pagarsReporte}}

			<table id="tabletransacciones_cuenta_pagar{{id}}" {{../strAuxStyleBackgroundTablaPrincipal}} width="{{../strTamanioTablaPrincipal}}" align="center" cellspacing="0" cellpadding="0" border="{{../borderValue}}">
						
				<tr>
					<td align="center" {{../strAuxStyleBackgroundTitulo}} >
						<p class="tituloficha">
							<b>{{strtoupper id}}</b>
						</p>
					</td>
				</tr>
			
				

			{{#if (existeCadenaArrayOrderBy ' Empresa' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>-  Empresa</b>
								</td>
								<td>{{trim id_empresa_Descripcion}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy ' Sucursal' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>-  Sucursal</b>
								</td>
								<td>{{trim id_sucursal_Descripcion}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Numero Cuenta' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Numero Cuenta</b>
								</td>
								<td>{{trim numero_cuenta}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Proveedor' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Proveedor</b>
								</td>
								<td>{{trim proveedor}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Tipo' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Tipo</b>
								</td>
								<td>{{trim tipo}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Fecha Emision' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Fecha Emision</b>
								</td>
								<td>{{ fecha_emision}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Debito' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Debito</b>
								</td>
								<td>{{ debito}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Credito' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Credito</b>
								</td>
								<td>{{ credito}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Descripcion' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Descripcion</b>
								</td>
								<td>{{trim descripcion}}
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

