<?php
/**
 * 2014-2014 NP6 SAS
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 *  @author    NP6 SAS <contact@np6.com>
 *  @copyright 2014-2014 NP6 SAS
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of NP6 SAS
 */

require_once (dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'APIConnectorIncludes.php');
require_once (dirname(__FILE__).DIRECTORY_SEPARATOR.'Entity.class.php');

/**
 * A MailPerformance Category (must not conflict with Prestashop Category)
 */
class Categories extends EntityAbstract
{
	/**
	 * Category Id
	 * @var int
	 */
	var $id;

	/**
	 * Category name
	 * @var string
	 */
	var $name;

	/**
	 * Category description
	 * @var string
	 */
	var $description;

	/**
	 * Category creation date
	 * @var string
	 */
	var $creation_date;

	/**
	 * constructor
	 */
	public function __construct()
	{
		$ctp = func_num_args();
		if ($ctp == 1)
		{
			$args = func_get_args();
			$this->parse($args[0]);
		}
	}

	/**
	 * parse the result array in properties
	 *
	 * @param array $record
	 */
	protected function parse($record)
	{
		$this->id = $record['id'];
		$this->name = $record['name'];
		$this->description = $record['description'];
		$this->creation_date = $record['creation_date'];
	}

	/**
	 * check if the json array is valid
	 * @param array $json
	 * @return boolean
	 */
	public static function isJsonValid($json)
	{
		if (empty($json))
			return true;

		if (isset($json['id']) && isset($json['name']) && isset($json['description'])
				&& isset($json['creationDate']))
			return true;

		return false;
	}

}
