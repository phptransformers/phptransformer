<?php

namespace RobLoach\Consolidate;

interface EngineInterface
{
  public function render($template, array $options = array());
  public function getName();
}
