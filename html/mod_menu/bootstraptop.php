<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
?>
<?php // The menu class is deprecated. Use nav instead. ?>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		
		<a class="navbar-brand visible-xs" href="#">Menu</a>
	</div>
	
	<div class="collapse navbar-collapse navbar-ex1-collapse">
	<div class="container">
		<ul class="nav navbar-nav container">
			
			<?php
			foreach ($list as $i => &$item) :
				$class = 'item-'.$item->id;
				if ($item->id == $active_id)
				{
					$class .= ' current';
				}

				if (in_array($item->id, $path))
				{
					$class .= '';
				}
				elseif ($item->type == 'alias')
				{
					$aliasToId = $item->params->get('aliasoptions');
					if (count($path) > 0 && $aliasToId == $path[count($path) - 1])
					{
						$class .= '';
					}
					elseif (in_array($aliasToId, $path))
					{
						$class .= ' alias-parent-active';
					}
				}
			
				if ($item->type == 'separator')
				{
					$class .= ' divider';
				}
			
				if ($item->deeper)
				{
					$class .= ' deeper';
				}
			
				if ($item->parent)
				{
					$class .= ' dropdown';
				}
			
				if (!empty($class))
				{
					$class = ' class="'.trim($class) .'"';
				}
				
				$flink = $item->flink;
				$flink = JFilterOutput::ampReplace(htmlspecialchars($flink));
				
				$linktype = $item->title;
				
				if(strpos($class, 'dropdown') !== false) {
					$dropdown = 'class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"';
				} else {
					$dropdown = '';
				}
				
				echo '<li ' . $class . '><a href="' . $flink . '" ' . $dropdown . '>' . $linktype . '</a> ';

				// The next item is deeper.
				if ($item->deeper)
				{
					echo '<ul class="dropdown-menu">';
				}
				// The next item is shallower.
				elseif ($item->shallower)
				{
					echo '</li>';
					echo str_repeat('</ul></li>', $item->level_diff);
				}
				// The next item is on the same level.
				else {
					echo '</li>';
				}
			endforeach;
			?>
		</ul>
	</div>
	</div>
</nav>
