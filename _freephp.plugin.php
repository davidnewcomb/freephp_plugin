<?php
/**
 *
 * This file implements the FreePHP plugin for {@link http://b2evolution.net/}.
 *
 *
 * @copyright (c) 2000-2018 BigSoft Limited - {@link http://www.bigsoft.co.uk/}.
 *
 * @license The MIT License - https://opensource.org/licenses/MIT
 *
 * @package plugins
 *
 * @author David Newcomb
 *
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );


/**
 * FreePHP Plugin
 *
 * Like Free HTML but runs the PHP
 *
 * @package plugins
 */
class freephp_plugin extends Plugin
{
	var $name = 'Free PHP';
	var $code = 'freephp';
	var $priority = 50;
	var $version = '1.0.0';
	var $author = 'David Newcomb - BigSoft Limited (http://www.bigsoft.co.uk/)';
	var $help_url = 'http://www.bigsoft.co.uk/projects/b2evolution_plugin_freephp/';
	var $group = 'widget';
	var $subgroup = 'free_content';


	/**
	 * Init
	 *
	 * This gets called after a plugin has been registered/instantiated.
	 */
	function PluginInit( & $params )
	{
		$this->short_desc = $this->T_('Free PHP. Like Free HTML but executing PHP.');
		$this->long_desc = $this->T_('Free PHP. Like Free HTML but with PHP. Be careful what you add!');
	}


	/**
	 * Define settings that the plugin uses/provides.
	 */
	function get_widget_param_definitions( $params )
	{
		$r = array(
			'title' => array(
				'label' => T_('Block title'),
				'note' => T_('Title to display in your skin.'),
				'size' => 60,
				'defaultvalue' => '',
			),
			'freephp_contents' => array(
				'label' => T_('PHP source code'),
				'note' => T_('PHP source code to be executed'),
				'type' => 'html_textarea',
				'rows' => 10,
				'defaultvalue' => ''
			)
		);
		return $r;
	}

	/**
	 * Event handler: SkinTag (widget)
	 *
	 * @param array Associative array of parameters.
	 * @return boolean did we display?
	 */
	function SkinTag( & $params )
	{
		global $Plugins;

		if( $Plugins->trigger_event_first_true('CacheIsCollectingContent') )
		{ // We're not generating static pages nor is a caching plugin collecting the content, so we can display this block
			return false;
		}

		echo $params['block_start'];

		if( !empty($params['title']) )
		{	// We want to display a title for the widget block:
			echo $params['block_title_start'];

			// Display a block title as simple text:
			echo $params['title'];

			echo $params['block_title_end'];
		}

		echo $params['block_body_start'];

		echo eval($params['freephp_contents']);

		echo $params['block_body_end'];

		echo $params['block_end'];

		return true;
	}


}
?>
