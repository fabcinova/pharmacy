<?php //netteCache[01]000381a:2:{s:4:"time";s:21:"0.29909000 1386107335";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:59:"D:\git_projects\lekarna\app\templates\Pobocka\default.latte";i:2;i:1386107332;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: D:\git_projects\lekarna\app\templates\Pobocka\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'f22cldi7a9')
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
<h1>Pobocky</h1>

<table>
    <tr>
        <th>Ulice</th>
        <th>Cislo popisne</th>
        <th>PSC</th>
        <th>Mesto</th>
    </tr>
<?php $iterations = 0; foreach ($adresy as $Adresa): ?>
            <tr>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($Adresa->ulice, ENT_NOQUOTES) ?></td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($Adresa->cislo_popisne, ENT_NOQUOTES) ?></td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($Adresa->psc, ENT_NOQUOTES) ?></td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($Adresa->mesto, ENT_NOQUOTES) ?></td>
            </tr> 
<?php $iterations++; endforeach ?>
</table>