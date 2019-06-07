<?php
class InitModel extends Model
{
	public function register() 
	{
		return (new User)->register();
	}
}