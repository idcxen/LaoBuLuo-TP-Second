<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';  //如果是文章作者的评论添加 .comment-by-author 样式
        } else {
            $commentClass .= ' comment-by-user';  //如果是评论作者的添加 .comment-by-user 样式
        }
    } 
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
	
?>

<li id="<?php $comments -> theId(); ?>" class="laobuluo-comment-list mt10
   <?php 
        if ($comments->levels > 0) {
            echo ' comment-child';
            $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
        } else {
            echo ' comment-parent';
        }
        $comments->alt(' comment-odd', ' comment-even');
        echo $commentClass;
    ?>">
	<div class="layui-row" id="<?php $comments->theId(); ?>">
		<div class="layui-col-md1">
			 <div class="comment-author"><?php $comments -> gravatar('50', ''); ?></div>
		</div>
		<div class="layui-col-md11">
			<div class="author-mess"><span class="aut-name"><?php $comments -> author(); ?></span><span class="aut-date"><?php $comments -> date('Y-m-d H:i'); ?></span></div>
			<div class="author-cont">
                <?php echo getPermalinkFromCoid($comments->parent); ?>
                <?php echo p_replace( $comments -> content) ; ?>
            </div>
			<div class="author-reply"><?php $comments -> reply('回复'); ?></div>
		</div>
    </div>
    <?php if ($comments->children){ ?>
		<?php $comments -> threadedComments($options); ?>
	<?php } ?>
</li>
<?php } ?>


<?php $this -> comments() -> to($comments); ?>
  <!-- 回复列表 -->
   <?php if ($comments->have()) : ?>
         <!-- 评论头部提示信息 -->
         <h4 class="laobuluo-comment"><?php $this -> commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h4>
         <!-- 评论的内容 -->
         <?php $comments -> listComments(); ?>
         <!-- 评论page -->
         <div  class="laobuluo-page-navigator"><?php $comments -> pageNav('&laquo; 前一页', '后一页 &raquo;'); ?></div>
   <?php endif; ?>

  <?php if ($this->allow('comment')) : ?>
     <div  class="del-discuss" id="<?php $this -> respondId(); ?>">
		<?php if($this->user->hasLogin()): ?>
			 <div class="laobuluo-logout" >
			 	<?php _e('登录身份: '); ?>
			     <a href="<?php $this -> options -> profileUrl(); ?>"><span class="logout-name"><?php $this -> user -> screenName(); ?></span></a>
			 	<a class="Logout-text" href="<?php $this -> options -> logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a>
			 </div>
		<?php endif; ?>
		<h3 id="response" class="laobuluo-comment"><?php _e('添加新评论'); ?></h3>
         <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
         <?php if(!$this->user->hasLogin()): ?>
     		<div class="layui-form-item">
     			 <div class="layui-input-inline">
     				  <input class="layui-input" type="text" name="author" id="author" required placeholder="请输入昵称" value="<?php $this -> remember('author'); ?>" />
     			 </div>
     			 <div class="layui-input-inline">
     			 	  <input class="layui-input" type="text" name="mail" id="mail" placeholder="<?php if ($this->options->commentsRequireMail): ?><?php endif; ?>请输入邮箱" value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail): ?>required<?php endif; ?>  >
     			 </div>
     			 <div class="layui-input-inline">
     			 	  <input class="layui-input" type="url" name="url" id="url"  placeholder="<?php if ($this->options->commentsRequireURL): ?><?php endif; ?><?php _e('http://您的主页'); ?>" value="<?php $this->remember('url'); ?>" <?php if ($this->options->commentsRequireURL): ?>required<?php endif; ?> >
     			 </div>
             </div>
             <?php endif; ?>
     		<div class="layui-form-item">
     			<textarea class="layui-textarea" name="text" id="textarea" placeholder="请输入内容" ><?php $this -> remember('text'); ?></textarea>
     		</div>
     		<div class="layui-form-item">
				<div class="layui-input-inline length_2">
     			     <button class="layui-btn " type="submit" required ><?php _e('提交评论'); ?></button>
				</div>
				<div class="layui-input-inline cancel-comment-reply">
				   <?php $comments -> cancelReply(); ?>
				</div>
     		</div>
     	</form>
     </div>
  <?php else : ?>
      <h3 class="laobuluo-comment"><?php _e('评论已关闭'); ?></h3>
  <?php endif; ?>
  
  