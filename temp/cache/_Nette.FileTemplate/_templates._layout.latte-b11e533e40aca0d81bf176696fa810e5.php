<?php //netteCache[01]000373a:2:{s:4:"time";s:21:"0.07225500 1386516839";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:51:"D:\git_projects\lekarna\app\templates\@layout.latte";i:2;i:1386516835;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: D:\git_projects\lekarna\app\templates\@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '35nl0micwk')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb979711dfa1_head')) { function _lb979711dfa1_head($_l, $_args) { extract($_args)
;
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbf3037bf518_title')) { function _lbf3037bf518_title($_l, $_args) { extract($_args)
?>                <h1><?php echo Nette\Templating\Helpers::escapeHtml(isset($nadpis) ? $nadpis : "Lékárna", ENT_NOQUOTES) ?></h1>
<?php
}}

//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lb9c84b0f199_scripts')) { function _lb9c84b0f199_scripts($_l, $_args) { extract($_args)
?>	<script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.js"></script>
	<script src="<?php echo htmlSpecialChars($basePath) ?>/js/netteForms.js"></script>
	<script src="<?php echo htmlSpecialChars($basePath) ?>/js/main.js"></script>
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
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="description" content="" />
<?php if (isset($robots)): ?>	<meta name="robots" content="<?php echo htmlSpecialChars($robots) ?>" />
<?php endif ?>

	<title><?php echo Nette\Templating\Helpers::escapeHtml(isset($nadpis) ? $nadpis : "Lékárna", ENT_NOQUOTES) ?></title>

	<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($basePath) ?>/css/screen.css" />
	<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($basePath) ?>/css/style.css" />
	<link rel="stylesheet" media="print" href="<?php echo htmlSpecialChars($basePath) ?>/css/print.css" />
	<link rel="shortcut icon" href="<?php echo htmlSpecialChars($basePath) ?>/favicon.ico" />
	<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

</head>

<body>
        <div id="banner">
<?php call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>
                <div id="user">
<?php if ($user->isLoggedIn()): ?>
                    <a href="<?php echo htmlSpecialChars($_control->link("Sign:out")) ?>
">Odhlásit <?php echo Nette\Templating\Helpers::escapeHtml($user->id, ENT_NOQUOTES) ?>
</a><small> <?php echo Nette\Templating\Helpers::escapeHtml(implode(", ", $user->roles), ENT_NOQUOTES) ?> </small></div>
<?php else: ?>
                    <a href="<?php echo htmlSpecialChars($_control->link("Sign:in")) ?>
">Přihlásit se</a></div>
<?php endif ?>
                </div>

<?php $iterations = 0; foreach ($flashes as $flash): ?>        <div class="flash <?php echo htmlSpecialChars($flash->type) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; endforeach ?>

        <div id="content">
                <p><a href="<?php echo htmlSpecialChars($_control->link("Lek:default")) ?>
">Seznam leku, ktere nase lekarna nabizi</a></p>
                <p><a href="<?php echo htmlSpecialChars($_control->link("Pobocka:default")) ?>
">Seznam nasich pobocek</a></p>
                <p><a href="<?php echo htmlSpecialChars($_control->link("Prispevek:default")) ?>
">Importovat prispevky</a></p>

<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>

                <footer>Created by xfabci00 and xnetko00 in 2013.</footer>
        </div>

<?php call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars())  ?>
</body>
</html>
