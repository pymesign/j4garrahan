<?php

/**
 * @package     Joomla.Site
 * @subpackage  Templates.garrahan
 *
 * @copyright   (C) 2020 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\Utilities\ArrayHelper;

/* agregamos estas tres lineas para poder incorporar el background */
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;

$module  = $displayData['module'];
$params  = $displayData['params'];
$attribs = $displayData['attribs'];

if ($module->content === null || $module->content === '') {
	return;
}

$moduleTag              = $params->get('module_tag', 'div');
$moduleAttribs          = [];
$moduleAttribs['class'] = $module->position . ' card ' . htmlspecialchars($params->get('moduleclass_sfx'), ENT_QUOTES, 'UTF-8');
$headerTag              = htmlspecialchars($params->get('header_tag', 'h3'), ENT_QUOTES, 'UTF-8');
$headerClass            = htmlspecialchars($params->get('header_class', ''), ENT_QUOTES, 'UTF-8');
$headerAttribs          = [];
$headerAttribs['class'] = $headerClass;

// Only output a header class if it is not card-title
if ($headerClass !== 'card-title') :
	$headerAttribs['class'] = 'card-header ' . $headerClass;
endif;

// Only add aria if the moduleTag is not a div
if ($moduleTag !== 'div') {
	if ($module->showtitle) :
		$moduleAttribs['aria-labelledby'] = 'mod-' . $module->id;
		$headerAttribs['id']              = 'mod-' . $module->id;
	else :
		$moduleAttribs['aria-label'] = $module->title;
	endif;
}
$modId = 'mod-custom' . $module->id;
$header = '<' . $headerTag . ' ' . ArrayHelper::toString($headerAttribs) . '>' . $module->title . '</' . $headerTag . '>';

/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
//$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
//$wa->addInlineStyle('#' . $modId . '.card-body {background-image: url("' . Uri::root(true) . '/' . HTMLHelper::_('cleanImageURL', $params->get('backgroundimage'))->url . '");}');

?>
<<?php echo $moduleTag; ?> <?php echo ArrayHelper::toString($moduleAttribs); ?>>
	<div id="<?php echo $modId; ?>" class="card-body">
		<div class="image text-center"><img src="<?php echo Uri::root(true) . '/' . HTMLHelper::_('cleanImageURL', $params->get('backgroundimage'))->url ?>" alt="Imagen" /></div>
		<?php if ($module->showtitle && $headerClass !== 'card-title') : ?>
			<?php echo $header; ?>
		<?php endif; ?>
		<?php if ($module->showtitle && $headerClass === 'card-title') : ?>
			<?php echo $header; ?>
		<?php endif; ?>
		<?php echo $module->content; ?>
	</div>
</<?php echo $moduleTag; ?>>