layui.use('element', function(){
    var $ = layui.$,
    element = layui.element;
	
    $(".vertical").on('click', function(){
       $('.laobuluo-nav-tree').slideToggle();
    });
});