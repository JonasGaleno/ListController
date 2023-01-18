<?php

namespace Jonas\ListController\Helper;

trait HtmlBuild
{
    public function htmlBuild(string $templatePath, array $data): string
    {
        extract($data);
        ob_clean();
        require __DIR__ . '/../View/' . $templatePath;
        $html = ob_get_clean();
        
        return $html;
    }
}
