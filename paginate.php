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
    if($this->args['currentPage'] + 1 <= $this->args['itemsTotal'])  return true;
    return false;
  }

  private function hasPrev() {
    if($this->args['currentPage'] > 1)  return true;
    return false;
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
        $url .= '/' . $this->args['prevPage'];
    }

    return $url;
  }
  
  private function nextUrl() {
    if(!$this->hasNext()) return false;
    return $this->args['base'] . '/' . $this->args['nextPage'];
  }

  public function get() {
    $this->next();
    $this->args['hasPrev'] = $this->hasPrev();
    $this->args['prevPage'] = $this->prev();
    $this->args['prevUrl'] = $this->prevUrl();

    $this->args['hasNext'] = $this->hasNext();
    $this->args['nextPage'] = $this->next();
    $this->args['nextUrl'] = $this->nextUrl();
    
    return $this->args;
  }
}