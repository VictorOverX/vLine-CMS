# vLINE CMS
<small> Sistema <strong>CMS</strong> de site, com módulos administráveis para diversas funcionalidades.</small>
 
<h3>Modulos</h3>
<ul>
 	<li>Gerenciador CMS</li>
 	<li>Gerenciador de BLOG</li>
	<li>Gestão de usuário CMS</li>
</ul>
 
<h3>Contéudo</h3>
<ul>
	<li><strong>Web site</strong><a href=""></a> </li>
	<li><strong>Tutorial</strong><a href=""></a> </li>
	<li><strong>API Docs</strong><a href=""></a> </li>
	<li><strong>Demo</strong><a href=""></a> </li>
	<li><strong>Vídeos</strong><a href=""></a> </li>
</ul>

<h3>Instalação</h3>
Para instalar é muito simples, basta subir para seu servidor de hospedagem ou local, configurar o seu <strong>.env</strong> e rodar as migrations, para quem não sabe como configurar uma aplicação em laravel, clique no link acima com o tutorial passo a passo.

<h3>Packages</h3>

<h4>Portfolio - Instalação</h4>
<p>
	1ª - Copie o modulo para dentro da pasta <strong>packages/LineXTI</strong>.<br/>
	2ª - Em seguida adicione em seu <strong>composer.json</strong> em <strong>psr-4</strong> a linha <code> "LineXTI\\Portfolio\\": "packages/LineXTI/Portfolio/src"</code>. <br/>
	3ª - Agora rode o comando <code>composer dump-autoload</code>, para finalizar, em seu terminal <code>php artisan vender:publish</code>.<br/>
	4ª - Por ultimo va em <strong>config/app.php</strong>, procure a linha <strong>providers</strong> e adicione <code>LineXTI\Portfolio\PortfolioServiceProvider::class,</code>.<br/>
</p>

<h3>Tecnologias</h3>
<ul>
	<li>Laravel 5.1</li>
	<li>jQuery</li>
	<li>JavaScript</li>
	<li>Bootstrap 3</li>
</ul>
 
<h3>Criadores</h3>
<ul>
	<li>Victor Mariano</li>
</ul>