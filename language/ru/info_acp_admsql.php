<?php
/**
*
* info_acp_admdelnotifications [Russian]
*
* @package phpBB Extension - Execute SQL
* @copyright (c) 2016 Sheer
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'ACP_SQL_EXECUTE'				=> 'Выполнение SQL-запроса',
	'ACP_ACP_SQL_EXECUTE_EXPLAIN'	=> 'Выполнение SQL-запроса может затронуть данные. <strong>БУДЬТЕ ОСТОРОЖНЫ!</strong><br /><span style="color:#BC2A4D">Автор расширения не несет никакой ответственности в случае повреждения или утраты данных.</span>',

	'ERROR_QUERY'					=> 'Запрос содержит ошибку!',

	'NO_RESULTS'					=> 'Нет результатов',
	'NO_SQL_QUERY'					=> 'Вы должны ввести SQL-запрос',

	'QUERY_RESULT'					=> 'Результаты запроса',

	'SHOW_RESULTS'					=> 'Отобразить результаты',
	'SQL_QUERY_EXPLAIN'				=> 'Введите SQL-запрос, который вы желаете выполнить.<br />Если в запросе вы укажете префикс <b>phpbb_</b>, но используете другой, то он будет заменен на ваш префикс таблиц базы данных.<br />Если установлен флажок &laquo;<u>Отобразить результаты</u>&raquo;, инструмент покажет результаты <em>(если таковые имеются)</em> выполнения запроса.',

	'SQL_QUERY_LEGEND'				=> 'SQL-запрос',
	'SQL_QUERY_SUCCESS'				=> 'SQL-запрос успешно выполнен.',
));
