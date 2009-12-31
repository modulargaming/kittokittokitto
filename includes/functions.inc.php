<?php
function varscan($num) { //Variable protection for numbers
        $num = eregi_replace("[a-zA-Z]", "", $num);
        $num = str_replace("=", "", $num);
        $num = str_replace("-", "", $num);
        $num = str_replace(",", "", $num);
        $num = str_replace("/", "", $num);
        $num = str_replace("+", "", $num);
        $num = str_replace("*", "", $num);
        $num = str_replace("`", "", $num);
        $num = str_replace("'", "", $num);
        $num = str_replace("_", "", $num);
        $num = str_replace(">", "", $num);
        $num = str_replace("<", "", $num);
        $num = str_replace("&", "", $num);
        $num = str_replace("[", "", $num);
        $num = str_replace("]", "", $num);
        $num = str_replace("{", "", $num);
        $num = str_replace("}", "", $num);
        $num = str_replace("%", "", $num);
        $num = str_replace("^", "", $num);
        $num = str_replace("|", "", $num);
        $num = str_replace("~", "", $num);
        $num = str_replace("#", "", $num);
        $num = str_replace(":", "", $num);
        $num = str_replace("?", "", $num);
        $num = str_replace("@", "", $num);
        $num = str_replace("(", "", $num);
        $num = htmlspecialchars($num);
        $num = strip_tags($num);
        return $num;
}


function varscan2($num) { //Variable protection for strings
	$num  = ereg_replace("[^A-Za-z0-9]", "", $num);
	$num = str_replace("=", "", $num);
        $num = str_replace("-", "", $num);
        $num = str_replace(",", "", $num);
        $num = str_replace("/", "", $num);
        $num = str_replace("+", "", $num);
        $num = str_replace("*", "", $num);
        $num = str_replace("`", "", $num);
        $num = str_replace("'", "", $num);
        $num = str_replace("_", "", $num);
        $num = str_replace(">", "", $num);
        $num = str_replace("<", "", $num);
        $num = str_replace("&", "", $num);
        $num = str_replace("&&", "", $num);
        $num = str_replace("[", "", $num);
        $num = str_replace("]", "", $num);
        $num = str_replace("{", "", $num);
        $num = str_replace("}", "", $num);
        $num = str_replace("%", "", $num);
        $num = str_replace("^", "", $num);
        $num = str_replace("|", "", $num);
        $num = str_replace("~", "", $num);
        $num = str_replace("#", "", $num);
        $num = str_replace(":", "", $num);
        $num = str_replace("?", "", $num);
        $num = str_replace("@", "", $num);
        $num = str_replace("(", "", $num);
        $num = str_replace(")", "", $num);
        $num = htmlspecialchars($num);
        $num = strip_tags($num);
	return $num;
}

?>
