<?php //netteCache[01]000377a:2:{s:4:"time";s:21:"0.24490500 1386003877";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:55:"D:\git_projects\lekarna\app\templates\Lek\default.latte";i:2;i:1386003873;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: D:\git_projects\lekarna\app\templates\Lek\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'vwljbxm5va')
;
// prolog Nette\Latte\Macros\UIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
<h1>Leky</h1>

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
</table>