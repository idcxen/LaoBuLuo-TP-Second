<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<!-- 内容 -->
<div class="layui-container">
     <div class="layui-row layui-col-space15">
          <!-- 左边 -->
          <div class="layui-col-md9">
               <div class="laobuluo-panel laobuluo-detali">
                    <span class="layui-breadcrumb" lay-separator="/">
                         <a href="<?php $this->options->siteUrl(); ?>">首页</a> &raquo;</li>
                         <?php if ($this->is('index')) : ?>
                              <!-- 页面为首页时 -->
                              Latest Post
                         <?php elseif ($this->is('post')) : ?>
                              <!-- 页面为文章单页时 -->
                              <?php $this->category(); ?> &raquo; <?php $this->title() ?>
                         <?php else : ?>
                              <!-- 页面为其他页时 -->
                              <?php $this->archiveTitle(' &raquo; ', '', ''); ?>
                         <?php endif; ?>
                    </span>
                    <div class="laobuluo-post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></div>
                    <ul class="laobuluo-post-meta">
                         <li><i class="layui-icon layui-icon-date"></i><?php $this->date(); ?></li>
                         <li><i class="layui-icon layui-icon-dialogue"></i><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
                         <li><i class="layui-icon layui-icon-read"></i><?php get_post_view($this) ?> 次阅读</li>
                    </ul>
                    <div class="laobuluo-detali-cont">
                         <?php $this->content(); ?>
                    </div>
                    <!-- 翻页 -->
                    <div class="del-pag">
                         <div class="layui-row">
                              <div class="layui-col-md4">
                                   <div class="del-pag-lf">
                                        <h3 class="del-pag-title"><?php $this->thePrev('%s','没有了'); ?></h3>
                                        <a class="del-pag-link"><i class="layui-icon layui-icon-prev"></i>上一篇</a>
                                   </div>
                              </div>
                              <div class="layui-col-md4 layui-col-md-offset4">
                                   <div class="del-pag-lr">
                                        <h3 class="del-pag-title"><?php $this->theNext('%s','没有了'); ?></h3>
                                        <a class="del-pag-link">下一篇<i class="layui-icon layui-icon-next"></i></a>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <!-- 翻页 -->
                    <?php $this->need('comments.php'); ?>
               </div>
          </div>
          <!-- 左边 -->
          <?php $this->need('sidebar.php'); ?>
          <?php $this->need('footer.php'); ?>