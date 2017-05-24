<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{{ $title or '' }}</title>
<meta name="keywords" content="yellow blog template, free html css layout" />
<meta name="description" content="yellow blog template, free html css layout from Ftemplate.ru" />
<link href="/css/templatemo_style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue === field.value) field.value = '';
    else if (field.value === '') field.value = field.defaultValue;
}
</script>
</head>
<body>
	<header>
		@section ('header')
			<div id="templatemo_site_title_bar_wrapper">
				<div id="templatemo_site_title_bar">
					<div id="site_title">
						<h1><a href="№" target="_parent">Персональный блог
							<span>ФИО</span>
						</a></h1>
					</div>
					
					<div id="search_box">
						<form action="/search/" method="get">
							<input type="text" value="Введите слово для поиска..." name="query" size="10" id="searchfield" title="searchfield" onfocus="clearText(this)" onblur="clearText(this)" />
							<input type="submit" value="" alt="Search" id="searchbutton" title="Search" />
						</form>
					</div>
				</div>
			</div>
		@show
	</header>


	<div id="templatemo_menu_wrapper">
		<div id="templatemo_menu">
		@section('menu')
			<ul>
				@foreach ($menu as $key)
					<li>
						@if($key['is_active'])
							class='current'
						@endif
							<a href="{{ $key['href'] }}">{{ $key['text'] }}</a>
					</li>
				@endforeach
			</ul>
		@show
		</div>
	</div> 

<div id="templatemo_content_wrapper_outer">

	<div id="templatemo_content_wrapper_inner">
    
    	<div id="templatemo_content_wrapper">
        	
            <div id="templatemo_content">
            	<div class="content_bottom"></div>
            	
				<div id="main_column">
					@yield('main_column', 'main content')
				</div>
				
                <div id="side_column">
                
                <div class="side_column_section">
                    @include ('includes.banners') 
                </div>
                
                <div class="cleaner_h30">&nbsp;</div>
                
                <div class="side_column_section">
					@include ('includes.archives') 
					<!-- Предполагается, что данная часть будет статичной, а поиск по архиву будет реализован на отдельной странице. -->
                </div> 
                
				<div class="cleaner_h30">&nbsp;</div>
                
                <div class="side_column_section">
					@section('recent_posts')
						<h3>Свежие статьи</h3>
										
						<div class="recent_post">
							<h4><a href="#">Статья 1</a></h4>
							Получаем данные из БД.
						</div>
						
						<div class="recent_post">
							<h4><a href="#">Статья 2</a></h4>
							Получаем данные из БД.
						</div>
						
						<div class="recent_post">
							<h4><a href="#">Статья 3</a></h4>
							Получаем данные из БД.
						</div>             
					@show
                </div>
                                
                </div> <!-- end of side column -->
            
            	<div class="cleaner"></div>
            </div>
        
        	<div class="cleaner"></div>
        </div>
        
        <div class="cleaner"></div>        
    </div>

</div>
	<footer>
	@section ('footer')
		<div id="templatemo_footer_wrapper">

			<div id="templatemo_footer">
				
				<div class="section_w200">
				
					<h4>Services</h4>
					<ul class="footer_menu_list">
						<li><a href="#">Lorem ipsum dolor</a></li>
						<li><a href="#">Cum sociis</a></li>
						<li><a href="#">Donec quam</a></li>
						<li><a href="#">Nulla consequat</a></li>
						<li><a href="#">In enim justo</a></li>               
					</ul>
					
				</div>
				
				<div class="section_w200">
				
					<h4>About</h4>
					<ul class="footer_menu_list">
						<li><a href="#">Nullam quis</a></li>
						<li><a href="#">Sed consequat</a></li>
						<li><a href="#">Cras dapibus</a></li> 
						<li><a href="#">Lorem ipsum dolor</a></li>
						<li><a href="#">Cum sociis</a></li>              
					</ul>
					
				</div>
				
				<div class="section_w200">

					<h4>Partners</h4>       
					<ul class="footer_menu_list">
						<li><a href="http://www.Ftemplate.ru" target="_parent">Website Templates</a></li>
						<li><a href="http://www.flashmo.com" target="_parent">Flash Templates</a></li>
						<li><a href="http://www.layermo.com" target="_parent">Wordpress Themes</a></li>
						<li><a href="http://www.webdesignmo.com" target="_parent">Web Design Tips</a></li>
						<li><a href="http://www.koflash.com" target="_blank">Flash Gallery</a></li>               
				  </ul>
					
				</div>
				
				<div class="section_w260">
				
					<h4>Privacy Policy</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non rutrum arcu. Vestibulum ornare dolor eget leo placerat sed tincidunt dolor interdum</p>
					
					<div class="cleaner_h10"></div>
					
					<a href="http://validator.w3.org/check?uri=referer"><img style="border:0;width:88px;height:31px" src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" width="88" height="31" vspace="8" border="0" /></a>
						<a href="http://jigsaw.w3.org/css-validator/check/referer"><img style="border:0;width:88px;height:31px"  src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS!" vspace="8" border="0" /></a>
					
				</div>
				
				<div class="cleaner_h20"></div>
				
			</div> <!-- end of footer -->
		</div>
		@show
	</footer>	
	
	@include ('includes.copyright')
</body>
</html>