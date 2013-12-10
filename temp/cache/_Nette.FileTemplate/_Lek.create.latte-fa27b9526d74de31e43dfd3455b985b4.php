<?php //netteCache[01]000400a:2:{s:4:"time";s:21:"0.47550300 1386710273";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:78:"C:\Users\hp\Skola\3_tretak\IIS\projekt\pharmacy\app\templates\Lek\create.latte";i:2;i:1386704309;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: C:\Users\hp\Skola\3_tretak\IIS\projekt\pharmacy\app\templates\Lek\create.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'nfth05o891')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbfd150ba079_content')) { function _lbfd150ba079_content($_l, $_args) { extract($_args)
;Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("createForm") ? "createForm" : $_control["createForm"]), array()) ?>
<table class="edit_tab">
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