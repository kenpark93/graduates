
<header> 
<div class="navbar navbar-inverse navbar-fixed-top"> 
<div class="container"> 
<div class="navbar-header"> 
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> 
<span class="icon-bar"></span> 
<span class="icon-bar"></span> 
<span class="icon-bar"></span> 
</button> 
<a class="center navbar-brand left" href="http://volpi.ru" target="_blank">ВПИ<i class="fa fa-laptop"></i></a> 
</div> 
<div class="navbar-collapse collapse"> 
<ul class="nav navbar-nav navbar-right right"> 
<li class="cl-effect-1"><a href="http://sema.ru"><i class="fa fa-graduation-cap" style="padding-right:5px;"></i>ВЫПУСКНИКИ</a></li> 
<li class="cl-effect-1"><a href="#"><i class="fa fa-pencil-square-o" style="padding-right:5px;"></i>РЕГИСТРАЦИЯ</a></li> 
<li class="cl-effect-1"><a href="#"><i class="fa fa-user" style="padding-right:5px;"></i>МОЙ ПРОФИЛЬ</a></li> 
<li class="cl-effect-1"><a href="http://forum.volpi.ru/viewtopic.php?t=2214" target="_blank"><i class="fa fa-users" style="padding-right:5px;"></i>ФОРУМ</a></li> 
<li class="cl-effect-1"><a href="http://sema.ru" target="" id="logout"><i class="fa fa-sign-out" style="padding-right:5px;"></i>ВЫХОД</a></li> 

</ul> 
</div> 
</div> 
</div> 
</header> 

<div id="main" class="container-fluid centered dark" style="margin-top: 85px;"> 
<div id="pop">

		</div>
<h1>Мой профиль</h1> 
<div class="row" id="data-container" style="text-align:left;margin-top:25px;"> 
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 centering">
<? 
	if(file_exists("../photos/".$_SESSION["idUser"].".jpg")){
?>
<img src=<? echo $FULL_SITE_PATH."/photos/".$_SESSION["idUser"].".jpg";?> class="activator" style="margin-left:15px;height:350px;width:380px;">
<? 
	} else {
?> 
<img src="http://sema.ru/photos/0.jpg" class="activator" style="margin-left:15px;height:350px;">  
<? 
	}
?>
</div> 
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 centering"> 
<span class="grey-text text-darken-4" id="fio"> </span> 
<div style="margin-top:25px;"> 
<p class="left black-text"><i class="fa fa-building fa-2x"></i><span id="work">Место работы: </span></p> 
<p class="left black-text"><i class="fa fa-phone-square fa-2x"></i><span id="contact">Контакты: </span></p> 
<p class="left black-text"><i class="fa fa-commenting fa-2x"></i><span id="comment">Комментарии: </span></p> 
<p class="left black-text"><i class="fa fa fa-sign-in fa-2x"></i><span id="log">Логин: </span></p> 
<p class="left black-text"><i class="fa fa fa-key fa-2x"></i><span id="pas">Пароль: </span></p>
<form action=<? echo $FULL_SITE_PATH."/inc/upload.php";?> method="post" enctype="multipart/form-data">
    <input type="file" name="filename"><br> 
    <input type="submit" value="Загрузить"><br>
</form> 
</div> 
</div> 
<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 centering"> 
<input class="form-control" id="input1" type="text" style="width:350px;height:25px;margin-top:20px;" disabled> 
<input class="form-control" id="input2" type="text" style="width:350px;height:25px;margin-top:20px;" disabled> 
<input class="form-control" id="input3" type="text" style="width:350px;height:25px;margin-top:20px;" disabled> 
<input class="form-control" id="input4" type="text" style="width:350px;height:25px;margin-top:20px;" disabled> 
<input class="form-control" id="input5" type="password" style="width:350px;height:25px;margin-top:20px;" disabled> 
</div> 
</div> 
<div class="row" id="data-container" style="margin-top:70px;margin-bottom:10px;"> 
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 centering"> 
</div> 
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pull-left" style="margin-left:55px;"> 
<button id="button-more" type="button" class="button-12 mybutton">Редактировать</button> 
</div> 
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pull-left"> 
<button id="button-more1" type="button" class="button-12 mybutton" style="display:none;">Сохранить</button> 
</div> 

</div> 
<h1>Мои однокурсники</h1> 
<div class="row" id="data-container3" style="margin-top:50px;"> 

</div> 
</div> 

<footer class="footer" style="height:79px;"> 
<div id="copyright"> 
<div class="container centered"> 
<div class="row"> 
<div class="col-md-12"> 
<p class="centered"><a href="http://www.volpi.ru/department/vc/" target="_blank">ВЫПУСКНИКИ ВПИ :: РАЗРАБОТАНО В ВЫЧИСЛИТЕЛЬНОМ ЦЕНТРЕ ВПИ</a></p> 
<p>Copyright &copy; 2015 </p> 
</div> 
</div> 
</div> 
</footer> 

<!--Модальное окно--> 
<div class="modal fade" id="regModal" tabindex="-1" role="dialog" aria-labelledby="regModalLabel" aria-hidden="true"> 
<div class="modal-dialog"> 
<div class="modal-content"> 
<div class="modal-header"> 
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
<h4 class="modal-title centered" id="myModalLabel">Регистрация нового пользователя</h4> 
</div> 
<div class="modal-body"> 
<div class="centered"> 
<div class="input-field col-lg-12"> 
<i class="fa fa-user prefix"></i> 
<input name="nameFF" id="icon_prefix" type="text" class="validate">
<label for="icon_prefix">Логин</label> 
</div> 
<div class="input-field col-lg-12"> 
<i class="fa fa-key prefix"></i> 
<input name="contactFF" id="icon_prefix2" type="password" class="validate"> 
<label for="icon_prefix">Пароль</label> 
</div> 
<div class="input-field col-lg-12"> 
<i class="fa fa-key prefix"></i> 
<input name="contactFF" id="icon_prefix2" type="password" class="validate"> 
<label for="icon_prefix2">Подтверждение пароля</label> 
</div> 
<div class="input-field col-lg-12"> 
<i class="fa fa-text-width prefix"></i> 
<input name="contactFF" id="icon_prefix2" type="text" class="validate"> 
<label for="icon_prefix2">ФИО</label> 
</div> 
<div class="input-field col-lg-12"> 
<i class="fa fa-text-width prefix"></i> 
<input name="contactFF" id="icon_prefix2" type="text" class="validate"> 
<label for="icon_prefix2">Год выпуска</label> 
</div> 
<div class="input-field col-lg-12"> 
<i class="fa fa-text-width prefix"></i> 
<input name="contactFF" id="icon_prefix2" type="text" class="validate"> 
<label for="icon_prefix2">Факультет</label> 
</div> 
<div class="input-field col-lg-12"> 
<i class="fa fa-text-width prefix"></i> 
<input name="contactFF" id="icon_prefix2" type="text" class="validate"> 
<label for="icon_prefix2">Тип диплома</label> 
</div> 
<div class="input-field col-lg-12"> 
<i class="fa fa-text-width prefix"></i> 
<input name="contactFF" id="icon_prefix2" type="text" class="validate"> 
<label for="icon_prefix2">Форма обучения</label> 
</div> 
<div class="input-field col-lg-12"> 
<i class="fa fa-text-width prefix"></i> 
<input name="contactFF" id="icon_prefix2" type="text" class="validate"> 
<label for="icon_prefix2">Направление</label> 
</div> 
<div class="input-field col-lg-12"> 
<i class="fa fa-text-width prefix"></i> 
<input name="contactFF" id="icon_prefix2" type="text" class="validate"> 
<label for="icon_prefix2">Текущее место работы</label> 
</div> 
<div class="input-field col-lg-12"> 
<i class="fa fa-phone prefix"></i> 
<input name="contactFF" id="icon_prefix2" type="text" class="validate"> 
<label for="icon_prefix2">Контактная информация</label> 
</div> 
<div class="input-field col-lg-12"> 
<i class="fa fa-text-width prefix"></i> 
<input name="contactFF" id="icon_prefix2" type="text" class="validate"> 
<label for="icon_prefix2">Комментарии</label> 
</div> 
</div> 
</div> 
<div class="modal-footer"> 
<div class="centered"> 
<button type="button" class="button-12 mybutton" data-dismiss="modal">ЗАРЕГИСТРИРОВАТЬСЯ</button> 
</div> 
</div> 
</div> 
</div> 
</div> 

<!--Модалка авторизации--> 
<div class="modal fade" id="authModal" tabindex="-1" role="dialog" aria-labelledby="authModalLabel" aria-hidden="true"> 
<div class="modal-dialog"> 
<div class="modal-content"> 
<div class="modal-header"> 
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
<h4 class="modal-title" id="myModalLabel">Вход в аккаунт</h4> 
</div> 
<div
class="modal-body"> 
<div class="centered"> 
<div class="input-field col-lg-12"> 
<i class="fa fa-user prefix"></i> 
<input name="nameFF" id="icon_prefix" type="text" class="validate">
<label for="icon_prefix">Логин</label> 
</div> 
<div class="input-field col-lg-12"> 
<i class="fa fa-key prefix"></i> 
<input name="contactFF" id="icon_prefix2" type="password" class="validate"> 
<label for="icon_prefix2">Пароль</label> 
</div> 
</div> 
</div> 
<div class="modal-footer"> 
<div class="centered"> 
<button type="button" class="button-12 mybutton" data-dismiss="modal">ВОЙТИ</button> 
</div> 
</div> 
</div> 
</div> 
</div>


	<script>
	var forms=new Array("","Дневное полное","Дневное полное","Вечернее полное", "Заочное полное", "Дневное сокращенное", "Вечернее сокращенное", "Заочное сокращенное", "Второе высшее");
		var grads=new Array("","Специалист","Бакалавр", "Магистр");
		var facul=new Array("","Инженерно-экономический","Автомеханический", "Вечерний");
		var userID = <?php echo $_SESSION["idUser"]; ?>;
		var userYear;
		var namedi;
		$(document).ready(function(){
			getUserInfo();
			
		});
		var getUserInfo = function() {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (xhttp.readyState==4 && xhttp.status==200) {
					try {
						var response = $.parseJSON(xhttp.responseText);
						
						if(response!=null) {
							//зполнение полей
							$("#input1").val(response[0]["workplace"]);
							$("#input2").val(response[0]["contacts"]);
							$("#input3").val(response[0]["comments"]);
							$("#input4").val(response[0]["login"]);
							userYear=response[0]["year"];
							namedi=response[0]["namedirection"];
							getUserOdn();
						} else {
							var r = $('<div id="alert-warning" class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Warning!</strong> Ошибка загрузки!</div>');
				setTimeout(timeoutFunc,3000);
						$("#pop").append(r);
						}
					} catch (e) {
						var r = $('<div id="alert-warning" class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Warning!</strong> Ошибка загрузки!</div>');
				setTimeout(timeoutFunc,3000);
						$("#pop").append(r);
					}
					
				}
			};
				obj = JSON.stringify({action:"getuserInfoById",id:userID});
				xhttp.open("POST", 'http://sema.ru/inc/ajax.php', true);
				xhttp.setRequestHeader("Content-Type","application/json");
				xhttp.send(obj);
		};
			var getUserOdn = function() {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (xhttp.readyState==4 && xhttp.status==200) {
					try {
						var response = $.parseJSON(xhttp.responseText);
						if(response!=null) {
							//зполнение полей
							for(i=0;i<response.length;i++) {
								var r = $('<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 centering"><div class="card"><div class="card-image waves-effect waves-block waves-light">	<img class="activator" src="http://sema.ru/photos/'+response[i]["id_graduate"]+'.jpg" onerror="errorHandler(this)"></div><div class="card-content"><span class="card-title activator grey-text text-darken-4">'+response[i]["studentname"]+'</span><br><span class="card-title activator grey-text text-darken-4">Год выпуска: '+response[i]["year"]+'<i class="material-icons right">more_vert</i></span></div><div class="card-reveal"><span class="card-title grey-text text-darken-4">'+response[i]["studentname"]+'<i class="material-icons right">close</i></span><p class="left black-text"><i class="fa fa-calendar fa-2x"></i><span>Год выпуска: '+response[i]["year"]+'</span></p><p class="left black-text"><i class="fa fa-cog fa-2x"></i><span>Факультет: '+facul[response[i]["id_faculty"]]+'</span></p><p class="left black-text"><i class="fa fa-graduation-cap fa-2x"></i><span>Форма обучения: '+forms[response[i]["learn_form"]]+'</span></p><p class="left black-text"><i class="fa fa-book fa-2x"></i><span>Тип диплома: '+grads[response[i]["learn_type"]]+'</span></p><p class="left black-text"><i class="fa fa-suitcase fa-2x"></i><span>Специальность: '+response[i]["namedirection"]+'</span></p><p class="left black-text"><i class="fa fa-building fa-2x"></i><span>Место работы: '+response[i]["workplace"]+'</span></p><p class="left black-text"><i class="fa fa-phone-square fa-2x"></i><span>Контакты: '+response[i]["contacts"]+'</span></p><p class="left black-text"><i class="fa fa-commenting fa-2x"></i><span>Комментарии: '+response[i]["comments"]+'</span></p></div></div></div>');
								$("#data-container3").append(r);
							}
							
						} else {
							var r = $('<div id="alert-warning" class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Warning!</strong> Никого не найдено(!</div>');
				setTimeout(timeoutFunc,3000);
						$("#pop").append(r);
						}
					} catch (e) {
						var r = $('<div id="alert-warning" class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Warning!</strong> Никого не найдено(!</div>');
				setTimeout(timeoutFunc,3000);
						$("#pop").append(r);
					}
					
				}
			};
				obj = JSON.stringify({action:"getOdn",year:userYear,namedirection:namedi});
				console.log(obj);
				xhttp.open("POST", 'http://sema.ru/inc/ajax.php', true);
				xhttp.setRequestHeader("Content-Type","application/json");
				xhttp.send(obj);
		};
		var saveUserInfo = function() {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (xhttp.readyState==4 && xhttp.status==200) {
					try {
						var response = xhttp.responseText;//$.parseJSON(xhttp.responseText);
						if(response!=null) {
							var r = $('<div id="alert-warning" class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Изменения сохрнены!</div>');
				setTimeout(timeoutFunc,3000);
						$("#pop").append(r);
						} else {
							var r = $('<div id="alert-warning" class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Warning!</strong> Ошибка!</div>');
				setTimeout(timeoutFunc,3000);
						$("#pop").append(r);
						}
					} catch (e) {
						var r = $('<div id="alert-warning" class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Warning!</strong> Ошибка!</div>');
				setTimeout(timeoutFunc,3000);
						$("#pop").append(r)
					}
					
				}
			};
			work = $('#input1').val();
			cont = $('#input2').val();
			com = $('#input3').val();
			log = $('#input4').val();
			pas = $('#input5').val();
			if(work!="" && cont!="" && com!="" && log!=""){
				if(pas!=""){
					obj = JSON.stringify({action:"updateUserInfo",id:userID,w:work,con:cont,co:com,l:log,p:pas});
				} else {
					obj = JSON.stringify({action:"updateUserInfo",id:userID,w:work,con:cont,co:com,l:log,p:"-1"});
				}
				console.log(obj);
				xhttp.open("POST", 'http://sema.ru/inc/ajax.php', true);
				xhttp.setRequestHeader("Content-Type","application/json");
				xhttp.send(obj);
				
			} else {
				var r = $('<div id="alert-warning" class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Warning!</strong> Заполните поля</div>');
				setTimeout(timeoutFunc,3000);
						$("#pop").append(r)
			}
		};		

		$(function(){
	    $('#button-more').on('click',function(){
	    	$('#input1').attr('disabled', false);
	    	$('#input2').attr('disabled', false);
	    	$('#input3').attr('disabled', false);
	    	$('#input4').attr('disabled', false);
	    	$('#input5').attr('disabled', false);
	    	$('#button-more1').show();
	    });
	    $('#button-more1').on('click',function(){
	    	$('#input1').attr('disabled', true);
	    	$('#input2').attr('disabled', true);
	    	$('#input3').attr('disabled', true);
	    	$('#input4').attr('disabled', true);
	    	$('#input5').attr('disabled', true);    
	    	saveUserInfo();
	    	$('#button-more1').hide();
	    });
	});
	$("#logout").on('click',function(){
			location.reload();
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (xhttp.readyState==4 && xhttp.status==200) {
					
				}
			};
				obj = JSON.stringify({action:"logout"});
				xhttp.open("POST", 'http://sema.ru/inc/ajax.php', true);
				xhttp.setRequestHeader("Content-Type","application/json");
				xhttp.send(obj);
	});
	function errorHandler(e){
		$(e).attr("src","../photos/0.jpg");
	}
	function timeoutFunc(){
		$("#alert-warning").remove();
		if (prs){
			prs = false;
			location.reload();
		}
	}
	</script>



  
	