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

	// $arquivo = $_FILES["file_trabalhe"];

    $phpmail->IsHTML(true);
	$phpmail->From = "envia@epi-tuiuti.com.br";
    $phpmail->FromName = $_POST["nome-trabalhe"];
    $phpmail->AddReplyTo($_POST["email-trabalhe"], $_POST["nome-trabalhe"]);

	// Recupera o nome do arquivo
	// $arquivo_nome = $arquivo['name'];
	// Recupera o caminho temporario do arquivo no servidor
	// $arquivo_caminho = $arquivo['tmp_name'];
	$target_path = "/home/storage/9/01/45/epi-tuiuti/public_html/wp-content/uploads/anexos/";
	$target_path = $target_path . basename( $_FILES['file_trabalhe']['name']);
	move_uploaded_file($_FILES['file_trabalhe']['tmp_name'], $target_path);

    // Destinatario
    $phpmail->AddAddress('atendimento@epi-tuiuti.com.br', 'EPI Tuiuti');
    $phpmail->AddBCC('tuiutiformularios@gmail.com', 'EPI Tuiuti');
    // $phpmail->AddBCC('antonio@ao5.com.br', 'EPI Tuiuti');
    //$phpmail->AddBCC('teste@epi-tuiuti.com.br', 'EPI Tuiuti');
    //$phpmail->AddBCC('ayres@ao5.com.br', 'EPI Tuiuti');
    // $phpmail->AddBCC('renan@ao5.com.br', 'EPI Tuiuti');

	$phpmail->Subject = "Trabalhe Conosco - TUIUTI - ". $_POST["nome-trabalhe"];
    $phpmail->Body .= "Nome: ". $_POST["nome-trabalhe"]."<br />";
    $phpmail->Body .= "E-mail: ". $_POST["email-trabalhe"]."<br />";
    $phpmail->Body .= "Telefone: ". $_POST["tel-trabalhe"]."<br />";
    $phpmail->Body .= "Área de Interesse: ". $_POST["area-interese-trabalhe"]."<br />";
	$phpmail->Body .= "Mensagem: ".nl2br($_POST["msg-trabalhe"])."<br />";
	$phpmail->Body .= "IP: ". $_SERVER["REMOTE_ADDR"] ."<br />";
	// Campos para SEO
    $phpmail->Body .= "Referer URL: ". $_SESSION["referrer"] . "<br />";
    $phpmail->Body .= "Referer GA: ". $_COOKIE["__utmz"] . "<br />";
    
	$phpmail->AddAttachment( $target_path );

	if ( !strpos($_SERVER['HTTP_USER_AGENT'],"Googlebot") ){
    	$send = $phpmail->Send();
    }

	/* Template Name: Resposta Trabalhe Conosco */  
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

		<h1 class="title full"><?php echo get_the_title(23) ?></h1>

		<?php $the_query = new WP_Query( 'page_id=23' ); ?>
		<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

		    <?php the_content(); ?>

		<?php endwhile; wp_reset_query(); ?>

		<p><strong>Obrigado! assim que possível entraremos em contato.</strong></p>

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