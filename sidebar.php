<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="layui-col-md3">
	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)) : ?>
		<div class="laobuluo-hots laobuluo-panel">
			<h5 class="widget-title"><?php _e('最新文章'); ?></h5>
			<ul class="widget-navcontent">
				<li class="item item-01 active">
					<ul>
						<?php
						$this->widget('Widget_Contents_Post_Recent', 'pageSize=6')->to($recent);
						if ($recent->have()) :
							while ($recent->next()) :
						?>
								<li><time><?php $recent->date('Y-m-d'); ?></time><a href="<?php $recent->permalink(); ?>"><?php $recent->title(20, '...'); ?></a></li>
						<?php endwhile;
						endif; ?>
					</ul>
				</li>
			</ul>
		</div>
	<?php endif; ?>
	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
	<div class="laobuluo-panel laobuluo-reply">
		<h5 class="widget-title"><?php _e('最近回复'); ?></h5>
		<ul class="widget-list">
			<?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
			<?php while ($comments->next()) : ?>
				<li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>
			<?php endwhile; ?>
		</ul>
	</div>
	<?php endif; ?>
	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowTag_Cloud', $this->options->sidebarBlock)): ?>
	<div class="laobuluo-panel laobuluo-classify">
		<h5 class="widget-title"><?php _e('热门标签'); ?></h5>
		<ul class="widget-list">
			<?php $this->widget('Widget_Metas_Tag_Cloud', array('sort' => 'count', 'ignoreZeroCount' => true, 'desc' => true, 'limit' => 15))->to($tags); ?>  
<?php while($tags->next()): ?>  
<li><a rel="tag" href="<?php $tags->permalink(); ?>"><?php $tags->name(); ?></a></li>
<?php endwhile; ?>
		</ul>
	</div>
	<?php endif; ?>
	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
	<div class="laobuluo-panel laobuluo-else">
		<h5 class="widget-title"><?php _e('其它'); ?></h5>
		<ul class="widget-list">
			<?php if ($this->user->hasLogin()) : ?>
				<li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
				<li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
			<?php else : ?>
				<li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
			<?php endif; ?>
			<li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>
			<li><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></li>
		</ul>
	</div>
	<?php endif; ?>
</div>
</div>
</div>
<!-- 内容 -->