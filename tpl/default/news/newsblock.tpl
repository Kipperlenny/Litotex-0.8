<br>
<h3>{#news#}</h3>

{foreach from=$news item=item}
<div class="NewsPost">
			<div class="NewsPostHeader">
				<div class="NewsPostTitleDate">{$item->getFormatedDate()}</div>
				<div class="NewsPostKat"><a href="{make_link package=news action=showCategory id=$item->getCategoryID()}" title="Titel" rel="category tag">{$item->getCategoryName()}</a></div>
				<div class="NewsPostTitle"><a href="{make_link package=news action=showComments id=$item->getID()}" title="Permalink zu {make_link package=news action=showComments id=$item->getID()}">{$item->getTitle()}</a></div>
				
			</div>
			<div class="NewsPostContent"><p>{$item->getText()}</p></div>

			<div class="NewsPostFooter">
				<span class="NewsPostComments "><a href="{make_link package=news action=showComments id=$item->getID()}" title="Kommentartitel">{$item->getCommentNum()} Kommentare</a></span>
				<a class="NewsPostReadMore" href="Link"><b><b><b>Weiterlesen</b></b></b>
				
				
				</a>
			</div>
		</div>
{/foreach}
