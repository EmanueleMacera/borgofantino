{{-- ========================= --}}
{{-- 0. Root Elements          --}}
{{-- ========================= --}}

:root {
    --primary-color: {{ $style->primary_color ?? '#f3f1f3' }};
    --secondary-color: {{ $style->secondary_color ?? '#ebf5f0' }};
    --tertiary-color: {{ $style->tertiary_color ?? '#000000' }};
    --site-font: {{ $style->font ?? 'Nunito' }};
    --btn-bg-color: {{ $style->btn_bg_color ?? '#c8ebc8' }};
    --btn-hover-bg-color: {{ $style->btn_hover_bg_color ?? '#a0c8af' }};
    --footer-bg: {{ $style->footer_bg ?? '#f3f1f3' }};
    --footer-color: {{ $style->footer_color ?? '#000000' }};
    --navbar-bg: {{ $style->navbar_bg ?? '#c8ebc8' }};
    --navbar-link-color: {{ $style->navbar_link_color ?? '#000000' }};
    --admin-sidebar-bg: {{ $style->admin_sidebar_bg ?? '#c8ebc8' }};
    --admin-sidebar-hover-bg: {{ $style->admin_sidebar_hover_bg ?? '#a0c8af' }};
    --admin-sidebar-color: {{ $style->admin_sidebar_color ?? '#000000' }};
}

{{-- ========================= --}}
{{-- 1. Base Elements & Layout --}}
{{-- ========================= --}}

{{-- Hide scrollbars on supported browsers --}}
html::-webkit-scrollbar,
body::-webkit-scrollbar {
    display: none;
}

{{-- Basic page setup --}}
body {
    font-family: var(--site-font)!important;
    background-color: var(--primary-color);
    display: flex;
    flex-direction: column;
    min-height: 100%;
    margin: 0;
}

main {
    flex-grow: 1;
}

{{-- Typography & Global Heading/Link Colors --}}
h1, h2, h3, h4, h5, h6, p, a {
    color: var(--tertiary-color);
}

{{-- Table cell alignment --}}
th, td {
    text-align: center;
    vertical-align: middle;
    word-break: break-word;
}

{{-- ========================= --}}
{{-- 2. Color Utility Classes  --}}
{{-- ========================= --}}

{{-- Background color helpers --}}
.primary-bg {
    background-color: var(--primary-color);
}

.secondary-bg {
    background-color: var(--secondary-color);
}

.tertiary-bg {
    background-color: var(--tertiary-color);
}

{{-- Text color helpers --}}
.primary-text {
    color: var(--primary-color);
}

.secondary-text {
    color: var(--secondary-color);
}

.tertiary-text {
    color: var(--tertiary-color);
}

{{-- ========================= --}}
{{-- 3. Buttons & Interactions --}}
{{-- ========================= --}}

{{-- Generic button style --}}
.btn {
    background-color: var(--btn-bg-color);
    color: var(--tertiary-color);
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin: 2px;
    transition: background-color 0.3s ease;
}

.btn:hover,
.btn:active,
.btn:focus {
    background-color: var(--btn-hover-bg-color);
    border-color: var(--btn-hover-bg-color);
    box-shadow: rgba(var(--btn-hover-bg-color), 0.6);
}

{{-- Disabled button state --}}
.btn:disabled {
    background-color: rgb(204, 204, 204);
}

{{-- ========================= --}}
{{-- 4. Alerts & Logs          --}}
{{-- ========================= --}}

{{-- Base alert styling --}}
.alert {
    padding: 10px;
    margin: 15px;
    border-radius: 5px;
}

{{-- Error, warning, info alerts --}}
.alert-error {
    background-color: #f8d7da;
    color: #721c24;
    border-left: 4px solid #f31212;
}

.alert-warning {
    background-color: #fff3cd;
    color: #856404;
    border-left: 4px solid #f39c12;
}

.alert-info {
    background-color: #d1ecf1;
    color: #0c5460;
    padding: 10px;
    margin: 15px;
    border-radius: 5px;
}

{{-- Log item container --}}
.log-item {
    max-width: 100%;
    margin-bottom: 10px;
    padding: 10px;
    border-radius: 5px;
}

{{-- Log item content arrangement --}}
.log-item .d-flex {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 100%;
    word-wrap: break-word;
}

.log-item span {
    flex-grow: 1;
    word-break: break-word;
    margin-right: 10px;
    max-width: 85%;
}

{{-- ========================= --}}
{{-- 5. Footer                 --}}
{{-- ========================= --}}

{{-- Footer main container --}}
footer {
    background-color: var(--footer-bg);
    color: var(--footer-color);
    position: relative;
    padding: 30px 50px 0px 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    text-align: left;
}

{{-- Footer text --}}
.footer p {
    font-size: 0.9rem;
    margin-bottom: 0.3rem;
    font-weight: 300;
}

{{-- ========================= --}}
{{-- 6. Rotation & Hover       --}}
{{-- ========================= --}}

{{-- Rotation classes for interactive elements --}}

.rotate-icon {
    margin-left: 5px;
}

.rotate {
    transform: rotate(90deg);
    transition: transform 0.3s ease-in-out;
}

.rotate-reverse {
    transform: rotate(0deg);
    transition: transform 0.3s ease-in-out;
}

{{-- Hover opacity for navigation links --}}
.nav-link:hover {
    opacity: 0.5;
    text-decoration: none;
}

{{-- ========================= --}}
{{-- 7. Admin Sidebar          --}}
{{-- ========================= --}}

{{-- Sidebar main container --}}
.admin-sidebar {
    color: var(--admin-sidebar-color);
    background-color: var(--admin-sidebar-bg);
    min-width: 150px;
    max-width: 250px;
    position: relative;
}

{{-- Sidebar links --}}
.admin-sidebar .nav-link {
    color: var(--admin-sidebar-color);
    padding: 15px;
    text-align: left;
    transition: background-color 0.3s ease;
    text-decoration: none;
}

.admin-sidebar .nav-link:hover {
    background-color: var(--admin-sidebar-hover-bg);
}

{{-- Collapse Icon --}}
.rotate {
    transform: rotate(90deg);
    transition: transform 0.3s ease;
}

.rotate-reverse {
    transform: rotate(0deg);
    transition: transform 0.3s ease;
}

{{-- Hamburger Button --}}
.button-toggle {
    display: none;
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
}

{{-- ========================= --}}
{{-- 9. Link Styles            --}}
{{-- ========================= --}}

{{-- Default link style reset --}}
a {
    text-decoration: none;
}

{{-- Hover link style reset --}}
a:hover {
    text-decoration: none;
}

{{-- ========================= --}}
{{-- 10. Drag & Sort Classes   --}}
{{-- ========================= --}}

{{-- Ghost element while sorting --}}
.sortable-ghost {
    opacity: 0.4;
}

{{-- ========================= --}}
{{-- 11. Cards & Thumbnails    --}}
{{-- ========================= --}}

{{-- Card style --}}
.card {
    border-radius: 10px;
    border: 1px solid #ddd;
    overflow: hidden;
}

.card-body {
    padding: 2rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

{{-- Icon spacing --}}
i {
    margin-right: 5px;
}

{{-- Image thumbnail helpers --}}
.thumbnail {
    width: 300px;
    height: 300px;
    object-fit: cover;
    border-radius: 0.25rem;
}

{{-- Flag icon style --}}
.flag {
    width: 20px;
    height: 20px;
    margin-right: 5px;
}

{{-- Hidden error text --}}
.text-error {
    display: none;
}

{{-- ========================= --}}
{{-- 12. Badges & Images       --}}
{{-- ========================= --}}

{{-- Navbar brand image --}}
.navbar-brand img {
    height: 50px;
    width: auto;
}

{{-- Success and secondary badges --}}
.badge-success {
    background-color: #28a745;
}

.badge-secondary {
    background-color: #899096;
}

{{-- Image thumbnail in lists/grids --}}
.img-thumbnail {
    width: 100%;
    max-width: 100px;
    height: 100%;
    object-fit: cover;
    max-height: 100px;
    border-radius: 0.25rem;
}

.img-thumbnail:hover {
    transform: scale(1.05);
    transition: transform 0.2s;
}

{{-- ========================= --}}
{{-- 13. Forms, Handles & Modal      --}}
{{-- ========================= --}}

{{-- Simple spacing for form fields --}}
.form-group {
    margin-bottom: 1.5rem;
}

{{-- Handle for draggable items --}}
.handle:hover {
    text-decoration: none;
    cursor: grab;
}

{{-- Modal container --}}
.modal-content {
    margin-top: 70px;
}

{{-- ========================= --}}
{{-- 14. Pagination            --}}
{{-- ========================= --}}

{{-- Pagination container --}}
.pagination {
    display: flex;
    justify-content: center;
}

{{-- Pagination links --}}
.pagination .page-link {
    padding: 5px 10px;
    font-size: 14px;
}

{{-- ========================= --}}
{{-- 15. Navbar                --}}
{{-- ========================= --}}

{{-- Sticky navbar --}}

.navbar {
    background-color: var(--navbar-bg);
    position: sticky;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1040;
    height: 70px;
}

{{-- Navbar link styling --}}
.navbar-nav .nav-link {
    color: var(--navbar-link-color);
    font-weight: bold;
    margin: 0 25px;
    transition: opacity 0.3s ease-in-out;
}

{{-- Navbar item alignment --}}
.navbar-link-row, .footer-link-row {
    align-items: center;
}

{{-- Dropdown item icon spacing --}}
.dropdown-item img {
    margin-right: 8px;
}

{{-- ============================ --}}
{{-- 16. Admin Container          --}}
{{-- ============================ --}}

{{-- Admin pages container layout --}}
.admin-container {
    display: flex;
    flex-direction: row;
    min-height: 100vh;
}

{{-- ========================= --}}
{{-- 17. Lists                 --}}
{{-- ========================= --}}

{{-- Default list text alignment --}}
ul {
    line-height: normal;
    text-align: left;
}

{{-- ========================= --}}
{{-- 18. Scroll Indicators     --}}
{{-- ========================= --}}

{{-- Arrow indicating scroll action --}}
.scroll-arrow {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    font-size: 2rem;
    z-index: 3;
}

{{-- Collapsible sections --}}
.collapsible {
    overflow: hidden;
    transition: height 0.3s ease;
}

{{-- Fixed scroll indicator on bottom --}}
.scroll-indicator {
    position: fixed;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    font-size: 30px;
    color: white;
    border: #000;
    text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5);
    display: none;
    opacity: 0.7;
    animation: bounce 1s infinite;
    z-index: 9999;
}

.scroll-indicator i {
    font-size: 2rem;
}

{{-- ========================= --}}
{{-- 19. Animations            --}}
{{-- ========================= --}}

{{-- Bouncing animation for scroll indicator --}}
@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

{{-- ========================= --}}
{{-- 20. Media Queries         --}}
{{-- ========================= --}}

@media (max-width: 768px) {
    {{-- Sidebar --}}
    .admin-sidebar {
        position: fixed;
        top: 0;
        left: -250px;
        width: 250px;
        height: 100%;
        transition: left 0.3s ease;
        z-index: 1000;
        margin-top: 70px;
    }

    .admin-sidebar.active {
        left: 0;
    }

    .button-toggle {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: none;
        border: none;
        font-size: 24px;
        cursor: pointer;
    }

    {{-- Navbar --}}
    .navbar {
        height: auto;
        padding: 10px 0;
    }

    .navbar-nav .nav-link {
        margin: 0 10px;
        padding: 10px 0;
    }

    {{-- Admin dashboard --}}
    table, thead, tbody, th, td, tr {
        display: block;
    }
    thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
    }
    tr {
        margin: 0 0 1rem 0;
        border: 1px solid #dee2e6;
        padding: 0.5rem;
        border-radius: 0.25rem;
        background: #fff;
    }
    td {
        position: relative;
        padding-left: 50%;
        text-align: left;
        border: none;
        border-bottom: 1px solid #dee2e6;
    }
    td:last-child {
        border-bottom: 0;
    }
    td:before {
        display: block;
        content: attr(data-label);
        font-weight: bold;
        margin-bottom: 0.25rem;
    }
}
