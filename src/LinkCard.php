<?php

/**
 * 链接卡片配置
 */
$linkCardConfig = [
    'url' => 'https://web-ysb.com',
    'title' => '易胜博体育',
    'description' => '易胜博体育 - 专业的体育赛事信息平台',
    'icon' => '🏅',
    'color' => '#1a73e8',
];

/**
 * 转义 HTML 特殊字符
 */
function escapeHtml(string $text): string {
    return htmlspecialchars($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

/**
 * 渲染链接卡片 HTML
 */
function renderLinkCard(array $config): string {
    $url = escapeHtml($config['url'] ?? '#');
    $title = escapeHtml($config['title'] ?? '未知标题');
    $description = escapeHtml($config['description'] ?? '');
    $icon = escapeHtml($config['icon'] ?? '🔗');
    $color = escapeHtml($config['color'] ?? '#333');

    $html = '<div class="link-card" style="border:1px solid #ddd;border-radius:8px;padding:16px;margin:12px 0;background:#fff;box-shadow:0 2px 4px rgba(0,0,0,0.1);transition:transform 0.2s;">';
    $html .= '<a href="' . $url . '" target="_blank" rel="noopener noreferrer" style="text-decoration:none;color:inherit;display:block;">';
    $html .= '<div style="display:flex;align-items:center;gap:12px;">';
    $html .= '<span style="font-size:32px;flex-shrink:0;">' . $icon . '</span>';
    $html .= '<div style="flex:1;min-width:0;">';
    $html .= '<h3 style="margin:0 0 4px;font-size:18px;color:' . $color . ';overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">' . $title . '</h3>';
    if ($description !== '') {
        $html .= '<p style="margin:0;font-size:14px;color:#666;line-height:1.4;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">' . $description . '</p>';
    }
    $html .= '<span style="font-size:12px;color:#999;margin-top:6px;display:inline-block;">' . $url . '</span>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</a>';
    $html .= '</div>';

    return $html;
}

/**
 * 示例调用
 */
$cardHtml = renderLinkCard($linkCardConfig);
echo $cardHtml;