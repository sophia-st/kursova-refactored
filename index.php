<!DOCTYPE html>
<?php
require 'main.php';

$posts = getALLPosts();
$user = getUserInfo();
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            html {
                font-size: 14px;
            }
            @media (min-width: 768px) {
                html {
                    font-size: 16px;
                }
            }

            .container {
                max-width: 960px;
            }

            .pricing-header {
                max-width: 700px;
            }

            .card-deck .card {
                min-width: 220px;
            }

        </style>
    </head>
    <body>
    <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">About</h4>
                        <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Contact</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Follow on Twitter</a></li>
                            <li><a href="#" class="text-white">Like on Facebook</a></li>
                            <li><a href="#" class="text-white">Email me</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    <strong>Album</strong>
                </a>
                <?php if (!$user['id']) {?>
                    <a class="navbar-brand d-flex align-items-end" href="/login.php">Login</a>
                    <a class="navbar-brand d-flex align-items-end" href="/register.php">Register</a>
                <?php } else {?>
                    <a class="navbar-brand d-flex align-items-end" href="/logout.php">Logout</a>
                <?php } ?>

            </div>
        </div>
    </header>
    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Our work</h1>
                <?php if ($user['isAdmin']) { ?>
                    <form action="create_content.php" method="post">
                        <h3>Add new photo to Portfolio</h3>
                        <label>Title</label>
                        <input type="text" name="title">
                        <label>Description </label>
                        <input type="text" name="decs">
                        <label>Photo url </label>
                        <input type="text" name="photourl">
                        <input type="submit" value="Add">
                    <form>
                <?php } else {?>
                    <form action="create_ticket.php" method="post">
                        <h3>Write for reservation</h3>
                        <label>Email</label>
                        <input type="text" name="email">
                        <label>Name </label>
                        <input type="text" name="name">
                        <input type="submit" value="Send">
                        <form>
                    <?php } ?>
            </div>
        <?php if ( isset($_GET['res'] )) { ?>
                        <h3 id='msg' style='color:green'>Thank you! Reservation was created! </h3>
                    <?php } ?>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
                    <?php foreach ($posts as $post) { if (!is_null($post['photourl'])) {?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" data-src="<?php echo($post['photourl'])?>" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="<?php echo($post["photourl"])?>" data-holder-rendered="true">
                            <div class="card-body">
                                <p class="card-text"><?php echo($post['decs'])?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" onclick="window.location='<?php echo($post["photourl"])?>'" class="btn btn-sm btn-outline-secondary">View</button>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php } }?>
                </div>
            </div>
        </div>

        <div class="container">
            <h2 style="
    text-align: center;
">Pricing</h2>
            <div class="card-deck mb-3 text-center">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Cool</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ h</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>10 photos</li>
                            <li>Email support</li>
                            <li>Help center access</li>
                        </ul>
                        <button type="button" class="btn btn-lg btn-block btn-outline-primary">Sign up for free</button>
                    </div>
                </div>
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Elite</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ h</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>30 photos</li>
                            <li>Priority email support</li>
                            <li>Help center access</li>
                        </ul>
                        <button type="button" class="btn btn-lg btn-block btn-primary">Get started</button>
                    </div>
                </div>
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Luxury</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$29 <small class="text-muted">/ h</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>30 photos</li>
                            <li>Phone and email support</li>
                            <li>Help center access</li>
                        </ul>
                        <button type="button" class="btn btn-lg btn-block btn-primary">Contact us</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-offset-3">
                    <div class="well well-sm">
                        <form class="form-horizontal" action="" method="post">
                            <fieldset>
                                <legend class="text-center">Contact us</legend>

                                <!-- Name input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name">Name</label>
                                    <div class="col-md-9">
                                        <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
                                    </div>
                                </div>

                                <!-- Email input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="email">Your E-mail</label>
                                    <div class="col-md-9">
                                        <input id="email" name="email" type="text" placeholder="Your email" class="form-control">
                                    </div>
                                </div>

                                <!-- Message body -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="message">Your message</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
                                    </div>
                                </div>

                                <!-- Form actions -->
                                <div class="form-group">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <style>
        .contacts {
            display: block;
            position: relative;
            padding-top: 60px;
            padding-bottom: 60px;
            text-align: center;
        }
        .banner-img{
	display: block;
	position: relative;
	width: 100%;
	height: auto;
}

.left-content-bg{
	background-color: #f0f0f0;
}

.banner-img img{
	max-width: 100%;
	max-height: 100%;
}

.banner{
	display: block;
	position: relative;
	background: #f0f0f0;
}

h2.banner-title{
	text-transform: uppercase;
	font-size: 36px;
	margin-top: 50px;
}

.banner-excerpt{
	display: block;
	position: relative;
	line-height: 52px;
	font-size: 18px;
	font-weight: 100;
}

.banner-permalink{
	display: block;
	position: relative;
	padding-top: 40px;
	padding-bottom: 60px;
}

.banner-permalink a{
	display: inline-block;
	border: 2px solid #000;
	color: #000;
	text-decoration: none;
	text-transform: uppercase;
	font-size: 14px;
	font-weight: 600;
	padding: 10px 30px;
	transition: .2s;
}

.banner-permalink a:hover{
	border: 2px solid #e10707;
	color: #e10707;
}

.underbanner-text .banner-excerpt{
	line-height: 32px;
}

.underbanner-text{
	display: block;
	position: relative;
	text-align: center;
	background: rgba(255,255,255,0.9);
	margin-bottom: 60px;
	padding: 0px 15px;
}

.underbanner-text h2{
	font-size: 30px;
	padding-top: 30px;
}

.contacts{
	display: block;
	position: relative;
	padding-top: 60px;
	padding-bottom: 60px;
	text-align: center;
}

.contacts h4.widget-title{
	text-transform: uppercase;
	font-size: 36px;
	font-weight: 400;
	margin-bottom: 30px;
}

.contacts .textwidget{
	font-size: 18px;
	font-weight: 100;
	line-height: 32px;
}

.footer{
	display: block;
	position: relative;
	background: #f0f0f0;
	padding: 30px 0px;
}

h4.footer-title{
	text-transform: uppercase;
}

.copyright span{
	font-weight: 100;
}

.footer-info h4.footer-title{
	text-align: right;
}

.footer-info .textwidget{
	text-align: right;
}

.mobmenu-btn{
	display: block;
	position: relative;
	text-align: center;
}

img.menubtn-img{
	width: 42px;
	height: 42px;
}

.mobmenu-btn button{
	border: none;
	background: #fff;
	padding: 10px;
}

.mobmenu-btn button[aria-expanded="true"]{
	border: 1px solid #000;
}

@media (max-width: 992px){
	.copyright{
		text-align: center;
	}
	.footer-info{
		margin-top: 30px;
		text-align: center;
	}
	.footer-info h4.footer-title,
	.footer-info .textwidget{
		text-align: center;
	}
}

.menucontent{
	background: #f0f0f0;
}

.menucontent ul{
	padding: 0px;
	margin: 0px;
	list-style-type: none;
}

.menucontent ul li{
	display: block;
}

.menucontent ul li a{
	display: block;
	color: #000;
	font-weight: 500;
	padding: 10px;
	text-decoration: none;
	text-transform: uppercase;
}

.menucontent ul li a:hover{
	background: #000;
	color: #f0f0f0;
}

.page-inner{
	display: block;
	position: relative;
	min-height: 500px;
	padding-bottom: 60px;
}

.page-inner-header{
	padding-bottom: 30px;
	box-shadow: 0px 0px 30px rgba(0,0,0,0.2);
}

.breadcrumbs{
	display: block;
	position: relative;
	margin-top: 40px;
}

.breadcrumbs ul{
	list-style-type: none;
	display: block;
	margin: 0px;
	padding: 0px;
}

.breadcrumbs ul li{
	display: inline-block;
	margin-right: 5px;
	font-weight: 600;
	text-transform: uppercase;
	font-size: 12px;
}

.breadcrumbs ul li a{
	text-decoration: none;
	color: #e10707;
}

.breadcrumbs ul li a:hover{
	text-decoration: underline;
	color: #000;
}

.page-inner-title{
	display: block;
	position: relative;
	padding-top: 10px;
}

.single-post-thumb{
	display: block;
	position: relative;
	overflow: hidden;
}

.single-post-thumb img{
	width: 100%;
	height: auto;
}

.single-post-content,
.page-inner-content{
	display: block;
	position: relative;
	font-size: 18px;
	font-weight: 300;
	line-height: 28px;
}

.single-post-content ul{
	margin-left: 30px;
	margin-top: 20px;
}

iframe{
	width: 100%;
}

.wpcf7-text{
	width: 100%;
	margin-bottom: 10px;
	font-weight: 300;
	font-size: 14px;
	padding: 10px;
	border: 1px solid rgba(0,0,0,0.2);
}

.wpcf7-textarea{
	width: 100%;
	height: 200px;
	resize: none;
	margin-bottom: 10px;
	font-weight: 300;
	font-size: 14px;
	padding: 10px;
	border: 1px solid rgba(0,0,0,0.2);
}

.wpcf7-submit{
	width: 100%;
	height: auto;
	border: 1px solid #000;
	padding: 10px;
	text-transform: uppercase;
	font-size: 16px;
	font-weight: 600;
}

.wpcf7-submit:hover{
	color: #e10707;
	border: 1px solid #e10707;
}


        </style>
        <section class="banner" style="background: url('http://foto25.kiev.ua/wp-content/uploads/2018/06/banner.jpg') no-repeat right center; background-size: cover;">
		
			<div class="container hidden-md hidden-lg">
				<div class="row">
					<div class="col-md-12">
						<div class="underbanner-text">
							<h2 class="banner-title">Чому ми?</h2>
							<div class="banner-excerpt" style="padding: 15px;">
								<p>Завдяки новітній професійній фототехніці у нас ви зможете замовити будь-які види фотопослуг, отримавши кваліфіковану консультацію і результат, зробити термінове фото на документи, що отримаєте вже за 5-10 хвилин. Ми приймаємо як друк цифрових фотографій, так і фотографій з фотоплівок, оцифровуємо відео з записом на DVD-диск, роздруковуємо тексти, робимо ксерокопії.</p>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</section>
        <section class="contacts">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mainpage-contacts">
							<h2 class="widget-title">Контакти</h2><div class="textwidget"><p style="text-align: center;">Адреса: 01001, Украина, м. Львів, вул. Личаківська, 25 А</p>
<p style="text-align: center;">E-mail: sophiast1506@gmail.com</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  sophiast1506@gmail.com</p>
<p style="text-align: center;"><br>
Телефон: (044)279-47-96</p></div>						</div>
					</div>
				</div>
			</div>
		</section>
    </main>
    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
            </p>
            <p>Album example is © Bootstrap, but please download and customize it for yourself!</p>
            <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
        </div>
    </footer>
    </body>
    <script>
    document.addEventListener("DOMContentLoaded", () => {
            setTimeout(() => {document.getElementById('msg').style.display = 'none';}, 2000);

  });

    </script>
</html>
