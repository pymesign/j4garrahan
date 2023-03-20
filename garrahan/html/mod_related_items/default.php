<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_related_items
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

?>
<div class="view-featured com-content-category-blog__items blog-items columns-4">
	<?php foreach ($list as $item) : ?>

		<?php //traemos las imágenes
		$images  = json_decode($item->images); ?>

		<div class="com-content-category-blog__item blog-item">
			<?php echo '<figure class="item-image"><a href="' . $item->link . '"><img class="img-fluid" src="' . $images->image_intro . '" /></a></figure>'; ?>
			<div class="item-content">
				<div class="page-header">
					<h2 class="item-title">
						<a href="<?php echo $item->route; ?>">
							<?php echo $item->title; ?></a>
					</h2>
					<?php if ($showDate) echo HTMLHelper::_('date', $item->created, Text::_('DATE_FORMAT_LC4')) . ' - '; ?>
				</div>
				<div class="content-wrap">
					<?php //echo $this->item->introtext;
					$string = preg_replace('/\s+?(\S+)?$/', '', substr($item->introtext, 0, 300));
					echo '<p>' . strip_tags($string) . '...</p>';
					?>
					<p class="readmore"><a class="link-primary text-uppercase text-decoration-none" href="<?php echo $item->route; ?>">Leer más</a></p>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>