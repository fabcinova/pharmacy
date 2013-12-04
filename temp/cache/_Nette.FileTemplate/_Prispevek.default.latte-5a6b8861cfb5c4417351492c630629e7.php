<?php //netteCache[01]000383a:2:{s:4:"time";s:21:"0.18486500 1386114869";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:61:"D:\git_projects\lekarna\app\templates\Prispevek\default.latte";i:2;i:1386114864;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: D:\git_projects\lekarna\app\templates\Prispevek\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'zvtj6adnra')
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
<h1>Prispevky</h1>

<a href="<?php echo htmlSpecialChars($_control->link("Prispevek:create")) ?>">Vložit nový</a>

<table>
    <tr>
        <th>Lék</th>
        <th>Pojišťovna</th>
        <th>Výše příspěvku</th>
        <th>Platnost OD</th>
        <th>Platnost D0</th>
    </tr>
<?php $iterations = 0; foreach ($prispevky as $Prispevek): ?>
            <tr>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($Prispevek->lek, ENT_NOQUOTES) ?></td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($Prispevek->pojistovna, ENT_NOQUOTES) ?></td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($Prispevek->vyse_prispevku, ENT_NOQUOTES) ?></td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($Prispevek->platnost_od, ENT_NOQUOTES) ?></td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($Prispevek->platnost_do, ENT_NOQUOTES) ?></td>
                <td><a href="<?php echo htmlSpecialChars($_control->link("Prispevek:edit", array($Prispevek->id))) ?>
">Upravit</a></td>
                <td><a onClick="return confirm('Opravdu smazat prispevek ?')"  href="<?php echo htmlSpecialChars($_control->link("Prispevek:delete", array($Prispevek->id))) ?>
">Smazat</a></td>
            </tr> 
<?php $iterations++; endforeach ?>
</table>