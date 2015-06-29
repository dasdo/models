<?php
namespace Dasdo\Models;

/**
 *	Information model and standard functions for working with Phalcon
 *
 *	@author Daniel Sanchez <dasdo1@gmail.com>
 *	@version 1.0.0
 */
class Base extends \Phalcon\Mvc\Model
{
	/**
	 *	Obtain the primary key of a model
	 *
	 *	@return array
	 */
	public function getPrimaryKey()
	{
		return $this->getModelsMetaData()->getPrimaryKeyAttributes($this);
	}
	
	/**
	 *	Obtain the value of primary key of a model
	 *
	 *	@return array
	 */
	public function getID()
	{
		$return = [];
		if($pks = $this->getPrimaryKey())
		{
			foreach($pks as $k => $pk)
				$return[$k] => $this->$pk;
		}
		return $return;
	}
	
	/**
	 *	Based Control to see if you can remove
	 *
	 *	@return true
	 */
	protected function canDelete()
	{
		return true;
	}
	
	/**
	 *	Action before created
	 *
	 *	@return void
	 */
	public function beforeCreate () 
    {
		$this->created_at = date("Y-m-d h:m:i");
	}
	
	/**
	 *	Action before update
	 *
	 *	@return void
	 */
	public function beforeUpdate()
	{
		$this->updated_at = date("Y-m-d h:m:i");
	}
	
	/**
	 *	Action before delete
	 *
	 *	@return void
	 */
	public function beforeDelete()
	{
		return $this->canDelete();
	}
}