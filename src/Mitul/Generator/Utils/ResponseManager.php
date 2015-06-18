<?php

namespace Mitul\Generator\Utils;


/**
 *
 * ResponseManager class to generate response for result or error in following pattern
 *
 * Successful Response:
 *      flag - true
 *      message - string message
 *      data - it can be anything
 *
 * Error Response:
 *      flag - false
 *      message - Error message
 *      code - int error code
 *
 * Class ResponseManager
 *
 */
class ResponseManager
{
	/**
	 * Generates result response object
	 *
	 * @param mixed  $data
	 * @param string $message
	 *
	 * @return array
	 */
	public static function makeResult($data, $meta, $isDataTable = false)
	{
		$result = array();

		if($isDataTable){		
			$result['recordsTotal'] = $meta['total'];
			$result['recordsFiltered'] = $meta['total'];	
		}

		$result['meta'] = $meta;
		$result['data'] = $data;

		return $result;
	}

	/**
	 * Generates error response object
	 *
	 * @param int    $errorCode
	 * @param string $message
	 * @param mixed  $data
	 *
	 * @return array
	 */
	public static function makeError($errorCode, $meta, $data = array())
	{
		$error = array();
		$error['meta'] = $meta;
		$error['code'] = $errorCode;
		if(!empty($data))
			$error['data'] = $data;

		return $error;
	}
}