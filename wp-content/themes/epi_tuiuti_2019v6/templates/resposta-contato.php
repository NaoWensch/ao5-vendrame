<?php
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
    $phpmail->FromName = $_POST["nome"];
    $phpmail->AddReplyTo($_POST["email"], $_POST["nome"]);

    // Destinatario
    // Destinatario
    $phpmail->AddAddress('atendimento@epi-tuiuti.com.br', 'EPI Tuiuti');
    $phpmail->AddBCC('tuiutiformularios@gmail.com', 'EPI Tuiuti');
    // $phpmail->AddBCC('antonio@ao5.com.br', 'EPI Tuiuti');
    //$phpmail->AddBCC('teste@epi-tuiuti.com.br', 'EPI Tuiuti');
    // $phpmail->AddBCC('ayres@ao5.com.br', 'EPI Tuiuti');
    // $phpmail->AddBCC('renan@ao5.com.br', 'EPI Tuiuti');

	$phpmail->Subject = "Contato - EPI Tuiuti - " . $_POST["nome"];

    $phpmail->Body .= "Nome: ". $_POST["nome"]."<br />";
    $phpmail->Body .= "E-mail: ". $_POST["email"]."<br />";
    $phpmail->Body .= "Telefone: ". $_POST["tel"]."<br />";
	$phpmail->Body .= "Mensagem: ".nl2br($_POST["msg"])."<br />";
	$phpmail->Body .= "IP: ". $_SERVER["REMOTE_ADDR"] ."<br />";
	// Campos para SEO
    $phpmail->Body .= "Referer URL: ". $_SESSION["referrer"] . "<br />";
    $phpmail->Body .= "Referer GA: ". $_COOKIE["__utmz"] . "<br />";

	if ( $_POST["name"] == '' ){
		// if ( !strpos($_SERVER['HTTP_USER_AGENT'],"Googlebot") && isset($_POST['nome']) && $_POST['nome'] !== '' && $_SERVER["REMOTE_ADDR"] !== "91.207.4.178"){
		if ( !strpos($_SERVER['HTTP_USER_AGENT'],"Googlebot") ) {
	    	// $sql = "INSERT INTO `".$table_prefix."contato`(`nome`				,`email`		,`telefone`,`empresa`			,`mensagem`,`data`)
						// 						  VALUES ('".$_POST["nome"]."', '".$_POST["email"]."','".$_POST["tel"]."','".$_POST["empresa"]."', '".$_POST["msg"]."', NOW())";
      //       $resultInsert = mysql_query($sql)or die(mysql_error());
            $send = $phpmail->Send();
		}
	}

	/* Template Name: Resposta Contato */  
	get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- content wrapper -->
<section class="content_wrapper">

	<!-- content -->
	<section class="content">

		<!-- breadcrumbs -->
		<?php include (TEMPLATEPATH . '/assets/includes/breadcrumbs.php'); ?>
		<!-- breadcrumbs -->

		<h1 class="title full"><?php echo get_the_title(21) ?></h1>

		<?php $the_query = new WP_Query( 'page_id=21' ); ?>
		<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

		    <?php the_content(); ?>

		<?php endwhile; wp_reset_query(); ?>

		<p><strong>Obrigado! em breve entraremos em contato.</strong></p>

		<!-- contato info -->
		<div class="contato_info_wrapper">
			<div class="contato_info">
				<span><i class="fas fa-clock"></i></span>
				<p>Horário de funcionamento:<br>Seg à Sex 8h às 12h - 13h às 17h45</p>
			</div>

			<div class="contato_info">
				<span><i class="fas fa-phone"></i></span>
				<p>Telefone:<br>+55 11 2942-9988</p>
			</div>

			<div class="contato_info">
				<span><i class="fas fa-envelope"></i></span>
				<p>E-mail de Atendimento:<br><a href="mailto:atendimento@epi-tuiuti.com.br" target="_blank">atendimento@epi-tuiuti.com.br</a></p>
			</div>

			<div class="contato_info">
				<span><i class="fas fa-map-marker-alt"></i></span>
				<p>Rua Maria Prestes Maia, 477 Vila Guilherme, São Paulo - SP Cep 02047-000</p>
			</div>
		</div>
		<!-- contato info -->
		
	</section>
	<!-- fim content -->

	<!-- contato baixo -->
	<?php include (TEMPLATEPATH . '/assets/includes/contato_baixo.php'); ?>
	<!-- contato baixo -->
	
</section>
<!-- fim content wrapper -->

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>