<?php //netteCache[01]000383a:2:{s:4:"time";s:21:"0.90795400 1386426266";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:61:"D:\git_projects\lekarna\app\templates\Prispevek\default.latte";i:2;i:1386426263;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: D:\git_projects\lekarna\app\templates\Prispevek\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'di4t7iu7sn')
;
// prolog Nette\Latte\Macros\UIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
$iterations = 0; foreach ($flashes as $flash): ?>
<div class="flash <?php echo htmlSpecialChars($flash->type) ?>"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; endforeach ?>

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
                <td><?php echo Nette\Templating\Helpers::escapeHtml($Prispevek->Lek->nazev, ENT_NOQUOTES) ?></td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($Prispevek->Pojistovna->nazev, ENT_NOQUOTES) ?></td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($Prispevek->vyse_prispevku, ENT_NOQUOTES) ?> Kč</td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($Prispevek->platnost_od, '%d.%m.%Y'), ENT_NOQUOTES) ?></td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($Prispevek->platnost_do, '%d.%m.%Y'), ENT_NOQUOTES) ?></td>
                <td><a href="<?php echo htmlSpecialChars($_control->link("Prispevek:edit", array($Prispevek->id))) ?>
">Upravit</a></td>
                <td><a onClick="return confirm('Opravdu smazat prispevek ?')"  href="<?php echo htmlSpecialChars($_control->link("Prispevek:delete", array($Prispevek->id))) ?>
">Smazat</a></td>
            </tr> 
<?php $iterations++; endforeach ?>
</table>