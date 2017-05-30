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
	@yield('head_styles')
	
	@yield('head_scripts')
</head>

<body>
	@yield('header')
	
	@yield('menu')
	
	
	<div id="templatemo_content_wrapper_outer">

		<div id="templatemo_content_wrapper_inner">
		
			<div id="templatemo_content_wrapper">
				
				<div id="templatemo_content">
					
					@yield('content')
                                
				</div>
				
				<div class="cleaner"></div>
			</div>
		
			<div class="cleaner"></div>
		</div>
		
		<div class="cleaner"></div>        
	</div>
	
	@yield('footer_links')
	
	@yield('footer_copyright')
	
	@yield('bottom_scripts')
		
</body>
</html>