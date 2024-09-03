
<?php //DESHABILITADO, SE USA JS TEMPLATING ?>

<form id="frmOrderBy" name="frmOrderBy">
	
	<table>
		<tr>
			<td>
				<span class="busquedatitulocampo">
					ORDEN
				</span>
				
				<input id="to-paraorden_orderby" name="to-paraorden_orderby" type="checkbox"></input>
			</td>
			
			<td>
				<span class="busquedatitulocampo">
					REPORTE
				</span>
				
				<input id="to-parareporte_orderby" name="to-parareporte_orderby" type="checkbox"></input>
			</td>
		</tr>
		
	</table>
		
	<input type="hidden" id="to-maxima_fila_orderby" name="to-maxima_fila_orderby" value="<?php echo(count($arrOrderBy)) ?>"/>
	<!-- <span class="titulotabla">ORDEN</span> -->
	
	<table cellpadding="0" cellspacing="3">

		<tr class="cabeceratabla">
			<th>
				<pre><b>ID</pre>
			</th>
			<th>
				<pre><b>SEL</pre>
			</th>
			<th>
				<pre><b>NOMBRE</pre>
			</th>
			<th>
				<pre><b>ES DESC</pre>
			</th>
		</tr>
		
		<?php foreach ($arrOrderBy as $orderBy) { ?>
		
		<tr class="<?php echo($orderBy->class) ?>" onmouseover="funcionGeneral.activarFilaTabla(this);" onmouseout="funcionGeneral.desactivarFilaTabla(this,\'<?php echo($orderBy->class) ?>\');">			
			
			<td>
				<?php echo($orderBy->i) ?>
			</td>			
			<td>
				<input id="to-issel_<?php echo($orderBy->i) ?>" name="to-issel_<?php echo($orderBy->i) ?>" type="checkbox"><?php echo($orderBy->i) ?></input>
			</td>			
			<td> 
				<?php echo($orderBy->nombre) ?>
			</td>
			<td>
				<input id="to-esdesc_<?php echo($orderBy->i) ?>" name="to-esdesc_<?php echo($orderBy->i) ?>" type="checkbox"></input>
			</td>
					
		</tr>
			
		<?php } ?>
		
	</table>
	
</form>