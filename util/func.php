<?php
function animate_text($text)
{

    $html_list = [];
    $delay = 0;
    $html_list[] = '<div class="flex-row">';
    for ($i = 0; $i < strlen($text); $i++) {
        $delay += 100;
        $char = mb_substr($text, $i, 1, 'UTF-8');
        if ($char === ' ') {
            $html_list[] = '</div> <span class="space"></span> <div class="flex-row">';
        } else {
            $html_list[] = '<p data-aos="fade-up" data-aos-delay="' . $delay . '">' . $char . '</p>';
        }
    }
    $html_list[] = "</div>";


    return implode('', $html_list);
}
