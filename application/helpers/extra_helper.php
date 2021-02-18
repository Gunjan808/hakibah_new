<?php


// ------------------------------------------------------------------------
//					_TIME_AGO FUNCTION
// ------------------------------------------------------------------------
if (!function_exists('_time_ago')) {
	/** Convert Remaining DateTime string from current Time to time ago string like 10 days ago
	 *
	 * @param string $datetime
	 * @param bool $full `true` to show full time like 10 days, 6 hours ago | default value `false`
	 * @return string Time Ago like 10 days ago */
	function _time_ago(string $datetime = null, bool $full = false): string
	{
		is_null($datetime) and $datetime = date('d-m-y h:i:s a', time());

		$now  = new DateTime;
		$ago  = new DateTime($datetime);
		$diff = $now->diff($ago);

		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;

		$timeType = [
			'y' => 'year',
			'm' => 'month',
			'w' => 'week',
			'd' => 'day',
			'h' => 'hour',
			'i' => 'minute',
			's' => 'second',
		];

		foreach ($timeType as $timeKey => &$timeValue) {
			if ($diff->$timeKey) {
				$timeValue = $diff->$timeKey . ' ' . $timeValue . ($diff->$timeKey > 1 ? 's' : '');
			} else {
				unset($timeType[$timeKey]);
			}
		}

		if (!$full) $timeType = array_slice($timeType, 0, 1);
		return $timeType ? implode(', ', $timeType) . ' ago' : 'just now';
	}
}




// ------------------------------------------------------------------------
//					SEARCH_IN FUNCTION
// ------------------------------------------------------------------------
if (!function_exists('search_in')) {
	/** Search Array Value in String
	 *
	 * @author	Krisha Gujjjar <krishnagujjjar@gmail.com>
	 * @since	v0.0.1
	 * @version	v1.0.0	Thursday, April 30th, 2020.
	 * @param	mixed	$haystack "Variable to search in"	Default: null
	 * @param	mixed	$search  	Default: null
	 * @return	bool */
	function search_in($haystack = null, $search = null)
	{
		if (is($haystack) and is($search, 'array')) {
			foreach ($search as $niddle) {
				if (strpos($haystack, $niddle) !== false)
					return true;
			}
		} else {
			if (strpos($haystack, $search) !== false)
				return true;
		}
		return false;
	}
}

// ------------------------------------------------------------------------
//					OBJECT FUNCTION
// ------------------------------------------------------------------------
if (!function_exists('object')) {
	/** Create Object from Array
	 *
	 * @author	Krisha Gujjjar <krishnagujjjar@gmail.com>
	 * @since	v0.0.1
	 * @version	v1.0.0	Thursday, April 30th, 2020.
	 * @param	array	$array "Array"	Default: []
	 * @return	bool */
	function object($array = [])
	{
		if (isset($array) && !empty($array)) {
			if (is_array($array)) {
				return json_decode(json_encode($array));
			} elseif (is_object($array)) {
				return $array;
			} else {
				return $array;
			}
		}
		return;
	}
}

// ------------------------------------------------------------------------
//					SHOW_DEBUG FUNCTION
// ------------------------------------------------------------------------
if (!function_exists('show_debug')) {
	/** Show Console Log Message
	 * with Others Details
	 *
	 * @param mixed $data All Data type Variable
	 * @return string */
	function show_debug($data = null)
	{
		$msg = '';
		$ci = &get_instance();
		if (is_login()) {
			if (is($data, 'array') or (is($data) and is_object($data))) {
				$data = json_encode($data);
				$msg = '<script>
					console.log("%cController is %c' . ucwords($ci->router->fetch_class()) . '", "font-size: 18px; font-weight: bold;color: #3A4161", "color: #ff0062; font-size: 18px; font-weight: bold");
					console.log("%cMethod is %c' . ucwords($ci->router->fetch_method()) . '", "font-size: 18px; font-weight: bold;color: #3A4161", "color: #ff6837; font-size: 18px; font-weight: bold");
					console.table(' . $data . ');
				</script>';
			} elseif (is($data) and (is_string($data) or is_numeric($data) or is_float($data) or is_bool($data))) {
				$msg = '<script>
						console.log("%cController is %c' . ucwords($ci->router->fetch_class()) . '", "font-size: 18px; font-weight: bold;color: #3A4161", "color: #ff0062; font-size: 18px; font-weight: bold");
						console.log("%cMethod is %c' . ucwords($ci->router->fetch_method()) . '", "font-size: 18px; font-weight: bold;color: #3A4161", "color: #ff6837; font-size: 18px; font-weight: bold");
						console.log("%cYour Result: %c' . $data . '","font-size: 18px; font-weight: bold;color: #3A4161", "font-size: 18px; font-weight: bold;color: #625fff");
					</script>';
			}
		}
		return print($msg);
	}
}



// -----------------------------------------------------------
// 					PRICE_FORMAT FUNCTION
// -----------------------------------------------------------
if (!function_exists('price_format')) {
	/** Format Numaric String to Indian Currency Format
	 * @param mixed $price
	 * @return string|0 */
	function price_format($price)
	{
		return convertCurrency($price);
		$format = new NumberFormatter('en', NumberFormatter::CURRENCY);
		if (is($price) and is_string($price) or is_int($price) or is_float($price))
			return $format->formatCurrency($price, 'INR');
		return 0;
	};
}



// -----------------------------------------------------------
// 					_DATE_FORMAT FUNCTION
// -----------------------------------------------------------
if (!function_exists('_date_format')) {
	/** Format Numaric String to Indian Currency Format
	 * @param mixed $date
	 * @return string|0 */
	function _date_format($date)
	{
		if (is($date) and is_string($date))
			return date('M d, Y', strtotime($date));
		return 0;
	};
}


// -----------------------------------------------------------
// 					_DATETIME_FORMAT FUNCTION
// -----------------------------------------------------------
if (!function_exists('_datetime_format')) {
	/** Format Numaric String to Indian Currency Format
	 * @param mixed $date
	 * @return string|0 */
	function _datetime_format($date)
	{
		if (is($date) and is_string($date))
			return date('M d, Y', strtotime($date)) . ' At <br>' . date('h: i A', strtotime($date));
		return 0;
	};
}

function show_rating($rate)
{
	for ($x = 1; $x <= $rate; $x++) {
		echo '<i class="fa fa-star fa-sm orange-color" aria-hidden="true"></i>';
	}
	if (strpos($rate, '.')) {
		echo '<i class="fa fa-star-half-o fa-sm orange-color " aria-hidden="true"></i>';
		$x++;
	}
	while ($x <= 5) {
		echo '<i class="fa fa-star-o fa-sm orange-color " aria-hidden="true"></i>';
		$x++;
	}
}


function get_status($status = null)
{
	$statuses = [
		0 => ['title' => 'new', 'class' => 'info'],
		1 => ['title' => 'approved', 'class' => 'success'],
		2 => ['title' => 'draft', 'class' => 'dark'],
		3 => ['title' => 'delete', 'class' => 'danger'],
		11 => ['title' => 'contacted', 'class' => 'info'],
		12 => ['title' => 'interested', 'class' => 'success'],
		13 => ['title' => 'proposal sent', 'class' => 'secondary'],
		14 => ['title' => 'not interested', 'class' => 'danger'],
		15 => ['title' => 'not convanced', 'class' => 'warning'],
		16 => ['title' => 'contact us', 'class' => 'info'],
	];

	$data = new stdClass;

	is($status) and array_key_exists($status, $statuses) and
		$data->title = ucwords($statuses[$status]['title']) or show_debug('Status of ' . $status . ', title not Define');

	is($status) and array_key_exists($status, $statuses) and
		$data->class = strtolower($statuses[$status]['class']) or show_debug('Status of ' . $status . ', Class not Define');

	return $data;
}

function convertCurrency($number)
{
	// Convert Price to Crores or Lakhs or Thousands
	$length = strlen($number);
	$currency = '';

	if ($length == 4 || $length == 5) {
		// Thousand
		$number = $number / 1000;
		$number = round($number, 2);
		$ext = "Thousand";
		$ext = " k";
	} elseif ($length == 6 || $length == 7) {
		// Lakhs
		$number = $number / 100000;
		$number = round($number, 2);
		$ext = " Lac";
	} elseif ($length == 8 || $length == 9) {
		// Crores
		$number = $number / 10000000;
		$number = round($number, 2);
		$ext = " Cr";
	} else {
		$ext = ' INR';
	}
	$currency = RUPEE . $number . $ext;

	return $currency;
}


// ------------------------------------------------------------------------
//						GET_METHOD FUNCTION
// ------------------------------------------------------------------------
if (!function_exists('get_method')) {
	/** Get Current Method Name
	 *
	 * @return string */
	function get_method()
	{
		/** @var object */
		$ci = &get_instance();
		return $ci->router->fetch_method();
	}
}

/* End of file extra.php */
