<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!-- footer -->
        <footer class="footer text-center">
            <div class="layui-container">
                <p>&copy;<?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a> / 主题开发： <a href="https://www.laobuluo.com/" target="_blank">老部落团队</a> / <a href="http://typecho.org" target="_blank">Typecho</a></p>
                
            </div>
        </footer>
        <!-- footer -->
<?php $this->footer(); ?>
    </body>
</html>

