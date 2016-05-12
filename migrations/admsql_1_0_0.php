<?php
/**
*
* @package phpBB Extension - Execute SQL
* @copyright (c) 2016 Sheer
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/
namespace sheer\admsql\migrations;

class admsql_1_0_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return;
	}

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\dev');
	}

	public function update_schema()
	{
		return array(
		);
	}

	public function revert_schema()
	{
		return array(
		);
	}

	public function update_data()
	{
		return array(
			// Current version
			array('config.add', array('admsql_version', '1.0.0')),
			// ACP
			array('module.add', array('acp', 'ACP_CAT_DATABASE', 'ACP_SQL_EXECUTE')),
			array('module.add', array('acp', 'ACP_SQL_EXECUTE', array(
				'module_basename'	=> '\sheer\admsql\acp\main_module',
				'module_langname'	=> 'ACP_SQL_EXECUTE',
				'module_mode'		=> 'manage',
				'module_auth'		=> 'ext_sheer/admsql && acl_a_board',
				'module_enabled'	=> true,
			))),
		);
	}
}
