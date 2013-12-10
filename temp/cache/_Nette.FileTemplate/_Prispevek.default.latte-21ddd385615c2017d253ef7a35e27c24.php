<?php //netteCache[01]000407a:2:{s:4:"time";s:21:"0.00707400 1386644555";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:85:"C:\Users\hp\Skola\3_tretak\IIS\projekt\pharmacy\app\templates\Prispevek\default.latte";i:2;i:1386644553;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: C:\Users\hp\Skola\3_tretak\IIS\projekt\pharmacy\app\templates\Prispevek\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'qorwej1v42')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbee1926b9ec_content')) { function _lbee1926b9ec_content($_l, $_args) { extract($_args)
?><body>

<h1>Příspěvky</h1>


<table align=center>
    <tr>
        <th>Lék</th>
        <th>Pojišťovna</th>
        <th>Výše příspěvku</th>
        <th>Platnost OD</th>
        <th>Platnost D0</th>
    </tr>
<?php $iterations = 0; foreach ($prispevky as $Prispevek): ?>
            <tr align=center>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($Prispevek->Lek->nazev, ENT_NOQUOTES) ?></td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($Prispevek->Pojistovna->nazev, ENT_NOQUOTES) ?></td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($Prispevek->vyse_prispevku, ENT_NOQUOTES) ?> Kč</td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($Prispevek->platnost_od, '%d.%m.%Y'), ENT_NOQUOTES) ?></td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($Prispevek->platnost_do, '%d.%m.%Y'), ENT_NOQUOTES) ?></td>
                <td class="edit"><a class="button" href="<?php echo htmlSpecialChars($_control->link("Prispevek:edit", array($Prispevek->id))) ?>
">Upravit</a> 
                    <a class="button" onClick="return confirm('Opravdu smazat prispevek ?')"  href="<?php echo htmlSpecialChars($_control->link("Prispevek:delete", array($Prispevek->id))) ?>
">Smazat</a>
                </td>
            </tr> 
<?php $iterations++; endforeach ?>
</table>

</br>

<div align=center>
<a class="button" href="<?php echo htmlSpecialChars($_control->link("Prispevek:create")) ?>
">Vložit nový</a>
</div>

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