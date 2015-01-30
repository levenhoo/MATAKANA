<?php
/**
 * Created by PhpStorm.
 * User: leven
 * Date: 2015/1/28
 * Time: 9:13
 */
$pager = new Pager ;

$pager -> InitPage( $count ,$page , $maxpage);
$pager -> pr();

class Pager
{
  var $maxCount;//每页显示数量
  var $totalResult;//总数量
  var $curPage;
  var $totalPage;//总页数
  var $left=5;
  var $right=5;
  var $pageHtml;

    function InitPage($totalResult , $curPage="" , $maxCount = 10 , $curpage = "" )
    {
      $this -> maxCount =  empty( $maxCount ) ? 10 : $maxCount ;
      $this -> totalResult =  empty( $totalResult ) ? 0 : $totalResult ;
      $this -> curPage =  empty( $curPage ) ? 1 : $curPage ;
    }

  /**
   * 计算总页数
   */
    private function GetTotalPage()
    {
      $this -> totalPage = ceil ( $this -> totalResult  /   $this -> maxCount );
    }

    function pr()
    {
    /*
    if ( $this -> totalPage <= 1){
        return "";
    }
    */
    $this -> GetTotalPage();
    /*
    echo  "[maxCount]".$this -> maxCount ;
    echo  "[totalResult]".$this -> totalResult ;
    echo  "[curPage]".$this -> curPage ;  */
    // $this -> pageHtml .= "Result : ".$this -> totalResult;


    $this -> pageHtml .= "<ul>";

      $this -> pageHtml .=  "<li class=\"max-page\">Stories Per Page : <select name=\"maxpage\" id=\"maxpage\">";
      if($this -> maxCount == 10)  $this -> pageHtml .=  "<option selected value=\"10\" >10</option>";
      else $this -> pageHtml .=  "<option  value=\"10\" >10</option>";
      if($this -> maxCount == 20) $this -> pageHtml .=  "<option selected value=\"20\" >20</option>";
      else $this -> pageHtml .=  "<option value=\"20\" >20</option>";


      $this -> pageHtml .=  "</select></li>";

    //显示上一页
    if ( $this -> curPage != 1)
      $this -> pageHtml .= "<li><a alt=\"".($this -> curPage - 1)."\" href=\"#".($this -> curPage - 1)."\">&laquo; Prev</a></li>";
   /* else
      $this -> pageHtml .= "<li  class=\"disabled\"><a alt=\"".($this -> curPage - 1)."\" href=\"#\">&laquo; Prev</a></li>";*/

    //中间页码

    for ($i = 1 ; $i <=  $this -> totalPage ; $i ++ )
    {
      if ( $i + $this -> left  <  $this -> curPage  )
      {
        $this -> pageHtml .= "<li><a   alt=\"\" href=\"#\">...</a> ";
        $i = $this -> curPage - $this -> left;
        //$this -> pageHtml .= " <a href=\"#\">...</a>  ";
        // break;
      }
      if($this -> curPage == $i)
        $this -> pageHtml .= "<li class=\"active\"><a  alt=\"". $i ."\" href=\"#\">". $i ."</a></li>";
      else
        $this -> pageHtml .= "<li><a  alt=\"". $i ."\" href=\"#\">". $i ."</a></li>\n";
      if ( $this -> curPage + $this -> right == $i )
      {
        $this -> pageHtml .= "<li><a  alt=\"\" href=\"#\">...</a></li>";
        break;
      }
    }
    //显示下一页
    if ( $this -> curPage  != $this -> totalPage and   $this -> totalPage != 0 )
      $this -> pageHtml .= "<li><a alt=\"".($this -> curPage + 1)."\" href=\"#".($this -> curPage + 1)."\">Next &raquo;</a></li>";

    $this -> pageHtml .= "<li class=\"totalresult\">Result : ".$this->totalResult."</li>";
    $this -> pageHtml .= "<li class=\"totalpage\">Page : ".$this->totalPage."</li>";
    $this -> pageHtml .= "</ul>";
    $this -> pageHtml .= "<input type=\"hidden\" name=\"page\" id=\"page\" value=\"".$this -> curPage."\" />";
    echo $this -> pageHtml;
  }
}
?>