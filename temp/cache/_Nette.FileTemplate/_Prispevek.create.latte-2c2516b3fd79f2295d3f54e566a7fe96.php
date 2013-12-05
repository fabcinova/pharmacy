<?php //netteCache[01]000382a:2:{s:4:"time";s:21:"0.82003000 1386207366";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:60:"D:\git_projects\lekarna\app\templates\Prispevek\create.latte";i:2;i:1386207363;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: D:\git_projects\lekarna\app\templates\Prispevek\create.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'd6jhxsv7pp')
;
// prolog Nette\Latte\Macros\UIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("createForm") ? "createForm" : $_control["createForm"]), array()) ?>
<table>
<tr class="required">
    <th><?php $_input = is_object("lek") ? "lek" : $_form["lek"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?></th>
    <td><?php $_input = (is_object("lek") ? "lek" : $_form["lek"]); echo $_input->getControl()->addAttributes(array()) ?></td>
</tr>
<tr class="required">
    <th><?php $_input = is_object("pojistovna") ? "pojistovna" : $_form["pojistovna"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?></th>
    <td><?php $_input = (is_object("pojistovna") ? "pojistovna" : $_form["pojistovna"]); echo $_input->getControl()->addAttributes(array()) ?></td>
</tr>
<tr>
    <th><?php $_input = is_object("vyse_prispevku") ? "vyse_prispevku" : $_form["vyse_prispevku"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?></th>
    <td><?php $_input = (is_object("vyse_prispevku") ? "vyse_prispevku" : $_form["vyse_prispevku"]); echo $_input->getControl()->addAttributes(array()) ?></td>
</tr>
<tr>
    <th><?php $_input = is_object("platnost_od") ? "platnost_od" : $_form["platnost_od"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?></th>
    <td><?php $_input = (is_object("platnost_od") ? "platnost_od" : $_form["platnost_od"]); echo $_input->getControl()->addAttributes(array()) ?></td>
    <td>Formát napr. 2014-01-01</td>
</tr>
<tr>
    <th><?php $_input = is_object("platnost_do") ? "platnost_do" : $_form["platnost_do"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?></th>
    <td><?php $_input = (is_object("platnost_do") ? "platnost_do" : $_form["platnost_do"]); echo $_input->getControl()->addAttributes(array()) ?></td>
    <td>Formát napr. 2014-12-31</td>
</tr>
<tr>
    <th>&nbsp;</th>
    <td><?php $_input = (is_object("odeslat") ? "odeslat" : $_form["odeslat"]); echo $_input->getControl()->addAttributes(array()) ?></td>
</tr>
</table>
<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ;