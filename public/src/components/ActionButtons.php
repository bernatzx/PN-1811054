<?php
class ActionButtons
{
  private $buttons = [];
  public function addButton($label, $icon, $url, $style = '')
  {
    $this->buttons[] = [
      'label' => $label,
      'icon' => $icon,
      'url' => $url,
      'style' => $style,
    ];
  }

  public function render()
  {
    foreach ($this->buttons as $btn) {
      echo '
        <div onclick="window.location=\'' . $btn['url'] . '\'"
            class="hover:opacity-70 py-2 px-3 shadow-md rounded-md cursor-pointer ' . $btn['style'] . '">
            <i class="' . $btn['icon'] . ' fa-fw"></i> ' . $btn['label'] . '
        </div>
      ';
    }
  }
}