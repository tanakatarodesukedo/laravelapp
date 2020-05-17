<?php
namespace App\Http\Pagination;
use Illuminate\Contracts\Pagination\Paginator;

class MyPaginator
{
  private $paginator;

  public function __construct(Paginator $paginator)
  {
    $this->paginator = $paginator;
  }  

  public function link()
  {
    $paginator = $this->paginator;
    $currentPage = $paginator->currentPage();
    $prev = $currentPage == 1 ? ' disabled' : '';
    $next = $currentPage == $paginator->lastPage() ? ' disabled' : '';
    $result = '<ul class="pagination" role="navigation">';
    $result .= '<li class="page-item' . $prev . 
      '"><a class="page-link" href="' . $paginator->previousPageUrl() .
      '">←前のページ</a></li>';
    $result .= '<li class="page-item active"><a class="page-link">' . $currentPage .
      '</a></li>';
    $result .= '<li class="page-item' . $next . 
      '"><a class="page-link" href="' . $paginator->nextPageUrl() .
      '">次のページ→</a></li>';
    $result .= '</ul>';
    return $result;
  }
}