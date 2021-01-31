<?php


class Form {

  private static function mergeAttributes( array $attributes, string $attributeName, string $mergedValue ): array {
    if ( isset( $attributes[ $attributeName ] ) ) {
      $attributes[ $attributeName ] = "$mergedValue {$attributes[$attributeName]}";
    } else {
      $attributes[ $attributeName ] = "$mergedValue";
    }

    return $attributes;
  }

  private static function buildAttributes( array $attributes ): string {
    $attributesCollect = collect( $attributes );

    return $attributesCollect->map( function ( $value, $key ) {
      if ( $value === '' || is_integer( $key ) ) {
        return " {$value}";
      }

      return " {$key}='${value}'";
    } )->join( '' );
  }

  public static function open( string $action, array $attributes = [] ): string {
    $actionUrl      = admin_url( "admin-ajax.php?action={$action}" );
    $formHtml       = "<form action='{$actionUrl}'";
    $attributesHtml = self::buildAttributes( $attributes );

    return "{$formHtml}{$attributesHtml}>";
  }

  public static function close(): string {
    return "</form>";
  }

  public static function label( string $for, string $text, array $attributes = [] ): string {
    $attributesMerged = self::mergeAttributes( $attributes, 'class', 'form-label' );
    $attributesHtml = self::buildAttributes( $attributesMerged );

    return "<label for='{$for}'{$attributesHtml}>{$text}</label>";
  }

  public static function text( string $name, array $attributes = [] ): string {
    $attributesMerged = self::mergeAttributes( $attributes, 'class', 'form-control' );
    if ( ! isset( $attributes['type'] ) ) {
      $attributesMerged['type'] = 'text';
    }
    if ( ! isset( $attributes['id'] ) ) {
      $attributesMerged['id'] = $name;
    }
    $attributesHtml = self::buildAttributes( $attributesMerged );

    return "<input name='{$name}'{$attributesHtml}>";
  }

  public static function email( string $name, array $attributes = [] ): string {
    return self::text( $name, array_merge( $attributes, [ 'type' => 'email' ] ) );
  }

  public static function number( string $name, array $attributes = [] ): string {
    return self::text( $name, array_merge( $attributes, [ 'type' => 'number' ] ) );
  }

  public static function password( string $name, array $attributes = [] ): string {
    return self::text( $name, array_merge( $attributes, [ 'type' => 'password' ] ) );
  }

  public static function hidden( string $name, array $attributes = [] ): string {
    return self::text( $name, array_merge( $attributes, [ 'type' => 'hidden' ] ) );
  }

  public static function date( string $name, array $attributes = [] ): string {
    return self::text( $name, array_merge( $attributes, [ 'type' => 'date' ] ) );
  }

  public static function file( string $name, array $attributes = [] ): string {
    return self::text( $name, array_merge( $attributes, [ 'type' => 'file' ] ) );
  }

  public static function color( string $name, array $attributes = [] ): string {
    return self::text( $name, array_merge( $attributes, [ 'type' => 'color', 'class' => 'form-control-color' ] ) );
  }

  public static function select( string $name, array $options, array $attributes = [] ): string {
    $attributesMerged = self::mergeAttributes( $attributes, 'class', 'form-select' );
    if ( ! isset( $attributes['id'] ) ) {
      $attributesMerged['id'] = $name;
    }
    $attributesHtml = self::buildAttributes( $attributesMerged );
    $optionsCollect = collect( $options );
    $optionHtml     = $optionsCollect->map( function ( $option ) {
      $value            = $option['value'];
      $optionAttributes = '';
      if ( isset( $option['attributes'] ) ) {
        $optionAttributes .= self::buildAttributes( $option['attributes'] );
      }

      return "<option value='{$value}'{$optionAttributes}>{$option['text']}</option>";
    } )->join( '' );

    return "<select name='{$name}'{$attributesHtml}>{$optionHtml}</select>";
  }

  private static function selector( string $type, string $name, string $text, string $value, string $id, array $checkboxAttributes = [], array $parentAttributes = [], array $labelAttributes = [] ): string {
    $parentAttributesMerged = self::mergeAttributes( $parentAttributes, 'class', 'form-check' );
    $checkboxAttributesMerged = self::mergeAttributes( $checkboxAttributes, 'class', 'form-check-input' );
    $labelAttributesMerged = self::mergeAttributes( $labelAttributes, 'class', 'form-check-label' );

    $parentAttributesHtml = self::buildAttributes( $parentAttributesMerged );
    $checkboxAttributesHtml = self::buildAttributes( $checkboxAttributesMerged );
    $labelAttributesHtml = self::buildAttributes( $labelAttributesMerged );

    return "<div{$parentAttributesHtml}><input type='{$type}' id='{$id}' name='{$name}' value='{$value}'{$checkboxAttributesHtml}><label for='{$id}'{$labelAttributesHtml}>{$text}</label></div>";
  }

  public static function checkbox( string $name, string $text, string $value, string $id, array $checkboxAttributes = [], array $parentAttributes = [], array $labelAttributes = [] ): string {
    return self::selector('checkbox', $name, $text, $value, $id, $checkboxAttributes, $parentAttributes, $labelAttributes);
  }

  public static function radio( string $name, string $text, string $value, string $id, array $checkboxAttributes = [], array $parentAttributes = [], array $labelAttributes = [] ): string {
    return self::selector('radio', $name, $text, $value, $id, $checkboxAttributes, $parentAttributes, $labelAttributes);
  }

  public static function textarea( string $name, string $value, array $attributes = [] ): string {
    if ( ! isset( $attributes['id'] ) ) {
      $attributes['id'] = $name;
    }
    $attributesMerged = self::mergeAttributes( $attributes, 'class', 'form-control' );
    $attributesHtml = self::buildAttributes( $attributesMerged );
    return "<textarea name='{$name}'{$attributesHtml}>{$value}</textarea>";
  }
}
