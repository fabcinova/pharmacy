<?php //netteCache[01]000380a:2:{s:4:"time";s:21:"0.20089600 1386436546";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:58:"D:\git_projects\lekarna\app\templates\Prispevek\edit.latte";i:2;i:1386436462;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: D:\git_projects\lekarna\app\templates\Prispevek\edit.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'fpk08vh3iw')
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

<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("editForm") ? "editForm" : $_control["editForm"]), array()) ?>
<table>
<tr class="required">
    <th><?php $_input = is_object("lek") ? "lek" : $_form["lek"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?></th>
    <td><?php $_input = (is_object("lek") ? "lek" : $_form["lek"]); echo $_input->getControl()->addAttributes(array()) ?></td>
</tr>
<tr class="required">
    <th><?php $_input = is_object("pojistovna") ? "pojistovna" : $_form["pojistovna"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?></th>
    <td><?php $_input = (is_object("pojistovna") ? "pojistovna" : $_form["pojistovna"]); echo $_input->getControl()->addAttributes(array()) ?></td>
</tr>
<tr class="required">
    <th><?php $_input = is_object("vyse_prispevku") ? "vyse_prispevku" : $_form["vyse_prispevku"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?></th>
    <td><?php $_input = (is_object("vyse_prispevku") ? "vyse_prispevku" : $_form["vyse_prispevku"]); echo $_input->getControl()->addAttributes(array()) ?></td>
</tr>
<tr>
    <th><?php $_input = is_object("platnost_od") ? "platnost_od" : $_form["platnost_od"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?></th>
    <td><?php $_input = (is_object("platnost_od") ? "platnost_od" : $_form["platnost_od"]); echo $_input->getControl()->addAttributes(array()) ?></td>
    <td>Formát napr. 1.1.2014</td>
</tr>
<tr>
    <th><?php $_input = is_object("platnost_do") ? "platnost_do" : $_form["platnost_do"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?></th>
    <td><?php $_input = (is_object("platnost_do") ? "platnost_do" : $_form["platnost_do"]); echo $_input->getControl()->addAttributes(array()) ?></td>
    <td>Formát napr. 31.12.2014</td>
</tr>
<tr>
    <th>&nbsp;</th>
    <td><?php $_input = (is_object("odeslat") ? "odeslat" : $_form["odeslat"]); echo $_input->getControl()->addAttributes(array()) ?></td>
</tr>
</table>
<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ;