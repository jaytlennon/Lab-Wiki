<?php
/*--------------------------------------------
A Liang Chen's Extension for MediaWiki
Add Article to Category
Release Date: 2007/01/19
Update Date: 2007/03/09 to 0.1.9, fix a bug in zip file which may cause problem in style.
Contact: anything@liang-chen.com
Demo: kaoshi.wobuxihuan.org
Download: http://www.liang-chen.com/myworld/content/view/36/70/
--------------------------------------------*/


if( !defined( 'MEDIAWIKI' ) )
die();

$wgExtensionCredits['other'][] = array(
    'name' => 'Add Article to Category',
    'description' => 'Your MediaWiki will get an inputbox on each Category page, and you can create a new article directly to that category',
    'author' => 'Liang Chen The BiGreat',
     'url' => 'http://www.liang-chen.com/myworld/content/view/36/70/'
);
$wgHooks['EditFormPreloadText'][] = 'addcategory';
$wgHooks['CategoryPageView'][] = 'categorychange';
function addcategory(&$text)
{
	$cname = $_GET['category'];
	$wnew = $_GET['new'];
	if ($wnew==1)
	{
		if($cname=="Protocols") {
			$temp1 = "[[category:".$cname."]]\n==Overview==\n\n==Materials Needed==\n\n==Procedure==\n\n==References==";
			}
		else {
		if ($cname=="Field") {
			$temp1 = "[[category:".$cname."]]\n==Overview==\n\n==Materials Needed==\n\n==Procedure==\n\n==References==";
			}
		else {
		if ($cname=="Computer") {
			$temp1 = "[[category:".$cname."]]\n==Overview==\n\n==Materials Needed==\n\n==Procedure==\n\n==References==";
			}
		else {
		if ($cname=="Recipes") {
			$temp1 = "[[category:".$cname."]]\n==Overview==\n\n==Materials Needed==\n\n==Procedure==\n\n==References==";
			}
		else {
		if ($cname=="Lab Management") {
			$temp1 = "[[category:".$cname."]]\n==Overview==\n\n==Guidelines==";
		}
		else {
			$temp1 ="[[category:".$cname."]]\n Add Your Content Here \n\n ";
			}
     		}}}}
		$text=$temp1;
	}
	return true;
}



function categorychange($catpage)
{

	$boxtext  = "Create an Article to this Category";
	$btext = "Submit";
	global $wgOut;
	global $wgScript;
	$Action = htmlspecialchars( $wgScript );



//$wgOut->addWikiText( "Test");
$temp2=<<<ENDFORM
<!-- Add Article Extension Start - P by BiGreat-->
<script type="text/javascript">
function clearText(thefield){
if (thefield.defaultValue==thefield.value)
thefield.value = ""
}
function addText(thefield){
	if (thefield.value=="")
	thefield.value = thefield.defaultValue
}
</script>
<table border="0" align="right" width="423" cellspacing="0" cellpadding="0">
<tr>
<td width="100%" align="right" bgcolor="">
<form name="createbox" action="{$Action}" method="get" class="createbox">
	<input type='hidden' name="action" value="edit">
	<input type='hidden' name="new" value="1">
	<input type='hidden' name="category" value="{$catpage->mTitle->getText()}">

	<input class="createboxInput" name="title" type="text" value="{$boxtext}" size="30" style="color:#666;" onfocus="clearText(this);" onblur="addText(this);"/>
	<input type='submit' name="create" class="createboxButton" value="{$btext}"/>
</form>
</td>
</tr>
</table>
<!-- Add Article Extension End - P by BiGreat-->
ENDFORM;
$wgOut->addHTML($temp2);
	return true;
}
?>
