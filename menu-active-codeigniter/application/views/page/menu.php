<style type="text/css">
		*{margin: 0; padding: 0} 
		menu{width: 950px; margin: auto; background: #4cf880; height: 50px; text-align: center;}
		menu ul {list-style: none}
		menu ul li {float: left; width:20%;}
		menu ul li a{color:#fff; text-decoration: none; line-height: 50px; display: block;}
		menu ul li a:hover{background: #198bfc}
		menu ul li .active{background: #198bfc}
</style>

<menu>
	<ul>
		<li><a class="<?php echo activate_menu('home') ?>" href="<?php echo site_url('home')?>">Home</a></li>
		<li><a class="<?php echo activate_menu('galery') ?>" href="<?php echo site_url('galery')?>">Galery</a></li>
		<li><a class="<?php echo activate_menu('service') ?>" href="<?php echo site_url('service')?>">Sevice</a></li>
		<li><a class="<?php echo activate_menu('blog') ?>" href="<?php echo site_url('blog')?>">Blog</a></li>
		<li><a class="<?php echo activate_menu('contact') ?>" href="<?php echo site_url('contact')?>">Contact us</a></li>
	</ul>
</menu>