<?php 

function errors_for($attribute, $errors)
{
  return $errors->first($attribute, '<span class="errorMessage">:message</span>');
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