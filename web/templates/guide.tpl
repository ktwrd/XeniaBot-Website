{include file="header.tpl" container=False}
<style>
.dropdown-toggle { outline: 0; }

.btn-toggle {
  padding: .25rem .5rem;
  font-weight: 600;
  color: var(--bs-emphasis-color);
  background-color: transparent;
}
.btn-toggle:hover,
.btn-toggle:focus {
  color: rgba(var(--bs-emphasis-color-rgb), .85);
  background-color: var(--bs-tertiary-bg);
}

.btn-toggle::before {
  width: 1.25em;
  line-height: 0;
  transition: transform .35s ease;
  transform-origin: .5em 50%;
}

.btn-toggle[aria-expanded="true"] {
  color: rgba(var(--bs-emphasis-color-rgb), .85);
}
.btn-toggle[aria-expanded="true"]::before {
  transform: rotate(90deg);
}

.btn-toggle-nav a {
  padding: .1875rem .5rem;
  margin-top: .125rem;
  margin-left: 1.25rem;
}
.btn-toggle-nav a:hover,
.btn-toggle-nav a:focus {
  background-color: var(--bs-tertiary-bg);
}

.scrollarea {
  overflow-y: auto;
}
</style>
<div class="d-flex flex-nowrap">
    <div class="flex-shrink-0 p-3" style="width: 280px; border-right: 1px solid #424242 !important;">
        <a href="/guide/index" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
            {* <svg class="bi pe-none me-2" width="30" height="24"><use xlink:href="#bootstrap"></use></svg> *}
            <span class="fs-5 fw-semibold">Guide</span>
        </a>
        <ul class="list-unstyled ps-0">
            {foreach $guideList as $g}
                {include file="guide_list_item.tpl" listItem=$g}
            {/foreach}
            {* <li class="mb-1">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Overview</a></li>
                    <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Updates</a></li>
                    <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Reports</a></li>
                </ul>
            </li> *}
        </ul>
    </div>
        <div class="container" style="margin-top: 3rem;">

            <div style="min-height: 80vh">
                {if isset($guideContent)}
                {$guideContent}
                {/if}
            </div>

            <div style="margin-top: 3rem;">
                <a class="btn btn-sm btn-outline-light" style="margin-right: 4rem;" href="/guide/index"><< back to index</a>
                <a class="btn btn-sm btn-outline-light" href="#" onclick="history.back()"><< previous page</a>
            </div>
        </div>
    </div>

{include file="footer.tpl"}