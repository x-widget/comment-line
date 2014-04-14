<?php
?>

		<div class='panel-titles'>Panel Title</div>
	<?
		$latest_comments = g::posts(array( 'wr_is_comment' => '1', 'limit' => '4' ));
			foreach ( $latest_comments as $comments ) {
				$comments_list[] = db::row("SELECT wr_id, wr_content, wr_name, wr_email, wr_datetime, mb_id FROM $g5[write_prefix]".$comments['bo_table']." WHERE wr_id='".$comments['wr_id']."'");
			}
		$i = 1;
		foreach ( $comments_list as $comment ) { ?>
			<div class='latest-comments comment_<?=$i++?>'>
				<div class='inner'>
					<span class='post-comment'><?=$comment['wr_content']?></span>
					<span class='comment-author'>by <?=$comment['wr_name']?></span>
				</div>
			</div>
		<? } ?>
		
		<div style='clear: left'></div>