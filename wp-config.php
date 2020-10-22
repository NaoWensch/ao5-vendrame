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
define( 'AUTH_KEY',         '^N?bO3Ts^2K<Ty_Q*jL[DGJSXP$Iw?@lumsrt@V:kS*@c$V2P+xaLz_;zpU;yot5' );
define( 'SECURE_AUTH_KEY',  ',Ws*hk5TViHmas_xq.H+yKRD)T3rQzqhd)B;5~2d` w_e$8*GfDd*gf^N%6~_t@c' );
define( 'LOGGED_IN_KEY',    'mpbwh{}Co#N-ox< vB}Ua|lF&7zT;z=--]@Yc#Ant#DU=<E62vW`@W%s,lFFf~l8' );
define( 'NONCE_KEY',        '(eroC07Dez9c@m@UPh,5iboUL ^5,9yYlr:-V1#F@Q{#mB_kl)lp0DG,-0@L.k(3' );
define( 'AUTH_SALT',        '<tvW[SBe<^kf~*_s@xvoi__<h-&C~b7pY{ >p[dyler91XYoe1QPP9[?v5wmO7O9' );
define( 'SECURE_AUTH_SALT', 'v<~@$EWb^vY2{7|csHl!~T%AX|zFb<kb[db:K{dop.;$aibTMrFc,.||6 C.lZ=d' );
define( 'LOGGED_IN_SALT',   '33 ]%.C-|[e3Rg#tpv&(EDO~/yLv:32dW@TuH>ifpiU,s$&rJ1=<l80Vv[zI+zmW' );
define( 'NONCE_SALT',       'R2Io7@ebBrgQ@TvX3~Y2~(?mC3X)ccr|MLpTvX_Wy066utsz|k3PQA)x*]C})eq2' );

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
