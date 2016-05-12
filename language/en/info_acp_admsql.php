<?php
/**
*
* info_acp_admdelnotifications [English]
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
	'ACP_SQL_EXECUTE'				=> 'Execute SQL Query',
	'ACP_ACP_SQL_EXECUTE_EXPLAIN'	=> 'The execution of SQL Query can manipulate data. <strong>TAKE CARE!</strong><br /><span style="color:#BC2A4D">The author of this extension don\'t accept any liability in case damage or loss of data.</span>',

	'ERROR_QUERY'					=> 'Query containing the error',

	'NO_RESULTS'					=> 'No Results',
	'NO_SQL_QUERY'					=> 'You must enter a query to run.',

	'QUERY_RESULT'					=> 'Query results',

	'SHOW_RESULTS'					=> 'Show Results',
	'SQL_QUERY'						=> 'Run SQL Query',
	'SQL_QUERY_EXPLAIN'				=> 'Enter the SQL query you wish to run. The tool will substitute "phpbb_" with your table prefix.<br />If the "Show Results" checkbox is checked the tool will display the results <em>(if any)</em> of the query.',

	'SQL_QUERY_LEGEND'				=> 'SQL Query',
	'SQL_QUERY_SUCCESS'				=> 'The SQL query has been run successfully.',
));
