<?php //netteCache[01]000379a:2:{s:4:"time";s:21:"0.73345300 1386698341";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:57:"D:\git_projects\lekarna\app\templates\Nakup\default.latte";i:2;i:1386698308;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: D:\git_projects\lekarna\app\templates\Nakup\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'fazzbqzu9w')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb3bd8730732_content')) { function _lb3bd8730732_content($_l, $_args) { extract($_args)
?><body>

<h1>Nákupy</h1>

<table align=center>
    <tr>
        <th>Datum</th>
        <th colspan="3">Pobočka</th>
        <th>Lék</th>
        <th class="edit"></th>
    </tr>
<?php $iterations = 0; foreach ($nakupy as $Nakup): ?>
            <tr align=center>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($Nakup->datum, '%d.%m.%Y'), ENT_NOQUOTES) ?></td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($Nakup->Pobocka->ulice, ENT_NOQUOTES) ?></td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($Nakup->Pobocka->cislo_popisne, ENT_NOQUOTES) ?></td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($Nakup->Pobocka->mesto, ENT_NOQUOTES) ?></td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($Nakup->Lek->nazev, ENT_NOQUOTES) ?></td>

                <td class="edit">
                    <a class="button" href="<?php echo htmlSpecialChars($_control->link("Nakup:edit", array($Nakup->id))) ?>
">Upravit</a>
                    <a class="button" onClick="return confirm('Opravdu smazat nákup ?')"  href="<?php echo htmlSpecialChars($_control->link("Nakup:delete", array($Nakup->id))) ?>
">Smazat</a>
                </td>
            </tr> 
<?php $iterations++; endforeach ?>
</table>

</br>
<?php if (($user->isInRole("admin")) || ($user->isInRole("lekarnik"))): ?>
<div align=center>
<a class="button" href="<?php echo htmlSpecialChars($_control->link("Nakup:create")) ?>
">Vložit nový</a>
</div>
<?php endif ?>

</body><?php
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