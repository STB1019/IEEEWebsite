<?php

/**
 * Generates an FAQ item with a collapsible content section.
 *
 * @param string $headingText The text to display in the accordion header.
 * @param string $buttonTitle The title of the accordion button.
 * @param string $buttonText The content to display in the accordion body.
 * @param string $collapseId The unique identifier for the accordion collapse.
 * @param string $data_wow_delay The delay for the "wow" animation effect.
 * @return string The HTML markup for the FAQ item.
 */
function faqItem($headingText, $buttonTitle, $buttonText, $collapseId, $data_wow_delay) {
    return '<div class="accordion-item wow fadeIn" data-wow-delay="'. $data_wow_delay .'">
                <h2 class="accordion-header" id="' . $headingText . '">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                           data-bs-target="#' . $collapseId . '" aria-expanded="false" aria-controls="' . $collapseId . '">'
                           . $buttonTitle . '
                           </button>
                </h2>
                <div id="' . $collapseId . '" class="accordion-collapse collapse" aria-labelledby="' . $headingText . '" data-bs-parent="#accordionFAQ2">
                    <div class="accordion-body">' 
                    . $buttonText . 
                    '</div>
                </div>
            </div>';
}



?>