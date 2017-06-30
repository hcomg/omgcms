<?php

/**
 * @param \App\Models\Setting $setting
 * @return string
 */
function generate_setting_input_field($setting) {
    $html = '';
    switch ($setting->setting_type) {
        case 'text':
        case 'email':
        case 'number':
            $html = '<input class="form-control" placeholder="'
                . trans('page.settings.' . $setting->setting_key . '_placeholder')
                . '" name="'
                . $setting->setting_key
                . '" type="'
                . $setting->setting_type
                . '" value="'
                . $setting->setting_value
                . '" id="'
                . $setting->setting_key
                . '" />';
            break;
        case 'textarea':
            $html = '<textarea class="form-control" placeholder="'
                . trans('page.settings.' . $setting->setting_key . '_placeholder')
                . '" name="'
                . $setting->setting_key
                . '" id="'
                . $setting->setting_key
                . '">'
                . $setting->setting_value
                . '</textarea>';
            break;
        case 'select':
            $html = '<select class="form-control" id="'
                . $setting->setting_key
                . '" name="'
                . $setting->setting_key
                . '">';
            $html .= '<option value="">'
                . trans('page.settings.' . $setting->setting_key . '_placeholder')
                . '</option>';
            foreach (json_decode($setting->setting_options, true) as $option) {
                $optionValue = (isset($option['value']) ? $option['value'] : $option);
                $optionLabel = (isset($option['label']) ? $option['label'] : $option);
                $html .= '<option value="'
                    . $optionValue . '"';
                if ($optionValue == $setting->setting_value) {
                    $html .= ' selected="selected"';
                }
                $html .= '>' . $optionLabel . '</option>';
            }
            $html .= '</select>';
            break;
        default;
            break;
    }
    return $html;
}