<?php //netteCache[01]000401a:2:{s:4:"time";s:21:"0.95705900 1386528122";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:79:"C:\Users\hp\Skola\3_tretak\IIS\projekt\pharmacy\app\templates\Lek\default.latte";i:2;i:1386528087;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: C:\Users\hp\Skola\3_tretak\IIS\projekt\pharmacy\app\templates\Lek\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'v17u2rryv3')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb637f8ce5ba_content')) { function _lb637f8ce5ba_content($_l, $_args) { extract($_args)
?><h1>Leky</h1>

<a href="<?php echo htmlSpecialChars($_control->link("Lek:create")) ?>">Vložit nový</a>

<table>
    <tr>
        <th>Název</th>
        <th>Účinná látka</th>
        <th>Předpis</th>
    </tr>
<?php $iterations = 0; foreach ($leky as $Lek): ?>
            <tr>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($Lek->nazev, ENT_NOQUOTES) ?></td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($Lek->ucinna_latka, ENT_NOQUOTES) ?></td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($Lek->predpis ? "ano" : "-", ENT_NOQUOTES) ?></td>
                <td><a href="<?php echo htmlSpecialChars($_control->link("Lek:edit", array($Lek->ID))) ?>
">Upravit</a></td>
                <td><a onClick="return confirm('Opravdu smazat <?php echo htmlSpecialChars(Nette\Templating\Helpers::escapeJs($Lek->nazev)) ?>
 ?')"  href="<?php echo htmlSpecialChars($_control->link("Lek:delete", array($Lek->ID))) ?>
">Smazat</a></td>
            </tr> 
<?php $iterations++; endforeach ?>
</table><?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 