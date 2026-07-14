(function () {

    "use strict";

    const RC = window.RestanCompatibility;

    if (!RC) {
        return;
    }

    const module = {

        init() {

            RC.log("Logo Over Menu Repair Loaded");

            this.cache();

            this.observe();

            this.sync();

            window.addEventListener(
                "resize",
                () => {

                    this.cache();

                    this.sync();

                }
            );

        },

        cache() {

            this.logo = document.querySelector(
                ".elementor-element-d30de5e"
            );

            this.menu = document.querySelector(
                "#navbar-menu"
            );

            this.navbar = document.querySelector(
                "nav.validnavs"
            );

            this.overlay = document.querySelector(
                ".overlay-screen"
            );

        },

        isMenuOpen() {

            return (

                this.menu?.classList.contains("show") ||

                this.navbar?.classList.contains("navbar-responsive") ||

                document.body.classList.contains("side-right") ||

                this.overlay?.classList.contains("opened")

            );

        },

        sync() {

            this.cache();

            if (!this.logo) {
                return;
            }

            const open = this.isMenuOpen();

            if(open){

                this.logo.setAttribute(
                    "style",
                    "display:none !important;"
                );

            }
            else{

                this.logo.removeAttribute(
                    "style"
                );

            }

            RC.log("Menu:", open);

        },

        observe() {

            const observer = new MutationObserver(() => {

                requestAnimationFrame(() => {

                    this.cache();

                    this.sync();

                });

            });

            observer.observe(document.body, {

                subtree: true,

                attributes: true,

                attributeFilter: [
                    "class"
                ]

            });

        }

    };

    RC.modules.logoOverMenuRepair = module;

})();