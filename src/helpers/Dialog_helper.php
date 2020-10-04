<?php

const ALERT_ERROR = "danger";
const ALERT_INFO = "info";
const ALERT_WARNING = "warning";
const ALERT_SUCCESS = "success";

function displayMessage($title, $message, $alert_type = "success") {
    $output = '<div class = "row">';
    $output .= '<div class = "col-sm-6">';
    $output .= '<div class = "alert alert-' . $alert_type . '"' . 'role = "alert">';
    $output .= '<strong>' . $title . '</strong><br /> <p class=\"text-justified\">' . $message . '</p>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';
    return $output;
}

?>