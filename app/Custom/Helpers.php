<?php
    /**
     * Custom helpers for application.
     */

    /**
     * Helper for getting current year.
     *
     * @return false|string
     */
    function getCurrentYear()
	{
		return date('Y');
	}

    /**
     * Helper for getting a list of russian months.
     *
     * @return array
     */
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

    /**
     * Helper for getting a substring from input string.
     *
     * @param $content
     * @param $length
     * @return string
     */
	function substrContent($content, $length)
	{
		return substr($content, 0, $length) . '...';
	}

    /**
     * Helper for getting a substring from input date.
     *
     * @param $date
     * @return bool|string
     */
	function substrDate($date)
	{
		return substr($date, 0, 10);
	}

    /**
     * Helper for getting an absolute file's path in the filesystem.
     *
     * @param $path
     * @return string
     */
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

	