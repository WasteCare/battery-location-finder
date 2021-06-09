<?php

class WcLocationFinderActivate
{
  public static function activate() {
    flush_rewrite_rules();
  }
}
