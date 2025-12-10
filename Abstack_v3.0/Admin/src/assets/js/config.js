/**
* Theme: Abstack - Responsive Bootstrap 5 Admin Dashboard
* Author: Coderthemes
* Module/App: Theme Config Js
*/

(function () {
    var savedConfig = sessionStorage.getItem("__ABSTACK_CONFIG__");

    var html = document.getElementsByTagName("html")[0];

    //  Default Config Value
    var defaultConfig = {
        theme: "light",

        topbar: {
            color: "brand",
        },

        menu: {
            color: "light",
        },

        // This option for only vertical (left Sidebar) layout
        sidenav: {
            size: "sm-hover-active",
        },
    };


    this.html = document.getElementsByTagName('html')[0];

    config = Object.assign(JSON.parse(JSON.stringify(defaultConfig)), {});

    var layoutColor = this.html.getAttribute('data-bs-theme');
    config['theme'] = layoutColor !== null ? layoutColor : defaultConfig.theme;

    var topbarColor = this.html.getAttribute('data-topbar-color');
    config['topbar']['color'] = topbarColor != null ? topbarColor : defaultConfig.topbar.color;

    var leftbarSize = this.html.getAttribute('data-sidenav-size');
    config['sidenav']['size'] = leftbarSize !== null ? leftbarSize : defaultConfig.sidenav.size;

    var menuColor = this.html.getAttribute('data-menu-color');
    config['menu']['color'] = menuColor !== null ? menuColor : defaultConfig.menu.color;

    window.defaultConfig = JSON.parse(JSON.stringify(config));

    if (savedConfig !== null) {
        config = JSON.parse(savedConfig);
    }

    window.config = config;

    if (config) {

        if (window.innerWidth <= 1140) {
            html.setAttribute("data-sidenav-size", "full");
        } else {
            html.setAttribute("data-sidenav-size", config.sidenav.size);
        }

        html.setAttribute("data-bs-theme", config.theme);
        html.setAttribute("data-menu-color", config.menu.color);
        html.setAttribute("data-topbar-color", config.topbar.color);
    }

    // RTL Layout
    if (document.getElementById('app-style').href.includes('rtl.min.css')) {
        document.getElementsByTagName('html')[0].dir = "rtl";
    }
})();