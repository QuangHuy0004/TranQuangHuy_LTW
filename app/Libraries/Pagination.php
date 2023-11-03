<?php
namespace App\Libraries;

class Pagination
{
    public static function pageCurrent()
    {
        return $_REQUEST['page'] ?? 1;
    }
    public static function pageOffset($page, $limit)
    {
        return ($page - 1) * $limit;
    }
    public static function pageLink($total, $limit, $url)
    {
        $pageNumber = ceil($total / $limit);
        $links = "";
        for ($i = 1; $i <= $pageNumber; $i++) {
            $links .= "<a href='$url&page=$i'>$i<</a> |";
        }
        return $links;
    }

}
?>