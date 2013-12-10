<?php //netteCache[01]000397a:2:{s:4:"time";s:21:"0.51420300 1386648001";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:75:"C:\Users\hp\Skola\3_tretak\IIS\projekt\pharmacy\app\templates\Sign\in.latte";i:2;i:1386647999;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: C:\Users\hp\Skola\3_tretak\IIS\projekt\pharmacy\app\templates\Sign\in.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'ili0hy5zsl')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb46fb8b923a_content')) { function _lb46fb8b923a_content($_l, $_args) { extract($_args)
?><body>
  <div id="sign" align=center>
    
    
<?php call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>
    
<?php $_ctrl = $_control->getComponent("signInForm"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>
    
      </div>
</body><?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb0dd50257ac_title')) { function _lb0dd50257ac_title($_l, $_args) { extract($_args)
?>    <h1>Přihlášení</h1>
<?php
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
<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($basePath) ?>/css/style.css" />

<?php $robots = 'noindex' ?>
    

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 