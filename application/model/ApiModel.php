<?php
class ApiModel extends Model
{
	public function i() 
	{
		return (new User)->register();
	}
}