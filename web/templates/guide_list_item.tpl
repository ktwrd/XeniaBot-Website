<li class="mb-1">
{if $listItem['type'] == 'label'}
    <a class="link-body-emphasis d-inline-flex text-decoration-none rounded" href="#">{$listItem['name']}</a>
{else}
    <a class="link-body-emphasis d-inline-flex rounded" href="{$listItem['link']}">{$listItem['name']}</a>
{/if}
{if isset($listItem['children']) && count($listItem['children']) > 0}
    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
        {foreach $listItem['children'] as $child}
            {include file="guide_list_item.tpl" listItem=$child}
        {/foreach}
    </ul>
{/if}
</li>