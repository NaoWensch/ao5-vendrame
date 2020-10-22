<?php
	if (!isset($_SESSION)) {
	  session_start();
	}

	$isValid = ( ( isset($_SESSION['carrinho']) ) and ( count($_SESSION['carrinho']) > 0 ) );
	$sended = false;

	if ($isValid) {
	    $orca = array(
	        'nome'        => $_POST["nome"],
	        'email'       => $_POST["email"],
	        'empresa'     => $_POST["empresa"],
	        'tel'         => $_POST["tel"],
	        'mensagem'    => $_POST["msg"],
	    );

	    require_once(TEMPLATEPATH . '/phpmailer/class.phpmailer.php');
	    $phpmail = new PHPMailer();
	    $phpmail->IsSMTP(); // envia por SMTP
	   
	    $phpmail->Host = "smtplw.com.br"; // SMTP servers
	    $phpmail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação
	    $phpmail->Username = "epituiuti"; // SMTP username
	    $phpmail->Password = "QTvklIgI6449"; // SMTP password
	    $phpmail->Port = 587;
	   
	    // $phpmail->Host = "smtp.epi-tuiuti.com.br"; // SMTP servers
	    // $phpmail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação
	    // $phpmail->Username = "envia@epi-tuiuti.com.br"; // SMTP username
	    // $phpmail->Password = "asqw1234"; // SMTP password
	    // $phpmail->Port = 587;

	    $phpmail->IsHTML(true);
	    $phpmail->From = "envia@epi-tuiuti.com.br";
	    $phpmail->FromName = $orca['nome'];
	    $phpmail->AddReplyTo($orca['email'], $orca['nome']);

	    // Destinatario
	    $phpmail->AddAddress('atendimento@epi-tuiuti.com.br', 'EPI Tuiuti');
	    $phpmail->AddBCC('tuiutiformularios@gmail.com', 'EPI Tuiuti');
	    //$phpmail->AddCC('antonio@ao5.com.br', 'EPI Tuiuti');
	    //$phpmail->AddBCC('antonio@ao5.com.br', 'EPI Tuiuti');

	    //$phpmail->AddBCC('junior@upperid.com', 'EPI Tuiuti');
	    //$phpmail->AddBCC('teste@epi-tuiuti.com.br', 'EPI Tuiuti');

	    $phpmail->Subject = "Orç - EPI Tuiuti - ". $orca['nome'];
	    $phpmail->Body .= '<table width="553" border="0" cellpadding="0" cellspacing="0" style="font-family: Verdana; font-size:11px; color:#13222b;">
			<tr>
			    <td colspan="6" bgcolor="#d0d0d0"><img src="'.get_bloginfo('template_url').'/assets/img/topo-mail.jpg" width="553" height="94" /></td>
			</tr>
			<tr>
			    <td colspan="6" bgcolor="#d0d0d0">&nbsp;</td>
			</tr>
			<tr>
			    <td colspan="6" bgcolor="#d0d0d0" style="padding: 5px 0 5px 20px;"><strong>Nome</strong>: ' . $orca['nome'] . ' </td>
			</tr>
			<tr>
			    <td colspan="6" bgcolor="#d0d0d0" style="padding: 5px 0 5px 20px;"><strong>Empresa</strong>: ' . $orca['empresa'] . '</td>
			</tr>
			<tr>
			    <td colspan="6" bgcolor="#d0d0d0" style="padding: 5px 0 5px 20px;"><strong>E-mail</strong>: <span style="color:#13222b;"><a href="mailto:' . $orca['email'] . '" style="font-family: Verdana; color: 13222b !important;">' . $orca['email'] . '</a></span></td>
			</tr>
			<tr>
			    <td colspan="6" bgcolor="#d0d0d0" style="padding: 5px 0 5px 20px;"><strong>Telefone</strong>: ' . $orca['tel'] . '</td>
			</tr> 
			<tr>
			    <td colspan="6" bgcolor="#d0d0d0" style="padding: 5px 0 5px 20px;"><strong>Mensagem</strong>: ' . $orca['mensagem'] . '</td>
			</tr>
			<tr>
			    <td colspan="6" bgcolor="#d0d0d0">&nbsp;</td>
			</tr>
			<tr>
			    <td colspan="6" bgcolor="#d0d0d0"><img src="'.get_bloginfo('template_url').'/assets/img/orca-mail.jpg" width="553" height="29" /></td>
			</tr>';

		//tablela para salvar no banco
		$orcamento_dados = '';

		foreach ($_SESSION['carrinho'] as $produto) {
			$phpmail->Body .= '
			<tr>
			    <td width="123" style="padding: 5px 0 5px 20px; border-bottom: 3px solid #d0d0d0; border-right: 3px solid #d0d0d0;"><strong>Produto:</strong></td>
			    <td width="64" style="padding: 5px 0 5px 10px; border-bottom: 3px solid #d0d0d0; border-right: 3px solid #d0d0d0;"><strong>Cod.</strong></td>
			    <td width="172" style="padding: 5px 0 5px 10px; border-bottom: 3px solid #d0d0d0; border-right: 3px solid #d0d0d0;"><strong>Especificações:</strong></td>
			    <td width="56" style="padding: 5px 0 5px 10px; border-bottom: 3px solid #d0d0d0; border-right: 3px solid #d0d0d0;"><strong>Quant. </strong></td>
			    <td width="67" style="padding: 5px 0 5px 10px; border-bottom: 3px solid #d0d0d0; border-right: 3px solid #d0d0d0;"><strong>V. Uni. </strong></td>
			    <td width="71" style="padding: 5px 0 5px 10px; border-bottom: 3px solid #d0d0d0;"><strong>Total R$</strong></td>
			  	</tr>
			<tr>
			    <td style="padding: 5px 0 5px 20px; border-bottom: 3px solid #d0d0d0; border-right: 3px solid #d0d0d0;"><a href="'. $produto['link'].'" title="'.$produto['nome'].'" style="font-family: Verdana; font-size:11px; color:#13222b;">'. $produto['nome'] .'</a></td>
			    <td style="padding: 5px 0 5px 10px; border-bottom: 3px solid #d0d0d0; border-right: 3px solid #d0d0d0;">' . $produto['cod'] . '</td>
			    <td style="padding: 5px 0 5px 10px; border-bottom: 3px solid #d0d0d0; border-right: 3px solid #d0d0d0;">' . implode('<br /> ',$produto['espec']) . '</td>
			    <td style="padding: 5px 0 5px 10px; border-bottom: 3px solid #d0d0d0; border-right: 3px solid #d0d0d0;">' . $produto['qnt'] . '</td>
			    <td style="padding: 5px 0 5px 10px; border-bottom: 3px solid #d0d0d0; border-right: 3px solid #d0d0d0;">R$<input type="text" name="valor_uni" id="valor_uni" style="background: #fff; border: 0; margin-left: 5px; width: 30px"/></td>
			    <td style="padding: 5px 0 5px 10px; border-bottom: 3px solid #d0d0d0;">R$<input type="text" name="valor_total_produto" id="valor_total_produto" style="background: #fff; border: 0; margin-left: 5px; width: 30px"/></td>
			</tr>';

			$orcamento_dados .= 'Produto: ' . $produto['nome'] . ';Código: ' . $produto['cod'] . ';';
			$orcamento_dados .= 'Especificações: '. implode(', ',$produto['espec']) . ';Quantidade: ' . $produto['qnt'] . ';;;;;;;;;\n';
			$orcamento_dados .= ' ;;;;;;;;;;;;\n';
		} 

		$phpmail->Body .= '
			<tr>
			    <td colspan="6" style="padding: 5px 0 5px 20px; border-bottom: 3px solid #d0d0d0;"><strong>Valor total do Orçamento: R$<span style="padding: 5px 0 5px 20px;"><input type="text" name="total_orca2" id="total_orca2" style=" border: 0;"/>
			      </span></strong></td>
			</tr>

			<tr>
			    <td colspan="6" bgcolor="#d0d0d0" style="padding: 0 0 0 20px;">Prazo para Entrega:<input type="text" name="valor_total" id="valor_total" style="background: #d0d0d0; border: 0; margin-left: 5px;"/></td>
			</tr>
			<tr>
			    <td colspan="6" bgcolor="#d0d0d0" style="padding: 0 0 0 20px;">Representante EPI-Tuiuti:<input type="text" name="representante" id="representante" style="background: #d0d0d0; border: 0; margin-left: 5px;"/></td>
			</tr>

			<tr>
			    <td colspan="6" bgcolor="#0d1920">&nbsp;</td>
			</tr>
		</table>';

		$nome = ($current_user_meta['first_name'][0]) ? $current_user_meta['first_name'][0] : $_POST['nome'];
		$email = ($current_user->user_email) ? $current_user->user_email : $_POST['email'];
		$empresa = ($current_user_meta['empresa_user'][0]) ? $current_user_meta['empresa_user'][0] : $_POST['empresa'];
		$addr1 = ($current_user_meta['addr1'][0]) ? $current_user_meta['addr1'][0] : $_POST['orca_endereco'];
		$addr2 = ($current_user_meta['addr2'][0]) ? $current_user_meta['addr2'][0] : $_POST['complemento'];
		$city = ($current_user_meta['city'][0]) ? $current_user_meta['city'][0] : $_POST['orca_cidade'];
		$state = ($current_user_meta['estados'][0]) ? $current_user_meta['estados'][0] : $_POST['orca_estado'];
		$country = ($current_user_meta['country'][0]) ? $current_user_meta['country'][0] : $_POST['orca_bairro'];
		$phone = ($current_user_meta['phone1'][0]) ? $current_user_meta['phone1'][0] : $_POST['tel'];
		$cep = ($current_user_meta['zip'][0]) ? $current_user_meta['zip'][0] : $_POST['orca_cep'];

	  	// Campos para SEO
	  	$phpmail->Body .= "Referer URL: ". $_SESSION["referrer"] . "<br />";
	  	$phpmail->Body .= "Referer GA: ". $_COOKIE["__utmz"] . "<br />";
	  	$phpmail->Body .= "Página de Origem: " . $_POST["paginaAtual"] . "<br />";

		if ( !strpos($_SERVER['HTTP_USER_AGENT'], "Googlebot") ){

	    //salva os dados do orcamento
	    // $sql = "INSERT INTO `".$table_prefix."orcamentos`(`nome`                    ,`email`            ,`empresa`                  ,`endereco`              ,`complemento`              ,`cidade`               ,`estado`                ,`pais`                ,`tel`                  ,`cep`               ,`produtos`      ,`data`,`ativo`)
	    //                       VALUES ('".$nome."', '".$email."','".$empresa."','".$addr1."', '".$addr2."','".$city."','".$state."','".$country."','".$phone."','".$cep."','".$orcamento_dados."', NOW() ,1)";
	    //$resultInsert = mysql_query($sql)or die(mysql_error());

	    	$sended = $phpmail->Send();
	    }
	}

	/* Template Name: Resposta Orçamento Rápido */  
	get_header();

	if($sended) {
	    $_SESSION['carrinho'] = array();
	    $_SESSION['hashorcamento'] = '';
	}
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- content wrapper -->
<section class="content_wrapper">

	<!-- content -->
	<section class="content content_orcamento">

		<!-- breadcrumbs -->
		<?php include (TEMPLATEPATH . '/assets/includes/breadcrumbs.php'); ?>
		<!-- breadcrumbs -->

		<!-- barra lateral -->
		<?php get_sidebar('orcamento'); ?>
		<!-- barra lateral -->

		<!-- produtos right -->
		<section class="produtos_right">

			<?php if ($isValid): ?>
			    <?php if ($sended): ?>
			        <h1 class="title">Parabéns seu Orçamento foi Enviado com Sucesso!</h1>
			    <?php else: ?>
			        <h1 class="content-title"></h1>
			        <h1 class="title">Estamos com problemas ao enviar o orçamento, por favor tente mais tarde!</h1>
			    <?php endif; ?>
			<?php else: ?>
			    <p><strong>Selecione o produto desejado no menu de categorias ao lado.</strong></p>
			<?php endif; ?>

			<?php if ($isValid and $sended): ?>
			    <p><strong>Boas Compras!</strong></p>
			    <p>Obrigado! Assim que possível entraremos em contato</p>
			<?php endif; ?>

		</section>
		<!-- produtos right -->

	</section>
	<!-- fim content -->
	
</section>
<!-- fim content wrapper -->

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>