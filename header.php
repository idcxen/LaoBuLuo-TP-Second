<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if ($this->_currentPage > 1) echo '第 ' . $this->_currentPage . ' 页 - '; ?><?php $this->archiveTitle('', '', ' - '); ?><?php $this->options->title(); ?><?php if ($this->is('index')) : ?> - <?php $this->options->description() ?><?php endif; ?></title>
    <?php if ($this->is('index')) : ?>
        <meta name="keywords" content="<?php $this->options->keyswords() ?>" />
        <meta name="description" content="<?php $this->options->descriptions() ?>" />
    <?php else : ?>
        <?php $this->header(); ?><?php endif; ?>
        <link rel="stylesheet" href="<?php $this->options->themeUrl(); ?>src/css/layui.css" />
        <link rel="stylesheet" href="<?php $this->options->themeUrl(); ?>src/css/laobuluo.css" />
        <script src="<?php $this->options->themeUrl(); ?>src/layui.js"></script>
        <script src="<?php $this->options->themeUrl(); ?>src/js/main.js"></script>
</head>

<body>
<!-- head-nav -->
<div class="laobuluo-header-row">
			<div class="layui-container">
				<div class="layui-row">
					<span class="vertical"><i class="layui-icon layui-icon-more-vertical"></i></span>
					<div class="layui-col-md1">
						<a class="haeder-logo" href="<?php $this->options->siteUrl(); ?>" >
							<img src="<?php $this->options->logoUrl() ?>">
						</a>
					</div>
					<div class="layui-col-md8">
						<ul class="haeder-nav-ul laobuluo-nav-tree">
                            <li class="<?php if($this->is('index')): ?> current<?php endif; ?>" >
                                <a href="<?php $this->options->siteUrl(); ?>">网站首页</a>
                            </li>
                            <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                            <?php while($category->next()): ?>
                            <li class="<?php if($this->is('category', $category->slug)): ?>current<?php endif; ?>">
                            <a  href="<?php $category->permalink(); ?>"  title="<?php $category->name(); ?>"><?php $category->name(); ?></a>
                            </li>
					        <?php endwhile; ?>
						</ul>
					</div>
					<div class="layui-col-md3">
						<div class="laobuluo-search mt10 mb10">
                          <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
							<i class="layui-icon layui-icon-search submit"></i>
                            <input class="layui-input" type="text" id="s" name="s"  placeholder="按回车搜索" />
                          </form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- head-nav -->