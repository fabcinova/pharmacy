<?php //netteCache[01]000380a:2:{s:4:"time";s:21:"0.35791600 1386703126";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:58:"D:\git_projects\lekarna\app\templates\Export\default.latte";i:2;i:1386702647;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: D:\git_projects\lekarna\app\templates\Export\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '7hki7towpz')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb80150684c5_content')) { function _lb80150684c5_content($_l, $_args) { extract($_args)
?><link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($basePath) ?>/css/style.css" />


<body>

<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("createForm") ? "createForm" : $_control["createForm"]), array()) ?>
<table class="edit_tab">

<tr class="required">
    <th>Pojišťovna</th>
    <td><?php $_input = (is_object("pojistovna") ? "pojistovna" : $_form["pojistovna"]); echo $_input->getControl()->addAttributes(array()) ?></td>
</tr>
<tr>
    <th>Od</th>
    <td><?php $_input = (is_object("od") ? "od" : $_form["od"]); echo $_input->getControl()->addAttributes(array()) ?></td>
    <td class="edit">Formát např. 1.1.2014</td>
</tr>
<tr>
    <th>Do</th>
    <td><?php $_input = (is_object("do") ? "do" : $_form["do"]); echo $_input->getControl()->addAttributes(array()) ?></td>
    <td class="edit" >Formát např. 31.12.2014</td>
</tr>
<tr>
    <th>&nbsp;</th>
    <td><?php $_input = (is_object("exportovat") ? "exportovat" : $_form["exportovat"]); echo $_input->getControl()->addAttributes(array()) ?></td>
</tr>
</table>
<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>

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