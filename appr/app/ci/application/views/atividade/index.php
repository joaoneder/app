<form class="form-horizontal" method="post" action="<?php echo site_url('atividade/index/'); ?>">
	<div class="form-group">
		<div class="col-sm-3">	
			<select name="status" class="form-control">
				<?php foreach ($status as $status_item): ?>
				<option value="<?php echo $status_item['status_id']; ?>"><?php echo $status_item['status']; ?></option>
				<?php endforeach; ?>
			</select><br />
			<input type="submit" value="Filtrar" class="btn btn-default" />	
			<input type="subuttonbmit" value="Limpar Filtros" class="btn btn-default" onClick="document.location='<?php echo site_url('atividade/index/'); ?>';"/>	
		</div>
	</div>		
</form>
<br />
<table class="table-bordered" width="100%">
	<th>
		Nome
	</th>
	<th>
		Status
	</th>
	<th>
		Descrição
	</th>
	<th>
		Editar
	<?php foreach ($atividade as $atividade_item): 	?>
	<tr>
		<td>
			<?php echo $atividade_item['nome']; ?>
		</td>
		<td>
			 <?php echo $atividade_item['status']; ?>
		</td>
		<td>
			 <?php echo $atividade_item['descricao']; ?>
		</td>
		<td>
			<a href="<?php echo site_url('atividade/view/'.$atividade_item['atividade_id']); ?>">Editar</a>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<br />
<a href="<?php echo site_url('atividade/create'); ?>">Adicionar Atividade</a>
<br />
<br />
