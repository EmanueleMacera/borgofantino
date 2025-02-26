@php
use App\Http\Controllers\Admin\AdminSidebarController;

$sidebarItems = AdminSidebarController::getSidebarItems();

/**
 * Function to control roles:
 * - If the role array is empty => everyone can see the entry.
 * - Otherwise, the user must have at least one of the listed roles.
 */
function userCanSee($roles = [])
{
    if (empty($roles)) {
        return true;
    }
    return auth()->check() && auth()->user()->hasAnyRole($roles);
}

/**
 * Recursive function that generates *the entire* block <ul> and the nested <li>.
 *
 * @param array $items Array with the menu structure
 * @param int $level Indicates the level of nesting
 * @param bool $isRoot If TRUE, we are generating the ‘top level’ list
 *
 * @return string HTML generated
 */
function renderSidebarItems(array $items, int $level = 0, bool $isRoot = true): string
{
    if (empty($items)) {
        return '';
    }

    $html = $isRoot
        ? '<ul class="nav flex-column">'
        : '<ul class="nav flex-column ms-3">';

    foreach ($items as $index => $item) {
        if (! userCanSee($item['roles'] ?? [])) {
            continue;
        }

        $uniqueId   = 'menu_' . $level . '_' . $index;
        $toggleId   = 'toggle_' . $uniqueId;
        $collapseId = 'collapse_' . $uniqueId;

        $hasChildren = ! empty($item['children'] ?? []);

        $html .= '<li class="nav-item">';

        if ($hasChildren) {
            $html .= '
              <a class="nav-link"
                 href="#"
                 data-bs-toggle="collapse"
                 data-bs-target="#'.$collapseId.'"
                 aria-expanded="false"
                 aria-controls="'.$collapseId.'"
              >
                <i class="fa '.$item['icon'].'"></i>'.$item['title'].'
                <i class="fa fa-chevron-right rotate-icon"></i>
              </a>
              <div class="collapse" id="'.$collapseId.'">
            ';

            $html .= renderSidebarItems($item['children'], $level + 1, false);

            $html .= '</div>';
        } else {
            $route = $item['route'] ?? '#';
            $html .= '
              <a class="nav-link" href="'.$route.'">
                <i class="fa '.$item['icon'].'"></i>'.$item['title'].'
              </a>
            ';
        }

        $html .= '</li>';
    }

    $html .= '</ul>';

    return $html;
}
@endphp

<aside class="admin-sidebar">
    {!! renderSidebarItems($sidebarItems) !!}
</aside>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toggles = document.querySelectorAll('[data-bs-toggle="collapse"]');
        toggles.forEach(toggle => {
            const targetSelector = toggle.getAttribute('data-bs-target');
            const targetElement = document.querySelector(targetSelector);
            if (!targetElement) return;

            const iconElement = toggle.querySelector('.rotate-icon');
            
            // Listen for collapse event to rotate the icon
            targetElement.addEventListener('shown.bs.collapse', () => {
                iconElement?.classList.add('rotate');
                iconElement?.classList.remove('rotate-reverse');
            });

            targetElement.addEventListener('hidden.bs.collapse', () => {
                iconElement?.classList.add('rotate-reverse');
                iconElement?.classList.remove('rotate');
            });
        });

        const sidebarToggle = document.getElementById('sidebarToggle');
        const adminSidebar = document.querySelector('.admin-sidebar');
        sidebarToggle.addEventListener('click', () => {
            adminSidebar.classList.toggle('active');
        });
    });
</script>
@endpush
