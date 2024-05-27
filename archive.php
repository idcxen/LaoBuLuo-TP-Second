<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<!-- 内容 -->
<div class="layui-container">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md9">
            <?php if ($this->have()) : ?>
                <?php while ($this->next()) : ?>
                    <div class="laobuluo-panel laobuluo-post-lsit">
                        <a class="post-title" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
                        <ul class="post-meta-ul">
                            <li><i class="layui-icon layui-icon-note"></i><?php $this->category(','); ?></li>
                            <li><i class="layui-icon layui-icon-date"></i><?php $this->date(); ?></li>
                            <li><i class="layui-icon layui-icon-dialogue"></i><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></li>
                            <li><i class="layui-icon layui-icon-read"></i><?php get_post_view($this) ?>次阅读</li>
                        </ul>
                        <div class="post-content">
                            <?php $this->excerpt(180, '...'); ?>
                        </div>
                        <a class="more" href="<?php $this->permalink() ?>" >- 阅读全文 -</a>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <div class="laobuluo-panel p10">
                    <div class="content-list-entry">
                        <?php _e('没有找到任何内容，请重试。'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <!-- 分页 -->
            <div class="laobuluo-panel">
                <div class="laobuluo-page-navigator"><?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?></div>
            </div>
            <!-- 分页 -->
        </div>
        <!-- 左边 -->
        <?php $this->need('sidebar.php'); ?>
        <?php $this->need('footer.php'); ?>