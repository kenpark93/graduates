<?
$prop1=getCount();
$count = intval($prop1[0][0]);
$CONST_COUNT=$count;
$currentCount=0;
if($count<=6) {
	$prop=getLastGrad($count);
	$currentCount+=$count;
} else {
	$prop=getLastGrad(6);
	$god=getYear();
	$nap=getNap();
	$currentCount=+6;
	$count=$count-6;
}
?>
<header>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="center navbar-brand left" href="http://volpi.ru">ВПИ<i class="fa fa-laptop"></i></a>
				</div>
				<div class="navbar-collapse collapse">
		          <ul class="nav navbar-nav navbar-right right">            
		            <li class="cl-effect-1"><a href="http://sema.ru"><i class="fa fa-graduation-cap" style="padding-right:5px;"></i>ВЫПУСКНИКИ</a></li>
		            
					<?
					if(isset($_SESSION["idUser"]))
					{
					?>
					<li class="cl-effect-1"><a href="#"><i class="fa fa-pencil-square-o" style="padding-right:5px;"></i>РЕГИСТРАЦИЯ</a></li>
					<li class="cl-effect-1"><a href='<? echo $FULL_SITE_PATH."/maket/userRoom.php";?>'><i class="fa fa-user" style="padding-right:5px;"></i>МОЙ ПРОФИЛЬ</a></li>
					<?
					}
					else
					{
					?>
					<li class="cl-effect-1"><a data-toggle="modal" data-target="#regModal" href="#regModal"><i class="fa fa-pencil-square-o" style="padding-right:5px;"></i>РЕГИСТРАЦИЯ</a></li>
		            <li class="cl-effect-1"><a data-toggle="modal" data-target="#authModal" href="#authModal"><i class="fa fa-user" style="padding-right:5px;"></i>МОЙ ПРОФИЛЬ</a></li>
					<?
					}
					?>
		            <li class="cl-effect-1"><a href="http://forum.volpi.ru/viewtopic.php?t=2214" target="_blank"><i class="fa fa-users" style="padding-right:5px;"></i>ФОРУМ</a></li>
		          </ul>
		        </div>
			</div>
		</div>
	</header>
	<div id="main" class="container-fluid centered dark" style="margin-top: 85px;">
		<h1>Добро пожаловать, выпускники!</h1>
		
		<div class="row" id="data-container2"  style="text-align:left;">
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">	
				<ul class="dropdown" style="margin-left:110px;">
					<li  id="sub1"><a id="ayear">Год выпуска</a>
						<ul class="sub_menu">
						<li class='suby'><a id='y2'>Все года</a></li>
						<? 
						foreach ($god as $value) {
    echo "<li class='suby'><a id='y2'>{$value["year"]}</a></li>";
}
						?>
						</ul>
				</ul>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">	
				<ul class="dropdown" style="margin-left:110px;">
				<li  id="sub2"><a id="atype">Тип диплома</a>
					<ul class="sub_menu">
						<li class="subt"><a id="t1">Все типы дипломов</a></li>
						<li class="subt"><a id="t1">Специалист</a></li>
				        <li class="subt"><a id="t2">Бакалавр</a></li>        	
				        <li class="subt"><a id="t3">Магистр</a></li>
					</ul>
				</ul>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">	
				<ul class="dropdown" style="margin-left:110px;">
				<li  id="sub3"><a id="aform">Форма обучения</a>
					<ul class="sub_menu">
						<li class="subf"><a id="f1">Все формы обучения</a></li>
						<li class="subf"><a id="f1">Дневное полное</a></li>
				        <li class="subf"><a id="f2">Вечернее полное</a></li>        	
				        <li class="subf"><a id="f3">Заочное полное</a></li>
				        <li class="subf"><a id="f4">Дневное сокращенное</a></li>
				        <li class="subf"><a id="f5">Вечернее сокращенное</a></li>
				        <li class="subf"><a id="f6">Заочное сокращенное</a></li>
				        <li class="subf"><a id="f7">Второе высшее</a></li>
					</ul>
				</ul>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">	
				<ul class="dropdown" style="margin-left:110px;">
				<li  id="sub2"><a style="font-size:14px;" id="anapr">Направление обучения</a>
					<ul class="sub_menu">
					<li class="subn"><a id="y2">Все направления</a></li>
					<? 
						foreach ($nap as $value) {

    echo "<li class='subn'><a id='y2'>{$value["namedirection"]}</a></li>";
}
						?>
					</ul>
				</ul>
			</div>
			<button id="searchBtn" type="button" class="button-12" style="text-align:center;margin-left:110px;">Поиск</button>

		</div>
<div id="pop">

		</div>
		<div class="row" id="data-container">
		
			<?
			$forms=array("","Дневное полное","Вечернее полное", "Заочное полное", "Дневное сокращенное", "Вечернее сокращенное", "Заочное сокращенное", "Второе высшее");
			$grads=array("","Специалист","Бакалавр", "Магистр");
			$facul=array("","Инженерно-экономический","Автомеханический", "Вечерний");
     foreach($prop as $pItem)
     {
     	if (file_exists("photos/".$pItem["id_graduate"].".jpg")) {
    	$photo = $pItem["id_graduate"];
		$format = "jpg";
		} elseif (file_exists("photos/".$pItem["id_graduate"].".JPG")) {
    	$photo = $pItem["id_graduate"];
		$format = "JPG";
		} elseif (file_exists("photos/".$pItem["id_graduate"].".jpeg")) {
    	$photo = $pItem["id_graduate"];
		$format = "jpeg";
		} elseif (file_exists("photos/".$pItem["id_graduate"].".JPEG")) {
    	$photo = $pItem["id_graduate"];
		$format = "JPEG";
		} elseif (file_exists("photos/".$pItem["id_graduate"].".gif")) {
    	$photo = $pItem["id_graduate"];
		$format = "gif";
		} elseif (file_exists("photos/".$pItem["id_graduate"].".GIF")) {
    	$photo = $pItem["id_graduate"];
		$format = "GIF";
		} elseif (file_exists("photos/".$pItem["id_graduate"].".bmp")) {
    	$photo = $pItem["id_graduate"];
		$format = "bmp";
		} elseif (file_exists("photos/".$pItem["id_graduate"].".BMP")) {
    	$photo = $pItem["id_graduate"];
		$format = "BMP";
		} else{
			$photo = 0;
   			$format = "jpg";
		}
         echo <<<NITEM
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 centering">
				<div class="card">
					<div class="card-image waves-effect waves-block waves-light">
						<img class="activator" src="../photos/{$photo}.{$format}">
					</div>
					<div class="card-content">
						<span class="card-title activator grey-text text-darken-4"><strong>{$pItem["studentname"]}</strong></span><br>
						<span class="card-title activator grey-text text-darken-4">Год выпуска: {$pItem["year"]}<i class="material-icons right">more_vert</i></span>  
					</div>
					<div class="card-reveal">
						<span class="card-title grey-text text-darken-4">{$pItem["studentname"]}<i class="material-icons right">close</i></span>
						<p class="left black-text"><i class="fa fa-calendar fa-2x"></i><span>Год выпуска: {$pItem["year"]}</span></p>
						<p class="left black-text"><i class="fa fa-cog fa-2x"></i><span>Факультет: {$facul[$pItem["id_faculty"]]}</span></p>
						<p class="left black-text"><i class="fa fa-graduation-cap fa-2x"></i><span>Форма обучения: {$forms[$pItem["learn_form"]]}</span></p>
						<p class="left black-text"><i class="fa fa-book fa-2x"></i><span>Тип диплома: {$grads[$pItem["learn_type"]]}</span></p>
						<p class="left black-text"><i class="fa fa-suitcase fa-2x"></i><span>Специальность: {$pItem["namedirection"]}</span></p>							 
						<p class="left black-text"><i class="fa fa-building fa-2x"></i><span>Место работы: {$pItem["workplace"]}</span></p>
						<p class="left black-text"><i class="fa fa-phone-square fa-2x"></i><span>Контакты: {$pItem["contacts"]}</span></p>
						<p class="left black-text"><i class="fa fa-commenting fa-2x"></i><span>Комментарии: {$pItem["comments"]}</span></p>

					</div>
				</div>
			</div>
	
NITEM;
     }
    ?>
			
			

		</div>
	</div>
	<div class="centered">
		<button id="button-more" type="button" class="button-12 mybutton">ЕЩЁ</button>
    </div>
	<footer class="footer">
		<div id="copyright">
			<div class="container centered">
				<div class="row">
					<div class="col-md-12">
						<p class="centered"><a href="http://www.volpi.ru/department/vc/" target="_blank">ВЫПУСКНИКИ ВПИ :: РАЗРАБОТАНО В ВЫЧИСЛИТЕЛЬНОМ ЦЕНТРЕ ВПИ</a></p>
						<p>Copyright &copy; 2015 </p>
					</div>
				</div>
			</div>
		</div>
	</footer>

<!--Модальное окно-->
	<div class="modal fade" id="regModal" tabindex="-1" role="dialog" aria-labelledby="regModalLabel" aria-hidden="true" style="z-index:2001;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        		<h4 class="modal-title centered" id="myModalLabel">Регистрация нового пользователя</h4>
				</div>
				<div class="modal-body">
					<div class="centered">
						<div id="cont"></div>
						<div class="input-field col-lg-12">
							<i class="fa fa-user prefix"></i>
            				<input name="login" id="login" type="text" class="validate" autofocus required>
            				<label for="icon_prefix">Логин</label>
						</div>
						<div class="input-field col-lg-12">
				            <i class="fa fa-key prefix"></i>
				            <input name="pass" id="pass" type="password" class="validate" required>
				            <label for="icon_prefix">Пароль</label>
				        </div>  
				        <div class="input-field col-lg-12">
				            <i class="fa fa-key prefix"></i>
				            <input name="pass_confirm" id="pass_confirm" type="password" class="validate" required>
				            <label for="icon_prefix2">Подтверждение пароля</label>
				        </div> 
				        <div class="input-field col-lg-12">
				            <i class="fa fa-text-width prefix"></i>
				            <input name="fio" id="fio" type="text" class="validate" required>
				            <label for="icon_prefix2">ФИО</label>
				        </div> 
				        <div class="input-field col-lg-12">
				            <i class="fa fa-text-width prefix"></i>
				            <input name="year" id="year" type="text" class="validate" required>
				            <label for="icon_prefix2">Год выпуска</label>
				        </div> 
				        <div class="input-field col-lg-12">
				            <i class="fa fa-text-width prefix" style="left:0;margin-left:15px;"></i>
				            <form action="" id="facsReg">
								<select id="types"  style="width:355px;margin-left:155px;margin-top:15px;">
									<option value="Инженерно-экономический">Инженерно-экономический</option>
									<option value="Автомеханический">Автомеханический</option>
									<option value="Вечерний">Вечерний</option>
								</select>
							</form>				            
				            <label for="typesReg">Факультет</label>
				        </div> 
				        <div class="input-field col-lg-12">
				            <i class="fa fa-text-width prefix" style="left:0;margin-left:15px;"></i>
				            <form action="" id="typesReg">
								<select id="types"  style="width:355px;margin-left:155px;margin-top:15px;">
									<option value="Специалист">Специалист</option>
									<option value="Магистр">Магистр</option>
									<option value="Бакалавр">Бакалавр</option>
								</select>
							</form>				            
				            <label for="typesReg">Тип диплома</label>
				        </div> 
				        <div class="input-field col-lg-12">
				            <i class="fa fa-text-width prefix" style="left:0;margin-left:15px;"></i>
				            <form action="" id="formsReg">
								<select id="forms" style="width:335px;margin-left:175px;margin-top:15px;">
									<option value="Дневное полное">Дневное полное</option>
									<option value="Вечернее полное">Вечернее полное</option>
									<option value="Дневное сокращенное">Дневное сокращенное</option>
									<option value="Вечернее сокращенное">Вечернее сокращенное</option>
									<option value="Заочное сокращенное">Заочное сокращенное</option>
									<option value="Второе высшее">Второе высшее</option>
								</select>
							</form>
				            <label for="icon_prefix2">Форма обучения</label>
				        </div> 
				        <div class="input-field col-lg-12">
				            <i class="fa fa-text-width prefix" style="left:0;margin-left:15px;"></i>
				            <form action="" id="napravReg">
								<select id="napravs" style="width:355px;margin-left:155px;margin-top:15px;">
								<option value="Информатика и вычислительная техника">Информатика и вычислительная техника</option>
									<option value="Экономика">Экономика</option>
									<option value="Программная инженерия">Программная инженерия</option>
									<option value="Химическая технология и биотехнология">Химическая технология и биотехнология</option>
									<option value="Менеджмент">Менеджмент</option>
									<option value="Автоматизация и управление">Автоматизация и управление</option>
									<option value="Эксплуатация транспортных средств">Эксплуатация транспортных средств</option>									
									<option value="Технологические машины и оборудование">Технологические машины и оборудование</option>									
									<option value="Технология, оборудование и автоматизация машин. производств">Технология, оборудование и автоматизация машин. производств</option>									
									<option value="Машины и аппараты химических производств">Машины и аппараты химических производств</option>									
									<option value="Химическая технология высокомолекулярных соединений">Химическая технология высокомолекулярных соединений</option>									
									<option value="Экономика и управление на предприятии">Экономика и управление на предприятии</option>									
									<option value="Автоматизация технологических процессов и производств">Автоматизация технологических процессов и производств</option>									
									<option value="Технология переработки пластических масс и эластомеров">Технология переработки пластических масс и эластомеров</option>									
									<option value="Автоматизированные системы обработки информации и управления">Автоматизированные системы обработки информации и управления</option>									
									<option value="Автомобили и автомобильное хозяйство">Автомобили и автомобильное хозяйство</option>									
									<option value="ехнология машиностроения">ехнология машиностроения</option>									
									<option value="Стандартизация и метрология">Стандартизация и метрология</option>									
									<option value="Конструкторско-технологическое обеспечение машиностроительных производств">Конструкторско-технологическое обеспечение машиностроительных производств</option>									
									<option value="Энерго- и ресурсосберегающие процессы в химической технологии, нефтехимии и биотехнологии">Энерго- и ресурсосберегающие процессы в химической технологии, нефтехимии и биотехнологии</option>									
									<option value="Эксплуатация транспортно-технологических машин и комплексов">Эксплуатация транспортно-технологических машин и комплексов</option>									
									<option value="Химическая технология">Химическая технология</option>
								<? /*
						foreach ($nap as $value) {
    echo "<option value='{$value["namedirection"]}'>{$value["namedirection"]}</option>";
}
						*/?>									
								</select>
							</form>
				            <label for="icon_prefix2">Направление</label>
				        </div> 
					</div>
				</div>
				<div class="modal-footer">
	        		<div class="centered">
	           			<button id="done_reg" type="submit" class="button-12 mybutton">ЗАРЕГИСТРИРОВАТЬСЯ</button>
          			</div>
	      		</div>
			</div>	
		</div>
	</div>

	<!--Модалка авторизации-->
	<div class="modal fade" id="authModal" tabindex="-1" role="dialog" aria-labelledby="authModalLabel" aria-hidden="true" style="z-index:2001;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        		<h4 class="modal-title" id="myModalLabel">Вход в аккаунт</h4>
				</div>
				<div class="modal-body">
					<div class="centered">
					<div id="con1"></div>
						<div class="input-field col-lg-12">
							<i class="fa fa-user prefix"></i>
            				<input name="nameFF" id="authLog" type="text" class="validate">
            				<label for="icon_prefix">Логин</label>
						</div>
						<div class="input-field col-lg-12">
				            <i class="fa fa-key prefix"></i>
				            <input name="contactFF" id="authPas" type="password" class="validate">
				            <label for="icon_prefix2">Пароль</label>
				        </div>  				    
					</div>
				</div>
				<div class="modal-footer">
	        		<div class="centered">
	           			<button id="loginBtn" type="button" class="button-12 mybutton">ВОЙТИ</button>
          			</div>
	      		</div>
			</div>	
		</div>
	</div>


	<script>
	var prs = false;
	var photo=0;
	var searchArray = ["0","0","0","0"];
	var forms=new Array("","Дневное полное","Вечернее полное", "Заочное полное", "Дневное сокращенное", "Вечернее сокращенное", "Заочное сокращенное", "Второе высшее");
		var grads=new Array("","Специалист","Бакалавр", "Магистр");
		var facul=new Array("","Инженерно-экономический","Автомеханический", "Вечерний");
		var today = new Date();
		var upperyear = today.getFullYear();
		$(function(){
			//сколько осталось записей
			var leftCount = <?php echo $count; ?>;
			var loadedCount = <?php echo $currentCount; ?>;
			var CONST_COUNT = <?php echo $CONST_COUNT; ?>;
	    $('#button-more').on('click',function(){	
			if(leftCount>0){
				if(leftCount<=6) {					
					getRecordsAjax(loadedCount,leftCount);
					loadedCount+=leftCount;
					leftCount-=leftCount;
				} else {					
					getRecordsAjax(loadedCount,6);
					loadedCount+=6;
					leftCount-=6;
				}
			} else {
				$("#pop").empty();
				var r = $('<div id="alert-warning" class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Warning!</strong> Записей больше нет!</div>');
				setTimeout(timeoutFunc,3000);
						$("#pop").append(r);
			}

		});
	});
	
	var usersTempArray;
	//загрузка записей
	var getRecordsAjax = function(x,y) {
		a=x;
		b=y;
		var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (xhttp.readyState==4 && xhttp.status==200) {
					var response = $.parseJSON(xhttp.responseText);
					usersTempArray=response;
					for(i=0;i<response.length;i++) {
						var r = $('<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 centering"><div class="card"><div class="card-image waves-effect waves-block waves-light">	<img class="activator" src="photos/'+response[i]["id_graduate"]+'.jpg" onerror="errorHandler(this)"></div><div class="card-content"><span class="card-title activator grey-text text-darken-4"><strong>'+response[i]["studentname"]+'</strong></span><br><span class="card-title activator grey-text text-darken-4">Год выпуска: '+response[i]["year"]+'<i class="material-icons right">more_vert</i></span></div><div class="card-reveal"><span class="card-title grey-text text-darken-4">'+response[i]["studentname"]+'<i class="material-icons right">close</i></span><p class="left black-text"><i class="fa fa-calendar fa-2x"></i><span>Год выпуска: '+response[i]["year"]+'</span></p><p class="left black-text"><i class="fa fa-cog fa-2x"></i><span>Факультет: '+facul[response[i]["id_faculty"]]+'</span></p><p class="left black-text"><i class="fa fa-graduation-cap fa-2x"></i><span>Форма обучения: '+forms[response[i]["learn_form"]]+'</span></p><p class="left black-text"><i class="fa fa-book fa-2x"></i><span>Тип диплома: '+grads[response[i]["learn_type"]]+'</span></p><p class="left black-text"><i class="fa fa-suitcase fa-2x"></i><span>Специальность: '+response[i]["namedirection"]+'</span></p><p class="left black-text"><i class="fa fa-building fa-2x"></i><span>Место работы: '+response[i]["workplace"]+'</span></p><p class="left black-text"><i class="fa fa-phone-square fa-2x"></i><span>Контакты: '+response[i]["contacts"]+'</span></p><p class="left black-text"><i class="fa fa-commenting fa-2x"></i><span>Комментарии: '+response[i]["comments"]+'</span></p></div></div></div>');
						$("#data-container").append(r);
					}
					
				}
			};
			obj = JSON.stringify({x:a,y:b,action:"getRec"});
			xhttp.open("POST", 'http://sema.ru/inc/ajax.php', true);
			xhttp.setRequestHeader("Content-Type","application/json");
			xhttp.send(obj);
	}
	
	//клик регистрации
	$('#done_reg').on('click',function(){
		login = $("#login").val().replace(/(<.*?>)/g, "");
		pass = $("#pass").val().replace(/(<.*?>)/g, "");
		conf_pass = $("#pass_confirm").val().replace(/(<.*?>)/g, "");
		fio = $("#fio").val().replace(/(<.*?>)/g, "");
		year = $("#year").val().replace(/(<.*?>)/g, "");
		faculty = $("#facsReg option:selected").text();//
		diplom = $("#typesReg option:selected").text();//
		forma = $("#formsReg option:selected").text();//
		naprav = $("#napravReg option:selected").text();//
		switch(diplom) {
			case "Бакалавр":
				diplom="2"
				break
			case "Магистр":
				diplom="3"
				break
			case "Специалист":
				diplom="1"
				break
			default:
				break
		}
		switch(forma) {
				case "Дневное полное":
					forma="1"
					break
				case "Вечернее полное":
					forma="2"
					break	
				case "Заочное полное":
					forma="3"
					break
				case "Дневное сокращенное":
					forma="4"
					break
				case "Вечернее сокращенное":
					forma="5"
					break
				case "Заочное сокращенное":
					forma="6"
					break
				case "Второе высшее":
					forma="7"
					break
				default:
					break
				
		}
		switch(faculty) {
			case "Инженерно-экономический":
				faculty="1"
				break
			case "Автомеханический":
				faculty="2"
				break
			case "Вечерний":
				faculty="3"
				break
			default:
				break
		}
		var bValid=true;                         //Тут проверка начинается регистрации
    //Проверка логина
      var iLog=$("#login");
      var reLog = /^[a-zA-z0-9_]{1,10}$/;
      if(!reLog.test(login)) {
      		var a = $('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Warning!</strong> Логин не задан!</div>');
						$("#cont").append(a);
          iLog.css("border-color", "red");
          bValid=false;

      }
      else{
		  iLog.css("border-color","#ccc");
		
	  }
	  var iFIO=$("#fio");
    var reFIO = /^[А-ЯЁ][а-яё]+ [А-ЯЁ][а-яё]+$/;
    var re1FIO = /^[А-ЯЁ][а-яё]+ [А-ЯЁ][а-яё]+ [А-ЯЁ][а-яё]+$/;
    if(!reFIO.test(fio)) {
    	if(!re1FIO.test(fio))
    	{
    	var a1 = $('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Warning!</strong> Имя не верное!</div>');
						$("#cont").append(a1);
        iFIO.css("border-color", "red");
        bValid=false;
    }}
    else
	{
		iFIO.css("border-color","#ccc");
	}
    
	//Проверка пароля. У пароля и логина совпадают регулярные выражения
    var iPas=$("#pass");
    if(!reLog.test(pass)) {
    	var a2 = $('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Warning!</strong> Ошибка в пароле!</div>');
						$("#cont").append(a2);
        iPas.css("border-color", "red");
        bValid=false;
    }
    else
	{
		iPas.css("border-color","#ccc");
	}
        

    //Проверка подтверждения пароля
    var iConfPas=$("#pass_confirm");
    if(conf_pass!=pass) {
    	    	var a3 = $('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Warning!</strong> Пароли не совпадают!</div>');
						$("#cont").append(a3);
        iConfPas.css("border-color", "red");
        bValid=false;
    }
    else
	{
		iConfPas.css("border-color","#ccc");
	}
        
	//Проверка года
    var iYear=$("#year").val();
	var cssYear = $("#year");
    var reYEAR = /^([1|2][0|9][0-9]{2})$/;
    if(!reYEAR.test(iYear)) {
    	var a4 = $('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Warning!</strong> Проблема с годом!</div>');
    	$("#cont").append(a4);
        cssYear.css("border-color", "red");
        bValid=false;
    }
    else
		if(iYear>1960 && iYear<=upperyear)
	{
		cssYear.css("border-color","#ccc");
	}
    else{
		var a5 = $('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Warning!</strong> Проблема с годом!</div>');
		$("#cont").append(a5);
		bValid=false;
	}
          
	if (bValid==true)
	{
		checkUser();
		
	}

	$("#cont").append(a5);
	});	
	//регистрация
		var regUser = function() {
		var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (xhttp.readyState==4 && xhttp.status==200) {
					var response = xhttp.responseText;//$.parseJSON(xhttp.responseText);
					if(response) {
						var b = $('<div id="alert-warning" class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Успешная регистрация</div>');
						setTimeout(timeoutFunc,3000);
		$("#pop").append(b);
						$('#regModal').modal('toggle');
					} else {
						var b = $('<div id="alert-warning" class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ошибка регистрации</div>');
						setTimeout(timeoutFunc,3000);
		$("#pop").append(b);
					}
					
				}
			};
			if(true) {
				obj = JSON.stringify({action:"reg",log:login,pas:pass,cp:conf_pass,fio:fio,year:year,fac:faculty,dip:diplom,form:forma,napr:naprav});
				xhttp.open("POST", 'http://sema.ru/inc/ajax.php', true);
				xhttp.setRequestHeader("Content-Type","application/json");
				xhttp.send(obj);
			} else {
				//alert("Ошибка!");
			}
	}
	
	//проверка
	var checkUser = function() {
		var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (xhttp.readyState==4 && xhttp.status==200) {
					var response = $.parseJSON(xhttp.responseText);
					if(response==null || response.length<5) {
						regUser();
					} else {
						var a6 = $('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Warning!</strong> Такой логин уже существует!</div>');
		$("#cont").append(a6);
					}
					
				}
			};
			if(true) {
				obj = JSON.stringify({action:"check",log:login});
				xhttp.open("POST", 'http://sema.ru/inc/ajax.php', true);
				xhttp.setRequestHeader("Content-Type","application/json");
				xhttp.send(obj);
			} else {

			}
	}
	///////////
	//авторизация
	//////////
	$('#loginBtn').on('click',function(){
		log = $("#authLog").val().replace(/(<.*?>)/g, "");
		pas = $("#authPas").val().replace(/(<.*?>)/g, "");
		var iLogin=$("#authLog");
		bValid=true;
      var reLog = /^[a-zA-z0-9_]{1,10}$/;
      if(!reLog.test(log)) 
      {
          iLogin.css("border-color", "red");
          bValid=false;
      }
      else
      {
		  iLogin.css("border-color","#ccc");
	  }

	var iPass=$("#authPas");
    if(!reLog.test(pas)) 
    {
        iPass.css("border-color", "red");
        bValid=false;
    }
    else
	{
		iPass.css("border-color","#ccc");
	}
	if (bValid==true)
	{
		authUser(log,pas);
	}
	else
	{
		var b2 = $('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Warning!</strong> Ошибка авторизации!</div>');
		$("#con1").append(b2);
	}
				
		
	});	
	var authUser = function(log,pass) {
		var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (xhttp.readyState==4 && xhttp.status==200) {
					var response =$.parseJSON(xhttp.responseText);
					if(response!=null) {
						id = response[0]["id_graduate"];
						$('#authModal').modal('toggle');
						openSession();
						
					} else {
						
					}
					
				}
			};
			if(true) {
				obj = JSON.stringify({action:"log",log:log,pas:pass});
				xhttp.open("POST", 'http://sema.ru/inc/ajax.php', true);
				xhttp.setRequestHeader("Content-Type","application/json");
				xhttp.send(obj);
			} else {

			}
	}
		var openSession = function() {
		var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (xhttp.readyState==4 && xhttp.status==200) {
					var response = xhttp.responseText;					
					if(response=="done") {
						//location.reload();
						var b = $('<div id="alert-warning" class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Вы вошли в Ваш кабинет!</div>');
							setTimeout(timeoutFunc,3000);
							$("#pop").append(b);
							prs = true;
					}
				}
				
			};
				obj = JSON.stringify({action:"opens",id:id});
				xhttp.open("POST", 'http://sema.ru/inc/ajax.php', true);
				xhttp.setRequestHeader("Content-Type","application/json");
				xhttp.send(obj);
	}
	
	$('.subt').on('click',function(e){
		//скрыть меню по клику
		$(".sub_menu")
		    .css({ top: 0 })
            .hide()
            .end()
            .find("a")
            .removeClass("hover");
        $("#sub1").css("height","76px");
        $("#sub2").css("height","58px");
        $("#sub3").css("height","58px");
        searchArray[1] = e.target.text;

	});
	$('.suby').on('click',function(e){
		//скрыть меню по клику
		$(".sub_menu")
		    .css({ top: 0 })
            .hide()
            .end()
            .find("a")
            .removeClass("hover");
        $("#sub1").css("height","76px");
        $("#sub2").css("height","58px");
        $("#sub3").css("height","58px");
        searchArray[0] = e.target.text;        

	});
	$('.subf').on('click',function(e){
		//скрыть меню по клику
		$(".sub_menu")
		    .css({ top: 0 })
            .hide()
            .end()
            .find("a")
            .removeClass("hover");
        $("#sub1").css("height","76px");
        $("#sub2").css("height","58px");
        $("#sub3").css("height","58px");
        searchArray[2] = e.target.text;        

	});
	$('.subn').on('click',function(e){
		//скрыть меню по клику
		$(".sub_menu")
		    .css({ top: 0 })
            .hide()
            .end()
            .find("a")
            .removeClass("hover");
        $("#sub1").css("height","76px");
        $("#sub2").css("height","58px");
        $("#sub3").css("height","58px");
        searchArray[3] = e.target.text;        

	});
	$("#searchBtn").on('click',function(){
		if(searchArray[0]!="0" || searchArray[1]!="0" 
			|| searchArray[2]!="0" || searchArray[3]!="0") {
			$("#pop").empty();
			searchUser();
			$("#button-more").hide();

		} else {
			var b = $('<div id="alert-warning" class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Выберите критерии поиска!</div>');
							setTimeout(timeoutFunc,3000);
							$("#pop").append(b);
		}
	});
		var searchUser = function(log,pass) {
		var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (xhttp.readyState==4 && xhttp.status==200) {
					try {
						var response = $.parseJSON(xhttp.responseText);
						if(response!=null) {
							//поиск прошел
							$("#data-container").empty();
							for(i=0;i<response.length;i++) {
							var r = $('<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 centering"><div class="card"><div class="card-image waves-effect waves-block waves-light">	<img class="activator" src="photos/'+response[i]["id_graduate"]+'.jpg" onerror="errorHandler(this)"></div><div class="card-content"><span class="card-title activator grey-text text-darken-4"><strong>'+response[i]["studentname"]+'</strong></span><br><span class="card-title activator grey-text text-darken-4">Год выпуска: '+response[i]["year"]+'<i class="material-icons right">more_vert</i></span></div><div class="card-reveal"><span class="card-title grey-text text-darken-4">'+response[i]["studentname"]+'<i class="material-icons right">close</i></span><p class="left black-text"><i class="fa fa-calendar fa-2x"></i><span>Год выпуска: '+response[i]["year"]+'</span></p><p class="left black-text"><i class="fa fa-cog fa-2x"></i><span>Факультет: '+facul[response[i]["id_faculty"]]+'</span></p><p class="left black-text"><i class="fa fa-graduation-cap fa-2x"></i><span>Форма обучения: '+forms[response[i]["learn_form"]]+'</span></p><p class="left black-text"><i class="fa fa-book fa-2x"></i><span>Тип диплома: '+grads[response[i]["learn_type"]]+'</span></p><p class="left black-text"><i class="fa fa-suitcase fa-2x"></i><span>Специальность: '+response[i]["namedirection"]+'</span></p><p class="left black-text"><i class="fa fa-building fa-2x"></i><span>Место работы: '+response[i]["workplace"]+'</span></p><p class="left black-text"><i class="fa fa-phone-square fa-2x"></i><span>Контакты: '+response[i]["contacts"]+'</span></p><p class="left black-text"><i class="fa fa-commenting fa-2x"></i><span>Комментарии: '+response[i]["comments"]+'</span></p></div></div></div>');
							$("#data-container").append(r);
							}
							//searchArray[0]="0";
							//searchArray[1]="0";
							//searchArray[2]="0";
							//searchArray[3]="0";
						} else {
							var b = $('<div id="alert-warning" class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ошибка поиска!</div>');
							setTimeout(timeoutFunc,3000);
							$("#pop").append(b);
						}
					} catch (e){
							var b = $('<div id="spas"><div id="alert-warning" class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true" popover-popup-delay="2000">&times;</button>Результатов нет!</div></div>');
							$("#pop").append(b);
							$("#data-container").empty();
							
							console.log("time");
							setTimeout(timeoutFunc,3000);
					}
					
				}
			};
			if(searchArray[0]=="Все года"){
				searchArray[0]="0";
			}
			if(searchArray[1]=="Все типы дипломов"){
				searchArray[1]="0";
			}
			if(searchArray[2]=="Все формы обучения"){
				searchArray[2]="0";
			}
			if(searchArray[3]=="Все направления"){
				searchArray[3]="0";
			}
			if(searchArray[1]=="Специалист") {
				searchArray[1]="1";
			} else if(searchArray[1]=="Бакалавр"){
				searchArray[1]="2";
			} else if(searchArray[1]=="Магистр") {
				searchArray[1]="3";
			}
			switch(searchArray[2]) {
				case "Дневное полное":
					searchArray[2]="1"
					break
				case "Вечернее полное":
					searchArray[2]="2"
					break	
				case "Заочное полное":
					searchArray[2]="3"
					break
				case "Дневное сокращенное":
					searchArray[2]="4"
					break
				case "Вечернее сокращенное":
					searchArray[2]="5"
					break
				case "Заочное сокращенное":
					searchArray[2]="6"
					break
				case "Второе высшее":
					searchArray[2]="7"
					break
				default:
					break
				
			}
			obj = JSON.stringify({action:"search",y:searchArray[0],t:searchArray[1],f:searchArray[2],n:searchArray[3]});
			xhttp.open("POST", 'http://sema.ru/inc/ajax.php', true);
			xhttp.setRequestHeader("Content-Type","application/json");
			xhttp.send(obj);
	}
	$(".suby").on('click',function(){
		$("#ayear").text($(this).text());
	});
	$(".subt").on('click',function(){
		$("#atype").text($(this).text());
	});
	$(".subf").on('click',function(){
		$("#aform").text($(this).text());
	});
	$(".subn").on('click',function(){
		$("#anapr").text($(this).text());
	});
	function errorHandler(e){
		$(e).attr("src","photos/0.jpg");
	}
	function timeoutFunc(){
		$("#alert-warning").remove();
		if (prs){
			prs = false;
			location.reload();
		}
	}
	</script>



  
	