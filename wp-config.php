<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'db_vendrame' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'bE+M(6=pMqld]7n.~+gtliqVzb;u$g&(]}Xrjj2{4s[Pyx;L&O7j0_:rO-a(}UC/' );
define( 'SECURE_AUTH_KEY',  'jGyMME.Ma[B=!c~J*bN[-zPKNv+t2bjCW!8$F/MQ=jwf.*~$Bfp2M6F8z@G<UQjc' );
define( 'LOGGED_IN_KEY',    'IS_i#?(<_Q:5=INhwrs^S.@oRs/[plNdHWxUq-B[KvI|SQMj7>|X8+v2q|PfxKgZ' );
define( 'NONCE_KEY',        'tVX4( a[k*=MsL)TsNyD60$Izj1h|Pa,WVN~3;d:bcX.Lp$XqY[?1LrQz}Bc`mWP' );
define( 'AUTH_SALT',        'X3w~?d%o@{GwkTyH=.sqh Tn|#5s<x#|NbvOr.0?L<ueK`  JPn2[Su4,^OG<P-=' );
define( 'SECURE_AUTH_SALT', 'FX Hz5k5{;wB~zQvsJpcUR*Y[>]qG*Xx,L`FNQ-9qH3@d+a~A,q+fzhzg bQl)8E' );
define( 'LOGGED_IN_SALT',   '@p.:EBTd:XEC(+^|&A_IV~!vn^n#UhVp%CCut]|CpFt@Y}+R&hWp 1fkgf0)o3LR' );
define( 'NONCE_SALT',       '64`e:XXxzyrhx+_vG9AlFEiry4hx8=&e!hhz7Oof6Li),{My~gQr,8(Ax#x)|7y!' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
