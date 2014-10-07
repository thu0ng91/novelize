<?php

function errors_for($attribute, $errors)
{
  return $errors->first($attribute, '<label class="error-message" for="' . $attribute . '">:message</label>');
}

function replaceQuery($key, $value) {
  // get current Query
  $query = Input::query();

  // remove the old key/value pair
  $query = array_except($query, $key);

  // add new key/value pair
  return array_add($query, $key, $value);
}

function link_with_query($key, $value, $route, $title, $attribute = [])
{
  $parameters = replaceQuery($key, $value);

  // Return new URL
  return link_to_route($route, $title, $parameters, $attribute);
}

function link_with_type($value, $route, $title, $parameters = [], $attribute = [])
{
  $parameters = array_add($parameters, 'type', $value);

  // Return new URL
  return link_to_route($route, $title, $parameters, $attribute);
}