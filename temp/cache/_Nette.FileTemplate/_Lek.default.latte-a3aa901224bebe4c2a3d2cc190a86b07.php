<?php //netteCache[01]000377a:2:{s:4:"time";s:21:"0.07751300 1386690618";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:55:"D:\git_projects\lekarna\app\templates\Lek\default.latte";i:2;i:1386689813;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: D:\git_projects\lekarna\app\templates\Lek\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '2n2njrw3z6')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbcaa36de79f_content')) { function _lbcaa36de79f_content($_l, $_args) { extract($_args)
?><body>

<h1>Seznam léků</h1>

<table align=center>
    <tr>
        <th>Název</th>
        <th>Účinná látka</th>
        <th>Předpis</th>
        <th class="edit"></th>
    </tr>
<?php $iterations = 0; foreach ($leky as $Lek): ?>
            <tr align=center>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($Lek->nazev, ENT_NOQUOTES) ?></td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($Lek->ucinna_latka, ENT_NOQUOTES) ?></td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($Lek->predpis ? "ano" : "-", ENT_NOQUOTES) ?></td>
                
<?php if (($user->isInRole("admin")) || ($user->isInRole("lekarnik"))): ?>
                  <td class="edit">
                      <a class="button" href="<?php echo htmlSpecialChars($_control->link("Lek:edit", array($Lek->ID))) ?>
">Upravit</a>
                      <a class="button" onClick="return confirm('Opravdu smazat <?php echo htmlSpecialChars(Nette\Templating\Helpers::escapeJs($Lek->nazev)) ?>
 ?')"  href="<?php echo htmlSpecialChars($_control->link("Lek:delete", array($Lek->ID))) ?>
">Smazat</a>
                  </td>
<?php endif ?>
            </tr> 
<?php $iterations++; endforeach ?>
</table>

</br>
<?php if (($user->isInRole("admin")) || ($user->isInRole("lekarnik"))): ?>
<div align=center>
<a class="button" href="<?php echo htmlSpecialChars($_control->link("Lek:create")) ?>
">Vložit nový</a>
</div>
<?php endif ?>

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