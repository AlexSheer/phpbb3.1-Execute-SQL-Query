<?php
/**
*
* @package phpBB Extension - Execute SQL
* @copyright (c) 2016 Sheer
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace sheer\admsql\acp;

class main_info
{
	function module()
	{
		return array(
			'filename'	=> '\sheer\admsql\acp\main_module',
			'version'	=> '1.0.0',
			'title' => 'ACP_SQL_EXECUTE',
			'modes'		=> array(
				'find'	=> array(
					'title' => 'ACP_SQL_EXECUTE',
					'auth' => 'ext_sheer/admsql && acl_a_board',
					'cat' => array('ACP_CAT_DATABASE')
				),
			),
		);
	}
}
