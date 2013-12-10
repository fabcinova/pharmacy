<?php //netteCache[01]000406a:2:{s:4:"time";s:21:"0.39170000 1386715609";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:84:"C:\Users\hp\Skola\3_tretak\IIS\projekt\pharmacy\app\templates\Homepage\default.latte";i:2;i:1386704309;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: C:\Users\hp\Skola\3_tretak\IIS\projekt\pharmacy\app\templates\Homepage\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'ejts706sem')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb277e6268fb_content')) { function _lb277e6268fb_content($_l, $_args) { extract($_args)
?><link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($basePath) ?>/css/style.css" />

<body>
  <div id=hp_foto>
    <IMG src="<?php echo htmlSpecialChars($basePath) ?>/images/lekarna.jpg" width=400px height=300px alt="Naše lékárna" />
  </div>
  
  <div id=hp_text>
    <B>
      Vítejte v informačním systému naší lékárny. </br>   
      Dnes je <?php echo Date ("j.n.Y")?> </br>   
      Otevírací doba všech poboček: </br>
    </B>
    
    Po-Pá 8-12 13-17 </br>
    So-Ne 9-12 </br>
    
  </div>
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