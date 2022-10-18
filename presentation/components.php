<?php
function input($type = 'text', $id = '', $value = '', $name = '', $class = '', $content = '', $checked = false, $placeholder = '')
{
    return '<input type="' . $type .  '" id="' . $id . '" name="'  . $name . '" class="' . $class . '" value="' . $value . '"  ' .  ($checked  ? 'checked' : '') . ' placeholder="' . $placeholder . '"> ' . $content . '</input>';
}


function label($for = '', $id = '', $class = '', $content = '')
{

    return '<label for="' . $for .  '" id="' . $id . '" class="' . $class . '"> ' . $content . '</label>';
}


function select($id = '', $name = '', $value = '', $class = '', $required = '', $options =
array('naam' => 'value'))
{
    $sel = '<select class="' . $class . '" id="' . $id . '" name="' . $name . '">';
    
    foreach ($options as $option_key => $option_value) {
        $selected = ($value == $option_key ? 'selected' : '');
        $sel .= '<option value="' . $option_key . '" ' . $selected . ' > ' . $option_value . '</option>';
    }
    $sel .= '</select>';
    return $sel;
}


function textarea($class = '', $id = '', $name = '', $message = '')
{
    return '<textarea class="' . $class . '" id="' . $id . '" name="' . $name . '" rows="4" cols="50">' . $message . '</textarea>';
}

function div($class = '', $content = '')
{
    return '<div  class="' . $class . '">' . $content . '</div>';
}
function h1($content)
{
    return '<h1>' . $content . '</h1>';
}
function p($content)
{
    return '<p>' . $content . '</p>';
}
function hr()
{
    return '<hr>';
}
function form($id = '', $action = '', $method = '', $content)
{
    return '<form  id="' . $id . '" action="' . $action . '" method="' . $method . '">' .  $content . '</form>';
}
function span($class, $content)
{

    return '<span class="' . $class . '">' . $content . '</span>';
}
function b($content = '')
{
    return '<b>' . $content . '</b>';
}

function buildFormElements($data)
{

    $formElements = '';
    foreach ($data['formFields'] as $key) {
        $field = $data[$key];

        $spn = span('errSapn', $field['error']);
        $formElements .= label($key, content: $field['label'] .  ' ' . $spn);
        switch ($field['type']) {
            case 'select':
                $formElements .= select(name: $key, value: $field['value'], class: 'inputText', required: 'required', options: $field['options']);
                break;
            case 'radio':
                foreach ($field['options'] as $opt => $val) {
                    $optId = $key . '_' . $opt;
                    $rad = input('radio', $optId, value: $opt, name: $key, class: '', content: $val, checked: ($field['value'] == $opt));
                    $formElements .= label($optId, content: $rad);
                }
                break;
            case 'textarea':
                $formElements .= textarea(class: 'BerichtInput', id: $key, name: $key, message: $field['value']);
                break;
            default:
                $formElements .= input(type: $field['type'], id: $key, value: $field['value'], name: $key, checked: false, class: 'inputText', placeholder: $field['label']);
                break;
        }
    }
    return  $formElements;
}

function generateForm($data){
    $formElements= buildFormElements($data) ;

    $container = h1($data['formHeader']). p($data['formDescription']) . hr() .
    $formElements . 
    input(type : 'hidden', id : 'page', value : $data['page'], name : 'page') . 
    div($class = 'clearfix', $content= input(type : 'submit',  value : $data['formButton'],  class : 'submit'));
  
    $form=form($id = '', $action = 'index.php', $method = 'POST',div( $class ='container' ,$content =$container));
    $register = div($class = $data['page'], $content = $form);
    return $register;
     
  }