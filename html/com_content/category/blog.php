<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');

JHtml::_('behavior.caption');
?>

<?php if (($this->params->def('show_pagination', 1) == 1  || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
	<div class="pull-right" style="padding-top: 25px;">
		<?php  if ($this->params->def('show_pagination_results', 1)) : ?>
			<p class="counter pull-right"> <?php echo $this->pagination->getPagesCounter(); ?> </p>
		<?php endif; ?>
	</div>
<?php  endif; ?>

<h2>
	<?php 
		echo $this->escape($this->params->get('page_heading')); 
		$bloglayout = $this->escape($this->params->get('page_heading'));
	?>
</h2>


<div class="blog<?php echo $this->pageclass_sfx;?>">
		
		<!-- This bit deals with empty blogs. -->
		<?php if (empty($this->lead_items) && empty($this->link_items) && empty($this->intro_items)) : ?>
			<?php if ($this->params->get('show_no_articles', 1)) : ?>
				<p><?php echo JText::_('COM_CONTENT_NO_ARTICLES'); ?></p>
			<?php endif; ?>
		<?php endif; ?>
		
		<?php $words = 50; // Display words ?>
		
		<!-- This bit deals with the lead articles -->
		<?php $leadingcount = 0; ?>
		
		<?php if (!empty($this->lead_items)) : ?>
		<div class="items-leading clearfix">

			<?php

			foreach ($this->lead_items as $item) { ?>

			<div class="panel panel-default">
					<div class="panel-heading"><span class="pull-right text-muted"><?php echo date('d/m/Y H:i', strtotime($item->publish_up)); ?></span><?php echo '<a href="' . JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid)) . '"><strong>' . $item->title . '</strong></a>'; ?></div>
					<div class="panel-body">
						<?php 

						$intro = implode(' ', array_slice(explode(' ', $item->introtext), 0, $words));
						echo $intro;

						if (str_word_count($item->introtext) > $words) { echo ' ..... <a href="' . JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid)) . '"> read more </a>'; }

						?>
					</div>
			</div>
			<?php $leadingcount++; ?>
			<?php }	?>

		</div><!-- end items-leading -->
		<?php endif; ?>
	
	
	
		<!-- This then deals with the next set of articles. -->
		<?php
		$introcount = (count($this->intro_items));
		$counter = 0;
		?>
		
		
		<?php foreach ($this->intro_items as $item) : ?>
			<?php $rowcount = ((int) $key % (int) $this->columns) + 1; ?>
				<?php if ($rowcount == 1) : ?>
				<?php $row = $counter / $this->columns; ?>
				<?php endif; ?>
				<?php
				$this->item = &$item;
				$article[] = $item;
				?>
				<?php $counter++; ?>
				<?php if (($rowcount == $this->columns) or ($counter == $introcount)) : ?>
			<?php endif; ?>
		<?php endforeach; ?>
		
		
		<?php
			// Set the Layout 
			$layoutcols = (int) $this->columns;
			$layoutrows = ceil($introcount / $layoutcols);
			$layoutcollwidth = (12 / (int) $this->columns);
			
			$displaycols = 0;
			$displaycount = 0;

			$itemno = 1;

			while ($displaycols < $layoutcols) {
				$displayrows = 0;
				echo '<div class="col-sm-' . $layoutcollwidth . '">';
				
				while ($displayrows < $layoutrows and $itemno <= count($article)) { ?>
					<div class="panel panel-default">
						<div class="panel-heading"><span class="pull-right text-muted"><?php echo date('d/m/Y H:i', strtotime($article[$displaycount]->publish_up)); ?></span><?php echo '<a href="' . JRoute::_(ContentHelperRoute::getArticleRoute($article[$displaycount]->slug, $article[$displaycount]->catid)) . '"><strong>' . $article[$displaycount]->title . '</strong></a>'; ?></div>
						<div class="panel-body">
							<?php 

							$intro = implode(' ', array_slice(explode(' ', $article[$displaycount]->introtext), 0, $words));
							echo $intro;

							if (str_word_count($article[$displaycount]->introtext) > $words) { echo ' ..... <a href="' . JRoute::_(ContentHelperRoute::getArticleRoute($article[$displaycount]->slug, $article[$displaycount]->catid)) . '"> read more </a>'; }

							?>
						</div>
					</div>				
				<?php
					$displaycount ++;
					$displayrows ++;
					$itemno ++;	
				}
				
				echo '</div>';
				$displaycols ++;
			}
			
			
			$counter = 0;
		?>
			
		
		
		
		
		
		
		<?php if (!empty($this->link_items)) : ?>
		<div class="items-more">
		<?php echo $this->loadTemplate('links'); ?>
		</div>
		<?php endif; ?>
	
		<?php if (!empty($this->children[$this->category->id])&& $this->maxLevel != 0) : ?>
		<div class="cat-children">
		<?php if ($this->params->get('show_category_heading_title_text', 1) == 1) : ?>
			<h3> <?php echo JTEXT::_('JGLOBAL_SUBCATEGORIES'); ?> </h3>
		<?php endif; ?>
			<?php echo $this->loadTemplate('children'); ?> </div>
		<?php endif; ?>
		
		<div style="clear: both;"></div>

		<?php if (($this->params->def('show_pagination', 1) == 1  || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
		<div class="text-center">
			<?php echo $this->pagination->getPagesLinks(); ?> 
		</div>
		<?php  endif; ?>
	

	</div>

	<div style="clear: both;"></div>