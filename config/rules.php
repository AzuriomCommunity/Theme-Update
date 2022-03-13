<?php

use Illuminate\Validation\Rule;

$colors = ['red', 'blue', 'green', 'purple', 'orange', 'yellow', 'aqua', 'pink'];

return [
    'color' => ['required', Rule::in($colors)],
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
