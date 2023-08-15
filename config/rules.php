<?php

use Azuriom\Rules\Color;

return [
    'color' => ['required', new Color()],
    'youtube_link' => 'nullable|string',
    'description_site' => 'required|string',
    'texte_section_1' => 'nullable|string',
    'icon_1' => 'nullable|string',
    'icon_2' => 'nullable|string',
    'icon_3' => 'nullable|string',
    'titre_1' => 'nullable|string',
    'titre_2' => 'nullable|string',
    'titre_3' => 'nullable|string',
    'texte_1' => 'nullable|string',
    'texte_2' => 'nullable|string',
    'texte_3' => 'nullable|string',
    'footer_description' => 'required|string',
    'footer_article' => 'required|string',
    'footer_links' => 'nullable|array',
];
