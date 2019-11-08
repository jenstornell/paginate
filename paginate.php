<?php
class Paginate {
  public $args;

  public function __construct(iterable $args) {
    $this->args = $args;
  }

  private function next() {
    if(!$this->hasNext()) return null;
    return $this->args['currentPage'] + 1;
  }

  private function prev() {
    if(!$this->hasPrev()) return null;
    return $this->args['currentPage'] - 1;
  }

  private function hasNext() {
    $next = $this->args['currentPage'] + 1;

    if($next <= $this->args['pagesTotal']) {
      return true;
    }
  }

  private function hasPrev() {
    $prev = $this->args['currentPage'] - 1;

    if($prev >= 1) {
      return true;
    }
  }

  private function prefix() {
    return isset($this->args['prefix']) ? $this->args['prefix'] . '/' : '';
  }

  private function prevUrl() {
    $url = $this->args['base'];

    switch($this->args['currentPage']) {
      case 1:
        $url = false;
        break;
      case 2:
        break;
      default:
        $url .= '/' . $this->prefix() . $this->args['prevPage'];
    }

    return $url;
  }
  
  private function nextUrl() {
    if(!$this->hasNext()) return false;
    return $this->args['base'] . '/' . $this->prefix() . $this->args['nextPage'];
  }

  private function hasOverflow() {
    if($this->args['pagesTotal'] >= $this->args['itemsPerPage']) return true;
  }

  private function pagesTotal() {
    $total = $this->args['itemsTotal'];
    $limit = $this->args['itemsPerPage'];
    return ceil($total / $limit);
  }

  public function get() {
    $this->args['pagesTotal'] = $this->pagesTotal();

    $this->args['hasPrev'] = $this->hasPrev();
    $this->args['prevPage'] = $this->prev();
    $this->args['prevUrl'] = $this->prevUrl();

    $this->args['hasNext'] = $this->hasNext();
    $this->args['nextPage'] = $this->next();
    $this->args['nextUrl'] = $this->nextUrl();

    $this->args['hasOverflow'] = $this->hasOverflow();
    
    return $this->args;
  }
}