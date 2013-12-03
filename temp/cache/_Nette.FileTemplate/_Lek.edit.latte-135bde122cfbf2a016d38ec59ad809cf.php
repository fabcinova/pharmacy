<?php //netteCache[01]000374a:2:{s:4:"time";s:21:"0.56915700 1386005035";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:52:"D:\git_projects\lekarna\app\templates\Lek\edit.latte";i:2;i:1386005023;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: D:\git_projects\lekarna\app\templates\Lek\edit.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'k3ybnwcyhh')
;
// prolog Nette\Latte\Macros\UIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("editForm") ? "editForm" : $_control["editForm"]), array()) ?>
<table>
<tr class="required">
    <th><?php $_input = is_object("nazev") ? "nazev" : $_form["nazev"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?></th>
    <td><?php $_input = (is_object("nazev") ? "nazev" : $_form["nazev"]); echo $_input->getControl()->addAttributes(array()) ?></td>
</tr>
<tr class="required">
    <th><?php $_input = is_object("ucinna_latka") ? "ucinna_latka" : $_form["ucinna_latka"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?></th>
    <td><?php $_input = (is_object("ucinna_latka") ? "ucinna_latka" : $_form["ucinna_latka"]); echo $_input->getControl()->addAttributes(array()) ?></td>
</tr>
<tr>
    <th><?php $_input = is_object("predpis") ? "predpis" : $_form["predpis"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?></th>
    <td><?php $_input = (is_object("predpis") ? "predpis" : $_form["predpis"]); echo $_input->getControl()->addAttributes(array()) ?></td>
</tr>
<tr>
    <th>&nbsp;</th>
    <td><?php $_input = (is_object("odeslat") ? "odeslat" : $_form["odeslat"]); echo $_input->getControl()->addAttributes(array()) ?></td>
</tr>
</table>
<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ;