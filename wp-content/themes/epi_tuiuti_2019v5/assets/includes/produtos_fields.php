<?php
	$TamanhoProduto = get_field('tamanho_produto');
	$modelo_produto = get_field('modelo_produto');
	$cor_produto = get_field('cor_produto');
	$medida_produto = get_field('medida_produto');
	$capacidade_produto = get_field('capacidade_produto');
	$dimenssoes_produto = get_field('dimenssoes_produto');
	$ref_medida_min_produto = get_field('ref_medida_min_produto');
	$ref_medida_max_produto = get_field('ref_medida_max_produto');
	$mod_min_max = get_field('mod_min_max');
	$mod_fechada_aberta_peso = get_field( 'mod_fechada_aberta_peso');
	$mod_altura_peso = get_field('mod_altura_peso');
?>


<?php if ($cor_produto): ?>
	<div class="form_control">
		<select name="cor-produto" id="cor-produto" required>
			<option value="">Selecione a Cor</option>
			<?php
				$ArrCor = explode(',', $cor_produto);
				foreach ($ArrCor as $cor) {
			 		echo '<option value="'.$cor.'">'.$cor.'</option>';
			 	}
			?>
		</select>
	</div>
<?php endif ?>

<?php if ($medida_produto): ?>
	<div class="form_control">
		<select name="medida-produto" id="medida-produto" required>
			<option value="">Selecione uma Medida</option>
			<?php
				$ArrMedida = explode(',', $medida_produto);
				foreach ($ArrMedida as $medida) {
			 		echo '<option value="'.$medida.'">'.$medida.'</option>';
			 	}
			?>
		</select>
	</div>
<?php endif; ?>

<?php if ($modelo_produto): ?>
	<div class="form_control">
		<select name="modelo-produto" id="modelo-produto" required>
			<option value="">Selecione um Modelo</option>
			<?php
				$ArrModelo = explode(',', $modelo_produto);
				foreach ($ArrModelo as $modelo) {
			 		echo '<option value="'.$modelo.'">'.$modelo.'</option>';
			 	}
			?>
		</select>
	</div>
<?php endif; ?>

<?php if ($TamanhoProduto): ?>
	<div class="form_control">
		<select name="tamanho-produto" id="tamanho-produto" required>
			<option value="">Selecione um Tamanho</option>
			<?php
				$ArrTamanho = explode(',', $TamanhoProduto);
				foreach ($ArrTamanho as $tamanho) {
					echo '<option value="'.$tamanho.'">'.$tamanho.'</option>';
				}
			?>
		</select>
	</div>
<?php endif; ?>

<?php if ($capacidade_produto): ?>
	<div class="form_control">
		<select name="capacidade-produto" id="capacidade-produto" required>
			<option value="">Selecione uma Capacidade</option>
			<?php
				$ArrTCapacidade = explode(',', $capacidade_produto);
				foreach ($ArrTCapacidade as $capacidade) {
					echo '<option value="'.$capacidade.'">'.$capacidade.'</option>';
				}
			?>
		</select>
	</div>
<?php endif; ?>

<?php if ($dimenssoes_produto): ?>
	<div class="form_control">
		<select name="dimenssoes-produto" id="dimenssoes-produto" required>
			<option value="">Selecione uma Dimenssão</option>
			<?php
				$ArrDimenssoes = explode(',', $dimenssoes_produto);
				foreach ($ArrDimenssoes as $dimenssao) {
					echo '<option value="'.$dimenssao.'">'.$dimenssao.'</option>';
				}
			?>
		</select>
	</div>
<?php endif; ?>

<?php if ($ref_medida_min_produto): ?>
	<div class="form_control">
		<select name="ref-min-produto" id="ref-min-produto" required>
			<option value="">Selecione uma Referência</option>
			<?php
				$ArrRefMin = explode(',', $ref_medida_min_produto);
				foreach ($ArrRefMin as $ref_min) {
					echo '<option value="'.$ref_min.'">'.$ref_min.'</option>';
				}
			?>
		</select>
	</div>
<?php endif; ?>

<?php if ($ref_medida_max_produto): ?>
	<div class="form_control">
		<select name="ref-max-produto" id="ref-max-produto" required>
			<option value="">Selecione uma Referência</option>
			<?php
				$ArrRefMax = explode(',', $ref_medida_max_produto);
				foreach ($ArrRefMax as $ref_max) {
					echo '<option value="'.$ref_max.'">'.$ref_max.'</option>';
				}
			?>
		</select>
	</div>
<?php endif; ?>

<?php if ($mod_min_max): ?>
	<div class="form_control">
		<select name="mod-min-max" id="mod-min-max" required>
			<option value="">Selecione uma Referência</option>
			<?php
				$ArrModMinMax = explode(',', $mod_min_max);
				foreach ($ArrModMinMax as $ModMinMax) {
					echo '<option value="'.$ModMinMax.'">'.$ModMinMax.'</option>';
				}
			?>
		</select>
	</div>
<?php endif; ?>

<?php if ($mod_fechada_aberta_peso): ?>
	<div class="form_control">
		<select name="mod-fechada-aberta-peso" id="mod-fechada-aberta-peso" required>
			<option value="">Selecione uma Referência</option>
			<?php
				$ArrModFechada = explode(',', $mod_fechada_aberta_peso);
				foreach ($ArrModFechada as $ModFechada) {
					echo '<option value="'.$ModFechada.'">'.$ModFechada.'</option>';
				}
			?>
		</select>
	</div>
<?php endif; ?>

<?php if ($mod_altura_peso): ?>
	<div class="form_control">
		<select name="mod-altura-peso" id="mod-altura-peso" required>
			<option value="">Selecione uma Referência</option>
			<?php
				$ArrModAltura = explode(',', $mod_altura_peso);
				foreach ($ArrModAltura as $modAltura) {
					echo '<option value="'.$modAltura.'">'.$modAltura.'</option>';
				}
			?>
		</select>
	</div>
<?php endif; ?>