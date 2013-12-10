<?php //netteCache[01]000381a:2:{s:4:"time";s:21:"0.59753200 1386696717";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:59:"D:\git_projects\lekarna\app\templates\Pobocka\default.latte";i:2;i:1386682547;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: D:\git_projects\lekarna\app\templates\Pobocka\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '9n2i9vu09h')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbdffcaa5c0d_content')) { function _lbdffcaa5c0d_content($_l, $_args) { extract($_args)
?><body>
   
  <h1>Pobočky</h1>

  <div class="mytable" >
    <table align=center>
        <tr>
            <th>Ulice</th>
            <th>Cislo popisne</th>
            <th>PSC</th>
            <th>Mesto</th>
        </tr >
<?php $iterations = 0; foreach ($adresy as $Adresa): ?>
            <tr align=center>
                    <td><?php echo Nette\Templating\Helpers::escapeHtml($Adresa->ulice, ENT_NOQUOTES) ?></td>
                    <td><?php echo Nette\Templating\Helpers::escapeHtml($Adresa->cislo_popisne, ENT_NOQUOTES) ?></td>
                    <td><?php echo Nette\Templating\Helpers::escapeHtml($Adresa->psc, ENT_NOQUOTES) ?></td>
                    <td><?php echo Nette\Templating\Helpers::escapeHtml($Adresa->mesto, ENT_NOQUOTES) ?></td>
                </tr> 
<?php $iterations++; endforeach ?>
    </table>
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
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 