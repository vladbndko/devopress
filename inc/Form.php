<?php


class Form {

  private static function buildAttributes(array $attributes): string
  {
    $attributesCollect = collect($attributes);
    return $attributesCollect->map(function($value, $key) {
      if ($value === '' || is_integer($key)) {
        return " {$value}";
      }
      return " {$key}='${value}'";
    })->join('');
  }

  public static function open(string $action, array $attributes = []): string {
    $actionUrl = admin_url("admin-ajax.php?action={$action}");
    $formHtml = "<form action='{$actionUrl}'";
    $attributesHtml = self::buildAttributes($attributes);
    return "{$formHtml}{$attributesHtml}>";
  }

  public static function close(): string {
    return "</form>";
  }

  public static function label(string $for, string $text, array $attributes = []): string {
    if (isset($attributes['class'])) {
      $attributes['class'] = "form-label {$attributes['class']}";
    } else {
      $attributes['class'] = "form-label";
    }
    $attributesHtml = self::buildAttributes($attributes);
    return "<label for='{$for}'{$attributesHtml}>{$text}</label>";
  }

  public static function text(string $name, array $attributes = []): string {

    $editedAttributes = $attributes;
    if (isset($attributes['class'])) {
      $editedAttributes['class'] = "form-control {$attributes['class']}";
    } else {
      $editedAttributes['class'] = "form-control";
    }
    if (!isset($attributes['type'])) {
      $editedAttributes['type'] = 'text';
    }
    if (!isset($attributes['id'])) {
      $editedAttributes['id'] = $name;
    }
    $attributesHtml = self::buildAttributes($editedAttributes);
    return "<input name='{$name}'{$attributesHtml}>";
  }

  public static function email(string $name, array $attributes = []): string {
    return self::text($name, array_merge($attributes, ['type' => 'email']));
  }

  public static function number(string $name, array $attributes = []): string {
    return self::text($name, array_merge($attributes, ['type' => 'number']));
  }

  public static function password(string $name, array $attributes = []): string {
    return self::text($name, array_merge($attributes, ['type' => 'password']));
  }

  public static function hidden(string $name, array $attributes = []): string {
    return self::text($name, array_merge($attributes, ['type' => 'hidden']));
  }

  public static function date(string $name, array $attributes = []): string {
    return self::text($name, array_merge($attributes, ['type' => 'date']));
  }

  public static function file(string $name, array $attributes = []): string {
    return self::text($name, array_merge($attributes, ['type' => 'file']));
  }

  public static function color(string $name, array $attributes = []): string {
    return self::text($name, array_merge($attributes, ['type' => 'color', 'class' => 'form-control-color']));
  }

  public static function select(string $name, array $options, array $attributes = []): string {
    if (isset($attributes['class'])) {
      $attributes['class'] = "form-select {$attributes['class']}";
    } else {
      $attributes['class'] = "form-select";
    }
    if (!isset($attributes['id'])) {
      $attributes['id'] = $name;
    }
    $attributesHtml = self::buildAttributes($attributes);
    $optionsCollect = collect($options);
    $optionHtml = $optionsCollect->map(function($option) {
      $value = $option['value'];
      $optionAttributes = '';
      if (isset($option['attributes'])) {
        $optionAttributes .= self::buildAttributes($option['attributes']);
      }
      return "<option value='{$value}'{$optionAttributes}>{$option['text']}</option>";
    })->join('');
    return "<select name='{$name}'{$attributesHtml}>{$optionHtml}</select>";
  }
}
