{include file="header.tpl" container=False}
<link href="/css/guide.css" rel="stylesheet" type="text/css" />

<div class="d-flex flex-nowrap">
    <div class="flex-shrink-0 guide-sidebar">
        <span class="btn btn-outline-light btn-sm uncollapse">
            <i class="bi bi-book"></i>
        </span>
        <div class="inner p-3">
            <a href="/guide/index" class="link-body-emphasis guide-sidebar-title">
                <i class="bi bi-book pe-none me-2"></i>
                <span class="fs-5 fw-semibold">Guide</span>
                <span class="btn btn-outline-light btn-sm collapse">
                    <i class="bi bi-x-lg"></i>
                </span>
            </a>
            <ul class="list-unstyled ps-0">
                {foreach $guideList as $g}
                    {include file="guide_list_item.tpl" listItem=$g}
                {/foreach}
            </ul>
        </div>
    </div>
    <div class="container guide-content">
        <div class="guide-content-inner">
            {if isset($guideContent)}
            {$guideContent}
            {/if}
        </div>
        <div class="guide-content-footer">
            <a class="btn btn-sm btn-inverse" href="/guide/index"><< back to index</a>
            <a class="btn btn-sm btn-inverse" href="#" onclick="history.back()"><< previous page</a>
        </div>
    </div>
</div>

<script type="text/javascript">
    document.querySelector('.guide-sidebar .uncollapse').addEventListener('click', () => {
        document.querySelector('div.guide-sidebar').setAttribute('show', '')
    })
    document.querySelector('.guide-sidebar .collapse').addEventListener('click', () => {
        document.querySelector('div.guide-sidebar').removeAttribute('show')
    })
</script>

{include file="footer.tpl"}