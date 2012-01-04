<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'maisonch');

/** Имя пользователя MySQL */
define('DB_USER', 'u_maisonch');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'GeUhWxRe');

/** Имя сервера MySQL */
define('DB_HOST', 'nvh73db.mirohost.net');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ym2#v*r &/m4?-KN=/c{dn|$pd-1[q0:Mw8(kL?VP!8M4hd@|u pjngV<Os4ttvm');
define('SECURE_AUTH_KEY',  'UU&Hsfyjp&b<:=kUF]zNhnz:Iq.jQE] Q;+SR1=@tq4]St2kf/vsk/fg+dM8},]j');
define('LOGGED_IN_KEY',    'c`EsG$>NnbFb.fYd_hJv#g|y-.}ha91`/MEqDi<qs)6Gh!nP3S/3ggx~:+wi9`Dc');
define('NONCE_KEY',        'OdF+#HX-1&AS-pmW2&bE<f^-dFja_aTs[svHB9d+u0xjZ~D)C.wq+vdbW}8B-DoE');
define('AUTH_SALT',        'S4+]}MGoOTk^E2I:Z4!3Fx++4{XWY5n$khqO/5e&%Y_oa7j`( +3kcX7|l^y|l74');
define('SECURE_AUTH_SALT', 'pL+Quz%<wM.E$+2xZDfxa8t%)K:nwKFZYFrG[b0o .OU9C0Q_l&BYI<%:I+CB:.a');
define('LOGGED_IN_SALT',   '01Us9]s|K`[N%*3?b)gYy=JuwN}q:A,8HaV-#0xakn`0@nE@>gtt}llDq=}Zxd|0');
define('NONCE_SALT',       'Kmz.Z+|S.5[|E7#%w_{w{~B!7XIBN4ghCR8R5DCvdEQG@4(i]ijSEwXOW8@,9Xm8');



/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Язык локализации WordPress, по умолчанию английский.
 *
 * Измените этот параметр, чтобы настроить локализацию. Соответствующий MO-файл
 * для выбранного языка должен быть установлен в wp-content/languages. Например,
 * чтобы включить поддержку русского языка, скопируйте ru_RU.mo в wp-content/languages
 * и присвойте WPLANG значение 'ru_RU'.
 */
define('WPLANG', 'ru_RU');

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
