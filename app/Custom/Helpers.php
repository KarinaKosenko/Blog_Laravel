<?php

	function getCurrentYear()
	{
		return date('Y');
	}
	
	
	function getMonthsList()
	{
		return 
			[
				"Январь" => 1, "Февраль" => 2, "Март" => 3, 
				"Апрель" => 4, "Май" => 5, "Июнь" => 6, 
				"Июль" => 7, "Август" => 8, "Сентябрь" => 9, 
				"Октябрь" => 10, "Ноябрь" => 11, "Декабрь" => 12
			];
	}
	
	
	function substrContent($content, $length)
	{
		return substr($content, 0, $length) . '...';
	}
	
	
	function substrDate($date)
	{
		return substr($date, 0, 10);
	}


    function getImagePath($path)
    {
        $nameArray = explode('.', $path);
        $ext = array_pop($nameArray);
        $file = str_replace('.', '/', implode('.', $nameArray));
        $filePath = config('blog.uploadPath') . config('blog.imageUploadSection') . '/' . $file;
        $resPath = config('blog.uploadDir') . config('blog.imageUploadSection') . '/' . $file;

        if (!File::isFile($filePath . '.' . $ext)) {
            $resPath = config('blog.imageDefault');
            $ext = 'jpg';
        }

        return $resPath . '.' . $ext;
    }

	