<?php


if ( ! function_exists('pre'))
{
	function pre($var)
	{
		echo "<pre>";
		print_r($var);
		echo "</pre>";
	}	
}


if ( ! function_exists('esc')) //alias: mysql_real_escape_string()
{
	function esc($string)
	{
		$result=mysql_real_escape_string(trim($string));
		return $result;
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

if ( ! function_exists('cat_nilai'))
{
    function cat_nilai($id)
    {
        $result=mysql_fetch_assoc(mysql_query('select category_id from homebanner_tb where id = '.$id));
        return $result['category_id'];
    }   
}

if ( ! function_exists('prec_nilai'))
{
    function prec_nilai($id)
    {
        $result=mysql_fetch_assoc(mysql_query('select precedence from homebanner_tb where id = '.$id));
        return $result['precedence'];
    }   
}



if ( ! function_exists('find'))
{
	function find($coloumn,$id,$table)
	{
	//	echo "select `".$coloumn."` from `".$table."` where id='".$id."'";
		$q="select `".$coloumn."` from `".$table."` where id='".$id."'";
		$result=mysql_fetch_assoc(mysql_query($q));
		return $result[$coloumn];
	}	
}

if ( ! function_exists('first_precedence_2'))
{
	function first_precedence_2($table,$data_1,$data_2)
	{
		$result=mysql_fetch_assoc(mysql_query('select precedence from '.$table.' where '.$data_1.' = '.$data_2.' order by precedence asc'));
		return $result['precedence'];
	}	
}

if ( ! function_exists('last_precedence_2'))
{
	function last_precedence_2($table,$data_1,$data_2)
	{
		$result=mysql_fetch_assoc(mysql_query('select precedence from '.$table.' where '.$data_1.' = '.$data_2.' order by precedence desc'));
		return $result['precedence'];
	}	
}

if ( ! function_exists('make_alias'))
{
	function make_alias($string)
	{
		$string=strtolower($string);
		
		$string=str_replace('&','n',$string);
		
		$string=preg_replace('/[^a-z0-9]/', "-", $string);
		
		$string=ltrim(rtrim($string,'-'),'-');
		
		return $string;
	}	
}
   
?>