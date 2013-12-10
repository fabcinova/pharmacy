<?php //netteCache[01]000378a:2:{s:4:"time";s:21:"0.62059400 1386696788";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:56:"D:\git_projects\lekarna\app\templates\Nakup\create.latte";i:2;i:1386696750;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: D:\git_projects\lekarna\app\templates\Nakup\create.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '4adx9n8an0')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbb36dc33be8_content')) { function _lbb36dc33be8_content($_l, $_args) { extract($_args)
;Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("createForm") ? "createForm" : $_control["createForm"]), array()) ?>
<table class="edit_tab">
<tr class="required">
    <th><?php $_input = is_object("datum") ? "datum" : $_form["datum"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?></th>
    <td><?php $_input = (is_object("datum") ? "datum" : $_form["datum"]); echo $_input->getControl()->addAttributes(array()) ?></td>
</tr>
<tr class="required">
    <th><?php $_input = is_object("pobocka") ? "pobocka" : $_form["pobocka"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?></th>
    <td><?php $_input = (is_object("pobocka") ? "pobocka" : $_form["pobocka"]); echo $_input->getControl()->addAttributes(array()) ?></td>
</tr>
<tr>
    <th><?php $_input = is_object("lek") ? "lek" : $_form["lek"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?></th>
    <td><?php $_input = (is_object("lek") ? "lek" : $_form["lek"]); echo $_input->getControl()->addAttributes(array()) ?></td>
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