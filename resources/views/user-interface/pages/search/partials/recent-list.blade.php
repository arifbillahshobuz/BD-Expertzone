@forelse($recentSearches as $search)
    <div class="d-flex align-items-center search-hover py-2 px-3 recent-search-item">
        <div class="flex-shrink-0">
            <div class="avatar-40 rounded-pill bg-light d-flex align-items-center justify-content-center">
                <span class="material-symbols-outlined text-muted">search</span>
            </div>
        </div>
        <div class="d-flex ms-3 w-100 justify-content-between align-items-center">
            <div class="d-flex flex-column">
                <div>
                    <a href="javascript:void(0);" class="h6 recent-search-link">
                        {{ is_array($search) ? ($search['query'] ?? '') : $search }}
                    </a>
                </div>
            </div>
            <a href="javascript:void(0);" data-query="{{ is_array($search) ? ($search['query'] ?? '') : $search }}"
                class="material-symbols-outlined text-dark font-size-16 delete-recent-btn">close</a>
        </div>
    </div>
@empty
    <div class="py-3 px-3 text-center text-muted no-recent-searches">
        No recent searches
    </div>
@endforelse