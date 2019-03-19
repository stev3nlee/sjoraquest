<?php
/**
 * Redirect to previous page if http referer is set. Otherwise to server root.
 */

if ( ! function_exists('redirect_back'))
{
    function redirect_back()
    {
        if(isset($_SERVER['HTTP_REFERER']))
        {
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
        else
        {
            header('Location: http://'.$_SERVER['SERVER_NAME']);
        }
        exit;
    }
}

if ( ! function_exists('first_precedence'))
{
	function first_precedence($table)
	{
		$result=mysql_fetch_assoc(mysql_query('select precedence from '.$table.' order by precedence asc'));
		return $result['precedence'];
	}	
}

if ( ! function_exists('last_precedence'))
{
	function last_precedence($table)
	{
		$result=mysql_fetch_assoc(mysql_query('select precedence from '.$table.' order by precedence desc'));
		return $result['precedence'];
	}	
}

if ( ! function_exists('cat_precedence'))
{
    function cat_precedence($table, $cat)
    {
        $result=mysql_fetch_assoc(mysql_query('select precedence from '.$table.' where category_id = '.$cat.' order by precedence desc'));
        return $result['precedence'];
    }   
}

?>