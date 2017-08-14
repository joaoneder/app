<?php
echo validation_errors(); 
echo form_open('atividade/create');
?>
	<div class="form-group">
		<label for="nome" class="col-sm-2 col-form-label">Nome</label>
		<input type="text" value="" name="nome" maxlength="255" class="btn btn-default" /><br />	
	</div>
	<div class="form-group">
		<label for="status" class="col-sm-2 col-form-label">Status</label>
			<select name="status" class="btn btn-default">
				<?php foreach ($status as $status_item): ?>
				<option value="<?php echo $status_item['status_id']; ?>"><?php echo $status_item['status']; ?></option>
				<?php endforeach; ?>
			</select><br />
	</div>
	<div class="form-group">		
		<label for="descricao" class="col-sm-2 col-form-label">Descrição</label>
		<textarea name="descricao"></textarea>				
	</div>
	<div class="form-group">
		<input type="submit" value="Salvar" class="btn btn-default" />
	</div>		
<br />
