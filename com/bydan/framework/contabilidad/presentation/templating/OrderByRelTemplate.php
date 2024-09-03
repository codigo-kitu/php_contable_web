
<?php //DESHABILITADO, SE USA JS TEMPLATING ?>

<form id="frmOrderByRel" name="frmOrderByRel">

	<table>
	
		<tr>
		    <!-- <td><span class="busquedatitulocampo">ORDEN</span><input id="tor-paraorden_orderbyrel" name="tor-paraorden_orderbyrel" type="checkbox"></input></td> -->
			<td>
				<span class="busquedatitulocampo">
					REPORTE
				</span>
				<input id="tor-parareporte_orderbyrel" name="tor-parareporte_orderbyrel" type="checkbox"></input>
			</td>
		</tr>
		
	</table>
		
		<input type="hidden" id="tor-maxima_fila_orderbyrel" name="tor-maxima_fila_orderbyrel" value="<?php echo(count($arrOrderBy)) ?>"/>
		
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
		        <!-- <th><b><pre>ES DESC</pre></th> -->
			</tr>
			
			<?php foreach ($arrOrderBy as $orderBy) { ?>
						
			<tr class="<?php echo($orderBy->class) ?>" onmouseover="funcionGeneral.activarFilaTabla(this);" onmouseout="funcionGeneral.desactivarFilaTabla(this,\'<?php echo($orderBy->class) ?>\');">
			
				<td>
					<?php echo($orderBy->i) ?>
				</td>
				
				<td>
			    	<input id="tor-issel_<?php echo($orderBy->i) ?>" name="tor-issel_<?php echo($orderBy->i) ?>" type="checkbox"><?php echo($orderBy->i) ?></input>
				</td>
				
				<td> 
					<?php echo($orderBy->nombre) ?>
				</td>
				 <!-- <td><input id="tor-esdesc_<?php echo($orderBy->i) ?>" name="tor-esdesc_<?php echo($orderBy->i) ?>" type="checkbox"></input></td>'; -->
			</tr>
							
			<?php } ?>
		
		</table>
				
</form>