(function () {

    "use strict";

    const RC = window.RestanCompatibility;

    if (!RC) {
        return;
    }

    const module = {

        init() {

            RC.log("Mobile Menu Repair Module Loaded");

            this.cache();

            this.repair();

            this.observe();

            this.watchResize();

        },

        cache() {

            this.menu =
                document.querySelector("#navbar-menu");

        },

        repair() {

            this.repairLinks();

        },

        repairLinks() {

            document
                .querySelectorAll("#navbar-menu a")
                .forEach(link => {

                    link.addEventListener(
                        "click",
                        function (event) {

                            const href =
                                link.getAttribute("href");

                            if (!href) {
                                return;
                            }

                            if (href.startsWith("#")) {
                                return;
                            }

                            const submenu =
                                link.parentElement.querySelector(".dropdown-menu");

                            if (submenu) {
                                return;
                            }

                            window.location.href = href;

                        },
                        true
                    );

                });

        },

        observe() {

            if (!this.menu) {
                return;
            }

            const observer =
                new MutationObserver(() => {

                    this.repair();

                });

            observer.observe(
                this.menu,
                {
                    attributes: true,
                    attributeFilter: ["class"]
                }
            );

        },

        watchResize() {

            let timer;

            window.addEventListener(
                "resize",
                () => {

                    clearTimeout(timer);

                    timer = setTimeout(
                        () => {

                            this.cache();

                            this.repair();

                        },
                        200
                    );

                }
            );

        }

    };

    RC.modules.mobileMenuRepair = module;

})();