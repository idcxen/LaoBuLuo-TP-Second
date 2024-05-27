<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
        <div class="txtbox">
     
          <p>对不起，您请求的页面不存在、或已被删除、或暂时不可用</p>
     
          <p class="paddingbox">请点击以下链接继续浏览网页</p>
     
          <p>》<a style="cursor:pointer" οnclick="history.back()">返回上一页面</a></p>
     
          <p>》<a href="">返回网站首页</a></p>
     
        </div>
 
<?php $this->need('footer.php'); ?>