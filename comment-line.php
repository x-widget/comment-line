<?php
	widget_css();
?>

<div class='comment-line'>
		<div class='title'><?=$widget_config['title']?></div>
	<?
		$comments_list = g::posts(array( 'wr_is_comment' => '1', 'limit' => '4', 'select' => 'wr_parent, wr_num,wr_is_comment, wr_id, bo_table, wr_content, wr_name', 'domain' => etc::domain() ));
		$i = 1;
		if( $comments_list ) { 
			foreach ( $comments_list as $comment ) { ?>
				<? $comment_url = g::url()."/bbs/board.php?bo_table=$comment[bo_table]&wr_id=$comment[wr_parent]&c_id=$comment[wr_id]&w=c#bo_vc_w" ?>
				<div class='latest-comments comment_<?=$i++?>'>
					<div class='inner'>
						<span class='post-comment'><?=$comment['wr_content']?></span>
						<span class='comment-author'>by <?=$comment['wr_name']?></span>
					</div>
					<a href="<?=$comment_url?>" class='read_comment'></a>
				</div>
			<? } ?>	
			<div style='clear: left'></div>
		<? } else { ?>
			<div class='title'>NO COMMENTS</div>
			<img src="<?=x::url()?>/widget/<?=$widget_config['name']?>/no-comment.jpg"/>			
		<? } ?>
</div>
<style>
<?=$widget_config['css']?>
</style>
