<?php
/**
*
* @package phpBB Extension - Execute SQL
* @copyright (c) 2016 Sheer
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace sheer\admsql\acp;

class main_module
{
	var $u_action;

	function main($id, $mode)
	{
		global $db, $user, $auth, $template, $cache, $phpbb_container, $table_prefix, $dbms;
		global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;
		global $request;

		$this->tpl_name = 'acp_admsql_body';
		$this->page_title = $user->lang('ACP_SQL_EXECUTE');

		$error = array();
		$message = '';

		$submit = $request->variable('submit', false, false, \phpbb\request\request_interface::POST);
		$show_results = $request->variable('show_results', false);

		$sql_query = $sql_query_text = $request->variable('sql_query', '', true);

		add_form_key('sheer/admsql');
		if ($submit)
		{
			if (!check_form_key('sheer/admsql'))
			{
				trigger_error('FORM_INVALID');
			}

			$sql_query = htmlspecialchars_decode($sql_query);	// Need special chars like < and > see bug #59755

			// Replace phpbb_ with the correct table prefix.  Do the double replace otherwise you can have issues with prefixes like phpbb_3
			$sql_query = str_replace('phpbb_', $table_prefix, str_replace($table_prefix, 'phpbb_', $sql_query));
			if (!$sql_query)
			{
				$error[] = $user->lang['NO_SQL_QUERY'];
			}

			if ($submit && !sizeof($error))
			{
				if (!function_exists('split_sql_file'))
				{
					include($phpbb_root_path . 'includes/functions_install.' . $phpEx);
				}

				$dbms=  str_replace('phpbb\\db\\driver\\', '', $dbms);
				$dbmd = get_available_dbms($dbms);

				$delimiter = $dbmd[$dbms]['DELIM'];
				phpbb_remove_comments($sql_query);
				$sql_query = split_sql_file($sql_query, $delimiter);

				// Return on error
				$db->sql_return_on_error(true);

				foreach ($sql_query as $sql)
				{
					// Run the query and make sure that nothing went wrong
					$result = $db->sql_query($sql);
					if ($db->get_sql_error_triggered())
					{
						// Write the error result to the cache and return the user back
						// to the main page
						$error[] = $this->_format_sql_error($sql);
						continue;
					}

					if ($show_results)
					{
						// Display the query
						$template->assign_block_vars('queries', array('QUERY' => $sql));

						$cnt = 0;
						while ($row = $db->sql_fetchrow($result))
						{
							if ($cnt == 0)
							{
								// Assign the return fields
								foreach(array_keys($row) as $key)
								{
									$template->assign_block_vars('queries.headings', array('FIELD_NAME' => $key));
								}
							}

							// Set row class
							$template->assign_block_vars('queries.resultdata', array('ROWSTYLE' => ($cnt % 2 == 0) ? 1 : 2));

							// Output resultset
							foreach ($row as $value)
							{
								$template->assign_block_vars('queries.resultdata.resultdatafields', array('VALUE' => $value));
							}

							$cnt++;
						}
					}
					$db->sql_freeresult($result);
				}
				$message = $user->lang['SQL_QUERY_SUCCESS']. adm_back_link($this->u_action);
				// Purge the cache
				$cache->purge();
			}
		}

		$template->assign_vars(array(
			'MESSAGE_TEXT'		=> $message,
			'S_ERROR'			=> (sizeof($error)) ? implode('<br />', $error) : '',
			'S_SHOW_RESULTS'	=> $show_results,
			'SQL_QUERY'			=> $sql_query_text,
			'U_ACTION'			=> $this->u_action,
			)
		);
	}

	function _format_sql_error($sql)
	{
		global $db, $user;

		$error	= $db->sql_error($sql);
		$msg	= 'SQL ERROR [ ' . $db->get_sql_layer() . ' ]<br /><br />' . $error['message'] . ' [' . $error['code'] . ']';

		// Create some html to also embed the query
		$return = $msg . '<dl class="codebox querybox">
			<dt>' . $user->lang('ERROR_QUERY') . "</dt>
			<dd><code>{$sql}</code></dd>
		</dl>";

		return $return;
	}
}
