<?php
class Paginate {
  public $args;

  public function __construct(iterable $args) {
    $this->args = $args;
  }

  public function step($steps) {
    $currentPage = $this->args['currentPage'] + $steps;

    if($currentPage > $this->args['itemsTotal']) {
      $this->args['currentPage'] = $this->args['itemsTotal'];
      return;
    } elseif($currentPage < 1) {
      $this->args['currentPage'] = 1;
      return;
    }

    $this->args['currentPage'] = $currentPage;
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

  public function get() {
    $this->next();
    $this->args['hasNext'] = $this->hasNext();
    $this->args['hasPrev'] = $this->hasPrev();
    $this->args['prev'] = $this->prev();
    $this->args['next'] = $this->next();
    return $this->args;
  }
}