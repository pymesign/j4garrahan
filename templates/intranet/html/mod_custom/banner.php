<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   (C) 2020 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<div class="mod-custom <?php echo $params->get('moduleclass_sfx'); ?> d-flex align-items-center" <?php if ($params->get('backgroundimage')) : ?> style="background-image:url(<?php echo $params->get('backgroundimage'); ?>);" <?php endif; ?>>
	<div class="container">
		<?php echo $module->content; ?>
	</div>
</div>