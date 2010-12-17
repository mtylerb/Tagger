 /**
 * Tagger Plugin for Wolf CMS <http://www.tbeckett.net/articles/plugins/tagger.xhtml>
 * 
 * [direct port of Frog Tagger for Wolf CMS <http://www.wolfcms.org/>]
 *
 * Copyright (C) 2008 - 2010 Andrew Smith <a.smith@silentworks.co.uk>
 * Copyright (C) 2008 - 2011 Tyler Beckett <tyler@tbeckett.net>
 * 
 * Dual licensed under the MIT (/license/mit-license.txt)
 * and GPL (/license/gpl-license.txt) licenses.
 */

Introduction and Brief History:

The tags idea was brought to light back in February of 2008, before the functionality was even fully implemented within Frog CMS.  The idea was put to the side due to this lack of functionality, but was brought back to centre stage at the end of June of 2008 and blossomed from there.  It was quickly picked up as a great idea by BDesign, easylancer, and mvdkleijn (in alphabetical order) on the Frog CMS forum (http://forum.madebyfrog.com/topic/180) and with much discussion between them and help from many others, Tagger was born in its early state at the beginning of July of 2008.

In mid-October of 2008, the plugin was brought back into the spotlight and needed updates to bring it up to speed with the quickly developing Frog.  mtylerb and easylancer began working together and fixed issues that had surfaced in the few months it had been around.  In mid-November of 2008, the plugin was finally ready for re-release!

In December of 2010, mtylerb began reworking the plugin to work with the new Wolf CMS and reintroduced a fully functional Tagger to the Wolf CMS community.

Credits (in alphabetical order):

BDesign
David
easylancer
Jonas
mtylerb
mvdkleijn
phillipe

Installation:

1) Place this plugin in the Wolf plugins directory.
2) Activate the plugin through the administration screen.
3) The plugin should automatically be ready to use, go to step 4 only if you can't find the Tags page or tag snippet.

Use Below for Manual Install Only
4) Create a snippet with the information in the snippet.txt file
5) Use the code(s) below in a page/snippet/layout to produce the desired effect.

<?php $this->includeSnippet('snippetname'); ?>

note: snippetname will be the name you give your snippet.

//Snippet Code

<h3>Tag Cloud</h3>
<ul id="tagger">
<?php tagger('cloud'); ?>
</ul>

snippet options are cloud, count and you can also leave it empty.
 - count is just a list with the number of items tagged with the tag next to it eg. news(1)
 - leaving it blank is the same as count without the number eg. news

// Page Code
Create a new page and add this code below inside it:

<?php
$pages = $this->tagger->pagesByTag();
if($pages){
echo "<h3>Pages tagged with '".$this->tagger->tag()."'</h3>";
      foreach($pages as $slug => $page)
{
		echo '<h3><a href="'.$slug.'">'.$page.'</a></h3>';
	}
} else {
	echo "There is no items with this tag.";
}
?>

Ensure you set this Page Type to Tagger.
